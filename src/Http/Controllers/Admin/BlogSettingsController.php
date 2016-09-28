<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogSettingsController extends Controller
{
    public function index()
    {
        \Title::prepend(trans('dashboard.title.prepend'));

        return view('blog::admin.settings');
    }
}
