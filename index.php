<?php session_start() ?>

<?php

    if(!isset($_SESSION['login'])) {
        include('Login/login.php');
    }else{
        include('Home/home.php');
    }
?>