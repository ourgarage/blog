<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\Http\Requests\BlogPostRequest;
use Ourgarage\Blog\Models\Post;
use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\PostTags;
use Ourgarage\Blog\Models\Tags;
use Notifications;
use Carbon\Carbon;

class BlogPostController extends Controller
{
    public function index()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.post.title'));

        $posts = Post::orderBy('id', 'desc')->paginate(20);

        return view('blog::admin.post.index', compact('posts'));
    }

    public function add()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.post.add'));

        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();

        return view('blog::admin.post.post', compact('categories'));
    }

    public function edit($id, Post $post)
    {
        $post = $post->find($id);

        // It's first version of code. It's we need?

        /*$allCountTags = PostTags::select('tag_id')->get()->toArray();

        if(isset($allCountTags)) {
            $countMaxTags = array_count_values(array_flatten($allCountTags));
            arsort($countMaxTags);
            $selectMaxCount = array_slice($countMaxTags, 0, 20, $preserve_keys = true);
            $idPopularTags = array_keys($selectMaxCount);

            $tags = Tags::find($idPopularTags);
        }*/

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('bog::blog.post.edit'));

        $tags = Tags::popularTags(20);

        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();

        return view('blog::admin.post.post', compact('post', 'categories', 'tags'));
    }

    public function store(BlogPostRequest $request, $id = null)
    {
        $post = Post::findOrNew($id);

        $post->title = request('title');
        $post->category_id = request('category');
        $post->slug = request('slug');
        $post->content = request('content');
        $post->meta_keywords = request('meta_keywords');
        $post->meta_description = request('meta_description');
        $post->meta_title = request('meta_title');
        $post->published_at = Carbon::parse(request('date_published'));

        $translationKey = (is_null($post->id))
            ? 'blog::blog.post.notifications.post-created-success'
            : 'blog::blog.post.notifications.post-update';

        $post->save();

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
        PostTags::where('post_id', $post_id)->delete();

        $tags = explode(',', $tags_str);

        foreach ($tags as $tag) {
            if (trim($tag) == '') {
                continue;
            }
            $tag = mb_strtolower(trim($tag));
            $dbtag = Tags::where('tag', 'like', $tag)->first();
            if (empty($dbtag)) {
                $dbtag = new Tags();
                $dbtag->tag = strip_tags($tag);
                $dbtag->save();
            }
            $post_tag = new PostTags();

            $post_tag->post_id = $post_id;
            $post_tag->tag_id = $dbtag->id;
            $post_tag->save();
        }
    }
}
