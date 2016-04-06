<section class='main' style='border-radius:20px 20px;border:2px double #666;'>
<?php /////////// CHECK IF NEWS_UPDATE SUBMITTED BY ADMIN \\\\\
if(isset($_POST['newsUpdate'])){
if(((((((((((isset($_POST['news_title']) && !empty($_POST['news_title']))
	|| isset($_POST['news_col1']) && !empty($_POST['news_col1'])))
	|| isset($_POST['news_col2']) && !empty($_POST['news_col2']))
	|| isset($_POST['news_col3']) && !empty($_POST['news_col3']))
	|| isset($_POST['news_col4']) && !empty($_POST['news_col4']))
	|| isset($_POST['news_col5']) && !empty($_POST['news_col5']))
	|| isset($_POST['news_col6']) && !empty($_POST['news_col6']))  
	&& isset($_POST['news_title']) && !empty($_POST['news_title'])
	&& isset($_POST['news_article']) && !empty($_POST['news_article']))
	&& isset($_POST['news_date']) && !empty($_POST['news_date']))
	&& isset($_POST['news_link']) && !empty($_POST['news_link'])){
		$news_title = strip_tags(ucfirst(trim($_POST['news_title'])));
		$news_article = strip_tags(ucfirst($_POST['news_article']));
		$news_img =  urlencode("{$_POST['news_img']}");
		$news_date = strip_tags(trim($_POST['news_date']));
		$news_link =  urlencode($_POST['news_link']);
		///// submits news info until one of 'news-cols'(isset)
			if(isset($_POST['news_col1'])){ 
				$news = "news_1";
				}elseif(isset($_POST['news_col2'])){
				$news = "news_2";
				}elseif(isset($_POST['news_col3'])){
				$news = "news_3";
				}elseif(isset($_POST['news_col4'])){
				$news = "news_4";
				}elseif(isset($_POST['news_col5'])){
				$news = "news_5";
				}else{
				  if(isset($_POST['news_col6'])){
					 $news = "news_6";
				  }else{
					  ?>
					  <script>
						window.open("news.php?wtf_must_select_news_collumn","_self");
					  </script>
					  <?php
				  }
				}	
/////////////////////////////////////////////	
$sql_chk = "SELECT * 
			FROM `$news`";	
if(mysqli_num_rows(mysqli_query($dbCon, $sql_chk)) < '1'){
////////////////////////////////////////////
	$qry = "INSERT INTO `$news`(`news_title`,
							   `news_article`,
							   `news_img`,
							   `news_date`,
							   `news_link`) 
			VALUES ('{$news_title}',
					'{$news_article}',
					'{$news_img}',
					'{$news_date}',
					'{$news_link}')";
}else{
	$qry = "UPDATE `$news`
			SET `news_title` = '$news_title',
				`news_article` = '$news_article',
				`news_img` = '$news_img',
				`news_link` = '$news_link',
				`news_date` = '$news_date'
				 WHERE `id` = 1";				
	}
	$rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
	  if($rslt){
	  ////////chk if submitted echo confirmation \\\\\\
		  ?>
		   <script>
			alert("Successfully Added a News Article");
			window.open("news.php?n1#news_edit", "_self");
		   </script>
		  <?php
	  }else{
		  ?>
		   <script>
			window.open("news.php?n0", "_self");
		   </script>
		  <?php
	  } 
} ///END if posts submitted are set
	else{
		echo "one of the post fields is not complete";
	}
} ///END if submit btn clicked
 
?>	 
<?////////////////\\\\\\\\\\\\\\\\\\\\\\\\\?>	
<?///////// NEWS CONTENT BEGIN \\\\\\\\\\\\?>	
<?///////// NEWS CONTENT BEGIN \\\\\\\\\\\\?>	
<?///////// NEWS CONTENT BEGIN \\\\\\\\\\\\?>	
<?// cont-1 \\?>
<center>
 <h2 style='color:#aaa;font-weight:bold;text-align:center;text-shadow:0px 4px 8px #111;'>
  World News	  
   <br>	  
	<h4> 
	 <center class='text-primary'>
	  Updated <?=" ".date('m-d-y')?>
	 </center>
	</h4>	   
 </h2>
</center>

<div class='content1'>
<div class='container'>

