@extends('layouts.master')

@section('header')
    <div class="secondtitle">
        My Players
    </div>
@endsection

@section('content')
    @if(count($players) == 0)
        No players registered
    @else
        @foreach ($players as $player)
            <a href="{{ url('/scores/'.$player->first_name.$player->last_name) }}"><h3>{{ $player->first_name }} {{ $player->last_name }}</h3></a>
        @endforeach
    @endif
@endsection