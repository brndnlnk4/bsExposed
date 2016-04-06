<!DOCTYPE html> 
<HTML lang='en-US'>
<HEAD>
<?php require("ses.php"); ?>
<?php require("incl/fn.php"); ?>
<?php ////DEFINE STUPID WALL POST TBL NAME
 if(isset($_GET[md5('p')])){
	$ddd = $_GET[md5('p')];
	$q = "SELECT `mem_username` FROM `members` WHERE `id` = '$ddd'";
	$rst = mysqli_query($dbCon, $q) or die(mysqli_error($dbCon));
	while($rr = mysqli_fetch_assoc($rst)){
		$usr = "prof_cmt_".$rr['mem_username'];
			break;
	}	 
	define("_PROF_WALL_",$usr);
}else{
 	define("_PROF_WALL_",'prof_cmt_ex');
}	
?>

<?php	///// CHECK FOR PM SENT TO MEM \\\
if(isset($_GET[md5('p')]) && !empty($_GET[md5('p')])){
getMemNameById($_GET[md5('p')]);	
 
   /////////////////////////////  
   $p_id = $_GET[md5('p')];
   global $p_id;
	if(isset($_GET[md5('msg')]) && isset($_POST['msg'])){
		if(!empty($_POST['msg']) && (strlen($_POST['msg']) >= '1') && strlen($_POST['msg']) <= '500'){
		 $sntMsg = mysqli_real_escape_string($dbCon,$_POST['msg']);  
		 $sntMsg = addcslashes($sntMsg, '%_');
		  $d8 = date('Y-m-j');
			$msg_qry = "INSERT INTO `member_messages`(
									`member_messages`,
									`message_receiver`,
									`message_sender`,
									`message_date`,
									`message_read`)
							VALUES ('$sntMsg',
									'{$_POST['receiver']}',
									'{$_SESSION['username']}',
									'$d8',
									'no')"; 
			$rslt = mysqli_query($dbCon, $msg_qry) or die(mysqli_error($dbCon));
				if($rslt){
				 ?>
				 <script>
				  alert("Messge Sent!");
				 </script>
				 <?php
				}
			}
		} ///END OF IF(msg snt)	
///////////////////////////////////////////////			
///////////////////////////////////////////////			
/////// CHECK FOR PROF_WALL POSTS \\\\\\\\\\\\\
  if(isset($_POST['sbt'])){
	$tbl = _PROF_WALL_;
     $tblrslt = mysqli_query($dbCon,"SHOW TABLES LIKE '$tbl'");
	 if(mysqli_num_rows($tblrslt) == 0){
			
				$sql = "CREATE TABLE `$tbl` (
					 `id` int(4) NOT NULL AUTO_INCREMENT,
					 `profile_comment` text NOT NULL,
					 `profile_commentor` varchar(50) NOT NULL,
					 `profile_member` varchar(50) NOT NULL,
					 `profile_comment_date` date NOT NULL,
					 `profile_comment_vote` int(4) NOT NULL DEFAULT '0',
					 `reply_set` int(1) DEFAULT '0' COMMENT 'reply set or not',
					 PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";
				 @mysqli_query($dbCon, $sql); //or die(mysqli_error($dbCon));
		}

	//////CHK IF PROF-POST SUBMITTED/////
	if(!empty($_POST['prof_wall']) && strlen($_POST['prof_wall']) > '1'){	     
		$d8 = date('Y-m-j');
		 
		//$chk_if_tbl = mysqli_query($dbCon, "CHECK TABLE `$tbl`");
				$tbl = _PROF_WALL_;

			////// INSERT QRY BELOW \\\\\\\\\\			
			$profPost = mysqli_real_escape_string($dbCon,$_POST['prof_wall']);
			$profPost = addcslashes($profPost, '%_' );
				$sql = "INSERT INTO `$tbl`(
									`profile_comment`,
									`profile_commentor`,
									`profile_member`,
									`profile_comment_date`) 
						VALUES('$profPost',
							   '{$_SESSION['username']}',
							   '$name',
							   '$d8')";
				$rslt = mysqli_query($dbCon, $sql);// or die(mysqli_error($dbCon));
		
		}
	}/// END OF prof_wall post
} ///END OF IF(prof_id)
?>

<?//-SEO-SHT\\\//-SEO-SHT\\\//-SEO-SHT\\\?>
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
<link rel='icon' href='css/pix/icon.ico' />
<link rel='stylesheet' type='text/css' href='css/nav_style.css' />
<link rel='stylesheet' type='text/css' href='css/main_style.css' />
<link rel='stylesheet' type='text/css' href='css/custom.css' />
<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
</HEAD>

<?//███████████████████████████████████████████████████████████ 
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
  <BODY bgcolor='' style='position:relative;' onLoad='flashDisplay()' onResize="flashDisplay();"> 
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
	<div class='mainWrapper' >
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?php require("incl/usr_reg.php"); ?>
	
<?/// empty \\\?>				
		<section class='empty-0'>
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

	<?/// member profile info & view \\\?>
	<?/// member profile info & view \\\?>
 	 <DIV id='tableMain' style=''>
	  
	  <div style='max-width:55%;margin:0 auto 10px auto;max-height:100px;border-radius:10px;border:5px solid rgba(0,0,0,0.05);background-color:rgba(0,0,0,0.1);'> 
		 <strong>
			<h1 class=' text-center center-block' style='font-family:serif;color:#ddd;font-size:55px;text-shadow: 1px 3px 5px rgba(0,0,0,0.75);letter-spacing:3.5px;padding-left:2px;padding-right:2px;'>
			 Members
			</h1>
		  
		</strong>
	 </div> 

	  <?php /////Hides mem_list if user is viewing mem_profile\\\\\\\
		if(isset($_GET[md5('p')])){
 			 echo "<center id=\"mem_list_xpand\" onclick=\"showList()\" ><span class=\"btn btn-default\"><b id='yolo'>
			  View Our Members
			 </b></span></center>";
			 echo "<br>";
			 
			}
		?>
  <?/////// MEMBERS LIST VIEW TABLE \\\\\\\\\\\\\\?>
  <?/////// MEMBERS LIST VIEW TABLE \\\\\\\\\\\\\\?>		
	
	<?=displayNoneOnProfView()?> 

		<table cellspacing='1' class='table table-condensed' cellpadding='0'  align='center'  style='background-color:rgba(0,0,0,0.12);box-shadow:0px 3px 5px rgba(0,0,0,0.5);border-radius:10px 10px;'>
		 <tr>
		  <th colspan='10%'>
		   <br>
			<b>Members Name</b>
		  </th>
		  <th colspan='35%'>
		   <br>
			<b>Level</b>
		  </th>
		  <th colspan=' '>
		   <br>
			<b>Social_Link</b>
		  </th>		  
		  <td colspan=''>
		   &nbsp;
		  </td>
		  <th colspan=''>
		   <br>
		   &nbsp;
		  </th>
		  <th colspan='20%'>
		   <br>
			<b class='text-center'>
			<?=switchIfLoggedIn("Message","")?>
			</b>
		  </th>
		 </tr>	
		 <tr>
		  <td colspan='100%' style='border-radius:8px 8px 0 0;padding:0;background-color:rgba(255,255,255,0.63);'>
		   &nbsp;
		  </td>
		 </tr>
