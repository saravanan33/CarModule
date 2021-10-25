<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Auth\RegisterController;

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




Route::get('back',[HomeController::class,'backToPage']);

Route::group(['prefix'=>'','namespace'=>'',],function(){
    Route::get('bookingsearch',[LocationController::class,'bookingStart']);
        Route::group(['middleware'=>'is_admin'],function(){
            Route::get('/locationdetails',[LocationController::class,'locationDetails']);
            Route::get('/locationcreate',[LocationController::class,'locationCreate']);   
            Route::post('/locationstore',[LocationController::class,'locationStore'])->name('locationstore');
            Route::get('/locationupdate/{id}',[LocationController::class,'locationUpdate']);
            Route::post('/locationupdated',[LocationController::class,'locationUpdated'])->name('locationupdated');
            Route::get('/locationdelete/{id}',[LocationController::class,'locationDelete']);
        });
});
Route::group(['prefix'=>'','namespace'=>'','middleware'=>['is_admin']],function(){
    Route::get('/driverdetails',[DriverController::class,'driverDetails']);
    Route::get('/drivercreate',[DriverController::class,'driverCreate']);
    Route::get('/driverupdate/{id}',[DriverController::class,'driverUpdate']);
    Route::get('/driverdelete/{id}',[DriverController::class,'driverDelete']);
    Route::post('/driverstore',[DriverController::class,'driverStore'])->name('driverstore');
    Route::post('/driverupdated',[DriverController::class,'driverUpdated'])->name('driverupdated');
});
Route::group(['prefix'=>'','namespace'=>'','middleware'=>['is_admin']],function(){
    Route::get('/cardetails',[CarController::class,'carDetails']);
    Route::get('/carcreate',[CarController::class,'carCreate']);
    Route::get('/carupdate/{id}',[CarController::class,'carUpdate']);
    Route::get('/cardelete/{id}',[CarController::class,'carDelete']);
    Route::post('/carstore',[CarController::class,'carStore'])->name('carstore');
    Route::post('/carupdated',[CarController::class,'carUpdated'])->name('carupdated');
});


Route::group(['prefix'=>'' ,'namespace'=>''],function(){
    Route::get('bookingpage',function(){
        return view('booking.booking');
    });
    Route::get('bookingdata',[BookingController::class,'bookingData'])->name('bookingdata');
    Route::get('availablecars',[BookingController::class,'availableCars']);
        
});

Route::group(['prefix'=>'','namespace'=>'','middleware'=>['is_admin']],function(){
    
    Route::get('adminpage',function(){
        return view('admin.adminpage');
    })->name('adminpage');
    
    Route::get('/adminRegister',function(){
        return view('admin.adminregister');
    });

});


Route::get('userpage',function(){
    return view('user.userlogin');
})->name('userpage');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('bookingmail',[EmailController::class,'bookingMail']);
Route::get('selectedcar/{id}/{price}',[BookingController::class,'selectedCar']);
Route::get('checkoutpage/{id}',[BookingController::class,'checkOutPage']);
Route::get('bookingconfirm/{id}',[BookingController::class,'bookingConfirm']);
Route::get('mainPage',[HomeController::class,'mainPage']);
Route::get('backFunction',[HomeController::class,'backFunction']);