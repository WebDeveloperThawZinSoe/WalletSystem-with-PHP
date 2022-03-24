<?php
    session_start();
    if(isset($_SESSION["system_username"]) && isset($_SESSION["system_password"])){
        $_SESSION["system_username"] = null;
        $_SESSION["system_password"] = null;
        header("location:index.php");
     }else{
         header("location:index.php");
     }
    
?>