<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        /* dd('hola admin'); */
        $ads_by_revisors = [];
        $revisors = User::where('is_revisor', true)->get();
        $ads = Ad::where('is_accepted', true)->get();
        
        foreach ($revisors as $revisor) {
            $ads_by_revisor = count($ads->where('accepted_by_id', $revisor->id));
            $ads_by_revisors[$revisor->id] = $ads_by_revisor;
        }            
        
        return view('admin.home', compact('revisors', 'ads_by_revisors'));
    }

    public function deleteRevisor(User $user)
    {
        $user->is_revisor = false;
        $user->save();
        return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Eliminada funcion de revisor del usuario']);
    }

    public function adsByRevisor(User $user)
    {
        $ads = Ad::where('accepted_by_id', $user->id)->get();
        /* dd($ads); */
        return view('admin.by-revisor', compact('user','ads'));
    }

    



}
