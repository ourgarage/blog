@extends('admin.main')

@section('body-title')
    {{ isset($category) ? trans('blog::blog.category.edit') : trans('blog::blog.category.add') }}
@endsection

@section('body')
    <div class="blog-index">

        @include('admin.basis.notifications-page')

        <div class="blog-box-body">
            <form class="form-horizontal"
                  action="{{ isset($category)
                  ? route('blog::admin::categories::update', ['id' => $category->id])
                  : route('blog::admin::categories::store') }}" method="POST">

                @if(isset($category))
                    {{ method_field('PUT') }}
                @endif

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.title') }}"
                               value="{{ isset($category) ? old('title', $category->title) : '' }}">
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="slug" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.slug') }}"
                               value="{{ isset($category) ? old('slug', $category->slug) : '' }}">
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-keywords') }}"
                               value="{{ isset($category) ? old('meta_keywords', $category->meta_keywords) :
                                conf('settings.static-pages.meta-keywords',
                                config('packages.static-pages.default-settings.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-description') }}"
                               value="{{ isset($category) ? old('meta_description', $category->meta_description) :
                                conf('settings.static-pages.meta-description',
                                config('packages.static-pages.default-settings.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-title') }}"
                               value="{{ isset($category) ? old('meta_title', $category->meta_title) :
                                conf('settings.static-pages.meta-title',
                                config('packages.static-pages.default-settings.meta-title')) }}">
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <button type="submit"
                        class="btn btn-primary btn-flat">{{ isset($category) ? trans('static-pages::pages.button.update') : trans('static-pages::pages.button.create') }}</button>
            </form>

        </div>
    </div>
@endsection

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection

