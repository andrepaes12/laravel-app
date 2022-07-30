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
    <h2>
    @php
        $userAddress = $user->addressDelivery()->get()->first();
        if ($userAddress){
            echo "Endereço: {$userAddress->address} - No. {$userAddress->number} - ";
            echo "Complemento: {$userAddress->complement} - CEP: {$userAddress->zipcode} - ";
            echo "Cidade: {$userAddress->city} - UF: {$userAddress->state}";
        } else {
            echo "Usuário não possui Endereço cadastrado.";
        }
    @endphp
    </h2>
</body>
</html>
