<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Setor 💻</title>

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">
            <div class="top-icon">
                <i class='bx bx-buildings'></i>
            </div>

            <h1 class="title">Cadastrar Setor</h1>
            <div class="decoration-line"></div>

            <p class="subtitle">
                Preencha as informações abaixo para registrar um novo setor
                no sistema de forma rápida, moderna e organizada.
            </p>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{route('setor.salvar')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nomeSetor">
                        <i class='bx bx-briefcase-alt'></i>
                        Nome do Setor
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="nomeSetor"
                            id="nomeSetor"
                            placeholder="Digite o nome do setor"
                            required
                            value="{{ old('nomeSetor') }}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="numCorredor">
                        <i class='bx bx-map'></i>
                        Número do Corredor
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="number"
                            name="numCorredor"
                            id="numCorredor"
                            placeholder="Digite o número do corredor"
                            required
                            value="{{ old('numCorredor') }}"
                        >
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Cadastrar Setor
                    <i class='bx bx-paper-plane'></i>
                </button>
            </form>

            <div class="actions-wrapper">                
                <a href="{{ route('setor.listar') }}" class="link-list">
                    <i class='bx bx-list-ul'></i>
                    Ir para listagem de setores
                </a>
            </div>

            @if($errors->any())
                <div class="alert-danger">
                    <strong>
                        <i class='bx bx-error-circle'></i>
                        Ocorreram alguns erros:
                    </strong>

                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="footer-text">
                Sistema profissional de gerenciamento de setores
            </div>

        </div>

    </div>

</body>

</html>