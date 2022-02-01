<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="{{route('posts.index')}}">Inicio</a></li>
            <li><a href="{{route('posts.create')}}">Criar novo post</a></li>
        </ul>
    </header>
    <div class="content">
    @yield('content')

    </div>


</body>
</html>