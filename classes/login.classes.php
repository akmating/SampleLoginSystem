<?php

class Login extends Dbh{

    protected function getUser($userId, $password){
        
        $stmt = $this->connect()->prepare('SELECT user_pwd FROM users WHERE user_id = ?');
       
        if(!$stmt->execute(array($userId))){
            $stmt = null;
            header("location: ../index.php?error=sqlFailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["user_pwd"]);

        if($checkPwd==false){
            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit();
        }
        elseif($checkPwd ==true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ?');
            if(!$stmt->execute(array($userId))){
                $stmt = null;
                header("location: ../index.php?error=sqlFailed");
                exit();
            }

            if($stmt->rowCount()==0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header("location: ../index.php");
            session_start();
            $_SESSION["id"] = $user[0]["id_number"];
            $_SESSION["userId"] = $user[0]["user_id"];

        }
        $stmt = null;
    }

}