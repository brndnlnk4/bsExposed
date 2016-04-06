	<?php
	include("sv.php");
	include("fn2.php");
	?>
	
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
     <div class='<?=switchIfLogged("nputForm","hide")?>' >
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
	
	
<?php	
if(isset($_REQUEST['prof_post'])){
	$namee = $_REQUEST['prof_name'];	
	$prof_name = "prof_cmt_".$_REQUEST['prof_name'];	
	
	   $tblrslt = mysqli_query($dbCon,"SHOW TABLES LIKE '$prof_name'");
	 if(mysqli_num_rows($tblrslt) == 0){
			
				$sql = "CREATE TABLE `$prof_name` (
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
///////////////
	$profPost = mysqli_real_escape_string($dbCon,$_REQUEST['prof_post']);
		$profPost = addcslashes($profPost, '%_' );
			$sql = "INSERT INTO `$prof_name`(
								`profile_comment`,
								`profile_commentor`,
								`profile_member`,
								`profile_comment_date`) 
					VALUES('$profPost',
						   '{$_SESSION['username']}',
						   '$namee',
						   NOW())";
		$rslt = mysqli_query($dbCon, $sql);// or die(mysqli_error($dbCon));		
	}///////////////////////////////////////////////////		
if(isset($_REQUEST['pages']) && isset($_REQUEST['pName']) 
|| isset($_REQUEST['prof_name'])){
	
	if(empty($_REQUEST['prof_name'])){
		$prof_name = "prof_cmt_".$_REQUEST['pName'];
		$namee = $_REQUEST['pName'];	
	}else{
		$prof_name = "prof_cmt_".$_REQUEST['prof_name'];	
		$namee = $_REQUEST['prof_name'];	
	}
	

		global $prof_name;
$Q = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `".$prof_name."`"));
/////////////////////////////////////
    /////////////////////////////////////
    if($Q !== 0){
        $r = mysqli_query($dbCon,"SELECT * FROM `$prof_name`") or print(mysqli_error($dbCon));								 
        $rowCnt = mysqli_num_rows($r);
            $rows = $rowCnt; //max rows
            $diviser = $rowCnt / 10; //each pg = max rows divided by '5', '5' = limit
            $rowCnt = ceil($diviser); ///round up everything lol
	
	///////////////////////////////	
    if($rows > 10){
		$offset = '0';
		if(isset($_REQUEST['pages'])){
			$p = intval($_REQUEST['pages'], 0);
			$offset = 10 * $p; // limit end 'offset'	
		}
	}else{
		$p = 0;
		$offset = '0';
		}
	}else{
		$offset = '0';
} 	
	
 $qry = "SELECT DISTINCT
			`id`,
			`profile_comment`,
			`profile_commentor`,
			`profile_comment_date`,
			`reply_set`
		FROM `$prof_name`
		ORDER BY `id` DESC
		LIMIT 10 OFFSET ".$offset;
 $rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
  if(mysqli_num_rows($rslt) > '0'){
	while($pp = mysqli_fetch_assoc($rslt)){
		$usrn = $pp['profile_commentor'];
		 if(!empty($avatar = get_Avatr($usrn))){
			 if(!strstr($avatar,'upl/')){
				$avatar = 'upl/'.$avatar;
			 }else{
				$avatar = trim($avatar);
			 }
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
	  <a href="<?="mem.php?".md5('p')."=".getMemId($pp['profile_commentor'])."#mem_list_xpand"?>" target="_self" style='border:5px solid transparent;padding:4px;' class='pull-left'>
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
	?>
  </table>
  
<div class='text-primary text-center bg-success' >
<?php 
////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_/////////////////////////
////////////////////////////////////////////////////////////////////
$rowCnt = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `$prof_name`"));
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
			
	}	//END if(wall)	
} 	//END if(request)
?>
</div>	