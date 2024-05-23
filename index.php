
<?php 

session_start();
include_once('config.php');
if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
    header('Location: mensagens.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de mensagens</title>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            font-family: Arial, Helvetica, sans-serif;
        }

        div {
            background-color: #d4d4d4;
            padding: 2em;
            border-radius: 10px;
        }

        .botaoLogin{
            color: white;
            font-weight: 700;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
            background-color: blue;
            border-radius: 5px;
            cursor: pointer;
        }

        .botaoCadrastro{
            color: white;
            font-weight: 700;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
            background-color: green;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div>
        <a class="botaoLogin" href="login.php">LOGIN</a>
        <a class="botaoCadrastro" href="cadastro.php">CADASTRO</a>
    </div>
</body>

</html>