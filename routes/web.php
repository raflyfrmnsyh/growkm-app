<?php

use Illuminate\Support\Facades\Route;


// Prefix Routing

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('_admin.dashboard', [
            'title' => "Dashboard - Growkm app"
        ]);
    })->name('admin.dashboard');

    Route::prefix('transaksi')->group(function () {
        Route::get('/event', function () {
            return view('_admin._transactions.events-page', [
                'title' => 'Data Transaksi Event & Kelas'
            ]);
        })->name('admin.transaction-event');


        // routing transaksi produk
        Route::get('product', function () {
            return view('_admin._transactions._product.all-products-transactions', [
                'title' => 'Data transaksi Product'
            ]);
        })->name('admin.transaction-product');

        Route::get('/detail-transaksi/{id}', function (String $id) {
            return view('_admin._transactions._product.detail-product-transaction', [
                'title' => 'Detail Product ' . $id
            ]);
        })->name('admin.transaction-product-detail');
    });

    Route::prefix('manage')->group(function () {

        /** Kelola data event & kelas */

        Route::get('/event', function () {
            return view('_admin._manage.event-data', [
                'title' => 'Kelola data event'
            ]);
        })->name('admin.manage.event');

        Route::get('/event/detail', function () {
            return view('_admin._manage._create.add-event-data', [
                'title' => 'Tambah data event'
            ]);
        })->name('admin.manage.add-event');


        /**
         * Kelola data produk
         */
        Route::get('/product', function () {
            return view('_admin._manage.product-data', [
                'title' => 'Kelola data Produk'
            ]);
        })->name('admin.manage.product');

        Route::get('/add-product', function () {
            return view('_admin._manage._create.add-product-data', [
                'title' => "Tambah data produk"
            ]);
        })->name('admin.manage.product.add');

        /***
         * Kelola Admin Routing
         */

        Route::get('/admin', function () {
            return view('_admin._manage.admin-data', [
                'title' => 'Kelola data admin'
            ]);
        })->name('admin.manage.admin');

        Route::get('/admin/create', function () {
            return view('_admin._manage._create.add-admin-data', [
                'title' => "Tambah data admin",
            ]);
        })->name('admin.manage.add-admin');
    });
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
