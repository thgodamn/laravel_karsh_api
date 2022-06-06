<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\User;
Use App\Models\Car;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CarController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Токен администратора

//показать все машины
Route::get('car', function() {
    return Car::all();
});

//показать конкретную машину по id
Route::get('car/{id}', function($id) {
    return Car::find($id);
});

Route::post('leavecar/', [CarController::class, 'leavecar']);
Route::post('getcar/', [CarController::class, 'getcar']);
