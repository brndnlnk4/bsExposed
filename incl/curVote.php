<?php
include_once("sv.php");

$rowName = $_REQUEST['rowName'];
$tblName = $_REQUEST['tblName'];
$voteElmId = $_REQUEST['voteElmId'];
         
		 $qry = "SELECT `$rowName`
                 FROM `$tblName`
                 WHERE `id` = '{$voteElmId}'";
            $rzlt = mysqli_query($dbCon, $qry) or $error = (mysqli_error($dbCon));
            ///// PULL STUPID VOTE COUNT IN DB \\\\\
             if(mysqli_num_rows($rzlt) > '0'){   
                 while($votes = mysqli_fetch_row($rzlt)){ 
					echo $votes[0];
                        break;
				}
			}elseif(!$rzlt){
				echo $error;
			}
?>