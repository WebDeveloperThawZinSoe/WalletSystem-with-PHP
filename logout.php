<?php
    session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
        $_SESSION["username"] = null;
        $_SESSION["password"] = null;
        header("location:index.php");
     }else{
         header("location:index.php");
     }
    
?>