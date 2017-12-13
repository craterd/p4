@extends('layouts.master')

@section('header')
    <small>My Score History</small>
@endsection

@section('content')
    @foreach ($scores as $score)
        <h3>{{ $score->score }}   ({{ $score->date }})</h3>
    @endforeach
@endsection