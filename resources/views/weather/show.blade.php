
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{  $weatherData['name'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Weather Form -->
                    
<div class="row d-flex justify-content-center py-5">
  <div class="col-md-8 col-lg-6 col-xl-5">

    <div class="card text-body" style=" border-radius: 35px;">
      <div class="card-body p-4">

        <div class="d-flex">
          <h6 class="flex-grow-1">Weather in {{ $weatherData['name'] }}</h6>
          <h6>15:07</h6>
        </div>

        <div class="d-flex flex-column text-center mt-5 mb-4">
          <h6 class="display-4 mb-0 font-weight-bold">{{ $weatherData['main']['temp'] }}°C</h6>
          <span class="small" style="color: #868B94">{{ $weatherData['weather'][0]['description'] }}</span>
        </div>

        <div class="d-flex align-items-center">
          <div class="flex-grow-1" style="font-size: 1rem;">
            <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1">Wind Speed: {{ $weatherData['wind']['speed'] }} m/s
              </span>
            </div>
            <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1">Humidity: {{ $weatherData['main']['humidity'] }}%
              </span></div>
            <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"> 0.2h
              </span></div>
          </div>
          <div>
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
              width="100px">
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