<?php ////////////MEMBER PROFILE ROWS\\\\\\\\\\\\\\\\\
	  ////////////MEMBER PROFILE ROWS\\\\\\\\\\\\\\\\\
 $qry = "SELECT `id`,
				`mem_username`,
				`mem_votes`,
				`mem_avatar`,
				`mem_fav_music`,
				`mem_fav_sport`,
				`mem_phone`,
				`mem_description`,
				`mem_about`,
				`mem_facebook`,
				`mem_tumblr`,
				`mem_twitter`,
				`mem_reddit`,
				`mem_youtube`,
				`mem_linkedin`
				`mem_private`
		   FROM `members` ";

  if(!isset($_SESSION['username'])){
   $qry .= " WHERE `mem_private` = '0' ";		
			}else{
   $qry .= " WHERE `mem_private` = '1' 
			 OR `mem_private` = '0' ";		
			} 		
	$qry .=	" ORDER BY 'id' ASC ";

			//// show more btn process \\\\\
		if(isset($_GET[md5('first')])){
			$qry .= " LIMIT 40";			
		}elseif(isset($_GET[md5('second')])){
			$qry .= " LIMIT 60";			
		}elseif(isset($_GET[md5('third')])){
			$qry .= " LIMIT 250";				
		}else{					
			$qry .= " LIMIT 20";				
 			}						
