<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    //
    public function getcar(Request $request) {
        $car = Car::find($request['car_id']);
        //$user = $car->user;
        $user = User::find($request['user_id']);

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
    }

    public function leavecar(Request $request) {
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
    }
}
