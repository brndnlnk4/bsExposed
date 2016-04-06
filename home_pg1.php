<!---- MY SELF MADE PAGINATION SCRIPT---'4HRS_SPENT'---->
<!---- MY SELF MADE PAGINATION SCRIPT---'4HRS_SPENT'---->
<!---- MY SELF MADE PAGINATION SCRIPT---'4HRS_SPENT'---->
<?php
include("incl/sv.php");
include("incl/loginProcess.php");
  ////////////////////////////////////////////////////
 ////////////////////////////////////////////////////
 /////////////FUNCTIONS RE_NAMED////////////////////
function ifNorowExist($tbl,$qryIfRowExist,$ELseEcho){
	 global $dbCon;
		$sql = "SELECT * 
		FROM `$tbl`";
////chk if empty
$r = mysqli_query($dbCon,$sql) or die(mysqli_error($dbCon));
if(mysqli_num_rows($r) > '0'){
	$qry = "$qryIfRowExist";
}else{
	echo $ELseEcho;
   }
	 if(!empty($qry)){
		 return $qry;
	 }
} 
function switchIfLogedIn($loggedIn, $loggedOut){
      global $dbCon;	
        if(isset($_SESSION['username'])){
			echo "$loggedIn";
		}else{
			echo "$loggedOut";
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
function get_memsAvatr($memName){
     global $dbCon;
        $pic_qry = "SELECT `mem_avatar` 
                    FROM `members` 
                    WHERE `mem_username` = '{$memName}'
                    LIMIT 1";
				  //$R = mysqli_query($dbCon, $pic_qry) or die("couldnt find pic"); 
				  $avatars = array(mysqli_fetch_row(mysqli_query($dbCon, $pic_qry)));
         if(!empty($avatars) || mysqli_num_rows(mysqli_query($dbCon, $pic_qry)) > '0'){
             $t = mysqli_query($dbCon, $pic_qry) or die();
             while($av = mysqli_fetch_assoc($t)){
                
                $a =  $av['mem_avatar'];
                
                 break;
             }

         }
        return $a;
    }	
function echoIfIset($chkIfSet,$ifSetEcho,$elseEcho){
        if(isset($chkIfSet) || !empty($chkIfSet)){
            echo $ifSetEcho;
        }else{
            echo $elseEcho;
        }
    }
function showIconsFor($tblName,$rowName,$fieldId,$updMem){
    //// TBL_NAME = table
    //// ROW_NAME = collumn name, usually a string
    //// FIELD_ID = id of row
    //// UPD_MEM = mem_name to update his or her membr votes
    global $dbCon;
        echo "<div class='";	
         if(isset($_SESSION['username'])){
           echo "rate-icons";
            }else{
                echo "hide";
                }
					echo "'>";
					///////////////////
	///////////////// SHOW CURRENT
	///////////////// SHOW CURRENT
	if((isset($fieldId) 
	  && isset($tblName)) 
	  && isset($rowName)){
         $qry = "SELECT `$rowName`
                 FROM `$tblName`
                 WHERE `id` = '$fieldId'";
            $rzlt = mysqli_query($dbCon, $qry) or $error = (mysqli_error($dbCon));
            ///// PULL STUPID VOTE COUNT IN DB \\\\\
             if(mysqli_num_rows($rzlt) > '0'){   
                 while($votes = mysqli_fetch_row($rzlt)){ 
					$votes[0] = intval($votes[0], 0);
                        break;
                     }
                }
			} //////////////////////////////
?>
	
    <!--------VOTE UP-------->

     <ul class='list-group' title='Can only rate once' >
		<li class='list-group-item text-center' style='background-color:#555;'>
		   
		   <button class='btn btn-warning' id='btnPlus' type='button' onclick='voteAjax("plus","<?=$fieldId?>","<?=$tblName?>","<?=$rowName?>","<?=$updMem?>");this.setAttribute("disabled","")' >		
			<img src='css/pix/ico/ratePositive.png' />
		   </button>
		   
				<b id='voteElement<?=$fieldId?>' style='display:inline-block;padding:2px 2px;margin:0 auto;text-shadow:0px 1px 2.5px #222;font-size:150%;text-align:center;clear:both;'>
				 <?/// VOTE NUMBER \\\?>
				 
					<?=$votes[0]?>
					
				 <?/// VOTE NUMBER \\\?>		 		
				</b>					
    
	<!--------VOTE DWN-------->		   
		   <button class='btn btn-warning' id='btnPlus' type='button' onclick='voteAjax("minus","<?=$fieldId?>","<?=$tblName?>","<?=$rowName?>","<?=$updMem?>");this.setAttribute("disabled","")' >		
			<img src='css/pix/ico/rateNegative.png' />
		   </button>    
	   </li>
     </ul>	
<script> 
//////////////////////////////////////
	//// UPDATE VOTES IF ON CLICK ////
	//// UPDATE VOTES IF ON CLICK ////
		
		function voteAjax(vote,voteElmId,tblName,rowName,updMem){		
			var val2snd = "newVote="+vote+"&tblName="+tblName+"&voteElmId="+voteElmId+"&rowName="+rowName+"&updMem="+updMem;
			var voteUpd = new XMLHttpRequest(); //request 2 use GET||POST METHOD 
			
			voteUpd.open("POST","incl/Vote.php",true); //choose method GET||POST & data & NULL=asynchronous
			voteUpd.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			voteUpd.onreadystatechange = function(){
				if(voteUpd.readyState == 4){
					if(voteUpd.status == 200){
						
 						 showVote(voteElmId,tblName,rowName);
						
					}else{
						alert(voteUpd.statusText);
					}
				}
			}
			voteUpd.send(val2snd);
	}
///////////////////////////////////////////
	//// PULL AND DISPLAY UPDATED VOTE ////
	//// PULL AND DISPLAY UPDATED VOTE ////
		function showVote(voteElmId,tblName,rowName){
			var voteElementName = "voteElement"+voteElmId;
			var voteElement = document.getElementById(voteElementName);				
			var vals = "voteElmId="+voteElmId+"&tblName="+tblName+"&rowName="+rowName;
			var vote = new XMLHttpRequest();
			
			vote.open('POST','incl/curVote.php',true);
			
			vote.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
			vote.onreadystatechange = function(){
				if(vote.readyState == 4){
					if(vote.status == 200){
						
						voteElement.innerHTML = vote.responseText;
						
					}else{
						alert(vote.statusText);
					}
				}
			}
			
			vote.send(vals);
		}		
</script>	
<?="</div>"; 
	}
?>

<?php /////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
$homeTbl = ifNorowExist('home',"SELECT * FROM `home`","");	
 if(!empty($homeTbl)){
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
		$offset = 0;
		}
        //////////
        //////////						    
 	global $left;
    global $right;
					
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
$q = "SELECT *
	  FROM `home`
	  ORDER BY `id` DESC 
	  LIMIT 3 OFFSET ".$offset;
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon)); 
	  
 if(mysqli_num_rows(mysqli_query($dbCon,$q)) > '0'){
 //////// confirmed rows present so pull data ///////
 //////// confirmed rows present so pull data ///////

$h = 0; 
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
$getPics = ifNorowExist($tabl,"SELECT DISTINCT `home_pictures` FROM `$tabl` WHERE `home_title` = '{$sections['title']}' ORDER BY `id` DESC ","");																		
	//////////////////////
if(isset($getPics)){
	$i = 0;
	$rzlt = mysqli_query($dbCon,$getPics) or print(mysqli_error($dbCon));
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
	<?php /// AVATAR \\\\\\\\\\\\
	$avat = get_memsAvatr($mem);
	$memId = getMemId($mem);
	?>	
	  <div class='container-fluid'>
	   <div class='row' style='border-radius:10px 10px;'>
		<div class='col-lg-8' >

			<?//// DELETE SECTION BUTTON \\\\?>
			<span class='<?=switchIfLogedIn('pull-right well well-sm','hide')?>' style='padding:8px;background-color:#222;margin-top:10px;margin-right:10px;'>
			 
			 <a href='<?="?".md5('del')."=".$ID."#home-main"?>' onclick='alert("Sure You want to Delete This?");' target='_self' type='button' class='btn btn-sm btn-danger' >
				Delete
			 </a>
			
			</span>			 
			<a href='<?="mem.php?".md5('p')."=".$memId."#trgt1"?>' target='_self' >			  

			 <p align='left' id='main-p-img'>
		      

			   <span id='main-p-title' class='lead'>
 			   
 			    <?=$ttle?> 
			  
			  </span>

				
			 <sub class='pull-left' style='clear:left;text-shadow:1px 2px 4px #222;'><?=$mem?></sub>												
			   
				<img src='<?=echoIfIset($avat,'upl/'.$avat,$pic1)?>' width='250px' alt='Yoyo' class='img-responsive img-circle' style='border:8px solid #777;' />	  																	

			 </p>
			 </a>
			  
			<p align='center' valign='top' id='top-text-sec-prev' style='word-wrap:break-word;text-align:left;'>
				
			<?/// DESCRPTION \\\?>
				<?=$dsc?>
			 
				<?/// VOTE \\\\?>
				 <div class='<?=switchIfLogedIn('pull-left','hide')?>' style='float:left;clear:left;margin-bottom:40px;position:absolute;bottom:-60px;'>
				   <?=showIconsFor('home','vote',$ID,$mem)?>
				 </div>
			  
			</p>
		</div>
		 <div class='col-lg-4'>
			<p align='center' valign='top' style='background-color:rgba(0,0,0,0.15);min-height:280px;'>
			 <strong style='float:left;'>
			
				<?=$date?>
			 
			 </strong>
			  <img src='<?=$pic1?>' id='thumb<?=$h++?>' width='' alt='Sample' class='img-responsive img-rounded' style='max-height:180px;border:3px solid #999;' />
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
													
						  <img src='upl/news_pics/<?=$re?>' onMouseOver="enlargeThumb('<?=$re?>','<?=$i?>','<?=$h?>')" width='60px' alt='Sample' class='img-responsive img-rounded'>
														
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
		} //END while(section[])
	} //END if(num_rows)
}	
else{ 
		//**********show dummy text************\\
		//**********show dummy text************\\
		//**********show dummy text************\\
		//**********show dummy text************\\
 ?>
	<div class='content content-2'>
 
	  <div class='container-fluid'>
	   <div class='row' style='  border-radius:10px 10px;'>
		<div class='col-lg-8' >
			 <p align='left' id='main-p-img'>
			   
			   <span id='main-p-title' class='lead'>
 			   
			   BS-E by Brandon
			  
			  </span>
			    
				<img src='css/pix/car.jpg' width='250px' alt='Yoyo' class='img-responsive img-circle' />
			 </p>
			<p align='center' valign='top' id='top-text-sec'>
				
				<b>Welcome to BS_Exposed News Blog by Brandon O.</b><br>
					Feel free to contact me via contact page or phone / email.
					Site is currently under consruction, just completed pagination script from scratch.
					Next program is a comment reply script. <br>
					Stay tuned!
			
			</p>
		</div>
		 <div class='col-lg-4'>
			<p align='center' valign='top' style='background-color:rgba(0,0,0,0.15);'>
			 <strong style='float:left;'>
			
			<?=date('m-d-Y')?>
			 
			 </strong>
			  <img src='css/pix/car.jpg' width='' alt='Sample' class='img-responsive img-rounded' />
			   </p>
				<ul style='max-height:230px;overflow:auto;'> 
				  <li> <img src='css/pix/car.jpg' width='60px' alt='Sample' class='img-responsive img-rounded' /></li>
				  <li> <img src='css/pix/car.jpg' width='60px' alt='Sample' class='img-responsive img-rounded' /></li>
				  <li> <img src='css/pix/car.jpg' width='60px' alt='Sample' class='img-responsive img-rounded' /></li>
				  <li> <img src='css/pix/car.jpg' width='60px' alt='Sample' class='img-responsive img-rounded' /></li>
				 </ul>
			<hr>	
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
		
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////	
 
