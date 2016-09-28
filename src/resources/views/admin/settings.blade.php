@extends('admin.main')

@section('css')
    @include('blog::basis.css')
@endsection

@section('body-title')
    {{ trans('blog::blog.settings.title') }}
@endsection

@section('body')
    <div class="settings-index">

        @include('admin.basis.notifications-page')

    </div>

@endsection
