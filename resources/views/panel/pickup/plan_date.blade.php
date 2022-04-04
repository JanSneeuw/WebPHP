<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pickup Planner') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('store_pickup')}}">
        @csrf
        @foreach($packages as $package)
            <input type="hidden" name="packages[]" value="{{$package}}">
        @endforeach
        <label for="depot_id">Depot</label>
        <br/>
        <select id="depot_id" name="depot_id" style="width: 200px">
            @foreach($depots as $depot)
                <option value="{{$depot->id}}">{{$depot->name}}</option>
            @endforeach
        </select>
        <br/>
        @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="date">Pickup Date</label>
        <br/>
        <input type="datetime-local" id="date" name="date">
        <br/>
        <button type="submit" class="btn btn-primary mb-2">Plan Pickup</button>
    </form>
</x-app-layout>
