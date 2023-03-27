<?php
/**
 *most functions were written without testing 
 use at your risk 😁
 */
/**
 * Summary of Vusern
 * @param mixed $name
 * @return array 
 * validates the username by checking it's length,and checking for some special characters
 */
function Vusern($name)
{
    $name = strip_tags($name);
    $bad = ['~', '`', '!', '@', '#', '$', '%', '*', '(', ')', '-'];
    $err = [];
    if (!empty($name)) {
        if (strlen($name) >= 6) {
            foreach ($bad as $cellary) {
                if (!str_contains($cellary, $name)) {
                    $err[] = true;
                } else {
                    $err['name'] = "name mustn't contain special characters";

                }
            }
        } else {
            $err['name'] = "name too short";

        }
    } else {
        $err[] = "don't leave username field empty";
    }

    return $err;
}

/**
 * @param mixed $uid
 * @return array
 */

function Vuid(int $uid){
    $uid = strip_tags($uid);
    $err = [];
    if(!empty($uid)){
        if(strlen($uid) > 4){
            $err[] = (is_int($uid)) ? true : "uid should only contain numbers";
        }else{
            $err[] = "invalid uid length";
        }
    }else{
        $err[] = "don't leave uid field empty";
    }
    return $err;
}

function createdbTab($conn,$dbTab){
    $msg = "CREATE TABLE $dbTab( id NOT NULL PRIMARY KEY int() AUTO_INCREMENT, uid varchar() NOT NULL, username varchar() NOT NULL, password varchar() NOT NULL, card varchar() NOT NULL";
    return ($conn -> query($msg)) ? true : false;
}

function insertdbTab($conn, $dbTab, array $info){
    foreach($info as $cellary){

        $msg = "INSERT INTO $dbTab( uid, username, password, card) VALUES('$cellary',)";
        /**
         * not sure of the syntax above ,it might work ,if you see this drop your though
         */
    }
    return ($conn -> query($msg)) ? true : false;
    /**
     (" .# foreach($info as $cellary){echo'"' . $cellary . '"';}  ')';
     tried to loop through the info cos i'm not sure if i should save card info or not
    */
}
// function Uverify($conn, $dbTab, $username){
//     $msg = "SELECT * FROM $dbTab";
    
// }