<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 h-10">
            <tr>
                <th scope="col" class="px-6 py-3">@sortablelink('name', __('name') )</th>
                <th scope="col" class="px-6 py-3">@sortablelink('email', __('email') )</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($customers as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{ $customers->appends(\Request::except('page')) }}
</x-app-layout>
