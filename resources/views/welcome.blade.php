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

    @if($quotes->count()!=0)
    <div id="quotesCarousel" class="carousel" style="margin-top: 90px">
        <!-- Indicators -->
        {{--<ol class="carousel-indicators">--}}
            {{--@foreach( $quotes as $quote )--}}
                {{--<li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>--}}
            {{--@endforeach--}}

        {{--</ol>--}}
        <div class="carousel-inner" role="listbox">
            @foreach($quotes as $quote)
                <div class="item col-sm-6 col-sm-offset-3">
                <blockquote class="quoteblock">
                    <div class="row author">
                        <div class="author">
                            {{$quote->author}}
                        </div>
                    </div>
                    <div class="row">
                        <strong class="quote">
                            {{$quote->quote}}
                        </strong>
                    </div>
                </blockquote>
                </div>
            @endforeach

        </div>
        {{--<a class="left carousel-control" href="#quotesCarousel" role="button" data-slide="prev" id="left">--}}
            {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Previous</span>--}}
        {{--</a>--}}
        {{--<a class="right carousel-control" href="#quotesCarousel" role="button" data-slide="next" id="right">--}}
            {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Next</span>--}}
        {{--</a>--}}
    </div><!-- /.carousel -->
    @endif
</div>
@endsection
