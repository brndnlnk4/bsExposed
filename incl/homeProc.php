<?php	////content start///////////////////////////

 include("fn2.php");
 
///////////////////////////////////////////////////
$homeTbl = "SELECT * FROM `home`";	
 if($homeTbl){
	$r = mysqli_query($dbCon,$homeTbl) or die(mysqli_error($dbCon));								 
	$rowCnt = mysqli_num_rows($r);
		$rows = $rowCnt; //max rows
 		$diviser = $rowCnt / 3; //each pg = max rows divided by '5', '5' = limit
  		$rowCnt = ceil($diviser).'<br>'; ///round up everything lol
//////////////////////////////////////////				
//////////////////////////////////////////				
    if($rows > 3){
		$offset = '0';
		if(isset($_REQUEST['page'])){
			$p = intval($_REQUEST['page'], 0);
			$offset = 3 * $p; // limit end 'offset'	
		}
	}else{
		$p = 0;
		}				
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
$q = "SELECT *
	  FROM `home`
	  ORDER BY `id` DESC 
	  LIMIT 3 OFFSET ".$offset;

	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon)); 
 //////// confirmed rows present so pull data ///////
 ////////////////////////////////////////////////////
  
////////////////////////////////////////// 
////////////////////////////////////////// 
/////////CONTENT STARTS///////////////////	
while($sections = mysqli_fetch_assoc($r)){
 //$_SESSION['title'] = NULL;
$ID = $sections['id'];
$ttle = $sections['title'];
$dsc = $sections['description'];
$d8 = explode('-',$sections['date']);
$date = $d8[2].'-'.$d8[1].'-'.$d8[0];
$tabl = "home_pics_".$ttle;
$mem = $sections['member'];
 
/////pull pictures with same title name//////
/////pull pictures with same title name//////
/////pull pictures with same title name//////
/////pull pictures with same title name//////
$getPics = "SELECT DISTINCT `home_pictures` FROM `$tabl` WHERE `home_title` = '{$sections['title']}' ORDER BY `id` DESC ";																		
	//////////////////////
if(isset($getPics)){
	$i = 0;
	$rzlt = mysqli_query($dbCon,$getPics) or die(mysqli_error($dbCon));
	  while($rw = mysqli_fetch_assoc($rzlt)){

 		foreach($rw AS $pic[++$i]){
		if(!empty($pic[$i])){ 
			if(!empty($pic[$i])){
			$pic1 = "upl/news_pics/".$pic[$i]; 
			}else{
			 $pic1 = "css/pix/car.jpg";
				}
 			} ////////////REPLACE PICS WITH DEFAULT CAR PIC IF EMPTY		 
		} ////////////REPLACE PICS WITH DEFAULT CAR PIC IF EMPTY		 
	}
}
?>
	<div class='content content-2' >
	
	  <div class='container-fluid'>
	   <div class='row' style='border-radius:10px 10px;'>
		<div class='col-lg-8'>

			<?//// DELETE SECTION BUTTON \\\\?>
			<span class='<?=switchIfLogged('pull-right well well-sm','hide')?>' style='padding:8px;background-color:#222;margin-top:10px;margin-right:10px;'>
			 <a href='<?="?".md5('del')."=".$ID."#home-main"?>' onclick='alert("Sure You want to Delete This?");' target='_self' type='button' class='btn btn-sm btn-danger' >
				Delete
			 </a>
			</span>			 
			    <?php /// AVATAR \\\\\\\\\\\\
				$avat = get_Avatr($mem);
				$memId = getMemId($mem)
				?>	
		    <a href='<?="mem.php?".md5('p')."=".$memId?>#trgt1' target='_self' >			  
				
			 <p align='left' id='main-p-img'>
			   <span id='main-p-title' class='lead'>
 			   
 			    <?=$ttle?> 
			  
			  </span>

			 <sub class='pull-left' style='clear:left;text-shadow:1px 2px 4px #222;'><?=$mem?></sub>												
			  
				<img src='<?=echoIfIset($avat,'upl/'.$avat,$pic1)?>' width='250px' alt='Yoyo' class='img-responsive img-circle' style='border:8px solid #777;' />	  																	
			  

			 </p>
			</a>
			  
			<p align='center' valign='top' id='top-text-sec-prev' style='word-wrap:break-word;word-break:break-all;;text-align:left;'>
				
			<?/// DESCRPTION \\\?>
				<?=$dsc?>
			 
				<?/// VOTE \\\\?>
				 <div class='<?=switchIfLogged('pull-left','hide')?>' style='float:left;clear:left;margin-bottom:40px;position:absolute;bottom:-60px;'>
				   <?=showR8Icons('home','vote',$ID,$mem)?>
				 </div>
			  
			</p>
		</div>
		 <div class='col-lg-4'>
			<p align='center' valign='top' style='background-color:rgba(0,0,0,0.15);min-height:280px;'>
			 <strong style='float:left;'>
			
				<?=$date?>
			 
			 </strong>
			 <a href='<?=echoIfIset($pic1,$pic1,'#')?>' id='href<?=$i?>' type='button' target='_blank' >
			  <img src='<?=$pic1?>' id='thumb<?=$i?>' width='' alt='Sample' class='img-responsive img-rounded' style='max-height:180px;border:3px solid #999;' />
			 </a>
			</p>			
			   
				<?//// SHOW PICS UPLOADED WITH LINKS TO ENLARGE \\\?>
				<ul id='home_thumbs' style='max-height:100px;overflow:auto;position:absolute;bottom:0;left:0;'> 

				<?php
				  $qq = "SELECT DISTINCT `home_pics_$ttle`.`id`,
										 `home_pics_$ttle`.`home_pictures`,
										 `home_pics_$ttle`.`home_title` 
						 FROM `home_pics_$ttle`,`home` 
						 WHERE `home_title` = '$ttle' ORDER BY `id` ASC LIMIT 5";
				   $ee = mysqli_query($dbCon,$qq) or die(mysqli_error($dbCon)); 
					while($row = mysqli_fetch_assoc($ee)){
						$re = $row['home_pictures'];
						?>
						<li>  
						 <a href='<?=echoIfIset($re,"upl/news_pics/".$re,'#')?>' type='button' target='_blank' >
													
						  <img src='upl/news_pics/<?=$re?>' onMouseOver="enlargeThumb('<?=$re?>','<?=$i?>')" width='60px' alt='Sample' class='img-responsive img-rounded'>
														
						   </a>
						</li>
						<?php
						}
				 ?>				   
						  
			</ul>
			
		 </div>
	   </div>
	  </div>
	 </div>
	<hr>	
<?php
}
?>
<?php
//////////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_///////////////////

$rowCnt = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `home`"));
$rowCnt = ceil($rowCnt / 3);
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
}		
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////	
?>