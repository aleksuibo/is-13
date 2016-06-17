<?php
define('PATH', 'db');
date_default_timezone_set('Europe/Tallinn');
	
ini_set('display_errors',1);
error_reporting(E_ALL);
	
function addadvert($userdata) {
	$username = $userdata["username"];
	$password = $userdata["password"];
	$product = $userdata["product"];
	$email = $userdata["email"];
	$phonenumber = $userdata["phonenumber"];
	$price = $userdata["price"];
	$action = $userdata["action"];
	$description = $userdata["description"];
	$file = $userdata["image"];
	$enimi = $userdata["enimi"];
	$pnimi = $userdata["pnimi"];
	$sugu = $userdata["sugu"];
	$tel = $userdata["tel"];
	$epost = $userdata["epost"];
	$markus = $userdata["markus"];
	$time = time();
	$folder = PATH . '/' . $time;
	
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
		"description" => $description,
		"enimi" => $enimi,
		"pnimi" => $pnimi,
		"sugu" => $sugu,
		"tel" => $tel,
		"epost" => $epost,
		"markus" => $markus,
		"aeg" => $time,
		"aeg2" => $time);


	move_uploaded_file($file, $folder . '/image.jpg');
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
	$file = $userdata["image"];
	$enimi = $userdata["enimi"];
	$pnimi = $userdata["pnimi"];
	$sugu = $userdata["sugu"];
	$tel = $userdata["tel"];
	$epost = $userdata["epost"];
	$markus = $userdata["markus"];
	$aeg = time();
            
	$ajur = './' . PATH . "/$id/data.json";
	$tajur = file_get_contents($ajur);
	$ticktock = json_decode($tajur, true);
	$aeg2 = $ticktock["aeg2"];
			
	$folder = PATH . '/' . $id;

	$userdata = fopen($folder . '/data.json', 'w');
	$data = array(
		"id" => $id,
		"username" => $username,
		"password" => $password,
		"product" => $product,
		"email" => $email,
		"phonenumber" => $phonenumber,
		"price" => $price,
		"action" => $action,
		"description" => $description,
		"enimi" => $enimi,
		"pnimi" => $pnimi,
		"sugu" => $sugu,
		"tel" => $tel,
		"epost" => $epost,
		"markus" => $markus,
		"aeg" => $aeg,
		"aeg2" => $aeg2);

	move_uploaded_file($file, $folder . '/image.jpg');
	fwrite($userdata, json_encode($data));
	fclose($userdata);
}
		
function display_singleitem($id) {
	$seif = './' . PATH . "/$id/data.json";
	$raha = file_get_contents($seif);
	$andmed = json_decode($raha, true);
	$andmed["aeg"] = strftime("%d/%m/%Y %H:%M", $andmed["aeg"]);
	$andmed["aeg2"] = strftime("%d/%m/%Y %H:%M", $andmed["aeg2"]);
	$andmed["img"] = sprintf('./%s/%d/%s', PATH, $id, 'image.jpg');
	return $andmed;
}
		
function display_allitems() {
	$users = [];
	$i = 0;
	foreach (glob('./' . PATH . '/*', GLOB_ONLYDIR) as $folder) {
		$json = file_get_contents("$folder/data.json");
		$userdata = json_decode($json, true);
		$users[$i] = $userdata;
		$i++;
	}
	return $users;
}
		
	function delete($id) {
        $folder = PATH . '/' . $id;
        if (is_dir($folder)) {
            $files = glob($folder . "/*");
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($folder);
        }
    }
