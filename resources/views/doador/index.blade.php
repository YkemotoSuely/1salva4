<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel do Doador</title>
</head>

<body>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            Sair
        </button>
    </form>

    <h1>Painel do Doador</h1>

    <p>Bem-vindo ao Sistema 1 Salva 4</p>

</body>

</html>
