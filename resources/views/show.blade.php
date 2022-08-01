<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados do Usuário</title>
</head>
<body>
    <h1>Dados do Usuário</h1>
    <h2>Nome: {{$user->name}}</h2>
    <h2>E-mail: {{$user->email}}</h2>
    <h1>Endereço do Usuário</h1>
    @php
        // listar o endereço do usuário
        $userAddress = $user->addressDelivery()->get()->first();
    @endphp
    @if ($userAddress)
        <h2>Endereço: {{$userAddress->address}} - No. {{$userAddress->number}} -
        Complemento: {{$userAddress->complement}} - CEP: {{$userAddress->zipcode}} -
        Cidade: {{$userAddress->city}} - UF: {{$userAddress->state}}</h2>
    @else
        Usuário não possui Endereço cadastrado.
    @endif

    <h1>Posts do Usuário</h1>
    @php
        // $posts = $user->posts()->orderBy('id', 'DESC')->take(3)->get();
        $posts = $user->posts()->orderBy('id', 'DESC')->get();
    @endphp
    @if ($posts)
        @foreach ($posts as $post)
            <h2>#{{$post->id}} <b>Título:</b> {{$post->title}}</h2>
            <h2><b>Subtítulo:</b> {{$post->subtitle}}</h2>
            <h2><b>Conteúdo:</b> {{$post->description}}</h2>

            @if ($comments)
                @foreach ($comments as $comment)
                    <h2>Comentário #{{$comment->id}}: {{$comment->content}}</h2>
                @endforeach
            @else
                <h2>Não há comentário neste post.</h2>
            @endif

            <small>{{$post->slug}}</small>
            <hr>
        @endforeach
    @else
        <h1>Não há posts cadastrados para este usuário.</h1>
    @endif

    {{-- Scope --}}
    <h1>Lista de Alunos (level <= 5)</h1>
    @if ($students)
        <ul>
        @foreach ($students as $student)
            <li><h2>Aluno: {{$student->name}} ({{$student->email}})</h2></li>
        @endforeach
        </ul>
    @else
        <h2>Não há usuários com o nível de "Aluno"</h2>
    @endif
    <hr>

    <h1>Lista de Admins (level > 5)</h1>
    @if ($admins)
        <ul>
        @foreach ($admins as $admin)
            <li><h2>Admin: {{$admin->name}} ({{$admin->email}})</h2></li>
        @endforeach
        </ul>
    @else
        <h2>Não há usuários com o nível de "Admin"</h2>
    @endif
    <hr>
</body>
</html>
