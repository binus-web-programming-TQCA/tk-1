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
    return view('welcome');
});

Route::get('/upload', [VideoController::class, 'showUploadForm'])->name('video.upload.form');
Route::post('/upload', [VideoController::class, 'uploadVideo'])->name('video.upload');
Route::get('/play/{filename}', [VideoController::class, 'playVideo'])->name('video.play');

