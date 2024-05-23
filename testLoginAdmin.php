<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['senhaadm']))
    {
        include_once('config.php');
        $senhaadm = $_POST['senhaadm'];

        if($senhaadm == 1234)
        {
            $_SESSION['senhaadm'] = $senhaadm;
            header('Location: adminMensagens.php');
        }
        else
        {
            unset($_SESSION['senhaadm']);
            header('Location: adminLogin.php');
        }
    }
    else
    {
        $_SESSION['senhaadm'] = $senhaadm;
        header('Location: adminMensagens.php');
    }
?>