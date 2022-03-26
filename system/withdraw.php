<?php
  include "head.php";
?>
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <?php
      include_once "slidebar.php";
    ?>
    <!-- Sidebar -->

    <!-- Navbar -->
    <?php
      include_once "nav.php";
    ?>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
        <?php
        include_once "alert.php";
      ?>


        <div class="card">
            <div class="card-header">Widthdraw History List <button class="btn btn-primary"
                    onclick="doIT()">Reload</button></div>
            <div class="card-body">
                <table id="example" class="mdl-data-table" style="width: 100%;padding: 0;margin: 0;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer ID</th>
                            <th>Widthdraw Phone</th>
                            <th>Widthdraw Name</th>
                            <th>Payment Ammount</th>

                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM widthdraw ORDER BY id DESC ";
                            $result = mysqli_query($connect,$sql);
                            if($result){
                                foreach($result as $key=>$val){
                                    ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $val['customer_id'] ?></td>
                            <td><?php echo $val['widthdraw_phone'] ?></td>
                            <td><?php echo $val['widthdraw_name'] ?></td>
                            <td><?php echo $val['payment_ammount'] ?></td>

                            <td><?php 
                            $status = $val['status'];
                            if($status == 0){
                                echo " <span class='btn btn-warning'> Pending </span>";
                            }else if($status == 1){
                                echo "Approve";
                            }else if($status == 2){
                                echo "Reject";
                            }
                             ?></td>
                            <td><?php echo $val['create_at'] ?></td>
                            <td>
                                <button type="button" class="  btn btn-danger" data-mdb-toggle="modal"
                                    data-mdb-target="#reject" style="margin-bottom:20px">
                                    Reject
                                </button>

                                <button type="button" class="  btn btn-success" data-mdb-toggle="modal"
                                    data-mdb-target="#success" style="margin-bottom:20px"
                                    data-userid="<?php echo $val['id']; ?>">
                                    Approve
                                </button>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                       ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Customer ID</th>
                            <th>Widthdraw Phone</th>
                            <th>Widthdraw Name</th>
                            <th>Payment Ammount</th>

                            <th>Status</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <br> <br>



    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-coins"></i> Deposit Money
                </h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
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

                        <select style="width:100%;height: 35px;margin-bottom: 30px;" name="" id=""
                            style="margin-bottom: 20px;">
                            <option selected disabled>
                                --- Select Payment Method ---
                            </option>
                            <option value="wave">Wave Money</option>
                            <option value="kbz">KBZ Pay</option>
                        </select>


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
<div class="modal fade" id="success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-coins"></i> Widthdraw Money Approve
                </h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="backend.php" method="post">
                <div class="modal-body">
                    <form>

                    <input type="hidden" name="user_id" value="">


                        <!-- Image input -->
                        <div class="form-outline mb-4">

                            <input type="file" class="form-control" id="customFile" />
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="withdrawbtn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        autoWidth: false,
        columnDefs: [{
            targets: ['_all'],
            className: 'mdc-data-table__cell'
        }]
    });


});
</script>
<?php
  include "footer.php";
?>