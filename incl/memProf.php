<!DOCTYPE html> 
<HTML lang='en-US'>
<HEAD>

<?php require("ses.php"); ?>
<?php require("incl/fn.php"); ?>

<?php	///// CHECK FOR PM SENT OUT\\\
	if(isset($_POST['msg_out']) && !empty($_POST['msg_out'])){
			if(!empty($_POST['msg_out']) && (strlen($_POST['msg_out']) >= '1') && strlen($_POST['msg_out']) <= '500'){
			 $Msg = mysqli_real_escape_string($dbCon,$_POST['msg_out']);  
			 $Msg = addcslashes($Msg, '%_');
			  $d8 = date('Y-m-j');
		$msg_qry = "INSERT INTO `member_messages`(
								`member_messages`,
								`message_receiver`,
								`message_sender`,
								`message_date`,
								`message_read`)
						VALUES ('$Msg',
								'{$_POST['receiver']}',
								'{$_SESSION['username']}',
								'$d8',
								'no')"; 
				$rslt = mysqli_query($dbCon, $msg_qry) or die(mysqli_error($dbCon));
			if($rslt){
			 $snt = 'yes';		
			}else{
				$snt = NULL;
			}
		}		
	}
	global $snt;
?>
	
<?php ///if usr views msgs_ then update msg-read field to 'yes' 
	if(isset($_GET['YoMsg']) && $_GET['YoMsg'] == md5('read')){
	 $me = $_SESSION['username'];
	  $q = "UPDATE `member_messages` 
			SET `message_read` = 'yes'
			WHERE `message_read` LIKE 'no'
			AND 
			`message_receiver` = '$me'";
		 mysqli_query($dbCon, $q) or die(mysqli_error($dbCon));
  	}
?>
 
<?php  /// chck if usr deletes msg
	if(isset($_GET['dm']) && !empty($_GET['dm'])){
	  $iD = $_GET['dm'];
		$del = "DELETE 
				FROM `member_messages`
				WHERE `id` = '$iD'";
			$rslt = mysqli_query($dbCon,$del);
		 if($rslt){
			 $delChk = 'yes';
		 }else{
			 $delChk = NULL;
		 }
	}
	global $delChk;
?>

<?//-SEO-SHIT\\\//-SEO-SHIT\\\//-SEO-SHIT\\\?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-type" content="text/html" />
<meta http-equiv="content-type" content="cache" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="BrandonOsuji" />	
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="keywords" content="" />
<meta name="description" content="" /> 

<?///END OF META-SEO\\\///END OF META-SEO\\\?>
		<?php 
		 DEFINE('HOME_PG',"\bs_exposed/") ;
		 DEFINE('MUSIC_PG',"\bs_exposed/members") ;
		 DEFINE('VIDEOS_PG', "\bs_exposed/videos") ;
		 DEFINE('DT', "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta porttitor magna. Nunc urna. Vestibulum augue. Maecenas ipsum elit, rutrum id, iaculis ac, dictum ac, eros. Phasellus elit. Vestibulum semper cursus risus. Nunc consectetuer malesuada pede. Etiam ante.");
		 ?>		

<TITLE> 
Title
</TITLE>

<!--- CSS CSS CSS BITTTCHH!!!!!! ---->
<link rel='icon' href='css/img/icon.ico' />
<link rel='stylesheet' type='text/css' href='css/nav_style.css' />
<link rel='stylesheet' type='text/css' href='css/main_style.css' />
<link rel='stylesheet' type='text/css' href='css/custom.css' />
<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
<link rel='stylesheet' type='text/css' href='css/memProf_style.css' />
</HEAD>

<?//████████████████████████████████████████████████████████████████████████
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░			
////////////////////////███████///██////██///████████///////////////////////	
////////////////////////██///██///██////██///██////██///////////////////////			
////////////////////////███████///████████///████████///////////////////////			
////////////////////////██ ///////██////██///██/////////////////////////////			
////////////////////////██////////██////██///██/////////////////////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████████████████████████████?>

<!--- END OF CSS & j_s_ BITTTCHH!!!!!! ---->
<!--- END OF CSS & j_s_ BITTTCHH!!!!!! ---->

<?////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
<?////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
<BODY bgcolor='' onLoad='flashDisplay()' onResize="flashDisplay();"> 
 <div class='center-block socialSec' style='position:absolute;top:0;'>
  <?/// SOCIAL ICONS \\\?>
		<ul>
		 <li><a href='#' type='button'><img src='css/pix/tumblr.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/twitter.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/youtube.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/facebook.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/google.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		</ul>
 </div>
<?/// LOGIN SECTION TOP \\\?>
<?php require_once("incl/login.php"); ?>

<?/// HEADER 'contains nav data' \\\?>
<?php require_once("hdr.php"); ?>

<?/// content begin \\\?>
	<div class='mainWrapper' id='trgt4'>

<?/// empty \\\?>				
		<section class='empty-0' id='topp'>
		 <div class='content'>
		  <div class='container'>
		   <div class='row'>
			<div class='col-xl-12'>
			 &nbsp;
			 <br>
			</div>
		   </div>
		  </div>
		 </div>
		</section>
		
<?/// topSec \\\?>			
<div class='topSec' id='topSec-prof'>

<?// pic upload section \\?>
<section class='' id='toppp'>
 <div class='content'>
  <div class='container-fluid'>
   <div class='row'>
	<div class='col-lg-2'>&nbsp;</div>
	 <div class='col-lg-8' id='picSection'>
	  <p align='center' class='img-responsive img-rounded' id='dfault_pic'>
	   
	   <?// default pic-preview \\?>
	   <?php  ///get stupid pics 
	    $usrnm =  $_SESSION['username'];
	   $chkPik = "SELECT `mem_avatar` 
				  FROM `members` 
				  WHERE `mem_username` 
				  LIKE '{$_SESSION['username']}'";
			if(mysqli_num_rows(mysqli_query($dbCon, $chkPik)) > '0'){
			  $pik = mysqli_query($dbCon, $chkPik);
				while($piks = mysqli_fetch_array($pik)){
					$pikture = "upl/".$piks['mem_avatar'];
				}
			}else{
			$pikture[] = returnColsFromTable('photos','member',$usrnm,'photos');
				if(!empty($pikture)){
					$pikture = "upl/".$pikture['0'];
				}else{
					$pikture = "css/pix/Brandon.jpg";
				}
			}
	   ?>
	   <img src='<?=$pikture?>' width='130px' alt='Pics' /> 
		
		</p>
<?php

