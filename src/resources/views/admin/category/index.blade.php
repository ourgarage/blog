@extends('admin.main')

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection

@section('body-title')
    {{ trans('blog::blog.category.title') }}
@endsection

@section('body')
    <div class="blog-index">

    </div>
@endsection
