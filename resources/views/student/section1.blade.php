section1
@extends('layouts)

@section('header')
    @parent
    header
@stop()

<!-- 模板中输出php变量 -->
{{ $name }}

<!-- 模板中输出php代码 -->
{{ time() }}
{{ date('Y-m-d', time()) }}
{{ in_array($name, $arr) ? 'true' : 'false' }}
{{ dd($arr) }}
{{ isset($name) ? $name : 'default' }}
{{ $name or 'default' }}

<!-- 原样输出 -->
@{{ $name }}

<!-- 模板中的注释-->
{{--fdsfd--}}

<!-- 引入子视图 -->
{{ @include('student.common1', ['message' => '我是子视图传递的消息']) }}

<!--  流程控制  -->
@if($name == 'lisi')
    lisi
@elseif($name == 'ww')
    ww
@else
    who am you?
@endif

<br>
{{--unless相当于if的取反--}}
@unless($name == 'sean')
    sean
@endunless

<br>
@for($i=0; $i<10; $i++)
        {{ $i }}
@endfor

<br>
@foreach($students as $student)
    {{ $student->name }}
@endforeach

<br>
@forelse($students as $student)
    {{ $student->name }}
@empty
    NULL
@endforelse

<br>
@while($k)
    1
    {{ $k-- }}
@endwhile