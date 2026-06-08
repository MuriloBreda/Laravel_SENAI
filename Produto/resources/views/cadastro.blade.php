<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto 💻</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">

            <div class="top-icon">
                <i class='bx bx-package'></i>
            </div>

            <h1 class="title">Cadastrar Produto</h1>

            <br>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">SAIR</button>
            </form>

            <div class="decoration-line"></div>

            <p class="subtitle">
                Preencha as especificações abaixo para registrar um novo produto 
                no estoque de forma rápida, moderna e integrada aos setores.
            </p>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('produto.salvar') }}" method="POST">
                @csrf

                <div class="form-grid">
                    
                    {{-- Nome do Produto --}}
                    <div class="form-group full-width">
                        <label class="form-label" for="nome">
                            <i class='bx bx-purchase-tag-alt'></i>
                            Nome do Produto
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="text" name="nome" id="nome" placeholder="Ex: Notebook Dell Inspiron" required value="{{ old('nome') }}">
                        </div>
                    </div>

                    {{-- Preço --}}
                    <div class="form-group">
                        <label class="form-label" for="preco">
                            <i class='bx bx-dollar-circle'></i>
                            Preço (R$)
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="number" step="0.01" name="preco" id="preco" placeholder="0,00" required value="{{ old('preco') }}">
                        </div>
                    </div>

                    {{-- Quantidade --}}
                    <div class="form-group">
                        <label class="form-label" for="quantidade">
                            <i class='bx bx-layer'></i>
                            Quantidade
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="number" name="quantidade" id="quantidade" placeholder="Ex: 15" required value="{{ old('quantidade') }}">
                        </div>
                    </div>

                    {{-- Setor Relacionado --}}
                    <div class="form-group full-width">
                        <label class="form-label" for="setor">
                            <i class='bx bx-buildings'></i>
                            Setor Responsável
                        </label>
                        <div class="input-wrapper">
                            <select class="form-select" name="setor_id" id="setor" required>
                                <option value="" disabled selected>Selecione o setor de destino</option>
                                @foreach ($setores as $setor)
                                    <option value="{{ $setor->id }}" {{ old('setor_id') == $setor->id ? 'selected' : '' }}>
                                        {{ $setor->nomeSetor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Descrição --}}
                    <div class="form-group full-width">
                        <label class="form-label" for="descricao">
                            <i class='bx bx-detail'></i>
                            Descrição Breve
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="text" name="descricao" id="descricao" placeholder="Detalhes principais do item" required value="{{ old('descricao') }}">
                        </div>
                    </div>

                    {{-- Tamanho --}}
                    <div class="form-group">
                        <label class="form-label" for="tamanho">
                            <i class='bx bx-ruler'></i>
                            Dimensões / Tamanho
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="text" name="tamanho" id="tamanho" placeholder="Ex: 40cm, 2 Metros..." required value="{{ old('tamanho') }}">
                        </div>
                    </div>

                    {{-- Peso --}}
                    <div class="form-group">
                        <label class="form-label" for="peso">
                            <i class='bx bx-git-commit'></i>
                            Peso (kg)
                        </label>
                        <div class="input-wrapper">
                            <input class="form-input" type="number" step="0.001" name="peso" id="peso" placeholder="Ex: 1.550" required value="{{ old('peso') }}">
                        </div>
                    </div>

                </div>

                <div class="actions-wrapper">
                    <button type="submit" class="submit-btn">
                        <i class='bx bx-save'></i>
                        Cadastrar Produto
                    </button>
                    
                    <a href="{{ route('produto.listar') }}" class="link-list">
                        <i class='bx bx-list-ul'></i>
                        Ir para listagem de produtos
                    </a>
                </div>

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

            <div class="footer-text">
                Sistema profissional de gerenciamento de estoque
            </div>

        </div>

    </div>

</body>

</html>