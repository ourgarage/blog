@extends('blog::site.main')

@section('title')
    {{ $category->title }}
@endsection

@section('content')

    @if(!$posts->isEmpty())
        <ul>
            @foreach($posts as $post)
                <li><a href="{{ route('blog::users::post', ['slug' => $post->slug]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
        {!! $posts->render() !!}
    @else
        {{ trans('blog::blog.users.no-news') }}
    @endif

@endsection
