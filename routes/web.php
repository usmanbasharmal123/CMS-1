<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/user/profile/pic/{id)',function($id){
//    $pic = App\User::find($id)->profile;
//     return $pic;
// });
//sednig email using mailchimp
Route::post('/subscribe',function(){
    $email = request('email');
    Newsletter::subscribe($email);
    Session::flash('subscribed','successfully subscribed');
    return redirect()->back();
    });
Route::get('/user/profile/{id}',function($id){
    return App\User::find($id)->profile;
});
//searh function
Route::get('/results', function(){
    $posts = \App\Post::where('title','like','%'. request('query').'%')->get();
    return view('results')->with('posts',$posts)
    ->with('title','Search results:'. request('query'))
    ->with('setting', \App\Setting::first())
    ->with('categories', \App\Category::take(5)->get())
    ->with('query', request('query'));
});
//frontEnd
Route::get('/',['uses'=>'FrontEndController@index','as'=>'index']
);
Route::get('/category/{id}',['uses'=>'FrontEndController@category','as'=>'category.single']
);
//tag
Route::get('/tag/{id}',['uses'=>'FrontEndController@tag','as'=>'tag.single']
);

Auth::routes();
Route::get('/dashboard', ['uses'=>'HomeController@index','as'=>'homee']);
// the group route is used to secure the pages form un athurized users

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
//home section




///post section
Route::get('post/index',['uses'=>'PostsController@index','as'=>'posts']);
Route::get('/post/create',['uses'=>'PostsController@create','as'=>'post.create']);
Route::post('/post/store',['uses'=>'PostsController@store','as'=>'post.store']);
Route::get('/post/edit/{id}',['uses'=>'PostsController@edit','as'=>'post.edit']);
Route::get('/post/delete/{id}',['uses'=>'PostsController@destroy','as'=>'post.delete']);
Route::post('/post/update/{id}',['uses'=>'PostsController@update','as'=>'post.update']);
Route::get('/post/permanentdelete/{id}',['uses'=>'PostsController@permanentdelete','as'=>'post.permanentdelete']);
Route::get('/trash/post',['uses'=>'PostsController@trash','as'=>'post.trash']);
Route::get('/restore/post/{id}',['uses'=>'PostsController@restore','as'=>'post.restore']);

//category section

Route::get('/category/create',['uses'=>'CategoryController@create','as'=>'category.create']);

Route::get('/categories',['uses'=>'CategoryController@index','as'=>'categories']);
Route::post('/category/store',['uses'=>'CategoryController@store','as'=>'category.store']);
Route::get('/category/edit/{id}',['uses'=>'CategoryController@edit','as'=>'category.edit']);
Route::post('/category/update/{id}',['uses'=>'CategoryController@update','as'=>'category.update']);
Route::get('/category/delete/{id}',['uses'=>'CategoryController@destroy','as'=>'category.delete']);
Route::get('/category/deleteParmanent/{id}',['uses'=>'CategoryController@deleteparmanent','as'=>'category.deleteParmanent']);

Route::get('/tush/categories',['uses'=>'CategoryController@show','as'=>'categories.trush']);
Route::get('/category/restore/{id}',['uses'=>'CategoryController@restore','as'=>'category.restore']);

//tags
Route::get('/tags',['uses'=>'TagsController@index','as'=>'tags']);
Route::get('/tag/edit/{id}',['uses'=>'TagsController@edit','as'=>'tag.edit']);
Route::get('/tag/delete/{id}',['uses'=>'TagsController@destroy','as'=>'tag.delete']);
Route::post('/tag/updae/{id}',['uses'=>'TagsController@update','as'=>'tag.update']);
Route::get('/tag/create',['uses'=>'TagsController@create','as'=>'tag.create']);
Route::post('/tag/store',['uses'=>'TagsController@store','as'=>'tag.store']);




//users
Route::get('/users',['uses'=>'UsersController@index','as'=>'users']);
 Route::get('/user/delete/{id}',['uses'=>'UsersController@destroy','as'=>'user.delete']);
Route::get('/user/admin/{id}',['uses'=>'UsersController@admin','as'=>'user.admin'])->middleware ('admin');
Route::get('/user/notadmin/{id}',['uses'=>'UsersController@notadmin','as'=>'user.not.admin']);
Route::get('/user/create',['uses'=>'UsersController@create','as'=>'user.create']);
 Route::post('/user/store',['uses'=>'UsersController@store','as'=>'user.store']);


 //user profile
 Route::get('/user/profile',['uses'=>'ProfileController@index','as'=>'user.profile']);
Route::post('/user/profile/update',['uses'=>'ProfileController@update','as'=>'user.profile.update']);

//setting
Route::get('/settings',['uses'=>'SettingsController@index','as'=>'settings']);
Route::post('/settings/update',['uses'=>'SettingsController@update','as'=>'settings.update']);


//single frontend page
Route::get('/post/{slug}',['uses'=>'FrontEndController@singlePost','as'=>'post.single']);






});
