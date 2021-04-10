<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\FrontencController;

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
    return view('frontend.frontend');
});

 Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontencController::class, 'index']);
Route::get('/frontend/{id}', [FrontencController::class, 'frontend']);


Route::get('/index', [CmsController::class, 'index']);
Route::get('/cms', [CmsController::class, 'cms']);   
Route::post('/cmsaddd', [CmsController::class, 'cmsadd']);
Route::post('/updatecmss/{id}', [CmsController::class, 'updatecms']);
Route::get('/editcmss/{id}', [CmsController::class, 'editcms']);
Route::delete('deletecmss/{id}', [CmsController::class,'distorycms']);

