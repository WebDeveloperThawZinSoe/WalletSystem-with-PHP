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
        <div class="card text-center">
            <div class="card-header">Admin Account Create Form <button class="btn btn-primary" onclick="doIT()">Reload</button> </div>
            <div class="card-body">
                <div class="">
                    <!--- Admin Account Create -->
                    <form action="backend.php" method="post">
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input name='name' type="text" required id="form7Example1" class="form-control" />
                            <label class="form-label" for="form7Example1">Name</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input name="phone" type="number" required id="form7Example2" class="form-control" />
                            <label class="form-label" for="form7Example2">Phone Number</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input name="password" type="text" required id="form7Example2" class="form-control" />
                            <label class="form-label" for="form7Example2">Password</label>
                        </div>
                        <input type="submit" name="register" class="btn btn-primary" value="Create Account">
                    </form>
                </div>
            </div>

        </div>

        <br>

        <div class="card">
            <div class="card-header">Admin Account List <button class="btn btn-primary" onclick="doIT()">Reload</button></div>
            <div class="card-body">
                <table id="example" class="mdl-data-table" style="width: 100%;padding: 0;margin: 0;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM admin ORDER BY id DESC ";
                            $result = mysqli_query($connect,$sql);
                            if($result){
                                foreach($result as $key=>$val){
                                    ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $val['name'] ?></td>
                            <td><?php echo $val['phone'] ?></td>

                            <td><?php echo $val['create_date'] ?></td>
                            <td>
                                <form action="" backend="">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?>">
                                    <input type="submit" name="delete_admin" class="btn btn-danger" value="Delete">
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
                            <th>Name</th>
                            <th>Phone</th>

                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <br> <br>

        <div class="card">
            <div class="card-header">Customer Account List <button class="btn btn-primary" onclick="doIT()">Reload</button></div>
            <div class="card-body">
                <table id="example2" class="mdl-data-table" style="width: 100%;padding: 0;margin: 0;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM customer WHERE status < 2 ORDER BY id DESC  ";
                            $result = mysqli_query($connect,$sql);
                            if($result){
                                foreach($result as $key=>$val){
                                    ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $val['name'] ?></td>
                            <td><?php echo $val['phone'] ?></td>

                            <td><?php echo $val['create_at'] ?></td>
                            <td>
                                <form action="" backend="" style="display:inline-block">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?>"
                                        style="display:inline-block">
                                    <input type="submit" name="delete_admin" class="btn btn-danger" value="Delete"
                                        style="display:inline-block">
                                </form>
                                <?php
                                    $lock = "";
                                    $status = $val['status'];
                                    if($status == 0){
                                        ?>
                                <form action="" backend="" style="display:inline-block">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?> "
                                        style="display:inline-block">
                                    <input type="submit" name="lock_admin" class="btn btn-warning" value="Lock"
                                        style="display:inline-block">
                                </form>
                                <?php
                                    }else if($status == 1){
                                        ?>
                                <form action="" backend="" style="display:inline-block">
                                    <input type="hidden" name="id" value="<?php echo $val['id'] ?> "
                                        style="display:inline-block">
                                    <input type="submit" name="lock_admin" class="btn btn-info" value="UnLock"
                                        style="display:inline-block">
                                </form>
                                <?php
                                    }
                                ?>

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
                            <th>Name</th>
                            <th>Phone</th>

                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

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

$(document).ready(function() {
    $('#example2').DataTable({
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