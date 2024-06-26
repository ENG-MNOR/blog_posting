<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\welcomeEmail;
use Illuminate\Contracts\Mail\Mailer;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller 
{
    // public static function Middleware(): array
    // {
    //     return [
          
    //         new Middleware('auth', except: ['home', 'show']),
    //     ];
    // }
    public function index()
    {
        // Mail::to('moj@gmail.com')->send(new welcomeEmail('moj@gmail.com','WELCOME TO THE CUSTOMER CARE','MOAHEMD',Auth::user()));
        $posts=Post::latest()->paginate(6);
        // Mail::to('moj@gmail.com')->send(new welcomeEmail(Auth::user()->email,'WELCOME TO THE CUSTOMER CARE','MOAHEMD',Auth::user()));

        return view('posts.index', ['posts' => $posts]);
    }
    public function welcome()
    {
        // Mail::to('moj@gmail.com')->send(new welcomeEmail('moj@gmail.com','WELCOME TO THE CUSTOMER CARE','MOAHEMD',Auth::user()));
        // $posts=Post::latest()->paginate(6);
        Mail::to(auth()->user()->email)->send(new welcomeEmail(Auth::user()->email,'WELCOME TO THE CUSTOMER CARE','MOAHEMD',Auth::user()));
        return back();
        // return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('reached');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
       
        
        $request->validate([
            'title'=>['required','max:255'],
            "body"=>['required'],
            "image"=>['nullable','file','max:3000','mimes:png,jpg,webp'],
        ]);
        
        $path=null;
        if($request->hasFile('image')){
             $path=Storage::disk('public')->put('post_images', $request->image);
        }
       
        
       Auth::user()->posts()->create([
        'title'=>$request->title,
        'body'=>$request->body,
        'image'=>$path]);
       return back()->with('success',"successfully ragisted");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function show(Post $post)
    {
        return view("users.show", ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify', $post);
        return view('users.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        dd("reached");
    }
    public function UpdateOne(Post $post)
    {
        dd("reached");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     */
    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return back()->with("delete","successfully deleted");

    }
}
