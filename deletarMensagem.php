<?php 
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    die;
}else{
    $id = $_GET['id'];
    $email = $_SESSION['email'];

    $sql = "DELETE FROM mensagens WHERE idmensagens = '$id' and email = '$email'";

    $conn->query($sql);

    header('Location: mensagens.php');
}
?>