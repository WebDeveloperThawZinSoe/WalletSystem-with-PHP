<?php
    $connect = mysqli_connect("localhost","root","","wallet");
    if(!$connect){
        header("Location: error.php");
    }

    session_start();

    
    /* Register */
    if(isset($_POST["register"])){
       $name = htmlspecialchars($_POST["name"]);
       $phone = htmlspecialchars($_POST["phone"]);
       $password = htmlspecialchars($_POST["password"]);
       $pin = htmlspecialchars($_POST["pin"]);

       $secure_password = crypt($password, "KBTC University"); // password , salt
       
       $sql = "INSERT INTO customer(name,phone,password,pin) VALUES ('$name','$phone','$secure_password','$pin')";
       
       $result = mysqli_query($connect, $sql);
       if($result){
           success_message("Registration success","login.php");
       }else{
           error_message("Registration Failure","register.php");
       }
    }

    /* login */
    if(isset($_POST["login_btn"])){
        $phone = htmlspecialchars($_POST["phone"]);
        $password = htmlspecialchars($_POST["password"]);
        $secure_password = crypt($password,"KBTC University");
        $sql = "SELECT * FROM customer WHERE phone = '$phone' && password = '$secure_password'";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) == 1){
            $_SESSION["username"] = $phone;
            $_SESSION["password"] = $secure_password;
             success_message("Login Success","index.php");
            

        }else{
             error_message("Incorrect Username or Password","login.php");
             
        }

    }


    /* Function */
            /* Success message */
            function success_message($data,$location){
                $_SESSION["success"] = $data;
                header("location:$location");
            }
        
            /* Error message */
            function error_message($data,$location){
                $_SESSION["error"] = $data;
                header("location:$location");
                
            }
?>