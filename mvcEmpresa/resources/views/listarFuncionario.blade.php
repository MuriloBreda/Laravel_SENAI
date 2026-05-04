<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionários - Listar</title>
</head>
<body>
    <header>
        <h1>Listagem de Funcionários</h1>
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
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Email</th>
                    <th>Data de Adimissão</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Data de Nascimento</th>
                    <th>CEP</th>
                    <th>Departamento</th>
                    <th>Atualizar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->sobrenome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->salario }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->dataAdimissao }}</td>
                    <td>{{ $funcionario->dadosPessoais->CPF }}</td>
                    <td>{{ $funcionario->dadosPessoais->RG }}</td>
                    <td>{{ $funcionario->dadosPessoais->dataNascimento }}</td>
                    <td>{{ $funcionario->dadosPessoais->CEP }}</td>
                    <td>{{ $funcionario->departamento->setor ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('funcionario.atualizar', $funcionario->id) }}">Atualizar</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="13" style="text-align: center">Nenhum FUNCIONÁRIO encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>

</body>
</html>