<?//// news admin section \\\?><?//// news admin section \\\?>
<?//// news admin section \\\?><?//// news admin section \\\?>
<?//// news admin section \\\?><?//// news admin section \\\?>
<div class='row' id='<?=switchIfLoggedIn('','hide')?>'>
<div class='col-lg-12'>

<?// news edit btn \\?>
<span class='well well-sm center-block' style='background-color:#333;'>
 <button type='button' onclick="chkEditBtn();document.getElementById('h2').style.visibility = 'visible';" class='btn btn-warning text-center' data-toggle='collapse' data-target='#news_edit' >
  Add News Article
 </button>
</span>
<?php
 if(isset($_GET['n0'])){
	 echo "<span class='well well-sm center-block'><h1 class='text-center bg-warning text-danger'>Update to Database Failed</h1></span>";
 }
?>
<h2 id='h2' class='well well-lg center-block text-center' style='font-size:45px;font-weight:bold;background-color:red;'>
First Select News Section Below!										
</h2>																																									

<?// news edit section \\?>		 
<div id='news_edit' class="<?=ifGetIssetEcho('n1', 'well well-lg collapse in', 'well well-lg collapse')?>" >
<strong style='font-size:25px;font-weight:bold;' >
Admin News Panel
</strong>
<br>
 <hr />
  <?// news name \\?>
   <strong class=''>Enter News Title</strong>
		
	<form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])?>' method='POST' class='form-group'>
	 <input type='text' id='nput1' maxlength='30' name='news_title' placeholder='Enter News Name ' class='input input-lg form-control' disabled />
															
	  <?// news img \\?>	
	  <span class='well well-xs text-center center-block lead'>	   
	   <img src='css/pix/Brandon2.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
		<strong>Enter News Pic URL Link</strong>
		 <input type='url' id='nput2' maxlength='50' name='news_img' placeholder='Enter URL for Thumbnail ' class='input input-lg form-control' disabled /><br>								
		</span>								
												
	   <?// news publisher \\?>										
	   <span class='well well-xs text-center center-block lead'>
		 <strong>Enter Publication Date</strong>
		<input type='date' id='nput3' name='news_date' maxlength='10' size='10' class='input input-sm form-control' value='' placeholder='<?=date('j-m-Y')?>' disabled ></input>
											
		<?// news link URL \\?> 
		 <strong>Enter Link to News Source</strong>
		<input type='url' id='nput4' name='news_link' maxlength='100' size='100' class='input input-md form-control' value='' placeholder='News Source' disabled />
	   </span>									
									
		<?// news story article \\?>
		<div class='news_story'>
		 <h2 class='text-center'>
		  <b>Enter News Article</b>
		 </h2> 
		<br>			 
	   <textarea maxlength='500' rows='5' size='400' id='t_area' name='news_article' placeholder='Enter News Article summary' class='input input-lg form-control' required disabled></textarea>						
																										
	<input type='submit' id='submitBtn' name='newsUpdate' value='Add News' class='btn btn-success input-lg' disabled />
	<input type='reset' name='' value='Clear' class='btn btn-warning input-lg' />
   <br>			    
</div>
</div>
</div> 
</div>

<?// END OF NEWS ADMIN SECTION \\?><?// END OF NEWS ADMIN SECTION \\?>	  
<?// END OF NEWS ADMIN SECTION \\?><?// END OF NEWS ADMIN SECTION \\?>	  


<!--- NEWS ARTICLES START HERE ----><!--- NEWS ARTICLES START HERE ---->
<!--- NEWS ARTICLES START HERE ----><!--- NEWS ARTICLES START HERE ---->
<!--- NEWS ARTICLES START HERE ----><!--- NEWS ARTICLES START HERE ---->
<div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
<div class='col-lg-1'>&nbsp;</div>

<?/////////////////NEWS 1\\\\\\\\\\\\?> 
<?/////////////////NEWS 1\\\\\\\\\\\\?> 
<?/////////////////NEWS 1\\\\\\\\\\\\?> 
<?/////////////////NEWS 1\\\\\\\\\\\\?> 

<div class='col-lg-5' style='' >
<p align='center' class='text-left'  id='news-col-1' >
<input type='checkbox' onclick="disableOthers('chkBox1');" class='input-lg form-control' id='edit_chkBox1' name='news_col1' value='news_col1' style='display:none;'></input>

