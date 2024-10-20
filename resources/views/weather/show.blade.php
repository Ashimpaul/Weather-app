
<h1>Weather in {{ $weatherData['name'] }}</h1>
<p>Temperature: {{ $weatherData['main']['temp'] }}°C</p>
<p>Humidity: {{ $weatherData['main']['humidity'] }}%</p>
<p>Wind Speed: {{ $weatherData['wind']['speed'] }} m/s</p>
<p>Weather: {{ $weatherData['weather'][0]['description'] }}</p>