/////////////////////////////////////////
$rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon)); 

 $cnt = mysqli_num_rows($rslt); 
    $showBtn = false;
	if(mysqli_num_rows(mysqli_query($dbCon, $qry)) > '0'){
	  $more_btn = NULL;  
	   if(($cnt >= '20') && $cnt < '40'){
		   $more_btn = '?'.md5('first').'';
		    if(isset($_GET[md5('first')])){
				$showBtn = false;
			}else{
				$showBtn = true;
			}
	   }elseif(($cnt >= '40') && $cnt < '60'){
		   $more_btn = '?'.md5('second').'';
		    if(isset($_GET[md5('second')])){
				$showBtn = false;
			}else{
				$showBtn = true;
			}		   		   
	   }else{
		   if($cnt >= '60'){
		   $more_btn = '?'.md5('third').'';
		    if(isset($_GET[md5('third')])){
				$showBtn = false;
			}else{
				$showBtn = true;
			}	
		  }		
	   }		
	   global $showBtn;
	   global $more_btn;
////////////////////////////////////////////   
////////////////////////////////////////////   
while($row = mysqli_fetch_assoc($rslt)){
	//////social icon chk /////////////
	if(isset($row['mem_linkedin']) && strlen($row['mem_linkedin']) > '5'){
		$linkedin = $row['mem_linkedin'];
	}else{
		$linkedin = NULL;
	}
	if(isset($row['mem_facebook']) && strlen($row['mem_facebook']) > '5'){
		$facebook = $row['mem_facebook'];
	}else{
		$facebook = NULL;
	}
	if(isset($row['mem_tumblr']) && strlen($row['mem_tumblr']) > '5'){
		$tumblr = $row['mem_tumblr'];
	}else{
		$tumblr = NULL;
	}
	if(isset($row['mem_twitter']) && strlen($row['mem_twitter']) > '5'){
		$twitter = $row['mem_twitter'];
	}else{
		$twitter = NULL;
	}
	if(isset($row['mem_youtube']) && strlen($row['mem_youtube']) > '5'){
		$youtube = $row['mem_youtube'];
	}else{
		$youtube = NULL;
	}
	if(isset($row['mem_google']) && strlen($row['mem_google']) > '5'){
		$google = $row['mem_google'];
	}else{
		$google = NULL;
	}
	/////////////////////////////////
	/////// avatar check ////////////
	if(!empty($row['mem_avatar']) && !strstr($row['mem_avatar'],'css')){
		$avatr = "upl/".$row['mem_avatar'];
	}
		
	$privacy = $row['mem_private'];
///mem-vote-fnctn\\\///mem-vote-fnctn\\\
///mem-vote-fnctn\\\///mem-vote-fnctn\\\
$lvlPic = array("hide","hide","hide","hide","hide","hide","hide","hide","hide",);
$v = 'nOob';
 switch($v){
	case $row['mem_votes']>='20' && $row['mem_votes']<'49': 
		$v = "Learner";
		$lvlPic = array("","hide","hide","hide","hide","hide","hide","hide","hide");						
		break;
	case $row['mem_votes']>='50' && $row['mem_votes']<'69': 
		$v = "Teacher";
		$lvlPic = array("","","hide","hide","hide","hide","hide","hide","hide");
		break;
	case $row['mem_votes']>='70' && $row['mem_votes']<'70': 
		$v = "Experienced";
		$lvlPic = array("","","","hide","hide","hide","hide","hide","hide");
		break;
	case $row['mem_votes']>='100' && $row['mem_votes']<'169': 
		$v = "Expert";
		$lvlPic = array("","","","","hide","hide","hide","hide","hide");
		break;
	case $row['mem_votes']>='170' && $row['mem_votes']<'299': 
		$v = "Master";
		$lvlPic = array("","","","","","hide","hide","hide","hide");
		break;
	case $row['mem_votes']>='300' && $row['mem_votes']<'399': 
		$v = "Merciless";
		$lvlPic = array("","","","","","","hide","hide","hide");
		break;
	case $row['mem_votes']>='400' && $row['mem_votes']<'499': 
		$v = "Brutal";
		$lvlPic = array("","","","","","","","hide","hide");
		break;	
	case $row['mem_votes']>='500' && $row['mem_votes']<'749': 
		$v = "Gladiator";
		$lvlPic = array("","","","","","","","","hide");
		break;	
	case $row['mem_votes']>='750' && $row['mem_votes']<'999': 
		$v = "- PRINCE -";
		$lvlPic = array("lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince");
		break;		
	case $row['mem_votes']>='1000' && $row['mem_votes']<'1499': 
		$v = "- KING -";
		$lvlPic = array("lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king");
		break;			
	case $row['mem_votes']>='1500': 
		$v = "- YO-BOSS -";
		$lvlPic = array("lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor");
		break;								
default: $v = "Nooby";
}///END OF RATING-LVL SWITCH
 ?>
				
	 <tr style='background:rgba(255,255,255,0.72);border-top:3px inset #aaa ;'>
	  <td colspan='10%' style='padding-left:10px;border-right:1px dotted rgba(0,0,0,0.03);'>

		<?// mem-name & avatar \\?>			 

		 <a href='<?="?".md5('p').'='.$row['id']?>#trgt1' target='_self' type='button' class='btn btn-success btn-md' style='letter-spacing:2.7px;width:70%;' > 	
		
		<strong style='font-weight:800;color:rgba(255,255,255,0.8);'>  
		   
		   <?=$row['mem_username']?>	   
		 
		 </strong>
		 </a>
		 
		 <?// mem avatar \\?>
		<p align='center' valign='center' class='pull-right' style='width:auto;margin-right:3%;margin-left:0;padding:3px 0;'>
		
			<img src='<?=$avatr?>' width='' alt='Avatar' title="<?=$row['mem_username']."'s"?> Avatar" class='img-responsive img-rounded' id='mem_list_avatars' style='box-shadow:0px 3px 5px #333;border:1px solid transparent;' /> 
		
		</p>
	  </td>
	 <td colspan='35%' style='min-width:170px;background-color:rgba(0,0,0,0.05);'> 
		 
	  <?// lvl status \\?>   
	  <ul style='display:inline;'>
	   <?// ranking \\?>
		<li> 
		 <sup style='color:#777;font-weight:bold;letter-spacing:1.2px;font-size:16px;position:relateive;top:0;'>
								
	     <?// rank title \\?>		 
		  <?=$v?>
		 
		 </sup> 
		</li>
		
	  <?// ranking lvl icon \\?>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['0']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['1']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['2']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['3']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['4']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['5']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['6']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['7']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['8']?>' /></li>
		<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  id='<?=$lvlPic['9']?>' /></li>
	  </ul>
	 </td>
	<td colspan='15%'>
	
		<?// social icons \\?>
		<img src='css/pix/ico/google.png' width='30px' alt='Social_Networks' id="<?=echoIfIsset($google,'','hide')?>" /> 
		<img src='css/pix/ico/linkedin.png' width='30px' alt='Social_Networks' id="<?=echoIfIsset($linkedin,'','hide')?>" /> 
		<img src='css/pix/ico/facebook.png' width='30px' alt='Social_Networks' id="<?=echoIfIsset($facebook,'','hide')?>" /> 	  
		<img src='css/pix/ico/tumblr.png' width='30px' alt='Social_Networks' id="<?=echoIfIsset($tumblr,'','hide')?>" /> 	  
		<img src='css/pix/ico/twitter.png' width='30px' alt='Social_Networks' id="<?=echoIfIsset($twitter,'','hide')?>" /> 	  
		<img src='css/pix/ico/youtube.png' width='30px' alt='Social_Networks' id="<?=echoIfIsset($youtube,'','hide')?>" /> 	  
	   
   </td>
  <td colspan='' >
		
  <?// contact member & profile icon btns \\?>	

	<div id='last_icons'>
																			
	 <a href='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('p')."=".$row['id']?>&memMsg#msgMemBtn' target='_self' type='button' class='btn btn-link msgBtn' alt='Send Message' title='Send Message' id="<?=switchIfLoggedIn("", "hide")?>">
	  <img src='css/pix/ico/icon_contact.png' width='35px' alt='Message' />
	 </a>	
	</td>
	<td>
	
	 <?//// icon indicate if profile private 2 members \\\?>
	 <?//// or if make a friend_suscribe system and use icon as add btn \\\?>
	  
	  <img src="css/pix/ico/<?=IfIssetAndEqualValue($privacy,'0','icon_profile_priv.gif','icon_team.gif')?>" class='pull-right' width='35px' alt='Private or Open to Public' title='Private or Open to Public' id='' style='border: 1px solid rgba(255, 255, 255, 0.43);background-color: rgba(80, 174, 255, 0.21);margin-right:5px;cursor:none;' />
	
	</div>
	<?php ///show more membrs in mem_list
	global $cnt;
 	if(isset($_GET[md5('first')]) && $cnt < '19'){
		$showBtn = NULL;
	}elseif(isset($_GET[md5('second')]) && $cnt < '39'){
		$showBtn = NULL;
	}elseif(isset($_GET[md5('third')]) && $cnt < '99'){
		$showBtn = NULL;
	}else{ 
		if($cnt < '18'){
			$showBtn = NULL;
		}
	}
	global $showBtn;
	?>
  </td>
 </tr>				
<?php									
		} // END OF WHILE LOOP
  }else{						
		include("incl/mem_row.php");
		include("incl/mem_row.php");
		include("incl/mem_row.php");

  }
  global $more_btn;
?>

	   <?// pagination \\?>
		 <tr>
		  <th align='center' colspan='100%'>
		   <div class='text-primary text-center bg-info' >
		    <?////// SHOW MORE BUTTON FOR MEM LSIT \\\\\\\\?>
			<span class="<?=echoIfIsset($showBtn,'well well-sm bg-primary center-block','hide')?>" >
			 <a href="<?=ifGetIssetEcho($more_btn,$more_btn,'?'.md5('first').'')?>#mem_list" target='_self'>
			  <button class='btn btn-warning btn-lg'>
			  More Members
			  </button>
			 </a>
			</span>		    
			<br>
				&nbsp;
			  <?//PAGINATION GOES HERE//?>
 		   </div>		  
		  </th>
		 </tr>
		</table>
	</div> 
	
 
<!--------/ END OF MEMBERS LIST VIEW TABLE \----------------->		
<!--------/ END OF MEMBERS LIST VIEW TABLE \----------------->				
<!--------/ END OF MEMBERS LIST VIEW TABLE \----------------->				
		
	

<?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?><?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?>
<?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?><?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?>
<?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?><?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?>
<?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?><?//MEM_PROFILE\\?> <?//MEM_PROFILE\\?>

