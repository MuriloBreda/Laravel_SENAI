<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departamento - Cadastro</title>
</head>
<body>
    <header>
        <h1>Cadastro de Departamento</h1>
        <nav>
            <a href="/departamento/listar">Listar Departamentos</a>
        </nav>
    </header>
    <main>
        <form action="{{ route('departamento.salvar') }}" method="POST">
            @csrf
            <label for="setor">Setor:</label>
            <input type="text" id="setor" name="setor" required>
            <br></br>
            
            <label for="orcamento-">Orçamento:</label>
            <input type="number" id="orcamento" name="orcamento" required>
            <br></br>

            <label for="dataCriacao">Data de Criação:</label>
            <input type="date" id="dataCriacao" name="dataCriacao" required>
            <br></br>

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>