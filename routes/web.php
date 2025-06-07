<?php

use Illuminate\Support\Facades\Route;


// Prefix Routing

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('_admin.dashboard', [
            'title' => "Dashboard - Growkm app"
        ]);
    })->name('admin.dashboard');
});






// Basic Routing

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

//settings
Route::get('/user/profile-info', function () {
    return view('_users._settings.profile-info', [
        'title' => "Profile Information - Growkm app"
    ]);
})->name('profile.info');

Route::get('/user/account-info', function () {
    return view('_users._settings.account-info', [
        'title' => "Account Information - Growkm app"
    ]);
})->name('account.info');

Route::get('/user/change-password', function () {
    return view('_users._settings.change-password', [
        'title' => "Change Password - Growkm app"
    ]);
})->name('change.password');
