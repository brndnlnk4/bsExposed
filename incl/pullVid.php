<?php  include("sv.php"); 

 //////////////////////////
 //////////////////////////
///////////////////////////	
 /////functions\\\\\\\
 /////functions\\\\\\\
 function echoIfIset($chkIfSet,$ifSetEcho,$elseEcho){
        if(isset($chkIfSet) || !empty($chkIfSet)){
            echo $ifSetEcho;
        }else{
            echo $elseEcho;
        }
    }
///////////////////////////	
 function switchr8($r8_sel){
        if($r8_sel == "Adult"){
            echo "rating-adult.png";
        }elseif($r8_sel == "Mature"){
            echo "rating-mature.png";            
        }elseif($r8_sel == "Teens"){
          echo "rating-teen.png";                
        }elseif($r8_sel == "Everyone"){
           echo "rating-everyone.png";            
        }else{
            echo "rating-none.png";
        }
    }
?>
<?//VIDEOS CONTENT START\\?>		
<?//VIDEOS CONTENT START\\?>

<?php 
if(!empty($_REQUEST['video_title'])
|| !empty($_REQUEST['vid_cat'])){ 
	if((isset($_REQUEST['vid_cat']))
	&& isset($_REQUEST['video_title'])){
		$req1 = $_REQUEST['video_title'];
		$req2 = $_REQUEST['vid_cat'];
		$req = " WHERE `video_title` LIKE '{$req1}' 
				 AND `video_category` LIKE '{$req2}'";		
	}
	elseif(isset($_REQUEST['video_title'])){
		$req = $_REQUEST['video_title'];
		$req = " WHERE `video_title` LIKE '{$req}'";
	}elseif(isset($_REQUEST['vid_cat'])){
		$req = $_REQUEST['vid_cat'];
		$req = " WHERE `video_category` LIKE '{$req}'";
	}
////////////////////////////////////////////////////
////////////////////////////////////////////////////
///// pull videos and their info for video section \\\\
    
///PAGINATION: CHECK 4 ROWS IN VIDEO CMT TABLE///
///PAGINATION: CHECK 4 ROWS IN VIDEO CMT TABLE///
$Q = mysqli_query($dbCon,"SELECT `id` FROM `videos` ".$req) or die(mysqli_error($dbCon));
/////////////////////////////////////
if($Q){
 	$rowCnt = mysqli_num_rows($Q);
		$rows = $rowCnt; //max rows
		$diviser = $rowCnt / 5; //each pg = max rows divided by '5', '5' = limit
		$rowCnt = ceil($diviser); ///round up everything lol
}				
///////////////////////////////	
if($rows > 5){
 if(!isset($_REQUEST['lim'])){
  $right = true; // right = next button
  $left = NULL; // right = next button
  $offset = '0';
	$pgN = 1;
}else{
	$right = NULL;
}	
if(isset($_REQUEST['lim']) && !empty($_REQUEST['lim'])){
	   $g = $_REQUEST['lim'];  				
	   $p = $_REQUEST['p'];   //pg# in href
	   $p = substr($p,0,1);
//////////////////////////////
   $pgs = $rowCnt;
///////////////////////////////	
$pgz = $pgs;
$pgN = $p; 	
///////////////////////////////	
if($pgz > $p+1){
		$pgN == $pgN++;
///////////////////////////////	
	$right = true;
} 
	if($g == 'next'){  
	$left = true;
	 }elseif($g == 'back'){
		$right = true; 
	 } 						
/////////////////////////
if($p+1 < $p){
	$left = true;
} 
	if($g == 'back'){
		if(!isset($p) || $p <= '1'){
			$left = NULL;
			$p = '0';
		}else{	
		$pgN = --$p;	
		$left = true;
		} 	
	}  
$offset = 5 * $p; // limit end 'offset'	
	}else{
		$p = 0;
	}
	//////////
	//////////						
	}else{
		$offset = '0';
		$left = NULL;
		$right = NULL;	
		$p = 0;
	}         
global $left;
global $right;
 	$qry = "SELECT	DISTINCT
					id,			
					video_title,
					video_images,
					video_description,
					video_category,
					video_rating_title,
					video_rating,
					video_date,
					video_publisher,
					video_src,
					video_vote
			FROM `videos` ".strip_tags($req);			
  $qry .= " ORDER BY `video_date` DESC
		    LIMIT 5 OFFSET ".$offset;		
		 $rslt = @mysqli_query($dbCon, $qry);
		  $cnt = @mysqli_num_rows($rslt);
		  if(!empty($rslt) && $cnt > "0"){	 
			while($vidNfo = mysqli_fetch_assoc($rslt)){
			/// VIDEO DATE REFORMATTED
 			 $d8 = explode('-',$vidNfo['video_date']);	
			 $d8 = $d8['1']."-".$d8['2']."-".$d8['0'];
			 /// VIDEO RATING
			  $r8 = $vidNfo['video_rating'];
			  ////// DISPLAY VID CONTENT BELOW \\\\\\\\\\\
			  ////// DISPLAY VID CONTENT BELOW \\\\\\\\\\\
			?>
			<div class='content content-1' style='background-color:rgba(0,0,0,0.2);border-radius:7px;'>
			  <div class='container well well-sm' style='background-color:rgba(53,60,71,0.5);'>
			   <div class='row' id='vid-info-row' >
				<div class='col-lg-3' >
				 <?/// VIDEO TITLE \\\?>
				  <center>
				   <h3 class='text-center lead text-muted'>
					<?=ucfirst($vidNfo['video_title'])?>
				   </h3>
				  </center>
				   <?/// VIDEO THUMBNAIL \\\?>
					<p align='center' valign='top' id=''>
					 <img src='upl/vid_pics/<?=$vidNfo['video_images']?>' alt='Featured Video' title='Featured Video' width='250px' class='img-responsive img-rounded' style='border:4px solid rgba(255,255,255,0.2);box-shadow:0px 3px 5px #444;' />			
					</p>
				</div>
				<div class='col-lg-7'>
				 <h3 class='text-center lead text-muted' >
				   Description
				 </h3>
				  <p align='center' valign='top' id='midDesc'>
				   <?/// VIDEO DESCRIPTION \\\?>
					<?=ucfirst($vidNfo['video_description'])?>
				  </p>
				</div>
				<div class='col-lg-2'>
				 <?/// VIDEO RATING TITLE \\\?>
				  <h3 class='text-center lead text-muted'>
				   <?=strtoupper($vidNfo['video_rating_title'])?>
				  </h3>
				   <p align='left' valign='center' >
					<?/// VIDEO RATING ICON \\\?>
					 <img src='css/pix/ico/<?=switchR8($r8)?>' title='Rating' width='140px' alt='Rating' class='img-rounded img-responsive' />
				   </p>
					 <?/// WATCH VIDEO BTN \\\?>
					  <a href="view-vid.php?<?=md5('video_id')?>=<?=$vidNfo['id']?>#trgt3" target='_self' type='button' class='btn btn-warning' >			   
					   <b>Watch Video</b>
					  </a>				
				  </div>
			   </div>
			<?// VIDEO BOTTOM STATS \\?>	   
			<?// VIDEO BOTTOM STATS \\?>	   
			   <div class='row'>
				 <div class='col-lg-12'>
					<span class='well well-sm text-center center-block lead' style='background-color:#AAA9A8;margin-top:-8px;z-index:900;border:1px solid #666;border-top:none;border-radius:0 0 10px 10px;' >
						<div style='background:rgba(255,255,255,0.16);border-radius:10px;width:90%;margin:0 auto;padding:2px 3px;'>
							<b>Category:&nbsp;</b><?=$vidNfo['video_category']?>&nbsp;&nbsp;
							<b>Date:&nbsp;</b><?=$d8?>&nbsp;&nbsp;
							<b>Publisher:&nbsp;</b><?=$vidNfo['video_publisher']?>&nbsp;&nbsp;
							<b>Votes:&nbsp;</b><?=$vidNfo['video_vote']?>&nbsp;&nbsp;						
						</div>
					</span>
				 </div>
			   </div>
			  </div>
			</div>
		<?/// end of vid search output \\\?>
<?php
			}/////////end while
?>
 <span class='center-block well well-lg' style='display:block;width:40%;margin:0 auto;text-align:center;'>
 	<button type='button' onclick='vidProc("back","<?=$pgN?>")' class='btn btn-danger btn-sm' <?=echoIfIset($left,'','disabled')?>>
		<img src='css/pix/ico/sliderControlLeft.gif' width='30px' class='img-responsive' />
	</button>	
		&nbsp;&nbsp;&nbsp;
 	<button type='button' onclick='vidProc("next","<?=$pgN--?>")' class='btn btn-danger btn-sm' <?=echoIfIset($right,'','disabled')?>>
		<img src='css/pix/ico/sliderControlRight.gif' width='30px' class='img-responsive' />
	</button>
 </span>
<?php		 
		}////end if(REQST)
/////////////////////////////////////////////////////////////////		 
		 //////////ELSE DISPLAY NO RZLTS MSG 4 SRCH \\\\\\\\\\\\\
		 //////////ELSE DISPLAY NO RZLTS MSG 4 SRCH \\\\\\\\\\\\\
		 else{ 
			 if(isset($_REQUEST['video_title'])){
				 $srch = "Called ".$_REQUEST['video_title'];
			 }elseif(isset($_REQUEST['vid_cat'])){
				 $srch = "Under ".$_REQUEST['vid_cat']." category";
			 }
			 echo "<b class='well well-lg center-block text-center' style='height:310px;'>No Videos $srch</b>";
//////////////////////////////////////////////////////////////////			
//////////////////////////////////////////////////////////////////		
	
	}	///END vidOutput srch
 }//END if $POST
