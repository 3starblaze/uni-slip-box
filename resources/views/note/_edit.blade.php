@extends('note.form')
@section('action', route('notes'))
@section('form-header')
    @method('put')
@endsection
@section('h1', "Edit note #{$note->id}")
@section('title-input', $note->title)
@section('body-input', $note->body)
