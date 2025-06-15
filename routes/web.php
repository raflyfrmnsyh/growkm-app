<?php

use App\Models\Event;
use App\Models\Product;
use Illuminate\Support\Carbon;
use App\Models\ParticipantRegist;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantRegistController;

// Prefix Routing Admin

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('_admin.dashboard', [
            'title' => "Dashboard - Growkm app"
        ]);
    })->name('admin.dashboard');

    Route::prefix('transaksi')->group(function () {
        Route::get('/event', [ParticipantRegistController::class, 'showDataParticipant'])->name('admin.transaction-event');


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

        Route::get('/event', [EventController::class, 'index'])->name('admin.manage.event');

        // Route::get('/event', function () {
        //     return view('_admin._manage.event-data', [
        //         'title' => 'Kelola data event'
        //     ]);
        // })->name('admin.manage.event');

        Route::get('/event/detail', function () {
            return view('_admin._manage._create.add-event-data', [
                'title' => 'Tambah data event'
            ]);
        })->name('admin.manage.add-event');

        Route::post('/event/store', [EventController::class, 'store'])
            ->name('admin.manage.event.store');

        Route::get('/event/detail/{event_id}', [EventController::class, 'show'])->name('admin.manage.event.detail');


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



// Prefix Routing user

Route::prefix('user')->group(function () {

    // main dashboard
    Route::get('/dashboard', function () {
        return view('_users.dashboard', [
            'title' => 'Dashboard user'
        ]);
    })->name('user.dashboard');

    //settings

    Route::prefix('setting')->group(function () {
        Route::get('//profile-info', function () {
            return view('_users._settings.profile-info', [
                'title' => "Profile Information - Growkm app"
            ]);
        })->name('profile.info');

        Route::get('/account-info', function () {
            return view('_users._settings.account-info', [
                'title' => "Account Information - Growkm app"
            ]);
        })->name('account.info');

        Route::get('/change-password', function () {
            return view('_users._settings.change-password', [
                'title' => "Change Password - Growkm app"
            ]);
        })->name('change.password');
    });

    Route::prefix('event')->group(function () {
        Route::get('/list', function () {
            $data = Event::select(
                'event_id',
                'event_title',
                'event_date',
                'event_speaker_name',
                'event_speaker_job',
                'event_price'
            )->get();

            $processedEvents = $data->map(function ($event) {
                return [
                    'event_id' => $event->event_id,
                    'event_title' => $event->event_title,
                    'event_date' => Carbon::parse($event->event_date)->format('d M Y'),
                    'event_speaker' => $event->event_speaker_name,
                    'event_speaker_job' => $event->event_speaker_job,
                    'event_price' => $event->event_price
                ];
            });

            return view('_users._events.events-data', [
                'title' => "Events Data - Growkm app",
                'data' => $processedEvents
            ]);
        })->name('events.data');

        Route::get('/detail-event/{id}', function ($id) {

            $getData = Event::select('*')->where('event_id', $id)->first();

            $data =  [
                'event_id' => $id,
                'event_title' => $getData->event_title,
                'event_description' => $getData->event_description,
                'event_type' => $getData->event_type,
                'event_quota' => $getData->event_quota,
                'event_tags' => explode(',', $getData->event_tags),
                'event_banner_img' => $getData->event_banner_img,
                'event_price' => $getData->event_price,
                'event_date' => Carbon::parse($getData->event_date)->format('d M Y')
            ];;
            return view('_users._events.event-detail', [
                'title' => "Detail Event",
                'data' => $data
            ]);
        })->name('event-detail');
    });

    Route::prefix('product')->group(function () {
        // routing product role user

        Route::get('/list', function () {




            return view('_users._suppliers.product-list', [
                'title' => "List data produk",
            ]);
        })->name('product.list');

        Route::get('/checkout/{id}', function ($id) {



            return view('_users._transactions.create-product-transaction', [
                'title' => "checkout",

            ]);
        });
    });

    // transaction routing

    Route::prefix('transaction')->group(function () {
        Route::get('/event/{id}', function ($id) {
            $getData = Event::select('*')->where('event_id', $id)->first();
            $data = [
                'event_id' => $id,
                'event_price' => $getData['event_price'],
                'event_quota' => $getData['event_quota']
            ];
            return view('_users._transactions.register-event', [
                'title' => "Halaman register event",
                'data' => $data
            ]);
        })->name('register.event');

        Route::post('/regist-process', [ParticipantRegistController::class, 'store'])->name('participant.register');
    });
});



Route::prefix('auth')->group(function () {
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
});



// Basic Routing
Route::get('/', function () {
    return view('landing-page', [
        'title' => 'Growkm - Solusi Berkembang UMKM'
    ]);
})->name('landing.page');
