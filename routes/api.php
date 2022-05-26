<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\User;
Use App\Models\Car;
use App\Http\Controllers\RegisterController;
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

Route::post('getcar/',function (Request $request) {

    $car = Car::find($request['car_id']);
    $user = $car->user;

    if ($user['api_token'] == $request['api_token']) {
        if (isset($car['in_used'])) {
            if ($car['in_used'] == 0) {
                $car->update(['in_used'=>1]);

                $user->update(['car_id'=>$car['id']]);

                return "Пользователь id: {$user['id']}, name: {$user['name']} - успешно арендовал машину";
            } else {
                return 'Машина сейчас занята';
            }
        } else {
            return 'Данной машины нет в базе';
        }
    } else {
        return 'Неверный токен';
    }
});

Route::post('leavecar/',function (Request $request) {

    $user = User::find($request['user_id']);
    $car = $user->car;

    if ($user['api_token'] == $request['api_token']) {
        if ($car['in_used'] == 1) {
            $car->update(['in_used' => 0]);
            return "Пользователь id: {$user['id']}, name: {$user['name']} - успешно вышел из машины";
        } else {
            return 'Пользователь не арендовал ни одну из машин';
        }
    } else {
        return 'Неверный токен';
    }

});