<?php	////NEWS 1 
$chkRows = "SELECT * FROM `news_1`";
 if(mysqli_num_rows(mysqli_query($dbCon, $chkRows)) > '0'){
 /* /////////////////////////////////
////////////////////////////////// */
	 
$news_qry = "SELECT `news_title`,
					`news_article`,
					`news_img`,
					`news_link`,
					`news_date`,
					`news_comment`
			FROM `news_1`
			WHERE `id` = 1
			ORDER BY `id` ASC;";
   $rslt = mysqli_query($dbCon,$news_qry);// or die("Problem modasoka");
		$cmtChk = "SELECT DISTINCT `news_comment` 
				   FROM `news_1`";
		 $r = mysqli_query($dbCon, $cmtChk) or die(mysqli_error($dbCon));
	 while($news_fld = mysqli_fetch_assoc($rslt)){	  
		 if(mysqli_num_rows($r) > '1'){
			$cmt_cnt = mysqli_num_rows($r);
		}else{
			$cmt_cnt = '0';
		}
		  $art = $news_fld['news_article'];
			 if(strlen($art) > '350' ){
			   $readmoreBtn_id = array("readMore_btn","collapse");
				$art_firstHalf = substr($art, '0', '350');
				$art_secondHalf = substr($art, '351');						 
				 }else{
					$readmoreBtn_id = array("hide","collapse in");						 
					 $art_firstHalf = $art;
					 $art_secondHalf = NULL;
				 }        

?>
  <?// news name \\?>
  <caption><?=$news_fld['news_title']?></caption>
  
   <?// news img \\?>
   <a href='news-view.php?art=1' target='_self' title='News Name' >
	<img src='<?=urldecode($news_fld['news_img'])?>' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?=$cmt_cnt?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=$news_fld['news_date']?>&nbsp;&nbsp;		 
			 <b>
			  <a href='<?=urldecode($news_fld['news_link'])?>' title='<?=$news_fld['news_title']." "?> source' class='btn btn-link' >
			  News Source
			  </a>
			 </b>
		 </span>
		
	<?// news story article \\?>
	<div class='news_story'>

	
	 <?=$art_firstHalf?>
	  
				 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='<?=$readmoreBtn_id['0']?>' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news1' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news1' class="<?=$readmoreBtn_id['1']?>" >
		
		<?=$art_secondHalf?>

	  </div>
	 </div>	
 
	<?php
	 } /// END OF WHILE LOOPS
 }else{
	?>

  <?// news name \\?>
  <caption>News Name</caption>
  
   <?// news img \\?>
   <a href='#' target='_self' title='News Name' >
	<img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
			 
			 <b><a href='news_source' title='News source' class='btn btn-link' >News Source</a></b> 
		 </span>
 
	<?// news story article \\?>
	<div class='news_story'>
	 <?=DT?>
	  <br>			 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news1' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news1' class='collapse' >
 
		<?=DT?>
		<?=DT?>

	  </div>
	 </div>
	 
<?php
 }
?>
  </p>		  
 </div>
 
<?//////////////NEWS 2\\\\\\\\\\\\?>
<?//////////////NEWS 2\\\\\\\\\\\\?>
<?//////////////NEWS 2\\\\\\\\\\\\?>
<?//////////////NEWS 2\\\\\\\\\\\\?>

<div class='col-lg-5' style=''>
<p align='center' class='text-left'  id='news-col-1'>
<input type='checkbox' onclick="disableOthers('chkBox2');" class='input-lg form-control' id='edit_chkBox2' name='news_col2' value='news_col2' style='display:none;'></input>

