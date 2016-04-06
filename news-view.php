<!DOCTYPE html> 
<HTML lang='en-US'>
 <HEAD>
  <?php require("ses.php"); ?>
  <?php	require("incl/fn.php"); ?>
	
<?php ///////INSERT NEWS COMMENTS TO DB \\\\\\\\

 if(isset($_POST['news_snt'])){
   if(((isset($_POST['news_cmt']) && !empty($_POST['news_cmt']))
	 && isset($_POST['news_commentor']) && !empty($_POST['news_commentor']))){
	  $cmt = trim(ucfirst(strip_tags($_POST['news_cmt'])));
	  $articleId = $_GET['art'];
	  $tbl = "news_".$articleId;
	  $d8 = date('Y-m-d');
		$qry = "INSERT INTO $tbl (`news_commentor`,
									`news_comment`,
									`news_comment_date`) 
				 VALUES ('{$_POST['news_commentor']}',
						 '$cmt',
						 '$d8')"; 
				mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
		 }
	}
 ?>
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

			  <?/// BREADCRUMBS \\\?>				
			  <ol class='breadcrumb'>
				<li><a href='index.php'>Home</a></li>
				<li><a href='news.php'>News</a></li>
				<li class='active'>Article</li>
			  </ol>						
				
				 <br>
				</div>
			   </div>
			  </div>
			 </div>
			</section>
			
<?/// topSec \\\?>			
	<?php 
if(isset($_GET['art']) && !empty($_GET['art'])){
 $articlId = $_GET['art'];
	 global $articlId;
}else{
	$articleId = NULL;
} ?>

<?/// CONT 1 \\\?>			
 <section class='main' style='border-radius:20px 20px;border:2px double #666;'>
  <?// cont-1 \\?>
	<center>
	 <h2 style='color:#aaa;font-weight:bold;text-align:center;text-shadow:0px 4px 8px #111;'>
	   News Article	  
	   <br>	   
	 </h2>
	</center>
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-2'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-8' style='' >
		 
		 
		 <p align='center' class='well well-lg text-center' style='margin:0 -10%;'  id=''>
		 
		  <?// news name \\?>
		  <caption class='lead'>
		   News Name
		  </caption>
		  
		   <?// news img \\?>
			<img src='css/pix/car.jpg' alt='Example' width='670px' class='img-responsive img-rounded center-block' style='border:8px solid rgba(255,255,255,0.38);box-shadow:0px 4px 6px rgba(0,0,0,0.7);' />
 	 	 	   <figcaption style='background-color:#444;' class='well'>
				 <a href='<?="#"?>' target="_blank" class='btn btn-link btn-xl' >
				  <b class='lead'>
				  Link To News Source
				  </b> 
				 </a>				 
			   </figcaption>	
			   
			  <?// news stats \\?>
			   <ul style='max-width:70%;margin:0 auto;border:5px solid rgba(0,0,0,0.2);box-shadow:0px 3px 5px #555;background-color: rgba(255,255,255,0.21);border-radius:10px;padding-top:10px;'>	
				 <li class='well well-sm bg-danger ' >
				  <center style='font-size:25px;'>
				   <b>Posted by:&nbsp;&nbsp;&nbsp;</b>
					news_publisher
				  </center>
				 </li>
																					
				 <li class='well well-sm bg-danger ' >
				  <center style='font-size:25px;'>
				   <b>Uploaded on:&nbsp;&nbsp;&nbsp;</b>	   
					news_date
				  </center>
				 </li>
																					
				 <li class='well well-sm bg-danger ' >
				  <center style='font-size:25px;'>
				   <b>Category:&nbsp;&nbsp;&nbsp;</b>
					news_category  
				  </center>
				 </li>																																
			  </ul>					
			 <br>
			<hr />
		
		  <?// news name \\?>
		   <p align='center'>
 			 <center class='bg-success lead text-center'>
			  <b style='font-size:27px;'>News Name</b>
			 </center>								
 		   </p>				
			
			<?// news story article \\?>
			<div class='news_story' class='center-block' style='margin-left:-15%;margin-right:-15%;'>
			 <summary>
				<?=DT?>		 
				<?=DT?>
				<?=DT?>
			  <div class='well block-quote' align='center' >
			   <strong>Testing the stupid block quote</strong>
				<br>
				Testing the stupid block quote
				<?=DT?>
			  </div>
			 </summary>
			</div>
		  </p>		  
	  
