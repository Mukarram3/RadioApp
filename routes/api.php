<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
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
        Route::post('getcategorysongs',[\App\Http\Controllers\CategoryController::class, 'getcategorysongs']);

    });

    Route::group(['prefix' => 'slider'], function (){

        Route::get('getslider',[\App\Http\Controllers\SliderController::class, 'getslider']);

    });

    Route::group(['prefix' => 'channels'], function (){

        Route::get('getchannels',[\App\Http\Controllers\ChannelController::class, 'getchannels']);
        Route::post('getchannelsongs',[\App\Http\Controllers\ChannelController::class, 'getchannelsongs']);
        Route::post('store-channel', [\App\Http\Controllers\ChannelController::class, 'storeChannel']);

    });

    Route::group(['prefix' => 'artists'], function (){

        Route::get('getartists',[\App\Http\Controllers\ArtistController::class, 'getartists']);
        Route::post('getartistsongs',[\App\Http\Controllers\ArtistController::class, 'getartistsongs']);

    });

    Route::group(['prefix' => 'songs'], function (){

        Route::get('getsongs',[\App\Http\Controllers\SongController::class, 'index']);
        Route::post('getmusicsongs',[\App\Http\Controllers\SongController::class, 'getmusicsongs']);
        Route::post('getpodcastsongs',[\App\Http\Controllers\SongController::class, 'getpodcastsongs']);
        Route::post('gettop20songs',[\App\Http\Controllers\SongController::class, 'gettop20songs']);

    });

    Route::group(['prefix' => 'plans'], function (){

        Route::get('getplans',[\App\Http\Controllers\PlanController::class, 'getplans']);

    });

    Route::group(['prefix' => 'schedule'], function (){

        Route::post('/artists',[\App\Http\Controllers\ScheduleArtist::class, 'scheduleartists']);
        Route::post('/scheduleartistsongs',[\App\Http\Controllers\ScheduleArtist::class, 'scheduleartistsongs']);
        Route::post('/del_artist',[\App\Http\Controllers\ScheduleArtist::class, 'del_artist']);

    });

    Route::group(['prefix' => 'Favourite'], function (){

        Route::post('song',[\App\Http\Controllers\FavouritesongController::class, 'song']);
        Route::get('getsong',[\App\Http\Controllers\FavouritesongController::class, 'getsong']);

    });

    Route::group(['prefix' => 'Subscription'], function (){

        Route::post('store',[\App\Http\Controllers\SubscriptionController::class, 'store']);
        Route::post('expire',[\App\Http\Controllers\SubscriptionController::class, 'expire']);
        Route::get('time_left',[\App\Http\Controllers\SubscriptionController::class, 'time_left']);

    });

    Route::group(['prefix' => 'Chat'], function (){

        Route::post('send',[\App\Http\Controllers\ChatController::class, 'send']);
        Route::get('receive',[\App\Http\Controllers\ChatController::class, 'receive']);
        Route::post('del_message',[\App\Http\Controllers\ChatController::class, 'delete']);

    });

    Route::group(['prefix' => 'LiveDj'], function (){

        Route::post('send',[\App\Http\Controllers\LiveDj::class, 'send']);
        Route::get('receive',[\App\Http\Controllers\LiveDj::class, 'receive']);
        Route::get('stream_url',[\App\Http\Controllers\LiveDj::class, 'stream_url']);
        Route::post('del_message',[\App\Http\Controllers\LiveDj::class, 'delete']);

    });

    Route::group(['prefix' => 'Search'], function (){

        Route::post('artist',[\App\Http\Controllers\SearchController::class, 'searchartist']);

    });

});
