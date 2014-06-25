<?php
session_start();
$userdata = $_SESSION['userData'];
echo "Welcome ".$userdata[0]."...!";
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <h1 align = LEFT>
            Owner Dash-board        
		</h1>
    <br><br>
    <body>

        <h3 align = left>Today's three-wheeler records</h3>
        <form action="OwnerTodayReport.php" method="post">
            <p align = left><input type="submit" value="Get information"></p>
        </form>
        <br><br>
        <h3 align = left>Get three-wheeler current location</h3>
        <form action="currentLocation.php" method="post">
            <p align = left><input type="submit" value="Get information"></p>
        </form>
        <br><br>
        <h3 align = left>This week three-wheeler records</h3>
        <form action="weekRecords.php" method="post">
            <p align = left><input type="submit" value="Get information"></p>
        </form>
<br><br>

<h3>
			PHOTON Creations
		</h3>
    </body>
    </head>
</html>
