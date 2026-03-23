<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatório de Alunos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alunos as $aluno);
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>Faremos na proxima aula</td>
                    <td>Faremos na proxima aula</td>
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