<?php	////NEWS 2 
$chkRows = "SELECT * FROM `news_2`";
 if(mysqli_num_rows(mysqli_query($dbCon, $chkRows)) > '0'){
 /* /////////////////////////////////
////////////////////////////////// */
	 
$news_qry = "SELECT `news_title`,
					`news_article`,
					`news_img`,
					`news_link`,
					`news_date`,
					`news_comment`						
			FROM `news_2`
			WHERE `id` = 1
			ORDER BY `id` ASC;";
   $rslt = mysqli_query($dbCon,$news_qry) or die("Problem modasoka");
		$cmtChk = "SELECT DISTINCT `news_comment` 
				   FROM `news_1`";
		 $r = mysqli_query($dbCon, $cmtChk) or die(mysqli_error($dbCon));
	 while($news_fld = mysqli_fetch_assoc($rslt)){	  
		 if(mysqli_num_rows($r) > '1'){
			$cmt_cnt = mysqli_num_rows($r);
		}else{
			$cmt_cnt = '0';
		}
		  $art = $news_fld['news_article'];
			 if(strlen($art) > '350' ){
			   $readmoreBtn_id = array("readMore_btn","collapse");
				$art_firstHalf = substr($art, '0', '350');
				$art_secondHalf = substr($art, '351');						 
				 }else{
					$readmoreBtn_id = array("hide","collapse in");						 
					 $art_firstHalf = $art;
					 $art_secondHalf = NULL;
				 }        

?>
  <?// news name \\?>
  <caption><?=$news_fld['news_title']?></caption>
  
   <?// news img \\?>
   <a href='news-view.php?art=2' target='_self' title='News Name' >
	<img src='<?=urldecode($news_fld['news_img'])?>' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?=$cmt_cnt?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=$news_fld['news_date']?>&nbsp;&nbsp;		 
			 <b>
			  <a href='<?=urldecode($news_fld['news_link'])?>' title='<?=$news_fld['news_title']." "?> source' class='btn btn-link' >
			  News Source
			  </a>
			 </b>
		 </span>
		
	<?// news story article \\?>
	<div class='news_story'>

	
	 <?=$art_firstHalf?>
	  
				 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='<?=$readmoreBtn_id['0']?>' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news2' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news2' class="<?=$readmoreBtn_id['1']?>" >
		
		<?=$art_secondHalf?>

	  </div>
	 </div>	
 
	<?php
	 } /// END OF WHILE LOOPS
 }else{
	?>
  <?// news name \\?>
  <caption>News Name</caption>
  
   <?// news img \\?>
   <a href='#' target='_self' title='News Name' >
	<img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
			 
			 <b><a href='news_source' title='News source' class='btn btn-link' >News Source</a></b> 
		 </span>
 
	<?// news story article \\?>
	<div class='news_story'>
	 <?=DT?>
	  <br>			 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news2' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news2' class='collapse' >
 
		<?=DT?>
		<?=DT?>

	  </div>
	 </div>
 
<?php
 }
?>	
  </p>		  
 </div>		  
<div class='col-lg-1'>&nbsp;</div> 
</div>

<?/////////////////NEWS 3\\\\\\\\\\\\?>
<?/////////////////NEWS 3\\\\\\\\\\\\?>
<?/////////////////NEWS 3\\\\\\\\\\\\?>
<?/////////////////NEWS 3\\\\\\\\\\\\?>
<?/////////////////NEWS 3\\\\\\\\\\\\?>

<div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
<div class='col-lg-1'>&nbsp;</div>
<div class='col-lg-5' style='' >
<p align='center' class='text-left'  id='news-col-1' >
<input type='checkbox' onclick="disableOthers('chkBox3');" class='input-lg form-control' id='edit_chkBox3' name='news_col3' value='news_col3' style='display:none;'></input>

