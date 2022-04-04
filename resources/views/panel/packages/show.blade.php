<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package Info ') }}
        </h2>

        {!! DNS2D::getBarcodeHTML($qrcode, 'QRCODE') !!}
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Name: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->name }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Provider: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->provider }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Receiver Address: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->receiver_address }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Receiver Name: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->receiver_name }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Weight: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->weight }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Measurements: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->measurements }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Status: </h1>
        <p class="text-gray-600 leading-tight">{{ $package->status }}</p>
    </x-slot>
</x-app-layout>
