<!DOCTYPE html> 
<HTML lang='en-US'>
 <HEAD>
  <?php require("ses.php"); ?>
  <?php	require("incl/fn.php"); ?>
 
  <?//-SEO-\\\//-SEO-\\\//-SEO-\\\?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html" />
	<meta http-equiv="content-type" content="cache" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="BrandonOsuji" />	
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="keywords" content="" />
	<meta name="description" content="" /> 

	<?php 
	 DEFINE('HOME_PG',"\bs_exposed/") ;
	 DEFINE('MUSIC_PG',"\bs_exposed/members") ;
	 DEFINE('VIDEOS_PG', "\bs_exposed/videos") ;
	 DEFINE('DT', "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta porttitor magna. Nunc urna. Vestibulum augue. Maecenas ipsum elit, rutrum id, iaculis ac, dictum ac, eros. Phasellus elit. Vestibulum semper cursus risus. Nunc consectetuer malesuada pede. Etiam ante.");
	 ?>		
			 
<?php 	 
////////////////////////////////////////////
/// get video name that user is commentng on via get[video_id]  
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}

  if(isset($_GET[md5('video_id')])){
       $v_id = $_GET[md5('video_id')];
        $chk_qry = "SELECT `video_title`
                    FROM `videos`
                    WHERE `id` = '$v_id'";  
        $chk_rslt = mysqli_query($dbCon, $chk_qry) or die(mysqli_error($dbCon));
            while($vName = mysqli_fetch_row($chk_rslt)){
             $tblName = $vName['0']; //// video name from _GET prior to cmt_submit
			 define("TBL",$tblName);
			 
                break;
                }
            }else{
                if(isset($_POST['v_id'])){
					$vid_id = $_POST['v_id'];
				}else{
					$vid_id = NULL;
				}	
            }  ////////////////////////////////////////////		
/// insert vid comment info to db  
  if(isset($_POST['vid_cmt_sent'])){		
	$tbl_name = "video_".$_POST['vid_name']; //// table name + video name post cmt_submit	
	$date2day = date("Y-m-d");	
								
	 $qry = "INSERT INTO `$tbl_name`(
				`video_name`,
				`video_comment_member`,
				`video_comment`,
				`video_comment_date`) 
			VALUES (
			'{$_POST['vid_name']}',
			'{$username}',
			'{$_POST['vid_post']}',
			'$date2day')";								
		$rslt = mysqli_query($dbCon, $qry)or die(mysqli_error($dbCon));
		} ///END of if( user clicked submit)	
	if(isset($tblName)){
		define('VID_NAME', $tblName);
	}else{
 		if(isset($_POST['vid_name'])){
			define('VID_NAME', $_POST['vid_name']);
		}else{
			define('VID_NAME', NULL);
		}		
	}
?>
	
  <TITLE> 
    Title
  </TITLE>
  
  <!--- CSS CSS CSS BITTTCHH!!!!!! ---->
  <link rel='icon' href='css/pix/icon.ico' />
   <link rel='stylesheet' type='text/css' href='css/vid-css.css' />
   <link rel='stylesheet' type='text/css' href='css/nav_style.css' />
   <link rel='stylesheet' type='text/css' href='css/main_style.css' />
   <link rel='stylesheet' type='text/css' href='css/custom.css' />
   <link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
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
 <?php require("incl/login.php"); ?>
 
