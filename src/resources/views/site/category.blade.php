@extends('blog::site.main')

@section('title')
    {{ $category->title }}
@endsection

@section('content')

    @if(isset($posts->posts))

    @else
        {{ trans('blog::blog.users.no-news') }}
    @endif

@endsection
