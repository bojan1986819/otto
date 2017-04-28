@extends('layouts.app')

@section('content')
<div class="container welcome-container">
    <div class="row header-row">
        <div class="col-md-8 col-md-offset-2" align="center">
            <h1 class="header-text">Ottó J Bánovits</h1>
            <h1 class="header-text">Director</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <video id="video" autoplay loop controls muted poster="{{ route('imagecache',['template'=>'poster', 'filename'=>'showreel.jpg']) }}" width="100%">
                <source src="{{URL::to('videos/showreel.mov')}}" type="video/mp4">
            </video>
            {{--<div class="overlay">--}}
                {{--<h1>CSÚNYA :D</h1>--}}
            {{--</div>--}}
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-sm-8 col-sm-offset-2 text-justify">--}}
            {{--<p>--}}
                {{--I try not to separate my work, my films from how I live...--}}
                {{--not to make a difference between my films and my life.--}}
                {{--Cinema requires scarification of the self, I should belong to it,--}}
                {{--it should not belong to me...Cinema uses my life, not vice-versa....--}}
            {{--</p>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
