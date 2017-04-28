@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px">
    <h1 class="text-center title-text">Press</h1>
    {{$presses->links()}}
    @foreach($presses as $press)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="card card-inverse card-info">
            {{--<img class="card-img-top" src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif">--}}
            <div class="card-block">
                @if($press->link!=null)
                    <h4 class="card-title"><a href="{{$press->link}}">
                        {{$press->title}}</a></h4>
                @else
                    <h4 class="card-title">
                        {{$press->title}}
                    </h4>
                @endif
                <h8>{{$press->medium}}</h8>
            </div>
            <div class="card-block">
                <div class="card-text">
                    {{$press->description}}
                </div>
            </div>
            <div class="card-footer">
                @if($press->link!=null)
                <a class="btn btn-info btn-sm" href="{{$press->link}}">Check</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    {{$presses->links()}}

</div>

@endsection
