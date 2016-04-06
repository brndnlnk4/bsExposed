 
<!--███████████████ - J S * F U N K - ███████████-->
<script>
////////////// ON 'UPLOAD_PIC' CLICK -> ENABLE IMG CAPTION INPUT \\\\\\
	function captionInputEnable(){
		var inputElement = document.getElementById("imgCaptionInput");
			inputElement.removeAttribute("disabled");
	}
</script>

<script>
///// WILL REMOVE FLASH FROM TOP IF WIDTH > 678 \\\\\\\\\\\\
function flashDisplay(){
		var jumbo = document.getElementsByClassName("jumbotron")[0];
		var flashElement = document.getElementsByClassName("embed-responsive")[0];
			if(window.innerWidth < 768){
				flashElement.style.visibility = "hidden";
				jumbo.style.backgroundImage = "";				
			}else{
				flashElement.style.visibility = "visible";
				jumbo.style.backgroundImage = "none";	
			}		
    }
</script>

<script>
   //////// \\\\\\\\
  function showSocial(){
	  var showSoc = document.getElementById('mem_socials');
	  var toggl = showSoc.style.display != "block";
	  showSoc.style.display = toggl ? "block" : "none";
  }
</script>

<script>
///////////////// WILL GET AND ALERT LOGIN INPUT ON LOG		N \\\\\\\\
function getLogin(){
	var loginField = document.getElementById("usrName");
	 var loginFieldValue = loginField.value;
		//alert("Welcome back " + loginFieldValue + "!");
 }
</script>
 
 <!--
//██████████████████████████████████████████████████
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░	
//////////////███████///██////██///████████/////////
//////////////██///██///██////██///██////██/////////	
//////////////███████///████████///████████/////////			
//////////////██ ///////██////██///██///////////////			
//////////////██////////██////██///██///////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████
-->
 <?php require_once("ses.php"); ?>
 
<?/////////////////////////////////////////////////?>
<?php
///// CONNECTION TO DB \\\\\\
///// CONNECTION TO DB \\\\\\
 $pw = "";	
  /// MAKE THIS A FUNCTION THAT IS CALLED WHEN MEMBER TRIES LOGGING IN 
	
/////DEFINE DB-CONNECT INFO USED ONLY FOR CLOSING CONNECTION
?>
<?php ////// if(md5(p)) make _PROFID_ = CONSTNT \\\\\\\
if(isset($_GET[md5('p')]) && !empty($_GET[md5('p')])){
    define('_PROF_ID_',$_GET[md5('p')]); 

}else{
}
?>
<?php
if(isset($_SESSION['username'])){
    $usr = $_SESSION['username'];
     define("_PROF_WALL_","prof_cmt_".$usr);
}
?>

<?php //**** CHK IF NEW USR ACCT CREATED ****///////
////////**** CHK IF NEW USR ACCT CREATED ****///////

?>


<?php	 
 //////////////////CHECK IF USER LOGGING OUT\\\\\\\\\\\\\\\\\
 //////////////////CHECK IF USER LOGGING OUT\\\\\\\\\\\\\\\\\
	$login  = md5('login');
	$logout = md5('logout');
	$success = md5('success');
  if(isset($_GET[$login]) && $_GET[$login] == $success){
  }elseif(isset($_GET[$logout]) && $_GET[$logout] == $success){
	  session_unset();
	  session_destroy();
	 
  }
  if(isset($_SESSION['username']) && empty($_POST['yoName'])){
		$name = $_SESSION['username'];
		define('_USER_', $name);
	  //return $_SESSION['username'];
	}else{
		//define(" _USER_ ", "");
	}
?> 
<!--░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░-->
<!--███████████████ - P H P * F U N K - ████████████████████-->
<!--////////////////////////////////////////////////////////-->
<?//// _MEM_LVL , _USER_ , _PROF_WALL_ , _PROF_ID_ , VID_NAME \\\\\\\?>
<!--////////////////////////////////////////////////////////-->
<!--███████████████ - P H P * F U N K - ████████████████████-->
<!--░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░-->