//////PICTURE UPLOAD PROCESS//////
//////PICTURE UPLOAD PROCESS//////
if(isset($_FILES['uploadedfile'])){
	$qry = "SELECT `photos` 
			FROM `photos` 
			WHERE `member` = '{$_SESSION['username']}'";
	$found = mysqli_query($dbCon, $qry);
	/////CHECK IF < 5 PICS IN DB \\\\\\
	while(mysqli_fetch_array($found)){
		$tooManyPics = false;
	  if(mysqli_num_rows($found) < '5'){
		$tooManyPics = NULL;  
	 }else{
		$tooManyPics = true;	
		break;
		}
		global $tooManyPics;
	}	
	$file = $_FILES['uploadedfile'];
	$user = $_SESSION['username'];	
		///file properties					
		$file_name = $file['name'];			
		$file_tmp = $file['tmp_name'];		
		$file_size = $file['size'];			
		  global $file_name;				
			///file extension & checks		
			$file_ext = explode('.', $file_name);
													
			$file_ext = strtolower(end($file_ext));	
														
			$allowed_ext =  array( 'jpg', 'png', 'bmp', 'gif');
																	
		  if(in_array($file_ext, $allowed_ext)){ 					
			if($file_size <= 1000000){								
			   $file_error = NULL;									
																	
			   $file_name_new = uniqid('', true) . '.' . $file_ext;
																	
			   $file_destination = "upl/".$file_name_new;
//CREATE LOG CONTAINING FILE_NAME +  DATE UPLOADED...	
//CREATE LOG CONTAINING FILE_NAME +  DATE UPLOADED...	
 $dir = "upl/picLog/";										
 $data = "{$_SESSION['username']}.txt";						
 $fh = fopen($dir.$data, 'a+') or die("Couldnt get to uploads folder");
 $strng = "{$file_name_new}\t + \t" .date('m-j-Y')."\n";							
 fwrite($fh, $strng);	
	fclose($fh);										
/////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
////// MAKE ELESIF !MOVE_UPL_FILE(FLE,DIR) <SCRPT> MODAL POPUP W/ LOADING GFX												
////// MAKE ELESIF !MOVE_UPL_FILE(FLE,DIR) <SCRPT> MODAL POPUP W/ LOADING GFX												
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

if($tooManyPics == false){
 if(move_uploaded_file($file_tmp, $file_destination)){				
  $remove_galUploadsDiv = true;									
  // displays uploaded picture to the right of avatar \\				
   echo "<b class='center-block lead'>Successfully Uploaded!</b><br>	
	<img src = 'upl/".	
						
	 $file_name_new		
						
	."' width='210px' id='uplTmpPic'></img>";				
															
////////////// INSERT PHOTO INFO INTO DB \\\\\\\\\\		
////////////// INSERT PHOTO INFO INTO DB \\\\\\\\\\	
    $_POST['user'] = trim(strip_tags($_POST['user']));
	 $query = "INSERT INTO `photos` 
		(`member`,
		`photos`,
		`captions`)																			
		VALUES('{$_POST['user']}',
				'{$file_name_new} \n',
				'{$_POST['caption']}') ";				
																				
		mysqli_query($dbCon, $query) or die("Failed to insert pic name into db".mysqli_error($dbCon));
/////////////////////////////////////////////////////////
		} // END OF IF_MOVE_UPL_FILE			
		else{
		$remove_galUploadsDiv = NULL;
		$file_error = "File not moved to uploads folder, contact admin for help";
		}
 }else{
	echo "<center class='well text-center lead'>You Can Only Upload 5 Pics</center>";
	}		
/////////////////////////////////////////////////	
	} // END OF IF_FILE_<_1MB 					
	else{										
		$file_error = "File size is too large, max size is 1mb";
		$file_error .= "<br><center class='well well-sm center-block'><a href='memProf.php' target='_self'>Go Back</a></center>";
	}											
} // END OF FILE_EXT IN ARRAY CHECK 			
else{											
		$file_error = "Wrong picture format, Can only use PNG, JPG, GIF, OR BMP";	
	}											
		// display file error if error occurs \\
		 if(isset($file_error) && !is_null($file_error)){
			echo '<center><h1>';
			  echo $file_error;    
			 echo '</h1></center>';
				exit();
	} 
}
//////END: IF(ISSET($_FILES[uploadedfile]//////
?>
<!--*****************************************************************-->
<!--*****************************************************************-->
<!--*****************************************************************-->
<!--*****************************************************************-->
<!--*****************************************************************-->
<!--*****************************************************************-->
<?php  /// IF SET 'PROF_UP' START UPDATING AND INSERTING INTO DB \\\\\\\\
 if(isset($_REQUEST['prof_up'])){
	 
/////check if username already in db\\\\\\\\\	 
$chk="SELECT `members`.`mem_username`
	 FROM `members` 
	 WHERE `mem_username` = '{$_SESSION['username']}'";
	$chkResult = mysqli_query($dbCon, $chk) or mysqli_error($dbCon);
	//$cnt = mysqli_num_rows($result);
	////////////////////////////////////////// 
	if(count(mysqli_num_rows($chkResult)) < '1'){
	////// if there is no rows in db matching this user
	   if(!empty(($_POST['social_google']) 
					 && strlen($_POST['social_google']) > '0') 
			 && !empty(($_POST['social_facebook']) 
					 && strlen($_POST['social_facebook']) > '0') 
			 && !empty(($_POST['social_tumblr']) 
					 && strlen($_POST['social_tumblr']) > '0') 
			 && !empty(($_POST['social_twitter']) 
					 && strlen($_POST['social_twitter']) > '0') 
			 && !empty(($_POST['social_reddit']) 
					 && strlen($_POST['social_reddit']) > '0') 
			 && !empty(($_POST['social_youtube']) 
					 && strlen($_POST['social_youtube']) > '0') 
			 && !empty(($_POST['social_linkedin']) 
					&& strlen($_POST['social_linkedin']) > '1')){
			 $_POST['social_google'] = mysqli_real_escape_string($dbCon,$_POST['social_google']);  
			 $_POST['social_facebook'] = mysqli_real_escape_string($dbCon,$_POST['social_facebook']);  
			 $_POST['social_tumblr'] = mysqli_real_escape_string($dbCon,$_POST['social_tumblr']);  
			 $_POST['social_twitter'] = mysqli_real_escape_string($dbCon,$_POST['social_twitter']);  
			 $_POST['social_reddit'] = mysqli_real_escape_string($dbCon,$_POST['social_reddit']);  
			 $_POST['social_youtube'] = mysqli_real_escape_string($dbCon,$_POST['social_youtube']);  
			 $_POST['social_linkedin'] = mysqli_real_escape_string($dbCon,$_POST['social_linkedin']);  
					$soc = "INSERT `members`					
							   (`mem_google`,
								`mem_facebook`,
								`mem_tumblr`,
								`mem_twitter`,
								`mem_reddit`,
								`mem_youtube`,
								`mem_linkedin`)
						VALUES ('{$_POST['social_google']}',
							    '{$_POST['social_facebook']}',
							    '{$_POST['social_tumblr']}',
							    '{$_POST['social_twitter']}',
							    '{$_POST['social_reddit']}',
							    '{$_POST['social_youtube']}',
							    '{$_POST['social_linkedin']}')";
				mysqli_query($dbCon,$soc) or die("failed insert 4 social ".mysqli_error($dbCon));
			$resultConfirmation = "Successfully updated profile information.";
			 }////////////////////////////////////////////////////
	
    if(isset($_POST['mem_game']) 
	|| isset($_POST['mem_music'])
	|| isset($_POST['private_prof']) 
	|| isset($_POST['mem_sport']) 
	|| isset($_POST['mem_phone']) 
	|| isset($_POST['mem_email']) 
	|| isset($_POST['long_info']) 
	|| isset($_POST['short_info'])){
		 $_POST['mem_game'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['mem_game']));  
		 $_POST['mem_music'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['mem_music']));
		 $_POST['mem_sport'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['mem_sport'])); 
		 $_POST['short_info'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['short_info']));
		 $_POST['long_info'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['long_info']));
			///chk email \\
			$em = explode('.', $_POST['mem_email']);
			$email_ext = strtolower($em[count($em) - 1]);	//goe bak 1 key->val frm xploded array
			$exts = array('com','org','net','eu','kr','jp','de');
			 if(in_array($email_ext, $exts)){
		 $_POST['mem_email'] = trim(strip_tags($_POST['mem_email'], '@'));
			 }else{
		 $_POST['mem_email'] = "";
			 } 	
		   $usrname = _USER_;
			$qry = "INSERT INTO `members`(
					 mem_about,
					 mem_private,
					 mem_description,
					 mem_phone,
					 mem_fav_game,
					 mem_fav_sport,
					 mem_fav_music,
					 mem_email,
					 mem_username)
					VALUES ('{$_POST['long_info']}',
							'{$_POST['private_prof']}',
							'{$_POST['short_info']}',
							'{$_POST['mem_phone']}',
							'{$_POST['mem_game']}',
							'{$_POST['mem_sport']}',
							'{$_POST['mem_music']}',
							'{$_POST['mem_email']}',
							'{$usrname}')";
					$rzlt = mysqli_query($dbCon, $qry) or die("couldn't insert mem_nfo ".mysqli_error($dbCon));								
						$resultConfirmation = "Successfully inserted profile information.";
				}
		} else{		
		///// if there are rows in db with this username
		///// if there are rows in db with this username
if(!empty(($_POST['social_google']) 
			&& strlen($_POST['social_google']) > '1') 
	 || !empty(($_POST['social_facebook']) 
			&& strlen($_POST['social_facebook']) > '1') 
	 || !empty(($_POST['social_tumblr']) 
			&& strlen($_POST['social_tumblr']) > '1') 
	 || !empty(($_POST['social_twitter']) 
			&& strlen($_POST['social_twitter']) > '1') 
	 || !empty(($_POST['social_reddit']) 
			&& strlen($_POST['social_reddit']) > '1') 
	 || !empty(($_POST['social_youtube']) 
			&& strlen($_POST['social_youtube']) > '1') 
	 || !empty(($_POST['social_linkedin']) 
			&& strlen($_POST['social_linkedin']) > '1')){
	 $_POST['social_google'] = mysqli_real_escape_string($dbCon,$_POST['social_google']);  
	 $_POST['social_facebook'] = mysqli_real_escape_string($dbCon,$_POST['social_facebook']);  
	 $_POST['social_tumblr'] = mysqli_real_escape_string($dbCon,$_POST['social_tumblr']);  
	 $_POST['social_twitter'] = mysqli_real_escape_string($dbCon,$_POST['social_twitter']);  
	 $_POST['social_reddit'] = mysqli_real_escape_string($dbCon,$_POST['social_reddit']);  
	 $_POST['social_youtube'] = mysqli_real_escape_string($dbCon,$_POST['social_youtube']);  
	 $_POST['social_linkedin'] = mysqli_real_escape_string($dbCon,$_POST['social_linkedin']);  
		
		$soc = "UPDATE `members` SET ";				
		
		} //END OF IF(post(set))
		 elseif(empty($_POST['social_google'])){
			 $_POST['social_google'] = NULL;
		 } elseif(empty($_POST['social_facebook'])){
			 $_POST['social_facebook'] = NULL;
		 }elseif(empty($_POST['social_linkedin'])){
			 $_POST['social_tumblr'] = NULL;
		 }elseif(empty($_POST['social_tumblr'])){
			 $_POST['social_tumblr'] = NULL;
		 }elseif(empty($_POST['social_reddit'])){
			 $_POST['social_reddit'] = NULL;
		 }elseif(empty($_POST['social_youtube'])){
			 $_POST['social_youtube'] = NULL;
		 }elseif(empty($_POST['social_twitter'])){
			 $_POST['social_twitter'] = NULL;
			} 
		$soc .= " `mem_google` = '{$_POST['social_google']}',
			  `mem_facebook` = '{$_POST['social_facebook']}',
			  `mem_tumblr` = '{$_POST['social_tumblr']}',
			  `mem_twitter` = '{$_POST['social_twitter']}',
			  `mem_reddit` = '{$_POST['social_reddit']}',
			  `mem_youtube` = '{$_POST['social_youtube']}',
			  `mem_linkedin` = '{$_POST['social_linkedin']}'
		  WHERE `mem_username` = '{$_SESSION['username']}'";			
		mysqli_query($dbCon,$soc) or die("failed update 4 social ".mysqli_error($dbCon));
		/////////////////////////////////////////////////		
		
		if(isset($_POST['mem_game']) 
		|| isset($_POST['mem_music'])
		|| isset($_POST['private_prof']) 
		|| isset($_POST['mem_sport']) 
		|| isset($_POST['mem_phone']) 
		|| isset($_POST['mem_email']) 
		|| isset($_POST['long_info']) 
		|| isset($_POST['short_info'])){
		 $_POST['mem_game'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['mem_game']));  
		 $_POST['mem_music'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['mem_music']));
		 $_POST['mem_sport'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['mem_sport'])); 
		 $_POST['short_info'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['short_info']));
		 $_POST['long_info'] = ucfirst(mysqli_real_escape_string($dbCon,$_POST['long_info']));
			///chk email \\
			$_POST['mem_email'] = strtolower($_POST['mem_email']);
			$emailext = explode('.', $_POST['mem_email']);
			$email_ext =  end($emailext);	
			$exts = array('com','org','net','eu','kr','jp','de');
			 if(in_array($email_ext, $exts)){
		 $_POST['mem_email'] = trim(strip_tags($_POST['mem_email'], '@'));
			 }else{
		 $_POST['mem_email'] = "No Email Yet";
			 }			  
		    $usrname = _USER_;
			 $qry = "UPDATE `members`
					 SET mem_email = '{$_POST['mem_email']}',  
						 mem_private = '{$_POST['private_prof']}', 
						 mem_fav_music = '{$_POST['mem_music']}', 
						 mem_fav_game = '{$_POST['mem_game']}', 
						 mem_fav_sport = '{$_POST['mem_sport']}', 
						 mem_phone = '{$_POST['mem_phone']}' , 
						 mem_description = '{$_POST['short_info']}' , 
						 mem_about = '{$_POST['long_info']}' 
					WHERE `mem_username` = '{$usrname}'";
				$rzlt = mysqli_query($dbCon, $qry) or die("couldn't update mem_nfo ".mysqli_error($dbCon));
					$resultConfirmation = "Successfully updated profile information.";
			
		} //END OF IF(COUNT(rowsWithSameUsername < 1))	 
	}		
} //END OF IF(ISET('prof_up'))
/////////////////////////////////////////////////////////////////////////			
/////////////////////////////////////////////////////////////////////////			
/////////////////////////////////////////////////////////////////////////			
?>

