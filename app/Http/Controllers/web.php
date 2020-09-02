<?php

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


Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home2', 'CustomerController@addcustomers')->name('home2');
Route::get('/home2', 'CustomerController@index')->name('viewCustomer');


Route::get('/customerreg', 'CustomerController2@index');

//////////////////////////////////////////////////////////////////////////////////////////////////


// Route::view('history', 'history');

Route::get('/history', 'HistoryController@index');

Route::get('/fail_trips', 'FailTripsController@index');

Route::get('/history_driver', 'HistoryDriverController@index')->name('viewHistory2');

Route::view('vehicle_driver', 'vehicle_driver');

// Route::post('/driver', 'DriverController@addDriver')->name('Driver');
// Route::get('/driver', 'DriverController@index')->name('Driverview');

// Route::post('/vehicle', 'VehicleController@addVehicle')->name('Vehicle');
// Route::get('/vehicle', 'VehicleController@index')->name('Vehicleview');
Route::view('customers', 'customers');

Route::view('vehicle', 'vehicle');

Route::view('package', 'package');

Route::view('der', 'driver');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

//Route::get('admin/user', 'HomeController@index');
