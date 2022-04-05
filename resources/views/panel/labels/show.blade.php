<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package Info') }}
        </h2>
    </x-slot>
    <div class="flex flex-wrap flex-col items-center">
        {{ $labels->links() }}
        <br/>
        @foreach($labels as $label)
            {!! DNS2D::getBarcodeHTML($label->qrcode_link, 'QRCODE') !!}
            <br/>
            <h1 class="font-semibold text-l text-gray-800 leading-tight">Receiver Name: </h1>
            <p class="text-gray-600 leading-tight">{{ $label->receiver_name }}</p>
            <br/>
            <h1 class="font-semibold text-l text-gray-800 leading-tight">Receiver Address: </h1>
            <p class="text-gray-600 leading-tight">{{ $label->street }}</p>
            <br/>
            <form method="get" action="{{route('downloadpdf')}}">
                <input type="hidden" name="label_id" value="{{$label->id}}">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download PDF</button>
            </form>
        @endforeach

    </div>
</x-app-layout>
