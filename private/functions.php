<?php

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
            if(is_int($uid)) {
                $err[] =  true;
            }else{
                $err[] = "uid should only contain numbers";
            }
        }else{
            $err[] = "invalid uid length";
        }
    }else{
        $err[] = "don't leave uid field empty";
    }
    return $err;
}