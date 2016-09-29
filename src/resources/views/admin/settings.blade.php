@extends('admin.main')

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection

@section('body-title')
    {{ trans('blog::blog.settings.title') }}
@endsection

@section('body')
    <div class="settings-index">
        @include('admin.basis.notifications-page')
    </div>
@endsection
