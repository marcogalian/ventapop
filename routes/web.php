<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Livewire\CartDropdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();


// -- Rutas Publicas ---------------
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/category/{category:name}/ads',[PublicController::class, 'adsByCategory'])->name('category.ads');
Route::post('/locale/{locale}', [PublicController::class, 'setLocale'])->name('locale.set');
Route::get('/search', [PublicController::class, 'search'])->name('search');
Route::get('/search-results', [PublicController::class, 'ad.search-results'])->name('search-results');


// -- Rutas de Anuncios -------------
Route::get('/user/{user:name}/ads', [AdController::class, 'adsByUser'])->name('user.ads');
Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');
Route::get('/ad/create', [AdController::class, 'create'])->name('ad.create');
Route::get('/destroy/{ad}', [AdController::class,'destroy'])->name ('ad.destroy');
Route::get('/favorite/ads', [AdController::class,'adsByFavorite'])->name('favorite.ad');
Route::patch('/favorite/ad/{ad}/accept', [AdController::class, 'acceptAdFavorite'])->name('favorite.ad.accept');
Route::patch('/favorite/ad/{ad}/reject', [AdController::class, 'rejectAdFavorite'])->name('favorite.ad.reject');
Route::patch('/cart/ad/{ad}/add', [AdController::class, 'userAddCart'])->name('cart.ad.add');
Route::patch('/cart/ad/{ad}/reject', [AdController::class, 'removeAdCart'])->name('cart.ad.reject');



// -- Rutas de revisor --------------
Route::get('/revisor', [RevisorController::class, 'index'])->name('revisor.home');
Route::patch('/revisor/ad/{ad}/accept', [RevisorController::class, 'acceptAd'])->name('revisor.ad.accept');
Route::patch('/revisor/ad/{ad}/reject', [RevisorController::class, 'rejectAd'])->name('revisor.ad.reject');
Route::get('revisor/become', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('revisor.become');
Route::get('revisor/{user}/make', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('revisor.make');


// -- Rutas de administrador --------------
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::patch('/admin/user/{user}/delete', [AdminController::class, 'deleteRevisor'])->name('deleteRevisor');
Route::get('/admin/{user:name}/adsrevised', [AdminController::class, 'adsByRevisor'])->name('adsByRevisor');

