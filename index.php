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
            
        </div>
        <div class="col-md-8">
            <h5>Transaction</h5>
            <div class="well">
                <form action="backend.php" method="POST">
                    <div class="form-outline mb-4">
                    <input required name="phone" type="number" id="typeEmailX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX-2">Phone</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input required name="ammount" type="number" id="typePasswordX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Amount</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input required name="pin" type="number" id="typePasswordX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Pin</label>
                    </div>

                    <input type="submit" name="send" value="Send" class="btn btn-primary">
                    <hr>
                </form>
            </div>
            <h5>Transaction History</h5>
        </div>
    </div>

</div>
<?php
    include "footer.php";
?>