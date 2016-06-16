<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Muutmine</title>
	<link rel="stylesheet" href="form.css">
</head>
<body>
<div id="sisu">
<br>
<br>	

    <?php
        require "api.php";
        $id = $_GET["id"];
        $userdata = display_singleitem($id);
    ?>

    <form action="form.php?id=<?php print $id; ?>" method="post" enctype="multipart/form-data">
	
        <div>
		Kasutajanimi: <input type="text" maxlength="20" name="username" value="<?php print $userdata["username"]; ?>" required><br>    		
    	</div>
		
		<div>
		Salasõna: <input type="password" name="password" maxlength="20" value="<?php print $userdata["password"]; ?>" required><br>    		
        </div>
		
		<br>
        
		Tegevus: <input value="Ost" type="radio" name="action" <?php print ($userdata["action"] == "Ost" ? "checked" : ""); ?> required>Ost
              <input value="Müük" type="radio" name="action" <?php print ($userdata["action"] == "Müük" ? "checked" : ""); ?> required>Müük<br>
		
		<br>
		
		<div>
		Toote nimetus: <input type="text" name="product"  maxlength="20" value="<?php print $userdata["product"]; ?>" required><br>    		
        </div>
		
		<div>
		Toote hind: <input type="number" step="any"/ name="price" maxlength="20" value="<?php print $userdata["price"]; ?>" required><br>   			
		</div>
		
		<br>
		
		<textarea rows="5" cols="50" placeholder="Kirjelda toodet " maxlength="20" name="description" required><?php print $userdata["description"]; ?></textarea><br>
		
		<br>
		
		Kontakt:<br>
		
		<div>
		Telefoninumber: <input type="number" name="phonenumber" maxlength="20" value="<?php print $userdata["phonenumber"]; ?>" required><br>
		</div>
		
		<div>
		E-mail: <input type="email" name="email" maxlength="20" value="<?php print $userdata["email"]; ?>"required><br>   		
        </div>
		
		<br>
		<br>
		
        Lisa pilt:<br>
        <img src="<?php print "./db/$id/image.jpg"; ?>" height="100" width="100"><br>
        <input type="file" name="img" accept="image/*"><br>
		
		Lisatud: <?php print $userdata["id"]; ?><br>
    		
        <input type="submit" value="Salvesta">
		<button onclick="location.href='allitems.php'">
		Tühista</button>


    </form>
</div>	
</body>
</html>
