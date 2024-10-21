<!DOCTYPE html>
<html>
<head>
    <title>Severe Weather Alert</title>
</head>
<body>
    <h1>Severe Weather Alert in {{ $weatherData['name'] }}</h1>
    <p>Current weather condition: {{ $weatherData['weather'][0]['description'] }}</p>
    <p>Temperature: {{ $weatherData['main']['temp'] }}°C</p>
    <p>Please take necessary precautions and stay safe.</p>
</body>
</html>
