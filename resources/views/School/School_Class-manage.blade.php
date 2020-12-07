@extends('School.School')
@section('scontent')
        <div>
            @foreach($classData as $item)
                <div>
                    {{ $item->name }}
                </div>
            @endforeach
        </div>
@endsection
