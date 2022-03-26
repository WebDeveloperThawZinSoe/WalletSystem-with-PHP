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
            <div class="card-header">Deposit History List <button class="btn btn-primary"
                    onclick="doIT()">Reload</button></div>
            <div class="card-body">
                <table id="example" class="mdl-data-table" style="width: 100%;padding: 0;margin: 0;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deposit Code </th>
                            <th>Customer ID</th>
                            <th>Payment Method</th>
                            <th>Payment Ammount</th>
                            <th>Transaction id</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Date</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM deposit ORDER BY id DESC ";
                            $result = mysqli_query($connect,$sql);
                            if($result){
                                foreach($result as $key=>$val){
                                    ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $val['deposit_code'] ?></td>
                            <td><?php echo $val['customer_id'] ?></td>
                            <td><?php echo $val['payment_method'] ?></td>
                            <td><?php echo $val['payment_ammount'] ?></td>
                            <td><?php echo $val['transaction_id'] ?></td>
                            <td><img src="../uploads/<?php echo $val['image'] ?>" style="width:200px;height:200px" alt=""></td>
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
                            <td><?php echo $val['remark'] ?></td>
                            <td><?php echo $val['create_at'] ?></td>
                           
                            
                            <td>
                                <form action="" backend="" style="display:inline-block">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?>"
                                        style="display:inline-block">
                                    <input type="submit" name="delete_admin" class="btn btn-danger" value="Reject"
                                        style="display:inline-block">
                                </form>

                                <form action="" backend="" style="display:inline-block">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?>"
                                        style="display:inline-block">
                                    <input type="submit" name="delete_admin" class="btn btn-success" value="Approve"
                                        style="display:inline-block">
                                </form>

                                <form action="" backend="" style="display:inline-block">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?>"
                                        style="display:inline-block">
                                    <input type="submit" name="delete_admin" class="btn btn-info" value="Detail"
                                        style="display:inline-block">
                                </form>
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
                            <th>Deposit Code </th>
                            <th>Customer ID</th>
                            <th>Payment Method</th>
                            <th>Payment Ammount</th>
                            <th>Transaction id</th>
                            <th>Widthdraw Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Date</th>
                            <th >Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <br> <br>



    </div>
</main>
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