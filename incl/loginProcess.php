<?php   ///////PHP FUCKING ROCKS!!!!\\\\\\\
require($_SERVER['DOCUMENT_ROOT']."/bs_exposed/ses.php");
//include_once("func.php");

// include_once("serv_con.php");
//////////////////////////////////////
////// PROCESS OF MEM-INFO FORM //////
//////////////////////////////////////
if(isset($_POST['profUp'])){	
	$Uname = strip_tags($_SESSION['username']);
 
/////////////////////////////////////////	
/////////////////////////////////////////
global $dbCon;	
global $Uname;
//////////UPDATE or INSERT IF loop finds NAME ALREAY IN DB\\\\ 
 $sql = "SELECT `name` FROM `wall_members`
		 WHERE name = '$Uname'";
 $rslt = mysqli_query($dbCon,$sql) or die(mysqli_error($dbCon));
		
		///IF NO RSLT = INSERT ,ELSE, UPDATE\\\
		if(count(mysqli_num_rows($rslt)) <= '1'){

			
			 $qry = "INSERT INTO `programming_club`.`wall_members`
					(`name`,`game`,`music`,`sport`,`short_info`,`long_info`)
					VALUES('{$Uname}','{$game}','{$music}','{$sport}','{$short_info}','{$long_info}')";
			
		///IF NO RSLT = INSERT ,ELSE, UPDATE\\\
			mysqli_query($dbCon,$qry) or die("Insert error:".mysqli_error($dbCon));
				//if INSERT then redirect
				header("Location: \\bs_exposed/incl/memProf.php?".md5("insert"));	
					break;
		} else{
				$query = "UPDATE `programming_club`.`mem_wall` 
						SET `game` = '$game',
							`music` = '$music',
							`sport` = '$sport',
							`short_info` = '$short_info',
							`long_info` = '$long_info'
							 WHERE `mem_wall`.`name` = '$Uname' ";
			
			//if no INSERT then DIE
			mysqli_query($dbCon,$query) or die("Update error:".mysqli_error($dbCon));
				//if INSERT then redirect
				header("Location: \\bs_exposed/incl/memProf.php?".md5("update"));	
					
					break;
		}
			 for($i = 0; $i >=1; $i++){
				 $social_urls = array(['$i'] => $_POST['social_url']);
					////INSERT URLS INTO DB\\\\\\\
					$ins = "INSERT INTO `programming_club`.`wall_members`
					( `social_url` )
						VALUES('$social_urls'.'\n' )";
						$_SESSION['urls'] = $social_urls;
					$rslt = mysqli_query($dbCon, $ins) or die("error inserting social_types: ".mysqli_error($dbCon));
				 
				}

				
			   
			   // $social_types = array([$social_keys] => $social_urls);		
			  // $social_types .= array_fill_keys([$social_keys] => );
			  
				 
						 
				  continue;
				
				}else{
 
 	 } /// END OF if(isset(submit_prof_edit)



	
		/////////////////////////////////////////
		/////////////////////////////////////////
		/////////////////////////////////////////
?>