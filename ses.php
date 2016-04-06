 <?// SESSION AND PROCESS OF LOGIN INFO \\?>
 <?// SESSION AND PROCESS OF LOGIN INFO \\?>
<?php //////////////////////////////////
     include_once('incl/loginProcess.php');
////////////////////////////////////////	 
?>
<?php
$logout = md5('logout');
$success = md5('success');
$login  = md5('login');
$wrong  = md5('wrong');
$max = md5('max');
if(isset($newAcct)){

}else{
 	
  if(isset($_GET[$login]) && $_GET[$login] == $success){	 
	  ?>
		 <?/// JAVASCRIPT \\\?>
		 <script>
 		  window.open("\/bs_exposed\/?login","_self");
		 </script>
	<?php
	  }
	  if(isset($_GET[$logout]) && $_GET[$logout] == $success){
	?>
		 <?/// JAVASCRIPT \\\?>
		 <script type='text/javascript'>
		  alert("Successfully Logged Out");
		  window.open("?logout","_self");
		 </script>
	<?php
	  }elseif(isset($_POST['usr_login']) && $_POST['usr_login'] == 'Login'){
					header("Location:\bs_exposed/?$wrong");
		} 	 
	  ?>
<?php ///////SESSION & PROCESSING\\\\\\\\\\
 require_once("incl/sv.php");

$logout = md5('logout');
$success = md5('success');
$login  = md5('login');
$wrong  = md5('wrong');
$max = md5('max');
global $login;

 if(isset($_GET['logout']) && $_GET['logout'] == '1'){
	$d8 = date('Y-m-d');
	$qry = "UPDATE `members` 
			SET `last_login` = '$d8'
			WHERE `mem_username` = '{$_SESSION['username']}'";
  			$_SESSION = array();
			session_unset();
			session_destroy();
			//unset($_SESSION['username']);
			header("Location: ?$logout=$success");
 			//break;
	} elseif(!empty($_POST['usr_login'])){
	   session_start();
	/////////////SESSION STARTED/////////////////			
	/////////////SESSION STARTED/////////////////	

if((isset($_POST['usr_login']) && isset($_POST['pw']))){
	if((strlen($_POST['usr_login']) > '0') && strlen($_POST['pw']) > '0'){
		$login_name = trim($_POST['usr_login']);
		$login_name = mysqli_real_escape_string($dbCon,$login_name);
		$login_pw = trim($_POST['pw']);
		$login_pw = mysqli_real_escape_string($dbCon,$login_pw);
		 $qry4usr = "SELECT `mem_username`,`mem_password`
					 FROM `members`
					 WHERE `mem_username` = '$login_name'
					 AND 
					 `mem_password` = '$login_pw'";
		 $rslt = mysqli_query($dbCon, $qry4usr) or die(mysqli_error($dbCon));

		if(mysqli_num_rows($rslt) >= '1'){
			$qree = "SELECT `id`
                FROM `members`
                WHERE `mem_username` = '$login_name' ";
			$qre = mysqli_query($dbCon, $qree);
       
		$login_name = strip_tags($_POST['usr_login']);
		$_SESSION['username'] = $login_name;	
			////////////// REDIRECT IF LOGIN SUCCESSFULL\\\\\\\\\
 				header("Location:\bs_exposed/"."?".$login."=".$success);
				
	 
			}elseif(($_POST['usr_login'] !== 'Login') && $_POST['pw'] !== 'Password'){
			////////////// REDIRECT IF LOGIN FAILED\\\\\\\\\
			$qr = mysqli_query($dbCon,"SELECT `attempts` FROM `login_attempts` WHERE `ip` = '{$_SERVER['REMOTE_ADDR']}'");
 			 if(mysqli_num_rows($qr) > 0){
			 while($fld = mysqli_fetch_assoc($qr)){ 
			  if($fld['attempts'] < '7'){	
				
				header("Location:\bs_exposed/"."?".$login."=fail");
				  				 
				}else{
				
				header("Location:\bs_exposed/"."?".$max);
					
			} 	
		  }
	     }else{
				header("Location:\bs_exposed/"."?".$login."=fail");
		 }
		} //END OF USRNME & PW != DFAULT VALUES 
	 else{
				header("Location:\bs_exposed/?$wrong");
		}	
	  } 
    } 	 
  }
} 	 
?>
<!-----------------------------------------░░░░░░░░░░░------
░░░░░░░░░░░░░░░ ▓▓███████▓▒░░░░░░░░░░░░░░░░*DEVELOPER*░░░░░░
░░░░░░░░░░░ ▓██████▓▓▓▓███████▓░░░░░░░░░░░░___NAME___ ░░░░░░
░░░░░░░░░████▒░░░░░░░░░░░░░▓████ ░░░░░░░░░░ ███░█░░░█ ░░░░░░
░░░░░░░███▓░░░░░░░░░░░░░░░░░░░░░▓██ ▒░░░░░░ █░█░███░░ ░░░░░░
 ░░░░▒██░░░░░░░░░░░░░░░░░░░░░░░░░░░██░░░░░░ █░█░█░█░█ ░░░░░░
 ░░░██░░▓▓▓▓▓▓▓▒░░░░░░░░░░▒▓███████▓░█▒░░░░ ███░███░█ ░░░░░░
