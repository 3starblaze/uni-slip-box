@extends('layouts.app')

@section('content')
    <h1>Create a note</h1>
    <form method="post" action="{{ route('note.store') }}">
        @csrf
        <div class="form-body">
            <input type="text" name="title" />
            <label for="title">Title</label>
            <textarea name="body"></textarea>
            <label for="body">Body</label>
        </div>
        <button>Submit</button>
    </form>
@endsection
