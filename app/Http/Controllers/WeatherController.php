<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function fetchWeather(Request $request)
{
    // Get city or coordinates from the request
    $city = $request->input('city');
    $lat = $request->input('lat');
    $lon = $request->input('lon');

    $apiKey = env('OPENWEATHER_API_KEY');
    $client = new \GuzzleHttp\Client();

    if ($lat && $lon) {
        // Fetch weather by coordinates
        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}&units=metric";
    } elseif ($city) {
        // Fetch weather by city name
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
    } else {
        // Default to London if no input
        $url = "https://api.openweathermap.org/data/2.5/weather?q=London&appid={$apiKey}&units=metric";
    }

    $response = $client->get($url);
    $weatherData = json_decode($response->getBody(), true);

    $weatherId = $weatherData['weather'][0]['id'];
    if ($this->isSevereWeather($weatherId)) {
        // Send an email alert
        if (auth()->check()) { // Ensure the user is logged in
            Mail::to(auth()->user()->email)->send(new SevereWeatherAlert($weatherData));
        }
    }

    return view('weather.show', compact('weatherData'));
}

// Helper function to determine severe weather
private function isSevereWeather($weatherId)
{
    // Weather condition codes for severe weather (examples)
    $severeWeatherIds = [
        // Thunderstorm
        200, 201, 202, 210, 211, 212, 221, 230, 231, 232,
        // Extreme
        900, 901, 902, 903, 904, 905, 906,
    ];

    return in_array($weatherId, $severeWeatherIds);
}

    // Fetch places data
    public function places(Request $request)
{
    // Get the search query from request
    $query = $request->input('query', '');

    // Fetch the API key from the .env file
    $apiKey = env('PLACES_API_KEY');

    if ($query) {
        // API endpoint for places search
        $url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query={$query}&key={$apiKey}";

        // Initialize Guzzle HTTP client
        $client = new Client();
        $response = $client->get($url);
        $placesData = json_decode($response->getBody(), true);

        // Return JSON response for AJAX
        return response()->json($placesData);
    }

    // Return empty response if no query
    return response()->json([]);
}

}
