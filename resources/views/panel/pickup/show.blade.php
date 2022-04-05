<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pickup Info') }}
        </h2>
    </x-slot>
    <div>
        <form action="{{route('set_picked_up', $pickup->id)}}" method="post">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{__('Pickup')}}
            </button>
        </form>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Pickup date: </h1>
        <p class="text-gray-600 leading-tight">{{ $pickup->planned_pickup_date }}</p>
        <br/>
        <h1 class="font-semibold text-l text-gray-800 leading-tight">Depot Name: </h1>
        <p class="text-gray-600 leading-tight">{{ $pickup->depot->name }}</p>
        <br/>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10" >
                <tr>
                    <th scope="col" class="px-6 py-3">{{__('Package_name')}}</th>
                    <th scope="col" class="px-6 py-3">{{__('Receiver_name')}}</th>
                    <th scope="col" class="px-6 py-3">{{__('Weight')}}</th>
                    <th scope="col" class="px-6 py-3">{{__('Measurements')}}</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($pickup->packages as $package)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $package->name }}</td>
                        <td class="px-6 py-4">{{ $package->receiver_name }}</td>
                        <td class="px-6 py-4">{{ $package->weight }}</td>
                        <td class="px-6 py-4">{{ $package->measurements }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
