<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Profile;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        // $profile = ;

        return view('admin.users.profile')->with('user',$user)->with('profile',Profile::all());

        //$users = User::all();
        // return view('admin.users.index')->with('users',$users)->with('profile',Profile::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'facebook'=>'required|url',
            'youtube'=>'required|url'
        ]);
        $user = Auth::user();
        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars',$avatar_new_name);
           $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name;
           $user->profile->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;
        $user->save();
        $user->profile->save();
        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        // Session::flash('success',' Mr '.$user->name.' Your Profile is saved Sucessfully');
        Session::flash('success',' Your Profile is saved Sucessfully');

        return redirect()->back();
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
