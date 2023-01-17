<?php

if(isset($_POST["submit"])){
    
    $userId = $_POST["userId"];
    $password = $_POST["password"];

    //Instantiate Login Controller class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginController($userId, $password);

    $login->loginUser();
    
}