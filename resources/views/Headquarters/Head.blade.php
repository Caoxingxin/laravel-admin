@extends('Headquarters/Head_master')
<script src="{{asset('js/Head/Head.js')}}" defer></script>
@section('head-content')
    <div>
        <form action="{{}}" method="POST">
            @csrf

            @foreach($schoolData as $item)
                <input type="text" name="schoolname" class="form-control" required="required" placeholder="请输入标题"
                       value="{{ isset($article) ? $article->title : ''}}">
                <br>
                <div value="{{$item->name}}">
                    <a href="{{action('School\SchoolController@list',['school_id'=>$item->id])}}">{{ $item->name }}</a>
                </div>
            @endforeach
            <textarea name="content" rows="10" class="form-control" required="required"
                      placeholder="请输入内容">{{ isset($article) ? $article->content : ''}}</textarea>
            <br>
            {{--<input type="text" name="commit" class="form-control" required="required" placeholder="请输入标题">--}}
            <br>
            <p>{!! captcha_img() !!}</p>
            <button class="btn btn-lg btn-info">{{ $btnName }}</button>
        </form>

    </div>
@endsection


