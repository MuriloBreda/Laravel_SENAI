<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Setor</title>
</head>
<style>
    table{
        text-align: center
    }
</style>
<body>
    <h1>Relatório de Setores</h1>
    <a href="{{route('produto.cadastro')}}">Cadastrar Produto</a>
    <br>
    <a href="{{route('produto.setor')}}">Cadastrar Setor</a>

    <form method="GET" action="{{ route('setor.listar') }}">
        <input type="text" name="nome" placeholder="Digite o nome do setor" value="{{request('nome')}}">

        <button type="submit">Buscar</button>

    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>SETOR</th>
                <th>N° CORREDOR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($setores as $setor)
                <tr>
                    <td>{{ $setor->id }}</td>
                    <td>{{ $setor->nome }}</td>
                    <td>{{ $setor->nCorredor }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum PRODUTO encontrado</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>