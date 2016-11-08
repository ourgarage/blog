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

        <div class="blog-box-body">

            <form class="form-horizontal" action="{{ route('blog::admin::post-settings') }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('blog::blog.category.create.meta-keywords') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ conf('settings.blog.meta-keywords',
                                config('packages.blog.default-settings.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('blog::blog.category.create.meta-description') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               value="{{ conf('settings.blog.meta-description',
                                config('packages.blog.default-settings.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('blog::blog.category.create.meta-title') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               value="{{ conf('settings.blog.meta-title',
                                config('packages.blog.default-settings.meta-title')) }}">
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-flat">{{ trans('blog::blog.button.save') }}</button>

            </form>

        </div>
    </div>
@endsection
