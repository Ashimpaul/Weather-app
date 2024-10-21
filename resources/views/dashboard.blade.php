<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Weather Form -->
                    <form action="{{ route('weather') }}" method="GET">
                    
                        <div class="form-group">
                            <label for="city">Enter City:</label>
                            <input type="text" name="city" class="form-control-md rounded-lg" placeholder="e.g., London" required>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-block">
  <button type="submit"  class="btn btn-primary" type="button">Check Weather</button>
  <button id="get-location" class="btn btn-primary" type="button">Use Current Location</button>
</div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('get-location').addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    // Redirect to weather route with coordinates
                    window.location.href = `/weather?lat=${position.coords.latitude}&lon=${position.coords.longitude}`;
                }, function (error) {
                    alert('Error getting location: ' + error.message);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        });
    </script>
</x-app-layout>
