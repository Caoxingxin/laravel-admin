@extends('Headquarters/Head_master')
<link href="{{asset('css/table/bootstrap-table.min.css')}}" rel="stylesheet">
<meta name="_token" content="{{ csrf_token() }}"/>

<script src="{{asset('js/table/bootstrap-table.min.js')}}" defer></script>
<script src="https://unpkg.com/bootstrap-table@1.15.3/dist/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="{{asset('js/Head/Head.js')}}" defer></script>
<script>
    var values;
    var values_school_id;
    var school_id = function (value,row,index) {
        values_school_id = value;
        return '<span id="school'+values_school_id+'">'+value+'</span>';
    }
    var status_value = function (value,row,index) {
        var result = "";
        values=value;
        if (value == 20){
            return result = '<span style="color: green">运营中</span>';
        }else if(value == 10){
            return result = '<span style="color: blue">筹备中</span>';
        }else if(value == -20){
            return result = '<span style="color: red">暂停使用</span>';
        }
    }
    var operate_for = function (value, row, index) {
        var result = "";
        if (values == 20){
            result = '<a href="#" onclick="update_status('+row['id']+',-20)">暂停使用</a>';
        }else if(values == 10){
            return result = '<a href="#" onclick="update_status('+row['id']+',20)">开始运营</a>';
        }else if(values == -20){
            return result = '<a href="#" onclick="update_status('+row['id']+',20)">恢复使用</a>';
        }
        return result;
    }
    var school_detail =function (value,row,index) {
        return '<a href="#" onclick="detail('+row['id']+')">'+value+'</a>';
    }
    function detail(school_id) {
        $.ajax({
            type:"GET",
            url :"{{url('/head-school/detail')}}",
            dateType:'json',
            header: {'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                "id" : school_id,
            },
            success: function (data) {
                $('#master').css('display','none');
                $('#detail').css('display','');
                $('#id').val(data['id']);
                $('#schoolname').val(data['name']);
                $('#schoolname_en').val(data['name_en']);
                $('#schoolpicture').val(data['picture']);
                $('#schoolphone').val(data['phone']);
                $('#schoolemail').val(data['email']);
                $('#schooladdress').val(data['address']);
                $('#schooldescription').val(data['description']);
            },
        })
    }
    function update_status(school_id,status) {
       $.ajax({
           type:"post",
           url :"{{url('/head-school/update-status')}}",
           dateType:'json',
           headers: {'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data: {
               "id" : school_id,
               "status" : status,
           },
           success: function (data) {
               location.reload('/head-school');
           },
           error: function(request, status, error){
               alert(error);
           },
       })
    }
    function update() {
        $.ajax({
            type:"post",
            url :"{{url('/head-school/update')}}",
            dateType:'json',
            headers: {'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
            },
            success: function (data) {
                location.reload('/head-school');
            },
            error: function(request, status, error){
                alert(error);
            },
        })
    }
</script>
@section('head-content')
    <div class="table-responsive" id="master">
        <div id="toolbar" class="btn-group" style="top: 10px;width: 90px;margin: 0 30px 0 30px">
            <a href="{{url('/head-school/create-list')}}" id="btn_add" type="button" class="btn btn-primary" style="color: white">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <span style="margin-top: 2px">添加</span>
            </a>
        </div>
        <table id="table1"
               data-toggle="table"
               data-data="{{json_encode($schoolData,true)}}"
               data-show-columns="true"

               data-search="true"
               data-show-search-button="true"
               data-show-search-clear-button="true"
               data-search-align="left"

               data-show-refresh="true"
               data-show-toggle="true"
               data-pagination="true"
               data-height="730"
               data-page-size="15"
               data-sort-name="id"
               data-width-unit="100px"
               data-cell-style="cellStyle"
               data-toolbar="#toolbar"
               data-page-list=[5,10,15,20]
               class="table-hover"

        >
            <thead>
            <tr>
                <th data-checkbox="true" data-field="'check"></th>
                <th data-field="id" data-formatter="school_id">id</th>
                <th data-field="name" data-formatter="school_detail">名称</th>
                <th data-field="phone">联系方式</th>
                <th data-field="email">邮箱</th>
                <th data-field="address">地址</th>
                <th data-field="status" data-formatter="status_value">状态</th>
                <th data-field="operate" data-formatter="operate_for">操作</th>
            </tr>
            </thead>
        </table>
        {{--        <br><br>--}}
        {{--        @foreach(json_decode($schoolData) as $item)--}}
        {{--            <div>--}}
        {{--                <a href="{{action('School\SchoolController@list',['school_id'=>$item->id])}}">{{ $item->name }}</a>--}}
        {{--            </div>--}}
        {{--        @endforeach--}}
    </div>
    <div id="detail" style="display: none">
        <form action="" id="datailinfo">
            @csrf
            <div class="form-group ">
                <label for="school_name">学校名称：</label>
                <input type="hidden" name="id" id="id"></input>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="schoolname">
                @error('name')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="school_name">英文名称：</label>
                <input type="text" class="form-control" name="name_en" id="schoolname_en">
            </div>
            <div class="form-group">
                <label for="school_name">图片：</label>
                <input type="text" class="form-control" name="picture" id="schoolpicture">
                @error('picture')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="school_name">联系电话：</label>
                <input type="text" class="form-control" name="phone" id="schoolphone">
                @error('phone')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="school_name">邮箱地址：</label>
                <input type="text" class="form-control" name="email" id="schoolemail">
                @error('eamil')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="school_name">详细地址：</label>
                <input type="text" class="form-control" name="address" id="schooladdress">
                @error('address')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="school_name">描述：</label>
                <input type="text" class="form-control" name="description" id="schooldescription">
            </div>

            <button type="button" class="btn btn-primary" onclick="update()">保存</button>
        </form>
    </div>
@endsection


