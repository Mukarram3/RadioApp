<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Api\Socialite\FacebookController;
use App\Http\Controllers\Api\Socialite\GitHubController;
use App\Http\Controllers\Api\Socialite\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Forgot password
Route::post('password/forgot', [ForgotPasswordController::class, 'sendResetLinkEmail']);

// Reset password
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('update.password');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::group(['middleware' => 'api'], function ($router) {

    //     Auth Routes

    Route::group(['prefix' => 'auth'], function(){

        Route::post('login', [AuthController::class, 'login']);
        Route::post('signup', [AuthController::class, 'signup']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);

        Route::post('/socialite', [AuthController::class, 'socialite']);
        Route::post('/updateuser', [AuthController::class, 'updateuser']);

    });

    //

    Route::group(['prefix' => 'category'], function (){

        Route::get('getcategories',[\App\Http\Controllers\CategoryController::class, 'index']);

    });

    Route::group(['prefix' => 'slider'], function (){

        Route::get('getslider',[\App\Http\Controllers\SliderController::class, 'index']);

    });

    Route::group(['prefix' => 'channels'], function (){

        Route::get('getchannels',[\App\Http\Controllers\ChannelController::class, 'index']);

    });

    Route::group(['prefix' => 'artists'], function (){

        Route::get('getartists',[\App\Http\Controllers\ArtistController::class, 'index']);
        Route::post('getartistsongs',[\App\Http\Controllers\ArtistController::class, 'getartistsongs']);

    });

    Route::group(['prefix' => 'songs'], function (){

        Route::get('getsongs',[\App\Http\Controllers\SongController::class, 'index']);
        Route::post('getcategorysongs',[\App\Http\Controllers\SongController::class, 'getcategorysongs']);

    });

});
