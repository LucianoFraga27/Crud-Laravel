<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests\StoreUpdatePost;

class PostController extends Controller
{
    public function index(){
        
        $posts = Post::get(); //referencia o model posts

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request){
        Post::create($request->all());
        return redirect()->route('posts.index');
    }
}
