<section class='main' id='home-main' style='max-height:2400px;overflow-y:auto;'>
 <span class='<?=switchIfLoggedIn('well well-sm center-block','hide')?>' >
  
  <button type='button' class='btn btn-warning btn-lg center-block' data-toggle='collapse' data-target='#adminEdit' >
   Add New Section												
  </button>														

 </span>
 <div class='<?=ifGetIssetEcho('edit','collapse in content well','collapse')?>' id='adminEdit' <?=switchIfLoggedIn('','hidden')?> >
 <div class='container-fluid'>
 <div class='row' style='border-radius:10px 10px;'>

<?php ////IF NEW_SEC TITLE SET THEN CREATE PICS TABLE FOR NEW SEC/////
if(isset($_POST['newPic'])){
	if(!empty($_POST['secTitle'])){
		$table = "home_pics_".$_POST['secTitle'];
	}else{
		$table = "home_pics_".$_SESSION['title'];
	}
    $tblrslt = mysqli_query($dbCon,"SHOW TABLES LIKE '$table'"); 
	if(mysqli_num_rows($tblrslt) == 0){
		$qry = "CREATE TABLE `$table`(
						`id` INT NOT NULL AUTO_INCREMENT ,
						`home_title` VARCHAR(50) NULL DEFAULT NULL ,
						`home_pictures` VARCHAR(50) NOT NULL ,
						`date` DATE NOT NULL ,
				PRIMARY KEY (`id`)) ENGINE = InnoDB";	  
		///////////////////////////////////////////////////////		
		mysqli_query($dbCon,$qry) or die("Coulnt make tbl. ".mysqli_error($dbCon));
		///////////////////////////////////////////////////////
		$title = $_SESSION['title'];
	}
	global $table;
?> 

<?php /////IF USER ONLY UPLOADS PIC////////'edit' = pic upload & 'newSec' = new desc
 
	if((isset($_GET['edit'])) 
	 && !empty($_POST['secTitle'])
	 && strlen($_POST['secTitle']) > '1'){
		 		 
		$title = strip_tags(trim($_POST['secTitle']));
	////////////////////////////////////////////////////////////////// 
	$u = $_POST['user'];
    //////////////////////////////////////////////////////////////////	
	if(mysqli_num_rows(mysqli_query($dbCon,"SELECT `title` 
											FROM `home` 
											WHERE `title` 
											LIKE '{$_POST['secTitle']}'")) == 0){  
		  $q = "INSERT INTO `home`(
							`title`,
							`member`,
							`date`) 
					VALUES ('$title',
							'$u',
							now())";
		////////////////IF TBL !EMPTY THEN UPDATE///////////				 
		}else{
			$q = "UPDATE `home`
				  SET `member` = '{$_SESSION['username']}',
					  `date` = NOW()
				  WHERE `title` 
				  LIKE '{$_POST['secTitle']}'";
		}	
			$_SESSION['title'] = $_POST['secTitle'];
			$_SESSION['t'] = $_POST['secTitle'];
			global $title;	
	///////////////////////////////////////////////////////////////////////////////		
	mysqli_query($dbCon,$q) or die("Coulnt insert info.. ".mysqli_error($dbCon));
	///////////////////////////////////////////////////////////////////////////////	
	}
/////////ELSE IF USER SUBMITTING ENTIRE SECTIO FILLED/////
}elseif(isset($_POST['newSec'])
	&& !empty($_POST['secDesc'])
	&& strlen($_POST['secDesc']) > '1'){
		////////////////////////////
		$desc = strip_tags(trim($_POST['secDesc']));
		$desc = mysqli_real_escape_string($dbCon,$desc);

///////////////////////////////////////////////////////////////////////////////		
if(mysqli_num_rows(mysqli_query($dbCon,"SELECT `description` 
										FROM `home` 
										WHERE `title` 
										LIKE '{$_SESSION['title']}'")) == 0){  
		  $q = "INSERT INTO `home`(
							`description`) 
					VALUES ('$desc')
					WHERE `title` 
					LIKE '{$_SESSION['title']}'";
		////////////////IF TBL !EMPTY THEN UPDATE///////////				 
		}else{
			$q = "UPDATE `home`
				  SET `description` = '{$_POST['secDesc']}',
					  `date` = NOW()
				  WHERE `title` 
				  LIKE '{$_SESSION['title']}'";
		}	

		global $title;	
///////////////////////////////////////////////////////////////////////////////		
  mysqli_query($dbCon,$q) or die("Coulnt insert info.. ".mysqli_error($dbCon));
///////////////////////////////////////////////////////////////////////////////	
	}else{
		//$maxUpl = NULL;

		$desc = NULL;
 	}
	global $desc;
  if(!isset($table)){
	  //$_SESSION['title'] = NULL;

	  }
  if(isset($_SESSION['t']) && $_SESSION['title'] !== $_SESSION['t']){
	  $_SESSION['title'] = NULL;	  
  }
  if(isset($_REQUEST['secDesc']) && strlen($_REQUEST['secDesc']) > '1'){
	 $dscPosted = true;
  }else{
	  $dscPosted = NULL;
  }	  
	?> 
 <?/// SECTION EDIT ROW START \\\?>
 <?/// SECTION EDIT ROW START \\\?>
 <?/// SECTION EDIT ROW START \\\?>
 <form enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['PHP_SELF']."?edit#adminEdit")?>" target='_self' method="POST" class='form-control-group'>	  
  <div class='col-lg-1' >&nbsp;</div>
   <div class='col-lg-10' style='box-shadow:0px 5px 7px #111;background-color:#888;margin-top:10px;border-top:15px solid transparent;border-radius:8px 8px 0 0;'>
    <p align='left' id='main-p-img' title='OMFG I <3 JAVASCRIPT..'>
	 <span class='lead'>
	 
	  <?// section title \\?>
	  <strong>
	   Enter Title
	  </strong>
	</span>   			
	
