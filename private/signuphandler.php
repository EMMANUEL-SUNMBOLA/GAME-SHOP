<?php
$err = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sign"])) {
    $prob = [];
    require("db.php");
    require("functions.php");
    $username = strip_tags($_POST["USERNAME"]);
    $email = strip_tags($_POST["EMAIL"]);
    $uid = strip_tags($_POST["UID"]);
    $password = strip_tags($_POST["PASSWORD"]);
    $password2 = strip_tags($_POST["PASSWORD2"]);
    $card = strip_tags($_POST["CARD"]);
    /**
     * i feel we shouldn't strip the tags from the password variable
     * cos to make the password hard to crack one might add tags
     * but with/without the striptags the output would still be the same everytime LOL 😅
     * coding and wahala 
     */

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

    if(empty($err)){
    //   $prob[] =  insertdbTab($conn,$dbTab,$uid,$username,$email,$password,$card) ? "account 
    //   created
    //  successfully" : "something went wrong while creating account, seek admin help";
    $prob[] = "no errors";
    }
} else {
    // header("Location:../public/404.php");
    $err[] = "Something went wrong";
}