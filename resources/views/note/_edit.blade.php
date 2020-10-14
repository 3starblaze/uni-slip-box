@extends('note.form')
@section('h1', "Edit note #{$note->id}")
@section('title-input', $note->title)
@section('body-input', $note->body)