<?////// REMEMBER * USE htmlspecialchars 4 PHP_SELF URLS //////?>
<?////// REMEMBER * USE htmlspecialchars 4 PHP_SELF URLS //////?>

<?php //// SHOWS VIDEO ID, TITLE, PUBLISHR, CATEGRY, DATE \\\
    function echoVidField($idTitleCatDatePub){
      global $dbCon;
        if(isset($_GET[md5('video_id')])){
	       $vidId = $_GET[md5('video_id')];
            ////////-QRY-///////////////////
	       $qry = "SELECT DISTINCT
					id,
					video_title,
					video_category,
					video_date,
					video_publisher
			     FROM `bs_exposed`.`videos`
			     WHERE `id` = '{$vidId}'
			     ORDER BY `video_date` ASC";		
		 $rslt = mysqli_query($dbCon, $qry) or die("Could not retrieve video info ".mysqli_error($dbCon));
		  $cnt = mysqli_num_rows($rslt);
		  if(!empty($rslt) && $cnt > "0"){	 
			while($showFrmVid = mysqli_fetch_assoc($rslt)){
                //// FIX DATE FORMAT IF USER CALLS FOR DATE
                if($idTitleCatDatePub == "video_date"){
                  $pubD8 = explode('-',$showFrmVid['video_date']);	
                  $pubD8 = $pubD8['1']."-".$pubD8['2']."-".$pubD8['0'];           echo $pubD8;
                }else{              
                        echo $showFrmVid[$idTitleCatDatePub];
                    }
                break;
                } /// END OF WHILE
            }
        }else{
            echo "None Available";
        }
    }
?>

