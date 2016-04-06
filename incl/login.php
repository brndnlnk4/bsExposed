<?php	
    //require($_SERVER['DOCUMENT_ROOT']."/bs_exposed/ses.php");
if(isset($_SESSION['username'])){
	 $mem_id = getMemIdByMemName(_USER_);
}else{
	$mem_id = '';	
}
/////////////////////////////////////////////////////////
?> 
<center class='<?php if(isset($_GET[md5('max')]) && $_GET[md5('max')] == 'faill'){ echo 'well well-sm'; }else{ echo 'hide';} ?>' style='color:#ddd;font-weight:bold;'>Wrong Login and Password</center>
<?php  ////message if username or password is wrong
if(isset($_GET[md5('login')]) && $_GET[md5('login')] == 'fail'){
			//if(isset($_GET[md5('max')]) || !empty($_GET[md5('wrong')])){
		$qqR = "SELECT * 
			FROM `login_attempts`
			WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'
			AND `date_exp` < NOW()";
 		 if(mysqli_num_rows(mysqli_query($dbCon,$qqR)) > '0'){
			 $q = "DELETE FROM `login_attempts` 
					WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
					mysqli_query($dbCon, $q);
			}	
		//}
		echo "<span class='well well-lg center-block text-center' style='font-weight:bold;color:#ddd;'>Wrong Password and Username</span>";
}elseif(isset($_GET[$wrong]) && $_GET[$wrong] == 'fail'){
			//if(isset($_GET[md5('max')]) || !empty($_GET[md5('wrong')])){
		$qqR = "SELECT * 
			FROM `login_attempts`
			WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'
			AND `date_exp` < NOW()";
 		 if(mysqli_num_rows(mysqli_query($dbCon,$qqR)) > '0'){
			 $q = "DELETE FROM `login_attempts` 
					WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
					mysqli_query($dbCon, $q);
			}	
		//}
	
		echo "<span class='well well-lg center-block text-center' style='font-weight:bold;color:#ddd;'>Yo sorry, too many login attempts. Just call or text Brandon</span>";
}elseif(isset($_GET[md5('wrong')])){
		echo "<span class='well well-lg center-block text-center' style='font-weight:bold;color:#ddd;'>Try entering Username and Password again.</span>";			
}else{
	if(isset($_GET[md5('max')]) && $_GET[md5('max')] == ''){
				//if(isset($_GET[md5('max')]) || !empty($_GET[md5('wrong')])){
		$qqR = "SELECT * 
			FROM `login_attempts`
			WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'
			AND `date_exp` < NOW()";
 		 if(mysqli_num_rows(mysqli_query($dbCon,$qqR)) > '0'){
			 $q = "DELETE FROM `login_attempts` 
					WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
					mysqli_query($dbCon, $q);
			}	
		//}
		echo "<span class='well well-lg center-block text-center' style='font-weight:bold;color:#ddd;'>Damn just make a new account man ffs, or wait an hour.</span>";		
	}
}
?>
  <div class='login form-horizontal'>
	
	 <ul class='list-group' id="<?=switchIfLoggedIn("memDropdown","hide")?>" >	  
	  <li class='dropdown list-group-item' >
	   <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
	    <img src='css/pix/ico/icon_profile2.png' width='20px' class=' ' />
		 <b><?=_USER_?>&nbsp;<span class='caret'></span></b>
		
	     </a>
		  <ul class='dropdown-menu'>
			<li  class='list-group-item' ><a href='memProf.php#trgt4' target='_self'>Profile</a></li>
			<li  class='list-group-item' ><a href='memProf.php?YoMsg=<?=md5('read')?>#trgt3' target='_self'>Messages</a></li>
			<li  class='list-group-item' ><a href='<?="mem.php?".md5('p').'='.$mem_id?>#trgt1' target='_self'>View Profile</a></li>
			<li  class='list-group-item' ><a href='?logout=1' target='_self'>Logout</a></li>
		  </ul>
		 
		<?php //// PULL COLS FROM MSG TABLE AND CHK 4 READ/NOT READ
 		if(isset($_SESSION['username'])){
 		    $qry = "SELECT `message_read` 
                    FROM `member_messages` 
                    WHERE `message_receiver` = '{$_SESSION['username']}'
					AND 
					`message_read` LIKE 'no'
                    ORDER BY `id` DESC";
				$rslt = mysqli_query($dbCon, $qry) or die(mysqli_query($dbCon));
					if(mysqli_num_rows($rslt) > '0'){
						$msgChk = "no"; 
					}else{
						$msgChk = "yes";
					}
				}
		?>
		<?/// SHOW MSG ICON IF MEMBER HAS MSG NOT READ \\\?>
 		  <span class="pull-right" >
	       <img src='\css/pix/ico/Messages.png' class='
		   <?php  if($msgChk){ 
					if(!empty($msgChk) && $msgChk == 'yes'){
						echo "hide";
					}else{
						echo "img-responsive";
						
						}
					}
			?>' width='35px' style='margin-top:-10px;margin-right:0;margin-left:10px;' />
		  </span>	  
 		</li>
	   </ul>
   <div class="<?php switchIfLoggedIn("hide", ""); ?>" >
