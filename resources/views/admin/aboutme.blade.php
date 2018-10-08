@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px">
    @include('includes.adminbar')
    <div class="row aboutme-top-box">
        <h1 class="topic-name">Aboutme szerkeszése</h1>
    </div>
    <div class="row aboutme-box">
        {!! Form::open(['route' => ['admin_aboutme_update'], 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('description', 'Leírás:*') !!}
            {!! Form::textarea('description',$aboutme->aboutme,
            ['class' => 'form-control',
            'required' => 'required',
            ]) !!}
        </div>
        <div class="form-group" style="width: 300px;">
            <div class="slim"
                 data-post="input,output,actions"
                 data-crop="{{$aboutme->profilecrop}}"
                 data-rotation="{{$aboutme->profilerotation}}">
                <img src="{{ route('imagecache',['template'=>'original', 'filename'=>$aboutme->profile]) }}"/>
                <input type="file" name="profile"/>
            </div>
        </div>
        {!! Form::submit('Frissítés', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

    <div class="row aboutme-box">
        {!! $out_quotes !!}
    </div>
</div>
@endsection
