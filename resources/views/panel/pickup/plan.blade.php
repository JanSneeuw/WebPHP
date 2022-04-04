<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pickup Planner') }}
        </h2>
    </x-slot>
    <form class="form-inline" method="GET">
        <div class="form-group mb-2">
            <label for="filter" class="col-sm-2 col-form-label">Filter</label>
            <input type="text" class="form-control" id="filter" name="filter" placeholder="Product name..." value="{{$filter}}">
        </div>
        <button type="submit" class="btn btn-default mb-2">Filter</button>
    </form>
    <form method="GET" action="{{route('plan_pickup')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Plan Pickup</button>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10">
            <tr>
                <th></th>
                <th scope="col" class="px-6 py-3">@sortablelink('name', __('Name') )</th>
                <th scope="col" class="px-6 py-3">@sortablelink('provider', __('Provider'))</th>
                <th scope="col" class="px-6 py-3">@sortablelink('address_id', __('Receiver_address'))</th>
                <th scope="col" class="px-6 py-3">@sortablelink('receiver_name', __('Receiver_name'))</th>
                <th scope="col" class="px-6 py-3">@sortablelink('weight', __('Weight'))</th>
                <th scope="col" class="px-6 py-3">@sortablelink('measurements', __('Measurements'))</th>
                <th scope="col" class="px-6 py-3">@sortablelink('status', __('Status'))</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($packages as $package)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <input type="checkbox" name="packages[]" value="{{$package->id}}">
                    </td>
                    <td class="px-6 py-4">{{ $package->name }}</td>
                    <td class="px-6 py-4">{{ $package->provider }}</td>
                    <td class="px-6 py-4">{{ $package->address->street }}</td>
                    <td class="px-6 py-4">{{ $package->receiver_name }}</td>
                    <td class="px-6 py-4">{{ $package->weight }}</td>
                    <td class="px-6 py-4">{{ $package->measurements }}</td>
                    <td class="px-6 py-4">{{ $package->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    {{ $packages->appends(\Request::except('page')) }}
</x-app-layout>