<?php   ///// CHECK IF USR SUBMITTED EDITED PIC CAPTION \\\\\
	if((isset($_POST['caption_edit']) && !empty($_POST['caption_edit']) && strlen($_POST['caption_edit']) <= '200')){
		$cap_qry = "UPDATE `photos`
					SET `captions` = '{$_POST['caption_edit']}'
					WHERE `mem_id` = '{$_POST['cap_id']}'";
		$rslt = mysqli_query($dbCon, $cap_qry);
			if($rslt){
				$chkUpd = 'YES';
			}
		}else{
			$chkUpd = NULL;
		}
		global $chkUpd;
?>

<?php	//// CHECK IF USR DELETED PICTURE \\\\\\
	if(isset($_GET[md5('del')]) && !empty($_GET[md5('del')])){
	  $pic_id = $_GET[md5('del')];	
		$del_qry = "DELETE FROM `photos`
					WHERE `mem_id` = '$pic_id'";
		$rslt = mysqli_query($dbCon,$del_qry);
			if($rslt){
				$chkDel = 'YES';
			}
		}else{
			$chkDel = NULL;
		}
		global $chkDel;
?>

<?php /// CHECK IF USR UPDATES OR EDITS AVATAR \\\\
	if(isset($_GET[md5('avatar')]) && !empty($_GET[md5('avatar')])){
	  $picId = $_GET[md5('avatar')];
		$pic = "SELECT `photos`,
						`member`,
						`captions`
				FROM `photos` 
				WHERE `mem_id` = '$picId'
				LIMIT 1";
			$rslt = mysqli_query($dbCon,$pic) or die(mysqli_error($dbCon));
		 while($row = mysqli_fetch_array($rslt)){
			$photo2avatar = $row['0'];	
			$photoMem = $row['1'];	
			$photoCap = $row['2'];	
		}
		////////////////////////////
		$qry = "UPDATE `members`
				SET `mem_avatar` = '$photo2avatar',
					`mem_avatar_caption` = '$photoCap'
				WHERE `mem_username` = '$photoMem'";
			$result = mysqli_query($dbCon, $qry);
		if($result){
				 $upAv = 'yes';
			 }
		 }else{
			 $upAv = NULL;
	}
	global $upAv;
