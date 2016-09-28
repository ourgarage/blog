@extends('admin.main')

@section('css')
    @include('blog::basis.css')
@endsection

@section('body-title')
    {{ trans('blog::blog.index.title') }}
@endsection

@section('body')

    <div class="blog-index">

    </div>

@endsection
