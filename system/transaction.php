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
            <div class="card-header">Transaction History List</div>
            <div class="card-body">
                <table id="example" class="mdl-data-table" style="width: 100%;padding: 0;margin: 0;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sender ID</th>
                            <th>Reciver ID</th>
                            <th>Ammount</th>
                            <th>Remark</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM transaction ORDER BY id DESC ";
                            $result = mysqli_query($connect,$sql);
                            if($result){
                                foreach($result as $key=>$val){
                                    ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $val['sender_id'] ?></td>
                            <td><?php echo $val['reciver_id'] ?></td>
                            <td><?php echo $val['ammount'] ?></td>
                            <td><?php echo $val['description'] ?></td>
                            <td><?php echo $val['created_at'] ?></td>
                           
                        </tr>
                        <?php
                                }
                            }
                       ?>

                    </tbody>
                    <tfoot>
                        <tr>
                             <th>No</th>
                            <th>Sender ID</th>
                            <th>Reciver ID</th>
                            <th>Ammount</th>
                            <th>Remark</th>
                            <th>Date</th>
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