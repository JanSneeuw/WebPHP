<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Labels') }}
        </h2>
    </x-slot>
    <form method="GET" action="{{route('downloadbulkpdf')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Create Labels</button>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10">
            <tr>
                <th></th>
                <th scope="col" class="px-6 py-3">@sortablelink('receiver_name', __('Name') )</th>
                <th scope="col" class="px-6 py-3">{{__('Receiver_address')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($labels as $label)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <input type="checkbox" name="labels[]" value="{{$label->id}}">
                    </td>
                    <td class="px-6 py-4">{{ $label->receiver_name }}</td>
                    <td class="px-6 py-4">{{ $label->address->street }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    {{ $labels->appends(\Request::except('page')) }}
</x-app-layout>
