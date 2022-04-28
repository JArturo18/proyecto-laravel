<?php
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
//use App\Http\Controllers\Dashboard\TestController;
//use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\TestController;

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

//Route::get('/',[TestController::class, 'index']);
//Route::get('/',[App\Http\Controllers\TestController::class, 'test']);
//Route::get('/',[App\Http\Controllers\TestController::class, 'test']);

Route::get('/', function () {
return view('welcome');
});

Route::middleware([App\Http\Middleware\TestMiddleware::class])->group(function (){

    Route::get('/test/{id?}/{name?}', function ($id = 10, $name = " Jose Arturo" ){

            echo $id;
            echo $name;

});
});

Route::group(['prefix' => 'dashboard'], function(){
    
 Route::resource('post', PostController::class)->except(['show']);
// Route::resource('category', CategoryController::class);


//   Rouite::resources([
//  'post' => PostController::class,
//  'category' => categoryController::class,

]);
});


// Route::get('/test/{id?}/{name?}', function($id = 10,$name=" Jose Arturo" ){

//     echo $id;
//     echo $name;

// });

// Route::controller(PostController::class)->group(function(){
// Route::get('post', 'index')->name("post.index");
// Route::get('post/{post}', 'show')->name("post.show");
// Route::get('post/create', 'create')->name("post.create");
// //Route::get('post/create', [PostController::class, 'create'])->name('post.create');
// //Route::post('post/create', [PostController::class, 'store'])->name('post.store');
// Route::get('post/{post}/edit', 'edit')->name("post.edit");
// Route::post('post', 'store')->name("post.store");
// Route::put('post/{post}', 'update')->name("post.updatee");
// Route::delete('post/{post}', 'delete')->name("post.destroy");
// //Route::delete('post/{post}', [PostController::class, 'update']);


// });   




//Route::get('post', [PostController::class, 'index']);
//Route::get('post/{post}', [PostController::class, 'show']);

// Route::get('post/create', [PostController::class, 'create'])->name('post.create');
// Route::post('post/create', [PostController::class, 'store'])->name('post.store');

//Route::get('post/{post}/edit', [PostController::class, 'edit']);

//Route::post('post', [PostController::class, 'store']);
//Route::put('post/{post}', [PostController::class, 'update']);
//Route::delete('post/{post}', [PostController::class, 'update']);

//Route::get('/contacto', function () {
//return "Contactame";
//})->name('contacto');

//Route::get('/custom', function () {
//$msj2 = "Mensaje desde el servidor *_*";

//$data = ['msj' => $msj2, "edad" => 15];
//return view('custom',$data);
//});




