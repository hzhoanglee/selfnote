<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function checkauth(){
    session_start();
    if(isset($_SESSION['username'])){
        $result = true;
    } else {
        $result = false;
        Header("location:/auth");
    }
    return $result;
}
function checkAuthatLogin(){
    session_start();
    if(isset($_SESSION['username'])){
        $result = true;
        Header("location:index.php");
    } else {
        $result = false;
    }
    echo $result;
}
function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
