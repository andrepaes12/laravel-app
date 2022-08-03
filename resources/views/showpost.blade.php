<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post do Usuário</title>
</head>
<body>
    <h1>Post do Usuário</h1>
    <h2>#{{$post->id}} Título: {{$post->title}}</h2>
    <h3>Subtítulo: {{$post->subtitle}}</h3>
    <h3>Conteúdo: {{$post->description}}</h3>
    <h3>Data da criação: {{$post->created_fmt}}</h3>
    <h6>{{$post->slug}}</h6>
    <h3>Autor: {{$author->name}} (e-mail: {{$author->email}})</h3>
    <h3>Catgoria(s):</h3>
    @foreach ($postCategories as $category)
        <h3>#Id: {{$category->id}} - {{$category->name}}</h3>
    @endforeach
    @if ($comments)
        <h1>Comentários</h1>
        @foreach ($comments as $comment)
            <h2>Comentário: #{{$comment->id}} {{$comment->content}}</h2>
        @endforeach
    @endif

    <hr>
</body>
</html>
