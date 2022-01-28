<!--Bizu : por como route('nomearquivo') para que nao exista conflito caso um dia queira mudar o nome da rota-->
<a href="{{route('posts.create')}}">Criar novo post</a>
<hr>
<h1>Posts</h1>

@if(session('message'))
<p>{{session('message')}}</p>
@endif

@foreach ($posts as $post)
<p>{{ $post -> title}}
<a href="{{route('posts.show',$post->id)}}">Ver detalhes</a>
</p>
@endforeach