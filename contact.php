<!DOCTYPE html> 
<HTML lang='en-US'>
<HEAD>
<?php require("ses.php"); ?>
<?php	require("incl/fn.php"); ?>

<?//-SEO-\\\//-SEO-\\\//-SEO-\\\?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-type" content="text/html" />
<meta http-equiv="content-type" content="cache" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="BrandonOsuji" />	
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="keywords" content="" />
<meta name="description" content="" /> 

<?///END OF META-SEO\\\///END OF META-SEO\\\?>
		<?php 
		 DEFINE('HOME_PG',"\bs_exposed/") ;
		 DEFINE('MUSIC_PG',"\bs_exposed/members") ;
		 DEFINE('VIDEOS_PG', "\bs_exposed/videos") ;
		 DEFINE('DT', "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta porttitor magna. Nunc urna. Vestibulum augue. Maecenas ipsum elit, rutrum id, iaculis ac, dictum ac, eros. Phasellus elit. Vestibulum semper cursus risus. Nunc consectetuer malesuada pede. Etiam ante.");
		 ?>		

<TITLE> 
Title
</TITLE>

<!--- CSS CSS CSS BITTTCHH!!!!!! ---->
<link rel='icon' href='css/pix/icon.ico' />
<link rel='stylesheet' type='text/css' href='css/nav_style.css' />
<link rel='stylesheet' type='text/css' href='css/main_style.css' />
<link rel='stylesheet' type='text/css' href='css/custom.css' />
<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
</HEAD>

<?//████████████████████████████████████████████████████████████████████████
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░			
////////////////////////███████///██////██///████████///////////////////////	
////////////////////////██///██///██////██///██////██///////////////////////			
////////////////////////███████///████████///████████///////////////////////			
////////////////////////██ ///////██////██///██/////////////////////////////			
////////////////////////██////////██////██///██/////////////////////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████████████████████████████?>

<!--- END OF CSS & j_s_ BITTTCHH!!!!!! ---->
<!--- END OF CSS & j_s_ BITTTCHH!!!!!! ---->

<?////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
<?////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
<BODY bgcolor='' onLoad='flashDisplay()' onResize="flashDisplay();"> 
 <div class='center-block socialSec' style='position:absolute;top:0;'>
  <?/// SOCIAL ICONS \\\?>
		<ul>
		 <li><a href='#' type='button'><img src='css/pix/tumblr.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/twitter.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/youtube.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/facebook.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		 <li><a href='#' type='button'><img src='css/pix/google.png' alt='Social' class='img-responsive img-rounded' /></a></li>
		</ul>
 </div>
<?/// LOGIN SECTION TOP \\\?>
<?php require("incl/login.php"); ?>

<?/// HEADER 'contains nav data' \\\?>
<?php require("hdr.php"); ?>

<?/// content begin \\\?>
	<div class='mainWrapper' >

	  <?php

	if(isset($_REQUEST['sbt']) && count(strlen($_REQUEST['email'])) > '1'){
		$email = strip_tags(html_entities('Customer Information: '.'\n\n'.$_REQUEST['msg']));
		$admin_email = "brndnlnk4@gmail.com";
		$subject = strip_tags('Email sent from '.' '.$_REQUEST['name'].' '.' with phone number: '.' '.$_REQUEST['phone']);
			mail($admin_email, "$subject", "From: ".$email) or header("Location: \?email=0");				
	}
	 //CHECK IF MSG EMAIL SENT THEN ECHO CONFIRMATION \\\
		if(isset($_POST['email']) && !empty($_POST['email'])){
			echo "<b class='center-block' style='margin:0 auto;'><h2 class='well well-sm'><center>Email Successfully Sent, Thanks!</center></b></h2>";
		} 
  ?>
