<?php
    session_start();
    unset($_SESSION['senhaadm']);
    header("Location: adminlogin.php");
?>