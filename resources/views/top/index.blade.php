@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>TOP {{ $top }}</h4>
        <nav>
            <a href="{{ url('/top/books/'.$period) }}">TOP books</a>|
            <a href="{{ url('/top/authors/'.$period) }}">TOP authors</a>
        </nav>
        <br>
        <div class="btn-group" role="group" aria-label="...">
            <a href="{{url('/top/'.$top.'/week')}}" class="btn btn-default">Week</a>
            <a href="{{url('/top/'.$top.'/month')}}" class="btn btn-default">Month</a>
            <a href="{{url('/top/'.$top.'/year')}}" class="btn btn-default">Year</a>
        </div>
        
        <br>
        @if(is_array($result))
        <ol>
            @foreach($result as $r)
                <li>{{$r->name}}</li>
            @endforeach
        </ol>
        @endif
    </div>
</div>

@endsection