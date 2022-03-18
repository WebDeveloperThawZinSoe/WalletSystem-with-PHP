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
</div>
<?php
    include "footer.php";
?>