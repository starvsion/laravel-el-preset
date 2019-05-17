@extends('layouts.app')

@section('content')
    <register :errors="@json($errors ?? [])"></register>
@endsection
