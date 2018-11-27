<?php

session_start();

if(!$_SESSION['usu_id']){
    header('Location: login.php');
    exit();
}

