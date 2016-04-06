 <?php include_once("sv.php");	
///UPDATE DB SECTION VIA PHP///UPDATE DB SECTION VIA PHP
///UPDATE DB SECTION VIA PHP///UPDATE DB SECTION VIA PHP
if((((isset($_REQUEST['tName']) && !empty($_REQUEST['tName'])) && 
	isset($_REQUEST['id']) && !empty($_REQUEST['id'])) &&
	isset($_REQUEST['vote']) && !empty($_REQUEST['vote'])) &&
	isset($_REQUEST['row']) && !empty($_REQUEST['row'])){
   $dbCon = mysqli_connect('localhost','root','') AND 
	mysqli_select_db($dbCon ,"bs_exposed") or die("Not able to connect to DB ".mysqli_error($dbCon));

	$tbl_name = $_REQUEST['tName'];
	 $row = $_REQUEST['row'];
	 $id = $_REQUEST['id'];
	 $vote = $_REQUEST['vote']; //// plus or minus

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
	if(!empty($_REQUEST['memVote'])){
	    $mem_name = $_REQUEST['memVote'];
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
			?>
			<script>
				alert("Chk vote process, couldnt find member");
			</script>
			<?php                    

				}
		global $vote;				
		global $mem_name;
		global $mem_id;
		 if($_SESSION['username'] == $mem_name){
					?>
					<script>
						alert("Don't Cheat!");
						window.open("","_self");
					</script>
					<?php	
			break;
		 }else{
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
		}
		  
		  
		  if(($rslt) || $rsltt){
			  ?>
				<script>
				 window.close();
				</script>
			  <?php
		  } else{ 
			  echo "CONTACT ADMINISTRATOR BRO";
		  }
}
 
?>
