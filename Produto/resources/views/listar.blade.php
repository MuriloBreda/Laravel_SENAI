<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Controle de Produtos</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>QUANTIDADE</th>
                    <th>PREÇO</th>
                    <th>SETOR</th>
                    <th>ATUALIZAR</th>
                    <th>DELETAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($Produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->setor?->id }}</td>
                        <td>
                            <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('produto.deletar', $produto->id)}}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja deletar este produto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="3">Nenhum Produto encontrado</td>
                    </tr>
                @endforelse
            </tbody>

            <br>

            <table border="1">
            <h1>Setores</h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME SETOR</th>
                </tr>
            </thead>
            <tbody>

            <tbody>
                @forelse($Produtos as $produto)
                    <tr>
                        <td>{{ $produto->setor->id }}</td>
                        <td>{{ $produto->setor->nome }}</td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="3">Nenhum Setor encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>