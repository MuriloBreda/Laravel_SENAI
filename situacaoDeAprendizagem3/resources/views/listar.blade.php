<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos 💻</title>

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
                <h1 class="title">Listagem de Produtos</h1>
                <div class="decoration-line"></div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 70px;">ID</th>
                            <th>Nome</th>
                            <th class="text-center">MATÉRIA</th>
                            <th>DATA</th>
                            <th>QUANTIDADE</th>
                            <th>PREÇO</th>
                            <th class="text-center" style="width: 110px;">Editar</th>
                            <th class="text-center" style="width: 110px;">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>