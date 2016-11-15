@extends('blog::site.main')

@section('title')
    {{ $post->title }}
@endsection

@section('content')

    {!! $post->content !!}

@endsection
