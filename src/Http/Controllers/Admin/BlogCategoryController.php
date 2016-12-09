<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\Models\Category;
use Notifications;
use Ourgarage\Blog\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    public function index()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.title'));

        $categories = Category::paginate(20);

        return view('blog::admin.category.index', compact('categories'));
    }

    public function add()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.add'));

        return view('blog::admin.category.category');
    }

    public function edit($id, Category $category)
    {
        $category = $category->find($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('bog::blog.category.edit'));

        return view('blog::admin.category.category', compact('category'));
    }

    public function store(BlogCategoryRequest $request, $id = null)
    {
        $category = Category::findOrNew($id);

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->meta_title = $request->meta_title;

        $translationKey = (is_null($category->id))
            ? 'blog::blog.category.notifications.category-created-success'
            : 'blog::blog.category.notifications.category-update';

        $category->save();

        Notifications::success(trans($translationKey), 'top');

        return redirect()->route('blog::admin::categories::index');
    }

    public function statusUpdate($id, Category $category)
    {
        $category = $category->find($id);

        $category->update([
            'status' => $category->status == Category::STATUS_ACTIVE ? Category::STATUS_DISABLED : Category::STATUS_ACTIVE,
        ]);

        //Notifications::success(trans('blog::blog.category.notifications.category-status-update'), 'top');

        //return redirect()->back();

        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        Category::destroy($id);

        Notifications::success(trans('blog::blog.category.notifications.category-delete'), 'top');

        return redirect()->back();
    }
}
