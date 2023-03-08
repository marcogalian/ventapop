<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class RevisorController extends Controller
{

    public function __construct()
    {
        $this->middleware('isRevisor')->except('becomeRevisor','makeRevisor');
    }

    public function index()
    {
        $ad = Ad::where('is_accepted', null)
            ->orderBy('created_at', 'desc')
            ->first();
        
        return view('revisor.home', compact('ad'));
    }

    public function acceptAd (Ad $ad)
    {
        $ad->setAccepted(true);
        
        return redirect()->back()->withMessage(['type'=>'success', 'text'=>'Anuncio aceptado']);
    }

    public function rejectAd(Ad $ad)
    {
        $ad->setAccepted(false);

        return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Anuncio rechazado']);
    }

    public function becomeRevisor()
    {
        Mail::to('admin@ventapop.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Solicitud enviada con éxito, le responderemos lo antes posible, gracias.']);
    }

    public function makeRevisor (User $user)
    {
        Artisan::call('ventapop:makeUserRevisor',['email'=>$user->email]);
        return redirect()->route('home')->withMessage(['type'=>'success','text'=>'Usuario acreditado como revisor']);
    }
}
