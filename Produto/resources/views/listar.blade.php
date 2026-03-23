<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto);
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->preco }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Nenhum PRODUTO encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>