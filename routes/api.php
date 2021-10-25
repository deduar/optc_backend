<?php

use App\Http\Controllers\FleetDataController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//FleetData
Route::post('/fleetData/process', [FleetDataController::class, 'process']);
Route::post('/fleetData/test_read', [FleetDataController::class, 'test_read']);
Route::resource('fleetData',FleetDataController::class);

//Vehicle_Type
Route::resource('vehicle_type',VehicleTypeController::class);
