  <ul>
   <!------- SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS -------> 
   <!------- SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS -------> 
   <!------- SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS SOCIAL ICONS -------> 
	<li> <a href='' target='_blank'><img src='\bs_exposed\css/img/ico/google.png' width='23px' alt='Join Us' title='Join Us' /></a> </li>
	<li> <a href='' target='_blank'><img src='\bs_exposed\css/img/ico/twitter.png' width='23px' alt='Join Us' title='Join Us' /></a> </li>
	<li> <a href='' target='_blank'><img src='\bs_exposed\css/img/ico/tumblr.png' width='23px' alt='Join Us' title='Join Us' /></a> </li>
	<li> <a href='' target='_blank'><img src='\bs_exposed\css/img/ico/YouTube.png' width='23px' alt='Join Us' title='Join Us' /></a> </li>
	<li> <a href='' target='_blank'><img src='\bs_exposed\css/img/ico/facebook.png' width='23px' alt='Join Us' title='Join Us' /></a> </li>			  
   </ul> 
	<?////// MEMBER NAVIGATION \\\\\\\\?><?////// MEMBER NAVIGATION \\\\\\\\?>
	 <ul class='<?=switchIfLoggedIn('navBtnUlmember','hide')?>' >
		   <li><a href='<?php echo "\main.php";?>' target='_self'><strong>Account</strong></a></li>
		   <li><a href='<?php echo "\wall.php";?>' target='_self'><strong>Wall-Post</strong></a></li>
		   <li><a href='<?php echo "\ses.php?logout=1"; ?>' target='_self' ><strong>Logout&nbsp;</strong><b><?=$_SESSION['username']?></b></a></li>
	 </ul>
<?////// END MEMBER NAVIGATION \\\\\\\\?>
<DIV id='<?=switchIfLoggedIn('hide','')?>'>
 <h2>
  Member-Login
 </h2>
<?///LOGIN HOVER\\\?>
<form action='<?php $_SERVER['DOCUMENT_ROOT']."bs_exposed\incl/login_process.php"; ?>' method='POST' class=''>
&nbsp;&nbsp;Login: 
 <input type='text' name='usr' value='' placeholder='Username' required />
  &nbsp;&nbsp;Password: 
   <input type='password' name='pw' value='' placeholder='Password' required />			     
	<span>
	 <input type='submit' name='' value='Login' />
	 <input type='reset' name='' value='Clear' />
	</span>
  </form>
 </DIV>
 <?///END OF LOGIN HOVER\\\?>