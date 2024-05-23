<?php 
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
    exit;
}

$email = $_SESSION['email'];

$sqlDeleteMensagens = "DELETE FROM mensagens WHERE email = '$email'"; 
$sqlDeleteUsuario = "DELETE FROM usuarios WHERE email = '$email'";

$resultMensagens = $conn->query($sqlDeleteMensagens); 
$resultUsuarios = $conn->query($sqlDeleteUsuario); 


session_destroy();

header('Location: index.php');

?>