<?/// HEADER 'contains nav data' \\\?>
 <?php require("hdr.php"); ?>
 
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

			  <?/// BREADCRUMBS \\\?>				
			  <ol class='breadcrumb'>
				<li><a href='index.php'>Home</a></li>
				<li><a href='videos.php'>Videos</a></li>
				<li class='active'>View</li>
			  </ol>			
			
			 <br>
			</div>
		   </div>
		  </div>
		 </div>
		</section>
		
	<?/// TABLE containing video content for viewer \\\?>			
	<?/// TABLE containing video content for viewer \\\?>			
	<?/// TABLE containing video content for viewer \\\?>			
	   <div id='vidViewTbl' style='background-color: rgba(52, 52, 52, 0.49);border-radius: 15px;border:8px solid #777;' >
		<table id='tblCenter' class='table table-condensed' cellspacing='0' cellpadding='1' width='95%'  cols='2' >
		 <tr align='center'>
		  <td colspan='100%'> 
		   <hr/>
		  </td>	
		 </tr>
		 <tr>
		  <th align='center' class='bg-555' colspan='100%' style='border-radius:15px;'>
		   <h1> 
			<center class='lead' style='font-weight:bold;box-shadow:inset 0px 3px 7px rgba(0,0,0,0.6);font-size:55px; text-shadow: 1px 3px 5px #666; font-family: Aparajita, Verdana; letter-spacing: 2px;' > 
			    <?=echoVidField('video_title')?> 
			</h1>
		   </center>
		  </th>			
		 </tr>
		 <tr>	
		  <td colspan='100%' style=''>  
		   <hr/>
		  </td>	
		 </tr>		 
 		<tr>			 
		 <td colspan='100%' id='trgt3' style="text-align:justify;background-color: rgba(52, 52, 52, 0.49);border-radius:15px;border:4px solid transparent;box-shadow:0px 3px 5px #333;"> 
		  <?// VIDEO PLAYER OF VIDEO \\?>
 		   <p align='center'>
			<center><br>
			<?php
			function getRplyIdd($r){
		global $dbCon;
		global $cmtReplyTbl;
		global $cmtId;
		 $qr = "SELECT `id` 
				FROM `$cmtReplyTbl`
				WHERE `id`
				LIKE '$r'";
	 $rz = mysqli_query($dbCon,$qr) or print(strtoupper(mysqli_error($dbCon)));
			 while($rowss = mysqli_fetch_assoc($rz)){
				 $iD = $rowss['id'];
			   break;
			 }
			return $iD;
	 }	
	///////CHECK IF VID SRC = EMBED/IFRAME OR URL SRC////////////
	///////CHECK IF VID SRC = EM			$('#cmtDiv').load('incl/vidRplyProc.php');
 	if(isset($_GET[md5("video_id")]) && !empty($_GET[md5("video_id")])){
		$vidid = $_GET[md5("video_id")];
		$qry = "SELECT `video_src`
				FROM `videos`
				WHERE `id` = '{$vidid}'
				LIMIT 1";
	 $rc = mysqli_query($dbCon, $qry) or die("Could not find video_src in db ".mysqli_error($dbCon)); 
	 
        while($s = mysqli_fetch_assoc($rc)){  
			$s['video_src'] = trim($s['video_src']);
				break;
		 }
		 if(stristr($s['video_src'],"iframe")
		  || stristr($s['video_src'],"<embed")){
			
			?>
			<div class='well' style='min-width:800px; min-height:550px;'>
				<?=urldecode($s['video_src'])?>
			</div>
			<?php
 		  
		 }else{		
			?>
			 <video width='95%' height='500' poster='css/pix/148385.jpg'  src='<?=getVidSrcNoExt()?> autoplay='false' allowfullscreen='true' controls='true' loop='false' preload='true' play='1' style='background:#000;overflow:none;border-radius:10px 10px 0 0;'	>
			  <source src='<?=getVidSrcNoExt()?>.wmv' type='video/wmv'></source>
			  <source src='<?=getVidSrcNoExt()?>.mp4' type='video/mp4'></source>
			  <source src='<?=getVidSrcNoExt()?>.mpeg4' type='video/mpeg4'></source>
			  <source src='<?=getVidSrcNoExt()?>.ogg' type='video/ogg'></source>
			  <source src='<?=getVidSrcNoExt()?>.avi' type='video/avi'></source>
			  This player doesn't support this format
			 </video>
			<?php
					 }
				}else{
			?>
			 <video width='95%' height='500' src='<?=getVidSrcNoExt()?>' poster='css/pix/148385.jpg' autoplay='false' allowfullscreen='true' controls='true' loop='false' preload='true' play='1' style='background:#000;overflow:none;border-radius:10px 10px 0 0;'	>
			 </video>
			<?php
				}		
			?>
			<br>
		   </center>
		 </p>
		</td>
	   </tr>
	   <tr> 
	    <?// VIDEO STATS BOTTOM \\?>
		<td align='center' style='background-color: rgba(255,255,255,0.1);'>
		<?// rating icons \\?><?// rating icons \\?><?// rating icons \\?>
		<?php      
		if(isset($_GET[md5('video_id')])){
		  $vId = $_GET[md5('video_id')]; 
			global $vId;
			}else{
				$vId = NULL;
			}
		?>													

	<?=showR8IconsFor('videos','video_vote', $vId,'')?>	
	 <ul style='width:65%;margin:0 auto;border:5px solid rgba(0,0,0,0.2);box-shadow:0px 3px 5px #555;background-color: rgba(255,255,255,0.21);border-radius:10px;padding:7px 3px7px 3px;'>	
		 <li class='bg-777' >
		  <center>
		   <b>Posted by:&nbsp;&nbsp;&nbsp;</b>
			<?=echoVidField('video_publisher')?> 
		  </center>
		 </li>
																			
		 <li class='bg-777' >
		  <center>
		   <b>Uploaded on:&nbsp;&nbsp;&nbsp;</b>
		   
			<?=echoVidField('video_date')?> 
		  </center>
		 </li>
																			
		 <li class='bg-777' >
		  <center>
		   <b>Category:&nbsp;&nbsp;&nbsp;</b>
			<?=echoVidField('video_category')?>  
		  </center>
		 </li>																	
	<br>															
	</ul>															

		   <br id='afterPostTrgt'>
   <?// button toggle for comments collapsed section \\?>
	<a href='#afterPostTrgt' class='btn btn-info center-block' type='button' name='cmt_btn' style='text decoration:none;color:#eee;' data-target='#rest-of-vidCmt' data-toggle='collapse' >
 	 Comments
 	</a>
		</td>
	   </tr>
	  </table>
	  
 <?///////////////////////////////////////////////////////////////////////?>
 <?///////////////////////////////////////////////////////////////////////?>
	
