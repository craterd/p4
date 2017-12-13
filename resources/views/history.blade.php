@extends('layouts.master')

@section('header')
    <div class="secondtitle">
        My Score History
    </div>
@endsection

@section('content')
    @foreach ($scores as $score)
        <h3>{{ $score->score }}   ({{ $score->date }})</h3>
    @endforeach
@endsection