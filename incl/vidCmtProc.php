 <div id='output'> 
  <div class='modal-content' id='trgt6'>
	<style>
	 #strp tr:nth-of-type(odd) td > p{
		 color:#739de0;
	 }
	</style>
	  <?// close & maximize \\?>
 		<button type='button' class='btn btn-danger pull-right' onclick='closeModal()' style='margin:0 5px;'>X</button>
 		 <button type='button' class='btn btn-danger pull-right' onclick='document.getElementsByClassName("modal-content")[1].style.maxHeight = "740px";' >▋</button>
		  <p align='center'>
		   <h2 class='lead text-muted' style='font-size:150%;font-weight:bold;'> <?=ucfirst($_REQUEST['modalTitle'])?></h2>
		    <p align='center' valign='center'>
			  
			  <div  class='well well-md'>
				<table class='table table-condensed table-responsive' id='strp' cellspacing='0' cellpadding='0' >
				 <tr>
				  <th> 
				   <center>
			 
					<figcaption style='text-shadow:0px 2px 3px #333;font-size:120%;font-weight:bold;'>
					Video-Comments
					</figcaption>			 
				   </center>
				  </th>
				 </tr>
  <?php	include("sv.php");
///////get comments for vid
$vidTitle = $_REQUEST['modalTitle'];
///////////////////////////////////
///////////////////////////////////
///CHECK 4 ROWS IN VIDEO CMT TABLE///
$Q = mysqli_query($dbCon,"SELECT * FROM `video_$vidTitle`") or die(mysqli_error($dbCon));
/////////////////////////////////////
if($Q){
	$r = mysqli_query($dbCon,"SELECT * FROM `video_$vidTitle`") or die(mysqli_error($dbCon));								 
	$rowCnt = mysqli_num_rows($r);
		$rows = $rowCnt; //max rows
 		$diviser = $rowCnt / 10; //each pg = max rows divided by '5', '5' = limit
  		$rowCnt = ceil($diviser); ///round up everything lol
}
if($rows > 10){
 if(!isset($_REQUEST['lim'])){
  $right = true; // right = next button
  $left = NULL; // right = next button
  $offset = '0';
	$pgN = 1;
   }else{
 	 	$right = NULL;
 }	
 ///////////////////////////////////////	
///////////////////////////////////////	
if(isset($_REQUEST['lim']) && !empty($_REQUEST['lim'])){
 	   $g = $_REQUEST['lim'];  				
	   $p = $_REQUEST['p'];   //pg# in href
	   $p = substr($p,0,1);
   
//////////////////////////////
   $pgs = $rowCnt;
	//$pgs = ceil($pgs);
///////////////////////////////	
$pgz = $pgs;
$pgN = $p; 	
 
if($pgz > $p+1){
 		$pgN == $pgN++;
		
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
$offset = 10*$p; // limit end 'offset'	
global $left;
global $right;
	}	
	//////////
	//////////						
	}else{
		$offset = '0';
		$left = NULL;
		$right = NULL;	
	}
			
////////////////////////////////////////
////FUNCTIONS//////FUNCTIONS////////////
////////////////////////////////////////
////FUNCTIONS//////FUNCTIONS////////////
function echoIfIset($chkIfSet,$ifSetEcho,$elseEcho){
	if(isset($chkIfSet) || !empty($chkIfSet)){
		echo $ifSetEcho;
	}else{
		echo $elseEcho;
	}
}
  function getMemId($mem_name){
        global $dbCon;
        $qry = "SELECT `id`
                FROM `members`
                WHERE `mem_username` = '$mem_name' ";
        $rslt = mysqli_query($dbCon, $qry);
            if($rslt){
                while($row = mysqli_fetch_assoc($rslt)){
                     $mem_id = $row['id'];                
                    } 
                 }else{
                    $mem_id = 'NULL';  
                    echo mysqli_error($dbCon);
                    }
        return $mem_id;
     }
 
////////////////////////////////////////
////////////////PAGINATION PROCES///////
////////////////PAGINATION PROCES///////
$ttl = $_REQUEST['modalTitle'];
$qry = "SELECT *
	  FROM `video_$ttl`
	  ORDER BY `id` DESC 
	  LIMIT 10 OFFSET ".$offset;

 			$rzlt = mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
			if(mysqli_num_rows($rzlt) > 0){
			  
				while($r = mysqli_fetch_array($rzlt)){
					
					$r['video_comment_date'] = explode('-',$r['video_comment_date']);	
					$r['video_comment_date'] = $r['video_comment_date']['1']."-".$r['video_comment_date']['2']."-".$r['video_comment_date']['0'];
					$memId = getMemId($r['video_comment_member']);
?>
				 <tr> <!---TR----->
				  <td align='center' rowspan='1' colspan='100%' style='background:rgba(0,0,0,0.4);border-bottom:1px solid #999;'> 
				   <center style='background:#333;border-radius:5px 5px 10px 10px;border-top:1px double #888;'>
				   
						<?=$r['video_comment_date']?>
				  
				  </center> 
					 
					 <?// posted by... \\?> 
					 <?// posted by... \\?> 
					  <h3 class='lead text-left'>By:
					   <a href='<?="mem.php?".md5('p')."=".$memId?>#trgt1' target='_self' >
						<strong>
						
							<?=ucfirst($r['video_comment_member'])?>
						
						</strong>
					   </a>
					  </h3>				  
					   <p align='left' class='text-left text-primary'>
					   
							<?=nl2br($r['video_comment'])?>
					   
					   </p>
				  </td>	
				</tr>
<?php
				}
			}else{
				?>
 
				    <?// if no cmts... \\?> 	  
				    <p align='left' class='text-center lead text-primary' style='font-size:160%;font-weight:bold;'>
					 <?="No Comments!"?>
				    </p>
				   <hr /> 
				  </td>
				 </tr>	
<?php				 
 			}
?>						
			   <tr> 
				<td colspan='100%' >
				 <?/// PAGINATION \\\?>
				 <span class='center-block well well-lg' style='display:block;width:40%;margin:0 auto;text-align:center;'>
					
					<button type='button' onclick='cmtPagi("back","<?=$pgN?>","<?=$vidTitle?>")' class='btn btn-danger btn-sm' <?=echoIfIset($left,'','disabled')?>>
						<img src='css/pix/ico/sliderControlLeft.gif' width='30px' class='img-responsive' />
					</button>	
					&nbsp;&nbsp;&nbsp;
					<button type='button' onclick='cmtPagi("next","<?=$pgN--?>","<?=$vidTitle?>")' class='btn btn-danger btn-sm' <?=echoIfIset($right,'','disabled')?>>
						<img src='css/pix/ico/sliderControlRight.gif' width='30px' class='img-responsive' />
					</button>
					
				   </span>					
				  </td>
			     </tr>
				</table>
			   </div>	 
			</p>
		 </p>		   
	  </div>
  </div> 
 <?//end #ouput \\?>
  
<?/// PAGINATION JS \\\?>
<?/// PAGINATION JS \\\?>
<?/// PAGINATION JS \\\?>
<script src="js/jquery-1.11.3.min.js"></script>
<script>
function cmtPagi(lim,p,vidTitle){
	 
	$('document').ready(function(){
		
		$.post('incl/vidCmtProc.php', {lim:lim,p:p,modalTitle:vidTitle}, function(response){
			
		  $('#output').html(response);
		
			window.open("#trgt6","_self");
		})
  	})
}
</script>
