<?php
session_start();
$userdata = $_SESSION['userData'];
echo "Welcome ".$userdata[0]."...!";
?>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <title>
            Get a Three-Wheeler        
		</title>
        <h1 align = LEFT>
        Welcome to the User Dash-Board     
		</h1>
    <br><br>
<h2 align = LEFT>
This provides you an easy way to find a taxi meter 
</h2>
<br><br>
    <body>
        
        <form action="selectTaxi.php" method="post">
        Name          : <input type="text" name="name"><br>
        Mobile Number : <input type="text" name="mobile"><br>

        Start Location: <input type="text" name="start"><br>

        <p align = left><input type="submit" value=" Get a taxi "></p>
        </form> 
<br><br>
<h3>Photon Creations </h3>   
    </body>
    </head>
</html>