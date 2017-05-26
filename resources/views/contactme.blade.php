@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px">
    <h1 class="text-center title-text">Contact</h1>
    {!! Form::open(['route' => ['postemail'], 'method' => 'post', 'class' => 'contact-form cf']) !!}
        <div class="half contact-left cf">
            <input type="text" name="name" id="input-name" placeholder="Name">
            <input type="email" name="email" id="input-email" placeholder="Email address">
            <input type="text" name="subject" id="input-subject" placeholder="Subject">
        </div>
        <div class="half contact-right cf">
            <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
        </div>
        <input type="submit" value="Submit" id="input-submit" class="btn-info">
    {!! Form::close() !!}
</div>
@endsection
