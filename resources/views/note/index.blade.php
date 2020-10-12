@extends('layouts.app')

@section('content')
    <ul class="index">
        @forelse ($notes as $note)
            <li>
                <p>
                    <a href="{{ route('note.show', compact('note')) }}">{{ $note->title }}</a>
                    by <i>{{ $note->user->name }}</i>
                </p>
            </li>
        @empty
            <li>There are no notes. Yet.</li>
        @endforelse
    </ul>
@endsection
