@extends('admin.main')

@section('body-title')
    {{ trans('blog::blog.category.title') }}

    <a href="{{ route('blog::admin::categories::add') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('blog::blog.button.create') }}
    </a>
@endsection

@section('body')
    <div class="blog-index">

        @if(!$categories->isEmpty())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>{{ trans('blog::blog.category.table.uri') }}</th>
                        <th>{{ trans('blog::blog.category.table.title') }}</th>
                        <th>{{ trans('blog::blog.category.table.created') }}</th>
                        <th>{{ trans('blog::blog.category.table.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td><a href="#{{ $category->slug }}" target="_blank">{{ $category->slug }}</a>
                                </td>
                                <td>{{ $category->title }}</td>
                                <td>{{ df($category->created_at) }}</td>
                                <td class="for-form-inline">
                                    <form action="{{ route('blog::admin::categories::status-update', ['id' => $category->id]) }}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        @if($category->status == \Ourgarage\Blog\Models\Category::STATUS_ACTIVE)
                                            <button type="submit"
                                                    onclick="return buttonConfirmation(event, '@lang('blog::blog.category.popup.deactivate')')"
                                                    class="btn btn-xs btn-success" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i>
                                            </button>
                                        @else
                                            <button type="submit"
                                                    onclick="return buttonConfirmation(event, '@lang('blog::blog.category.popup.activate')')"
                                                    class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                                    title="{{ trans('users.tooltip.status') }}"><i
                                                        class="fa fa-power-off"></i>
                                            </button>
                                        @endif
                                    </form>

                                    <a href="{{ route('blog::admin::categories::edit', ['id' => $category->id]) }}"
                                       class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                                       title="{{ trans('users.tooltip.edit') }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('blog::admin::categories::delete', ['id' => $category->id]) }}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit"
                                                onclick="return buttonConfirmation(event, '@lang('blog::blog.category.popup.delete')')"
                                                class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                                title="{{ trans('users.tooltip.delete') }}">
                                            <i class="fa fa-remove"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $categories->render() !!}
            </div>
        @else
            <div class="no-results text-center">
                <i class="fa fa-exclamation-triangle fa-3x"></i>
                <p>{{ trans('blog::blog.category.no-categories') }}</p>
            </div>
        @endif

    </div>
@endsection

@section('css')
    <link href='/packages/blog/css/blog.css' rel='stylesheet' type='text/css'>
@endsection
