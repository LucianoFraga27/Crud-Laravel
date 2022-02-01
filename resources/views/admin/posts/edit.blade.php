@extends('admin.layouts.app')
@section('title','Editar post')
@section('content')

<h1>Editar post: {{$post->title}}<br></h1>


<form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
@method('PUT')

@include('admin.posts.partials.form')

</form>

@endsection
