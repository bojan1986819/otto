@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px">
    @include('includes.adminbar')

    <div class="row aboutme-top-box">
        <h1 class="topic-name">Projectek hozzáadása</h1>
    </div>
    <div class="row aboutme-box">
        {!! $projects_output !!}
    </div>
    <div class="row aboutme-box">
        {!! $cast_output !!}
    </div>
    <div class="row aboutme-box">
        {!! $award_output !!}
    </div>
</div>
@endsection
