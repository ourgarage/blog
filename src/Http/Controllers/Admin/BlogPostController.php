<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\Http\Requests\BlogPostRequest;
use Ourgarage\Blog\DTO\BlogPostDTO;
use Ourgarage\Blog\Presenters\BlogPresenter;
use Notifications;
use Carbon\Carbon;

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

        $categories = $presenter->getAllActiveCategories();

        return view('blog::admin.post.post', compact('categories'));
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
        $post = $presenter->getPostById($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('bog::blog.post.edit'));

        $tags = $presenter->popularTags(20);

        $categories = $presenter->getAllActiveCategories();

        return view('blog::admin.post.post', compact('post', 'categories', 'tags'));
    }

    
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
        
        $presenter->createOrUpdatePost($dto);

        $translationKey = (is_null($id))
            ? 'blog::blog.post.notifications.post-created-success'
            : 'blog::blog.post.notifications.post-update';

        

        $this->_setTags($request->get('tags'), $post->id);

        Notifications::success(trans($translationKey), 'top');

        return redirect()->route('blog::admin::posts::index');
    }

    public function statusUpdate($id, Post $post)
    {
        $post = $post->find($id);

        $post->update([
            'status' => $post->status == Post::STATUS_ACTIVE ? Post::STATUS_DISABLED : Post::STATUS_ACTIVE,
        ]);

        Notifications::success(trans('blog::blog.post.notifications.post-status-update'), 'top');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Post::destroy($id);

        Notifications::success(trans('blog::blog.post.notifications.post-delete'), 'top');

        return redirect()->back();
    }

    private function _setTags($tags_str, $post_id)
    {
        $post = Post::find($post_id);
        $post->tags()->detach();

        $tags = explode(',', $tags_str);

        foreach ($tags as $tag) {

            $tag = mb_strtolower(trim($tag));
            $dbtag = Tags::where('tag', 'like', $tag)->first();
            if (empty($dbtag)) {
                $post->tags()->create([
                    'tag' => $tag
                ]);
            } else {
                $post->tags()->attach($dbtag);
            }
        }
    }

    public function category(Category $category, $id)
    {
        $category = $category->findOrFail($id);
        $posts = Post::where('category_id', $id)->orderBy('published_at', 'desc')->paginate(20);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.post.all-posts-in').$category->title);

        return view('blog::admin.post.index', compact('category', 'posts'));
    }
}
