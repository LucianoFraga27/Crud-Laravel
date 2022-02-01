@extends('admin.layouts.app')
@section('title','Criar novo post')
@section('content')


<h1>Novo post: <br></h1>

<form action="{{ route('posts.store')}}" method="POST">

@include('admin.posts.partials.form')

</form>
@endsection