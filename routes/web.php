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
