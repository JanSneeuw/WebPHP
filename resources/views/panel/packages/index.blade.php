<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packages') }}
        </h2>
    </x-slot>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10">
            <tr>
                <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                <th scope="col" class="px-6 py-3">{{__('Provider')}}</th>
                <th scope="col" class="px-6 py-3">{{__('Receiver_address')}}</th>
                <th scope="col" class="px-6 py-3">{{__('Receiver_name')}}</th>
                <th scope="col" class="px-6 py-3">{{__('Weight')}}</th>
                <th scope="col" class="px-6 py-3">{{__('Measurements')}}</th>
                <th scope="col" class="px-6 py-3">{{__('Status')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $package->name }}</td>
                    <td class="px-6 py-4">{{ $package->provider }}</td>
                    <td class="px-6 py-4">{{ $package->receiver_address }}</td>
                    <td class="px-6 py-4">{{ $package->receiver_name }}</td>
                    <td class="px-6 py-4">{{ $package->weight }}</td>
                    <td class="px-6 py-4">{{ $package->measurements }}</td>
                    <td class="px-6 py-4">{{ $package->status }}</td>
                </tr>
            @endforeach
    </table>
</x-app-layout>
