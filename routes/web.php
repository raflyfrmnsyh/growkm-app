<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page', [
        'title' => "Home - Growkm app"
    ]);
});

Route::get('/our-team', function () {
    return view('landingpage/our-team', [
        'title' => "Tim Growkm"
    ]);
});

Route::get('/our-partner', function () {
    return view('landingpage/our-partner', [
        'title' => "Partner Growkm"
    ]);
});

Route::get('/about-supplier-plus', function () {
    return view('landingpage/about-supplier-plus', [
        'title' => "Tentang Supplier Plus"
    ]);
});

Route::get('/auth/login', function () {
    return view('_auth.sign-in', [
        'title' => "Login - Growkm app"
    ]);
});

Route::get('/auth/register', function () {
    return view('_auth.sign-up', [
        'title' => "Register - Growkm app"
    ]);
});

Route::get('/auth/forgot-password', function () {
    return view('_auth.forgot-password', [
        'title' => "Lupa Password - Growkm app"
    ]);
});

Route::get('/auth/reset-password', function () {
    return view('_auth.reset-password', [
        'title' => "Reset Password - Growkm app"
    ]);
});


Route::get('/user/dashboard', function () {
    return view('_users.dashboard', [
        'title' => "Dashboard - Growkm app"
    ]);
});
