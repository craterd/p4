@extends('layouts.master')

@section('header')
    <div class="secondtitle">
        My Courses
    </div>
@endsection

@section('content')
    @foreach ($courses as $course)
        <h3>{{ $course->course_name }} (Slope: {{ $course->slope }}, 
                                        Rating: {{ $course->rating }}, 
                                        Yardage: {{ $course->yardage }})</h3>
    @endforeach
@endsection