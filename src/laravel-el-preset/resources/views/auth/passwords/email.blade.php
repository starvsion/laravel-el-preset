@extends('layouts.app')

@section('content')

    <request-reset-email :errors="@json($errors ?? [])"></request-reset-email>

@endsection
