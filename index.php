<?php
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
        header("location: login.php");
    }
    include "head.php";
    include "navbar.php";

?>
<div class="container-fluid">
    <br>
    <?php
        include "alert.php";
    ?>
    <div class="row">
        <div class="col-md-4">
            <?php
                $name = $_SESSION["username"];
                
                $sql = "SELECT * FROM balance WHERE customer_id = '$name' ";
                $result = mysqli_query($connect,$sql);
                if($result){
                    foreach($result as $r){
                        ?>
            <h3><?php echo $r['ammount'] ?> Ks</h3>
            <?php
                    }
                }
            ?>

            <hr>




            <!-- Button trigger modal -->
            <div class="row" style="margin-left:30px;margin-right:30px">
                <button type="button" class="  btn btn-outline-success" data-mdb-toggle="modal"
                    data-mdb-target="#deposit" style="margin-bottom:20px">
                    Deposit
                </button>
                <button type="button" style="margin-bottom: 30px;" class="  btn btn-outline-danger" data-mdb-toggle="modal"
                    data-mdb-target="#withdraw" style="margin-bottom:20px">
                    Widthdraw
                </button>
            </div>

            <hr>



            <!-- Modal -->
            <div class="modal fade" id="deposit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-coins"></i> Deposit Money
                            </h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="backend.php" method="post">
                            <div class="modal-body">
                                <form>
                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form5Example1" class="form-control" />
                                        <label class="form-label" for="form5Example1">Name</label>
                                    </div>

                                    <!-- Phone input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form5Example1" class="form-control" />
                                        <label class="form-label" for="form5Example1">Phone</label>
                                    </div>

                                    <!-- Amount input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form5Example2" class="form-control" />
                                        <label class="form-label" for="form5Example2"> Amount </label>
                                    </div>


                                    <!-- Transaction input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form5Example2" class="form-control" />
                                        <label class="form-label" for="form5Example2"> Transaction ID </label>
                                    </div>

                                    <!-- Image input -->
                                    <div class="form-outline mb-4">

                                        <input type="file" class="form-control" id="customFile" />
                                    </div>






                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

               <!-- Modal -->
               <div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-coins"></i> Widthdraw Money
                            </h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="backend.php" method="post">
                            <div class="modal-body">
                                <form>
                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form5Example1" class="form-control" />
                                        <label class="form-label" for="form5Example1">Name</label>
                                    </div>

                                    <!-- Phone input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form5Example1" class="form-control" />
                                        <label class="form-label" for="form5Example1">Phone</label>
                                    </div>

                                    <!-- Amount input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form5Example2" class="form-control" />
                                        <label class="form-label" for="form5Example2"> Amount </label>
                                    </div>





                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




        </div>
        <div class="col-md-8">
            <h5> <i class="fas fa-money-bill"></i> Transaction</h5>
            <div class="well">
                <form action="backend.php" method="POST">
                    <div class="form-outline mb-4">
                        <input required name="phone" type="number" id="typeEmailX-2"
                            class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX-2">Phone</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input required name="ammount" type="number" id="typePasswordX-2"
                            class="form-control form-control-lg" />
                        <label class="form-label" for="typePasswordX-2">Amount</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input required name="pin" type="number" id="typePasswordX-2"
                            class="form-control form-control-lg" />
                        <label class="form-label" for="typePasswordX-2">Pin</label>
                    </div>

                    <input type="submit" name="send" value="Send" class="btn btn-primary">
                    <hr>
                </form>
            </div>
            <h5><i class="fas fa-sync"></i> Transaction History</h5>
            <br>
            <?php
                $account = $_SESSION["username"];
                $sql = "SELECT * FROM transaction WHERE sender_id = '$account' || reciver_id='$account' ORDER BY id DESC ";
                $result = mysqli_query($connect,$sql);
                if($result){
                    foreach($result as $r){
                        $send = $r['sender_id'];
                        $recive = $r['reciver_id'];
                        $amount = $r['ammount'];
                        $date = $r["created_at"];
                        if($send == $account){
                            ?>
            <p class="bg-danger bg-gradient"
                style="padding-top:10px;padding-bottom: 10px;text-align: center;color: white;">
                Send <b> <?php echo $amount ?> </b> To <?php echo $recive ?> at <?php echo $date ?>
            </p>
            <?php
                        }else if($recive == $account){
                            ?>
            <p class="bg-success bg-gradient"
                style="padding-top:10px;padding-bottom: 10px;text-align: center;color: white;">
                Recive <b> <?php echo $amount ?> </b> From <?php echo $recive ?> at <?php echo $date ?>
            </p>
            <?php
                        }
                 
                    }
                }
            ?>
        </div>
    </div>

</div>
<?php
    include "footer.php";
?>