<?php

use App\Models\Admin;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\ParticipantRegist;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ParticipantRegistController;

// Prefix Routing Admin

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {

        $topProduct = Transaction::getTopProducts(5);
        $topUser = Transaction::getTopUserTransaction(5);
        $statDashboard = Admin::getStaticData();

        return view('_admin.dashboard', [
            'title' => "Dashboard - Growkm app",
            'top_product' => $topProduct,
            'top_user' => $topUser,
            'stats' => $statDashboard
        ]);
    })->name('admin.dashboard');

    Route::prefix('transaksi')->group(function () {
        Route::get('/event', [ParticipantRegistController::class, 'showDataParticipant'])->name('admin.transaction-event');
        Route::get('/product-all', [TransactionController::class, 'showtb'])->name('admin.transaction-product');

        Route::get('/detail-transaksi/{id}', [TransactionController::class, 'show'])->name('admin.transaction-product-detail');

        Route::post('/update-transaction/{id}', [TransactionController::class, 'update'])->name('update.transaction.status');
    });

    Route::prefix('manage')->group(function () {

        /** Kelola data event & kelas */

        Route::get('/event', [EventController::class, 'index'])->name('admin.manage.event');
        Route::get('/event/add', function () {
            return view('_admin._manage._create.add-event-data', [
                'title' => 'Tambah data event'
            ]);
        })->name('admin.manage.add-event');
        Route::post('/event/store', [EventController::class, 'store'])
            ->name('admin.manage.event.store');
        Route::get('/event/detail/{event_id}', [EventController::class, 'show'])->name('admin.manage.event.detail');
        Route::delete('/event/delete/{event_id}', [EventController::class, 'destroy'])
            ->name('admin.manage.event.delete');
        Route::get('/event/{event_id}/view', [EventController::class, 'view'])->name('admin.manage.event.view');
        Route::put('/event/update/{event_id}', [EventController::class, 'update'])
            ->name('admin.manage.event.update');

        /**
         * Kelola data produk
         */

        Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('admin.manage.product');
        Route::get('/add-product', function () {
            return view('_admin._manage._create.add-product-data', [
                'title' => "Tambah data produk"
            ]);
        })->name('admin.manage.product.add');
        Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.manage.product.store');
        Route::get('/product/detail/{product_id}', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.manage.product.detail');
        Route::put('/product/update/{product_id}', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.manage.product.update');
        Route::delete('/product/delete/{product_id}', [App\Http\Controllers\ProductController::class, 'destroy'])
            ->name('admin.manage.product.delete');
        Route::get('/product/detail/{id}', function ($id) {
            return view('_admin._manage._product.product-detail', [
                'title' => "Detail Produk",
                'id' => $id
            ]);
        })->name('user.product.detail');

        /***
         * Kelola Admin Routing
         */

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.manage.admin');
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.manage.add-admin');
        Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.manage.store-admin');
        Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.manage.edit-admin');
        Route::put('/admin/edit/{id}', [AdminController::class, 'update'])->name('admin.manage.update-admin');
        Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.manage.delete-admin');
    });
});



// Prefix Routing user

