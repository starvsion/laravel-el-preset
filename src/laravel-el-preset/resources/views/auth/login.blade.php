@extends('layouts.app')

@section('content')
    <login :errors="@json($errors ?? [])"></login>
@endsection
