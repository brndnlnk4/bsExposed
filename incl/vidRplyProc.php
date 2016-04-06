<?php
include("sv.php");
include("fn2.php");
?>	
	<?//CONFIRM REPLIES\\?><?//CONFIRM REPLIES\\?>
	<?//CONFIRM REPLIES\\?><?//CONFIRM REPLIES\\?>


<style>
  #cmtRplySec:nth-of-type(odd) ul{
		background-color: rgba(107,128,160,0.15);
		color:#C6D2E4;
 		position: relative;
		left: 5%;
		min-width:85%;
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
////////////////////////////
//////////////////////////////////
	$cmtId = $_REQUEST['cmtId'];
	$cmtReplyTbl = "vid_reply_".$_REQUEST['tbl'];
	$tblName = $_REQUEST['tbl']; ///name byitself
	$tbl = $_REQUEST['tbl'];
	$cmt = $_REQUEST['cmtReply'];
	if(empty($_REQUEST['tbl'])){
		$tbl = $_REQUEST['vid_name'];
	}elseif(!stristr($_REQUEST['tbl'],'video_')){
		$tbl = $_REQUEST['vid_name'];
	}else{
		$tbl = substr($_REQUEST['vid_name'],6);
	}
   ///////////////////////////////////	
	/////////////////////////////////////	
	$chk = mysqli_query($dbCon,"SHOW TABLES LIKE '$cmtReplyTbl'");
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
			mysqli_query($dbCon,$cr8) or die("Prob creating cmt_rply tbl ".mysqli_error($dbCon));
	 
		  $q = "UPDATE `video_".$tbl."`		
				SET `video_comment_reply` = '1'";
			mysqli_query($dbCon,$q) or print("crap ".mysqli_error($dbCon));	 
	 } //END cr8tbl chk

	 //////////INSERT CMT_REPLY INTO TBL\\\\\\\\\
		$qry = "INSERT INTO `$cmtReplyTbl`(
							`video_comment_id`,
							`video_comment_reply`,
							`video_comment_reply_date`,
							`video_comment_reply_member`)
					VALUES( '$cmtId',
							'$cmt',
							NOW(),
							'{$_SESSION['username']}')";
		$rzlt = mysqli_query($dbCon,$qry) or die('insrt prob '.mysqli_error($dbCon));
		
/////////////////////////////////////

/////////////////////////////////////

	$r = mysqli_query($dbCon,"SELECT * FROM video_".$tbl) or print('no tbl? '.mysqli_error($dbCon));								 
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
	$qr = "SELECT `id`,
							 `video_name`,
							 `video_comment_member`,
							 `video_comment`,
							 `video_comment_date`,
							 `video_comment_vote`,
							 `video_comment_reply`
			FROM `video_$tbl`
			ORDER BY `video_comment_date` DESC
			LIMIT 5 OFFSET ".$offset;
	  $rslt = mysqli_query($dbCon, $qr) or die(mysqli_error('where is cmt tbl '.$dbCon));
	  $row_cnt = mysqli_num_rows($rslt);
	   if($row_cnt > '0'){
		   
  		while($vidCmtFld = mysqli_fetch_array($rslt)){	
		 $tblN = "video_".$tbl;
 ?>										
 		
	<!---******COMMENTS COMMENTS **********---->
	<!---******COMMENTS COMMENTS **********---->			 
		<a href='<?="mem.php?".md5('p')."=".getMemId($vidCmtFld['video_comment_member'])."#mem_list_xpand"?>' target='_self' class='pull-left'>
											
		  <?// CMTER NAME \\?>										
		   <u class='lead' style='margin-left:5px;color:#ccc;text-decoration:none;font-weight:bold;'>
			<?=ucfirst($vidCmtFld['video_comment_member'])?>
		   </u>
			 
			
		   <?// CMT AVATAR \\?>										
			<img src='<?=get_Avatr($vidCmtFld['video_comment_member'])?>' width='' title='<?=$vidCmtFld['video_comment_member']?>' alt='Member' style='vertical-align:top;min-width:40px;float:left;' />													
		</a>
		
	   <?// CMT DATE \\?>
		 <p align='center'>																																
		  <span class='center-block text-center bg-555' >		
			<?=$vidCmtFld['video_comment_date']?>
		  </span>																				
		 </p>	
		<div class='r8iconBox pull-right' style=''>		
		 <?// CMT VOTE \\?>						
			<?=showR8Icons($tblN,'video_comment_vote',$vidCmtFld['id'],$vidCmtFld['video_comment_member'])?>														
		</div>								
 
		<?// COMMENT COMMENT COMMENT COMMENT \\?>
		 <span style='display:block;width:90%;margin:0 auto;min-height:25px;'>
		  <?=ucfirst($vidCmtFld['video_comment'])?>							
		 </span>
	
<?/////*** REPLY STARTS REPLY STARTS ***\\\\\\\\\?>	
<?/////*** REPLY STARTS REPLY STARTS ***\\\\\\\\\?>	
<?/////*** REPLY STARTS REPLY STARTS ***\\\\\\\\\?>	

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
	  $cId = $vidCmtFld['id'];
		if(isset($tblName)){
		  $cmtReplyTbl = "vid_reply_".$tblName;	
		}else{
		  $cmtReplyTbl = "vid_reply_".$tbl;		
		}
		 $qryRly = "SELECT *
					FROM `$cmtReplyTbl`
					WHERE `video_comment_id` 
					LIKE '$cId'  
					ORDER BY `id` DESC";
		 $r = mysqli_query($dbCon,$qryRly) or print(strtoupper(mysqli_error($dbCon)));
		 ////////////////////////////////////////		 
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
			<span class='well well-sm' style='display:inline-block;width:75%;margin:0 0 auto auto;min-height:25px;'>
			 <?=ucfirst($row['video_comment_reply'])?>							
			</span>	 
		   <div class='pull-right' style='margin-top:-25px;'>
			<?=showR8Icons($cmtReplyTbl,"video_comment_reply_vote",getRplyId($row['id']),$row['video_comment_reply_member'])?>														
		   </div>
		  </ul>	
		
		<a href='<?="mem.php?".md5('p')."=".getMemId($row['video_comment_reply_member'])."#mem_list_xpand"?>' target='_self' >									
			<img src='<?=get_Avatr($row['video_comment_reply_member'])?>' width='' alt='Member' style='vertical-align:top;min-width:40px;' />													
		</a>		  
		 </div>			
<?php
		 } //END reply while		
 	 
	}
?> 
	 <hr />
<?php	
			} //END while(cmtFld)
				
		//END OF if(rows > 0)
	  } else{
		  echo "<span class='well center-block text-center'>No Comments</span>";
	   }
	
 
///////////END if($REQ[cmtrply])
///////////END if($REQ[cmtrply])
///////////END if($REQ[cmtrply])
?>		
<div class='text-primary text-center bg-success' >
<?php
////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_/////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
$qr = mysqli_query($dbCon,"SELECT * FROM `video_$tbl`") or die(mysqli_error($dbCon));
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
			
	}	//END paginate
?>	
<input type='hidden' value='<?=$p?>' id='pVal' />

 </div>	