<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos 💻</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<style>
table{
    width: 100%;
    border-collapse: collapse;
}

th, td{
    border: 1px solid black;
    padding: 5px;
}

a, button{
    border: 1px solid black;
    padding: 3px 8px;
    text-decoration: none;
    background: none;
    cursor: pointer;
}

.text-center{
    text-align: center;
}
</style>

<body>

    <div class="background-glow"></div>
    <div class="background-glow-2"></div>

    <div class="container">

        <div class="card">

            <div class="header-section">
                <h1 class="title">Relatório de Produtos</h1>
                <div class="decoration-line"></div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 70px;">ID</th>
                            <th>Nome</th>
                            <th class="text-center">Qtd</th>
                            <th>Preço</th>
                            <th>Setor</th>
                            <th>Descrição</th>
                            <th>Tamanho</th>
                            <th>Peso</th>
                            <th class="text-center" style="width: 110px;">Editar</th>
                            <th class="text-center" style="width: 110px;">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produtos as $produto)
                            <tr>
                                <td class="text-center">
                                    <span class="badge-id">#{{ $produto->id }}</span>
                                </td>
                                <td><strong>{{ $produto->nome }}</strong></td>
                                <td class="text-center">{{ $produto->quantidade }}</td>
                                <td class="product-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td>{{ $produto->setor?->nomeSetor ?? 'Não Informado' }}</td>
                                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $produto->detalhes?->descricao ?? '-' }}
                                </td>
                                <td>{{ $produto->detalhes?->tamanho ?? '-' }}</td>
                                <td>{{ $produto->detalhes?->peso ? $produto->detalhes->peso . ' kg' : '-' }}</td>

                                {{-- Ação: Editar --}}
                                <td class="text-center">
                                    <a href="{{ route('produto.editar', $produto->id) }}" class="btn-action btn-edit">
                                        <i class='bx bx-edit-alt'></i>
                                        Editar
                                    </a>
                                </td>

                                {{-- Ação: Deletar --}}
                                <td class="text-center">
                                    <form action="{{ route('produto.deletar', $produto->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir este produto?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            <i class='bx bx-trash'></i>
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center empty-state" style="padding: 50px 0;">
                                    <i class='bx bx-search-alt' style="font-size: 40px; display: block; margin-bottom: 10px; color: var(--text-light);"></i>
                                    Nenhum produto encontrado no estoque.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer-actions">
                <a href="{{ route('produto.cadastro') }}" class="btn-add">
                    <i class='bx bx-plus-circle'></i>
                    Cadastrar Novo Produto
                </a>
            </div>

        </div>

    </div>

</body>

</html>