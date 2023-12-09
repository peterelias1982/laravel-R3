<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;

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

Route::get('login', function () {
    return view('login');
});

Route::post('logged', function () {
    return 'You are logged in';
})->name('logged');

Route::get('aya',[ExampleController::class,'show']);

Route::get('test/{name}/{id}', function($name, $id){
    return 'the text is ' . $name . ' and id is ' . $id ;
})->where('name','[a-zA-Z0-9]+')->whereNumber('id');


// Routes for the car table
Route::get('createCar',[CarController::class,'create'])->name('createCar');
Route::get('cars',[CarController::class,'index']);
Route::post('storeCar',[CarController::class,'store'])->name('storeCar');