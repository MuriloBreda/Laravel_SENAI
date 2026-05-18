<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Setor</title>
</head>
    <body>
        <h1>Cadastro setor</h1>
        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <form action="{{route('setor.salvar')}}" method="POST">
            @csrf
            <label for="nome_setor">setor: </label>
            <input type="text" name="nome" placeholder="setor">
            <input type="number" name="num_corredor" id="corredor" placeholder="Nº corredor" require value="{{ old('num_corredor') }}">
            <br><br>

            <input type="submit" value="Cadastrar">
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
    </body>
</html>