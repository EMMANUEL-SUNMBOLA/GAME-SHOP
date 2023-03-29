<?php
$err = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sign"])) {
    $prob = [];
    require("db.php");
    require("functions.php");
    $username = strip_tags($_POST["USERNAME"]);
    $uid = strip_tags($_POST["UID"]);
    $password = strip_tags($_POST["PASSWORD"]);
    /**
     * i feel we shouldn't strip the tags from the password variable
     * cos to make the password hard to crack one might add tags
     * but with/without the striptags the output would still be the same everytime LOL 😅
     * coding and wahala 
     */
    $card = strip_tags($_POST["CARD"]);

    if (empty($username)) {
        $err[] = "please fill username";
    }

    if (empty($uid)) {
        $err[] = "please fill your uid";
    } elseif (!is_int($uid)) {
        $err[] = "uid must consist of integers only";
    }

    if (empty($password)) {
        $err[] = "please fill password";
    } elseif (strlen($password) < 6) {
        $err[] = "password too short";
    }

    if(empty($err)){
      $prob[] =  insertdbTab($conn,$dbTab,$uid,$username,$email,$password,$card) ? "account created
     successfully" : "something went wrong while creating account, seek admin help";
    }
} else {
    // header("Location:../public/404.php");
    $err[] = "Something went wrong";
}