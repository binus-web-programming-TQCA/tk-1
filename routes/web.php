<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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
    return view('layout.master');
});
Route::get('/list', [VideoController::class, 'listVideo'])->name('video.list');
Route::get('videos/create', [VideoController::class, 'createVideo'])->name('video.create');
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos-del/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
Route::get('/videos-play/{id}', [VideoController::class, 'play'])->name('videos.play');
Route::get('/videos-edit/{id}', [VideoController::class, 'edit'])->name('videos.edit');
Route::post('/videos-up/{id}', [VideoController::class, 'update'])->name('videos.update');


Route::get('/upload', [VideoController::class, 'showUploadForm'])->name('video.upload.form');
Route::post('/upload', [VideoController::class, 'uploadVideo'])->name('video.upload');
Route::get('/play/{filename}', [VideoController::class, 'playVideo'])->name('video.play');

