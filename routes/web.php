<?php

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile','profile')->name('profile');
    Route::put('profile',[\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth:admin'],function(){    
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {            
                return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('/users',\App\Http\Controllers\UserController::class);
        Route::resource('/admins',\App\Http\Controllers\AdminController::class);
    });
});


require __DIR__.'/adminauth.php';