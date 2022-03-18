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
           $sql = "INSERT INTO balance(customer_id,ammount) VALUES ('$phone','500')";
           mysqli_query($connect, $sql);
           
           success_message("Registration success","login.php");
       }else{
           error_message("Registration Failure","register.php");
       }
    }

    /* Send */
    if(isset($_POST["send"])){
       $reciver = htmlspecialchars($_POST["phone"]);
       $ammount = htmlspecialchars(abs($_POST["ammount"]));
       $pin = htmlspecialchars($_POST["pin"]);
       $sender = $_SESSION["username"];

       /* PIN */
       $sql = "SELECT * FROM customer WHERE pin='$pin' AND phone='$sender' ";
       $result = mysqli_query($connect,$sql);
       if(mysqli_num_rows($result)>0){

        /* Sender Balance Find */
         $sql = "SELECT * FROM balance WHERE customer_id='$sender'";
         $result1 = mysqli_query($connect,$sql);
         if($result1){

            /*  Resiver  */
            $sql = "SELECT * FROM customer WHERE phone='$reciver'";
            $result = mysqli_query($connect,$sql);
            if(mysqli_num_rows($result)>0){

                foreach($result1 as $r){

                
                    $remain_balance = $r['ammount'];
                    if($ammount <= $remain_balance){
                        /* Reciver */
                       $current_amount_reciver = "";
                       $sql = "SELECT * FROM balance WHERE customer_id='$reciver'";
                       $result = mysqli_query($connect,$sql);
                       if(mysqli_num_rows($result)>0){
                           foreach($result as $r){
                               $current_amount_reciver = $r['ammount'];
                           }
                       }
   
                       $new_ammount_at_reciver = (int) $current_amount_reciver + (int) $ammount;
   
                       $sql = "UPDATE balance SET ammount='$new_ammount_at_reciver' WHERE customer_id='$reciver' ";
   
                       $result = mysqli_query($connect,$sql);
   
                       /* Sender  */
                       $current_amount_sender = "";
                       $sql = "SELECT * FROM balance WHERE customer_id='$sender'";
                       $result = mysqli_query($connect,$sql);
                       if(mysqli_num_rows($result)>0){
                           foreach($result as $r){
                               $current_amount_sender = $r['ammount'];
                           }
                       }
   
                       $new_ammount_at_sender = $current_amount_sender - $ammount;
   
                       $sql2 = "UPDATE balance SET ammount='$new_ammount_at_sender' WHERE customer_id='$sender' ";
   
                       $result2 = mysqli_query($connect,$sql2);
   
                       if($result && $result2){
                           success_message("Transaction is Success","index.php");
                       }else{
                           error_message("Transaction is Fail","index.php");
                       }
                       
                    }else{
                       error_message("Not enough fund","index.php"); 
                    }
                


                }
            }else{
                error_message("Account Done Not Found","index.php"); 
            }


         }
       }else{
        error_message("PIN Code is Wrong","index.php");
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

    /* Send */
    if(isset($_POST["send"])){
        htmlspecialchars($_POST["phone"]);
        htmlspecialchars($_POST["ammount"]);
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