<section class='collapse' id='rest-of-vidCmt'>
  <table class='table table-condensed' id='vidOutput' cellspacing='0' cellpadding='1' width='95%'  cols='2' style=''>
     <tbody>
	   <tr>	
		<td align='center' style='background-color: rgba(255,255,255,0.1);border-radius:0 0 15px 10px;'>
		  <br>		

 <?/// FORM to process user comments into db \\\?>
 <?/// FORM to process user comments into db \\\?>
 		 <div id="<?=switchIfLoggedIn("","hide")?>">
		  <form action='#rest-of-vidCmt' method='POST' id='t_area' >
		   <br>
			<center>													
			  <b style='font-size:25px;'> Video Comments </b>			
 			 <textarea class='form-control' id='vidPost' rows='5px' cols='60%' size='300' name='vid_post' placeholder='Enter Comment' required ></textarea>
			</center>														
			  <div id='t_areaInputs' class='center-block'>
			   <input type='hidden' name='v_id' value='<?=$v_id?>' />
			   <input type='hidden' name='vid_name' id='vid_name' value='<?=$tblName?>' />
					
					<noscript>
						<input type='submit' name='vid_cmt_sent' class='btn btn-default' value='Submit' />					
					</noscript>
					 
						<input type='button' onClick='vidCmtPosted();document.getElementById("vidPost").value = "";' class='btn btn-default' value='Submit' />
						<input type='reset' class='btn btn-default' value='Clear' />
			  </div>
		  </form>
		 </div>
		</td>
	   </tr>
	  <tr> 
	   <td colspan='100%' align='center' valign='center' id='p_cmt' >
		
		<div id='cmtBox4JS' class='' style='width:auto;overflow:hidden;height:100%;max-height:auto;' >
 
		 <p align='center' >
		  <br>
			<center>Comments</center>
<!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS----->
<!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS----->
<!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS----->
<!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS-----><!---COMMENTS----->
<div id='cmtDiv'>		

<style>
  #cmtRplySec:nth-of-type(odd) ul{
		background-color: rgba(107,128,160,0.15);
		color:#C6D2E4;
 		position: relative;
		left: 5%;
		min-width:85%;
		padding-bottom:2px;
	}
	#cmtRplySec:nth-of-type(even) ul{
		background-color: rgba(139,172,197,0.28);
		color:#C1CDFF;
	    position: relative;
		left: 5%;	
		min-width:85%;		
	}
	#cmtRplySec{
 		border-radius:10px;
		background:#444;
		border:1px solid #777;
	}
	#cmtRplySec:nth-of-type(odd) > a{
	    position: relative;
		float:right;
		margin-right:2%;
		margin-top:10px;
	}
	#cmtRplySec:nth-of-type(even) > a{
	    position: relative;
		float:left;
		margin-left:2%;
		margin-top:10px;		
	}
</style>
<?php
////////////////////////////
 /////////////////////////////////////