<?php	////NEWS 3 
$chkRows = "SELECT * FROM `news_3`";
 if(mysqli_num_rows(mysqli_query($dbCon, $chkRows)) > '0'){
 /* /////////////////////////////////
////////////////////////////////// */
	 
$news_qry = "SELECT `news_title`,
					`news_article`,
					`news_img`,
					`news_link`,
					`news_date`,
					`news_comment`						
			FROM `news_3`
			WHERE `id` = 1
			ORDER BY `id` ASC;";
   $rslt = mysqli_query($dbCon,$news_qry) or die("Problem modasoka");
		$cmtChk = "SELECT DISTINCT `news_comment` 
				   FROM `news_1`";
		 $r = mysqli_query($dbCon, $cmtChk) or die(mysqli_error($dbCon));
	 while($news_fld = mysqli_fetch_assoc($rslt)){	  
		 if(mysqli_num_rows($r) > '1'){
			$cmt_cnt = mysqli_num_rows($r);
		}else{
			$cmt_cnt = '0';
		}
		  $art = $news_fld['news_article'];
			 if(strlen($art) > '350' ){
			   $readmoreBtn_id = array("readMore_btn","collapse");
				$art_firstHalf = substr($art, '0', '350');
				$art_secondHalf = substr($art, '351');						 
				 }else{
					$readmoreBtn_id = array("hide","collapse in");						 
					 $art_firstHalf = $art;
					 $art_secondHalf = NULL;
				 }  

?>
  <?// news name \\?>
  <caption><?=$news_fld['news_title']?></caption>
  
   <?// news img \\?>
   <a href='news-view.php?art=3' target='_self' title='News Name' >
	<img src='<?=urldecode($news_fld['news_img'])?>' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?=$cmt_cnt?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=$news_fld['news_date']?>&nbsp;&nbsp;			 
			 <b>
			  <a href='<?=urldecode($news_fld['news_link'])?>' title='<?=$news_fld['news_title']." "?> source' class='btn btn-link' >
			  News Source
			  </a>
			 </b>
		 </span>
		
	<?// news story article \\?>
	<div class='news_story'>

	
	 <?=$art_firstHalf?>
	  
				 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='<?=$readmoreBtn_id['0']?>' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news3' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news3' class="<?=$readmoreBtn_id['1']?>" >
		
		<?=$art_secondHalf?>

	  </div>
	 </div>	
 
	<?php
	 } /// END OF WHILE LOOPS
 }else{
	?>
  <?// news name \\?>
  <caption>News Name</caption>
  
   <?// news img \\?>
   <a href='#' target='_self' title='News Name' >
	<img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
			 
			 <b><a href='news_source' title='News source' class='btn btn-link' >News Source</a></b> 
		 </span>
 
	<?// news story article \\?>
	<div class='news_story'>
	 <?=DT?>
	  <br>			 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news3' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news3' class='collapse' >
 
		<?=DT?>
		<?=DT?>

	  </div>
	 </div>
	 
<?php
 }
?>
  </p>		  
 </div>	
 
<?/////////////////NEWS 4\\\\\\\\\\\\?>
<?/////////////////NEWS 4\\\\\\\\\\\\?>
<?/////////////////NEWS 4\\\\\\\\\\\\?>
<?/////////////////NEWS 4\\\\\\\\\\\\?>

<div class='col-lg-5' style='' >
<p align='center' class='text-left'  id='news-col-1' >
<input type='checkbox' onclick="disableOthers('chkBox4');" class='input-lg form-control' id='edit_chkBox4' name='news_col4' value='news_col4' style='display:none;'></input>

<?php	////NEWS 4 
$chkRows = "SELECT * FROM `news_4`";
 if(mysqli_num_rows(mysqli_query($dbCon, $chkRows)) > '0'){
 /* /////////////////////////////////
////////////////////////////////// */
	 
$news_qry = "SELECT `news_title`,
					`news_article`,
					`news_img`,
					`news_link`,
					`news_date`,
					`news_comment`					
			FROM `news_4`
			WHERE `id` = 1
			ORDER BY `id` ASC;";
   $rslt = mysqli_query($dbCon,$news_qry) or die("Problem modasoka");
		$cmtChk = "SELECT DISTINCT `news_comment` 
				   FROM `news_1`";
		 $r = mysqli_query($dbCon, $cmtChk) or die(mysqli_error($dbCon));
	 while($news_fld = mysqli_fetch_assoc($rslt)){	  
		 if(mysqli_num_rows($r) > '1'){
			$cmt_cnt = mysqli_num_rows($r);
		}else{
			$cmt_cnt = '0';
		}
		  $art = $news_fld['news_article'];
			 if(strlen($art) > '350' ){
			   $readmoreBtn_id = array("readMore_btn","collapse");
				$art_firstHalf = substr($art, '0', '350');
				$art_secondHalf = substr($art, '351');						 
				 }else{
					$readmoreBtn_id = array("hide","collapse in");						 
					 $art_firstHalf = $art;
					 $art_secondHalf = NULL;
				 }  

?>
  <?// news name \\?>
  <caption><?=$news_fld['news_title']?></caption>
  
   <?// news img \\?>
   <a href='news-view.php?art=4' target='_self' title='News Name' >
	<img src='<?=urldecode($news_fld['news_img'])?>' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?=$cmt_cnt?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=$news_fld['news_date']?>&nbsp;&nbsp;
			 
			 <b>
			  <a href='<?=urldecode($news_fld['news_link'])?>' title='<?=$news_fld['news_title']." "?> source' class='btn btn-link' >
			  News Source
			  </a>
			 </b>
		 </span>
		
	<?// news story article \\?>
	<div class='news_story'>

	
	 <?=$art_firstHalf?>
	  
				 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='<?=$readmoreBtn_id['0']?>' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news4' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news4' class="<?=$readmoreBtn_id['1']?>" >
		
		<?=$art_secondHalf?>

	  </div>
	 </div>	
 
	<?php
	 } /// END OF WHILE LOOPS
 }else{
	?>
  <?// news name \\?>
  <caption>News Name</caption>
  
   <?// news img \\?>
   <a href='#' target='_self' title='News Name' >
	<img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
			 
			 <b><a href='news_source' title='News source' class='btn btn-link' >News Source</a></b> 
		 </span>
 
	<?// news story article \\?>
	<div class='news_story'>
	 <?=DT?>
	  <br>			 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news4' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news4' class='collapse' >
 
		<?=DT?>
		<?=DT?>

	  </div>
	 </div>
	 
<?php
 }
