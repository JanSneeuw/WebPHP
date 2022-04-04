<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pickup Success ') }}
        </h2>
    </x-slot>
    <h2>Successfully added pickup</h2>
    <br/>
    <h3>Pickup Date and Time</h3><br/>
    <p>{{$pickup->planned_pickup_date}}</p>
</x-app-layout>
