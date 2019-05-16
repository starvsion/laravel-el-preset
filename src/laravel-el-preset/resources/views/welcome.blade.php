@extends('layouts.app')

@section('content')
    <div id="app">
       <app :has-register="{{Route::has('register')}}"
            :has-login="{{Route::has('login') || ! Auth::check()}}"
            current-route="welcome"></app>
    </div>
@endsection