<?php //////// SHOWS FIELDS FRM ROW OF VID IN SAME CATEGRY \\\
    function vidPreviewFromSameCat(){
      global $dbCon;
        if(isset($_GET[md5('video_id')])){
	       $vidId = $_GET[md5('video_id')];
	

echo "<ul class='list-group well well-lg' id='vOut' style='border:none;min-height:210px;background-color:rgba(0, 0, 0, 0.14);border-radius:10px;overflow-x:auto;'>";    
	
///CHECK 4 ROWS IN VIDEO CMT TABLE///
$Q = mysqli_query($dbCon,"SELECT * FROM `videos`") or die(mysqli_error($dbCon));
/////////////////////////////////////
if($Q){
	$r = mysqli_query($dbCon,"SELECT `id` FROM `videos` WHERE `video_category` IN (SELECT video_category FROM `videos` WHERE `id` = '$vidId')");								 
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
          FROM `videos`
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
		
		<button type='button' onclick='vPagi("back","<?=$pgN?>")' class='btn btn-link btn-sm' <?=echoIfIsset($left,'','disabled')?>>
			<img src='css/pix/ico/sliderControlLeft.gif' width='20px' class='img-responsive' />
		</button>	
		&nbsp;&nbsp;&nbsp;
		<button type='button' onclick='vPagi("next","<?=$pgN--?>")' class='btn btn-link btn-sm' <?=echoIfIsset($right,'','disabled')?>>
			<img src='css/pix/ico/sliderControlRight.gif' width='20px' class='img-responsive' />
		</button>
		
	   </span>		
	    
		<?php	
			echo "</ul>  ";   
        }///END if(md5)
		?>
		<?/// PAGINATION JS \\\?>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script>
		function vPagi(lim,p){
			var vid = document.getElementById("vid").value;
			$('document').ready(function(){
				
				$.post('incl/vOut.php', {lim:lim,p:p,vid:vid}, function(response){
					
				  $('#vOut').html(response);
				
				})
			})
		}
		</script>
	<?php
    }
?>

<?php //////// SHOWS NEWEST 5-10 VIDEOS IN SAME CATEGRY \\\
    function echoVidsOfFldSameCat($field){
      global $dbCon;
        if(isset($_GET[md5('video_id')])){
	       $vidId = $_GET[md5('video_id')];
        ////////////////////////////////////
     $qry = "SELECT *
             FROM `videos`
             WHERE `video_category` 
             IN (SELECT video_category 
                 FROM `videos` 
                 WHERE `id` = '$vidId')
             ORDER BY `video_date` ASC";		
             $rslt = mysqli_query($dbCon, $qry) or die("Could not retrieve video info ".mysqli_error($dbCon));
              
             $cnt = mysqli_num_rows($rslt);
              if(!empty($rslt) && $cnt > "0"){	 
                while($showFrmVid = mysqli_fetch_array($rslt)){
                  echo $showFrmVid[$field];
                    
 				   break;
                }
            }
        }
    }
?>

<?php /////////SWITCH VIDEO PREVIEW SECTION RATING THUMBNAIL\\\\\\
    function switchR8Pic($r8_sel){
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

<?php 	/////// catch user-selected video & echo src\\\\
    function getVidSrc(){
      global $dbCon;
    	if(isset($_GET[md5("video_id")]) && !empty($_GET[md5("video_id")])){
            $vid_id = $_GET['video_id'];
		    $qry = "SELECT `video_src`
				    FROM `bs_exposed`.`videos`
				    WHERE `id` = '{$vid_id}'
				    LIMIT 1";
		 $src = mysqli_query($dbCon, $qry) or die("Could not find video_src in db ".mysqli_error($dbCon));
		echo $src;  
        
	   }    
    }
?>

<?php /////// catch user-selected video & echo src w/o ext\\\\
    function getVidSrcNoExt(){
      global $dbCon;
    	if(isset($_GET[md5("video_id")]) && !empty($_GET[md5("video_id")])){
            $vid_id = $_GET[md5("video_id")];
		    $qry = "SELECT `video_src`
				    FROM `bs_exposed`.`videos`
				    WHERE `id` = '{$vid_id}'
				    LIMIT 1";
		 $rsrc = mysqli_query($dbCon, $qry) or die("Could not find video_src in db ".mysqli_error($dbCon)); 
      
        while($src = mysqli_fetch_assoc($rsrc)){      
          $src_xpl = explode('.',$src['video_src']);
            $src_xplEnd = end($src_xpl);            
              $src_noExt = str_replace(end($src_xpl),'', $src_xpl);
               $vid_ext = array('wmv','mp4','mpeg4','ogg','avi');
                if(in_array($src_xplEnd, $vid_ext)){
                    echo urldecode($src_noExt[0]);
                    
                } 
             break;
            }          
	   }    
    }
?>

<?php /////// GET ROWS OF WHATEVER WHEN LOGGED IN \\\\\\
	function returnColsFromTable($tbl,$whereThat,$equalsThis, $col){
	  global $dbCon;
		if(isset($_SESSION['username'])){
		  $username = $_SESSION['username'];
		    $qry = "SELECT * 
                    FROM `$tbl` ";
                    if(isset($whereThat) || !empty($whereThat)){
            $qry .= " WHERE `$whereThat` = '{$equalsThis}' ";
                    }
            $qry .= " ORDER BY `id` ASC";
            
			 $rslt = mysqli_query($dbCon, $qry)or die(mysqli_error($dbCon));
              if($rslt){
			   while($rows = mysqli_fetch_assoc($rslt)){
				//echo $photos[$colName]."<br>	";
				 $getRow = $rows[$col];
			 }                  
          }else{
                   $rows[$col] = NULL;
                  $getRow = NULL;
              }
 		}
        return $getRow; 
	}
?>
		
<?php
    function hideElementOnProfView($element){
			if(!isset($_GET[md5('p')])){
				echo "$element";	 
			}		
		}
?>
		
<?php /////Hides mem_list if user is viewing mem_profile\\\\\\\
    function displayNoneOnProfView(){
			if(isset($_GET[md5('p')])){
				echo "<div id=\"mem_list\" style=\"display:none;\" >";
			}else{
				echo "<div id=\"mem_list\" style=\"display:block;\" >";
			}
		}
?>
		
 <?php ///if logged in...
	function switchIfLoggedIn($loggedIn, $loggedOut){
      global $dbCon;	
        if(isset($_SESSION['username'])){
			echo "$loggedIn";
		}else{
			echo "$loggedOut";
 		}
 
 	}
?> 

<?php  ///if admin ...
	function switchIfAdmin($ifEcho, $elseEcho){
     global $dbCon;
		if(isset($_SESSION['username'])){
            $q = "SELECT `admin`
                  FROM `members`
                  WHERE `mem_username`
                  LIKE '{$_SESSION['username']}'
                  LIMIT 1";
            $chkQ = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
            while($rw = mysqli_fetch_row($chkQ)){    
                if($rw[0] == "1"){
            ////if admin..///////
			echo "$ifEcho";
		}else{
            /////if not admin..///
			echo "$elseEcho";
 		}
      break;
      }
    }else{
            echo "$elseEcho";
        }
}
?>

<?php
	function ifGetMd5($md5Value){
		if(isset($_GET[md5("$md5Value")])){
            echo 'block'; 
        }else{
            echo 'none';  
	 }		
	}
?>

<?php
	function ifGetMd5Then($md5Value,$echoThis,$else){
		if(isset($_GET[md5("$md5Value")])){
            echo $echoThis; 
        }else{
            echo $else;  
	 }		
	}
?>

<?php
	function ifGetIssetEcho($value,$echo,$else){
		if(isset($_GET[$value])){
            echo $echo;
        }else{
            echo $else;
        }
	}
?>

<?php
	function showElementIfRequest($elementIfGet, $elementIfNoGet, $req){
		if(isset($_REQUEST[$req])){
			echo $elementIfGet;
		}else{
			echo $elementIfNoGet;
		}
	}
?>
	
<?php ////// HIDES PIC GALLERY AFTER USER UPLs PIC \\\\
	function rem_picGal(){
		global $remove_galUploadsDiv;
		 if($remove_galUploadsDiv == true){
	 echo "hide";
 }else{
	 echo "usr_photos";
    }
}
?>

<?php  ////rateUpOrDown Icons \\\\\
	function showR8IconsFor($tblName,$rowName,$fieldId,$updMem){
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
					$votes = intval($votes[0], 0);
					
                        break;
                     }
					
                }else{
					 
				}  
			} //////////////////////////////
    ?>
	
    <!--------VOTE UP-------->

     <ul class='list-group' title='Can only rate once' >
		<li class='list-group-item text-center' style='background-color:#555;'>
		   
		   <button class='btn btn-warning' id='btnPlus' type='button' onclick='voteAjax("plus","<?=$fieldId?>","<?=$tblName?>","<?=$rowName?>","<?=$updMem?>");this.setAttribute("disabled","");changeInner("plus","<?=$fieldId?>");' >		
			<img src='css/pix/ico/ratePositive.png' />
		   </button>
		   
				<b id='voteElement<?=$fieldId?>' style='display:inline-block;padding:2px 2px;margin:0 auto;text-shadow:0px 1px 2.5px #222;font-size:150%;text-align:center;clear:both;'>
		
				 
					<?=$votes?>
					
				 		
				</b>					
    
	<!--------VOTE DWN-------->		   
		   <button class='btn btn-warning' id='btnPlus' type='button' onclick='voteAjax("minus","<?=$fieldId?>","<?=$tblName?>","<?=$rowName?>","<?=$updMem?>");this.setAttribute("disabled","");changeInner("minus","<?=$fieldId?>")' >		
			<img src='css/pix/ico/rateNegative.png' />
		   </button>    
	   </li>
     </ul>	
