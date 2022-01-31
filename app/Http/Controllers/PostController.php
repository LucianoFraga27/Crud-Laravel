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
        return view()->route('posts.create');
    }

    public function store(StoreUpdatePost $request){
        
        Post::create($request->all());
        
        return redirect()
        ->route('posts.index')
        ->with('message','Post criado com sucesso');

    }

    public function show($id){
        $post = Post::find($id);
        // por normalidade o find recupera o id
        if(!$post){
            return redirect()->route('posts.index');
        }
        
        return view('admin.posts.show',compact('post'));
       
    }

    public function edit($id){
        
        // por normalidade o find recupera o id
        if(!$post = Post::find($id)){
            return redirect()->back(); //back para voltar de onde veio
        }
        
        return view('admin.posts.edit',compact('post'));
       
    }
    public function update(StoreUpdatePost $request, $id){
        
        // por normalidade o find recupera o id
        if(!$post = Post::find($id)){
            return redirect()->back(); //back para voltar de onde veio
        }
        $post->update($request->all());
       
        return redirect()
        ->route('posts.index')
        ->with('message','Post editado com sucesso');
    }



    public function destroy($id) {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('posts.index');
    } else {
        $post->delete();
        return redirect()
        ->route('posts.index')
        ->with('message','Post deletado com sucesso');
    }
    }
}
