<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
   public function index(){
      // $posts=Post::where('user_id',Auth::id())->get();
      $posts=Auth::user()->posts()->latest()->paginate(6);
      // dd($posts);
      
    return view('users.home',['posts'=>$posts]);
   }
   public function userPost(User $user){
   $posts=$user->posts()->latest()->paginate(6);
      return view('users.posts',['posts'=>$posts,'user'=>$user]);
   }
}
