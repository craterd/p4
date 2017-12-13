@extends('layouts.master')


@section('title')
    Edit player
@endsection

@push('head')
@endpush

@section('header')
    <div class="secondtitle">
        Edit player
    </div>
@endsection

@section('content')
    <form method='GET' action='/changeplayer'>

        <!-- display first input box, retaining any valid input value -->
        <label>First Name:
            <input type='text' name='first_name' value='{{ $player->first_name }}'/>
        </label>

        <!-- display second input box, retaining any valid input value -->
        <label>Last Name:
            <input type='text' name='last_name' value='{{ $player->last_name }}'/>
        </label>
        <br><br>
        <label>Handicap:
            <input type='text' name='handicap' value='{{ $player->handicap }}'/>
        </label>
        <br><br>
        <br><br>
        <input type='hidden' name='id' value='{{ $player->id }}'/>
        <!-- display submit button with value of 'Submit changes' -->
        <input type='submit' value='Submit changes'>
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
                Player updated. Further changes will be to same record. Click 'Players' above to edit a different player.
            </div>
        @endif
    </form>
@endsection


@push('body')

@endpush