<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Turmas</title>
</head>
<body>
    <h1>Cadastro Turma</h1>

    @if(session('sucess'))
        <p style="color:green">{{ session('sucess')}}</p>
    @endif

    <form action="{{ route('turma.salvar') }}" method="POST">
        @csrf
        <label for="numSala">Número Sala:</label>
        <input type="number" name="numSala" id="numSala" placeholder="Número da sala..." require value="{{old('numSala')}}">
        <br><br>

        <label for="serie">Serie:</label>
        <input type="text" name="serie" id="serie" placeholder="Serie..." require value="{{old('serie')}}">
        
        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>

        </div>
    @endif
</body>
</html>