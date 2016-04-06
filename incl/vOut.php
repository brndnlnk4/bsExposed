<?php include("sv.php"); include("fn2.php");

  function echoIf($chkIfSet,$ifSetEcho,$elseEcho){
        if(isset($chkIfSet) || !empty($chkIfSet)){
            echo $ifSetEcho;
        }else{
            echo $elseEcho;
        }
    }
	
	$vidId = $_REQUEST['vid'];
 	   
///CHECK 4 ROWS IN VIDEO CMT TABLE///
$Q = mysqli_query($dbCon,"SELECT * FROM `videos`") or die(mysqli_error($dbCon));
/////////////////////////////////////
if($Q){
	$r = mysqli_query($dbCon,"SELECT * FROM `videos` WHERE `video_category` IN (SELECT video_category FROM `videos` WHERE `id` = '$vidId')");								 
	$rowCnt = mysqli_num_rows($r);
		$rows = $rowCnt; //max rows
 		$diviser = $rowCnt / 6; //each pg = max rows divided by '5', '5' = limit
  		$rowCnt = ceil($diviser); ///round up everything lol
}
if($rows > 6){
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
		$pgN = --$p; ///precount down	
 	 	$left = true;
		} 	
	 }  
$offset = 6*$p; // limit end 'offset'	
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
					   
    ////////////////////////////////////
   $qry = "SELECT *
          FROM  `videos`
          WHERE `video_category` 
          IN (SELECT video_category 
            FROM `videos` 
            WHERE `id` = '$vidId')
         ORDER BY `video_date` DESC
         LIMIT 6 OFFSET ".$offset;		
         $rslt = mysqli_query($dbCon, $qry) or die("Could not retrieve video info ".mysqli_error($dbCon));

        $cnt = mysqli_num_rows($rslt);
          if(!empty($rslt) && $cnt > "0"){	
             while($showFrmVid = mysqli_fetch_array($rslt)){
             //// SHOW LATEST 10 NEWEST VIDEOS FROM SAME CAT \\\\  
        ?>
				<li class='list-item pull-left list-inline' style='width:230px;margin-left:5px;' >
				 <span style='display:inline-block;margin:0 auto;'>
				   <p align='center' valign='top' class='text-center'><?=ucfirst($showFrmVid['video_title'])?></strong>
					<a href="view-vid.php?<?=md5('video_id')?>=<?=$showFrmVid['id']?>#trgt3" target='_self' type='button' class='btn btn-warning' style='height:195px;color:#333;' >			   
					 <img src='upl/vid_pics/<?=$showFrmVid['video_images']?>' class='img-rounded img-responsive' style='max-width:180px;max-height:145px;border:5px solid #888;box-shadow:0px 4px 6px #222;background-color:#aaa;border-radius:10px;' />
					  <sub>
					   <?=$showFrmVid['video_date']?> <br>
						 
						 <?="Votes:".$showFrmVid['video_vote']?>
					     				   
					  </sub>
					</a>				   
				   </p>					
				 </span>
				</li>		    
			<?php   				   
                } 
			}///END if(rows > 0)   				
			?>
		<?/// PAGINATION \\\?>
		<span class='center-block' style='max-width:20%;text-align:center;'>
			<input type='hidden' id='vid' value='<?=$vidId?>' />
		
		<button type='button' onclick='vPagi("back","<?=$pgN?>")' class='btn btn-link btn-sm' <?=echoIf($left,'','disabled')?>>
			<img src='css/pix/ico/sliderControlLeft.gif' width='20px' class='img-responsive' />
		</button>	
		&nbsp;&nbsp;&nbsp;
		<button type='button' onclick='vPagi("next","<?=$pgN--?>")' class='btn btn-link btn-sm' <?=echoIf($right,'','disabled')?>>
			<img src='css/pix/ico/sliderControlRight.gif' width='20px' class='img-responsive' />
		</button>	
	   </span>	
		<?php	
			echo "</ul>  ";   
		?>	   