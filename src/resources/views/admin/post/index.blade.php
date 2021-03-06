@extends('admin.main')

@section('body-title')
    @if(isset($category))
        {{ trans('blog::blog.post.view-category-posts') }}: {{ $category->title }}
    @else
        {{ trans('blog::blog.post.title') }}
    @endif

    <a href="{{ route('blog::admin::posts::add') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('blog::blog.button.create') }}
    </a>
@endsection

@section('body')
    <div class="blog-index">

        @if(!$posts->isEmpty())
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                    {{ trans('blog::blog.post.view-category-posts') }}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('blog::admin::category-posts', ['id' => $category->id]) }}">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('blog::blog.post.table.uri') }}</th>
                        <th>{{ trans('blog::blog.post.table.title') }}</th>
                        <th>{{ trans('blog::blog.post.table.category') }}</th>
                        <th>{{ trans('blog::blog.post.view.views') }}</th>
                        <th>{{ trans('blog::blog.post.date-published') }}</th>
                        <th>{{ trans('blog::blog.post.table.created') }}</th>
                        <th>{{ trans('blog::blog.post.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td><a href="{{ route('blog::users::post', ['slug' => $post->slug]) }}"
                                   target="_blank">{{ $post->slug }}</a>
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>{{ $post->views }}</td>
                            <td>{{ df($post->published_at, \App\Constant\Dates::TYPE_AGO) }}</td>
                            <td>{{ df($post->created_at) }}</td>
                            <td class="for-form-inline">
                                <form action="{{ route('blog::admin::posts::status-update', ['id' => $post->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    @if($post->status == \Ourgarage\Blog\Models\Post::STATUS_ACTIVE)
                                        <button type="submit"
                                                data-confirm="@lang('blog::blog.post.popup.deactivate')"
                                                class="btn btn-xs btn-success popup-blog" data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i>
                                        </button>
                                    @else
                                        <button type="submit"
                                                data-confirm="@lang('blog::blog.post.popup.activate')"
                                                class="btn btn-xs btn-danger popup-blog" data-toggle="tooltip"
                                                data-placement="top" title="{{ trans('users.tooltip.status') }}">
                                            <i class="fa fa-power-off"></i>
                                        </button>
                                    @endif
                                </form>

                                <a href="{{ route('blog::admin::posts::edit', ['id' => $post->id]) }}"
                                   class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                                   title="{{ trans('users.tooltip.edit') }}">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action="{{ route('blog::admin::posts::delete', ['id' => $post->id]) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            data-confirm="@lang('blog::blog.post.popup.delete')"
                                            class="btn btn-xs btn-danger popup-blog" data-toggle="tooltip"
                                            data-placement="top" title="{{ trans('users.tooltip.delete') }}">
                                        <i class="fa fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $posts->render() !!}
            </div>
        @else
            <div class="no-results text-center">
                <i class="fa fa-exclamation-triangle fa-3x"></i>
                <p>{{ trans('blog::blog.post.no-posts') }}</p>
            </div>
        @endif

    </div>
@endsection

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection

@section('js')
    <script src="/packages/blog/js/popup.js"></script>
@endsection
