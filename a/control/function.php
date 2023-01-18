<?php
//function cua web
function data($var)
    {
        $data = trim(addslashes(htmlspecialchars($var)));
        return $data;
    } // anti sql injection
    
function get($name) {
    if (isset($_GET[$name])) {
        return data($_GET[$name]);
    } else {
        return "";
    }
}

//get data from post method
function post($name) {
    if (isset($_POST[$name])) {
        return data($_POST[$name]);
    } else {
        return "";
    }
}


function hashpass($inp) {
    return md5($inp);
}

?>