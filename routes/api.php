<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleApiController;
use App\Http\Controllers\ServiceApiController;
use App\Http\Controllers\AppointmentApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\PositionApiController;


Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('service', ServiceApiController::class)->middleware('auth:sanctum');
Route::apiResource('appointment', AppointmentApiController::class)->middleware('auth:sanctum');
Route::get('/positions', [PositionApiController::class, 'index'])->middleware('auth:sanctum');
Route::apiResource('people', PeopleApiController::class)->middleware('auth:sanctum');


