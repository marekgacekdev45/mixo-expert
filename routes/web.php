<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RealisationsController;
use App\Http\Controllers\PrivacyPolicyController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

  // LIVEWIRE
  Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
  });

  Route::get('/', HomeController::class,)->name('home');

  Route::get(LaravelLocalization::transRoute('routes.offer_index'), [OffersController::class, 'show'])->name('offers.show');

  Route::get(LaravelLocalization::transRoute('routes.realisations_index'), [RealisationsController::class, 'index'])->name('realisations.index');
  Route::get(LaravelLocalization::transRoute('routes.realisations_show'), [RealisationsController::class, 'show'])->name('realisations.show');

  Route::get(LaravelLocalization::transRoute('routes.contact'), [ContactController::class, 'index'])->name('contact');
  Route::get(LaravelLocalization::transRoute('routes.gallery'), [GalleryController::class, 'index'])->name('gallery');


  Route::get(LaravelLocalization::transRoute('routes.privacy_policy'), PrivacyPolicyController::class,)->name('privacyPolicy');


  // REDIRECT
  Route::fallback(function () {
    return redirect('/');
  });
});
