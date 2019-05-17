@extends('layouts.app')

@section('content')
    <div id="app">
        <navigation :has-register="{{Route::has('register')}}"
            :has-login="{{Route::has('login') || ! Auth::check()}}"></navigation>
    </div>
@endsection
