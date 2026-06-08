<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário 👤</title>

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
                <i class='bx bx-user'></i>
            </div>

            <h1 class="title">Cadastrar Usuário</h1>
            <div class="decoration-line"></div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{route('usuario.salvar')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">
                        <i class='bx bx-briefcase-alt'></i>
                        Nome
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Digite seu nome..."
                            required
                            value="{{ old('name') }}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class='bx bx-at'></i>
                        Email
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="email"
                            name="email"
                            id="email"
                            placeholder="Digite seu email..."
                            required
                            value="{{ old('email') }}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class='bx bx-lock'></i>
                        Senha
                    </label>

                    <div class="input-wrapper">
                        <input
                            class="form-input"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Digite sua senha.."
                            required
                            value="{{ old('password') }}"
                        >
                    </div>
                </div>

                    <div class="form-group">
                        <label for="tipo" class="form-label">
                            <i class="bx bx-user"></i> Tipo:
                        </label>
                        <div class="input-wrapper">
                            <select name="tipo" id="tipo" class="form-input">
                                <option value="usuario">Usuário</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>
                    </div>

                <button type="submit" class="submit-btn">
                    Cadastrar
                    <i class="bx bx-paper-plane"></i>
                </button>
            </form>

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

        </div>

    </div>

</body>

</html>