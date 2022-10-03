<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\Usercontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware'=>['auth']
], function(){

    Route::resource('/users',Usercontroller::class);      
    Route::post('/users/{user}/change_password', [ChangePasswordController::class ,'changePassword'])->name('users.change.password');
    Route::resource('/countries',CountryController::class);      
    Route::resource('/states',StateController::class);      
    Route::resource('/cities',CityController::class);      
    Route::resource('/departments',DepartmentController::class);








Route::resource('/employees', EmployeeController::class );
Route::get('{any}', function(){
    return view('system.employee.index');
})->where('{any}', '.*');
      
});




 

