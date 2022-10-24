<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
    // return view('layouts.app');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/profiles', function () {
    return view('profile');
});

Route::get('/table', function () {
    return view('table');
});

Auth::routes();

Route::get('logout', function(){
     Auth::logout();
  return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');