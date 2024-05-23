<?php
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit;
}else{
    $logado = $_SESSION['email'];
    $sql = "SELECT * FROM mensagens WHERE email = '$logado'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        li{
            background: #e6e6e6;
            padding: 1em;
            border-radius: 10px;
            height: 100%;
        }

        input {
            width: 100%;
            height: 30px;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 10px;
        }


        textarea {
            width: 90%;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 10px;
        }

        button {
            background: green;
            color: white;
            padding: 15px 10px;
            border: none;
            cursor: pointer;
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
    <a href="sair.php">Sair</a>
    <a href="deletarConta.php">Deletar conta</a>
    <h1><?php print_r($logado) ?></h1>
    <form action="enviarMensagem.php" method="POST">
        <label for="mensagem">Digite uma mensagem</label>
        <textarea required name="mensagem" id="mensagem"></textarea>
        <button type="submit">Enviar Mensagem</button>
    </form>
    <div>
        <?php if(isset($result)) : ?>
        <h1>Mensagens que você enviou!</h1>
        <ul>
        <?php while($row = $result -> fetch_assoc()) : ?>
            <li>
                <strong>Mensagem: </strong> <?php echo $row['mensagem'];?> <br>
                <strong>Data: </strong> <?php echo $row['data']; ?> às <?php echo $row['hora']; ?><br>
                <a href="mensagemEditar.php?id=<?php echo $row['idmensagens']?>">EDITAR</a><br>
                <a href="deletarMensagem.php?id=<?php echo $row['idmensagens']?>">EXCLUIR</a><br>
            </li>
            <br>
            <?php endwhile; ?>
        </ul>
        
        <?php else : ?>
            <p>Nenhuma mensagem encontrada!</p>
        <?php endif ?>
    </div>
</body>

</html>