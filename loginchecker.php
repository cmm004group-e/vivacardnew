<?php
// core configuration
include_once "config.php";

// include login checker
$require_login=true;
if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
}
   ?>