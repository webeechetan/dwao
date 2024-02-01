<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('email','!=',auth()->user()->email)->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                "name" => "required",
                "email" => "required|email|unique:users",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        if($request->image){
            $user->image = $request->image;
        }else{
            $user->image =  env('APP_URL').'/storage/' .'default_user.jpg';
        }
        $user->linkedin = $request->linkedin;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->youtube = $request->youtube;
        $user->password = Hash::make(rand(1,10000));

        if($user->save()){
            $this->alert('success','Author Added successfully','success');
            return redirect()->route('user.index');
        }
        $this->alert('error','Something went wrong','error');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {    
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd('a');
        $request->validate([
                "name" => "required",
                'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->image = $request->image;
        $user->linkedin = $request->linkedin;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->youtube = $request->youtube;
        $user->password = Hash::make(rand(1,10000));

        if($user->save()){
            $this->alert('success','Author Updated successfully','success');
            return redirect()->route('user.index');
        }
        $this->alert('error','Something went wrong','error');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            $this->alert('success','Author Deleted successfully','success');
            return redirect()->route('user.index');

        }else{
            $this->alert('error','Something went wrong','danger');
            return redirect()->back();  
        }
    }
}
