<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departamento - Listar</title>
</head>
<body>
    <header>
        <h1>Listagem de Departamentos</h1>
        <nav>
            <a href="/departamento/cadastrar">Cadastrar Departamento</a>
            <br>
            <a href="/funcionario/cadastrar">Cadastrar Funcionário</a>
        </nav>
    </header>
    <main>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Setor</th>
                    <th>Orçamento</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->setor }}</td>
                    <td>{{ $departamento->orcamento }}</td>
                    <td>{{ $departamento->dataCriacao }}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum DEPARTAMENTO encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>

</body>
</html>