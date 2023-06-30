<?php

    session_start();
    unset($_SESSION['nama']);
    unset($_SESSION['id_login']);
    unset($_SESSION['email']);
    unset($_SESSION['level']);
    header('Location:index.php');
?>