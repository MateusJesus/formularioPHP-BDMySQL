<?php

include_once('config.php');

if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data = date('d/m/Y');
    $hora = date('H:i:s');
    $sqlVer = "SELECT email FROM usuarios WHERE email = '$email'";

    $smtpVer = $conn->query($sqlVer);

    if (mysqli_num_rows($smtpVer) != 0) {
        header('Location: cadastro.php');
        die;
    }

    $sql = "INSERT INTO usuarios (nome, email, senha, data, hora) VALUES ('$nome', '$email', '$senha', '$data', '$hora')";

    $smtp = $conn->query($sql);

    if ($smtp) {
        header('Location: login.php');
    } else {
        echo 'Erro';
    }
} else {
    header('Location: cadastro.php');
}
