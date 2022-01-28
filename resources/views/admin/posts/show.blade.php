<h1>Detalhes do post : {{$post -> title}}</h1>


<ul>
    <li>
        Título: {{$post->title}}
    </li>
    <li>
        Conteúdo: {{$post->content}}
    </li>
</ul>

<form action="{{ route('posts.destroy',$post->id) }}" method='post'>
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar Post : {{$post -> title}}</button>
</form>