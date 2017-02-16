<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\DTO\BlogCategoryDTO;
use Ourgarage\Blog\Models\Category;
use Notifications;
use Ourgarage\Blog\Presenters\BlogPresenter;
use Ourgarage\Blog\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Get all categories of blog
     *
     * @param BlogPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(BlogPresenter $presenter)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.title'));

        $categories = $presenter->getAllCategories();

        return view('blog::admin.category.index', compact('categories'));
    }
    
    /**
     * Form for add new category of blog
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.add'));

        return view('blog::admin.category.category');
    }
    
    /**
     * Edit category. Get category by id
     *
     * @param BlogPresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogPresenter $presenter, $id)
    {
        $category = $presenter->getCategoryById($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('bog::blog.category.edit'));

        return view('blog::admin.category.category', compact('category'));
    }
    
    /**
     * Create or update category
     *
     * @param BlogCategoryRequest $request
     * @param BlogPresenter $presenter
     * @param int|null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategoryRequest $request, BlogPresenter $presenter, $id = null)
    {
        $dto = new BlogCategoryDTO();
        $dto->setId($id);
        $dto->setTitle($request->title);
        $dto->setSlug($request->slug);
        $dto->setMetaDescription($request->meta_description);
        $dto->setMetaKeywords($request->meta_keywords);
        $dto->setMetaTitle($request->meta_title);
        
        $presenter->createOrUpdateCategory($dto);

        $translationKey = (is_null($id))
            ? 'blog::blog.category.notifications.category-created-success'
            : 'blog::blog.category.notifications.category-update';

        Notifications::success(trans($translationKey), 'top');

        return redirect()->route('blog::admin::categories::index');
    }

    public function statusUpdate($id, Category $category)
    {
        $category = $category->find($id);

        $category->update([
            'status' => $category->status == Category::STATUS_ACTIVE ? Category::STATUS_DISABLED : Category::STATUS_ACTIVE,
        ]);

        Notifications::success(trans('blog::blog.category.notifications.category-status-update'), 'top');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::destroy($id);

        Notifications::success(trans('blog::blog.category.notifications.category-delete'), 'top');

        return redirect()->back();
    }
}
