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
   <link rel='stylesheet' type='text/css' href='css/news_style.css' />
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
  <BODY bgcolor=''> 
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
 <?php require_once("incl/login.php"); ?>
 
<?/// HEADER 'contains nav data' \\\?>
 <?php require_once("hdr.php"); ?>
 
<?/// content begin \\\?>
		<div class='mainWrapper' >
 
<?/// empty \\\?>				
			<section class='empty-0'>
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
			
		<?/// topSec \\\?>			
		<?/// TOP SEC  CONTAINS CAROUSEL \\\?>
		<?/// TOP SEC  CONTAINS CAROUSEL \\\?>
		<section class='topSec'>
		 <div class='content'>
		  <div class='container-fluid'>
		   <div class='row' >
			<div class='col-xl-2'></div>
			 <div class='col-xl-8'>
			  <?/// BOOSTSTRAP SLIDE-SHOW \\\?>
				<div class='top-news-section' >
				 
				 <?// news title \\?>		 
				  <strong class='lead text-muted'> 
				   <h1 class='text-center' >
					  News of the day
				   </h1>
					<hr />

					  <caption>News Name</caption>
				  </strong>
				  
			   <form action='' method='' class='form-group'>
				<input type='text' maxlength='30' name='newsOfTheDay_NewsTitle' placeholder='Enter News Name ' class='input input-lg form-control' />

				 <?// news of the day pic \\?>	
				  <p align='center' class='text-muted'>
				   <img src='css/pix/car.jpg' width='370px' class='img-responsive img-rounded center-block' />
					
					<input type='text' maxlength='' name='newsOfTheDay_imgUrl' placeholder='Enter URL Link to Image' class='input input-lg form-control' />

					 <?// news aticle \\?>
					  <span class='text-center pull-right'>
						<?=DT?>
						<?=DT?>
						
						<textarea maxlength='500' name='newsOfTheDay_summary' placeholder='Enter News Article summary' class='input input-lg form-control' ></textarea>						
						
						<input type='submit' name='' value='Update' class='btn btn-success input-lg' />
						<input type='reset' name='' value='Clear' class='btn btn-warning input-lg' />
					  
						<br>
					  <br>
					 </form>
						 <a href='#' target='_blank' type='button' class='btn btn-default btn-lg center-block' >
							View Entire Article
						 </a>				
					  </span>
					<br>
				 </p>
				 
				</div>
			 <div class='col-xl-2'></div>
		   </div>
		  </div>
		 </div>
		</section>
	
				<section class='empty-001'>
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
			
<?/// CONT 1 \\\?>			
	<?php require("content-1-newsAdmin.php"); ?>
	
<?/// empty \\\?>		
			<section class='empty-2'>
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
<?/// mainBottom \\\?>
	<?php require("mainBtm-news.php"); ?>

<?/// empty \\\?>		
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