Route::prefix('user')->middleware('user')->group(function () {

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
                'event_description',
                'event_date',
                'event_speaker_name',
                'event_speaker_job',
                'event_tags',
                'event_price'
            )->get();

            $processedEvents = $data->map(function ($event) {
                return [
                    'event_id' => $event->event_id,
                    'event_title' => $event->event_title,
                    'event_description' => Str::limit($event->event_description ?? 'Deskripsi belum tersedia.', 15, '...'),
                    'event_date' => Carbon::parse($event->event_date)->format('d M Y'),
                    'event_speaker' => $event->event_speaker_name,
                    'event_speaker_job' => $event->event_speaker_job,
                    'event_tags' => array_slice(explode(',', $event->event_tags), 0, 3),
                    'event_price' => $event->event_price
                ];
            });

            return view('_users._events.events-data', [
                'title' => "Events Data - Growkm app",
                'data' => $processedEvents
            ]);
        })->name('events.data');

        Route::get('/detail-event/{event_id}/{user_id}', function ($event_id, $user_id) {

            $getData = Event::select('*')->where('event_id', $event_id)->first();

            // Get event_name first with id
            $eventName = $getData->event_title ?? null;

            // Get current user id
            $userId = $user_id;
            // Check if user already registered for this event by comparing event_name
            $isRegistered = false;
            if ($eventName) {
                $isRegistered = ParticipantRegist::where('user_id', $userId)
                    ->where('event_name', $eventName)
                    ->exists();
            }

            $data =  [
                'event_id' => $event_id,
                'event_title' => $getData->event_title,
                'event_description' => $getData->event_description,
                'event_type' => $getData->event_type,
                'event_quota' => $getData->event_quota,
                'event_tags' => explode(',', $getData->event_tags),
                'event_banner_img' => $getData->event_banner_img,
                'event_price' => $getData->event_price,
                'event_date' => Carbon::parse($getData->event_date)->format('d M Y'),
                'event_speaker' => $getData->event_speaker_name,
                'event_speaker_job' => $getData->event_speaker_job,
                'event_location' => $getData->event_location
            ];

            return view('_users._events.event-detail', [
                'title' => "Detail Event",
                'data' => $data,
                'isRegistered' => $isRegistered
            ]);
        })->name('event-detail');
    });

    Route::prefix('product')->group(function () {
        // routing product role user

        Route::get('/list', function (\Illuminate\Http\Request $request) {
            $query = Product::query();

            // Filter by category if provided
            if ($request->filled('category')) {
                $query->where('product_category', $request->input('category'));
            }

            // Search by product name if provided
            if ($request->filled('searchBox')) {
                $search = $request->input('searchBox');
                $query->where('product_name', 'like', '%' . $search . '%');
            }

            $data = $query->orderBy('created_at', 'desc')->paginate(10);

            $data->getCollection()->transform(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'product_name' => $item->product_name,
                    'product_image' => $item->product_image,
                    'product_price' => $item->product_price,
                    'product_sell' => $item->product_price + ($item->product_price * 0.20),
                    'product_category' => $item->product_category
                ];
            });

            return view('_users._suppliers.all-product', [
                'title' => "List data produk",
                'data' => $data
            ]);
        })->name('product.list');


        Route::get('/checkout/{id}', function ($id) {

            $dataCollection = Product::select(
                'product_name',
                'product_price',
                'product_image'
            )->where('product_id', $id)->first();

            $data = [
                'product_id' => $id,
                'product_name' => $dataCollection['product_name'],
                'product_price' => $dataCollection['product_price'],
                'product_image' => $dataCollection['product_image']
            ];

            return view('_users._transactions.create-transaction', [
                'title' => "checkout",
                'data' => $data

            ]);
        })->name('create.order.product');




        //suppliers
        Route::get('/user/supplier/products', function () {
            return view('_users._suppliers.all-product', [
                'title' => 'All Products - Growkm app'
            ]);
        })->name('products.all');

        Route::get('/user/supplier/products/{id}', function ($id) {

            $dataCollection = Product::select(
                'product_name',
                'product_description',
                'product_price',
                'product_image',
                'product_stock',
                'product_category',
                'product_tags',
                'product_min_order'
            )->where('product_id', $id)->orderBy('created_at', 'asc')->first();

            $data = [
                'product_id' => $id,
                'product_name' => $dataCollection['product_name'],
                'product_desc' => $dataCollection['product_description'],
                'product_price' => $dataCollection['product_price'],
                'product_img' => $dataCollection['product_image'],
                'product_category' => $dataCollection['product_category'],
                'product_stock' => $dataCollection['product_stock'],
                'product_tags' => explode(',', $dataCollection['product_tags']),
                'min_order' => $dataCollection['product_min_order']
            ];

            return view('_users._suppliers.details-product', [
                'title' => 'Product Details - Growkm app',
                'data' => $data
            ]);
        })->name('products.details');
    });

    // transaction routing

    Route::prefix('transaction')->group(function () {
        Route::get('/event/{id}', function ($id) {
            $getData = Event::select('*')->where('event_id', $id)->first();
            $data = [
                'event_id' => $id,
                'event_price' => $getData['event_price'],
                'event_quota' => $getData['event_quota'],
                'event_title' => $getData['event_title'],
                'event_description' => $getData['event_description']
            ];
            return view('_users._transactions.register-event', [
                'title' => "Halaman register event",
                'data' => $data
            ]);
        })->name('register.event');

        Route::post('/regist-process', [ParticipantRegistController::class, 'store'])->name('participant.register');

        Route::post('/create/order-product', [TransactionController::class, 'store'])->name('create.transaction.product');
    });
});



Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'show'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.process');

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/register', [AuthController::class, 'registerView'])->name('auth.register');
    Route::post('register/process', [AuthController::class, 'registerProces'])->name('auth.register.process');
});



// Basic Routing
Route::get('/', function () {
    return view('landing-page', [
        'title' => 'Growkm - Solusi Berkembang UMKM'
    ]);
})->name('landing.page');
