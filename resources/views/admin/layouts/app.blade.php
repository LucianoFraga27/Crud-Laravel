<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ url('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('title')</title>
</head>
<body class="font-sans antialiased">
    <header>
        <ul>
            <li><a href="{{route('posts.index')}}">Inicio</a></li>
            <li><a href="{{route('posts.create')}}">Criar novo post</a></li>
        </ul>
    </header>
    <div class="container mx-auto py-8">
    @yield('content')

    </div>


</body>
</html>