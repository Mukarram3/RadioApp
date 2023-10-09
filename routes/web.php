<?php
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArtistController;

use Illuminate\Support\Str;
use TomorrowIdeas\Plaid\Plaid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('Users', UserController::class);
Route::resource('roles', RoleController::class);

Route::group(['prefix' => 'Category'], function () {

    Route::get('/', [CategoryController::class, 'index']);
    Route::get('fetch-category', [CategoryController::class, 'fetchcategory']);
    Route::post('store-category', [CategoryController::class, 'store']);

});

Route::group(['prefix' => 'Artist'], function () {

    Route::get('/', [ArtistController::class, 'index']);
    Route::get('fetch-artist', [ArtistController::class, 'fetchartist']);
    Route::post('store-artist', [ArtistController::class, 'store']);

});

Route::group(['prefix' => 'Slider'], function () {

    Route::get('/', [SliderController::class, 'index']);
    Route::get('fetch-slider', [SliderController::class, 'fetchslider']);
    Route::post('store-slider', [SliderController::class, 'store']);

});

Route::group(['prefix' => 'Channel'], function () {

    Route::get('/', [ChannelController::class, 'index']);
    Route::get('fetch-channel', [ChannelController::class, 'fetchchannel']);
    Route::post('store-channel', [ChannelController::class, 'store']);

});


