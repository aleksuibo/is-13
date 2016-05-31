<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
</head>
<body>
		
		<?php
				require "api.php";
				delete($_GET["id"]);
				header("Location:http://robert.vkhk.ee/~aleks.uibo/kood/allitems.php");
		?>

</body>
</html>           
	