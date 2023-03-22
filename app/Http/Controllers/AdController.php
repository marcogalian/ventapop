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
            $ad->deleteOrFail();
            
            return redirect()->route('home')->withMessage(['type'=>'danger', 'text'=>'Anuncio eliminado']);
        }else{
            return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Acción no disponible: Un anuncio solo puede ser borrado por el administrador o el creador']);
        }     
        
    }

}
