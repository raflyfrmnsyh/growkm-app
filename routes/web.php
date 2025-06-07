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

//course
Route::get('/user/course-list-all', function () {
    return view('_users.course.course-list-all', [
        'title' => "Course List - Growkm app"
    ]);
})->name('course.all');

Route::get('/user/course-list-just-course', function () {
    return view('_users.course.course-list-just-course', [
        'title' => "Course List - Growkm app"
    ]);
})->name('course.just.course');

Route::get('/user/course-list-just-event', function () {
    return view('_users.course.course-list-just-event', [
        'title' => "Course List - Growkm app"
    ]);
})->name('course.just.event');

Route::get('/user/course-list-all-done', function () {
    return view('_users.course.course-list-all-done', [
        'title' => "Course List - Growkm app"
    ]);
})->name('course.all.done');

Route::get('/user/course/course-name', function () {
    return view('_users.course.course-name', [
        'title' => "Course Name - Growkm app"
    ]);
});
