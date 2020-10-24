<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Blog;

class ProfileController extends Controller
{
    //
    // public function index() {
    //     return view('profile', [
    //         'user' => Auth::user(),
    //     ]);
    // }

   
    public function index(){

        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $blogs = Blog::where('user_id',$user->id)->orderBy('created_at', 'desc')->get(); //->first();
        $numBlogs = Blog::where('user_id',$user->id )->count();
        return view('profile', ['user' => $user, 'profile' => $profile, 'blogs' => $blogs, 'numBlogs'=>$numBlogs,]);

    }

    public function create(){
        return view('createProfile');
    }


    public function postCreate() {
        $data = request()->validate([
            'description' => 'required',
            'profilepic' => ['required', 'image'],
        ]);

        // store the image in uploads, under public
        // request(‘profilepic’) is like $_GET[‘profilepic’]
        $imagePath = request('profilepic')->store('uploads', 'public');

        // create a new profile, and save it
        $user = Auth::user();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->description = request('description');
        $profile->image = $imagePath;
        $saved = $profile->save();

        // if it saved, we send them to the profile page
        if ($saved) {
            return redirect('/profile');
        }
        
    }

}



