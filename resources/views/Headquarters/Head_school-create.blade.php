@extends('Headquarters/Head_master')
<script src="{{asset('js/Head/Head.js')}}" defer></script>
@section('head-content')
    <form action="{{action('Headquartes\HeadController@create')}}" method="get">
        @csrf
        <div class="form-group ">
            <label for="school_name">学校名称：</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @error('name')
              <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="school_name">英文名称：</label>
            <input type="text" class="form-control" name="name_en">
        </div>
        <div class="form-group">
            <label for="school_name">图片：</label>
            <input type="text" class="form-control" name="picture">
            @error('picture')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="school_name">联系电话：</label>
            <input type="text" class="form-control" name="phone">
            @error('phone')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="school_name">邮箱地址：</label>
            <input type="text" class="form-control" name="email">
            @error('eamil')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="school_name">详细地址：</label>
            <input type="text" class="form-control" name="address">
            @error('address')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="school_name">描述：</label>
            <input type="text" class="form-control" name="description">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
