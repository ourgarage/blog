@extends('blog::site.main')

@section('title')
    {{ trans('blog::blog.users.index') }}
@endsection

@section('content')

    @if(!$posts->isEmpty())
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('blog::users::post', ['slug' => $post->slug]) }}">
                        {{ $post->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        {{ trans('blog::blog.users.no-news') }}
    @endif

@endsection
