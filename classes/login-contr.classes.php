<?php

class LoginController extends Login{

    private $userId;
    private $password;

    public function __construct($userId, $password)
    {
        $this->userId = $userId;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->checkIfEmpty() == false){
            header("locationn: ../index.php?error=emptyFields");
        }

        $this->getUser($this->userId, $this->password);
    }

    private function checkIfempty(){
        if(empty($this->userId) || empty($this->password)){
            $result = false;
        }
        else $result = true;
        return $result;
    }

   
}