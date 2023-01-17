<?php

if(isset($_POST["submit"])){
    
    //Obtaining data from the signup form
    $userId = $_POST["userId"];
    $password = $_POST["password"];
    $retypePassword = $_POST["retypePassword"];
    $email = $_POST["email"];

    //Instantiate Signup Controller class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupController($userId, $password, $retypePassword, $email);

    $signup->signupUser();
    
}