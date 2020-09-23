@extends('layouts.app')

@section('content')
    <h1>{{ $note->title }}</h1>
    <p>{{ $note->body }}</p>
    <p>By {{ $note->user->name }}</p>
@endsection
