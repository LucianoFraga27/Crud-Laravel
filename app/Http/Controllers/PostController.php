<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdatePost;

class PostController extends Controller
{
    
    public function index(){
        //orderby -> deixar os posts em ordem orderBy('id','ASC')
        //latest() -> mais antigo pro mais novo
        $posts = Post::latest()->paginate(1); //referencia o model posts

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request){
        
        //receber arquivo
        $data = $request->all();
        if($request->image->isValid()){
            $extension = $request->image->getClientOriginalExtension();
            $nameFile = Str::of($request->title)->slug('-'). '.' .$extension ; 
            $file = $request->image->storeAs('posts',$nameFile);
            $data['image'] = $file;
        }



        Post::create($data);
        
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
        
        $data = $request->all();

        if($request->image && $request->image->isValid()){

            if(Storage::exists($post->image)){
                Storage::delete($post->image);
            }

            $extension = $request->image->getClientOriginalExtension();
            $nameFile = Str::of($request->title)->slug('-'). '.' .$extension ; 
            $file = $request->image->storeAs('posts',$nameFile);
            $data['image'] = $file;
        }
        
        
        $post->update($data);
       
        return redirect()
        ->route('posts.index')
        ->with('message','Post editado com sucesso');
    }



    public function destroy($id) {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('posts.index');
    } else {
        if(Storage::exists($post->image)){Storage::delete($post->image);}
        $post->delete();
        return redirect()
        ->route('posts.index')
        ->with('message','Post deletado com sucesso');
    }
    }

    public function search(Request $request){
        
        $filters = $request->except('_token');
        //procura pelo nome do post, igual , inicio ou fim % palavra pesquisada %
        $posts = Post::where('title', 'LIKE',"%{$request->search}%" )
                    ->orWhere('content', '=', $request->search)
                    ->paginate(1);

        return view('admin.posts.index',compact('posts','filters'));

    } 
}
