@extends('partials.site')

@section('content')

    Menus

    @foreach( $menus as $menu )
        <h3>{{ $menu->name }} {{ $menu->info ? "(".$menu->info.")" : "" }}</h3>
        <p>{{ $menu->description }}</p>
    @endforeach

@endsection
