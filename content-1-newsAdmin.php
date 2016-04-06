<section class='main' style='border-radius:20px 20px;border:2px double #666;'>
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
<?// ////////////  TELL PHP 2 USE EXPRESSION TO CREATE 'READ-MORE' BTN IF NEWS-SUBMISSION-TEXT _WORD COUNT greater than '#...' VIA 'strlen()' funtion... \\\\\\\\\?>
<?// ////////////  TELL PHP 2 USE EXPRESSION TO CREATE 'READ-MORE' BTN IF NEWS-SUBMISSION-TEXT _WORD COUNT greater than '#...' VIA 'strlen()' funtion... \\\\\\\\\?>
<?// ////////////  TELL PHP 2 USE EXPRESSION TO CREATE 'READ-MORE' BTN IF NEWS-SUBMISSION-TEXT _WORD COUNT greater than '#...' VIA 'strlen()' funtion... \\\\\\\\\?>
<?// ////////////  TELL PHP 2 USE EXPRESSION TO CREATE 'READ-MORE' BTN IF NEWS-SUBMISSION-TEXT _WORD COUNT greater than '#...' VIA 'strlen()' funtion... \\\\\\\\\?>
<?php
	if(isset($_POST['newsUpdate'])){
	  if(((((isset($_POST['news_title']) && !empty($_POST['news_title']))
			&& isset($_POST['news_article']) && !empty($_POST['news_article']))
			&& isset($_POST['news_img']) && !empty($_POST['news_img']))
			&& isset($_POST['news_date']) && !empty($_POST['news_date']))
			&& isset($_POST['news_link']) && !empty($_POST['news_link'])){
				$_POST['news_title'] = strip_tags(ucfirst(trim($_POST['news_title'])));
				$_POST['news_article'] = strip_tags(ucfirst($_POST['news_article']));
				$_POST['news_date'] = strip_tags(trim($_POST['news_date']));
				$_POST['news_link'] =  trim($_POST['news_link']);

		$qry = "INSERT INTO `news`(`news_title`,
									`news_article`,
									`news_img`,
									`news_date`,
									`news_link`) 
									VALUES ('{$_POST['news_title']}',
											'{$_POST['news_article']}',
											'{$_POST['news_img']}',
											'{$_POST['news_date']}',
											'{$_POST['news_link']}')";
			
			$rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
			 
			}  ///END if posts submitted are set
		} ///END if submit btn clicked
		 
?>	 

<?////******** NEWS MID SECTION ROW 1 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 1 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 1 ***************\\\\?>
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-1'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-5' style='' >
		 <p align='center' class='text-left'  id='news-col-1'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
			<form action='<?=$_SERVER['PHP_SELF']?>' method='POST' class='form-group'>
			 <input type='text' maxlength='30' name='news_title' placeholder='Enter News Name ' class='input input-lg form-control' />
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
			 <input type='url' maxlength='50' name='news_img' placeholder='Enter URL for Thumbnail ' class='input input-lg form-control' />
	 	 	 
			  <br>
		   <span class='well well-xs text-center center-block lead'>
		   Enter Publication Date
			<input type='date' name='news_date' maxlength='10' size='10' class='input input-sm form-control' value='' placeholder='<?=date('j-m-Y')?>' />
		   Enter Link to News Source
			<input type='url' name='newslink' maxlength='100' size='100' class='input input-md form-control' value='' placeholder='News Source' />
		   </span>
				
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news' data-toggle='collapse' >
			    Read More
			   </button>

			   <?// read more content \\?>
			  <div id='rest_of_news' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 <textarea maxlength='500' name='news_article' placeholder='Enter News Article summary' class='input input-lg form-control' ></textarea>						
			<input type='submit' name='newsUpdate' value='Update' class='btn btn-success input-lg' />
			<input type='reset' name='' value='Clear' class='btn btn-warning input-lg' />
		  <br>			    
	  </form>
	 </div>
  </p>		  
 </div>
		 
	 <?// news col-2 \\?>
	  <div class='col-lg-5' style='' >
		<p align='center' class='text-left'  id='news-col-2'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
			<form action='' method='' class='form-group'>
			 <input type='text' maxlength='30' name=' ' placeholder='Enter News Name ' class='input input-lg form-control' />
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
			 <input type='text' maxlength='' name='' placeholder='Enter URL for Thumbnail ' class='input input-lg form-control' />
	 	 	 
			 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
				
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news2' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news2' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 <textarea maxlength='500' name='newsOfTheDay_summary' placeholder='Enter News Article summary' class='input input-lg form-control' ></textarea>						
			<input type='submit' name='' value='Update' class='btn btn-success input-lg' />
			<input type='reset' name='' value='Clear' class='btn btn-warning input-lg' />
		  <br>			    
	  </form>
		  </p>		    
		 </div>
		<div class='col-lg-1'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>