?>
</p>
</div>
<div class='col-lg-1'>&nbsp;</div> 
</div> 

<?/////////////////NEWS 5\\\\\\\\\\\\?>
<?/////////////////NEWS 5\\\\\\\\\\\\?>
<?/////////////////NEWS 5\\\\\\\\\\\\?>
<?/////////////////NEWS 5\\\\\\\\\\\\?>

<div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
<div class='col-lg-1'>&nbsp;</div>
<div class='col-lg-5' style=''>
<p align='center' class='text-left'  id='news-col-1' >
<input type='checkbox' onclick="disableOthers('chkBox5');" class='input-lg form-control' id='edit_chkBox5' name='news_col5' value='news_col5' style='display:none;'></input>

<?php	////NEWS 5 
$chkRows = "SELECT * FROM `news_5`";
 if(mysqli_num_rows(mysqli_query($dbCon, $chkRows)) > '0'){
 /* /////////////////////////////////
////////////////////////////////// */
	 
$news_qry = "SELECT `news_title`,
					`news_article`,
					`news_img`,
					`news_link`,
					`news_date`,
					`news_comment`					
			FROM `news_5`
			WHERE `id` = 1
			ORDER BY `id` ASC;";
   $rslt = mysqli_query($dbCon,$news_qry) or die("Problem modasoka");
		$cmtChk = "SELECT DISTINCT `news_comment` 
				   FROM `news_1`";
		 $r = mysqli_query($dbCon, $cmtChk) or die(mysqli_error($dbCon));
	 while($news_fld = mysqli_fetch_assoc($rslt)){	  
		 if(mysqli_num_rows($r) > '1'){
			$cmt_cnt = mysqli_num_rows($r);
		}else{
			$cmt_cnt = '0';
		}
		  $art = $news_fld['news_article'];
			 if(strlen($art) > '350' ){
			   $readmoreBtn_id = array("readMore_btn","collapse");
				$art_firstHalf = substr($art, '0', '350');
				$art_secondHalf = substr($art, '351');						 
				 }else{
					$readmoreBtn_id = array("hide","collapse in");						 
					 $art_firstHalf = $art;
					 $art_secondHalf = NULL;
				 }   

?>
  <?// news name \\?>
  <caption><?=$news_fld['news_title']?></caption>
  
   <?// news img \\?>
   <a href='news-view.php?art=5' target='_self' title='News Name' >
	<img src='<?=urldecode($news_fld['news_img'])?>' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?=$cmt_cnt?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=$news_fld['news_date']?>&nbsp;&nbsp;
			 
			 <b>
			  <a href='<?=urldecode($news_fld['news_link'])?>' title='<?=$news_fld['news_title']." "?> source' class='btn btn-link' >
			  News Source
			  </a>
			 </b>
		 </span>
		
	<?// news story article \\?>
	<div class='news_story'>

	
	 <?=$art_firstHalf?>
	  
				 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='<?=$readmoreBtn_id['0']?>' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news5' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news5' class="<?=$readmoreBtn_id['1']?>" >
		
		<?=$art_secondHalf?>

	  </div>
	 </div>	
 
	<?php
	 } /// END OF WHILE LOOPS
 }else{
	?>
  <?// news name \\?>
  <caption>News Name</caption>
  
   <?// news img \\?>
   <a href='#' target='_self' title='News Name' >
	<img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
			 
			 <b><a href='news_source' title='News source' class='btn btn-link' >News Source</a></b> 
		 </span>
 
	<?// news story article \\?>
	<div class='news_story'>
	 <?=DT?>
	  <br>			 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news5' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news5' class='collapse' >
 
		<?=DT?>
		<?=DT?>

	  </div>
	 </div>
	 
<?php
 }
