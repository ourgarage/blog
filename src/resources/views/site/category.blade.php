@extends('blog::site.main')

@section('title')
    {{ $category->title }}
@endsection

@section('content')

    @if(isset($category->posts))
        <ul>
            @foreach($category->posts as $post)
                <li><a href="{{ route('blog::users::post', ['slug' => $post->slug]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    @else
        {{ trans('blog::blog.users.no-news') }}
    @endif

@endsection
