<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car List') }}
        </h2>
        <button onclick=location.href='{{ route('cars.create') }}' type="button" class="btn btn-info text-white hover:bg-blue-700">Car Create</button>
    </x-slot>

    <x-car-list :cars="$cars"/>
</x-app-layout>
