<?php

namespace App\Http\Controllers;

use App\Enums\City;

use App\Services\WeatherServices;

class WeatherController extends Controller
{
    public function __construct(private WeatherServices $weatherService) {}

    public function index()
    {
        $cityName = request('city', 'Tokyo');

        $city = City::tryFrom($cityName);

        if ($city == null) {
            abort(404);
        }

        $cityLocation = $city->getCoordinates();

        try {
            $weatherData = $this->weatherService->getWeather($cityLocation['latitude'], $cityLocation['longitude']);
        } catch (\Exception $e) {
            report($e);
            abort(503, '天気情報を取得できませんでした。');
        }
        // dd($weatherData);
        $cities = City::getAllCities();
        return view('weather.index', compact('weatherData', 'city', 'cities'));
    }
}
