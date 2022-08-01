<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categoria do Post</title>
</head>
<body>
    <h1>Categoria do Post</h1>
    <h2>{{$category->name}}</h2>
    @if ($posts)
        @foreach ($posts as $post)
            <h2>#{{$post->id}} Título: {{$post->title}}</h2>
            <h3>Subtítulo: {{$post->subtitle}}</h3>
            <h3>Conteúdo: {{$post->description}}</h3>
            <h6>{{$post->slug}}</h6>
        @endforeach
    @endif
    <hr>
</body>
</html>
