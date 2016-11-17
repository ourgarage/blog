@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-2">
                        @include('blog::site.partials.left-menu')
                    </div>
                    <div class="col-md-10">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="panel-footer text-right">{{ trans('blog::blog.post.view.posted') }}
                    : {{ df($post->published_at, \App\Constant\Dates::TYPE_AGO) }}</div>
            </div>
        </div>
    </div>

@endsection
