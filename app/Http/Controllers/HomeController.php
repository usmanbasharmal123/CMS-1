<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * //
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post_count = Post::all()->count();
        $trashed_count = Post::onlyTrashed()->get()->count();
        $user_count = User::all()->count();
        $category_count = Category::all()->count();



        return view('admin.dashboard')
        ->with('post_count',$post_count)
        ->with('trashed_count',$trashed_count)
        ->with('user_count',$user_count)
        ->with('category_count',$category_count);

    }
}