<?php
///// IF ISSET newPic //////////
///// IF ISSET newPic //////////
///// IF ISSET newPic //////////
 if(isset($_REQUEST['newPic'])){
	 $newpic = true;
	 $title = $_SESSION['title'];
 }
 global $title;
 global $newpic;
?>
	<input id='nputTitle' type='name' onKeyDown='showUplSec(this.value)' onkeyup='titlePrev(this.value)' maxlength='30' value='<?=echoIfIsset($newpic,$title,'')?>' class='input input-lg form-control' placeholder='Enter Title of Section' name='secTitle' <?=echoIfIsset($newpic,'disabled','')?> required />

<?php //CHK IF USR DELETES SECTION //////
	if(isset($_GET[md5('del')]) && !empty($_GET[md5('del')])){
	 if(isset($_SESSION['title'])){
		 $_SESSION['title'] = NULL;
	 }
	  $eyeD = $_GET[md5('del')];
	  $qq = "SELECT `title` FROM `home` WHERE `id` = '$eyeD'";
		$r = mysqli_query($dbCon, $qq)or die(mysqli_query($dbCon));
		 while($rr = mysqli_fetch_assoc($r)){
			$tname = "home_pics_".$rr['title'];
		 
		$qry = "DROP TABLE `$tname`";
			/////////////////////////
			mysqli_query($dbCon, $qry) or die('couldnt drp tbl, '.mysqli_error($dbCon));;
			/////////////////////////
			break;
		 }///////////////////////////			
		$Q = "DELETE FROM `home` WHERE `id` = '$eyeD'";
			/////////////////////////
			mysqli_query($dbCon, $Q) or die('couldnt delete row in home tbl, '.mysqli_error($dbCon));
	}///END OF SECTION DELETE////////	
/////////////////////////////////////	
?>
 
<?php /// UPLOAD PIC SECTION FOR BTOTTOM SECTIONS////////
$maxUpl = NULL;
global $title;

///CHK IF 4+ PICS IN DB \\\\