?>
  </p>		  
 </div>	
 
<?/////////////////NEWS 6\\\\\\\\\\\\?>
<?/////////////////NEWS 6\\\\\\\\\\\\?>
<?/////////////////NEWS 6\\\\\\\\\\\\?>
<?/////////////////NEWS 6\\\\\\\\\\\\?>

<div class='col-lg-5' style='' >
<p align='center' class='text-left'  id='news-col-1' >
<input type='checkbox' onclick="disableOthers('chkBox6');" class='input-lg form-control' id='edit_chkBox6' name='news_col6' value='news_col6' style='display:none;'></input>

<?php	////NEWS 6 
$chkRows = "SELECT * FROM `news_6`";
 if(mysqli_num_rows(mysqli_query($dbCon, $chkRows)) > '0'){
 /* /////////////////////////////////
////////////////////////////////// */
	 
$news_qry = "SELECT `news_title`,
					`news_article`,
					`news_img`,
					`news_link`,
					`news_date`,
					`news_comment`						
			FROM `news_6`
			WHERE `id` = 1
			ORDER BY `id` ASC;";
   $rslt = mysqli_query($dbCon,$news_qry) or die("Problem modasoka");
		$cmtChk = "SELECT DISTINCT `news_comment` 
				   FROM `news_1`";
		 $r = mysqli_query($dbCon, $cmtChk) or die(mysqli_error($dbCon));
	 while($news_fld = mysqli_fetch_assoc($rslt)){	  
		 if(mysqli_num_rows($r) > '1'){
			$cmt_cnt = mysqli_num_rows($r);
		}else{
			$cmt_cnt = '0';
		}
		  $art = $news_fld['news_article'];
			 if(strlen($art) > '350' ){
			   $readmoreBtn_id = array("readMore_btn","collapse");
				$art_firstHalf = substr($art, '0', '350');
				$art_secondHalf = substr($art, '351');						 
				 }else{
					$readmoreBtn_id = array("hide","collapse in");						 
					 $art_firstHalf = $art;
					 $art_secondHalf = NULL;
				 }  

?>
  <?// news name \\?>
  <caption><?=$news_fld['news_title']?></caption>
  
   <?// news img \\?>
   <a href='news-view.php?art=4' target='_self' title='News Name' >
	<img src='<?=urldecode($news_fld['news_img'])?>' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?=$cmt_cnt?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=$news_fld['news_date']?>&nbsp;&nbsp;
			 
			 <b>
			  <a href='<?=urldecode($news_fld['news_link'])?>' title='<?=$news_fld['news_title']." "?> source' class='btn btn-link' >
			  News Source
			  </a>
			 </b>
		 </span>
		
	<?// news story article \\?>
	<div class='news_story'>

	
	 <?=$art_firstHalf?>
	  
				 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='<?=$readmoreBtn_id['0']?>' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news6' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news6' class="<?=$readmoreBtn_id['1']?>" >
		
		<?=$art_secondHalf?>

	  </div>
	 </div>	

	<?php
	 } /// END OF WHILE LOOPS
 }else{
	?>
  <?// news name \\?>
  <caption>News Name</caption>
  
   <?// news img \\?>
   <a href='#' target='_self' title='News Name' >
	<img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
   </a>
	 <br>
		   <span class='well well-xs text-center center-block lead'>
			 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;

			 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
			 
			 <b><a href='news_source' title='News source' class='btn btn-link' >News Source</a></b> 
		 </span>
 
	<?// news story article \\?>
	<div class='news_story'>
	 <?=DT?>
	  <br>			 
	   <?// readmore toggle button \\?>
	   <button onclick='this.style.display="none";' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news6' data-toggle='collapse' >
		Read More
	   </button>
	  
	  <?// read more content \\?>
	  <div id='rest_of_news6' class='collapse' >
 
		<?=DT?>
		<?=DT?>

	  </div>
	 </div>
	 
<?php
 }
