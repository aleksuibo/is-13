<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
	<title>Üksikvaade</title>
	<link rel="stylesheet" href="form.css">
</head>
<body>
<br>
<br>
<div id="sisu">
        <?php
                require "api.php";
                $id = $_GET["id"];
                $userdata = display_singleitem($id);

                
                print "Kasutajanimi : ". $userdata["username"]. "<br>";
                print "Salasõna : ". $userdata["password"]. "<br>";            
				print "Tegevus : ". $userdata["action"]. "<br>";
                print "Toote nimetus : ". $userdata["product"]. "<br>";
				print "Toote hind : ". $userdata["price"]. "&nbsp;€" . "<br>";
				print "Toote kirjeldus : ". $userdata["description"]. "<br>";
				print "Telefoninumber : ". $userdata["phonenumber"]. "<br>";
				print "E-mail : ". $userdata["email"]. "<br>";								           
                print "Lisatud : ". $userdata["id"];
				echo "<br>";
				print '<img src="' . "./db/$id/pilt.jpg" . '" height="100" width="100">'. "<br>";
        ?>
		
		<br>	
<a href="allitems.php">Tagasi</a> <br>
</body>
</div>
</html>