?>

<?php /////db_info_update confirm_msg\\\\\
	if(isset($resultConfirmation)){
		echo "<span class='center-block lead' id='resultConfirm'>".$resultConfirmation."</span>";
	}
?>
	
<?// MEMBER PROFILE EDIT \\?><?// MEMBER PROFILE EDIT \\?>
<?// MEMBER PROFILE EDIT \\?><?// MEMBER PROFILE EDIT \\?>
<?// MEMBER PROFILE EDIT \\?><?// MEMBER PROFILE EDIT \\?>
   <div id='pic_upl_form' >
	<form enctype="multipart/form-data" action="" target='_self' method="POST" >	  
	  <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/><!--bytes-->
	  <input type="hidden" name="user" value="<?=$_SESSION['username']?>" />
	  <input name="uploadedfile" id='upFile' type="file" onMouseUp='captionInputEnable()' required />
	
	<div class='center-block' id='<?=rem_picGal()?>'> 
	  <strong class='lead'>Pictures must be less than 1 megabyte</strong>
	   <br> 
	   <br> 
		<?php 
	    $qry = "SELECT * 
				FROM `photos`
				WHERE `member` = '{$_SESSION['username']}'
				ORDER BY `member` ASC";		
			 $rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
			  if(isset($rslt) && !empty($rslt)){
				while($pics = mysqli_fetch_assoc($rslt)){
					  echo "<img src='upl/".$pics['photos']."' width='70px' alt='' />";
				}				
			  }
			?>  	  
	</div>
	
	  <input type='text' size='30' maxlength='30' name="caption" value='' class='form-control input-sm ' placeholder='Photo details' id='imgCaptionInput' title='Choose a Photo then Enter details here' disabled />  
		<div class='pull-left' style='border:10px solid transparent;border-radius:8px;box-shadow:0px 3px 5px #111;'>
		  <input type="submit" name="" value="Upload" type='button' class='btn btn-default pull-left' style='color:#999;font-weight:bold;' onclick='waitCursor();' id='submtPic' ></input>
		  <input type="reset" name="" value="Clear"  type='button' class='btn btn-default pull-left' style='color:#999;font-weight:bold;' ></input>
		</div>																											
		 <br>
		 <br>
		 <?// end pic_upl_form \\?>
		 <?// end pic_upl_form \\?>
	     </div>
		 <br>
		<br>
	   </form>
	  </div>
	 <div class='col-lg-2'>&nbsp;</div>
	</div>
   </div>
  </div>
 </div>
</section>	
	
<?// empty \\?>
		<section class='empty-001'>
		 <div class='content'>
		  <div class='container'>
		   <div class='row'>
			<div class='col-xl-12'>
			  <?=echoIfIsset($chkDel,'<strong class=\'well well-sm \'>SUCCESSFULLY DELETED PICTURE</strong>','<br>')?>
			  <?=echoIfIsset($chkUpd ,'<strong class=\'well well-sm \'>SUCCESSFULLY UPDATED CAPTION</strong>','<br>')?>
			  <?=echoIfIsset($upAv ,'<strong class=\'well well-sm \'>SUCCESSFULLY UPDATED AVATAR</strong>','<br>')?>
			</div>
		   </div>
		  </div>
		 </div>
		</section>	

