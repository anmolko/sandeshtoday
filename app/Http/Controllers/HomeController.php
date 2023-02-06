<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Tag;
use App\Models\User;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('AdminMiddleware');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allusers   = User::take(7)->get();
        $menus      = Menu::all()->count();
        $blog_cat   = Category::all()->count();
        $categories = Category::take(5)->latest()->get();
        $pages      = Blog::all()->count();
        $feeds      = Blog::take(3)->latest()->get();
        $ads        = Ads::take(5)->latest()->get();
        $tags       = Tag::all()->count();
        $videos     = VideoGallery::all()->count();
        return view('backend.dashboard', compact('allusers','tags','videos','ads','categories','feeds','menus','blog_cat','pages'));
    }

    public function filemanager()
    {
        return view('backend.filemanager.index');
    }



}
