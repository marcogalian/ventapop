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
        $ads = Ad::orderBy('created_at','desc')->take(6)->get();
        $total_ads = Ad::get();

        //dd(count($total_ads));
        return view('welcome', compact('ads','total_ads'));
    }    

    public function adsByCategory(Category $category)
    {
        $ads = $category->ads()->latest()->paginate(2);
        return view('ad.by-category', compact('category','ads'));
    }

    




}