░░██░▒███████▓▒▒░░░░░░░░▒██████████▓▓█ ░░░░*Obi-Osuji*░░░░░░
░░█░▒██████████▓░░░░░░░▒██████▓▒▒▓██░██ ░░░░░░░░░░░░░░░░░░░░
░██░██░░░░░▓▓▓███▒░░░░░█████░░░░░░░██░█ ░░░░░░░░░░░░░░░░░░░░
░█░██░░░░░░░░▓▓██▓░░░░░░██▒░░░░░░░░░▓░██ ░░░░░░░░░░░░░░░░░░░
▒█░▓░░░░░░░░░░░▓█░░░░░░█▓░░░░░░░░░░░░░▓█ ░░░░░░░░░░░░░░░░░░░
 █▓░░░░░░░▓███▓▓░░▒█░░░█░░░▒██▓▓▓█░░░░▓░█░░░░░░░░░░░░░░░░░░░
█▒▒░░░░░█▓░▒▒▒▓█▓░▒▒░░▓░░█▓▓▓██▓▓█░░░▓░█ ░░░░░░░░░░░░░░░░░░░
█░▒▒░░░█▓▓████▓░█▒░▒░░▓░█▓███████▓▓░░█░█ ░░░░░░░░░░░░░░░░░░░
█░░▓░░▒█████████▓█░▒░░▒░█▓███████▒███░░█ ░░░░░░░░░░░░░░░░░░░
█░░█▒▓█▓█████▓▓▓█░░▒░░▒░░█▓▒▒▒░░░▒███░▓█ ░░░░░░░░░░░░░░░░░░░
█░░▒███▓▓▓▓▓▓▓▒░░░░▒░░▒░░░░▓▓▓▓▓▓▒░▒██░█ ░░░░░░░░░░░░░░░░░░░
█▒░▓▓░░░░░░░░░░░░░░▒░░▒▒░░░░░░░░░░░░░█▓█ ░░░░░░░░░░░░░░░░░░░
█░░░░░░░░░░░░░█░░░░░░░░░░▒█░░░░░░░░░░░░█ ░░░░░░░░░░░░░░░░░░░
█░░░░░░░░░░░░█▓░░░░░░░░░░░██░░░░░░░░░▓░█ ░░░░░░░░░░░░░░░░░░░
█░░░░░░░░░░▓██▒░▓░░░░░░░█░▓▓██░░░░░░░█░█ ░░░░░░░░░░░░░░░░░░░
█░▒░░░░░░▓██░░█░██▓░░░░███▓░░██▓░░░░█▓░█ ░░░░░░░░░░░░░░░░░░░
█░░█░░░▓██▓░░░▒▓▒███▓▓██░▒░░░░░██▓▓█▓░░█ ░░░░░░░░░░░░░░░░░░░
█░░░█████░░░░░░░░███████░░░░░░░░████░▓░█ ░░░░░░░░░░░░░░░░░░░
█▒░░░▓███▒░░░░░░████▒▓███▒░░░░░▓███░░▓░█ ░░░░░░░░░░░░░░░░░░░
█▓░░░▓▒███▒░▒▓█████▒░░█████████████░▒▓▓█ ░░░░░░░░░░░░░░░░░░░
█░░░░░▓░██████████▒░░░░█████████▒█░░▓█▓█ ░░░░░░░░░░░░░░░░░░░
▓█░░░░░▓░██████████████████████▒▓█░░█░▒█ ░░░░░░░░░░░░░░░░░░░
░█░░░░░░██░░░░░░░░░░░░░░░░░░░░▓█▒░▒█░░ █▓░░░░░░░░░░░░░░░░░░░
░█▓░▒░░░░█████████▓▓▓▓▓██████▓▓█░░█▒░░█ ░░░░░░░░░░░░░░░░░░░░
░▓█░▒▓░░░▒█░░▒▒▓▓▓██████▒░░░░░█░░█▓░░▒█ ░░░░░░░░░░░░░░░░░░░░
░░█░░▓█░░░▓▓░░░░░░░▓███▒░░░░░▓▓░▒█ ░░░██░░░░░░░░░░░░░░░░░░░░ 
░░██░░██░░░█▒░░░░░░░███░░░░░░█░░█ ░░░░█▒░░░░░░▓███▓░░░░░░░░░
░░░█▓░░██░░░█▒░░░░░▓███▒░░░░█▒░█▒░░░██░░░░░░░▓▓    ▓░░░░░░░░ 
░░░▒█▒░░██░░░█░░░░░█████▓░░░▒▓▓░░░░▓█░░░░░░░▓█▓▓  ▓█▓░░░░░░░   
░░░░▓█▓░░▓▓░░░█░░░░█████░░░░░▓░░░░▓█▒░░░░░░░▓█░░░ ░█▓░░░░░░░ 
░░░░▓█▓░░▓▓░░░█░░░░█████░░░░░▓░░░░▓█▒░░░░░░░▓█░░░ ░█▓░░░░░░░ 
░░░░░▓██░░▒░░░░▓░░░▓███▓░░░░▓░░░░▓█▓░░░░░░░░▓█▓░░ ░█▓░░░░░░░ 
░░░░░░░██▒░░░░░░░░░▒██▓░░░░░▒░░░██▓░░░░░░░░░▓█▓░░ ▓██░░░░░░░ 
░░░░░░░░███░░░░░░░░░█▒▒░░░░░░░██▒░░░░░░▓███░█▓░░░▓███▓░░▓░░░ 
░░░░░░░░███░░░░░░░░░█▒▒░░░░░░░██▒░░░░░█▓░░▓░░░░   ▓█	 █░░     
░░░░░░░░░░░░▓██▓░░░░▓█ ░░░░░░░██▓░░░░░█░░░░░▓░   ░░░░░   █▓░   
░░░░░░░░░░░░░░████▓▓█▓▓██████░░░░░░░░█░░░  ░░░░	    ░░░░░ █▓ 
------------------------------------------------------------>	