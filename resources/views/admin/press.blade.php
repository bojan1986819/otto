@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px">
    @include('includes.adminbar')

    <div class="row aboutme-top-box">
        <h1 class="topic-name">Sajtó hozzáadása</h1>
    </div>
    <div class="row aboutme-box">
        {!! $press_output !!}
    </div>

</div>
@endsection
