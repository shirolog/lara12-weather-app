<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/weather');


Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');