<!---COMMENTS-----><!---COMMENTS----->
<!---COMMENTS-----><!---COMMENTS----->
<!---COMMENTS-----><!---COMMENTS----->
<span class='center-block well' >
 <button type='button' class='btn btn-warning btn-lg' data-toggle='collapse' data-target='#newsCmt'> 
  Comments
 </button>
</span>

 <div id='newsCmt' class='collapse'>
	 <table cellspacing='0' cellpadding='1' class='table table-condensed table-responsive' >		   
	   <tr> 
		<td colspan='100%' align='center' valign='center' id='p_cmt' >
		 
	  <center id='<?=switchIfLoggedIn("","hide")?>'>
	   <form action='news-view.php?<?="art=$articlId"?>' method='POST' class='form-group' >
		<textarea maxlength='400' class='form-control' name='news_cmt' title='Enter Your Comment' id='' size='300' rows='6' cols='100%' placeholder='Comments' ng-model='inputPreview' ng-mouseover='angWallPost = !angWallPost' ng-click='angWallPost = true'></textarea>	
		 <div id='' style='width:50%; margin-top: 5px; margin-bottom: 5px; margin-left: auto; margin-right: auto; background-color: #bbb;  '>
		  <input type='hidden' name='article_id' value='<?=$articleId?>' /> 
		  <input type='hidden' name='news_commentor' value='<?=_USER_?>' /> 
		  <input type='submit' class='form-control btn btn-primary btn-md ' name='news_snt' value='Submit'   />
		  <input type='reset' class='form-control btn btn-warning btn-md  ' name='' value='Clear'   />
		  
		</div>
	   </form>
	  </center>
		 <hr />
 <?/// COMMENT STARTS \\\?>
 <?/// COMMENT STARTS \\\?>
 <?php