<script>
function changeInner(val,id){
  id = document.getElementById("voteElement"+id);
   //alert(id.innerHTML);
	if(val == "plus"){
		id.innerHTML = id.innerHTML++;
	}else if(val == "minus"){
		id.innerHTML = id.innerHTML--;
	}
}
</script>	
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
    <?php	
	   echo "</div>";
        if(isset($error)){
            echo $error;
        }
	}
?>

<?php
    function echoIfIsset($chkIfSet,$ifSetEcho,$elseEcho){
        if(isset($chkIfSet) || !empty($chkIfSet)){
            echo $ifSetEcho;
        }else{
            echo $elseEcho;
        }
    }
?>

<?php
    function IfIssetAndEqualValue($var,$equalsThis,$ifEcho,$elseEcho){
        if((isset($var)) || !empty($var) && ($var == $equalsThis)){
            echo $ifEcho;
        }else{
            echo $elseEcho;
        }
    }
?>

<?php
    function echo_memsAvatr($memName){
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
				if(!empty($av['mem_avatar']) 
					&& strstr($av['mem_avatar'],'upl/')){
						$a = $av['mem_avatar'];
				}elseif(strstr($av['mem_avatar'],'css/')){
						$a = $av['mem_avatar'];
				}else{
					$a = "upl/".$av['mem_avatar'];
				}				 
				 
                 echo $a;
                break;
             }

         }else{
                  echo "css/pix/Brandon2.jpg";
            }					
    }
