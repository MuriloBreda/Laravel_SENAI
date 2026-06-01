<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>
        <h1>Controle de Autores</h1>
        <a href="/filme/listar">Listar Filmes</a>
        <br>

        <form method="GET" action="{{ route('autor.listar') }}">
    
            <input
                type="text"
                name="nome"
                placeholder="Digite o nome do autor"
                value="{{ request('nome') }}"
            >
            
            <input
                type="text"
                name="telefone"
                placeholder="Digite o telefone do autor"
                value="{{ request('telefone') }}"
            >

            <button type="submit">Buscar</button>

        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DATA NASCIMENTO</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th
                </tr>
            </thead>
            <tbody>
                @forelse($autores as $Autor)
                    <tr>
                        <td>{{ $Autor->id }}</td>
                        <td>{{ $Autor->nome }}</td>
                        <td>{{ $Autor->dataNascimento }}</td>
                        <td>{{ $Autor->email }}</td>
                        <td>{{ $Autor->telefone }}</td>
                        {{-- <td>
                            <a href="{{route('autor.atualizar', $Autor->id)}}">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('autor.deletar', $Autor->id)}}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja deletar este autor?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colsoan="5">Nenhum Autor encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>