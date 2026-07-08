<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Hemocentro</title>
</head>

<body>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            Sair
        </button>
    </form>

    <h1>Painel do Hemocentro</h1>

    <p>Área de gerenciamento do hemocentro</p>

</body>

</html>
