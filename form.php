<?php

        require "api.php";

        if (isset($_GET["id"])) {
                $data["id"] = $_GET["id"];
                change_singleitem($data);
        }
        else {
                addadvert($data);
        }

		header("Location:http://robert.vkhk.ee/~aleks.uibo/kood/allitems.php");
        die();
?>

