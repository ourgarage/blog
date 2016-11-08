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
                    <label class="col-md-2">{{ trans('blog::blog.category.table.title') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control"
                               value="{{ isset($category) ? old('title', $category->title) : '' }}">
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('blog::blog.category.table.uri') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="slug" class="form-control"
                               value="{{ isset($category) ? old('slug', $category->slug) : '' }}">
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('blog::blog.category.create.meta-keywords') }} :</label>
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ isset($category) ? old('meta_keywords', $category->meta_keywords) :
                                conf('settings.blog.meta-keywords',
                                config('packages.blog.default-settings.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('blog::blog.category.create.meta-description') }} :</label>
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               value="{{ isset($category) ? old('meta_description', $category->meta_description) :
                                conf('settings.blog.meta-description',
                                config('packages.blog.default-settings.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('blog::blog.category.create.meta-title') }} :</label>
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               value="{{ isset($category) ? old('meta_title', $category->meta_title) :
                                conf('settings.blog.meta-title',
                                config('packages.blog.default-settings.meta-title')) }}">
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <button type="submit"
                        class="btn btn-primary btn-flat">{{ isset($category)
                        ? trans('blog::blog.button.update')
                        : trans('blog::blog.button.create') }}</button>
            </form>

        </div>
    </div>
@endsection

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection

