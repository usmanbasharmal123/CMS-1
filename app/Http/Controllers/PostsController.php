<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Auth;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        $tags = Tag::all();
        if($category->count()==0)
        {
         Session::flash('info','You must register first a Category');
         return redirect()->back();
        }
        if($tags->count()==0)
        {
         Session::flash('info','You must register first a Tag');
         return redirect()->back();
        }

        //$post = Post::all();
        return view('admin.posts.create')->with('category',$category)->with('tags',$tags);
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
        //dd($request->all());
        $this->validate($request,['title'=>'required','content'=>'required','category_id'=>'required','featured'=>'required|image','tags'=>'required']);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);
        $store_post = Post::create([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'featured' => ('uploads/posts/'.$featured_new_name),
        'content' => $request->content,
        'slug' => str_slug($request->title),
        'user_id' =>Auth::id()
        ]);
        $store_post->tags()->attach($request->tags);
       // $store_post->save();
        Session::flash('success','Post inserted successfully');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }
    public function trash()
    {
        //

        $trash_post = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('trash_post',$trash_post);




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
        $edit_post = Post::find($id);
        return view('admin.posts.edit')->with('edit_post',$edit_post)->with('categories',Category::all())->with('tags',Tag::all());
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
        $this->validate($request,['title'=>'required','content'=>'required','category_id'=>'required']);
        $update_post = Post::find($id);



        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $update_post->featured ='uploads/posts/'.$featured_new_name;
        }
        $update_post->title = $request->title;
        $update_post->content = $request->content;
        $update_post->category_id = $request->category_id;
        $update_post->save();
        $update_post->tags()->sync($request->tags);
        Session::flash('success','Post updated successfully');
        return redirect()->route('posts');

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
        $delete_post = Post::find($id);
        $delete_post->delete();
        Session::flash('success','Post trashed successfully');
        return redirect()->route('posts');
    }

    public function permanentdelete($id)
    {
        $delt_per = Post::withTrashed()->where('id',$id)->first();
        $delt_per->forceDelete();
        Session::flash('success','Post deleted successfuly');
        return redirect()->back();
    }
    public function restore($id)
    {
        $restore = Post::withTrashed()->where('id',$id)->first();
        $restore->restore();
        Session::flash('success','Post restored successfully');
        return redirect()->back();
    }
}
