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

        Route::get('getcategories',[\App\Http\Controllers\CategoryController::class, 'getcategories']);

    });

    Route::group(['prefix' => 'slider'], function (){

        Route::get('getslider',[\App\Http\Controllers\SliderController::class, 'getslider']);

    });

    Route::group(['prefix' => 'channels'], function (){

        Route::get('getchannels',[\App\Http\Controllers\ChannelController::class, 'getchannels']);
        Route::post('store-channel', [\App\Http\Controllers\ChannelController::class, 'storeChannel']);

    });

    Route::group(['prefix' => 'artists'], function (){

        Route::get('getartists',[\App\Http\Controllers\ArtistController::class, 'getartists']);
        Route::post('getartistsongs',[\App\Http\Controllers\ArtistController::class, 'getartistsongs']);

    });

    Route::group(['prefix' => 'songs'], function (){

        Route::get('getsongs',[\App\Http\Controllers\SongController::class, 'index']);
        Route::post('getcategorysongs',[\App\Http\Controllers\SongController::class, 'getcategorysongs']);

    });

    Route::group(['prefix' => 'plans'], function (){

        Route::get('getplans',[\App\Http\Controllers\PlanController::class, 'getplans']);

    });

    Route::group(['prefix' => 'schedule'], function (){

        Route::post('/artists',[\App\Http\Controllers\ScheduleArtist::class, 'scheduleartists']);

    });

    Route::group(['prefix' => 'Favourite'], function (){

        Route::post('song',[\App\Http\Controllers\FavouritesongController::class, 'song']);
        Route::get('getsong',[\App\Http\Controllers\FavouritesongController::class, 'getsong']);

    });

    Route::group(['prefix' => 'Subscription'], function (){

        Route::post('store',[\App\Http\Controllers\SubscriptionController::class, 'store']);

    });

});