<?// pic gallery section \\?>
<?// pic gallery section \\?>
<section class='' id=''>
 <div class='content'>
  <div class='container'>
   <div class='row'>
	<div class='col-xl-12'  id='trgt3'>
	  <center>
	  
	   <?// pic gallery carousel \\?>
	   <?// pic gallery carousel \\?>
	   <div class='carousel slide' id='picGalCarousel' data-ride='carousel' >								

		<?/// CAROUSLE INNER \\\?>
		 <div class='carousel-inner' id='pic_gal_carousel'>	 
		 
<!--- MODAL FOR PICTURE INFO EDITING ------>
 <div id='capEditModal' class='modal' >
  <div class='modal-content'>
   <button type='button' class='close' onclick='closeFunc1()' id='spanClose' style='border:4px outset #888;background:#ddd;'>Close</button>
    <h2 style='font-weight:bold;color:rgba(255,255,255,0.75);'>Edit Picture Caption</h2>
	 <p align='center' valign='center'>
		<form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])."#trgt4"?>' method='POST' >
		  <textarea maxlength='200' class='form-control' name='caption_edit' title='Enter Caption' size='200' rows='3' cols='50%' placeholder='<?=$photos['captions']?>' required></textarea>
		 <input type='hidden' name='cap_id' value='<?=$photos['mem_id']?>' />
		 <input type='submit' class='btn btn-primary' value='Done' />
		</form>					   		   
	 </p>		   
  </div>
 </div> 		 		 
<?php
$username = $_SESSION['username'];
	$qry = "SELECT * 
			FROM `photos`
			WHERE `member` = '{$username}'
			ORDER BY `member` ASC";																									
	
	$rslt = mysqli_query($dbCon, $qry)or die(mysqli_error($dbCon));
		 if(isset($rslt) && !empty($rslt)){
			while($photos = mysqli_fetch_assoc($rslt)){
?>
  <div class='item active' id='prof_item_wrp'>
   <span class='text-center center-block well well-sm' style='width:50%;margin:3px auto;padding:4px 0;border-radius:10px;background-color:rgba(239, 239, 240, 0.31);'>
	<a href='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('del')."=".$photos['mem_id']."#trgt4"?>' onclick='alert("You are About To Delete This Picture")'  type='button' class='btn btn-sm btn-success'>
	 <strong> Delete Picture</strong>
	</a>
	<button type='button' id='editCapBtnActive' onClick="openFunc1()" class='btn btn-sm btn-success'>
	 <strong>Edit Caption</strong>
	</button>
	<a href='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('avatar')."=".$photos['mem_id']."#trgt4"?>'  type='button' class='btn btn-sm btn-success'>
	 <strong> Set AS Avatar</strong>
	</a>
   </span>			
	 <img src='<?php echo "upl/".$photos['photos'];?>' class='img-rounded img' alt='' width='400px' height='' style='max-height:250px;' />	
	  <p class='carousel-caption ' style='background:rgba(0,0,0,0.5);border-radius:15px;min-height:5px;box-shadow:0px 4px 8px #222;border:1px dotted #999;' >
		<?=$photos['captions']?>
	 </p>	   
  </div>										
<?php
		break;	
	}
		while($photos = mysqli_fetch_assoc($rslt)){				
?>
  <div class='item' id='prof_item_wrp'> 	
   <span class='text-center center-block well well-sm' style='width:50%;margin:3px auto;padding:4px 0;border-radius:10px;background-color:rgba(239, 239, 240, 0.31);'>
	<a href='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('del')."=".$photos['mem_id']."#trgt4"?>' onclick='alert("You are About To Delete This Picture")' type='button' class='btn btn-sm btn-success'>
	 <strong> Delete Picture</strong>
	</a>
	<button type='button' id='editCapBtn' onClick="openFunc1()" class='btn btn-sm btn-success'>
	 <strong>Edit Caption</strong>
	</button>
	<a href='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('avatar')."=".$photos['mem_id']."#trgt4"?>'  type='button' class='btn btn-sm btn-success'>
	 <strong> Set AS Avatar</strong>
	</a>	
   </span>
	 <img src='<?="upl/".$photos['photos']?>' class='img-rounded' alt='' width='400px' height='' style='max-height:250px;' />	
	  <p class='carousel-caption ' style='background:rgba(0,0,0,0.5);border-radius:15px;min-height:5px;box-shadow:0px 4px 8px #222;border:1px dotted #999;' >
		<?=$photos['captions']?>
	 </p>	   
   </div>	
   
<?php				
		}		 
	}
 ////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////
?>
		   <?/// item begin \\\?>
			
		  <?/// carousel slide controls \\\?>
		   <a href='#picGalCarousel' class='carousel-control left' id='carousel-left-arrow' data-slide='prev' > 
			<img src='css/pix/ico/sliderControlLeft.gif' alt='' width='50%' class='img-responsive pull-left' />
 
		   </a>
		  <?/// carousel slide controls \\\?>
		   <a href='#picGalCarousel' class='carousel-control right' id='carousel-right-arrow' data-slide='next' > 
			<img src='css/pix/ico/sliderControlRight.gif' alt='' width='50%' class='img-responsive pull-right' />				
 
		   </a>			
		  &nbsp;
		 </div>
			 <?///  right block \\\?>
			  <div class='text-right carousel-right-block' id='carousel-btm-title-prof'>
				  <h2 style='border:none;background-color:transparent;box-shadow:none;margin:0 auto;padding:none;border-radius:0;'>
				   <center>
					<b>&nbsp;</b>
				   </center>
				  </h2>
			  </div>							
			</div>
 	  </center>
	</div>
   </div>
  </div>
 </div>
</section>	
	
<section>
 <div class='content'>
  <div class='container'>
   <div class='row'>
	<div class='col-lg-12' id='carousel-btm-title-prof-rev'>
 

