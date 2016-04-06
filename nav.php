<?/// THIS PG WILL APPEAR AT THE TOP WHEN USER LOGGED IN \\\?>
<?/// THIS PG WILL APPEAR AT THE TOP WHEN USER LOGGED IN \\\?>
<?/// THIS PG WILL APPEAR AT THE TOP WHEN USER LOGGED IN \\\?>
<?/// THIS PG WILL APPEAR AT THE TOP WHEN USER LOGGED IN \\\?>
	<?php 
	 DEFINE('HOME_PG',"\bs_exposed/") ;
	 DEFINE('MUSIC_PG',"\bs_exposed/members") ;
	 DEFINE('VIDEOS_PG', "\bs_exposed/videos") ;
	 DEFINE('DT', "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta porttitor magna. Nunc urna. Vestibulum augue. Maecenas ipsum elit, rutrum id, iaculis ac, dictum ac, eros. Phasellus elit. Vestibulum semper cursus risus. Nunc consectetuer malesuada pede. Etiam ante.");
	 ?>	
<!-------------------END OF CONSTANTS----------------------------------------->
<!-------------------END OF CONSTANTS----------------------------------------->

		<div class='navBtnUl' style='z-index:2;' >		     
		 <ul style='margin:0 auto 0 0;float:left;clear:both;overflow-x:none;' >
		  
		  <li style='width:auto;position:absolute;left:25%;right:auto;' >		
		   <a href='<?=HOME_PG?>' target='_self' name='home' style='z-index:800;'>
			<center style='margin:0 auto;'>
			 <img src='<?php "{$_SERVER['DOCUMENT_ROOT']}"; ?>/bs_exposed/css/img/btns/home.png' class='img img-responsive' width='53%' height='100%' alt='Home' title='Home' /></center>
			  </a>
			  <!--- NESTED BTNS ----> 
			  <!--- NESTED BTNS
			  <ul id='navBtnUlnest' onMouseOver=''>
			   <li style= 'font-size:21px;'> <br>
				<a href='members.php' target='_self'>
					<strong>&nbsp;&nbsp;&nbsp; Members</strong></a> </li>
			   
			   <li style= 'font-size:21px;'> <br>
				<a href='\bs_exposed/?<?=md5('about')?>' target='_self'>
					<strong>&nbsp;&nbsp;&nbsp; About Me</strong></a>  </li>
			   
			   <li style= 'font-size:21px;'> <br>
				<a href='\bs_exposed/?<?=md5('contact')?>' target='_self'>
					<strong>&nbsp;&nbsp;&nbsp; Contact Me</strong></a>  </li>
			   ----> 
			  </ul>
			 </li>
		
		  <li style='width:auto;display:inline-block;float:left;clear:both;position:absolute;left:45%;right:auto; ' >
		   <a href='<?=MUSIC_PG?>' target='_self' name='music' style='z-index:800;'>						
			<center>
			 <img src='<?php "{$_SERVER['DOCUMENT_ROOT']}"; ?>/bs_exposed/css/img/btns/music.png' class='img img-responsive' width='53%' height='100%' alt='Music' title='Music' /></center></li>
			  </a>
		  <li style='width:auto;display:inline-block;float:left;clear:both;position:absolute;left:65%;right:auto; ' >
		   <a href='<?=VIDEOS_PG?>' target='_self' name='videos' style='z-index:800;'>						
			<center>
			 <img src='<?php "{$_SERVER['DOCUMENT_ROOT']}"; ?>/bs_exposed/css/img/btns/videos.png' class='img img-responsive' width='53%' height='100%' alt='Vids' title='Videos' /></center></li>
			  </a>
		  </ul>				   
		
		</div>
	<?////// MEMBER NAVIGATION \\\\\\\\?>
	<?////// MEMBER NAVIGATION \\\\\\\\?>


		 
</nav>
