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

Route::get('/', function () {
    return view('welcome', ['name' => 'Team 19 Web Application']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::Resource('cases', 'CasesController');
Route::Resource('logs', 'LogsController');
Route::Resource('hardware', 'HardwareController');
Route::Resource('software', 'SoftwareController');
Route::Resource('employees', 'EmployeesController');
Route::Resource('specialists', 'SpecialistsController');