<?php //////show if new_acct just made\\\\\\\\\
	if(isset($_GET['Registered'])){
?>
<?/// MODAL POPUP FOR NOOB REGISTRARS \\\?>
<div class='modal' id='modal_fornoobs' >
  <div class='modal-header' style='display:block;width:40%;margin:7% auto;background-color:rgba(0,0,0,0.75);border-radius:10px;border:3px solid #777;'>
    <h2 class='well well-sm' style='font-weight:bold;color:rgba(255,255,255,0.85);text-align:center;'>
	Welcome <?=_USER_?> To Your New Profile!
	</h2>

	 <p align='center' valign='center' id='noob_rules'  >
	  <h3>
		<strong>
		 Quick Helpful Tips:
		</strong>
	  </h3>	
		<ul class='list-group' style='width:95%;padding:10px 20px 10px 20px;color:#222;letter-spacing:-.74px;font-size:18px;line-height:2.1;'>
			<li class='list-group-item' style='margin-bottom:3px;text-align:center;'>
			 At the very top you can view your messages and view profile.
 			</li>
			<li class='list-group-item' style='margin-bottom:3px;text-align:center;'>
			 Here you can upload <u>5 pictures max</u>, and choose one as your avatar!
 			</li>
			<li class='list-group-item' style='margin-bottom:3px;text-align:center;'>
			 You can also Update profile and set to public or private mode.
 			</li>		
 
		</ul>
		
		<p align='center' valign='center' class='modal-dialogue' style='padding:10px 20px 10px 20px;'>
			<center class='lead' style='color:#ccc;'>
			 Thanks for joining <b>BS-Exposed</b>. 
			</center>	
		</p>		
	 </p>


	 
   <button type='button' id='modal4noob_close' class='center-block btn btn-sm btn-warning'>Get Started</button>
	 
  </div>
 </div> 

<?php
}//// end of if(noob just registered)
?>		   
 
		<?/// SHOWS MESSAGES FROM OTHER USERS \\\?>
		<?/// SHOWS MESSAGES FROM OTHER USERS \\\?>	
 
		   <?// members messages \\?>
			<a href='<?="?YoMsg=".md5('read')."#trgt3"?>' target='_self' type='button' class='btn btn-default btn-lg' data-toggle='collapse' data-target='#showMsgBox' style='width:35%;padding:5px 2px;margin:0 -5px auto;border-radius:10px 10px;border:none;'>
 			  <b>
			   <strong class='text-muted well' style='background-color:rgba(0,0,0,0.93);border:transparent;border-radius:8px 8px;padding:4px;'> 
			     Your Messages
			   </strong>
			  </b>
 			</a>
	</div>
   </div>
  </div>
 </div>
</section>	
	
<form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])?>#trgt4' method='POST'>
		
<section class='footer-prof'>
 <div class='content' >
  <div class='container'>
   <div class='row'>
	<div class='col-lg-12' id='footerMainSec' >
		<div class='<?=showElementIfRequest("collapse in", "collapse", "YoMsg")?>'  id='showMsgBox'>

				<ul style='text-decoration:none;list-style:none;list-style-type:none;border-top:8px solid black;background-color:rgba(255,255,255,.03);max-height:600px;overflow:auto;'> 

			     <span class='<?=echoIfIsset($delChk,'well well-lg','hide')?>' >
				  <strong>Successfully Deleted Msg!</strong>
				 </span>								
														
			     <span class='<?=echoIfIsset($snt,'well well-lg','hide')?>' >
				  <strong>Successfully Sent Msg!</strong>
				 </span>			     
				 
				 <span class='<?=echoIfIsset($upAv,'well well-lg','hide')?>' >
				  <strong>Successfully Updated Avatar!</strong>
				 </span>						
					
			   <?php
			    $qry = "SELECT `id`,
								`message_sender`,
								`member_messages`,
								`message_date`
						FROM `member_messages`
						WHERE `message_receiver` 
						LIKE '{$_SESSION['username']}'
						ORDER BY `message_date` DESC
						LIMIT 50";
				$rslt = mysqli_query($dbCon, $qry);
				 if(mysqli_num_rows($rslt) > '0'){
				  while($row = mysqli_fetch_array($rslt)){
					$msg_id = $row['id'];
					  ?>
				  <li>  
					<span class='well well-lg center-block' style='border-left:10px solid rgba(0,0,0,0.9);border-right:10px solid rgba(0,0,0,0.9);border-radius:10px'>
					 <p>
					  <b class='lead'>
					    From: <?=$row['message_sender']?>&nbsp;&nbsp;
					     <br>
					    Date:<?=$row['message_date']?>
					   </b>
						
					   <b class='pull-right'>
						<button type='button' class='btn btn-primary btn-sm' data-target='#reply_box' data-toggle='collapse' <?=IfIssetAndEqualValue($row['message_sender'],'Brandon Osuji','disabled','')?>>
						 Reply
						</button>&nbsp;
						
						<a href="<?=htmlspecialchars($_SERVER['PHP_SELF'])."?dm=".$msg_id."&YoMsg=".md5('read')."#trgt3"?>" target='_self' >
						 <button type='button' class='btn btn-warning btn-sm' data-toggle='collapse' data-target='#reply_box'>
						  Delete
						 </button>
						</a>
					   </b>
					</p>
					  <br>
					   <hr />
						<p align='left' style='padding:8px;text-indent:10px;'>
						 <?=nl2br($row['member_messages'])?>
						 </p>
						</span>
 						 <div id='reply_box' class='collapse' >
							 <textarea maxlength='500' name='msg_out' placeholder='Enter Message here' class='input input-sm form-control' required></textarea>						
							  
							  <input type='hidden' name='receiver' value='<?=$row['message_sender']?>' />
							  <input type='hidden' name='msg_id' value='<?=$msg_id?>' />
							<input type='submit' name='' value='Post' class='btn btn-success input-sm' />
							<input type='reset' name='' value='Clear' class='btn btn-warning input-sm' />
					 </div>
 					</li>  
					  <?php
				  }
				 }else{
					 echo "<li class='center-block well text-center'><b class=''>Inbox Empty</b></li>";
				 }
			   ?>

 				</ul>
			</div>	
	    </div>	
 	</div>
   </div>
  </div>
</section>

</form>

