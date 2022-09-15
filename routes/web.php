<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileuploadController;

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

Route::get('fileupload', [FileuploadController::class, 'index']);
Route::post('fileupload', [FileuploadController::class, 'upload'])->name('file.upload');
Route::view('viewfile', 'viewfile');
Route::get('deletefile', [FileuploadController::class, 'delete']);
Route::get('downloadfile', [FileuploadController::class, 'download']);


Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

