@extends('admin.main')

@section('body-title')
    {{ isset($post) ? trans('blog::blog.post.edit') : trans('blog::blog.post.add') }}
@endsection

@section('body')
    <div class="blog-index">

        @if(!$categories->isEmpty())

            @include('admin.basis.notifications-page')

            <div class="blog-box-body">
                <form class="form-horizontal"
                      action="{{ isset($post)
                  ? route('blog::admin::posts::update', ['id' => $post->id])
                  : route('blog::admin::posts::store') }}" method="POST">

                    @if(isset($post))
                        {{ method_field('PUT') }}
                    @endif

                    {!! csrf_field() !!}

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('blog::blog.category.table.title') }} : *</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control"
                                   value="{{ isset($post) ? old('title', $post->title) : old('title') }}">
                            <span class="glyphicon glyphicon-header form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('blog::blog.category.table.uri') }} : *</label>
                        <div class="col-md-8">
                            <input type="text" name="slug" class="form-control"
                                   value="{{ isset($post) ? old('slug', $post->slug) : old('slug') }}">
                            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('blog::blog.category.create.meta-keywords') }} :</label>
                        <div class="col-md-8">
                            <input type="text" name="meta_keywords" class="form-control"
                                   value="{{ isset($post) ? old('meta_keywords', $post->meta_keywords) :
                                conf('settings.blog.meta-keywords',
                                config('packages.blog.default-settings.meta-keywords')) }}">
                            <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('blog::blog.category.create.meta-description') }} :</label>
                        <div class="col-md-8">
                            <input type="text" name="meta_description" class="form-control"
                                   value="{{ isset($post) ? old('meta_description', $post->meta_description) :
                                conf('settings.blog.meta-description',
                                config('packages.blog.default-settings.meta-description')) }}">
                            <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('blog::blog.category.create.meta-title') }} :</label>
                        <div class="col-md-8">
                            <input type="text" name="meta_title" class="form-control"
                                   value="{{ isset($post) ? old('meta_title', $post->meta_title) :
                                conf('settings.blog.meta-title',
                                config('packages.blog.default-settings.meta-title')) }}">
                            <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-md-2">{{ trans('blog::blog.post.category') }} :</label>
                        <div class="col-md-8">
                            <select name="category" class="form-control">
                                <option value="">...</option>

                                @if(isset($post))
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <div class="col-md-8 col-md-offset-2">
                            <textarea name="content" class="form-control" rows="5">
                                {{ isset($post) ? old('content', $post->content) : old('content') }}
                            </textarea>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-primary btn-flat">{{ isset($post)
                        ? trans('blog::blog.button.update')
                        : trans('blog::blog.button.create') }}</button>
                </form>
            </div>

        @else
            <div class="no-results text-center">
                <i class="fa fa-exclamation-triangle fa-3x"></i>
                <p>{{ trans('blog::blog.category.no-categories') }}</p>
                <p>{{ trans('blog::blog.category.must-category') }}</p>
                <a href="{{ route('blog::admin::categories::add') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('blog::blog.button.create-category') }}
                </a>
            </div>
        @endif

    </div>
@endsection

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection