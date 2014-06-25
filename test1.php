<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$today = getdate();
    $date = $today['year']."-".$today['mon']."-".$today['mday'];
    $time = $today['hours'].":".$today['minutes'].":".$today['seconds'];
    
    
    $user_name = "a5394948_malaka";
    $password = "photon@11";
    $database = "a5394948_taxi";
    $server = "mysql10.000webhost.com";

    $con=mysqli_connect($server,$user_name,$password,$database);
                        // Check connection
                        if (mysqli_connect_errno()) {
                             echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

  $min=0;
  $CloseTaxi=null;
        $result1 = mysqli_query($con,"SELECT DATEDIFF(minute,'$time',location.Time) AS NumberOfMinutes From location group by date");
        while($row1 = mysqli_fetch_array($result1)) {
            
            break; 
                        }
?>
