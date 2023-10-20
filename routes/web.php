<?php
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ScheduleArtist;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SongController;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Plan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArtistController;

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

Route::group(['middleware' => ['auth', 'isadmin']], function(){

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

Route::group(['prefix' => 'Plan'], function () {

    Route::get('/', [PlanController::class, 'index']);
    Route::get('fetch-plan', [PlanController::class, 'fetchplan']);
    Route::post('store-plan', [PlanController::class, 'store']);

});

Route::group(['prefix' => 'Song'], function () {

    Route::get('/', [SongController::class, 'indexajax'])->name('songsindex');
    Route::get('RadioStation/LiveDj', function(){
        $artists= Artist::all();
        $channels= Channel::all();
        $categories= Category::all();
        $plans= Plan::all();
        return view('Admin.Song.create',compact('artists','channels','categories','plans'));

    });

    // Route::get('/edit-song',[SongController::class,'addCountry'])->name('add.country');
    Route::get('/getSongsList', [SongController::class, 'getSongsList'])->name('get.songs.list');
    Route::post('/deleteSong', [SongController::class, 'destroy'])->name('delete.song');
    Route::post('/deleteSelectedSongs', [SongController::class, 'deleteSelectedSongs'])->name('delete.selected.songs');
    Route::post('/getSongDetails', [SongController::class, 'getSongDetails'])->name('get.song.details');
    Route::post('/add-song', [SongController::class, 'store'])->name('create.song.details');
    Route::get('/getsongDetails/{id}', [SongController::class, 'edit'])->name('get.song.details');
    Route::post('/updateSongDetails',[SongController::class, 'update'])->name('update.song.details');

});

Route::group(['prefix' => 'ScheduleArtist'], function () {

    Route::get('/', [ScheduleArtist::class, 'indexajax'])->name('scheduleartists');
    Route::get('/getList', [ScheduleArtist::class, 'getSongsList'])->name('get.scheduleartists.list');
    Route::get('/create',[ScheduleArtist::class,'create'])->name('createpage');
    Route::post('/Schedule', [ScheduleArtist::class, 'store'])->name('create.Schedule.details');
    Route::post('/deletScheduleArtist', [ScheduleArtist::class, 'destroy'])->name('delete.ScheduleArtist');
    Route::post('/deleteSelectedScheduleArtist', [ScheduleArtist::class, 'deleteSelectedScheduleArtist'])->name('delete.selected.ScheduleArtist');
    Route::get('/getScheduleArtistDetails/{id}', [ScheduleArtist::class, 'edit'])->name('get.ScheduleArtist.details');
    Route::post('/updateScheduleArtistDetails',[ScheduleArtist::class, 'update'])->name('update.ScheduleArtist.details');

});

});
