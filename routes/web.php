<?php

use App\Http\Middleware\isLazada;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
});

// USER

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // callback    
    Route::get('/callback', [\App\Http\Controllers\LazopController::class, 'callbackAuth']);

    // CRUD Produk    
    Route::group(['prefix' => 'lazada', 'middleware' => ['isLazada']], function () {
        Route::get('/home', function () {
            return view('lazada');
        })->name('lazadahome');
        Route::get('/getcategoryattributes', [\App\Http\Controllers\CrudProduct::class, 'GetCategoryAttributes'])->name('getcategoryattributes');
        Route::post('/createproduct', [\App\Http\Controllers\CrudProduct::class, 'CreateProduct'])->name('createproduct');

        // Product Controller
        Route::get('/product', [\App\Http\Controllers\ProductController::class, 'getAllProduct'])->name('producthome');
        Route::post('/deactivate', [\App\Http\Controllers\ProductController::class, 'deactivateProduct'])->name('deactivateproduct');
        Route::post('/delete', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('deleteproduct');
    });
});

require __DIR__ . '/auth.php';

// ADMIN

Route::group(['middleware' => 'auth:admin'], function () {
    Route::prefix('admin')->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('admin.dashboard');
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'getDashboard'])->name('admin.dashboard');

        Route::resource('/users', \App\Http\Controllers\UserController::class);
        Route::resource('/admins', \App\Http\Controllers\AdminController::class);
    });
});


require __DIR__ . '/adminauth.php';
