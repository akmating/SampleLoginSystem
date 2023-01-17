<?php

class SignupController extends Signup{

    private $userId;
    private $password;
    private $retypePassword;
    private $email;

    public function __construct($userId, $password, $retypePassword, $email)
    {
        $this->userId = $userId;
        $this->password = $password;
        $this->retypePassword = $retypePassword;
        $this->email = $email;
    }

    public function signupUser(){
        if($this->checkIfEmpty() == false){
            header("locationn: ../index.php?error=emptyFields");
        }
        if($this->validUserId() == false){
            header("locationn: ../index.php?error=invaliUsername");
        }
        if($this->validEmail() == false){
            header("locationn: ../index.php?error=invalidEmail");
        }
        if($this->validRetPassword() == false){
            header("locationn: ../index.php?error=passwordNotMatch");
        }
        if($this->validateProf() == false){
            header("locationn: ../index.php?error=userTaken");
        }

        $this->setUser($this->userId, $this->password, $this->email);
    }

    private function checkIfempty(){
        if(empty($this->userId) || empty($this->password) || empty($this->retypePassword) || empty($this->email)){
            $result = false;
        }
        else $result = true;
        return $result;
    }

    private function validUserId(){
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->userId)){
            $result = false;
        }
        else $result = true;
        return $result;
    }

    private function validRetPassword(){
        if($this->password !== $this->retypePassword){
            $result = false;
        }
        else $result = true;
        return $result;
    }

    private function validEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else $result = true;
        return $result;
    }

    private function validateProf(){
        if(!$this->checkUser($this->userId, $this->email)){
            $result = false;
        }
        else $result = true;
        return $result;
    }
}