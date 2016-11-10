@extends('admin.main')

@section('body-title')
    {{ trans('blog::blog.post.title') }}

    <a href="{{ route('blog::admin::posts::add') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('blog::blog.button.create') }}
    </a>
@endsection

@section('body')
    <div class="blog-index">

        @if(!$posts->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('blog::blog.post.table.uri') }}</th>
                        <th>{{ trans('blog::blog.post.table.title') }}</th>
                        <th>{{ trans('blog::blog.post.table.category') }}</th>
                        <th>{{ trans('blog::blog.post.table.created') }}</th>
                        <th>{{ trans('blog::blog.post.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <td><a href="#{{ $post->slug }}" target="_blank">{{ $post->slug }}</a>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ df($post->created_at) }}</td>
                                <td class="for-form-inline">
                                    <form action="{{ route('blog::admin::posts::status-update', ['id' => $post->id]) }}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        @if($post->status == \Ourgarage\Blog\Models\Post::STATUS_ACTIVE)
                                            <button type="submit"
                                                    onclick="return buttonConfirmation(event, '@lang('blog::blog.post.popup.deactivate')')"
                                                    class="btn btn-xs btn-success" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i>
                                            </button>
                                        @else
                                            <button type="submit"
                                                    onclick="return buttonConfirmation(event, '@lang('blog::blog.post.popup.activate')')"
                                                    class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                                    title="{{ trans('users.tooltip.status') }}"><i
                                                        class="fa fa-power-off"></i>
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
                                                onclick="return buttonConfirmation(event, '@lang('blog::blog.post.popup.delete')')"
                                                class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                                title="{{ trans('users.tooltip.delete') }}">
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