if(_USER_){
 if(isset($_GET['art'])){
	 $articleId = $_GET['art'];
	 $articleTbl = "news_".$articleId;
	 $cmt_qry = "SELECT `id`,
						`news_comment`,
						`news_commentor`,
						`news_comment_date`,
						`news_comment_vote`	
		FROM `$articleTbl` 
		ORDER BY `news_comment_date` DESC ";
		 	 $Cnt = mysqli_num_rows(mysqli_query($dbCon, $cmt_qry));
		if($Cnt >= '5'){
			$shoBtn = true;
			}
	if(isset($_GET['cmt'])){
	  global $Cnt;
	  global $shoBtn;
		if($_GET['cmt'] == md5('0')){
			if(($Cnt >= '10') && $Cnt < '14'){
				$shoBtn = true;
				 $cmt_qry .= " LIMIT 1, 15";		
			}else{
				$shoBtn = false;
			}
		}elseif($_GET['cmt'] == md5('1')){
			if(($Cnt >= '15') && $Cnt < '24'){
				$shoBtn = true;
				 $cmt_qry .= " LIMIT 1, 25"; 					
			}else{
				$shoBtn = false;
			}			
		}elseif($_GET['cmt'] == md5('2')){
			if(($Cnt >= '25') && $Cnt < '44'){
				$shoBtn = true;
				 $cmt_qry .= " LIMIT 1, 45";	
			}else{
				$shoBtn = false;
			}						
		}elseif($_GET['cmt'] == md5('3')){
			if(($Cnt >= '45') && $Cnt < '64'){
				$shoBtn = true;
				 $cmt_qry .= " LIMIT 1, 65";		
			}else{
				$shoBtn = false;
			}						
		}elseif($_GET['cmt'] == md5('4')){
			if(($Cnt >= '90') && $Cnt < '99'){
				$shoBtn = true;
				 $cmt_qry .= " LIMIT 1, 85";		
			}else{
				$shoBtn = false;
			}						
		}elseif($_GET['cmt'] == md5('5')){
			if($Cnt >= '95'){
				$shoBtn = true;
				 $cmt_qry  .= " LIMIT 1, 120";		
			} 
			
	 }		
 
			   
 }else{
	 $cmt_qry .= " LIMIT 1, 5";
 } 

		$rslt = mysqli_query($dbCon, $cmt_qry) or die(mysqli_error($dbCon));
		  	 global $articleTbl;
  
		 while($cmt_fld = mysqli_fetch_assoc($rslt)){
		?>
		   <div id='cmtDiv' style='background-color:rgba(0,0,0,0.12);' >
			<p align='center' style=''>
			  Posted By:&nbsp;
			 
			 <?=$cmt_fld['news_commentor']?>
			 
			 <br>
			  Date:&nbsp;
			 
			 <?=$cmt_fld['news_comment_date']?>
			  
			  <div class='r8iconBox pull-right' style=''>
					
					<?=showR8IconsFor($articleTbl, 'news_comment_vote', $cmt_fld['id'], $cmt_fld['news_commentor'])?>
				
				</div>
			 <summary style='min-height:60px;border-radius:10px;padding:5px 8px;border:10px solid rgba(0,0,0,0.25);background-color:rgba(0,0,0,0.15);'> 
			  <a href="#" target="_self">
			   <img src='css/pix/Brandon2.jpg' width='50px'  alt='Member' style='vertical-align:center;float:left;border:3px solid transparent' />
			  </a>
			  
			  <?/// COMMENT \\\?>		  
			  &nbsp;&nbsp;&nbsp;
			   
			  <?=$cmt_fld['news_comment']?> 
			   
			 </summary>
			</p>  
		   <hr />
		  </div>			
		 <?php
		  }
	////////////// shows more cmts btn \\\\\\\\\\\\\\\\\
	global $shoBtn;
	if(isset($_GET['cmt']) && $_GET['cmt'] <= md5('5')){
		$more = ++$_GET['cmt'];
	}else{
		$more = '0';
	}

if($shoBtn == true){
		 echo "<a href='?art=$articleId&cmt=".md5($more)."#newsCmt' target='_self'><button class='btn btn-success btn-lg center-block' type='button'>More Comments</button></a>";
	}
	 	 }else{
		 $articleId = NULL;
	 }
	}else{
		 _USER_ == NULL;
	?>
	  <div id='cmtDiv' style='background-color:rgba(0,0,0,0.12);' >
		<p align='center' style=''>
		 Posted By:&nbsp;Name
		 <br>
		 Date:&nbsp;<?=date('m-j-y')?>				 
		  <div class='r8iconBox pull-right' style=''>
				<?=showR8IconsFor('', '', '', '')?>
			</div>
		 <summary style='min-height:60px;border-radius:10px;padding:5px 8px;border:10px solid rgba(0,0,0,0.25);background-color:rgba(0,0,0,0.15);'> 
		  <a href="#" target="_self">
		   <img src='css/pix/Brandon2.jpg' width='50px'  alt='Member' style='vertical-align:center;float:left;border:3px solid transparent' />
		  </a>
		  
		  <?/// COMMENT \\\?>		  
		  &nbsp;&nbsp;&nbsp;
		  <?=DT?>
		 </summary>
		</p>  
	   <hr />
	  </div>				
	<?php
	}

 ?>
 <!--
 
 --->		  
	<?/// END OF COMMENT \\\\?>  
	<?/// END OF COMMENT \\\\?>
				  
		</td>
	   </tr>
	  </table>
	</div>	
   <hr />	
   <br>
   <br>
   <br>

		</div><?// END of col-lg-8 \\?>
		 
		<div class='col-lg-2'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>
  </section>
 <?// end of rows \\?> <?// end of rows \\?>
 <?// end of rows \\?> <?// end of rows \\?>

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
<script src="js/meReg.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.easing.min.js"></script> 
<script src="js/custom.js"></script>
<script src='js/ie10-viewport-bug-workaround.js' ></script>  
<script src="js/bootstrap.js"></script>

	   </BODY>
</HTML>