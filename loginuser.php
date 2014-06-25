<html>
    <script type="text/javascript">
        (function () {
            var timeLeft = 5, cinterval;
            var timeDec = function (){
                  timeLeft--;
                  document.getElementById('countdown').innerHTML = timeLeft;
                  if(timeLeft === 0){
                        clearInterval(cinterval);
                  }
            };
            cinterval = setInterval(timeDec, 1000);
        })();
	</script>

	<body>
                Veryfying user...</br>
		<?php 
                        $user = $_POST["Username"];
			$pass = $_POST["Password"];

			$user_name = "a5394948_malaka";
			$password = "photon@11";
			$database = "a5394948_taxi";
			$server = "mysql10.000webhost.com";
             
                        $con=mysqli_connect($server,$user_name,$password,$database);
                        // Check connection
                        if (mysqli_connect_errno()) {
                             echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $result = mysqli_query($con,"SELECT * FROM users WHERE username = '$user'");
                        $passed = FALSE;
                        while($row = mysqli_fetch_array($result)) {
                             if( $pass == $row['password']){
                                   $passed = true;
                                   echo "Login Successful";
                                   header("refresh:5;url = loggedinuser.php");
                                   break; 
                             }
                        }
                        if(!$passed){
	                     echo "Username or password incorrect";
                             header("refresh:5;url = default.php");
                        }

                        mysqli_close($con);                        
			
		?>
		<br>Redirecting in <span id="countdown">5</span>.
	</body>
</html>							