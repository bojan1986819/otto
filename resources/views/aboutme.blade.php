@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px">

    <div class="row aboutme-top-box">
        <h1 class="topic-name">ABOUT ME</h1>
    </div>
    <div class="row aboutme-box">
        <div class="col-sm-6">
            <p class="aboutme-text">
                {{$aboutme->aboutme}}
            </p>

            <div class="row">
                <div class="col-sm-3 col-sm-offset-8 aboutme-text">
                    Ottó J Bánovits
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <img class="profile" src="{{ route('imagecache',['template'=>'original', 'filename'=>$aboutme->profileoutput]) }}" alt="Otto J Banovits">
        </div>
    </div>
</div>
@endsection
