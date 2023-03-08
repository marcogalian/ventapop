<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PublicController extends Controller
{
    /* public function welcome()
    {
        return view('home');
    } */

    public function index()
    {
        $time = Carbon::now('CET');
        $ads = Ad::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();
        $total_ads = Ad::get();

        //dd(count($total_ads));
        return view('welcome', compact('ads','total_ads', 'time'));
    }    

    public function adsByCategory(Category $category)
    {
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(2);
        return view('ad.by-category', compact('category','ads'));
    }

    public function about()
    {
        return view('about');
    }




}
