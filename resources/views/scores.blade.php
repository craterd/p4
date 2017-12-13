@extends('layouts.master')

@section('header')
    <div class="secondtitle">
        My Score History
    </div>
@endsection

@section('content')
    @if(count($scores) == 0)
        No history available
    @elseif($player == '')
        @foreach ($scores as $score)
            <h3>{{ $score->player['first_name'] }} {{ $score->player['last_name'] }}</h3>
            <h3>{{ $score->score }}   ({{ $score->date }})</h3>
            <br>
        @endforeach
    @else
        Scores for player {{ $scores[0]->player['first_name'] }} {{ $scores[0]->player['last_name'] }}
        @foreach ($scores as $score)
            <h3>{{ $score->score }}   ({{ $score->date }})</h3>
        @endforeach
    @endif
@endsection