if(isset($_GET[md5('video_id')])){
	
$tbl = "video_".VID_NAME;		
global $tbl;
$c = mysqli_query($dbCon,"SHOW TABLES LIKE '$tbl'") or print(mysqli_error($dbCon));
 if(mysqli_num_rows($c) !== 0){
/////////////////////////////////////

	$r = mysqli_query($dbCon,"SELECT * FROM `$tbl`") or print(mysqli_error($dbCon));								 
	$rowCnt = mysqli_num_rows($r);
		$rows = $rowCnt; //max rows
		$diviser = $rowCnt / 5; //each pg = max rows divided by '5', '5' = limit
		$rowCnt = ceil($diviser); ///round up everything lol	
///////////////////////////////	
    if($rows > 5){					
		$offset = '0';				
		if(isset($_REQUEST['page'])){
			$p = intval($_REQUEST['page'], 0);
			$offset = 5 * $p; // limit end 'offset'	
		}
	}else{
		$p = 0;
		$offset = 0;
	} 	
/// ADD LIST-ORDER BTN TO ORDER BY VOTE | DATE \\\
 
 	 $qry = "SELECT `id`,
					 `video_name`,
					 `video_comment_member`,
					 `video_comment`,
					 `video_comment_date`,
					 `video_comment_vote`,
					 `video_comment_reply`
			FROM `$tbl`
			ORDER BY `video_comment_date` DESC
			LIMIT 5 OFFSET ".$offset;
	  $rslt = mysqli_query($dbCon, $qry) or print(mysqli_error($dbCon));
	  $row_cnt = mysqli_num_rows($rslt);
	   if($row_cnt > '0'){
  		while($vidCmtFld = mysqli_fetch_assoc($rslt)){	
 ?>										
 		
	<!---******COMMENTS COMMENTS **********---->
	<!---******COMMENTS COMMENTS **********---->

 
		<a href='<?="mem.php?".md5('p')."=".getMemIdByMemName($vidCmtFld['video_comment_member'])."#mem_list_xpand"?>' target='_self' class='pull-left'>
											
		  <?// CMTER NAME \\?>										
		   <u class='lead' style='margin-left:5px;color:#ccc;text-decoration:none;font-weight:bold;'>
			<?=ucfirst($vidCmtFld['video_comment_member'])?>
		   </u>
			
		   <?// CMT AVATAR \\?>										
			<img src='<?=echo_memsAvatr($vidCmtFld['video_comment_member'])?>' width='' title='<?=$vidCmtFld['video_comment_member']?>' alt='Member' style='vertical-align:top;min-width:40px;float:left;' />													
		</a>
		
	   <?// CMT DATE \\?>
		 <p align='center'>																																
		  <span class='center-block text-center bg-555' >		
			<?=$vidCmtFld['video_comment_date']?>
		  </span>																				
		 </p>	
		<div class='r8iconBox pull-right' style=''>		
		 <?// CMT VOTE \\?>		
			<?=showR8IconsFor($tbl,'video_comment_vote',$vidCmtFld['id'],$vidCmtFld['video_comment_member'])?>														
		</div>								
	
	<?//CONFIRM REPLIES\\?><?//CONFIRM REPLIES\\?>
	<?//CONFIRM REPLIES\\?><?//CONFIRM REPLIES\\?>
<?php	///////////////////////////////														
  if(isset($_REQUEST['cmtReply']) && !empty($_REQUEST['cmtId'])){  
  //////////////////////////////////
	$cmtId = $vidCmtFld['id'];
	$cmtReplyTbl = "vid_reply_".$vidCmtFld['video_name'];
								
	  $q = "UPDATE `$tbl`		
			SET `video_comment_reply` = '1'";
		mysqli_query($dbCon,$q) or print(mysqli_error($dbCon));
	/////////////////////////////////////	
	$chk = mysqli_query($dbCon,"SHOW TABLES LIKE '$cmtReplyTbl'") or print(mysqli_error($dbCon));
	 if(mysqli_num_rows($chk) == 0){
		 $cr8 = "CREATE TABLE `$cmtReplyTbl` (
				 `id` int(4) NOT NULL AUTO_INCREMENT,
				 `video_comment_id` int(3) NOT NULL,
				 `video_comment_reply` text(200) NOT NULL,
				 `video_comment_reply_date` date NOT NULL,
				 `video_comment_reply_member` varchar(30) NOT NULL,
				 `video_comment_reply_vote` int(4) NOT NULL DEFAULT '0',
				 PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1";
			mysqli_query($dbCon,$cr8) or print("Prob creating cmt_rply tbl ".mysqli_error($dbCon));
	 } //END cr8tbl chk
	 
	 //////////INSERT CMT_REPLY INTO TBL\\\\\\\\\
		$qry = "INSERT INTO `$cmtReplyTbl`(
							`video_comment_id`,
							`video_comment_reply`,
							`video_comment_reply_date`,
							`video_comment_reply_member`)
					VALUES( '{$_REQUEST['cmtId']}',
							'{$_REQUEST['cmtReply']}',
							NOW(),
							'{$_SESSION['username']}')";
		$rzlt = mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
		
  }//END if(req)
 ?>
	 
	 
		<?// COMMENT COMMENT COMMENT COMMENT \\?>
		 <span style='display:block;width:90%;margin:0 auto;min-height:25px;'>
		  <?=ucfirst($vidCmtFld['video_comment'])?>							
		 </span>
		 
		<?//REPLY\\?>
		<button class='btn btn-default btn-sm' type='button' data-toggle='collapse' data-target='#vidCmt<?=$vidCmtFld['id']?>' style='width:80px;z-index:0;color:#ddd;margin:-20px auto auto 90%;padding-bottom:10px;border:1px solid #666;'>
		 Reply 
		</button>


	<div class='well well-sm collapse' id='vidCmt<?=$vidCmtFld['id']?>' style='padding-bottom:20px;z-index:1;border-top-width:4px;margin-top:10px;'>
	 <p align='center' valign='center' >
	  <form>				
	   <textarea class='form-control text-left' id='cmtReply<?=$vidCmtFld['id']?>' rows='2' cols='60%' size='200' name='cmtReply' placeholder='Enter Reply' style='wordwrap:break-word;'></textarea>
		<div class='center-block pull-right'>
		 <noscript>
			<input type='submit' class='btn btn-success' value='Reply' style='border:1px solid #999;' />
		 </noscript>
		 <input type='button' onClick='vidRply("<?=$vidCmtFld['id']?>",document.getElementById("<?='cmtReply'.$vidCmtFld['id']?>").value);'  class='btn btn-success' value='Reply' style='border:1px solid #999;' />
		 <input type='reset' class='btn btn-danger' value='Clear' style='border:1px solid #999;' />
		</div>		
	   </form>
	  </p>  
	</div>		 
	 
	 <?/// REPLIES REPLIES REPLIES \\\?>
	 <?/// REPLIES REPLIES REPLIES \\\?>
	 <?php	///////////////////////////////
	 ///IF CMTS POSTED PULL FRM CMT_TBL\\\
	 if($vidCmtFld['video_comment_reply'] == '1'){
	  $cmtId = $vidCmtFld['id'];
	  $cmtReplyTbl = "vid_reply_".$vidCmtFld['video_name'];	
	  
		 $qryRly = "SELECT *
					FROM `$cmtReplyTbl`
					WHERE `video_comment_id` 
					LIKE '$cmtId'
					ORDER BY `id` DESC";
		 $r = mysqli_query($dbCon,$qryRly) or print(strtoupper(mysqli_error($dbCon)));
		 ////////////////////////////////////////
		 while($row = mysqli_fetch_assoc($r)){
		?>
		 <div class='center-block' style='width:85%;' id='cmtRplySec'>
		 
		  <ul class='list-inline well well-sm'  style='display:inline-block;border:3px solid #999;'>
		   <li class='text-center'>
			<text>
			  <?=$row['video_comment_reply_date']?>
			</text>
		   </li>
		   <li class='text-left pull-right'>
			<b>
			  <?=$row['video_comment_reply_member']?>
			</b>
		   </li>	
			<span class='well well-sm'  style='display:inline-block;width:75%;margin:0 auto auto 0;min-height:25px;'>
			 <?=ucfirst($row['video_comment_reply'])?>							
			</span>	 
		   <div class='pull-right' style='margin-top:-25px;'><?=getRplyIdd($row['id'])?>
			<?=showR8IconsFor($cmtReplyTbl,"video_comment_reply_vote",getRplyIdd($row['id']),$row['video_comment_reply_member'])?>														
		   </div>
		  </ul>		

		<a href='<?="mem.php?".md5('p')."=".getMemIdByMemName($row['video_comment_reply_member'])."#mem_list_xpand"?>' target='_self' >									
			<img src='<?=echo_memsAvatr($row['video_comment_reply_member'])?>' width='' alt='Member' style='vertical-align:top;min-width:40px;' />													
		</a>		  
		 </div>			
		<?php
		 } //END reply while		 

		} //END if(cmtRply == 1)	
			
	echo "<hr />";
	
	} //END cmts 
	
}else{
  echo "<span class='well center-block text-center'>No Comments</span>";
}
 ?>
<input type='hidden' value='<?=$p?>' id='pVal' />
 <div class='text-primary text-center bg-success' >
<?php 
////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_/////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
$qr = mysqli_query($dbCon,"SELECT * FROM `$tbl`") or die(mysqli_error($dbCon));
$rowCnt = mysqli_num_rows($qr);
$rowCnt = ceil($rowCnt / 5);
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
	}	//END if(wall)	
