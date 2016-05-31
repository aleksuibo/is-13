<?php

        require "api.php";
        
		$data = array(
                "username" => $_POST['username'],
				"password" => $_POST['password'],
                "product" => $_POST['product'],
                "email" => $_POST['email'],
				"phonenumber" => $_POST['phonenumber'],
				"price" => $_POST['price'],
				"action" => $_POST['action'],
                "description" => $_POST['description'],
                "pilt" => $_FILES['img']['tmp_name']);

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

