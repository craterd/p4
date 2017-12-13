@extends('layouts.master')


@section('title')
    Add player
@endsection

@push('head')
@endpush

@section('header')
    <div class="secondtitle">
        Add a Player
    </div>
@endsection

@section('content')
    <form method='GET' action='/newplayer'>

        <!-- display first input box, retaining any valid input value, sanitized of course -->
        <label>First Name:
            <input type='text' name='first_name' value='{{ isset($first_name) && $first_name }}'>
        </label>

        <!-- display second input box, retaining any valid input value, sanitized of course -->
        <label>Last Name:
            <input type='text' name='last_name' value='{{ isset($last_name) && $last_name }}'>
        </label>
        <br><br>
        <label>Handicap:
            <input type='text' name='handicap' value='{{ isset($handicap) && $handicap }}'>
        </label>
        <br><br>
        <br><br>
        <!-- display submit button with value of 'Submit' -->
        <input type='submit' value='Submit'>
        <br><br>

        <!-- display either alert/error or the result -->
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
                Player added.
            </div>
        @endif
    </form>
@endsection


@push('body')

@endpush