<!DOCTYPE html> 
<HTML lang='en-US'>
 <HEAD>
  <?php require("ses.php"); ?>
  <?php	require("incl/fn.php"); ?>
 
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html" />
	<meta http-equiv="content-type" content="cache" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="BrandonOsuji" />	
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="keywords" content="" />
	<meta name="description" content="" /> 

 			<?php 
 			 DEFINE('HOME_PG',"\bs_exposed/") ;
			 DEFINE('MUSIC_PG',"\bs_exposed/members") ;
			 DEFINE('VIDEOS_PG', "\bs_exposed/videos") ;
			 DEFINE('DT', "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta porttitor magna. Nunc urna. Vestibulum augue. Maecenas ipsum elit, rutrum id, iaculis ac, dictum ac, eros. Phasellus elit. Vestibulum semper cursus risus. Nunc consectetuer malesuada pede. Etiam ante.");
			 ?>		
	
  <TITLE> 
    Title
  </TITLE>
  
   <link rel='icon' href='css/img/icon.ico' />
   <link rel='stylesheet' type='text/css' href='css/nav_style.css' />
   <link rel='stylesheet' type='text/css' href='css/main_style.css' />
   <link rel='stylesheet' type='text/css' href='css/custom.css' />
   <link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
   
 </HEAD>
 
<?//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░			
////////////////////////███████///██////██///████████///////////////////////	
////////////////////////██///██///██////██///██////██///////////////////////			
////////////////////////███████///████████///████████///////////////////////			
////////////////////////██ ///////██////██///██/////////////////////////////			
////////////////////////██////////██////██///██/////////////////////////////
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
//██████████████████████████████████████████████████████████████████████████
?> 
<? ////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
<? ////BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY //BODY ?>
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
			
<?/// topSec \\\?>			
	<?php require("topSec.php"); ?>
	
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
	<?php require("content-1.php"); ?>
	
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
	<?php require("mainBtm.php"); ?>

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
		
<?/// footer \\\?>
	<?php require("footer.php"); ?>

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

<script> ////preview edits on demand process////
var exDt = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam porta porttitor magna. Nunc urna. Vestibulum augue. Maecenas ipsum elit, rutrum id, iaculis ac, dictum ac, eros. Phasellus elit. Vestibulum semper cursus risus. Nunc consectetuer malesuada pede. Etiam ante.";
var titleSec = document.getElementById("main-p-title");
var descrSec = document.getElementById("top-text-sec-prev");
var titleInput = document.getElementById("nputTitle");
var txtAreaInput = document.getElementById('txtarea');
	titleInput.onKeyDown = titlePrev();
	txtAreaInput.onKeyDown = descPrev();
	 function titlePrev(val){
		 if(val == false){
			 titleSec.innerHTML = "Title";
		 }else if(val.lastIndexOf('') > 0){
			 titleSec.innerHTML = val;
		 }
 	 }
	 function descPrev(val){
		if(val == false){
			 descrSec.innerHTML = exDt;
		 }else if(val.lastIndexOf('') > 0){
			 descrSec.innerHTML = val;
		 }
	 }
</script>
<script>
 function showUplSec(val){
	 if(val.lastIndexOf("") > 1){
		 document.getElementById("uplInputs").className="collapse in";
	 }
 }
</script>
<script> /////force admin to add description to sections b4 submit btn enabled
function chkTxtarea(val){
var btn = document.getElementById("sbt");
var txtArea = document.getElementById('txtarea');
	if(val.lastIndexOf('') > 10){
			btn.removeAttribute("disabled");
 	}else{
	if(val.lastIndexOf('') < 10){
			btn.setAttribute("disabled","");	 

		}
  	}	
}
</script>
<script>
	function enlargeThumb(imgSrc,thmbId){
		var id = "thumb"+thmbId++;
		var hrefId = "href"+thmbId;
 		var thumb = document.getElementById(id);
 		var href = document.getElementById(hrefId);
			if(imgSrc){
				thumb.src = 'upl/news_pics/' + imgSrc;
				href.href = thumb.src;	
			}
	}
</script>

<?/////JAVASCRPT\\\\\?><?/////JAVASCRPT\\\\\?>
<?/////JAVASCRPT\\\\\?><?/////JAVASCRPT\\\\\?>

<script src="js/jquery-1.11.3.min.js"></script>
<script>
$('#rzlts').hide();
 function presPoll(president){
	 
 	$(function(){

	
	  $('#presUl').fadeOut("fast",function(){

		  $('#rzlts').fadeIn(1500,function(){
			  $('#titl').fadeIn("fast",function(){
				

				  $('#titl').html("You voted for "+president.substring(0,1).toUpperCase() + president.substring(1)+" "+"however, Trump is not a narcistic, globalist, satanic, tyrannical, racist. <b>Trump 4 President!!!</b> lol");
			  });
		  });
			
  			$.post('incl/poll.php', {president:president}, function(rzlt){
 	 
			   $.get('incl/poll.php',function(total){
					
					total = Number(total);;
 
 			 var pres = rzlt.split('#');
 
				for(var i=0; i < pres.length; i++){
				   
				  var votes = pres[i].split('=');
					
					var p = [votes[0]];
					if($.trim(p) == ''){
						continue;
					}else if(isNaN(votes[1])){
						  continue;
					  }
					var per = [votes[1] / total * 100];			  
					var percent = [votes[1] / total * 100] + '%';			  
					  p = $.trim(p);
					  pid =   p + 'Bar';

						if(per < 15){
						
							document.getElementById(pid).style.width = percent;
							document.getElementById(pid).className = "progress-bar active progress-bar-danger progress-bar-striped";
		
						}else if(per < 25){
							document.getElementById(pid).style.width = percent;							
							document.getElementById(pid).className = "progress-bar active progress-bar-warning progress-bar-striped";
							
						}else if(per < 50){
							document.getElementById(pid).style.width = percent;
							document.getElementById(pid).className = "progress-bar active progress-bar-info progress-bar-striped";
						
						}else if(per > 50){
							document.getElementById(pid).style.width = percent;							
							document.getElementById(pid).className = "progress-bar active progress-bar-success progress-bar-striped";
							
						}
 						 
						 
  				
				} //END 4 loop 
  						 				
				})		  
			}) 	 
	  })
		
	})
	xplainSend2(president);
}
</script>
<script>
		 	
function xplainSend2(pres){
 pres = $.trim(pres);	
	
$('#xplainSec').fadeIn(3000,function(){

 $('#xplainTitle').html('Why did you choose '+pres.substring(0,1).toUpperCase() + pres.substring(1));

  $('#xplainBtn').on('click',function(){
	  
   var txtA = $('#xplainTxt').val();
   var xplainName = $('#xplainName').val();
   
	if($.trim(txtA) !== ''){
   
     $.post('incl/poll.php', {txt:txtA,name:xplainName,pres:pres}, function(){
		
		$('#xplainFrm').fadeOut("fast",function(){
			
			$('#xplainTitle').html('<b>Thanks!</b>');
		
		})
	})
	
   }else if(txtA == ''){
	   alert("Please enter your reason");
   }
   
 })	

 })	
 
}


</script>
<script src="js/meReg.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

	   </BODY>
</HTML>