<h4>{{ trans('blog::blog.index.menu') }}:</h4>

<li><a href="{{ route('index') }}">{{ trans('blog::blog.index.home') }}</a></li>
<li><a href="{{ route('blog::users::index') }}">{{ trans('blog::blog.index.title') }}</a></li>
@if(!$categories->isEmpty())
    @foreach($categories as $category)
        <li>
            <a href="{{ route('blog::users::category', ['slug' => $category->slug]) }}">
                {{ $category->title }}</a>
        </li>
    @endforeach
@endif
