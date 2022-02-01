@extends('admin.layouts.app')

@section('content')
<!--Bizu : por como route('nomearquivo') para que nao exista conflito caso um dia queira mudar o nome da rota-->

<hr>
<h1>Posts</h1>
<!-- Search -->
<form action="{{route('posts.search')}}" method="post">
    @csrf
    <input type="text" name="search" id="seach" placeholder="Pesquisar">
    <button type="submit">Enviar</button>
</form>

@if(session('message'))
<p>{{session('message')}}</p>
@endif

@foreach ($posts as $post)
<img src="{{url("storage/$post->image")}}" alt="{{$post->title}}" style="max-width:300px">
<p>{{ $post -> title}}
<a href="{{route('posts.show',$post->id)}}">Ver detalhes</a>
<a href="{{route('posts.edit',$post->id)}}">Editar</a>
</p>
@endforeach

<hr>
@if(isset($filters))
    {{$posts->appends($filters)->links()}}
@else
    {{$posts->links()}}
@endif

@endsection('content')