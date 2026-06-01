<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Setores</title>

</head>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">

            <div class="header-section">
                <h1 class="title">Lista de Setores</h1>
                <div class="decoration-line"></div>
            </div>

            <!-- AULA E HOJE INICIO-->

<form method="GET" action="{{ route('setor.listar') }}">
    
    <input
        type="text"
        name="nome"
        placeholder="Digite o nome do setor"
        value="{{ request('nome') }}"
    >

    <button type="submit">Buscar</button>

</form>

            <div class="table-responsive">
                <table border=1>
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th>Setor</th>
                            <th class="text-center" style="width: 140px;">Corredor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($setores as $setor)
                            <tr>
                                <td class="text-center">
                                    <span class="badge-id">#{{ $setor->id }}</span>
                                </td>
                                <td><strong>{{ $setor->nome }}</strong></td>
                                <td class="text-center">
                                    <span class="corredor-info">
                                        <i class='bx bx-navigation' style="font-size: 14px;"></i>
                                        {{ $setor->num_corredor }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center empty-state">
                                    <i class='bx bx-search-alt'
                                        style="font-size: 36px; display: block; margin-bottom: 8px; color: var(--text-light);"></i>
                                    Nenhum setor encontrado 🔍
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer-actions">
                <a href="{{ route('setor.cadastro') }}" class="btn-add">
                    <i class='bx bx-plus-circle'></i>
                    Cadastrar novo setor
                </a>
            </div>

        </div>

    </div>

</body>

</html>