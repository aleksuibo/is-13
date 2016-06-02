<?php
    date_default_timezone_set('Europe/Tallinn');

    function addadvert($userdata) {
        $username = $userdata["username"];
    	$password = $userdata["password"];
        $product = $userdata["product"];
        $email = $userdata["email"];
		$phonenumber = $userdata["phonenumber"];
		$price = $userdata["price"];
		$action = $userdata["action"];
        $description = $userdata["description"];
        $file = $userdata["pilt"];
        $time = time();
        $folder = 'db/'. $time;
       
	   if ( !file_exists($folder) ){
            $old = umask(0);
            mkdir ($folder, 0777, true);
            umask($old);
        }

        $userdata = fopen($folder . '/data.json', 'w');
        $data = array(
            "id" => $time,
            "username" => $username,
        	"password" => $password,
            "product" => $product,
            "email" => $email,
			"phonenumber" => $phonenumber,
			"price" => $price,   
			"action" => $action,
            "description" => $description);


        move_uploaded_file($file, $folder . '/pilt.jpg');
        fwrite($userdata, json_encode($data));
        fclose($userdata);
    }

    function change_singleitem($userdata) {
        $id = $userdata["id"];
        $username = $userdata["username"];
        $password = $userdata["password"];
        $product = $userdata["product"];
        $email = $userdata["email"];
		$phonenumber = $userdata["phonenumber"];
		$price = $userdata["price"];
		$action = $userdata["action"];
        $description = $userdata["description"];
        $file = $userdata["pilt"];

        $folder = "./db/$id";
        $userdata = fopen($folder . '/data.json','w');
        $data = array(
            "id" => $id,
            "username" => $username,
            "password" => $password,
            "product" => $product,
            "email" => $email,
			"phonenumber" => $phonenumber,
			"price" => $price,
			"action" => $action,
            "description" => $description);

        move_uploaded_file($file, $folder . '/pilt.jpg');
        fwrite($userdata, json_encode($data));
        fclose($userdata);
    }

    function display_singleitem($id) {
        $json = file_get_contents("./db/$id/data.json");
        $userdata = json_decode($json, true);
        $userdata["id"] = strftime("%d/%m/%Y %H:%M:%S", $userdata["id"]);
        return $userdata;
    }

    function display_allitems() {
        $users = [];
        $i = 0;
        foreach (glob('./db/*', GLOB_ONLYDIR) as $folder) {
            $json = file_get_contents("$folder/data.json");
            $userdata = json_decode($json, true);
            $users[$i] = $userdata;
            $i++;
        }
        return $users;
    }

    function delete($id) {
        $folder = "./db/$id";
        if (is_dir($folder)) {
            $files = glob($folder . "/*");
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($folder);
        }
    }
?>
