@extends('default')

@section('content')

    <a href="{{ route('news.create') }}" class="btn btn-primary" style="float:right;">+ Ajouter</a>
    @foreach($posts as $post)
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p><a href="{{ route('news.edit', $post) }}" class="btn btn-primary">éditer</a></p>
    @endforeach

@stop