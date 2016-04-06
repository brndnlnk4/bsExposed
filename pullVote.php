<?php
 include_once("incl/sv.php");
	
	$name = $_REQUEST['mem'];
	$updwn = $_REQUEST['updwn'];
		
		$q = "UPDATE members ";
			if($updwn == 'plus'){
		$q .= " SET mem_votes = mem_votes +1";
			 }else{
		$q .= " SET mem_votes = mem_votes -1";
			 }
		$q .= " WHERE mem_username LIKE '$name'";
	$rr = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	 if($rr){
		$r = mysqli_query($dbCon,"SELECT DISTINCT mem_votes FROM members WHERE mem_username LIKE '$name'"); 
		while($row = mysqli_fetch_assoc($r)){
			
			print($name." vote: <h2>".$row['mem_votes']."</h2>");
	
	}
		}else{
			print "FAILED TO UPDATE VOTE IN FB";
	}
?>