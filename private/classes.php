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
    private $code = "";

    function Checkmail($email, $code){
        $this -> email = $email;
        $this -> code = $code;
        $sub = '<h1>Confirm your Email</h1>';
        $msg = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirm Email</title>
        </head>
        <body style="align-items: center;font-family: sans-serif;">
            <nav 
            style="width: 100%; background-color: #000; color: white; align-items: center;font-size: 35px;">Game-Shop</nav>
            <section>
                <p style="font-size: 20px;">Your code is</p>
                <h2 style="width: fit-content; height: 30px; align-items: center; background-color: #1b1c30; color: white; font-size: 20px;">'. $code . '</h2>
            </section>
        </body>
        </html>
        ';
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