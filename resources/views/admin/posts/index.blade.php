<!--Bizu : por como route('nomearquivo') para que nao exista conflito caso um dia queira mudar o nome da rota-->
<a href="{{route('posts.create')}}">Criar novo post</a>
<hr>
<h1>Posts</h1>

@foreach ($posts as $post)
<p>{{ $post -> title}}</p>
@endforeach