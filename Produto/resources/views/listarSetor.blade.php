<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Setores 💻</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

            {{-- Campo de input para pesquisar o nome do setor --}}
           <form method="GET" action="{{ route('setor.listar') }}" class="form-busca-setor">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input
                        type="text"
                        name="nomeSetor"
                        placeholder="Pesquisar setor..."
                        value="{{ request('nomeSetor') }}"
                    >
                </div>
                    {{-- Botão de que vai filtrar  --}}
                <button type="submit" class="btn-search">
                    <i class='bx bx-filter-alt'></i>
                    Buscar
                </button>
            </form>

            <div class="table-responsive">
                <table>
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
                                <td><strong>{{ $setor->nomeSetor }}</strong></td>
                                <td class="text-center">
                                    <span class="corredor-info">
                                        <i class='bx bx-navigation' style="font-size: 14px;"></i>
                                        {{ $setor->numCorredor }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center empty-state">
                                    <i class='bx bx-search-alt' style="font-size: 36px; display: block; margin-bottom: 8px; color: var(--text-light);"></i>
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