/////////////////////////////////////////////	
/////////////PAGNINATION/////////////////////	
/////////////PAGNINATION/////////////////////	
/////////////////////////////////////////////	
 else{
    ///CHECK 4 ROWS IN VIDEO CMT TABLE///
    $Q = mysqli_query($dbCon,"SELECT * FROM `videos`") or die(mysqli_error($dbCon));
    /////////////////////////////////////
    if($Q){
        $r = mysqli_query($dbCon,"SELECT * FROM `videos`") or die(mysqli_error($dbCon));								 
        $rowCnt = mysqli_num_rows($r);
            $rows = $rowCnt; //max rows
            $diviser = $rowCnt / 8; //each pg = max rows divided by '5', '5' = limit
            $rowCnt = ceil($diviser); ///round up everything lol
	}				
	///////////////////////////////	
    if($rows > 8){
		$offset = '0';
		if(isset($_REQUEST['page'])){
			$p = intval($_REQUEST['page'], 0);
			$offset = 8 * $p; // limit end 'offset'	
		}
	}else{
		$p = 0;
		$offset = 0;
		}
        //////////
        //////////						    
 	global $left;
    global $right;
/////if vid srch not exec
		$qq = "SELECT id,			
					video_title,
					video_images,
					video_description,
					video_category,
					video_rating_title,
					video_rating,
					video_date,
					video_publisher,
					video_src,
					video_vote
			FROM `videos`
			ORDER BY `id` DESC 
		    LIMIT 8 OFFSET ".$offset;
		 $rlt = mysqli_query($dbCon, $qq) or print(mysqli_error($dbCon));
		  $cntt = @mysqli_num_rows($rlt);
		  if($cntt > 0){	 
			while($viD = mysqli_fetch_assoc($rlt)){
			/// VIDEO DATE REFORMATTED
 			 $d8 = explode('-',$viD['video_date']);	
			 $d8 = $d8['1']."-".$d8['2']."-".$d8['0'];
			 /// VIDEO RATING
			  $r8 = $viD['video_rating'];
			  ////// DISPLAY VID CONTENT BELOW \\\\\\\\\\\
			  ////// DISPLAY VID CONTENT BELOW \\\\\\\\\\\
			?>
			<div class='content content-1'>
			  <div class='container well well-sm'>
			   <div class='row' id='vid-info-row' >
				<div class='col-lg-3' >
				 <?/// VIDEO TITLE \\\?>
				  <center>
				   <h3 class='text-center lead text-muted' title='Video Name' style='font-weight:bold;letter-spacing:1.3px;text-shadow:0px 2px 3px #333;'>
					<?=ucfirst($viD['video_title'])?>
				   </h3>
				  </center>
				   <?/// VIDEO THUMBNAIL \\\?>
					<p align='center' valign='top' id=''>
					 <img src='upl/vid_pics/<?=$viD['video_images']?>' alt='Featured Video' title='Featured Video' width='250px' class='img-responsive img-rounded' style='border:4px solid rgba(255,255,255,0.2);box-shadow:0px 3px 5px #444;' />			
					</p>
				</div>
				<div class='col-lg-7'>
				 <h3 class='text-center lead text-muted'>
				   Description
				 </h3>
				  <p align='center' title='Video Summary'  valign='top' id='midDesc'>
				   <?/// VIDEO DESCRIPTION \\\?>
					<?=ucfirst($viD['video_description'])?>
				  </p>
				</div>
				<div class='col-lg-2'>
				 <?/// VIDEO RATING TITLE \\\?>
				  <h3 class='text-center lead text-muted'>
				   <?=strtoupper($viD['video_rating_title'])?>
				  </h3>
				   <p align='left' valign='center' >
					<?/// VIDEO RATING ICON \\\?>
					 <img src='css/pix/ico/<?=switchR8($r8)?>' title='Rating' width='140px' alt='Rating' class='img-rounded img-responsive' />
				   </p>
					 <?/// WATCH VIDEO BTN \\\?>
					  <a href="view-vid.php?<?=md5('video_id')?>=<?=$viD['id']?>#trgt3" target='_self' type='button' class='btn btn-warning' >			   
					   <b>Watch Video</b>
					  </a>				
				  </div>
			   </div>
			<?// VIDEO BOTTOM STATS \\?>	   
			<?// VIDEO BOTTOM STATS \\?>	   
			   <div class='row'>
				 <div class='col-lg-12'>
					<span class='well well-sm text-center center-block lead' style='background-color:#AAA9A8;margin-top:-8px;z-index:900;border:1px solid #666;border-top:none;border-radius:0 0 10px 10px;' >
						<div style='background:rgba(255,255,255,0.16);border-radius:10px;width:90%;margin:0 auto;padding:2px 3px;'>
							<b>Category:&nbsp;</b><?=$viD['video_category']?>&nbsp;&nbsp;
							<b>Date:&nbsp;</b><?=$d8?>&nbsp;&nbsp;
							<b>Publisher:&nbsp;</b><?=$viD['video_publisher']?>&nbsp;&nbsp;
							<b>Votes:&nbsp;</b><?=$viD['video_vote']?>&nbsp;&nbsp;						
						</div>
					</span>
				 </div>
			   </div>
			  </div>
			</div>
	<?php
		}
	}else{	
	?>
		<?/// end of vid search output \\\?>
 			
			<div class='content content-1'>
			  <div class='container well well-sm' >
			   <div class='row' id='vid-info-row'>
				<div class='col-lg-3' >
				 <?/// VIDEO THUMBNAIL LIST \\\?>
				  <center>
				   <h3 class='text-center lead text-muted'>					   
					N/A
				   </h3>
				  </center>
				   <?// recent-upload image to left \\?>
					<p align='center' valign='top' id=''>
					 <img src='css/pix/Brandon2.jpg' alt='Featured Video' width='250px' class='img-responsive img-rounded' style='border:4px solid rgba(255,255,255,0.2);box-shadow:0px 3px 5px #444;'  />
					</p>
				</div>
				 <div class='col-lg-7'>
				  <?/// VIDEO DESCRIPTION \\\?>
				   <h3 class='text-center lead text-muted'>
					<?=date('m-j-Y');?>
				   </h3>
					<p align='center' valign='top' style=''>
					 <h2 class='lead'>No video's available in the database!</h2>
					</p>
				 </div>
				  <div class='col-lg-2' >
				  <?/// VIDEO RATING \\\?>
				   <h3 class='text-center lead text-muted'>
					N/A					
				   </h3>
					<p align='center' valign='center' >
					 <img src='css/pix/ico/<?=switchR8($r8)?>' width='140px' alt='Rating' class='img-rounded img-responsive' />
					</p>
					 <br>
						<?/// BUTTON TO VID GOES HERE \\\?>
				  </div>
			   </div>
		  <?// VID STATS \\?>	   
			   <div class='row'>
				 <div class='col-lg-12'>
					<span class='well well-xs text-center center-block lead' style='background-color:rgba(255,255,255,0.25);' >
						No Videos in DB man!	
					</span>
				 </div>
			   </div>
			  </div>
			 </div>	 				
<?php
	}  	
?>
<?/// PAGINATION \\\?>
<?/// PAGINATION \\\?>
<?/// PAGINATION \\\?>
 <?php
//////////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_///////////////////
$rowCnt = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `videos`"));
$rowCnt = ceil($rowCnt / 8);
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
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////	
?>
 <?php
}
?>