if(isset($_GET['edit'])){
	if(!empty($table)){
		$chkTable = $table;
		$t = $title;
	}
	elseif(!empty($_SESSION['title'])){
		$chkTable = "home_pics_".$_SESSION['title'];
		$t = $_SESSION['title'];
	}
	else{
		$chkTable = "home_pics_".$_SESSION['t'];
		$t = $_SESSION['t'];		
	}
$qry = ifNorowExistEcho($chkTable,"SELECT `home_pictures` 
									FROM `$chkTable` 
									WHERE `home_title` = '$t' 
									ORDER BY `id` ASC","");
 if($qry){
	 $r = mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
	 if(mysqli_num_rows($r) == 5){
		 $maxUpl = true;		 
	 }elseif(mysqli_num_rows($r) < 5){
		 $maxUpl = NULL;
	 }	
   }
 }
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//$error = NULL;
if(!isset($maxUpl)){

if(isset($_FILES['uploadedfile'])){
	$file = $_FILES['uploadedfile'];
	$user = $_SESSION['username'];	
		///file properties					
		$file_name = $file['name'];			
		$file_tmp = $file['tmp_name'];		
		$file_size = $file['size'];			
		  global $file_name;				
			///file extension & checks		
			$file_ext = explode('.', $file_name);
 			$file_ext = end($file_ext);	
			$file_ext = strtolower($file_ext);
										
			$allowed_ext =  array( 'jpg', 'png', 'bmp', 'gif');
																	
		  if(in_array($file_ext, $allowed_ext)){ 		   	
		   
			if($file_size <= 1000000){								
			   									
																	
			   $file_name_new = uniqid('', true) . '.' . $file_ext;
																	
			   $file_destination = "upl/news_pics/".$file_name_new;
				 
		 																
 if(move_uploaded_file($file_tmp, $file_destination)){
	 
    echo "<b class='has-success well center-block text-center lead fade-in'>Cool You Successfully Uploaded Pic!</b>";
	$errors = false;					
	$pic_upld = 'upl/news_pics/'.$file_name_new;							
		} // END OF IF_MOVE_UPL_FILE			
		else{
			 $errors = true;
 			 $pic_upld = false;
		}
	  } 								
    } 
  }//END OF IF FILES(ISSET)	
}//END OF IF MAX UPLOADS NOT REACHED  
/////////////////////////////////////////////////////////		
/////////////////////////////////////////////////////////		
/////////////////////////////////////////////////////////	
global $pic_upld;
 ?>

<?=echoIfIsset($maxUpl,"<b class='well well-sm bg-danger center-block text-center lead fade-in'>Reached Upload Capacity!</b>","")?>
<br>	
										
<?// dfault pic \\?>							
 <span class='pull-left' style='z-index:1;position:relative;'>															
  <img src='<?=echoIfIsset($pic_upld,$pic_upld,'css/pix/x61.jpg')?>' width='210px' alt='Yoyo' class='<?=echoIfIsset($maxUpl,'img-responsive img-rounded','img-responsive img-circle')?>' style='border:8px solid #777;' />	  																	
 </span>
 
<div class='<?=echoIfIsset($_GET['edit'],'pull-left text-left','hide')?>' style='background-color:#777;margin-top:5px;margin-left:-55px;padding-left:50px;padding-right:10px;border-radius:0 7px 7px 0;'>
 
 <ul style='max-height:230px;padding-top:10px;' class=' list-group'> 
											
	 <?php ///chk 4 more pics in db ///				
	if(isset($pic_upld)){		
		global $desc;
		global $pic_upld;															
		global $file_name_new;															
		global $table;
		global $title;
	if(isset($table)){
		$tble = $table;		  
	  }	
	  elseif(isset($title)){
		$tble = "home_pics_".$title;
	  }elseif(!empty($_POST['secTitle'])){
		  $tble = "home_pics_". $_POST['secTitle'];
	  }elseif(isset($_SESSION['title'])){
		$title = $_SESSION['title'];
		$tble = "home_pics_".$_SESSION['title'];
	  }elseif(isset($_SESSION['t'])){
		$title = $_SESSION['t'];
		$tble = "home_pics_".$_SESSION['t'];
	  }else{
			die("Couldn't find table name via title name");
	  }		
 		 $q = "INSERT INTO `$tble`(`home_title`,	
								   `home_pictures`,
								   `date`) 			
						VALUES (					
								'$title',
								'$file_name_new',
								NOW())";								 
		///////////////////////////////////////////////////////	
		mysqli_query($dbCon, $q) or die(mysqli_error($dbCon));
		///////////////////////////////////////////////////////	
$prePics = ifNorowExistEcho($table,"SELECT `home_pictures` FROM `$tble` WHERE `home_title` LIKE '$title' ORDER BY `date` DESC","");																		
		//////////////////////
	if(!empty($prePics)){
		$rzlt = mysqli_query($dbCon,$prePics) or die(mysqli_error($dbCon));
		  while($rw = mysqli_fetch_assoc($rzlt)){
			foreach($rw AS $pic[]){
			if(!empty($pic)){ 
				if(!empty($pic[0])){
				$pic1 = "upl/news_pics/".$pic[0]; 
				}else{
				 $pic1 = "css/pix/car.jpg";
				}
				if(!empty($pic[1])){
				$pic2 = "upl/news_pics/".$pic[1]; 
				}else{
				 $pic2 = "css/pix/car.jpg";					
				}
				if(!empty($pic[2])){
				$pic3 = "upl/news_pics/".$pic[2]; 
				}else{
				 $pic3 = "css/pix/car.jpg";					
				}
				if(!empty($pic[3])){
				$pic4 = "upl/news_pics/".$pic[3]; 
				}else{
				 $pic4 = "css/pix/car.jpg";					
				}
				if(!empty($pic[4])){
				$pic5 = "upl/news_pics/".$pic[4]; 
				}else{
				 $pic5 = "css/pix/car.jpg";
					} ////////REPLACE PICS WITH DEFAULT CAR PIC IF EMPTY
				 break;
				} ////////////REPLACE PICS WITH DEFAULT CAR PIC IF EMPTY		 
			}
		}		 
	}else{
		if(!empty($pic[0])){
		$pic1 = "upl/news_pics/".$pic[0]; 
		}elseif(empty($pic1)){
		 $pic1 = "css/pix/car.jpg";
		}
		if(!empty($pic[1])){
		$pic2 = "upl/news_pics/".$pic[1]; 
		}elseif(empty($pic2)){
		 $pic2 = "css/pix/car.jpg";					
		}
		if(!empty($pic[2])){
		$pic3 = "upl/news_pics/".$pic[2]; 
		}elseif(empty($pic3)){
		 $pic3 = "css/pix/car.jpg";					
		}
		if(!empty($pic[3])){
		$pic4 = "upl/news_pics/".$pic[3]; 
		}elseif(empty($pic4)){
		 $pic4 = "css/pix/car.jpg";					
		}
		if(!empty($pic[4])){
		$pic5 = "upl/news_pics/".$pic[4]; 
		}elseif(empty($pic5)){
		 $pic5 = "css/pix/car.jpg";
		}else{
			////CONTINUE
		 break;
			}			 	
		}
		?>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='<?=$pic1?>' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='<?=$pic2?>' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='<?=$pic3?>' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='<?=$pic4?>' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		 </ul>		
		<?php
	}										
   else{									
		?>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='css/pix/x61.jpg' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='css/pix/x61.jpg' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='css/pix/x61.jpg' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		   <li class='<?=echoIfIsset($maxUpl,'hide','list-inline')?>'> <img class='list-group-item' src='css/pix/x61.jpg' width='100px' alt='Sample' class='img-responsive img-rounded' /></li>
		 </ul>
		<?php
		}	///END OF PICTURE PORTION OF EDIT												
	 ?>