<section class='footer-prof'>
 <div class='content'>
  <div class='container'>
   <div class='row'>
	<div class='col-lg-12' id=' '>
	   <div id='tblCenter' class='table' style='border:10px solid #111;border-radius: 0 0 12px 12px;'>
		 <?////PROFILE TABLE FOOTER TABLE \\\\\?>
		  <table cellpadding='0' class='table-responsive table-condensed' cellspacing='1' width='70%' >
		   <tbody>
			<?///TABLE IN CONTENT SECTION\\\?>
			<?///TABLE IN CONTENT SECTION\\\?>			 
			  <tr>
			 <td colspan='100%'>	
			<br>
		   <center>
		    <b>
		     <font color='#888' size='6' style='text-shadow:1px 3px 5px #333;background-color:rgba(255,255,255,0.34);padding:8px;border:4px solid #999;'> 
 			  Edit your profile 
		     </font>
		    </b>
		   </center>
		  <br>
		 </td>		
		</tr>
	<?php ///if profile info exist then autofill value fields \\\\
		$qry = "SELECT * 
				FROM `members` 
				WHERE `mem_username` = '{$_SESSION['username']}'
				LIMIT 1";
		$rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
		while($fields = mysqli_fetch_assoc($rslt)){
				$google = $fields['mem_google'];
				$facebook = $fields['mem_facebook'];
				$twitter = $fields['mem_twitter'];
				$youtube = $fields['mem_youtube'];
				$linkedin = $fields['mem_linkedin'];
				$reddit = $fields['mem_reddit'];
				$tumblr = $fields['mem_tumblr'];
				$mem_about = $fields['mem_about'];
					break;
			}							
	?>
	 <tr>
	   <form class='form form-inline' action='<?=htmlspecialchars($_SERVER['PHP_SELF'])?>#navElement' method='POST' > 
		 <th align='center' colspan='100%' >
			<h2 class='bg-primary lead privAlert' style='display:;font-size:14px;position:absolute;top:55px;opacity:0;border-radius:10px;right:auto;left:10%;padding:15px;width:80%;display:block;margin:0 auto;transition:opacity .2s;'>
			 <center>You can make profile and comments viewable to <b>only members</b>.</center>
			</h2>
			<h2 class='bg-primary lead privAlert' style='display:;font-size:14px;position:absolute;top:55px;opacity:0;border-radius:10px;right:auto;left:10%;padding:15px;width:80%;display:block;margin:0 auto;transition:opacity .2s;'>
			 <center>You can make profile and comments viewable to <b>public including members</b> .</center>
			</h2>
		 </th>
		</tr>
		<tr>
		 <td colspan='100%' align='center' style='margin: 0 auto;background-color:#888;border-radius:8px;padding:5px;'>
	      <center name='chng' hidden>
		   <sup>
		    <strong>
			 Must click submit button at bottom of page to make these changes to your profile.
			</strong>
		   </sup>
		  </center>
		  <span class='well well-lg bg-primary radio' style='margin:0 auto;width:49.5%;display:inline-block;' onmouseover='document.getElementsByClassName("bg-primary lead privAlert")[0].style.opacity = ".8";'onmouseout='document.getElementsByClassName("bg-primary lead privAlert")[0].style.opacity = "0";'>
		   <label  onclick='document.getElementsByName("private_prof")[0].setAttribute("checked","");document.getElementsByName("chng")[0].removeAttribute("hidden");' for='private_prof' class='form-control-label text-left'>Private</label>
			<input type='radio' name='private_prof' title='Only members can view your postings and profile' value='1' class='input-lg form-control' style='right:-40%;bottom:auto;top:2px;margin:0;border:none;box-shadow:none;' onclick='document.getElementsByName("chng")[0].removeAttribute("hidden");'></input>
		  </span>
	      <span class='well well-lg bg-primary radio' style='margin:0 auto;width:49.5%;display:inline-block;' onmouseover='document.getElementsByClassName("bg-primary lead privAlert")[1].style.opacity = ".8";'onmouseout='document.getElementsByClassName("bg-primary lead privAlert")[1].style.opacity = "0";'>		 
		   <label onclick='document.getElementsByName("private_prof")[1].setAttribute("checked","");document.getElementsByName("chng")[0].removeAttribute("hidden");' for='private_prof' class='form-control-label text-left'>Public</label>			
			<input type='radio' name='private_prof' title='Public can view your postings and profile' value='0' class='input-lg form-control' style='right:-40%;bottom:auto;top:2px;margin:0;border:none;box-shadow:none;' onclick='document.getElementsByName("chng")[0].removeAttribute("hidden");'></input>
		 </span>		 
		 </td>
		</tr>
		<tr>
		 <td>
		 <div class='form-group-lg' style='color:#222;'>	  
		  My Favorite Game 
		 </td>
		<td>
			<input class='form-control' type='text' size='30' name='mem_game' placeholder='PC Console, Connect-Four...' value='<?=echoIfIsset($fields['mem_fav_game'],$fields['mem_fav_game'],'')?>'  style='width: 100%;'   /> 
		   </td>
	   </tr>
		<tr>
		 <td  style='color:#222;'>		
		My Favorite Music 
		 </td>
		<td  >			
			<input class='form-control' type='text' size='30' name='mem_music' placeholder='Music you like' value='<?=echoIfIsset($fields['mem_fav_music'],$fields['mem_fav_music'],'')?>'  style='width: 100%;'   /> 
		 </td>
	   </tr>
		<tr>
		 <td  style='color:#222;'>			 
		 My Favorite Sport 
		 </td>
		<td  >			
			<input class='form-control' type='text'  cols='2' size='50' name='mem_sport'  placeholder='Sports or Teams you like' value='<?=echoIfIsset($fields['mem_fav_sport'],$fields['mem_fav_sport'],'')?>' style='width: 100%;'   /> 
		 </td>
	   </tr>
		<tr>
		 <td  style='color:#222;'>			 
		 My Phone Number
		 </td>
		<td >			
			<input class='form-control' type='phone' rows='4' cols='2' size=' ' value='<?=echoIfIsset($fields['mem_phone'],$fields['mem_phone'],'')?>' name='mem_phone'  placeholder='*** *** ****' style='width: 100%;'   /> 
		 </td>
	   </tr>
		<tr>
		 <td  style='color:#222;'>			 
		 My Email Address
		 </td>
		<td >			
			<input class='form-control' type='email' rows='4' cols='2' size='50' name='mem_email' value='<?=echoIfIsset($fields['mem_email'],$fields['mem_email'],'')?>' placeholder='Email@you.com' style='width: 100%;'   /> 
		 </td>
		<td  style='color:#222;'>		     
	   </tr>
		<tr>
		 <td  style='color:#222;'>	
		
			Few Words 2 Describe Me
		  </td>
		   <td >			
			<input class='form-control' maxlength='50' type='text' name='short_info' value='<?=echoIfIsset($fields['mem_description'],$fields['mem_description'],'')?>' placeholder='Are you Outgoing, Narcistic, Troll' style='width: 90%;' size='50'   />
		  </td>
		 </tr>
		 <tr>
		  <td colspan='100%' align='center'>
		   <hr />			
			<b  style='color:#333;font-weight:bold;text-shadow:0px 3px 5px rgba(255,255,255,0.5);' class='lead' >
			 Your Social Profiles:
			</b>

		   <?// social networks btn and dropdown selection \\?>
			<center class='btn btn-default' onClick='showSocial();' id='showInput' style='background-color:rgba(255,255,255,0.15);width:100%;padding:2px 2px;margin:0 auto;cursor:pointer;border-radius:10px 10px;'>
			  <b>
			   <strong class='text-muted'> &nbsp;&nbsp;&nbsp;
			  Your Social Networks &nbsp;&nbsp;&nbsp;
			   </strong>
			  </b>
 			</center>
			   &nbsp;&nbsp; 
		   <br><br>
			
			<?/// SOCIAL ICONS \\\?><?/// SOCIAL ICONS \\\?>
			<?/// SOCIAL ICONS \\\?><?/// SOCIAL ICONS \\\?>
			<ul style='text-decoration:none;list-style:none;list-style-type:none;display:none;' id='mem_socials'> 
			 <!--- content: after is here, dont remove br tag ----><br>
			  <li>  
				<img src='css/pix/google.png' alt='Google' width='10%' /></input><br>
					 <input class='form-control' type='url' size='100' name='social_google'  value='<?=echoIfIsset($google,$google,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'   /> <hr /></li> 
				  <li>  
				<img src='css/pix/facebook.png' alt='Facebook' width='10%' /></input><br>
					 <input class='form-control' type='url' size='100' name='social_facebook'    value='<?=echoIfIsset($facebook,$facebook,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'  /> <hr /></li> 
			  <li>
				<img src='css/pix/tumblr.png' alt='Tumblr' width='10%' /></input><br>
					 <input class='form-control' type='url' size='100'   name='social_tumblr'    value='<?=echoIfIsset($tumblr,$tumblr,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'   /> <hr /></li> 
			  <li> 
				<img src='css/pix/twitter.png' alt='Twitter' width='10%' /></input><br>
					 <input class='form-control' type='url' size='100'   name='social_twitter'  value='<?=echoIfIsset($twitter,$twitter,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'  /> <hr /></li> 
			  <li> 
				<img src='css/pix/reddit.png' alt='Reddit' width='10%'  /></input><br>
					 <input class='form-control' type='url' size='100'   name='social_reddit'  value='<?=echoIfIsset($reddit,$reddit,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'  /> <hr /></li> 
			  <li> 
				<img src='css/pix/youtube.png' alt='Youtube' width='10%'  /></input><br>
					 <input class='form-control' type='url' size='100'   name='social_youtube'  value='<?=echoIfIsset($youtube,$youtube,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'  /> <hr /></li> 					
			  <li> 
				<img src='css/pix/linkedin.png' alt='Linkedin' width='10%'  /> </input><br>
					 <input class='form-control' type='url' size='100'   name='social_linkedin'  value='<?=echoIfIsset($linkedin,$linkedin,'')?>' placeholder='Enter URL to your page' onkeydown='if(this.value.lastIndexOf("") > 1){this.setAttribute("required","");}else if(this.value.lastIndexOf("") < 1){this.removeAttribute("required");}'   /> <hr /></li> 			
			</ul>			
				 
			<b style='color:#333;font-weight:bold;text-shadow:0px 3px 5px rgba(255,255,255,0.5);' class='lead' >
			 Tell us more about you:
			</b>	
			<?/// mem_about txt area \\\?>
			<?/// mem_about txt area \\\?>
				
				<textarea maxlength='300' class='form-control input-lg' title='Why makes you different?' name='long_info'  size='300' cols='85%' rows='3' placeholder='Describe Yourself' style='width:85%;'><?=echoIfIsset($mem_about,$mem_about,'')?></textarea>
			 
			 <br>  
				<input type='submit' name='prof_up' value='Done'  type='button' class='btn btn-primary'></input>
				<input type='reset'  value='Clear'  type='button' class='btn btn-warning'></input>

		  </td>
		 </tr>
		</form>
		<?/////END OF TBODY CNT\\\\\?>
	   </div>
	  <?//// end of div w_class = form-horizontal \\\?>
     </tbody>
	</table>
		
	   
	  </div>
	</div>
   </div>
  </div>
 </div>
