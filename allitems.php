<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <title>Kuulutused</title>
	<link rel="stylesheet" href="form.css">
</head>
<div id="sisu">
<body>
	

	<h3>Turg</h3> <br>
	<a href="/~aleks.uibo/kood/form.html">Lisa kuulutus</a> <br>
	<br>
    <?php
    require "api.php";
    $users = display_allitems();

    $i = 1;
    $html = '<table>';
    foreach ($users as $user) 
{
      $html .= '<tr>
              <td>' . $i++ . '</td>			  
              <td><img src="db/' . $user["id"] . '/image.jpg" height="40" width="40"></td>           
              <td>' . "&nbsp;-&nbsp;" . $user["product"]."&nbsp;". '</td>                         
			  <td>' ."| ". $user["action"] . "&nbsp;|&nbsp;&nbsp;&nbsp;". '</td>
              
			  <td>
                    <a href="singleitem.php?id=' .
                    $user["id"] . '"><img src="vaata.png"  style="width:20px;height:20px;"></a>
                    <a href="change.php?id=' .
                    $user["id"] . '"><img src="muuda.png"  style="width:20px;height:20px;"></a>
                    <a href="delete.php?id=' .
                    $user["id"] . '"><img src="rist.png"  style="width:17.5px;height:17.5px;"></a>
              </td>
            </tr>';
    }
    $html .= '</table>';
    print $html;
    ?>
</div>
</body>
</html>
