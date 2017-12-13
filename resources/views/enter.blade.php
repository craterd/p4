@extends('layouts.master')

@section('header')
    My Golf Scores
@endsection

@section('content')
    <div class="links">
        <a href="/history">Score History</a>
        <a href="/add">Add a Score</a>
        <a href="/edit">Edit a Score</a>
        <a href="/courses">List Courses</a>
        <a href="/handicap">Handicap</a>
    </div>
@endsection