<?/// empty \\\?>				
		<section class='empty-0'>
		 <div class='content'>
		  <div class='container'>
		   <div class='row'>
			<div class='col-xl-12'>

			  <?/// BREADCRUMBS \\\?>				
			  <ol class='breadcrumb'>
				<li><a href='index.php'>Home</a></li>
				<li class='active'>Contact</li>
			  </ol>
			
			 <br>
			</div>
		   </div>
		  </div>
		 </div>
		</section>

  <DIV id='tableMain'>
	<section class='main well text-center center-block' style='margin:0;'>
	<?// contact \\?>
	 <div class='content content-1'>
	  <div class='container-fluid'>
	   <div class='row' style='border-radius:10px 10px;'>
	    <div class='col-lg-2'></div>
		 <div class='col-lg-8' style='width:100%;'>
			 <p align='center' valign='center'>
				<summary style='margin: 0 auto;background:rgba(51, 50, 50, 0.18);padding:5px;border:1px dotted #888;'>
				 <h2 class='text-center lead'> Designer and Developer Info: </h2>
				  
				  <?// contact information \\?>
					<details style='background-color: rgba(255,255,255,0.2);font-size:20px;' class='btn btn-success center-block well well-lg'>
					   <name>Brandon Osuji</name>
					     <br>
						<b>Phone: 469-554-1698</b>					 
					 <address>Dallas Tx, 75007</address> 
					  <center>
					   <img src='css/pix/Brandon2.jpg' title='Brandon' alt='Brandon' width='100px' class='img-responsive img-rounded' />	
					  </center>	
  					</details>
				</summary>	
				 <br>
				  <form class='form-hortizontal' action='<?=htmlspecialchars($_SERVER['PHP_SELF'])?>' method='POST'> 
				   <div class='form-group-lg'>
				    <ul class='list-group list-hortizontal'  id='form_ul' style='display:block;font-size:17px;margin:0 auto;'>
						<li class='list-group-item'>
							<label for='name' class='control-label'>Full Name:</label>
								<input type='name' class='form-control' name='name' value='' title='Full name' maxlength='80' placeholder='Enter First and Last name' required /></li>
						<li class='list-group-item'>
							<label for='phone' class='control-label'>Phone Number:</label>
								<input type='tel' class='form-control' name='phone' value='' title='Phone Number' maxlength='10' placeholder='Eneter Phone number' required /></li>
						<li class='list-group-item'>
							<label for='email' class='control-label'>Email Address:</label>
								<input type='email' class='form-control' name='email' value='' title='Email Address' maxlength='80' placeholder='Enter  Email address' required /></li>
						<li class='list-group-item'>
							<label for='msg' class='control-label'>Enter Message</label><br>
							
								<textarea class='text-primary' cols='60%' rows='' name='msg' value='' size='400' title='Enter Message to email' maxlength='480' placeholder='Message to send' required></textarea></li>
 				  
					</ul>
					 <span style='min-width:100px;display:inline;float:left;border-radius:10px;padding-left:30px;'>
						<input class='btn btn-lg btn-primary' type='submit' name='sbt' value='Send' name='submit'  />
						<input class='btn btn-lg btn-primary' type='reset' value='Clear' />
					</span>
				  </div> 
				</form>	
			<br>
			<br>
			<br>
			 <div class='well well-lg'>
			  <figcaption style='font-size:30px;font-weight:bold;background-color:rgba(255,255,255,0.4);'>Email me</figcaption>
			     <a href='mailto:brndnlnk4@gmail.com'><b>brndnlnk4@gmail</b></a><br>
				 <a href='mailto:brndnlnk4@yahoo.com'><b>brndnlnk4@yaho</b></a><br>
				 <a href='mailto:mikejin2@yahoo.com'<b>mikejin2@yahoo</b></a><br>
			 </div>

			</p>
		 </div>
	    <div class='col-lg-2'></div>
	   </div>
	  </div>
	 </div>
   </section>
 </DIV>
		
<?/// topSec \\\?>			
 <div class='topSec' >

 </div>

		<section class='empty-3'>
		 <div class='content'>
		  <div class='container'>
		   <div class='row'>
			<div class='col-xl-12'>
			 &nbsp;
			 <br>
			</div>
		   </div>
		  </div>
		 </div>
		</section>			
	</div>
	
<?// END OF MAINWRAPPER \\?>
<?// END OF MAINWRAPPER \\?>
	
  
<?//██████████████████████████████████████████████████████████████████████████
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 			
////////////////////////██████████//█████████///////////////////////////////			
////////////////////////////██//////██//////////////////////////////////////			
////////////////////////////██////////████//////////////////////////////////			
////////////////////////////██ ///////////██////////////////////////////////			
////////////////////////██████//////████████////////////////////////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████████████████████████████
///////////////////////////////////////////////////////////////////////////?>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

   </BODY>
</HTML>