<center>
 <?///show pic upload error if error \\\?>
 <?///show pic upload error if error \\\?>
   <?php 
	if(isset($errors) && $errors == true){
 		echo "
 		<script>
		 function err(){
			 alert(' Picture Was not uploaded due to wrong size or wrong format');
		 }
			err();
		</script>
		";
//if(isset($_FILES['uploadedfile'])){
 	 if(isset($_SESSION['title']) || !empty($_SESSION['t'])){
	  if(isset($_SESSION['title']) && !empty($_SESSION['title'])){
		  $st = $_SESSION['title'];
	  }else{
		  $st = $_SESSION['t'];		  
	  } 
		$Q = "DELETE FROM `home` WHERE `title` = '$st'";
		/////////////////////////
		@mysqli_query($dbCon, $Q);
		///////////////////////// 	  
		$tb = 'home_pics_'.$st;
		$t = "SHOW TABLES LIKE `$tb`";  
	  if(mysqli_num_rows(mysqli_query($dbCon,$t)) > 0){			 
		$qry = "DROP TABLE `$tb`";
		/////////////////////////
		mysqli_query($dbCon, $qry);
		/////////////////////////
	   $_SESSION['title'] = NULL;		  	
	   $_SESSION['t'] = NULL;		  	
		}	
	  }///////////////////////////			
	//}///END OF SECTION DELETE////////			
 echo "<script> window.open('index.php#trgt5','_self');</script>";
}   
	?>  
 <sub style='color:#ddd;font-size:28px;display:inline;width:50px;margin:0 auto;padding-bottom:10px;' class='<?=echoIfIsset($_GET['edit'],'text-left','hide')?>'>
 Uploaded Picture
 </sub>
