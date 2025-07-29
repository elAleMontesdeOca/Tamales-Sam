<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\FacturaController;

Route::get('/ordenes', [OrdenController::class, 'index']);
Route::resource('ordenes', OrdenController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::resource('facturas', FacturaController::class);


