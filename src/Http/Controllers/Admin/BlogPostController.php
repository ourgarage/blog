<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notifications;
use Ourgarage\Blog\DTO\BlogPostDTO;
use Ourgarage\Blog\Http\Requests\BlogPostRequest;
use Ourgarage\Blog\Presenters\BlogPresenter;

class BlogPostController extends Controller
{
    /**
     * Get all posts
     *
     * @param BlogPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(BlogPresenter $presenter)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.post.title'));
        
        $posts = $presenter->getAllPosts();
        
        return view('blog::admin.post.index', compact('posts'));
    }
    
    /**
     * Get form for add new post
     *
     * @param BlogPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(BlogPresenter $presenter)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.post.add'));
        
        $tags = $presenter->popularTags(20);
        $categories = $presenter->getAllActiveCategories();
        
        return view('blog::admin.post.post', compact('categories', 'tags'));
    }
    
    /**
     * Get post for edit
     *
     * @param BlogPresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogPresenter $presenter, $id)
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('bog::blog.post.edit'));
        
        $post = $presenter->getPostById($id);
        $tags = $presenter->popularTags(20);
        $categories = $presenter->getAllActiveCategories();
        
        return view('blog::admin.post.post', compact('post', 'categories', 'tags'));
    }
    
    /**
     * Create or update post
     *
     * @param BlogPostRequest $request
     * @param BlogPresenter $presenter
     * @param int|null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogPostRequest $request, BlogPresenter $presenter, $id = null)
    {
        $dto = new BlogPostDTO();
        $dto->setId($id);
        $dto->setCategoryId($request->category);
        $dto->setTitle($request->title);
        $dto->setSlug($request->slug);
        $dto->setContent($request->content);
        $dto->setMetaKeywords($request->meta_keywords);
        $dto->setMetaDescription($request->meta_description);
        $dto->setMetaTitle($request->meta_title);
        $dto->setPublishedAt(Carbon::parse($request->date_published));
        $dto->setTags($request->tags);
        
        $presenter->createOrUpdatePost($dto);
        
        $translationKey = (is_null($id))
            ? 'blog::blog.post.notifications.post-created-success'
            : 'blog::blog.post.notifications.post-update';
        
        Notifications::success(trans($translationKey), 'top');
        
        return redirect()->route('blog::admin::posts::index');
    }
    
    /**
     * Change status of post
     *
     * @param BlogPresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function statusUpdate(BlogPresenter $presenter, $id)
    {
        $presenter->changeStatusPost($id);
        
        Notifications::success(trans('blog::blog.post.notifications.post-status-update'), 'top');
        
        return redirect()->back();
    }
    
    /**
     * Delete post
     *
     * @param BlogPresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BlogPresenter $presenter, $id)
    {
        $presenter->destroyPost($id);
        
        Notifications::success(trans('blog::blog.post.notifications.post-delete'), 'top');
        
        return redirect()->back();
    }
    
    /**
     * Get all posts in selected category
     *
     * @param BlogPresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(BlogPresenter $presenter, $id)
    {
        $category = $presenter->getCategoryById($id);
        $posts = $presenter->getPostsOfCategory($category->id);
        
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.post.all-posts-in') . $category->title);
        
        return view('blog::admin.post.index', compact('category', 'posts'));
    }
}