</center>	 
</div>
	<br><br>
	 <span id='uplInputs' class='<?=echoIfIsset($pic_upld,'',' collapse ')?>' onmouseover='this.getElementsByTagName("ul")[0].className="pull-right fade in";' >
																				
	  <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/><!--bytes-->
	  <input type="hidden" name="user" value="<?=$_SESSION['username']?>" />
	  <input name="uploadedfile" type="file" type='button' class='btn btn-block btn-warning' style='border-bottom:#aaa;'  <?=echoIfIsset($maxUpl,'disabled ','')?> <?=echoIfIsset($pic_upld,'',' required')?> />
	   <ul class='pull-right fade' style='width:60%;margin-right:5%;'>
	    <li style='padding-left:20%;margin-left:-17%;padding-top:10px;opacity:.5;' class='lead'>
		 Upload up to a maxiumum of 5 pictures.
		</li>
	   </ul>

	 <div class='pull-left' style='border:1px solid #fff;border-top:0;border-radius:0 0 8px 8px;box-shadow:0px 4px 5px #111;background-color:#aaa;padding:5px;'>
	  <input type="submit" name="newPic" value="Upload" type='button' class='btn btn-default pull-left' style='color:#999;font-weight:bold;' <?=echoIfIsset($maxUpl,'','')?> ></input>
	  <input type="reset" name="" value="Clear"  type='button' class='btn btn-default pull-left' style='color:#999;font-weight:bold;' <?=echoIfIsset($maxUpl,'','')?> ></input>
	 </div>
	 </span>		
	</div>			
   </p>				
					
  <div class='col-lg-1'>&nbsp;</div> 
 </div>											
<?// EDIT ROW 2 START DESCRIPTION \\?>
<?// EDIT ROW 2 START DESCRIPTION \\?>
 <div class='row' style='border-radius:0 0 10px 10px;'>		
  <div class='col-lg-12' style='box-shadow:0px 3px 5px #111;background-color:#888;border-radius:10px;min-height:250px;margin-bottom:10px;' >
		 <p align='right' valign='center' >
		  <caption>
		   <h2 class='lead' style='font-weight:bold;color:#ddd;font-size:21px'>
		    Enter Description
			 <span></span>
		   </h2> 
		  </caption>
		  <?php
		   if(isset($_POST['newPic'])){
			   $newpic = true;
			   global $newpic;
		   }
		   global $desc;
		  ?>
		  <textarea maxlength='500' onKeyUp='descPrev(this.value)' onKeyDown='chkTxtarea(this.value)'  id='txtarea' value='<?=echoIfIsset($dscPosted,$desc,'')?>' name='secDesc' size='300' rows='4' class='textarea input-lg form-control' placeholder='Enter Description Summary...' <?=echoIfIsset($dscPosted,'disabled','')?> <?=echoIfIsset($maxUpl,'autofocus','')?>  ></textarea>
		    
			<span class='well well-sm center-block' style=' width: ;padding:4px auto 4px 1%;margin-left:3%;margin-right:3%;'>
			 <?/// newSec \\\?>
			 <?/// newSec \\\?>
			 <?/// newSec \\\?>
			 <input type='submit' id='sbt' class='input input-lg btn btn-info' type='button' name='newSec' value='Add' style='min-width:90px;' <?=echoIfIsset($maxUpl,'','')?> />
			 <input type='reset' class='input input-lg btn btn-info' type='button' value='Clear' style='min-width:90px;' />
			</span>
		 </p>	
  </div>		
 </div>			
