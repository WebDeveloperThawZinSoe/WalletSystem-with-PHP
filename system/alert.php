<?php

    if(isset($_SESSION["success"])){
        ?>
            <p class="alert alert-success" style="border-radius:0px">
                <?php
                    echo $_SESSION["success"];
                    $_SESSION["success"] = null;
                ?>
            </p>
        <?php
    }

    if(isset($_SESSION["error"])){
        ?>
            <p class="alert alert-danger" style="border-radius:0px">
                <?php
                    echo $_SESSION["error"];
                    $_SESSION["error"] = null;
                ?>
            </p>
        <?php
    }
?>