<section id='<?=hideElementOnProfView("hide")?>'>
 
 <table cellspacing='1' cellpadding='1' id='tbl_ProfBrd' class='table table-responsive table-condensed' width='95%' cols='2' style='text-align:justify;text-indent:5px;'>	 
  <tbody style='box-shadow:0px 3px 5px #666;' id='trgt1'> 
   <tr align='center' >
    <th align='center' colspan='100%' style='border-top:2px solid rgba(255,255,255,0.3);'>

<?php	// PULL MEM_INFO FROM DB 4 PROFILE ---\
 if(isset($_GET[md5('p')]) && !empty($_GET[md5('p')])){
	$prof_id = $_GET[md5('p')];
	$prof_qry = "SELECT `mem_username`,
						`mem_votes`,
						`mem_avatar`,
						`mem_fav_game`,
						`mem_fav_music`,
						`mem_fav_sport`,
						`mem_phone`,
						`mem_description`,
						`mem_about`,
						`mem_facebook`,
						`mem_tumblr`,
						`mem_twitter`,
						`mem_reddit`,
						`mem_youtube`,
						`mem_linkedin`,
						`date_joined`,
						`mem_avatar_caption`,
						`mem_private`, 
						`mem_email`, 
						`mem_google`, 
						`last_login` 
					FROM `members`
					WHERE `id` = '$prof_id' 
					ORDER BY `id` ASC
					LIMIT 1";
	$prof_rslt = mysqli_query($dbCon, $prof_qry) or die(mysqli_error($dbCon));  	
	////////////////////////////////////	 			
	 if(mysqli_num_rows($prof_rslt) > '0'){														
	   while($prof_row = mysqli_fetch_array($prof_rslt)){
		 $prof_name = $prof_row['0'];											
 		 $prof_avcap = $prof_row['16'];
 		 $prof_game = $prof_row['3'];
		 $prof_music = $prof_row['4'];
		 $prof_sport = $prof_row['5'];
  		 $prof_private = $prof_row['17'];			
 		 $prof_about =  $prof_row['8'];	
		 $prof_avatar = $prof_row['2'];
		 $prof_desc = $prof_row['7'];
		 $prof_about = $prof_row['8'];
		 $prof_phone = $prof_row['6'];
		 $prof_facebook = $prof_row['9'];
		 $prof_tumblr = $prof_row['10'];
		 $prof_twitter = $prof_row['11'];
		 $prof_reddit = $prof_row['12'];
		 $prof_youtube = $prof_row['13'];
		 $prof_linkedin = $prof_row['14'];
		 $prof_private = $prof_row['17'];
		 $prof_email = $prof_row['18'];
		 $prof_google = $prof_row['19'];
		if(!empty($prof_row['20'])){
		 $prof_last_login = explode('-',$prof_row['20']);	
		 $prof_last_login = $prof_last_login[1].'-'.$prof_last_login[2].'-'.$prof_last_login[0];	
		}else{
		 $prof_last_login = date('Y')-1;	
		}	
			}
	if(!empty($prof_avatar) || !strstr($prof_avatar,'css')){

					$prof_avatar = "upl/".$prof_avatar;
				}  			
				
			}else{
				$_GET[md5('p')] = NULL;
			}
			
			global $prof_id;			 
	///////////////////////////////////////////////////////////////////////	
				if(isset($prof_linkedin) && strlen($prof_linkedin) > '5'){
					$prof_linkedin = strtolower($prof_linkedin);
				}else{
					$prof_linkedin = NULL;
				}
				if(isset($prof_facebook) && strlen($prof_facebook) > '5'){
					$prof_facebook = strtolower($prof_facebook);
				}else{
					$prof_facebook = NULL;
				}
				if(isset($prof_tumblr) && strlen($prof_tumblr) > '5'){
					$prof_tumblr = strtolower($prof_tumblr);
				}else{
					$prof_tumblr = NULL;
				}
				if(isset($prof_twitter) && strlen($prof_twitter) > '5'){
					$prof_twitter = strtolower($prof_twitter);
				}else{
					$prof_twitter = NULL;
				}
				if(isset($prof_youtube) && strlen($prof_youtube) > '5'){
					$prof_youtube = strtolower($prof_youtube);
				}else{
					$prof_youtube = NULL;
				}
				if(isset($prof_google) && strlen($prof_google) > '5'){
					$prof_google = strtolower($prof_google);
				}else{
					$prof_google = NULL;					
				}
				if(isset($prof_reddit) && strlen($prof_reddit) > '5'){
					$prof_reddit = strtolower($prof_reddit);
				}else{
					$prof_reddit = NULL;					
				}
	//////////////////////////////////////		
 	
			global $prof_id;
	} 

  //// END OF if md5(p) set else...
 
?>
		<span style='max-width:55%;margin-top:10px;box-shadow:0px 4px 8px #333;background-color:rgba(25, 25, 25, 0.77);text-shadow:1px 3px 5px rgba(0,0,0,0.1);letter-spacing: 2px;font-size:35px;font-weight:bold;color:rgba(255,255,255,0.65);' class='well text-center center-block' > 
		  <?=ucfirst($prof_name)?>'s Profile
		</span>
	   </th>			
	  </tr>
   
	<?/////MEMBER_PROFILE_VIEW//////?>
	<?/////MEMBER_PROFILE_VIEW//////?>
	 <tr>
	  <td  align='center' colspan='100%'>
	   <hr />
	   <br>
	 </td>
	</tr>
 	<?///- PROFILE_VIEW_SECTION ////?>	<?///- PROFILE_VIEW_SECTION ////?>
 	<?///- PROFILE_VIEW_SECTION ////?>	<?///- PROFILE_VIEW_SECTION ////?>
 	<?///- PROFILE_VIEW_SECTION ////?>	<?///- PROFILE_VIEW_SECTION ////?>
		
