<?php
    if(!isset($_SESSION['login'])) 
        header("location: index.php");

    include_once "./view/header.php";
    include_once "./view/forms/home.php";
    include_once "./view/footer.php";

