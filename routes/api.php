<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("/responder")->group(function () {
    Route::get("/hi", function () {
        return "Hallo Welt";
    });
    Route::get("/number", function () {
        return rand(1, 10);
    });
    Route::get("/www", function () {
        return redirect("https://www.ict-bz.ch");
    });
    Route::get("/favi", function () {
        $pathToFile = public_path('favicon.ico');
        $headers = ['Content-Type: image/x-icon'];
        return response()->download($pathToFile, 'favicon.ico', $headers);
    });
    Route::get("/hi/{name}", function ($name) {
        return "Hi " . $name;
    });
    Route::get("/weather", function () {
        return [
            'city' => 'Luzern',
            'temperature' => 20,
            'wind' => 10,
            'rain' => 0,
        ];
    });
    Route::get("/error", function () {
        return response()->json([
            'error' => 'Unauthorized'
        ], 401);
    });
    Route::get("/multiply/{number1}/{number2}", function ($number1, $number2) {
        return $number1 * $number2;
    })->whereNumber('number1')->whereNumber('number2');
});
