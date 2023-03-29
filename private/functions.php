<?php
/**
 *most functions were written without testing 
 use at your risk 😁
 */

// function Vusern($name)
// {
//     $name = strip_tags($name);
//     $bad = ['~', '`', '!', '@', '#', '$', '%', '*', '(', ')', '-'];
//     $err = [];
//     if (!empty($name)) {
//         if (strlen($name) >= 6) {
//             foreach ($bad as $cellary) {
//                 if (!str_contains($cellary, $name)) {
//                     $err[] = true;
//                 } else {
//                     $err['name'] = "name mustn't contain special characters";

//                 }
//             }
//         } else {
//             $err['name'] = "name too short";

//         }
//     } else {
//         $err[] = "don't leave username field empty";
//     }

//     return $err;
// }


// function Vuid(int $uid){
//     $uid = strip_tags($uid);
//     $err = [];
//     if(!empty($uid)){
//         if(strlen($uid) > 4){
//             $err[] = (is_int($uid)) ? true : "uid should only contain numbers";
//         }else{
//             $err[] = "invalid uid length";
//         }
//     }else{
//         $err[] = "don't leave uid field empty";
//     }
//     return $err;
// }

function createdbTab($conn,$dbTab){
    $msg = "CREATE TABLE $dbTab( id NOT NULL PRIMARY KEY int() AUTO_INCREMENT, uid varchar() NOT NULL, username varchar() NOT NULL, email varchar() NOT NULL, password varchar() NOT NULL, card varchar() NOT NULL";
    return ($conn -> query($msg)) ? true : false;
}

function insertdbTab($conn, $dbTab, $uid, $username,$email, $password, $card){

        $msg = "INSERT INTO $dbTab( uid, username, email, password, card) VALUES('$uid', '$username', '$email', '$password', '$card')";
        /**
         * not sure of the syntax above ,it might work ,if you see this drop your thoughts
         */
    
    return ($conn -> query($msg)) ? true : false;
    /**
     (" .# foreach($info as $cellary){echo'"' . $cellary . '"';}  ')';
     tried to loop through the info cos i'm not sure if i should save card info or not
    */
}

function Uverify($conn, $dbTab, $uid){
    // $msg = "SELECT * FROM $dbTab WHERE uid = '$uid'";
    $msg = "SELECT * FROM $dbTab";
    // return ($conn -> query($msg) -> fetch_assoc()) ? true : false; 
    $result = $conn -> query($msg);
    $data = $result -> fetch_assoc();
    if($result -> num_rows > 0) {
       return ($data["uid"] == $uid) ? true : false;       
    }  
}

function Pverify($conn, $dbTab, $uid, $password){
    $msg = "SELECT * FROM $dbTab WHERE uid = '$uid'";
    $result = $conn -> query($msg) ;
    $data = $result -> fetch_assoc();
    if($result -> num_rows > 0){
        return (password_verify($password,$data["password"])) ? true : false;
    }
}