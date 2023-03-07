<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;



class RevisorController extends Controller
{
    public function index()
    {
        $ad = Ad::where('is_accepted', null)
            ->orderBy('created_at', 'desc')
            ->first();
        
        return view('revisor.home', compact('ad'));
    }
}