?>

<?php
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
                if(!empty($av['mem_avatar']) 
					&& strstr($av['mem_avatar'],'upl/')){
						$a = $av['mem_avatar'];
				}elseif(strstr($av['mem_avatar'],'css/')){
						$a = $av['mem_avatar'];
				}else{
					$a = "upl/".$av['mem_avatar'];
				}				 
                $a =  $av['mem_avatar'];
                
                 break;
             }

         }
        return $a;
    }
?>


<?php   
    function ifTbl_rowExist($tbl,$qryIfRow,$qryIfNoRow){
         global $dbCon;
        	$sql = "SELECT * 
			FROM `$tbl`";
	////chk if empty
	if(mysqli_num_rows(mysqli_query($dbCon, $sql)) > '0'){
		$qry = " $qryIfRow";
	}else{
		$qry = " $qryIfNoRow";
	   }
        return $qry;
    }
?>

<?php   ///run qry 2 any tbl \\\
    function  runQry_ifTblRowEqlThis($tbl,$where,$whereThis,$ifRow,$EqualsThis,$runQry){
    global $dbCon;
     $sql = "SELECT * 
             FROM `$tbl` ";

            if(isset($where) && !empty($where)){

     $sql .= " WHERE `$where` = '{$whereThis}' ";

                    }
    
     $sql .= " ORDER BY `id` DESC";

        ////chk if empty
        $rslt = mysqli_query($dbCon, $sql) or die(mysqli_error($dbCon));
        while($row = mysqli_fetch_assoc($rslt)){    
         if(($row[$ifRow]) == $EqualsThis){
                mysqli_query($dbCon, $runQry) or die(mysqli_error($dbCon));
        }
        break;
    }
 }
?>

