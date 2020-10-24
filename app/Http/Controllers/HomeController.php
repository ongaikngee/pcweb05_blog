<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use CreateBlogsTable;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function home(){
        $blogs = Blog::all();

        $user = Auth::user();

        $blogs = DB::table('users')
            ->leftJoin('blogs', 'users.id', '=', 'blogs.user_id')
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->select(DB::raw('blogs.*, profiles.*,users.*, blogs.image as b_image, blogs.created_at as b_created'))
            ->orderBy('blogs.created_at','desc')
            ->get();
        return view('index',['blogs'=>$blogs,'user'=>$user->id]);
    }
}
