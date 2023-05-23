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
    Route::get("/b", function () {
        return "Aufgabe 2b";
    });
    Route::get("/c", function () {
        return "Aufgabe 2c";
    });
});