</section>
	<?// end of footer \\?>
		
<?/// empty \\\?>		
		<section class='empty-1' style='width:95%;'>
		 <div class='content'>
		  <div class='container'>
		   <div class='row'>
			<div class='col-lg-12'>
			 &nbsp;
			 <br>
			</div>
		   </div>
		  </div>
		 </div>
		</section>	
		
	</div><?// end of topSec div \\?>
	
<?// END OF MAINWRAPPER \\?>
<?// END OF MAINWRAPPER \\?>
	
  
<?//██████████████████████████████████████████████████████████████████████████
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 			
////////////////////////██████████//█████████///////////////////////////////			
////////////////////////////██//////██//////////////////////////////////////			
////////////////////////////██////////████//////////////////////////////////			
////////////////////////////██ ///////////██////////////////////////////////			
////////////////////////██████//////████████////////////////////////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████████████████████████████
///////////////////////////////////////////////////////////////////////////?>
<script> ////////  modals \\\\\\\\\\\\
var EditModal = document.getElementById('capEditModal');
var cap_btn = document.getElementById("editCapBtn");
var cap_btn_2 = document.getElementById("editCapBtnActive");
var spanClose  = document.getElementById("spanClose");
var chkFileNput = document.getElementById("upFile"); 
var picSect = document.getElementById("picSection");
var topp = document.getElementById("topp");
	
	cap_btn.onclick = function(){openFunc1()};
	cap_btn_2.onclick = function(){openFunc1()};
	spanClose.onclick = function(){closeFunc1()};

	/// OPEN MODAL FUNCTION
	function openFunc1(){
		EditModal.style.display = "block";
	}
	// CLOSE MODAL FUNCTION
	spanClose.onclick = function(){closeFunc1()};
		function closeFunc1(){
			EditModal.style.display = "none";
		}
	//CLICKS OUTSIDE MODAL WINDOW CLOSES MODAL WINDOW
	 window.onclick = function(e){
		if(e.target == EditModal){
			EditModal.style.display = "none";
			}
		}

function waitCursor(){
	if(chkFileNput.value){
		document.body.style.cursor = "wait";
		picSect.style.opacity = "0.08"; 
 		topp.innerHTML = "<div class='center-block modal modal open' style='position: ;top:0;'><h1 class='center-block text-center well well-lg lead picUplLdr' style='margin-top:500px;font-family:impact;letter-spacing:5px;color:#ddd;'>UPLOADING PICTURE</h1></div>";
 	}
}		
</script>

 <script>
	function minimizePhoto(){
		
	}
   function showList(){
	   var memList = document.getElementById('mem_list');
	   var memListBtn = document.getElementById('yolo');
	   
	   var togl = memList.style.display != 'none';
	   var toglBtn = memListBtn.innerHTML != 'View Members List';
	  
	  memList.style.display = togl ? 'none' : 'block';
	  memListBtn.innerHTML = toglBtn ? 'View Members List' : 'Hide Members List';
   }
</script>
  
<script>
var modal_4noob = document.getElementById("modal_fornoobs");
var noobmodal_close = document.getElementById("modal4noob_close");
	modal_4noob.style.display = "block";
	noobmodal_close.onclick = function(){closeNoobModal()};
		function closeNoobModal(){
			modal_4noob.style.display = "none";
		}
</script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

   </BODY>
</HTML>