<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function create()
    {
        return view('ad.create');
    }

    public function show(Ad $ad)
    {
        $ads_category_random = Ad::where('is_accepted', true)->where('category_id', $ad->category_id)->orderBy('created_at','desc')->get();
        if (count($ads_category_random)>3) {
            $ads_category_random = $ads_category_random->whereNotIn('title',$ad->title)->random(3);
        }else{
            $ads_category_random = $ads_category_random->whereNotIn('title',$ad->title)->take(2);
        }        
        
        return view('ad.show', compact('ad', 'ads_category_random'));
    }

    public function adsByUser(User $user)
    {
        $ads_user = $user->ads()->where('is_accepted', true)->latest()->paginate(6);
        return view('ad.by-user', compact('user','ads_user'));
    } 

    public function destroy(Ad $ad){
        if (Auth::user()->id = $ad->user->id || Auth::user()->is_admin) {            
            $ad->favoritedBy()->detach();            
            $ad->deleteOrFail();
            return redirect()->route('home')->withMessage(['type'=>'danger', 'text'=>'Anuncio eliminado']);
        }else{
            return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Acción no disponible: Un anuncio solo puede ser borrado por el administrador o el creador']);
        }     
        
    }

    // ------ Funciones relacionadas con FAVORITOS ---------

    public function adsByFavorite(User $user)
    {
        $ads_user = Auth::user()->favoriteAds;
        
        return view('ad.by-favorite', compact('user','ads_user'));
    }

    public function acceptAdFavorite (Ad $ad)
    {
        $user = Auth::user();
        
        $favorite_ads = $user->favoriteAds;
                
        foreach ($favorite_ads as $favorite_ad) {
            if ($favorite_ad->id == $ad->id){
                return redirect()->back()->withMessage(['type'=>'warning', 'text'=>'El anuncio ya está añadido a favoritos']);
            }
        }        
        
        $user->favoriteAds()->attach($ad);
        return redirect()->back()->withMessage(['type'=>'success', 'text'=>'Añadido a favoritos']);
        
    }

    public function rejectAdFavorite (Ad $ad)
    {
        $user = Auth::user();
        
        $user->favoriteAds()->detach($ad);
        return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Eliminado de favoritos']);
    }




    // ------------------------------- Agregar al carrito ------------------//

    public function userAddCart(Ad $ad)
    {
        $user = Auth::user();

        $user->cartAds()->attach($ad);
        return redirect()->back()->withMessage(['type'=>'success', 'text'=>'Articulo agregado al carrito']);
    }

}
