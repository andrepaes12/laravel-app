<form action="{{route('imoveis.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" id=""><br><br>

    <label for="rental_price">Valor de Aluguel:</label>
    <input type="text" name="rental_price" id=""><br><br>

    <label for="cover">Selecionar imagem</label>
    <input type="file" name="cover" id=""><br><br>

    <button type="submit">Salvar dados!</button>

</form>
