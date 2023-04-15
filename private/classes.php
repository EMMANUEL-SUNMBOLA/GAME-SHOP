<?php

// practicing oop
class User{
    private $name;
    private $uid;
    private $email;
    private $password;
    private $card;
    private $dbhost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "";
    private $dbtab = "";

    function Checkmail($email){
        $this -> email = $email;
        $sub = '';
        $msg = '';
        $header = 'mime';
        mail($email, $sub, $msg, $header);
    }
    function Createuser($conn, $dbTab, $NewUid, $NewName, $NewEmail, $NewPass, $NewCard){
        $this->uid = $NewUid;
        $this->name = $NewName;
        $this->email = $NewEmail;
        $this->password = $NewPass;
        $this->card = $NewCard;
        $this -> dbtab = $dbTab;

        $msg = "INSERT INTO $dbTab(uid,username,email,password,card) VALUES('$NewUid','$NewName','$NewEmail',
        '$NewPass','$NewCard')";
        return ($conn->query($msg)) ? true : false;
    }
}