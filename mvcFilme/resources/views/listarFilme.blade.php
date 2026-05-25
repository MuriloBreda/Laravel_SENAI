<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>
        <h1>Controle de Filmes</h1>
        <a href="/autor/listar">Listar Autores</a>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DATA LANÇAMENTO</th>
                    <th>SINOPSE</th>
                    <th>GENERO</th>
                    <th>ORÇAMENTO</th>
                    <th>AUTOR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($Filmes as $Filme)
                    <tr>
                        <td>{{ $Filme->id }}</td>
                        <td>{{ $Filme->titulo }}</td>
                        <td>{{ $Filme->dataLancamento }}</td>
                        <td>{{ $Filme->sinopse }}</td>
                        <td>{{ $Filme->genero }}</td>
                        <td>{{ $Filme->orcamento }}</td>
                        <td>{{ $Filme->autor->nome ?? 'Autor não especificado' }}</td>
                        {{-- <td>
                            <a href="{{route('filme.atualizar', $Filme->id)}}">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('filme.deletar', $Filme->id)}}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja deletar este filme?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td> --}}
                </tr>
                @empty
                    <tr>
                        <td colsoan="6">Nenhum Filme encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>