<?////******** NEWS MID SECTION ROW 2 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 2 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 2 ***************\\\\?>
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-1'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-5' style='' >
		 <p align='center' class='text-left'  id='news-col-1'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news3' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news3' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		  
		 </div>
		 
	 <?// news col-2 \\?>
	  <div class='col-lg-5' style='' >
		<p align='center' class='text-left'  id='news-col-2'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn2' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news4' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news4' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		    
		 </div>
		<div class='col-lg-1'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>

<?////******** NEWS MID SECTION ROW 3 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 3 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 3 ***************\\\\?>	 
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-1'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-5' style='' >
		 <p align='center' class='text-left'  id='news-col-1'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news5' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news5' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		  
		 </div>
		 
	 <?// news col-2 \\?>
	  <div class='col-lg-5' style='' >
		<p align='center' class='text-left'  id='news-col-2'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn2' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news6' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news6' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		    
		 </div>
		<div class='col-lg-1'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>

	 
 <?// end of rows 1,2,3 \\?> <?// end of rows 1,2,3 \\?>
 <?// end of rows 1,2,3 \\?> <?// end of rows 1,2,3 \\?>
</section>

 
<section class='main' style='border-radius:20px 20px;border:2px double #666;'>
<?////******** NEWS MID SECTION ROW 4 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 4 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 4 ***************\\\\?>
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-1'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-5' style='' >
		 <p align='center' class='text-left'  id='news-col-1'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news7' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news7' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		  
		 </div>
		 
	 <?// news col-2 \\?>
	  <div class='col-lg-5' style='' >
		<p align='center' class='text-left'  id='news-col-2'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn2' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news8' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news8' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		    
		 </div>
		<div class='col-lg-1'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>

<?////******** NEWS MID SECTION ROW 5 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 5 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 5 ***************\\\\?> 
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-1'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-5' style='' >
		 <p align='center' class='text-left'  id='news-col-1'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn8' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news9' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news9' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		  
		 </div>
		 
	 <?// news col-2 \\?>
	  <div class='col-lg-5' style='' >
		<p align='center' class='text-left'  id='news-col-2'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn2' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news10' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news10' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		    
		 </div>
		<div class='col-lg-1'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>
 
<?////******** NEWS MID SECTION ROW 6 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 6 ***************\\\\?>	 
<?////******** NEWS MID SECTION ROW 6 ***************\\\\?> 
	 <div class='content1'>
	  <div class='container'>
	   <div class='row' style='padding:10px 7px;border: 2px double rgba(0,0,0,0.4);background-color:rgba(255,255,255,0.24);border-radius:10px 10px;'>
		<div class='col-lg-1'>&nbsp;</div>
		 
		<?// news col-1 \\?>
		<div class='col-lg-5' style='' >
		 <p align='center' class='text-left'  id='news-col-1'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news11' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news11' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		  
		 </div>
		 
	 <?// news col-2 \\?>
	  <div class='col-lg-5' style='' >
		<p align='center' class='text-left'  id='news-col-2'>
		 
		  <?// news name \\?>
		  <caption>News Name</caption>
		  
		   <?// news img \\?>
		   <img src='css/pix/car.jpg' alt='Example' width='370px' class='img-responsive img-rounded center-block' />
 	 	 	 <br>
 	 	 	 	   <span class='well well-xs text-center center-block lead'>
 	 	 	 	 	 <b>Comments:&nbsp;</b><?="225"?>&nbsp;&nbsp;
 
 	 	 	 	 	 <b>Date:&nbsp;</b><?=date("m-j-Y");?>&nbsp;&nbsp;
 	 	 	 	 	 
 	 	 	 	 	 <b>By:&nbsp;</b><?="Ex_name"?>
 	 	 	 	 </span>
	   	 
			<?// news story article \\?>
			<div class='news_story'>
			 <?=DT?>
			  <br>			 
			   <?// readmore toggle button \\?>
			   <button onclick='' id='readMore_btn2' type='button' class='btn btn-primary btn-sm center-block' data-target='#rest_of_news12' data-toggle='collapse' >
			    Read More
			   </button>
			  
			  <?// read more content \\?>
			  <div id='rest_of_news12' class='collapse' >
			   <summary>
			    <?=DT?>
			    <?=DT?>
			   </summary>
			  </div>
			 </div>
		  </p>		    
		 </div>
		<div class='col-lg-1'>&nbsp;</div>		
	   </div>
	  </div>
	 </div>

	 
 <?// end of rows \\?> <?// end of rows \\?>
 <?// end of rows \\?> <?// end of rows \\?>
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
 /// put anything here whenever
</script>