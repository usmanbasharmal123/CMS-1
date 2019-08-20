<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\Post;
use App\User;
use Auth;
use App\Tag;
use App\Profile;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $postdate = Post::all();
        //we will gethe the title from setting

        $title = Setting::first()->site_name;

        // to get the top 4 category we will use the below code
        $categories = Category::take(5)->get();

        // to get the latest post
        $fist_posts = Post::orderBy('created_at','desc')->first();

        // how to ge the secound last post
        $secound_post = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        //category
        $category_tutorial =Category::find(6);
        $category_carreer =Category::find(7);

        //setting for updateing our footer contact number and emails so we sill use setting
        $setting = Setting::first();

        return view('index')->with('title',$title)
        ->with('categories',$categories)
        ->with('fist_posts',$fist_posts)
        ->with('secound_post',$secound_post)
        ->with( 'third_post',$third_post)
        ->with('category_tutorial',$category_tutorial)
        ->with('category_carreer',$category_carreer)
        ->with('setting',$setting);
    }
      public function singlePost($slug)
      {
        //$user = User::first()->name;
          $post = Post::where('slug',$slug)->first();


          //below is used for next page and previous page
          $next_id = Post::where('id','>',$post->id)->min('id');
          $pre_id = Post::where('id','<',$post->id)->max('id');
          return view('single')->with('post',$post)
          ->with('title',$post->title)
          ->with('categories',Category::take(5)->get())
          ->with('setting',Setting::first())
          ->with('pre',Post::find($pre_id))
          ->with('next',Post::find($next_id))
        ->with('user',Auth::user())
        ->with('tags',Tag::all());

      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        //
        $category = Category::find($id);
        return view('category')->with('category',$category)
        ->with('title',$category->name)
         ->with('setting',Setting::first())
         ->with('categories',Category::take(5)->get());

    }
    public function tag($id)
    {
        //
        $tag = Tag::find($id);
        return view('tag')->with('tag',$tag)
        ->with('title',$tag->tag)
         ->with('setting',Setting::first())
         ->with('categories',Category::take(5)->get());

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
