<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Alunos</title>
</head>
<style>
    table{
        text-align: center
    }
</style>
<body>
    <h1>Relatório de Alunos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>ID TURMA</th>
                <th>SERIE</th>
                <th>NUM SALA</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alunos as $aluno);
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->turma?->id }}</td>
                    <td>{{ $aluno->turma?->serie }}</td>
                    <td>{{ $aluno->turma?->numSala }}</td>
                    <td>
                        <a href="{{route('aluno.atualizar', $aluno->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('aluno.deletar', $aluno->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum ALUNO encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>