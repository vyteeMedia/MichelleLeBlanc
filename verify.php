<?php
include("getVarPOST.php");

if($user=="admin" && $pass=="1234"){
    session_start();
    $_SESSION['id']="1";
    $_SESSION['name']="Rosa Zegarra";
    header("location: dashboard.php");
}else{
    header("location: login.php?q=error");
}

?>