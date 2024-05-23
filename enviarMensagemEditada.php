<?php 
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    die;
}

$idmensagens = $_POST['idmensagens'];
$email = $_SESSION['email'];
$mensagem = $_POST['mensagem'];
$data = date('d/m/Y');
$hora = date('H:i:s');

$sql = "UPDATE mensagens SET mensagem='$mensagem', email='$email', data='$data', hora='$hora' WHERE email='$email' and idmensagens='$idmensagens'";

$conn->query($sql);

header('Location: mensagens.php');

?>