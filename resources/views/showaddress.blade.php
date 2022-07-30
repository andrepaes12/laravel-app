<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Endereço do Usuário</title>
</head>
<body>
    <h1>Endereço do Usuário</h1>
    @php
        $user = $address->userAddress()->get()->first();
    @endphp
    <h2>Nome: {{$user->name}}</h2>
    <h2>E-mail: {{$user->email}}</h2>
    <h2>Endereço: {{$address->address}} - No. {{$address->number}}
        - Complemento: {{$address->complement}} - CEP: {{$address->zipcode}}
        - Cidade: {{$address->city}} - UF: {{$address->state}}</h2>
</body>
</html>
