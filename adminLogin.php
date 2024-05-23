<?php 
session_start();
if ((isset($_SESSION['senhaadm']) == true)) {
    header('Location: adminmensagens.php');
    exit;
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
        }

        .botaoinicio {
            text-decoration: none;
            padding: 1em;
            border-radius: 10px;
            background-color: green;
        }

        form {
            background: #e6e6e6;
            display: flex;
            flex-flow: column wrap;
            padding: 40px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }


        input {
            width: 90%;
            height: 30px;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 10px;
        }

        .logar {
            background: green;
            color: white;
            padding: 1em;
            border: none;
            cursor: pointer;
            width: 100%;
            inline-size: none;
        }

        button:hover {
            background: rgb(13, 166, 13);
        }

        .mensagens {
            display: flex;
            flex-flow: column;
            background: #e6e6e6;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <a href="index.php">Voltar</a>
    <h1>ADMIN Login</h1>
    <form action="testLoginAdmin.php" method="POST">
        <label for="senha">Senha:</label>
        <input type="password" name="senhaadm" placeholder="Digite sua senha" required>
        <input class="logar" type="submit" name="submit" value="Logar">
    </form>
</body>

</html>