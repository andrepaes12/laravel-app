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
    <h2>
    @php
        // listar o endereço do usuário
        $userAddress = $user->addressDelivery()->get()->first();
        if ($userAddress){
            echo "Endereço: {$userAddress->address} - No. {$userAddress->number} - ";
            echo "Complemento: {$userAddress->complement} - CEP: {$userAddress->zipcode} - ";
            echo "Cidade: {$userAddress->city} - UF: {$userAddress->state}<br>";
        } else {
            echo "Usuário não possui Endereço cadastrado.";
        }

        // listar os posts do usuário
        echo "<h1>Posts do Usuário</h1>";
        // $posts = $user->posts()->orderBy('id', 'DESC')->take(3)->get();
        $posts = $user->posts()->orderBy('id', 'DESC')->get();
        if ($posts) {
            foreach ($posts as $post) {
                echo "#{$post->id} <b>Título:</b> {$post->title}<br>";
                echo "<b>Subtítulo:</b> {$post->subtitle}<br>";
                echo "<b>Conteúdo:</b> {$post->description}<br>";

                if ($comments){
                    foreach ($comments as $comment) {
                        echo "Comentário by #{$comment->user_id}: {$comment->content}<br>";
                    }
                } else {
                    echo "Não há comentários neste post.";
                }
                echo "<small>{$post->slug}</small><br><hr>";
            }
        } else {
            echo "Não há posts cadastrados para o usuário.";
        }
    @endphp
    </h2>
</body>
</html>
