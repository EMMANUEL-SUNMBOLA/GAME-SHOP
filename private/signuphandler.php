<?php
$err = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sign"])) {
    $prob = [];
    require("db.php");
    require("functions.php");
    require("classes.php");
    $obj = new User;

    $username = strip_tags($_POST["USERNAME"]);
    $email = strip_tags($_POST["EMAIL"]);
    $uid = strip_tags($_POST["UID"]);
    $password = strip_tags($_POST["PASSWORD"]);
    $password2 = strip_tags($_POST["PASSWORD2"]);
    $card = strip_tags($_POST["CARD"]);

    if (empty($username)) {
        $err[] = "please fill username";
    }

    if (empty($uid)) {
        $err[] = "please fill your uid";
    } elseif (!is_int($uid)) {
        $err[] = "uid must consist of integers only";
    }

    if (empty($card)) {
        $err[] = "please fill your card";
    } elseif (!is_int($card)) {
        $err[] = "card must consist of integers only";
    }elseif(strlen($card) < 8){
        $err[] = "invalid card";
    }

    if (empty($password)) {
        $err[] = "please fill password";
    } elseif (strlen($password) < 6) {
        $err[] = "password too short";
    }elseif($password !== $password2){
        $err[] = "passwords must match";
    }

    if(empty($email)){
        $err[] = "please fill email";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $err[] = "invalid email";
    }
    elseif((strlen($email) < 25) || (strlen($email) > 255)){
        $err[] = "invalid email";
    }

    if(!$obj -> Checkmail($email, rand(1000, 9999))){
        $err[] = "";
    }

    if(empty($err)){
        $prob[] = 
        ($obj -> Createuser($conn, $dbtab, $uid, $username, $email, $password, $card)) ? 
        "account created succcessfuly" : "something went wrong";
        // $prob[] = "no errors";
    }
} else {
    $err[] = "Something went wrong";
}