<?php  
    function ifNorowExistEcho($tbl,$qryIfRowExist,$ELseEcho){
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
?>
 
<?php 
    function getMemNameById($id){
        global $dbCon;
        $qry = "SELECT `mem_username`
                FROM `members`
                WHERE `id` = $id";
        $rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
        while($row = mysqli_fetch_assoc($rslt)){
            $name = $row['mem_username'];       
            global $name;
        }
   
     }
?>

<?php  //// USE THIS FUNCTION AS IF ITS A VARIABLE IN UR PHP
    function getMemIdByMemName($mem_name){
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
?>

<?php   /////// make photo length 27 by removing \n
    function trimPhotoLength($pic){
        if(strlen($pic) > 27){
                    $pic = substr($pic['photos'], 0, 27);
        }
         return $pic;
    }
?>

<?php //////PAGINATE SIMPLE
    function getOffset4Pagin8($tblNam3,$limit){
        global $dbCon;
    ///CHECK 4 ROWS IN VIDEO CMT TABLE///
    $Q = mysqli_query($dbCon,"SELECT * FROM `$tblNam3`") or die(mysqli_error($dbCon));
    /////////////////////////////////////
    if($Q){
        $r = mysqli_query($dbCon,"SELECT * FROM `$tblNam3`") or die(mysqli_error($dbCon));								 
        $rowCnt = mysqli_num_rows($r);
            $rows = $rowCnt; //max rows
            $diviser = $rowCnt / $limit; //each pg = max rows divided by '5', '5' = limit
            $rowCnt = ceil($diviser); ///round up everything lol
    }
    if($rows > $limit){
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
    $offset = $limit*$p; // limit end 'offset'	
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
        return $offset;
    }
?>

<?php

////////**** CHK IF NEW USR ACCT CREATED ****///////
if(isset($_GET[md5('reg')])){
  $email = trim(strip_tags($_REQUEST['email1']));
  $usr = $_REQUEST['usrname'];
    
    /////////chck if email xsist/////     
    $chk = "SELECT `mem_username` 
            FROM `members` 
            WHERE `mem_username` LIKE '$usr'
            AND `mem_email` LIKE '$email'";
    if(mysqli_num_rows(mysqli_query($dbCon, $chk)) >= '1'){
       ?>
        <script>
            alert("Sorry Username or Email already exist. Please Try Again.");
            window.open("?acct=exist","_self");
        </script>
    <?php
    }else{
     if(!empty($_SESSION['username']) || isset($_SESSION)){
         $_SESSION = array();
         session_destroy();
         session_unset();
         
     }
     //////cleanup email + usrname if not xsist///// ;
     $yoName = strip_tags(trim($_POST['yoName']));
     $usr = $_POST['usrname'];     
     $usr = strip_tags(trim(addcslashes($usr, '%_')));
     $usr = mysqli_real_escape_string($dbCon, $yoName);
     $dob = strip_tags(trim($_POST['dob']));
     $pw = strip_tags(addcslashes($_POST['pw'], '#@%_'));    
     $pw = mysqli_real_escape_string($dbCon, $pw);
      /////make log of usr-realnames and dob's \\\\\
      $dir = "upl/mem_log/";		
      $flName = "{$usr}.txt";						
      $fh = fopen($dir.$flName, 'a+') or die("WTF's w/ mem_log fldr");
        $strng = "DoB:\t{$dob} \n"
                ."Joined:\t".date('m-j-Y')."\n"
                ."Name:\t".$yoName."\n"
                ."Username:\t".$usr."\n";
        fwrite($fh, $strng);	
        fclose($fh);	        
        
        ////// insrt into db \\\\\\\\\\\\\\\\\\\
        $qry = "INSERT INTO `members` (
                    `mem_username`,
                    `mem_email`,
                    `mem_password`,
                    `date_joined`) 
                VALUES ('$usr',
                        '$email',
                        '$pw', 
                        now())";
        $rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
        if(!isset($_SESSION)){
         session_unset();            
         session_destroy();               
        }
         session_start();
         $_SESSION['username'] = $usr;
         $id = getMemIdByMemName($_SESSION['username']);
     //////snd welcome msg to noob////////
     $msgg = nl2br('Welcome to BS-Exposed, \n hope you enjoy your new profile. Quick Tip: \n Once you become a <b>learner at level 2</b> you can reply to comments and eventually upload your own news and videos. \n Good Luck!');
     $msgqry = "INSERT INTO `member_messages`(
                    `member_messages`,
                    `message_receiver`,
                    `message_sender`,
                    `message_date`) 
                VALUES (
                    '$msgg',
                    '{$_SESSION['username']}',
                    'Brandon Osuji',
                    now())";
    mysqli_query($dbCon,$msgqry) or die(mysqli_error($dbCon));
    //////redirect if account info success//////
   define('_USER_', $usr); 
           ?>
            <script>
                window.open("memProf.php?Registered","_self");
            </script>
        <?php
        } 
    }

?>