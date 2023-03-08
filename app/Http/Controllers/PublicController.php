<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;



class PublicController extends Controller
{
    /* public function welcome()
    {
        return view('home');
    } */

    public function index()
    {
        $ads = Ad::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();
        $total_ads = Ad::get();

        //dd(count($total_ads));
        return view('welcome', compact('ads','total_ads'));
    }    

    public function adsByCategory(Category $category)
    {
<<<<<<< HEAD
        $ads = $category->ads()->latest()->paginate(4);
=======
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(2);
>>>>>>> main
        return view('ad.by-category', compact('category','ads'));
    }

    




}
