@extends('vendor.installer.layouts.master')

@section('title', trans('messages.final.title'))
@section('container')
    <p class="paragraph">{{ session('message')['message'] }}</p>
    
    <p class="paragraph"><b>We create an admin account for you by default</b></p>
    <p class="paragraph">Email: admin@gmail.com</p>
    <p class="paragraph">Password: admin</p>
    
    <div class="buttons">
        <a href="{{ URL::to('/') }}" class="button">{{ trans('messages.final.exit') }}</a>
    </div>
@stop