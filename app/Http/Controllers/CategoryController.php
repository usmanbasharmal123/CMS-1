<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $get_categories = Category::all();

        return view('admin.categories.index')->with('get_categories',$get_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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
        $this->validate($request,[
            'name' => 'required'
            ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success','New Category Inserted Successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $trush_category = Category::onlyTrashed()->get();
        return view('admin.categories.trashed')->with('trush_category',$trush_category);

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
        //$edit_category = Category::find($id);
        $edit_category = Category::find($id);
        return view('admin.categories.update')->with('edit_category',$edit_category);
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
        $this->validate($request,['name'=>'required']);
             $update_category = Category::find($id);
             $update_category->name = $request->name;
             $update_category->save();
           Session::flash('success','Category Updated Successfully');
           return redirect()->route('categories');
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
        $delete_category = Category::find($id);
        foreach ($delete_category->posts as $post) {
            $post->delete();
        }
        $delete_category->delete();
        Session::flash('success','Category successfully trashed and related category is deleted permanently');
        return redirect()->route('categories');
    }
    public function deleteparmanent($id)
    {
        //
        $deleteparmanent_category = Category::withTrashed()->where('id',$id)->first();
        $deleteparmanent_category->forceDelete();
        Session::flash('success','Category deleted permanently');
        return redirect()->back();
    }

    public function restore($id)
    {
        $restory_category = Category::withTrashed()->where('id',$id)->first();
        $restory_category->restore();
        Session::flash('success','Category restored successfully');
        return redirect()->route('categories');
    }
}
