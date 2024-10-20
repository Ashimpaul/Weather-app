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
                    <form action="/weather" method="GET">
                        <div class="form-group">
                            <label for="city">Enter City:</label>
                            <input type="text" name="city" class="form-control" placeholder="e.g., London" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Check Weather</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
