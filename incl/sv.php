 <?php
	 define("s_v_r", "localhost", true);
	 define("u_s_r", "root", true);
 	 global $dbCon;
    $dbCon = mysqli_connect(s_v_r,u_s_r,'') AND 
	mysqli_select_db($dbCon ,"bs_exposed") or die("Not able to connect to DB");
?>