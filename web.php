<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;
use App\Http\Controllers\locationcontroller;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\mailController;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::get('/addformm', [adminController::class, 'addform']);
    Route::get('/doner', [adminController::class, 'donertable']);
    Route::post('/adddoner', [adminController::class, 'donoradd']);
    Route::get('/editdoner/{id}', [adminController::class, 'editdonorr']);
    Route::post('/updatedoner/{id}', [adminController::class, 'updatedoner']);
    Route::delete('distroydonor/{id}', [adminController::class,'distroydonor']);

    
    Route::get('/profiletablee', [adminController::class, 'profiletable']);
    Route::get('/profilee', [adminController::class, 'profile']);
    Route::post('/update/{id}', [adminController::class, 'updateprofile']);
    Route::get('/edit/{id}', [adminController::class, 'editprofile']);


    Route::get('country-state-city', [adminController::class, 'getcontries']);
    Route::get('countryy-state-cityy', [adminController::class, 'getcontriesss']);
    Route::get('get-states-by-country/{id}', [adminController::class, 'getStates']);
    Route::get('get-cities-by-state/{id}', [adminController::class, 'getCities']);

    Route::get('tablecountry', [locationcontroller::class, 'tableCountry']);    
    Route::get('tablecity', [locationcontroller::class, 'tableCity']);    
    Route::get('tablestate', [locationcontroller::class, 'tableState']);

    Route::get('/addcountryy', [locationcontroller::class, 'addcountry']);    
    Route::post('/countryaddd', [locationcontroller::class, 'countryadd']);
    Route::post('/updatecountry/{id}', [locationcontroller::class, 'updatecountry']);
    Route::get('/editcountry/{id}', [locationcontroller::class, 'editcountry']);
    Route::delete('deletecountry/{id}', [locationcontroller::class,'distroycountry']);


    Route::get('/addstate', [locationcontroller::class, 'addstate']);
    Route::post('stateadd', [locationcontroller::class, 'stateadd']);
    Route::post('/updatestatee/{id}', [locationcontroller::class, 'updatestate']);
    Route::get('/editstatee/{id}', [locationcontroller::class, 'editstate']);
    Route::delete('deletestate/{id}', [locationcontroller::class,'distroystate']);

    Route::get('/addcities', [locationcontroller::class, 'addcities']);
    Route::post('/cityadd', [locationcontroller::class, 'cityadd']);
    Route::post('/updatecity/{id}', [locationcontroller::class, 'updatecity']);
    Route::get('/editcity/{id}', [locationcontroller::class, 'editcity']);
    Route::delete('deletecity/{id}', [locationcontroller::class,'distroycity']);


    Route::get('/finder', [adminController::class, 'findertable']);
    Route::post('/addfinder', [adminController::class, 'finderadd']);
    Route::get('/editfinder/{id}', [adminController::class, 'editfinder']);
    Route::post('/updatefinder/{id}', [adminController::class, 'updatefinder']);
    Route::delete('distroyfinder/{id}', [adminController::class,'distroyfinder']);
  



    Route::get('country-statee-city', [SubAdminController::class, 'getcontriess']);
    Route::get('get-states-by-country/{id}', [SubAdminController::class, 'getStates']);
    Route::get('get-cities-by-state/{id}', [SubAdminController::class, 'getCities']);
   

    
    Route::get('/subadmin', [SubAdminController::class, 'subadmintable']);
    Route::post('/addsubadmin', [SubAdminController::class, 'subadminadd']);
    Route::get('/editsubadmin/{id}', [SubAdminController::class, 'editsubadmin']);
    Route::post('/updatesubadmin/{id}', [SubAdminController::class, 'updatesubadmin']);
    Route::delete('ditroysubadmin/{id}', [SubAdminController::class,'distroysubadminn']);

    Route::get('/emailtest', [mailController::class, 'mail']);
    
  
});
