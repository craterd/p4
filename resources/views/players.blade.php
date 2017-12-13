@extends('layouts.master')

@section('header')
    <div class="secondtitle">
        My Players
    </div>
    <div class="thirdtitle">
        <a href="/newplayer">Add a player</a>
        <a href="/chooseplayer">Edit a player</a>
        <a href="/chooseplayer2">Delete a player</a>
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
    <!-- display either alert/error or the delete result -->
    @if ( !isset($results) )
        @if (isset($errors) && count($errors) > 0)
            <div class='alert alert-danger'>
                @foreach ($errors as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
    @else
        <div class='alert alert-info'>
            Player deleted.
        </div>
    @endif
@endsection