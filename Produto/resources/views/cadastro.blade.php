<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de produtos</title>
</head>
    <body>
        <h1>Cadastro de Produtos</h1>
        @if(@session('success'))
            <p style="color: green">{{ session('succes') }}</p>
        @endif

        <form action="{{route('produto.salvar')}}" method="POST">
            @csrf
            <label for="nome">Nome produto: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome do produto" required value="{{ old('nome') }}">
            <br><br>

            <label for="quantidade">Quantidade: </label>
            <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade escolhida: " required value="{{ old('quantidade') }}">
            <br><br>

            <label for="preco">Preço: </label>
            <input type="number" name="preco" id="preco" placeholder="Preco" min="0" value="{{ old('preco') }}">
            <br><br>

            <label>Setor:</label>
            <select name="setor_id" id="setor_id">
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                @endforeach
            </select>
            <br><br>

            <input type="submit" value="cadastrar">
        </form>

        @if($errors->any())
            <div style="color: red">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>