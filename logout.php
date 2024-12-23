<?php
session_start();

if (isset($_SESSION['username'])){
    session_destroy();
    header("location: login.html");
    exit;
}else{
    header("location: login.html");
    exit;
}
?>