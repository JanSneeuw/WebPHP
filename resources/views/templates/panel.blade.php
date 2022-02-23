@include('templates.page', ['titlebase' => 'Trackr Admin'])

@section('content')
    <div class="wrapper">
        <aside>
            {{-- Admin panel sidebar --}}
            @include('templates.sidebar')
        </aside>
        <main>
            {{-- Admin panel content, may be whatever view --}}
            <div class="card">
            </div>
        </main>
    </div>
@show