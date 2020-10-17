@extends('layouts.app')

@section('content')
    <h1>Welcome to uni-slip-box!</h1>
    <p>We are here to provide a united network of notes, putting an emphasis
        on being decentralized, therefore avoiding any control conflicts.</p>
    <p>See <a href="{{ route('note.index') }}">a few more notes</a>
        @auth
         or <a href="{{ route('note.create') }}">make your own</a>!
        @endauth
    </p>
@endsection('content')
