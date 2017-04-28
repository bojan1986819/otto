@extends('layouts.app')

@section('content')
{{--<div class="welcome-container">--}}
    <div class="container project-text">
        <!-- Carousel
        ================================================== -->
        <div id="projectsCarousel" class="carousel" style="margin-top: 90px">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach( $projects as $project )
                    <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach

            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($projects as $project)
                    <div class="item" id="testid">
                        <video width="100%" id="video{{$loop->index+1}}" loop muted poster="{{ route('imagecache',['template'=>'project',
                        'filename'=>explode('/',$project->poster)[2]]) }}">
                            <source src="{{URL::to($project->video)}}" type="video/mp4">
                        </video>
                        <div class="carousel-caption project-video-text">
                            {{$project->title}}<br>
                            {{$project->company}}<br>
                            <button class="btn btn-info play-button" onclick="playPauseVideo()">Play/Pause</button>
                        </div>
                    </div>
                @endforeach

            </div>
            <a class="left carousel-control" href="#projectsCarousel" role="button" data-slide="prev" id="left">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#projectsCarousel" role="button" data-slide="next" id="right">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel -->

        <!-- Project Detail -->
        <div class="project-details">
            @foreach($projects as $project)
                <div id="video{{$loop->index+1}}detail" style="display: none">
                    {{--Description--}}
                    <div class="row project-desc-title text-center">
                        <h1>
                        </h1>
                    </div>
                    <div class="row project-desc">
                        <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
                            <p>
                                {{$project->description}}
                            </p>
                        </div>
                    </div>

                    {{--Cast part--}}
                    <div class="row project-cast-title text-center">
                        <h1>
                            Cast & Crew
                        </h1>
                    </div>
                    @foreach($casts->where('project_id',$project->id) as $cast)
                    <div class="row project-cast-item">
                        <div class="col-xs-6 col-md-3 col-md-offset-3 text-center">
                            <h5>{{$cast->name}}</h5>
                        </div>
                        <div class="col-xs-6 col-md-3 text-center">
                            <h5>{{$cast->job}}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
{{--</div>--}}
@endsection