?>
</div>

<?php
	 }//END OF if(table exist)
	else{
		  echo "<span class='well center-block text-center'>No Comments</span>";
		}	

	}//END OF if(vidid)
else{
	  echo "<span class='well center-block text-center'>Welcome to BS Exposed</span>";
	}
?>

 
	<?// END #cmtDiv \\\?><?// END #cmtDiv \\\?> 
	</div>											
	<?// END #cmtDiv \\\?><?// END #cmtDiv \\\?> 
								
	</p>
	   
<?// END #cmtBox4JS  \\?><?// END #cmtBox4JS  \\?>
</div>
<?// END #cmtBox4JS  \\?><?// END #cmtBox4JS  \\?>	 										
	 </td>
    </tr>
   </tbody>
  </table>
<?///END TABLE containing video content for viewer \\\?>	
</div>
<?///END TABLE containing video content for viewer \\\?>	

</section>


 		

	 <?/// empty \\\?>					  
		<section class='empty-001'>
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
	  </div>
	</section>	
			
<?/// PREVIEW OF RECENT VIDEOS IN THE SAME CATEGORY \\\?>
	<section class='mainBottom' style='max-width:85%;margin:0 auto;'>
 
		<h2 style='color:#999;font-weight:bold;text-align:center;text-shadow:0px 4px 8px #111;margin-bottom:0;'>
		  Similar Recent Videos
			<?=vidPreviewFromSameCat()?>
		</h2>
 
	</section>

