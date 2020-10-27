<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index()
    {

        return view('createBlog');
    }


    public function createBlog()
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'blogpic'=> ['required','image'],

        ]);



        $imagePath = request('blogpic')->store('uploads', 'public');

        $user = Auth::user();
        $blog = new Blog();
        $blog->user_id = $user->id;
        $blog->title = request('title');
        $blog->content = request('content');
        $blog->image = $imagePath;
        $saved = $blog->save();

        // if it saved, we send them to the profile page
        if ($saved) {
            return redirect('/profile');
        }
    }

    //Controller to delete blog. 
    public function deleteBlog($blogID)
    {
        $blog = Blog::where('id', $blogID)->first();

        $delete = $blog->delete();
        if ($delete) {
            return redirect('/profile');
        }
    }

//Controller to show forms for update of blog
    public function showBlog($blogID){
        $blog = Blog::where('id', $blogID)->first();
        return view('updateBlog',['blogs' => $blog,]);
    }


    //Controller to update Blog into DB
    public function updateBlog(){

        $blogID = request('id');
        $blog = Blog::where('id', $blogID)->first();
        $blog->title = request('title');
        $blog->content = request('content');
        // $blog->image = $imagePath;
        $saved = $blog->save();

        // if it saved, we send them to the profile page
        if ($saved) {
            return redirect('/profile');
        }

    }

   

}