<?/// PROFILE PHOTO / AVATAR //?>
	<tr>
	 <td colspan='5%'>
	  &nbsp;
	 </td>
	 <td colspan='10%' style='border-bottom:24px solid transparent;padding-left:10px;background-color:rgba(0,0,0,0.33);border-radius:10px 0 0 10px;display:block;'>
	  <sup class='text-center lead' style='padding:3px 0;color:#ccc;margin-left:3%;max-width:35%;background-color:rgba(0,0,0,0.4);border-radius:5px;'>
	    
		<b class='text-center' style='padding:0 5px;background:rgba(255,255,255,0.2);border-radius:5px;'><?=ucfirst($prof_name)?></b>
	  
	  </sup>
	   <br>
	    <?// profile default pic / avatar //?>
	    <?// profile default pic / avatar //?>
	    <?// profile default pic / avatar //?>
	     <div class='prof_dfalt_pic' >
	    <?// profile default pic / avatar //?>
	    <?// profile default pic / avatar //?>
	    <?// profile default pic / avatar //?>
		
		  <img src='<?=$prof_avatar?>' class='img-rounded img-responsive' alt='Avatar Photo' title='Avatar' width='' style='border-radius:15px;' />
 	
		  <span class='well well-lg center-block text-center' style='margin-top:10px;max-width:320px;max-height:85px;line-height:normal;display:inline-block;position:relative;margin-left:10px;padding:4px 5px;background-color:rgba(0,0,0,0.6);'>
		   
		   <?=$prof_avcap?>
		  
		  </span>
		 </div>
		</td>  
		<td style='border-bottom:24px solid transparent;background-color:rgba(0,0,0,0.33);padding-right:10px;'>
		&nbsp;
		</td>
	  <td colspan='70%' align='center' style='border-bottom:24px solid transparent;background-color:rgba(0,0,0,0.33);border-radius:0 10px 10px 0;padding-right:10px;'>  
		<div id='mem_gallery' >
		   <ul style=''>
		    <?// MEM PHOTO GALLERY //?>
		    <?// MEM PHOTO GALLERY //?>
			 <?php
			$qry = " SELECT `member`,
							`photos`,
							`captions`
					FROM `photos`
					WHERE `member` = '$prof_name'
					ORDER BY `mem_id` ASC 
					LIMIT 5";
			$rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
		     if(mysqli_num_rows($rslt) > '0'){
				/////// MEMBERS PHOTOS \\\\\\\\\\										
				 while($photos = mysqli_fetch_assoc($rslt)){	
				  $photo = $photos['photos'] ;
 				  ///USE URLDECODE OR JS WONT RECOGNIZE \\\\\\\
?>											<!------>
<li style='display:block;margin-left:0;'>
 <div>																		
  <a href='upl/<?=$photo?>' type='button' class='btn  btn-lg' target='_BLANK' onmouseover='this.getElementsByTagName("img")[0].style.clear="both";this.getElementsByTagName("img")[0].setAttribute("width","300px");this.getElementsByTagName("img")[0].setAttribute("class","img-rounded pull-left");this.style.marginRight="20%";this.getElementsByTagName("img")[0].style.minWidth="400px";this.getElementsByTagName("img")[0].style.maxHeight="400px";this.style.cursor="pointer";' onMouseout='this.getElementsByTagName("img")[0].removeAttribute("width");this.getElementsByTagName("img")[0].setAttribute("class","img-rounded img-responsive");this.style.marginRight="auto";this.getElementsByTagName("img")[0].style.minWidth="auto";this.getElementsByTagName("img")[0].style.maxHeight="120px";this.style.cursor="auto";' >							  									
																			
	<img src='upl/<?=$photo?>' alt='Photos' class='img-rounded' width='190px'  onMouseOver="this.style.cursor='pointer'" />
															
  </a>	
 </div>  
	<span class='<?=echoIfIsset($photos['captions'],'well well-lg text-center','hide')?>' style='min-height:45px;margin:auto auto auto 50%;border:5px solid rgba(255,255,255,0.31);padding:10px 5px 10px 5px;position:relative;top:-70px' >
		<strong style='padding:8px 10px;'>									
		 <?=$photos['captions']?>					
		</strong>	
 		
	</span>									
		 						
 </li>										
<?php	 	}	/// END OF WHLE LOOP								
		}else{											
		  echo "<li><img src='css/pix/ico/ren1.jpg' alt='Photos' class='img-rounded' width=' ' /></li>";
		  echo "<li><img src='css/pix/ico/ren2.jpg' alt='Photos' class='img-rounded' width=' ' /></li>";
		  echo "<li><img src='css/pix/ico/ren3.jpg' alt='Photos' class='img-rounded' width=' ' /></li>";
		  echo "<li><img src='css/pix/ico/ren4.jpg' alt='Photos' class='img-rounded' width=' ' /></li>";
		  echo "<li><img src='css/pix/ico/ren5.jpg' alt='Photos' class='img-rounded' width=' ' /></li>";				
		}									
		 ?>
	   </ul>
	  </div> 
	 <?// END OF MEM_GALLERY \\?>
		  
	 </td>
	 <td colspan='5%'>
	  &nbsp;
	  </td>		 
	 </tr>
		<?//////YO BOI BRANDON IS OFFICIALLY A PROGRAMMER 02-27-2016//////?>
		 <tr>		<?//////YO BOI BRANDON IS OFFICIALLY A PROGRAMMER 02-27-2016//////?>
		 <tr>
		 <td colspan='100%' >
 		   <p align='center' valign='center' >
			<h3>
			 <b style='border-bottom:1px dotted #333;color:#ddd;'>
			  About <?=ucfirst($prof_name)?>
			 </b>
			</h3>
			 <article style='text-align:left;font-size:20px;color:#ccc;text-indent:13px;padding:5px 10px;background-color:rgba(0,0,0,0.2);border-radius:10px 10px;'>
				<?=$prof_about?>
			 </article>
		   </p>
		 </td>
		</tr>	
		 <tr>
		 <td colspan='100%' style='background-color:rgba(0,0,0,0.1);border-radius:10px 10px 0 0;box-shadow:inset 0px 3px 5px #555;'>
 		   <p align='center' valign='center' >
			<h3>
			 <b style='border-bottom:1px dotted #333;color:#ccc;'>
			   <?=ucfirst($prof_name)."'s"?> Hobbies
			  </b>
			 </h3>
			  <ul style='background-color: rgba(0,0,0,0.45);padding:10px 5px;border-radius:10px 10px;'>
			   <li style='color:#eee;font-size:18px;'><br>
				<strong>My Favorite Game:</strong>
				  	 <?=ucfirst($prof_game)?> 
			   </li>
			   <li style='color:#eee;font-size:18px;'><br>
				<strong>My Favorite Music:</strong>
				  	 <?=ucfirst($prof_music)?> 
			   </li>
			   <li style='color:#eee;font-size:18px;'><br>
				<strong>My Favorite Sports:</strong>
				  	 <?=ucfirst($prof_sport)?> 
			   </li>
			   <li style='color:#eee;font-size:18px;'><br>
				<strong>Email Me:</strong>
				  	 <?=$prof_email?>&nbsp;&nbsp;&nbsp;
				<strong>or Call: </strong>	 
					 <?=$prof_phone?> 
			   </li>
			   <li style='color:#eee;font-size:18px;'><br>
				<strong>Brief Description:</strong>
 				  	 <?=ucfirst($prof_desc)?> 
			   </li>
			  </ul>
		   </p>
		 </td>
		</tr>	 
		 <tr>
		 <td colspan='10%' align='left' style='box-shadow:inset 0px 3px 5px #555;background:rgba(255,255,255,0.28);'>
		  <span class='<?=switchIfLoggedIn("hide","well well-lg lead")?>' style='padding:1px 3px 5px 3px;'>Login to view more about me.</span>
		  <p class='<?=switchIfLoggedIn("","hide")?>' align='left' valign='center' style='float:left;' >
			<?// last online status ?>
			 <text align='right' style='display:inline;padding-right:0;margin-right:0;text-align:center;'>
			   <b style='color:#333;letter-spacing:2.1px;font-size:30px;margin:0 auto;text-align:center;'> 
				  Offline Since&nbsp;<?=$prof_last_login?> 
			   </b>
			 </text>		   
		  </p>
	     </td>
		 <td colspan='' style='box-shadow:inset 0px 3px 5px #555;background:rgba(255,255,255,0.28);'>
		  <p align='left' valign='top' style='min-width:80px;' >
			<sup style='color:#333;'>Member-Rank</sup> 
			 <?// vote lvl ?>
			 <br>
 			  <b style='color:#333;text-shadow:0px 2px 4px #aaa;letter-spacing:1.9px;font-size:23px;text-align:left;'> 
				
				   <?php
				   // ranking lvl icon \\ 
				$q = "SELECT `mem_votes` FROM `members` WHERE `id` LIKE '{$_GET[md5('p')]}'";
				$r = mysqli_query($dbCon,$q) or die("couldnt pull votes");
				while($rw = mysqli_fetch_assoc($r)){
					$lvlPic = array("hide","hide","hide","hide","hide","hide","hide","hide","hide",);
					$v = 'nOob';
					 switch($v){
						case $rw['mem_votes']>='20' && $rw['mem_votes']<'49': 
							$v = "Learner";
							$lvlPic = array("","hide","hide","hide","hide","hide","hide","hide","hide");						
							break;
						case $rw['mem_votes']>='50' && $rw['mem_votes']<'69': 
							$v = "Teacher";
							$lvlPic = array("","","hide","hide","hide","hide","hide","hide","hide");
							break;
						case $rw['mem_votes']>='70' && $rw['mem_votes']<'70': 
							$v = "Experienced";
							$lvlPic = array("","","","hide","hide","hide","hide","hide","hide");
							break;
						case $rw['mem_votes']>='100' && $rw['mem_votes']<'169': 
							$v = "Expert";
							$lvlPic = array("","","","","hide","hide","hide","hide","hide");
							break;
						case $rw['mem_votes']>='170' && $rw['mem_votes']<'299': 
							$v = "Master";
							$lvlPic = array("","","","","","hide","hide","hide","hide");
							break;
						case $rw['mem_votes']>='300' && $rw['mem_votes']<'399': 
							$v = "Merciless";
							$lvlPic = array("","","","","","","hide","hide","hide");
							break;
						case $rw['mem_votes']>='400' && $rw['mem_votes']<'499': 
							$v = "Brutal";
							$lvlPic = array("","","","","","","","hide","hide");
							break;	
						case $rw['mem_votes']>='500' && $rw['mem_votes']<'749': 
							$v = "Gladiator";
							$lvlPic = array("","","","","","","","","hide");
							break;	
						case $rw['mem_votes']>='750' && $rw['mem_votes']<'999': 
							$v = "- PRINCE -";
							$lvlPic = array("lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince","lvl_prince");
							break;		
						case $rw['mem_votes']>='1000' && $rw['mem_votes']<'1499': 
							$v = "- KING -";
							$lvlPic = array("lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king","lvl_king");
							break;			
						case $rw['mem_votes']>='1500': 
							$v = "- YO-BOSS -";
							$lvlPic = array("lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor","lvl_emperor");
							break;								
					default: $v = "Nooby";
					}///END OF RATING-LVL SWITCH				   
				  break;
			}