<?/// empty \\\?>		
			<section class='empty-3'>
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
<?// END OF MAINWRAPPER \\?>
<?// END OF MAINWRAPPER \\?>
</div>

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

<script src="js/jquery-1.11.3.min.js"></script>
<script>
var vid_name = document.getElementById("vid_name").value;
			
function vidRply(cmtId,txtVal){
  var fldId = "vidCmt"+cmtId;
  var cmtFld = document.getElementById("'"+fldId+"'");
  var tbl = document.getElementById("vid_name").value;
   var page = document.getElementById("pVal").value;
 
 $(document).ready(function(){
		
	  if($.trim(txtVal) !== ''){

		$.post('incl/vidRplyProc.php', {tbl:tbl,vid_name:vid_name,cmtId:cmtId,page:page,cmtReply:txtVal}, function(r){
		 
			$('#cmtDiv').html(r);
			
		})
	 
	 }else if(txtVal == ''){
		  alert("Please Enter your Reply first");
	  }
	})
}
 
///////////Post////////////
////////////////////////////////////////////////////
////////////////////////////////////////////////////

function vidCmtPosted(){

$(document).ready(function(){
var vidPost = document.getElementById("vidPost").value;
 
$(document).ready(function(){
 
 vid_name = vid_name.trim();
 	if(vidPost.lastIndexOf('') > 1){	

		$.post('incl/pullVidCmt.php', {vidPost:vidPost,vid_name:vid_name,tbl:vid_name}, function(resp){

			$('#cmtDiv').html(resp)		
		})		
 		
	}else if(vidPost.trim() == 0){
		alert("Please enter a comment");
		}
	})
  })
} 
 ////////////WALL PAGINATION\\\\\\\\\\\\

function go2pg(p){
  $(document).ready(function(){
 
	$.post('incl/pullVidCmt.php', {page:p,tbl:vid_name,vid_name:vid_name}, function(rLt){

		$('#cmtDiv').html(rLt);
		  
		})
	})
 }
	
</script>
 <script>
 /*
 document.onload = function(){
	 var ht = document.getElementById("cmtBox4JS");
	 if(ht.style.height > "500px"){document.getElementById("cmtHideBtn").style.display="none";}else{document.getElementById("cmtHideBtn").style.display="block";}
 }   
 */
 </script>
<script src="js/meReg.js"></script>
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

	   </BODY>
</HTML>