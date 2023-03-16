<?php
    if(!isset($_SESSION['login'])) 
        header("location: index.php");

    include_once "./view/header.php";
    include_once "./view/forms/show_accident.php";
    include_once "./view/footer.php";