?>
			  <ul style='display:inline-block;min-width:130px;max-height:40px;padding:0 7px;'>
			   <?// ranking \\?>
				<li> 
				 <sup style='color:#333;font-weight:bold;letter-spacing:1.2px;font-size:16px;position:relative;top:0;'>
										
				 <?// rank title \\?>		 
				  <?=$v?>
				 
				 </sup> 
				</li>
		 
			  <?// ranking lvl icon \\?>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['0']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['1']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['2']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['3']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['4']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['5']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['6']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['7']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['8']?>' /></li>
				<li class='pull-left list-inline'><img src='css/pix/ico/icon_rate_good .png' width='20px'  title='Level Points' alt='Level'  id='<?=$lvlPic['9']?>' /></li>
			  </ul>

 		   </b>
 		  </p>		 
		 </td>
		 <td colspan='40%' style='box-shadow:inset 0px 3px 5px #555;background:rgba(255,255,255,0.28);'>
		  <p class='<?=switchIfLoggedIn("","hide")?>' align='left' valign='center' style='min-width:200px;width:95%;display:inline;float:left;clear:both;margin:0 15px;' >
		   <sup style='color:#333;'>My Social Links:</sup>
		    <br>
			 <?/// SOCIAL ICONS \\\?>
			 <?/// SOCIAL ICONS \\\?>
				<a href='<?=echoIfIsset($prof_linkedin,$prof_linkedin,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_linkedin,'','hide')?>"  >
				 <img src='css/pix/ico/linkedin.png' alt='Contact_Links' width='30px' /></a>
				<a href='<?=echoIfIsset($prof_google,$prof_google,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_google,'','hide')?>"  >
				  <img src='css/pix/ico/google.png' alt='Contact_Links' width='30px' /></a>
				<a href='<?=echoIfIsset($prof_tumblr,$prof_tumblr,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_tumblr,'','hide')?>"  >
				  <img src='css/pix/ico/tumblr.png' alt='Contact_Links' width='30px' /></a>
				<a href='<?=echoIfIsset($prof_twitter,$prof_twitter,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_twitter,'','hide')?>"  >
				  <img src='css/pix/ico/twitter.png' alt='Contact_Links' width='30px' /></a>
				<a href='<?=echoIfIsset($prof_facebook,$prof_facebook,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_facebook,'','hide')?>"  >
				  <img src='css/pix/ico/facebook.png' alt='Contact_Links' width='30px' /></a>
				<a href='<?=echoIfIsset($prof_reddit,$prof_reddit,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_reddit,'','hide')?>"  >
				  <img src='css/pix/ico/reddit.png' alt='Contact_Links' width='30px' /></a>
				<a href='<?=echoIfIsset($prof_youtube,$prof_youtube,'')?>' target='_self'alt='My Socials' title='Find Me Here' id="<?=echoIfIsset($prof_youtube,'','hide')?>"  >
				  <img src='css/pix/ico/youtube.png' alt='Contact_Links' width='30px' /></a>
			  </p>
	     </td>
		 <td colspan='20%' style='background-color:rgba(255,255,255,0.22);'>
		  <?// message me icon link \?>
		   <p align='right' >
		    <button type='button' class='<?=switchIfLoggedIn('hide','btn btn-link')?>'  <?=switchIfLoggedIn('','disabled')?>>
		     <center class=''><img src='css/pix/ico/icon_contact.png' alt='Message Me' width='50px'  /></center>
			</button>
			<center class='<?=switchIfLoggedIn("","hide")?>'>
			 <sup style='color:#999;'>Send PM:</sup>
			  <br>
			   <a href='#memMessage' type='button' class='btn' id='msgMemBtn' target='_self' data-toggle='collapse' data-target='#memMessage' >
			    <img src='css/pix/ico/icon_contact.png' alt='Message Me' width='40px' /> 
			   </a>
			</center>
		   </p>
		  <br>
 	     </td>
	   </tr>	 
	</tbody>
  </table>
  <?// form section message \?>
  <?// form section message\?>
  <section class='<?=showElementIfRequest("collapse in","collapse","memMsg")?>' id='memMessage' >
   <span class='well well-sm center-block lead ' >
	 Send a Message
	<form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('p')."=".$prof_id."&".md5('msg')."#trgt1"?>' method='POST' class='form-group center-block' >
		 <textarea maxlength='500' name='msg' placeholder='Enter Message here' class='input input-lg form-control' required></textarea>						
		  <input type='hidden' name='sndrId' value='<?=$prof_id?>' />
		  <input type='hidden' name='receiver' id='prof_name' value='<?=$prof_name?>' />
			<input type='submit' name='' value='Post' class='btn btn-success input-sm' />
			<input type='reset' name='' value='Clear' class='btn btn-warning input-sm' />
	</form>
   </span>
  </section>
  
    <style>
			#nputBtn > input{
				float:left;
 				width:15em;
     			}
			div#nputBtn{
			 opacity:.3;
			 transition: linear .2s;
 				}
		    .nputForm:hover > div#nputBtn{
			 opacity:1;	 
				}
		</style>
	

 <div id='while'>
 
 <?// mem-comments \\?>
 <?// mem-comments \\?>
