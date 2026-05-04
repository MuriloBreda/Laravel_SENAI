<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Informações</title>
</head>
<body>
    <header>
        <h1>Atualizar Funcionários</h1>
        <nav>
            <a href="/funcionario/listar">Listar Funcionários</a>
        </nav>
    </header>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <main>

        <form action="{{ route('funcionario.atualizar', $funcionario->id) }}" method="POST">
            @csrf
            @method('PUT')

            Nome:
            <input type="text" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>
            <br><br>

            Sobrenome:
            <input type="text" name="sobrenome" value="{{ old('sobrenome', $funcionario->sobrenome) }}" required>
            <br><br>

            Cargo:
            <input type="text" name="cargo" value="{{ old('cargo', $funcionario->cargo) }}" required>
            <br><br>

            Salário:
            <input type="text" name="salario" value="{{ old('salario', $funcionario->salario) }}" required>
            <br><br>

            Email:
            <input type="email" name="email" value="{{ old('email', $funcionario->email) }}" required>
            <br><br>

            Data de Admissão:
            <input type="date" name="dataAdimissao" value="{{ old('dataAdimissao', $funcionario->dataAdimissao) }}" required>
            <br><br>

            <label for="departamento_id">Departamento: </label>
            <select name="departamento_id" id="departamento_id">
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}"
                        {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->setor }}
                    </option>
                @endforeach
            </select>
            <br><br>

            CPF:
            <input type="number" name="CPF" value="{{ old('CPF', $funcionario->dadosPessoais->CPF) }}" required>
            <br><br>

            RG:
            <input type="number" name="RG" value="{{ old('RG', $funcionario->dadosPessoais->RG) }}" required>
            <br><br>

            Data de Nascimento:
            <input type="date" name="dataNascimento" value="{{ old('dataNascimento', $funcionario->dadosPessoais->dataNascimento) }}" required>
            <br><br>

            CEP:
            <input type="number" name="CEP" value="{{ old('CEP', $funcionario->dadosPessoais->CEP) }}" required>
            <br><br>

            <button type="submit">Atualizar</button>

        </form>

        @if($errors->any())
            <div style="color: red">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </main>
    
</body>
</html>