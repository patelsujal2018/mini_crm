<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return redirect('login');
});

Route::get('/login','AuthController@loginPage')->name('backend.login.page');
Route::post('/login','AuthController@loginProcess')->name('backend.login.process');
Route::get('/logout','AuthController@logout')->name('backend.logout');


Route::group(['middleware'=>['auth','prevent-back-history']],function(){

    Route::get('dashboard','DashboardController@index')->name('backend.dashboard');

    Route::resource('employee', 'EmployeesController');

    Route::resource('company', 'CompaniesController');

});