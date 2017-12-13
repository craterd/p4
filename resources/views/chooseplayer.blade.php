@extends('layouts.master')

@section('header')
    <div class="secondtitle">
        Choose a player to edit
    </div>
@endsection

@section('content')
    @if(count($players) == 0)
        No players registered
    @else
        @foreach ($players as $player)
            <a href="{{ url('/editplayer/'.$player->first_name.$player->last_name) }}"><h3>{{ $player->first_name }} {{ $player->last_name }}</h3></a>
        @endforeach
    @endif
@endsection