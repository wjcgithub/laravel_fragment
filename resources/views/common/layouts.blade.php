<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('static/css/bootstrap.min.css') }}">
</head>
<body>

{{--头部--}}
@section('header')
    <div class="jumbotron">
        <div class="container">
            <h2>studing laravel</h2>

            <p>玩转－　laravel表单</p>
        </div>
    </div>
@show

<div class="container">
    <div class="row">

        {{--左侧菜单区域--}}
        <div class="col-md-3">
            @section('leftmenu')

                <div class="list-group">
                    <a href="{{ url('student/index') }}" class="list-group-item
                    {{ Request::getPathINfo() !== '/student/create' ? 'active' : '' }}
                    ">学生列表</a>

                    <a href="{{ url('student/create') }}" class="list-group-item
                    {{ Request::getPathINfo() == '/student/create' ? 'active' : '' }}
                    ">新增学生</a>
                </div>
            @show

        </div>

        {{--右侧内容区--}}
        <div class="col-md-9">
           @yield('content','default content')
            {{--@section('content')--}}
                {{--default content--}}
            {{--@stop--}}
            {{--@show--}}
        </div>

    </div>
</div>

{{--尾部--}}
@section('footer')
<div class="jumbotron" style="margin: 0;">
    <div class="container">
        <span>
            @ 2016 beijing china
        </span>
    </div>
</div>
@show

<script src="{{ asset('static/js/jquery-3.1.0.min.js') }}"></script>
<script src="{{ asset('static/js/bootstrap.min.js') }}"></script>


</body>
</html>