?>
  </p>		  
 </div>

<div class='col-lg-1'>&nbsp;</div> 
</div>	 
</form> 

<?////// END OF NEWS 1-6 \\\\\\\\\\?>
<?////// END OF NEWS 1-6 \\\\\\\\\\?>
<?////// END OF NEWS 1-6 \\\\\\\\\\?>
<?////// END OF NEWS 1-6 \\\\\\\\\\?>
<?////// END OF NEWS 1-6 \\\\\\\\\\?>
</div>
</div>	 
<?// end of rows 1,2,3 \\?> <?// end of rows 1,2,3 \\?>
<?// end of rows 1,2,3 \\?> <?// end of rows 1,2,3 \\?>
</section>

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
<script>
  var chkBox1 = document.getElementById("edit_chkBox1"); 
  var chkBox2 = document.getElementById("edit_chkBox2"); 
  var chkBox3 = document.getElementById("edit_chkBox3"); 
  var chkBox4 = document.getElementById("edit_chkBox4"); 
  var chkBox5 = document.getElementById("edit_chkBox5"); 
  var chkBox6 = document.getElementById("edit_chkBox6");
 
function disableOthers(k){
var nput1 = document.getElementById("nput1");
var nput2 = document.getElementById("nput2");
var nput3 = document.getElementById("nput3");
var nput4 = document.getElementById("nput4");
var b = document.getElementById("submitBtn");
var tarea = document.getElementById("t_area");
var h2 = document.getElementById("h2");
 if(k == "chkBox1"){
   chkBox2.setAttribute("disabled",""); 
   chkBox3.setAttribute("disabled",""); 
   chkBox4.setAttribute("disabled",""); 
   chkBox5.setAttribute("disabled",""); 
   chkBox6.setAttribute("disabled","");			 
 }else if(k == "chkBox2"){
   chkBox1.setAttribute("disabled",""); 
   chkBox3.setAttribute("disabled",""); 
   chkBox4.setAttribute("disabled",""); 
   chkBox5.setAttribute("disabled",""); 
   chkBox6.setAttribute("disabled","");			 
 }else if(k == "chkBox3"){
   chkBox1.setAttribute("disabled",""); 
   chkBox2.setAttribute("disabled",""); 
   chkBox4.setAttribute("disabled",""); 
   chkBox5.setAttribute("disabled",""); 
   chkBox6.setAttribute("disabled","");			 
 }else if(k == "chkBox4"){
   chkBox1.setAttribute("disabled",""); 
   chkBox2.setAttribute("disabled",""); 
   chkBox3.setAttribute("disabled",""); 
   chkBox5.setAttribute("disabled",""); 
   chkBox6.setAttribute("disabled","");			 
 }else if(k == "chkBox5"){
   chkBox1.setAttribute("disabled",""); 
   chkBox2.setAttribute("disabled",""); 
   chkBox3.setAttribute("disabled",""); 
   chkBox4.setAttribute("disabled",""); 
   chkBox6.setAttribute("disabled","");			 
 }else if(k == "chkBox6"){
   chkBox1.setAttribute("disabled",""); 
   chkBox2.setAttribute("disabled",""); 
   chkBox3.setAttribute("disabled",""); 
   chkBox4.setAttribute("disabled",""); 
   chkBox5.setAttribute("disabled",""); 
 }else{		  	  	  
	} 
	nput1.removeAttribute("disabled");
	nput2.removeAttribute("disabled");
	nput3.removeAttribute("disabled");
	nput4.removeAttribute("disabled");
	b.removeAttribute("disabled");
	tarea.removeAttribute("disabled");
	h2.style.display = "none";
	document.getElementById("news_edit").style.opacity = "1";
} 

 if(document.getElementById("news_edit").className == 'well well-lg collapse in'){
	chkBox1.style.display = "block";
	chkBox2.style.display = "block";
	chkBox3.style.display = "block";
	chkBox4.style.display = "block";
	chkBox5.style.display = "block";
	chkBox6.style.display = "block";
	}else {  
function chkEditBtn(){
		chkBox1.style.display = "block";
		chkBox2.style.display = "block";
		chkBox3.style.display = "block";
		chkBox4.style.display = "block";
		chkBox5.style.display = "block";
		chkBox6.style.display = "block";
		}
	}
</script>	
