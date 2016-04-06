<!DOCTYPE html> 
<HTML lang='en-US'>
<HEAD>
<?php require("ses.php"); ?>
<?php require("incl/fn.php"); ?>

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
<link rel='icon' href='css/img/icon.ico' />
<link rel='stylesheet' type='text/css' href='css/nav_style.css' />
<link rel='stylesheet' type='text/css' href='css/main_style.css' />
<link rel='stylesheet' type='text/css' href='css/custom.css' />
<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
<link rel='stylesheet' type='text/css' href='css/vid-css.css' />
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
<?////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
<?////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
 <BODY bgcolor='' style='position:relative;' onLoad='flashDisplay()' onResize="flashDisplay();"> 
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
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?/// registration modal window \\\?><?/// registration modal window \\\?>
<?php require("incl/usr_reg.php"); ?>
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

	<?/// MODAL BOX MODAL BOX MODAL BOX \\\?>
	<?/// MODAL BOX MODAL BOX MODAL BOX \\\?>
	<?/// MODAL BOX MODAL BOX MODAL BOX \\\?>
		<?php
			include("incl/1stTopVidModal.php");
		?>

  <?// END OF MODAL \\?><?// END OF MODAL \\?>	
  <?// END OF MODAL \\?><?// END OF MODAL \\?>	
		
<?/// topSec \\\?>			
 <div class='topSec-vid' >
  <?/// CAROUSEL CAROUSEL \\\?>
  <?/// CAROUSEL CAROUSEL \\\?>
   <div class='carousel' id='topVidPreview' data-ride='carousel' >						
	
	<ol class='carousel-indicators' id='carousel_indicators'>
	  <!--- SLIDE INDICATOR AT BOTTOM --->
		<li class='active' data-target='#topVidPreview' data-slide-to='0' > </li>
		<li class='' data-target='#topVidPreview' data-slide-to='1' > </li>
		<li class='' data-target='#topVidPreview' data-slide-to='2' > </li>
		<li class='' data-target='#topVidPreview' data-slide-to='3' > </li>
		<li class='' data-target='#topVidPreview' data-slide-to='4' > </li>
	</ol>
	<?/// CAROUSLE INNER \\\?>
	 <div class='carousel-inner' id='slider-inner' style='height: ;'>	 
	 
	   <?/// item begin \\\?>
		<div class='item active'> 
		 <img src='css/pix/x61.jpg' class='img-rounded' alt='' width='200px' />	
		  <p class='carousel-caption  ' style='background:rgba(0,0,0,0.5);left:25%;right:15%;border-radius:15px;min-height:5px;box-shadow:0px 4px 8px #222;border:1px dotted #999;' >
			<?=DT?>
		 </p>
	   
		</div>	
		
		<div class='item'> 
		 <img src='css/pix/x62.jpg' class='img-rounded' alt='' width='200px' />	
		  <p class='carousel-caption' style='background:rgba(0,0,0,0.5);left:25%;right:15%;border-radius:15px;min-height:5px;'>
			<?=DT?>
		 </p> 

		</div>

		<div class='item'> 
		 <img src='css/pix/x63.jpg' class='img-rounded' alt='' width='200px' />	
		  <p class='carousel-caption  ' style='background:rgba(0,0,0,0.5);left:25%;right:15%;border-radius:15px;min-height:5px;'>
			<?=DT?>
		  </p>

		</div>
		
		<div class='item'> 
		 <img src='css/pix/x61.jpg' class='img-rounded' alt='' width='200px' />	
		  <p class='carousel-caption  'style='background:rgba(0,0,0,0.5);left:25%;right:15%;border-radius:15px;min-height:5px;'>
			<?=DT?>
		 </p> 
						 
		</div>
		
		<div class='item'> 
		 <img src='css/pix/x62.jpg' class='img-rounded' alt='' width='200px' />	
		  <p class='carousel-caption ' style='background:rgba(0,0,0,0.5);left:25%;right:15%;border-radius:15px;min-height:5px;'>
			<?=DT?>
		 </p>
							   
		</div>
		
	  <?/// carousel slide controls \\\?>
	   <a href='#topVidPreview' class='carousel-control left' id='carousel-left-arrow' data-slide='prev' > 
 		&nbsp;
		&nbsp;
	   </a>
	  <?/// carousel slide controls \\\?>
	   <a href='#topVidPreview' class='carousel-control right' id='carousel-right-arrow' data-slide='next' > 
 	   &nbsp;
	   &nbsp;
	   </a>			
	  &nbsp;
	 </div>
		 <?///  right block \\\?>
		  <div class='text-right carousel-right-block' id=''>
			  <h2>
			   <center>
				<b>Carousel bottom title</b>
			   </center>
			  </h2>
		  </div>							
	</div>
  <?/// END OF CAROUSEL \\\?>
  <?/// END OF CAROUSEL \\\?>
	</div>
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
<?php require("mainBtm-vid.php"); ?>

<?/// empty \\\?>		
		<section class='empty-0-rev'>
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
<div id='dfltOutput'>
<?php require("content-1-vid.php"); ?>
</div>
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
<script>
///////VID SEARCH PROCESS///////
$(document).ready(function(){
	$('#vidOutput').load('incl/pullVid.php');
////////VID SEARCH PROCESS///////
	
	$('#vid_cat').change(function(){
		var vid_cat = document.getElementById("vid_cat").value;
	
		$.post('incl/pullVid.php', {vid_cat:vid_cat}, function(response){	
			
				$('#vidOutput').html(response).show();
			})
	
		}) 
	
	$('#vid_ttle').keyup(function(){
		var vid_t = $('#vid_ttle').val();
	 
		if(($.trim(vid_t) !== '') && vid_t.lastIndexOf('') > 0){	
						
 			$.post('incl/pullVid.php', {video_title:vid_t}, function(response){	
 				
				$('#vidOutput').html(response);
		
			})
	
		}else{
 			$('#vidOutput').load('incl/pullVid.php');

		} 
	})
 
///////////MODAL QUICK CMT_VIEW///////
var modal = document.getElementById('myModal1');
 function sndCmt(cmt,t){

	if($.trim(cmt) !== 0){
		
		$.post('incl/vidCmtProc.php', {cmt:cmt}, function(response){
			
			$(modal).html(response);
			
		})		
	}
 }	
})
</script>
<script>
///////////PAGINATION PROCESS///////
function go2pg(p){
	$(document).ready(function(){

		$.post('incl/pullVid.php', {page:p}, function(response){
		
		  $('#vidOutput').html(response);
		})
	})
}	
function vidProc(lim,p){
	$(document).ready(function(){
		$.post('incl/pullVid.php', {lim:lim,p:p}, function(response){
			
		  $('#vidOutput').html(response);
		
 		})
	})
}	

</script>
<script src="js/meReg.js"></script>
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

   </BODY>
</HTML>