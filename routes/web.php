<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});

Auth::routes([
    'verify' => true
]);

Route::group(['middleware'=>['auth'],'namespace' => 'App\Http\Controllers'], function()
{   
  
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'super_admin_controller@super_admin_home')->name('admin.home')->middleware('auth');
Route::get('/forgot_password','forgot_password_controller@forgot_password_form');


Route::post('/role','RolesController@store')->name('role.store');
Route::get('/role/{roleId}','RolesController@edit')->name('role.editview');
Route::post('/roleupdate','RolesController@update')->name('role.update');
Route::delete('/roles/{deleteId}', 'RolesController@destroy')->name('roles.delete');

Route::resource('roles', RolesController::class);



Route::get('/modules','moduleController@index')->name('module.index');
Route::get('/modules/{moduleId}','moduleController@edit')->name('module.edit');
Route::post('/moduleupdate','moduleController@update')->name('module.update');
Route::delete('/modules/{moduleId}','moduleController@destroy')->name('module.delete');
Route::post('/storemodule','moduleController@store')->name('module.store');
Route::put('/moduleorder','moduleController@updateorder')->name('module.update-order');
Route::post('/update-dashboard-status','moduleController@updateIsDashboard')->name('module.update-dashboard');


});
















