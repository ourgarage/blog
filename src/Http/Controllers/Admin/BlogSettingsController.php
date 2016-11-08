<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\Http\Requests\BlogSettingsRequest;
use Notifications;

class BlogSettingsController extends Controller
{
    public function getSettings()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.settings.title'));

        return view('blog::admin.settings');
    }

    public function postSettings(BlogSettingsRequest $request)
    {
        $config = [
            'settings.blog.meta-keywords' => request('meta_keywords'),
            'settings.blog.meta-description' => request('meta_description'),
            'settings.blog.meta-title' => request('meta_title'),
        ];

        conf()->put($config);
        Notifications::success(trans('blog::blog.notifications.blog-settings-save'), 'top');

        return redirect()->route('blog::admin::get-settings');
    }
}
