@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ $category->title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-2">
                        @include('blog::site.partials.left-menu')
                    </div>
                    <div class="col-md-10">
                        @if(!$posts->isEmpty())
                            <ul>
                                @foreach($posts as $post)
                                    <li>
                                        <a href="{{ route('blog::users::post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            {!! $posts->render() !!}
                        @else
                            {{ trans('blog::blog.users.no-news') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