<table rows='' width=' ' cellpadding='0' cellspacing='1' class='table table-responsive table-hover	' id='wallTbl'>
 <?php if(isset($_GET[md5('p')])){
		$pId = $_GET[md5('p')];
		}else{
			$pId = NULL;
		}
  ?>
 <tr>	
 <noscript>
  <form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('p')."=".$pId."#wallTbl"?>' class='form-horizontal' method='POST' width='100%'  >
</noscript> 
  <form>
   <td colspan='100%' rowspan=''>  
	<br>
	<?//// USE ANGULARjs HERE ////////// USE ANGULARjs HERE ////\\?>
	<?//// USE ANGULARjs HERE ////////// USE ANGULARjs HERE ////\\?>
	<?//// USE ANGULARjs HERE ////////// USE ANGULARjs HERE ////\\?>
 
	<div style='border-radius:15px 15px;padding:5px 5px;border:5px double #999;'>
     <div class='<?=switchIfLoggedIn("nputForm","hide")?>' >
      <center style='background-color:rgba(255,255,255,0.1);'>	 
	   <h2 class='center-block text-center' style='margin-bottom:0;width:99%;background-color:rgba(255,255,255,0.1);border-radius:10px 10px 0 0;font-size:22px;text-shadow:0px 3px 4px rgba(255,255,255,0.6);letter-spacing:2px;'>Profile Board</h2>
	  
	<?// WALL POST INPUT SECTION \\?>
 		 <label for='prof_wall' style='width:99%;color:rgba(255,255,255,0.25);background-color:rgba(255,255,255,0.1);' class='text-muted'>
		  Post Comment Below
		 </label>
			 
		  <textarea maxlength='500' class='form-control' id='prof_post' name='prof_wall' title='Enter Your Post' size='300' rows='6' cols='100%' placeholder='Post Comment for this member' ></textarea>	
		   
	   </center>
		 
		  <div id='nputBtn' style='min-width:200px;float:right;clear:both;display:inline-block;margin-top:5px;margin-bottom:5px;background-color:rgba(255,255,255,0.1);'> 
			 <noscript>
				<input type='submit' class='form-inline btn btn-info btn-sm ' name='sbt' value='Submit' />
			 </noscript>
			 
			<input onclick='profPosted()' type='button' value='Submit' class='form-inline btn btn-info btn-sm' />
			<input type='reset' class='form-inline btn btn-warning btn-sm  pull-right' value='Clear' placeholder=''   />  
		  
		  </div>  	  
 		</div>
	   </div>	
	  </td>	
	</form>
  </tr>

 <?php // GET POSTS AND SHOW \\ 
global $tbl;
   $tblrslt = mysqli_query($dbCon,"SHOW TABLES LIKE '$tbl'");

