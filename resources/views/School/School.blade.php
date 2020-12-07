
@extends('layouts.app')

@section('content')
    <div style="width: 600px;background: red">
        <div>
            {{$school_id}}
        </div>
        <img src="{{ url('image/'.$school_id.'.jpg') }}" width="500px" height="500px" alt="">
        <div>
            123
        </div>
        <a href="{{action('School\SchoolController@class_list',['school_id'=>$school_id])}}">班级:</a>
    </div>
    <main class="py-4" id="pjax-container">
        @yield('scontent')
    </main>
@endsection
