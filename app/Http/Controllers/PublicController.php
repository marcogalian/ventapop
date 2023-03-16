<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Attribute;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PublicController extends Controller
{
    /* public function welcome()
    {
        return view('home');
    } */

    public function index(Category $category)
    {
        $time = Carbon::now('CET')->subMinute(15);
        $ads = Ad::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();
        $total_ads = Ad::get();                
        do {
            $random = rand(1,10);
            $ads_category_random = Ad::where('is_accepted', true)->where('category_id', $random)->orderBy('created_at','desc')->take(3)->get();
        } while (!count($ads_category_random) > 0);

        switch ($random) {
            case '1': 
                $category_random = 'Motor';
                break;
            case '2': 
                $category_random = 'Electrónica e informática';
                break;
            case '3': 
                $category_random = 'Decoración';
                break;
            case '4': 
                $category_random = 'Juguetes';
                break;
            case '5': 
                $category_random = 'Deporte';
                break;
            case '6': 
                $category_random = 'Herramientas';
                break;
            case '7': 
                $category_random = 'Música y libros';
                break;
            case '8': 
                $category_random = 'Muebles';
                break;
            case '9': 
                $category_random = 'Mascotas';
                break;
            case '10': 
                $category_random = 'Otros';
                break;
            
            default:
                # code...
                break;
        }
        
        return view('welcome', compact('ads','total_ads', 'time', 'ads_category_random','category_random'));
    }    

    public function adsByCategory(Category $category)
    {
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(6);
        /* dd($category->name); */
        return view('ad.by-category', compact('category','ads'));
    }

    public function about()
    {
        return view('about');
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        /* dd($locale); */
        return redirect()->back();
        
    }

}