if(mysqli_num_rows($tblrslt) == 0){
	echo "<tr><td><span class='well well-lg center-block text-center lead'>No Comments Started</span></td></tr>";

}else{	 
  $tbrslt = mysqli_query($dbCon,"SHOW TABLES LIKE '"._PROF_WALL_."'");
if(empty( _PROF_WALL_ ) || mysqli_num_rows($tbrslt) == 0){
		
	echo "<tr><td><span class='well well-lg center-block text-center lead'>No Comments Started</span></td></tr>";

}else{
if(_PROF_WALL_){
	$wall = _PROF_WALL_ ;
}
?>

<?//// OUTPUT SECTION \\\\?>
<?//// OUTPUT SECTION \\\\?>
<?php	
 
////////////////////////////
 /////////////////////////////////////
$Q = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `$wall`"));
/////////////////////////////////////
if($Q !== 0){
	$r = mysqli_query($dbCon,"SELECT * FROM `$wall`") or die(mysqli_error($dbCon));								 
	$rowCnt = mysqli_num_rows($r);
		$rows = $rowCnt; //max rows
		$diviser = $rowCnt / 10; //each pg = max rows divided by '5', '5' = limit
		$rowCnt = ceil($diviser); ///round up everything lol	
///////////////////////////////	
    if($rows > 10){					
		$offset = '0';				
		if(isset($_REQUEST['page'])){
			$p = intval($_REQUEST['page'], 0);
			$offset = 10 * $p; // limit end 'offset'	
		}
	}else{
		$p = 0;
		$offset = 0;
		}
}else{
	$offset = 0;
} 			
//////////////////////		
 $qry = "SELECT DISTINCT
			`id`,
			`profile_comment`,
			`profile_commentor`,
			`profile_comment_date`,
			`reply_set`
		FROM `$wall`
		ORDER BY `id` DESC
		LIMIT 10 OFFSET ".$offset;
 $rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
  if(mysqli_num_rows($rslt) > '0'){
	while($pp = mysqli_fetch_assoc($rslt)){
		$usrn = $pp['profile_commentor'];
		 if(!empty($avatar = get_memsAvatr($usrn))){
			 $avatar = "upl/".$avatar;
		 }else{
			 $avatar = "css/pix/Brandon2.jpg";
		 }
	  ?>
	 <tr> 
	  <td align='center' rowspan='1' colspan='100%' > 
 		 <center><?=$pp['profile_comment_date']?></center> 
 	 	<hr /> 
		 
	 <?// posted by... \\?> 
	  <h3 class='lead text-left'>
	  Posted By:
	   <strong><?=$pp['profile_commentor']?></strong>
	  </h3>
	  
	  <?// poster prof-pic \\?>
	  <a href="<?=htmlspecialchars($_SERVER['PHP_SELF'])."?".md5('p')."=".getMemIdByMemName($pp['profile_commentor'])."#mem_list_xpand"?>" target="_self" style='border:5px solid transparent;padding:4px;' class='pull-left'>
	   <img src='<?=$avatar?>' width='50px'  alt='Member' style='vertical-align:center;float:left;border:3px solid #555;' />
	  </a>
	  
		<?// wall post //??>
		<p align='left' class='text-left text-primary'>
		 <?=$pp['profile_comment']?>
		</p>
		
	  </td>
     </tr>
	<?php
	}
  }else{
	echo "<tr><td><span class='well well-lg center-block text-center lead'>No Comments</span></td></tr>";
	}
   }
?>
  </table>
  
<div class='text-primary text-center bg-success' >
<?php
//////////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_///////////////////
$rowCnt = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `"._PROF_WALL_."`"));
$rowCnt = ceil($rowCnt / 10);
	if($rowCnt !== 0){
		print("<span class='well well-sm center-block text-center' style='max-width:100%'>");		
	  if(empty($p)){
		  $p = 0;
	  }
 		for($i = 0; $i < $rowCnt; $i++){
		  $pgNumShown = $i + 1;
			$btn = "<button type='button' class='btn btn-sm btn-link' onclick='go2pg($i)' ";
		  if(isset($p) && $i == $p){
		  	$btn .= " disabled ";
		  }
			$btn .= " >".$pgNumShown."</button>";
						
				echo $btn;
		}
		print("</span>");
	}				
}	//END if(wall)			
?>
<?//END paginatino \\\?>
</div>

<?/// END #while //?>
</div>


</section> 
	<?// end of tableMain //\?><?// end of tableMain //\?>
	<?// end of tableMain //\?><?// end of tableMain //\?>
	<?// end of tableMain //\?><?// end of tableMain //\?>
	</DIV>
 			
		<section class='empty-0'>
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
	   <div class='center-block' style='width:90%; background-color:rgba(0,0,0,0.13);border-bottom:8px solid #888;border-radius:7px 7px 12px 12px;'>
	    <p align='center'>
		  <span class='<?=switchIfLoggedIn('hide','well well-sm center-block text-center')?>' style='width:60%;padding:10px 0;'>
		   <small class='lead'>
			Must Login To View Private Profiles
		   </small>
		  </span>
		 <br>
		  <center style='color:#777;font-weight:bold;'>
		   - B S -
		  </center>
		</p>
	   </div>
	  <br>	 	
	</div>
	
<?// END OF MAINWRAPPER \\?>
<?// END OF MAINWRAPPER \\?>
	
  
<?//██████████████████████████████████████████████████████████████████████████
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 			
////////////////██████████//█████████/////////////////////			
///////////////////██////██//////////////////////////			
///////////////////██//////████///////////////////////			
///////////////////██ ////////██//////////////////////			
////////////////██████////████████//////////////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████████████████████████████
////////////////////////////////////////////////\\?>

<script>
	function opnWin(pic){
		window.open("/upl/" + pic, "");
	}
</script>
 <script>

   function showList(){
	   var memList = document.getElementById('mem_list');
	   var memListBtn = document.getElementById('yolo');
	   
	   var togl = memList.style.display != 'none';
	   var toglBtn = memListBtn.innerHTML != 'View Members List';
	  
	  memList.style.display = togl ? 'none' : 'block';
	  memListBtn.innerHTML = toglBtn ? 'View Members List' : 'Hide Members List';
   }
  </script>
  <script src="js/jquery-1.11.3.min.js"></script>
 
<script>
///////////profPost////////////
////////////////////////////////////////////////////
////////////////////////////////////////////////////
function profPosted(){
var prof_name = document.getElementById("prof_name");
var prof_post = document.getElementById("prof_post").value;
 
$(document).ready(function(){
 
 prof_name = prof_name.value.trim();
 	if(prof_post.lastIndexOf('') > 1){	

		$.post('incl/profPost.php', {prof_post:prof_post,prof_name:prof_name}, function(resp){

			$('#while').html(resp)		
		})		
 		
	}else if(prof_post.trim() == 0){
		alert("Please enter a comment");
		}
	})
} 
 ////////////WALL PAGINATION\\\\\\\\\\\\

function go2pg(p){

$(document).ready(function(){

 var pName = document.getElementById("prof_name").value;
 
	$.post('incl/profPost.php', {pages:p,pName:pName}, function(rLt){

	$('#while').html(rLt);
		  
		})
	})
}
	
</script>
<script src="js/meReg.js"></script>  
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

   </BODY>
</HTML>