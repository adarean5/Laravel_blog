@extends('layoutsPosts.master')

@section('content')
    @foreach($posts as $post)
        <li>
            <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
        </li>
    @endforeach
@endsection
