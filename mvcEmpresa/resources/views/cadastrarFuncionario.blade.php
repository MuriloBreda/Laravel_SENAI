<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionário - Cadastro</title>
</head>
<body>
    <header>
        <h1>Cadastro de Funcionário</h1>
        <nav>
            <a href="/funcionario/listar">Listar Funcionários</a>
        </nav>
    </header>
    <main>
        <form action="{{ route('funcionario.salvar') }}" method="POST">
            @csrf
            <br>
                <h2>Dados Gerais</h2>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <br></br>
            
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" required>
                <br></br>
            
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required>
                <br></br>
            
                <label for="salario">Salário:</label>
                <input type="text" id="salario" name="salario" required>
                <br></br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br></br>
            
                <label for="dataAdimissao">Data de Admissão:</label>
                <input type="date" id="dataAdimissao" name="dataAdimissao" required>
                <br></br>

                <label for="departamento_id">Departamento: </label>
                <select name="departamento_id" id="departamento_id">
                    @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->id}}">{{$departamento->setor}}</option>
                    @endforeach
                </select>

            
                <hr>
            
                <br>
                <h2>Dados Pessoais</h2>

                <label for="CPF">CPF:</label>
                <input type="number" id="CPF" name="CPF" required>
                <br></br>

                <label for="rg">RG:</label>
                <input type="number" id="RG" name="RG" required>
                <br></br>

                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" id="dataNascimento" name="dataNascimento" required>
                <br></br>

                <label for="CEP">CEP:</label>
                <input type="number" id="CEP" name="CEP" required>
                <br></br>
            
                <button type="submit">Cadastrar</button>
        </form>
</body>
</html>