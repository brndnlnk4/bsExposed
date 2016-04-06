<?php		
 include_once("incl/sv.php");
 

if(isset($_REQUEST['name'])){
 
 
	$q = "SELECT members.mem_username,
				 members.mem_avatar		 
		  FROM members
		  WHERE members.mem_username LIKE '{$_REQUEST['name']}'";
		$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
		while($row = mysqli_fetch_assoc($r)){
			print($row['mem_username'].'<br> '.'<img src="upl/'.$row['mem_avatar'].'" width="250px" /><br>');
				break;
 		 
		}	 if($_REQUEST['name'] == strtolower($row['mem_username'])){
				$found = true;
			}else{
				$found = false;
			} 
			if($found == false){
				echo "Success, jQuery is wayyyy easier..<br>, who is {$_REQUEST['name']}?";
			}
	}else{

	
 	$q = "SELECT mem_username
		  FROM members";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));

		while($row = mysqli_fetch_assoc($r)){
			print($row['mem_username'].',');
		}

	}
?>