<?php
///////CHECK IF USR WATIED 30MIN TILL NEXT LOGIN///////
$wrong = md5('wrong');
if(isset($_GET[md5('max')]) || !empty($_GET[md5('wrong')])){
	$qq = "SELECT * 
			FROM `login_attempts`
			WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'
			AND `date_exp` < NOW()";
 		 if(mysqli_num_rows(mysqli_query($dbCon,$qq)) > '0'){
			 $q = "DELETE FROM `login_attempts` 
					WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
					mysqli_query($dbCon, $q);
		 }	
	}else{
 	}
?>	
	<form action='<?=ifGetMd5Then('max','#&'.$wrong.'=fail',"\bs_exposed/incl/loginProcess.php")?>' method='POST' class='form-horizontal' >

	  <?// login and p.w. inputs \\?>
 		<input type='text' name='usr_login' onclick='this.value="";' onfocus='this.value="";' maxlength='50' placeholder='Login' id='usrName' value='Login' class='input-sm' <?=ifGetMd5Then('max','disabled required','required')?>  />
		<input type='password' name='pw'  onclick='this.value="";' maxlength='50' placeholder='Password' class='input-sm' value='Password' <?=ifGetMd5Then('max','disabled required','required')?> />
		<input type='hidden' name='yomama' value='<?=$_SERVER['REMOTE_ADDR']?>' />	
		 <?/// submit and reset btns \\\?>
		  <input type='submit' type='button' class='btn input-sm btn-success' name='submit' value='Login' id='loginYolo' style='box-shadow:0px 3px 4px #333;' />					 
		 <?/// registration button \\\?> 
		  <button type='button' onclick='openFuncUsrReg()' class='btn input-sm btn-primary' name='usr_reg' style='box-shadow:0px 3px 4px #333;' >
			Register
		  </button>					 
	</form>
   </div>
  </div>

<?php /////WILL CHECK 4 USER LOGIN ATTEMPS MORE THAN 5 TIMES \\\\
 $lgn = md5('login');
 	if(!empty($_GET[$lgn]) && $_GET[$lgn] == "fail"){
		$all = "SELECT * 
				FROM `login_attempts`
				WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
	  if(mysqli_num_rows(mysqli_query($dbCon, $all)) == '0'){
		$ins = "INSERT INTO `login_attempts`
				(`ip`,`attempts`,`date`) 
				VALUES ('{$_SERVER['REMOTE_ADDR']}','1',NOW())";
			$r = mysqli_query($dbCon, $ins) or die('stp1 '.mysqli_error($dbCon));
	  }elseif(mysqli_num_rows(mysqli_query($dbCon, $all)) >= '0'){
 		$q = "UPDATE `login_attempts`
			  SET `attempts` = `attempts` +1,
			      `date` = NOW()
			  WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
		$r = mysqli_query($dbCon, $q) or die('stp2 '.mysqli_error($dbCon));
		$rrr = mysqli_query($dbCon,"SELECT `attempts` FROM `login_attempts` WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'");
		while($fld = mysqli_fetch_array($rrr)){ 
		 if($fld['attempts'] >= '5'){
			$qr = "UPDATE `login_attempts`
			  SET `date_exp` = (DATE_ADD(date, INTERVAL '30' MINUTE))
			  WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'";
			 $rr = mysqli_query($dbCon, $qr) or die('stp3 '.mysqli_error($dbCon));
			}
		 break;
		}
	  }else{
 
	  } 
	} 
?>
 