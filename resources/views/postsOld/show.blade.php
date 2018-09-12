@extends('layoutsPosts.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <h4>{{ $post->body }}</h4>
@endsection