</form>   		  
<?php
 if(isset($_POST['newSec'])){
	if(isset($_GET['edit'])){
	 	if(isset($dscPosted)){
		  $_SESSION['title'] = NULL;
		  $_SESSION['t'] = NULL;
 
	 echo "<script>window.open('index.php#adminEdit','_self');</script>";
	}
  }
}

?>				
<?// END OF EDIT ROW 2 DESCRIPTION \\?>
<?// END OF EDIT ROW 2 DESCRIPTION \\?>
<?///////////////////////////////////?>
<?///////////////////////////////////?>
<?//////////////////////////////////////////?>	 
<?//////////////////////////////////////////?>	 
<?////PREVIEW NEW ROW IF 'newSec' ISSET \\\\?>
<?////PREVIEW NEW ROW IF 'newSec' ISSET \\\\?>
<?////PREVIEW NEW ROW IF 'newSec' ISSET \\\\?>
   
	   <b onmouseover='document.getElementById("popup2").className = "well well-sm center-block fade in"' onMouseOut='document.getElementById("popup2").className = "well well-sm center-block fade"' class='well well-sm center-block'  style='color:#ddd;background-color:rgba(54, 70, 83, 0.63);'>
	  <div id='popup2' class='well well-sm center-block fade' style='z-index:900;font-size:22px;font-weight:bold;letter-spacing:2.6px;padding:10px 5px;display:block;width:40%;margin-top:70px;position:absolute;left:30%;right:auto;border:5px solid #ddd;'>JAVASCRIPT FTW SON! OsUjI_AlL_dAy</div>
	 <button type='button' class='btn btn-lg btn-danger center-block well' data-toggle='collapse' data-target='#secPrevArea' >
	  Live-Preview
	 </button>
	  </b>
	<?php
	 global $table;
	  if(empty($table) && !empty($_SESSION['title'])){
		$table = "home_pics_".$_SESSION['title'];
	  }else{
		  $table = 'home_pics_ex';
	  }
		$prevPics = ifNorowExistEcho($table,"SELECT `home_pictures` FROM `$table` WHERE `home_title` LIKE '$title' ORDER BY `date` DESC","");																		
		//////////////////////
	if(!empty($prevPics)){
		$rzlt = mysqli_query($dbCon,$prevPics) or die(mysqli_error($dbCon));
		  while($rw = mysqli_fetch_assoc($rzlt)){
			foreach($rw AS $pic[]){
			if(!empty($pic)){ 
				if(!empty($pic[0])){
				$pic1 = "upl/news_pics/".$pic[0]; 
				}else{
				 $pic1 = "css/pix/car.jpg";
				}
				if(!empty($pic[1])){
				$pic2 = "upl/news_pics/".$pic[1]; 
				}else{
				 $pic2 = "css/pix/car.jpg";					
				}
				if(!empty($pic[2])){
				$pic3 = "upl/news_pics/".$pic[2]; 
				}else{
				 $pic3 = "css/pix/car.jpg";					
				}
				if(!empty($pic[3])){
				$pic4 = "upl/news_pics/".$pic[3]; 
				}else{
				 $pic4 = "css/pix/car.jpg";					
				}
				if(!empty($pic[4])){
				$pic5 = "upl/news_pics/".$pic[4]; 
				}else{
				 $pic5 = "css/pix/car.jpg";
					} ////////REPLACE PICS WITH DEFAULT CAR PIC IF EMPTY
				 break;
				} ////////////REPLACE PICS WITH DEFAULT CAR PIC IF EMPTY		 
			}
		}		 
	}else{
		if(!empty($pic[0])){
		$pic1 = "upl/news_pics/".$pic[0]; 
		}elseif(empty($pic1)){
		 $pic1 = "css/pix/car.jpg";
		}
		if(!empty($pic[1])){
		$pic2 = "upl/news_pics/".$pic[1]; 
		}elseif(empty($pic2)){
		 $pic2 = "css/pix/car.jpg";					
		}
		if(!empty($pic[2])){
		$pic3 = "upl/news_pics/".$pic[2]; 
		}elseif(empty($pic3)){
		 $pic3 = "css/pix/car.jpg";					
		}
		if(!empty($pic[3])){
		$pic4 = "upl/news_pics/".$pic[3]; 
		}elseif(empty($pic4)){
		 $pic4 = "css/pix/car.jpg";					
		}
		if(!empty($pic[4])){
		$pic5 = "upl/news_pics/".$pic[4]; 
		}elseif(empty($pic5)){
		 $pic5 = "css/pix/car.jpg";
		}else{
			////CONTINUE
		 //break;
		}			 	
	}
 
 ?>
 <div class='content content-1 collapse' id='secPrevArea' style='background-color:rgba(58, 75, 90, 0.78);border-radius:10px;padding:10px 3px;border:1px solid #999;'>
	  <div class='container-fluid'>
	   <div class='row' style='border-radius:10px 10px;'>
		<div class='col-lg-8' >		 
		  <p align='left' id='main-p-img'>
			 <span id='main-p-title' class='lead'>
			
			<?//// TITLE SEC \\\\?>
			<?php global $title; $avatr = get_memsAvatr($_SESSION['username'])?>
			 <?=echoIfIsset($title,$title,'Title Here')?></span>
			 <sub class='pull-left' ><?=_USER_?></sub>												

			 
			  <img src='<?=echoIfIsset($avatr,'upl/'.$avatr,$pic1)?>' width='250px' alt='Yoyo' class='img-responsive img-circle' style='border:8px solid #777;' />	  																	
			 
			 </p>
			
			<?/// PREVIEW DESCRIPTION SECTION \\\?>
			<p align='center' valign='top' id='top-text-sec-prev' >
			 <?=DT?> 
			</p>
			
		</div>
		 <div class='col-lg-4'>
			<p align='center' valign='top' style='background-color:rgba(0,0,0,0.15);'>
			 <strong style='float:left;' id='titleSec'>Images</strong>						
 			 <span class='pull-left' style='z-index:1;position:relative;'>															
			  
			  <img src='<?=$pic1?>' width='250px' alt='Yoyo' class='img-responsive img-rounded' style='border:2px solid #777;' />	  																	
			
			</span>
			   </p>						
				<ul style='max-height:230px;overflow:auto;'> 
					<li>
					 <img class='' src='<?=$pic1?>' width='50px' alt='Sample' class='img-responsive img-rounded' />
					</li>
					<li>
					 <img class='' src='<?=$pic2?>' width='50px' alt='Sample' class='img-responsive img-rounded' />
					</li>
					<li>
					 <img class='' src='<?=$pic3?>' width='50px' alt='Sample' class='img-responsive img-rounded' />
					</li>
					<li>
					 <img class='' src='<?=$pic4?>' width='50px' alt='Sample' class='img-responsive img-rounded' />
					</li>
					
				</ul>
		</div>
	   </div>
	  </div>
	 </div>			   
   </div>
  </div>		
  <div id='trgt5'></div>
 <?///////---- ENF OF PREVIEW SECTION-----\\\\\\\\?>

<?//// END OF ADMIN EDIT SECTION \\\\\?><?//// END OF ADMIN EDIT SECTION \\\\\?>
<?//// END OF ADMIN EDIT SECTION \\\\\?><?//// END OF ADMIN EDIT SECTION \\\\\?>
<?//// END OF ADMIN EDIT SECTION \\\\\?><?//// END OF ADMIN EDIT SECTION \\\\\?>

 <?///************ CONTENT CONTENT CONTENT **************\\\?>
 <?///************ CONTENT CONTENT CONTENT **************\\\?>
 <?///************ CONTENT CONTENT CONTENT **************\\\?>
 <?///************ CONTENT CONTENT CONTENT **************\\\?>
 <?///************ CONTENT CONTENT CONTENT **************\\\?>
 
 <?php include("cont1rows.php"); ?>		 
 
		
<?/// PAGINATION \\\?><?/// PAGINATION \\\?><?/// PAGINATION \\\?>
<?/// PAGINATION \\\?><?/// PAGINATION \\\?><?/// PAGINATION \\\?>

</section>


