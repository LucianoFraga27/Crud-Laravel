<h1>Editar post: {{$post->title}}<br></h1>

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<form action="{{route('posts.update',$post->id)}}" method="POST">
@csrf
<!--Em todo formulario deve por @csrf-->
@method('PUT')
<input type="text" name='title' id='title' placeholder='Título' value="{{$post->title}}">
<textarea name="content" id="content" cols="30" rows="4" placeholder='Conteúdo'>{{$post->content}}</textarea>
<button type="submit" name='envio'>Enviar</button>
</form>