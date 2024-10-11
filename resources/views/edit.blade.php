@extends('layouts.tech-app')

@section('title', config('app.name'))

@section('content')
    <edit-book :book="{{ $book }}"/>
@endsection