<?php
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit;
}

if (isset($_GET['id']))  {
    $idmensagens = $_GET['id'];
    $email = $_SESSION['email'];
    $sqlEdit = "SELECT * FROM mensagens WHERE idmensagens = '$idmensagens' and email = '$email'";
    $result = $conn->query($sqlEdit);
    if (mysqli_num_rows($result) == 0) {
        header('Location: mensagens.php');
    }else {
        $row = $result -> fetch_assoc();
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <a href="mensagens.php">Voltar</a>
    <form action="enviarMensagemEditada.php" method="post"> 
        <label for="mensagem">Digite uma mensagem</label>
        <textarea name="mensagem" id="mensagem"><?php echo $row['mensagem'] ?></textarea>
        <input type="hidden" name="idmensagens" id="idmensagens" value="<?php echo $row['idmensagens']?>">
        <button type="submit">Editar Mensagem</button>
    </form>
</body>

</html>