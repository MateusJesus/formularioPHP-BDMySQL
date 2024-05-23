<?php 
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    die;
}

$email = $_SESSION['email'];
$mensagem = $_POST['mensagem'];
$data = date('d/m/Y');
$hora = date('H:i:s');


$sql = "INSERT INTO mensagens (email, mensagem, data, hora) VALUES ('$email', '$mensagem', '$data', '$hora')";

$conn->query($sql);

header('Location: mensagens.php');

?>