<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index Page</title>
    <link href="/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('title')
                </div>
                <div class="panel-body">
                    <div class="col-md-2">
                        <h4>{{ trans('blog::blog.index.menu') }}:</h4>
                        <li><a href="{{ route('blog::users::index') }}">{{ trans('blog::blog.index.title') }}</a></li>
                        @if(!$categories->isEmpty())
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog::users::category', ['slug' => $category->slug]) }}">
                                        {{ $category->title }}</a>
                                </li>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
