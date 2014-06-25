<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width">
        <title align = CENTER>
            Vehicle Tracker        
		</title>
	</head>
	

<br> <br>
<form action="ownerDashboard.php" method="post">
            <p align = left><input type="submit" value=" Go back to Owner Dash-board "></p>
        </form>
<br><br>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$userdata = $_SESSION['userData'];

$user = $userdata[0];
    $pass = $userdata[1];

//echo "User".$user;
//echo "Password".$pass;
$today = getdate();
//$date = $today['year']."-".$today['mon']."-".$today['mday'];

$currentDate = $today['mday'];

$currentMonth = $today['mon'];
$week[]=null;

if($currentDate >=7){  
    //$week[0]=$today['year']."-".$today['mon']."-".$today['mday'];
    for($i=0;$i<7;$i++){
        $week[$i]=$today['year']."-".$today['mon']."-".$currentDate--;
    }
}
elseif ($currentMonth==3) {
if($today['year']%4==0){
    for($i=0;$i<7;$i++){
        if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth=2;
         $currentDate=29;
        }
    }
}
else{
    for($i=0;$i<7;$i++){
        if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth=2;
         $currentDate=28;
        }
    }
}
}
elseif ($currentMonth==1) {
    $currentYear = $today['year'];
    if($currentDate>0){
        $week[$i]=$currentYear."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentYear--;
         $currentMonth=12;
         $currentDate=31;
        }
}
elseif ($currentMonth<=8) {
if($currentMonth%2==0){
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=31;
        }
}
else{
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=30;
        }
}
}
 else {//month >7
    if($currentMonth%2==0){
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=30;
        }
}
else{
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=31;
        }
}
}
//print_r($week);
echo "<br />\n";echo "<br />\n";

    $user = "Malaka";
    $pass="Lahiru";

    $user_name = "a5394948_malaka";
    $password = "photon@11";
    $database = "a5394948_taxi";
    $server = "mysql10.000webhost.com";

    $con=mysqli_connect($server,$user_name,$password,$database);
                        // Check connection
                        if (mysqli_connect_errno()) {
                             echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

  
        $result1 = mysqli_query($con,"SELECT VehicleNumber FROM owners WHERE owners.username = '$user' and owners.password = '$pass'");
         while($row1 = mysqli_fetch_array($result1)) {
            $ownerVN=$row1['VehicleNumber'];
            break; 
                        }
                        for($j=0;$j<7;$j++){
                            
                            $result = mysqli_query($con, "SELECT * FROM hires WHERE hires.VehicleNumber = '$ownerVN' and hires.Date='$week[$j]'");
        
        echo "<br />\n";echo "<br />\n";
        echo "Owner          : ".$user;
        echo "<br />\n";
        echo "Date           : ".$week[$j];
        echo "<br />\n";
        echo "Vehicle Number : ".$ownerVN;
        echo "<br />\n";echo "<br />\n";echo "<br />\n";
        
        echo "<table border='1'>
            <tr>
           
            <th>Fare </th>
            <th>Start Point</th>
            <th>End Point</th>
            </tr>";
     $total =0;   
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  $total+=$row['Fee'];
  echo "<td>" . $row['Fee'] . "</td>";
  echo "<td>" . $row['StartPoint'] . "</td>";
  echo "<td>".$row['EndPoint']. "</td>";
  echo "</tr>";
}

echo "</table>";

echo "<br />\n";echo "<br />\n";echo "<br />\n";
echo "Total revenue for ".$week[$j]." : Rs. ".$total.".00";
echo "<br />\n";echo "<br />\n";echo "<br />\n";

                        }
                        mysqli_close($con);
                        
?>
</html>