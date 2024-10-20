<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function fetchWeather(Request $request, $city = null)
{
    // Capture the city input from the form
    $city = $request->input('city', $city ?: 'London'); // Use 'London' if no city provided
    
    // Fetch weather data for the city
    $apiKey = env('OPENWEATHER_API_KEY');
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    $client = new \GuzzleHttp\Client();
    $response = $client->get($url);
    $weatherData = json_decode($response->getBody(), true);

    return view('weather.show', compact('weatherData'));
}

}
