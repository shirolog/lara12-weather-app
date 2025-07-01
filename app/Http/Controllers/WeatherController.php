<?php

namespace App\Http\Controllers;

use App\Enums\City;
use Illuminate\Http\Request;

use App\Services\WeatherServices;


class WeatherController extends Controller
{   
    protected $weatherSevice;

    public function __construct(WeatherServices $weatherService)
    {
        $this->weatherSevice = $weatherService;
    }

    public function index() {

        $cityName = request()->input('city', 'Tokyo');
        
        try{
            $city = City::from($cityName);

        }catch(\Exception $e) {
            return response()->json(['error' => 'Invalid City Name'], 400);
        }
        
        $cityLocation = $city->getCordinates();

        
        try{
            $weatherData = $this->weatherSevice->getWeather($cityLocation['latitude'], $cityLocation['longitude']);
        }catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        // dd($weatherData);
        $cities = City::getAllCities();
        return view('weather.index', compact('weatherData', 'city', 'cities'));
        
    }


    
}
