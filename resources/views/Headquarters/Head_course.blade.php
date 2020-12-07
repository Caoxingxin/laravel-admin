@extends('Headquarters/Head_master')
<script src="{{asset('js/Head/Head_course.js')}}" defer></script>
@section('head-content')
    <div>
        @foreach($courseData as $item)
            <div value="{{$item->name}}">
                <a href="">{{ $item->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
