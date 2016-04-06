<?php
include("sv.php");

 
if(isset($_REQUEST['president'])){
	$qry = "UPDATE `poll`
			SET `vote` = `vote` + 1
			WHERE `candidate` LIKE '{$_REQUEST['president']}'";
	mysqli_query($dbCon,$qry) or print(strtoupper(mysqli_error($dbCon)));
 
///////////////show votes//////////////////
$pull = "SELECT *
		 FROM `poll`
		 ORDER BY `vote` DESC";
	$r = mysqli_query($dbCon,$pull) or print(mysqli_error($dbCon));
	while($row = mysqli_fetch_array($r)){
		echo $row[0]."=".$row[1]."#";
	}
}elseif(isset($_REQUEST['txt']) && !empty($_REQUEST['txt'])){	
	$_REQUEST['txt'] = mysqli_real_escape_string($dbCon,$_REQUEST['txt']);
	if(empty($_REQUEST['name'])){
		$name = "Viewer <b>voted ".$_REQUEST['pres']."</b>";
	}else{
		$_REQUEST['name'] = mysqli_real_escape_string($dbCon,$_REQUEST['name']);
		$name = $_REQUEST['name']." <b>voted ".$_REQUEST['pres']."</b>";
	}
$pst = "INSERT INTO `member_messages` (
					`member_messages`,
					`message_receiver`,
					`message_sender`,
					`message_date`)
		VALUES ('{$_REQUEST['txt']}',
				'Brandon Osuji',
				'$name',
				NOW())";
	mysqli_query($dbCon,$pst) or print(mysqli_error($dbCon));
}else{		
///////////////show votes//////////////////
$pull = "SELECT `vote`
		 FROM `poll`";
	$r = mysqli_query($dbCon,$pull) or print(mysqli_error($dbCon));
	 
	while($row = mysqli_fetch_array($r)){
		 $sum[] = $row[0];
	}
		echo array_sum($sum);
}
//////////////////////////////////////////
?>