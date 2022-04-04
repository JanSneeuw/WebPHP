<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planned Pickups') }}
        </h2>
    </x-slot>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10">
            <tr>
                <th scope="col" class="px-6 py-3">{{__('Depot Name')}}</th>
                <th scope="col" class="px-6 py-3">@sortablelink('planned_pickup_date', __('Planned Pickup Date'))</th>
                <th scope="col" class="px-6 py-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pickups as $pickup)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $pickup->depot->name }}</td>
                    <td class="px-6 py-4">{{ $pickup->planned_pickup_date }}</td>
                    <td>
                        <form action="{{route('show_pickup', $pickup->id)}}" method="GET">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{__('Show')}}</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    {{ $pickups->appends(\Request::except('page')) }}
</x-app-layout>
