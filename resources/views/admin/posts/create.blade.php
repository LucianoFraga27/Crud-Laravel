@extends('admin.layouts.app')
@section('title','Criar novo post')
@section('content')



<div class="w-11/12 p-12 bg-white sm:w-8/12 1g:w-5/12 mx-auto">
<form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">

@include('admin.posts.partials.form')

</form>
</div>
@endsection