@extends('layouts.app')

@section('content')

    <reset-password :errors="@json($errors ?? [])"></reset-password>

@endsection
