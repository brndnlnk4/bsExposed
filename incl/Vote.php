<?php	// $vars: voteElmId,tblName,rowName,updMem //
	include_once("sv.php");
	include_once("loginProcess.php");

	///////////////// UPDATE CURRENT
	///////////////// UPDATE CURRENT

	 $tbl_name = $_REQUEST['tblName'];
	 $row = $_REQUEST['rowName'];
	 $id = $_REQUEST['voteElmId'];
	 $vote = $_REQUEST['newVote']; //// plus or minus

	   /// QRY UPDATES VOTE COUNT 
		$qry = "UPDATE `$tbl_name` ";
			if($vote == 'plus'){
		$qry .=	" SET $row = $row+1 ";
			}elseif($vote == 'minus'){
		$qry .=	" SET $row = $row-1 ";
				}
		$qry .=	" WHERE `id` = '$id' ";
		
		 $rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
	//////////////CHECK IF Membr_vote set \\\memVote $updMem\\\\\\
	if(isset($_REQUEST['updMem'])){
	    $mem_name = $_REQUEST['updMem'];
        $qry2 = "SELECT `id`
                 FROM `members`
                 WHERE `mem_username`
				 LIKE '$mem_name' 
				 LIMIT 1";
        $mem2up = mysqli_query($dbCon, $qry2) or die(mysqli_error($dbCon));
		if(mysqli_num_rows($mem2up) >= '1'){
		 while($row = mysqli_fetch_assoc($mem2up)){
			 $mem_id = $row['id'];                
			} 
		}else{
			$mem_id = 'NULL';  
		}
		//// if self_vote then vote cheating basterd -1 points \\\
		 if($_SESSION['username'] == $mem_name){
			$vote = 'minus';
		 }
		 global $vote;				
		global $mem_name;
		global $mem_id;
	   /// QRY UPDATES VOTE COUNT 
		$query = "UPDATE `members` ";
			if($vote == 'plus'){
		$query .=	" SET `mem_votes` = `mem_votes` +1 ";
			}elseif($vote == 'minus'){
		$query .=	" SET `mem_votes` = `mem_votes` -1 ";
				}
		$query .=	" WHERE `id` LIKE '$mem_id' ";			
		
		 $rsltt = mysqli_query($dbCon, $query) or die(mysqli_error($dbCon));
			
		}         
		 
	
	///////////////////////////
	
?>