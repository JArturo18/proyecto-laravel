<?php

// use Illuminate\Support\Facades\Route;
// // use App\Http\Controllers\Dashboard\CategoryController;
// // use App\Http\Controllers\Dashboard\PostController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


//     Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    
//     // Route::resource('post', PostController::class)->except(['show']);
//     // Route::resource('category', CategoryController::class);
   
//     Route::resources([
//     'post' => App\Http\Controllers\Dashboard\PostController::class,
//     'category' => App\Http\Controllers\Dashboard\CategoryController::class,
//    ]);
   
//    });

// // Route::resource('post', PostController::class);
// // Route::resource('category', CategoryController::class);





use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Dashboard\CategoryController;
// use App\Http\Controllers\Dashboard\PostController;

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

    Route::get('/', function () {
        return view('welcome');
        
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){

        Route::get('/', function () {
            return view('dashboard');
        })->name("dashboard");
        
    Route::resources([
    'post' => App\Http\Controllers\Dashboard\PostController::class,
    'category' => App\Http\Controllers\Dashboard\CategoryController::class,
   ]);
   
   });

// Route::resource('post', PostController::class);
// Route::resource('category', CategoryController::class);

require __DIR__.'/auth.php';
