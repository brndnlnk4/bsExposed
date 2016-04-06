<?php	//////////////////////////////////////////////
////////// VIDEO IMAGE UPLOAD PROCESS SECTION \\\\\\\\\
if(isset($_FILES['uploadedfile'])){
 $file = $_FILES['uploadedfile'];
 $user = _USER_;	
  //file properties					
  $file_name = $file['name'];			
  $file_tmp = $file['tmp_name'];		
  $file_size = $file['size'];			
   global $file_name;				
	///file extension & checks		
	$file_ext = explode('.', $file_name);												
	$file_ext = strtolower(end($file_ext));													
	$allowed_ext =  array( 'jpg', 'png', 'bmp', 'gif');
	/// confirm img ext is good															
	if(in_array($file_ext, $allowed_ext)){ 					
		if($file_size <= 1000000){								
		   $file_error = NULL;																										
		   $file_name_new = uniqid('', true) . '.' . $file_ext;																	
		   $file_destination = $_SERVER['DOCUMENT_ROOT']."/upl/vid_pics/".$file_name_new;
	
//////////////// INSERT VID NFO AND IMG INTO DB ///////////////////////////////
//////////////// INSERT VID NFO AND IMG INTO DB ///////////////////////////////
	if(isset($_REQUEST['vid_nfo_edit_submit'])){
	  if((isset($_POST['vid_title']) && !empty($_POST['vid_title']))
	  && (isset($_POST['vid_desc']) && !empty($_POST['vid_desc']))
	  && (isset($_POST['vid_category']) && !empty($_POST['vid_category']))
	  && (isset($_POST['vid_rating_title']) && !empty($_POST['vid_rating_title']))
	  && (isset($_POST['vid_rating']) && !empty($_POST['vid_rating']))
	  && (isset($_POST['vid_publisher']) && !empty($_POST['vid_publisher']))
	  && (isset($_POST['vid_source']) && !empty($_POST['vid_source']))){
		/// STRIP ANY TAGS FROM POST
		$_POST['vid_title'] = mysqli_real_escape_string($dbCon,$_POST['vid_title']);
		$_POST['vid_desc'] = mysqli_real_escape_string($dbCon,$_POST['vid_desc']);
		$_POST['vid_rating_title'] = strip_tags($_POST['vid_rating_title']);
		$_POST['vid_publisher'] = strip_tags($_POST['vid_publisher']);
		$_POST['vid_source'] = strip_tags(urlencode(mysqli_real_escape_string($dbCon,$_POST['vid_source'])));
	    ///// CREATE '_video_cmt' TABLE 4 UPLOADED VID ///////////
	    
		$tbl_name = "video_".$_POST['vid_title'];
		
		$tblrslt = mysqli_query($dbCon,"SHOW TABLES LIKE '$tbl_name'");
		
		 if(mysqli_num_rows($tblrslt) == 0){
		  $qry = "CREATE TABLE `$tbl_name` (
				 `id` int(4) NOT NULL AUTO_INCREMENT,
				 `video_name` varchar(30) NOT NULL,
				 `video_comment_member` varchar(100) NOT NULL,
				 `video_comment` text NOT NULL,
				 `video_comment_date` date NOT NULL,
				 `video_comment_vote` int(4) NOT NULL DEFAULT '0',
				 `video_comment_reply` int(2) NOT NULL DEFAULT '0',
				 `video_comment_reply_member` varchar(100) NOT NULL,
				 `video_comment_reply_cmt` text NOT NULL,
				  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";	  
			 mysqli_query($dbCon, $qry) or die("Failed to create table ".mysqli_error($dbCon));					
		
		}		
//////////////// INSERT VID NFO INTO DB  ///////////////////////////////		
		$date2day = date("Y-m-d");
		 $query = "INSERT INTO `videos`
					(`video_title`, 
					`video_images`,
					`video_description`,
					`video_category`,
					`video_rating_title`,
					`video_rating`,
					`video_publisher`,
					`video_src`,
					`video_date`) 
					VALUES 
					('{$_POST['vid_title']}',
					'{$file_name_new}',
					'{$_POST['vid_desc']}',
					'{$_POST['vid_category']}',
					'{$_POST['vid_rating_title']}',
					'{$_POST['vid_rating']}',
					'{$_POST['vid_publisher']}',
					'{$_POST['vid_source']}',
					'$date2day')";				
																					
				mysqli_query($dbCon, $query) or die("Failed to add video nfo into db ".mysqli_error($dbCon));					
		
		} /// END OF IF(ISET(_POST))
		else{
			$file_error = "Please fill out all fields";
		}
/////////////////////////////////////////////////////////////////////////////				
/////////////////////////////////////////////////////////////////////////////				
	if(move_uploaded_file($file_tmp, $file_destination)){				 
	   $pic_upl = true;										 
			}else{
				$pic_upl = false;
				$file_error = "File not moved to uploads folder, contact admin for help";
				}	 				
		} /// END OF IF(SUBMT BTN CLICKED)
	}else{										
		$file_error = "File size is too large, max size is 1mb";
		}
}else{											
	$file_error = "Wrong picture format, Can only use PNG, JPG, GIF, OR BMP";	
	}
global $file_error;	
} /// END OF IF(FILE-UPLOADED)
////////////////////// END OF VID PIC UPLOAD PROCESS \\\\\\\\\\\\\\\\\
////////////////////// END OF VID PIC UPLOAD PROCESS \\\\\\\\\\\\\\\\\
////////////////////// END OF VID PIC UPLOAD PROCESS \\\\\\\\\\\\\\\\\
?>

<section class='main' style='border-radius:20px 20px;border:2px double #666;'>
  <?// cont-1 \\|// cont-1 \\?>
	<center>
	 <h2 style='color:#aaa;font-weight:bold;text-align:center;text-shadow:0px 4px 8px #111;'>
	  Recent Videos
	 </h2>
	</center>
 <?//admin edit row \\?><?//admin edit row \\?>
 <?//admin edit row \\?><?//admin edit row \\?>
 <?//admin edit row \\?><?//admin edit row \\?>

<span class='well well-lg center-block bg-777' id='<?=switchIfLoggedIn('','hide')?>'>
 <button type='button' class='btn btn-danger btn-lg center-block' data-toggle='collapse' data-target='#vidAdd' >
  Add New Video
 </button>
</span>

 <div class='<?=switchIfLoggedIn('collapse content content-1-edit', 'hide')?>' id='vidAdd'>
  <div class='container-fluid'>   
   <form enctype="multipart/form-data" action="videos.php" method="POST" >	  
    <div class='row' id='vid-info-row' style='padding:7px 7px;border: 1px solid #666; border-radius:10px 10px;'>

<?php //// CHECKS IF VID-PIC AND INFO SUCCESSFULLY SUBMITTED TO DB \\\\\\
	if(isset($pic_upl) && $pic_upl == true){
	   ?>
		<script>
		   alert("Woot! Video-info Successfully Added");
		</script>
		<?php
	}        
?>													
													
<?// video nfo edit form for admin \\\?>		
  <div class='col-lg-3' >
	 <?/// VIDEO THUMBNAIL LIST \\\?>
 		<?// video nfo edit section for admin \\\?>
		<div class='<?=switchIfLoggedIn('vid_nfo_edit', 'hide')?>'>
		 <p align='center' valign='top' class='center-block' style=''>					
		   Video Title			  
		  <input type='text' class='form-control input-sm' maxlength='30' name='vid_title' value='' placeholder='Video Title' required />
		 </p>		    
 	   <?// upload image \\?>
		<p align='center' valign='top' id='' >
		<?php
			if(isset($pic_upl) && $pic_upl == true){
			   echo "<img src = 'upl/vid_pics/".						
				 $file_name_new										
				."' width='200px' class='img-responsive img-rounded'></img>";					
			}else{
				?>
				 <img src='css/pix/Brandon2.jpg' alt='Featured Video' width='200px' style='border:4px solid rgba(255,255,255,0.2);box-shadow:0px 3px 5px #444;'  />				
				<?php	
			}
		?> 
		 <span class='center-block'>
		  <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/><!--bytes-->
		  <input name="uploadedfile" type="file" class='input-lg btn btn-warning' type='button' required />
		 </span>
		</p>	
	</div>
	 </div>
	  <div class='col-lg-7'>
	   <div class='<?=switchIfLoggedIn('vid_nfo_edit', 'hide')?>'>
		 <p align='center' valign='top' class='center-block'>
		  Video Description
		 <textarea name='vid_desc' class='input-lg center-block' cols='50' rows='7' size='300' maxlength='600' placeholder='Enter Video Summary' style='color:#333;' required></textarea>
		</p>
	  </div>
	<?php
			if(isset($pic_upl) && $pic_upl == true){
			 echo "<br>";
			  echo "<h1 class='lead bg-ddd'>Successfully Added Video Info</h1>";
			  }
	?>
	 </div>
	  <div class='col-lg-2' >
	   <?// video rating edit section for admin \\\?>
		<div class='<?=switchIfLoggedIn('vid_nfo_edit', 'hide')?>'>
		 <p align='center' valign='top' class='center-block' style=''>					
		  Rating Title			  
		  <input type='text' class='form-control input-sm' maxlength='10' name='vid_rating_title' value='' placeholder='Rating Title' />
		 </p> 		    
		<br>								
		<?// video nfo edit section for admin \\\?>
		 <p align='center' valign='top' class='center-block' style=''>					
		   Rating 
		  <select class='form-control' name='vid_rating' value='' >
			<option name=''>--------</option>
			<option name='' selected>Choose-Rating</option>
			<option name='adult'>Adult</option>
			<option name='mature'>Mature</option>
			<option name='teens'>Teens</option>
			<option name='everyone'>Everyone</option>
		  </select> 
		 </p>
		 <p align='center' valign='top' class='center-block' style=''>					
		   Category			  
		  <select class='form-control' name='vid_category' value='' >
			<option name=''>-------</option>
			<option name='' selected>Choose Category</option>
			<option name='news'>News</option>
			<option name='politics'>Politics</option>
			<option name='science'>Science</option>
			<option name='wtf'>WTF</option>
			<option name='conspiracy'>Conspiracy</option>
			<option name='must_watch'>Must_Watch</option>
		  </select> 			 
		 </p> 		    
		</div>
	  </div>
   </div>
   <div class='row'>
	 <div class='col-lg-12'>
	  <br>
	   <?/// edit video src & uploader-publisher info \\\\?>
		<span class='well well-xs center-block lead' style='background-color:rgba(255,255,255,0.15);' title='For Admin Only' >
		   <label for='vid_publisher' class='control-label'>
			Video Publisher: 
		   </label>
		  <input type='name' class='form-control input-lg' maxlength='30' name='vid_publisher' value='' placeholder='Name of Publisher' />
		 <br>
		   <label for='vid_source' class='control-label'>
			Source or Embed Code:
		   </label>
		  <input type='text' class='form-control input-lg' maxlength='150' name='vid_source' value='' placeholder='Enter Video Link or src' />
		</span>
	  <hr />
		  <span class='center-block well well-sm' title='When done click Add Video to Upload' >
		   <input type='submit' class='btn btn-danger input-lg' name='vid_nfo_edit_submit' value='Add-Video' />	 	
		   <input type='reset' class='btn btn-warning input-lg' value='Restart' />
		  </span>
		 <br>
	   </div>
	 </div>   
   </form> 	  
  </div>
 </div>
<!----/////////////////////////////////////////////////////////////------>
<!----///////////////END OF ADMIN EDIT SECTION/////////////////------>
<!----///////////////END OF ADMIN EDIT SECTION/////////////////------>
<!----/////////////////////////////////////////////////////////////------>
<?php
if(isset($file_error)){
	echo "<b class='well well-sm center-block'>".$file_error."</b>";
}
?>	

<?/// video search \\\/// video search \\\?>
<?/// video search \\\/// video search \\\?>
<div class='well well-sm' style='max-width:80%;padding:2px;margin:5px auto;'>
	 <center>
	  <strong>
		Search Videos
	  </strong>
	 </center>
	<ul align='center' valign='top' class='form form-horizontal list-inline' >
		 <li class='list-group-item' >
			<label class='label' for='vid_title'>Name</label>								  
				
				<input type='name' class='form-control input-lg' maxlength='30' name='vid_title' id='vid_ttle' value='' placeholder='Video'  />
		 
		 </li>
		 <li class='list-group-item' > 
			<label class='label' for='vid_cat'>Category</label>
		  
			  <select class='form-control input-lg' name='vid_cat' id='vid_cat' value='' >					
				<option name='' value='' selected>Choose Category</option>
				<option name='news' value='News'>News</option>
				<option name='politics' value='Politics'>Politics</option>
				<option name='science' value='Science'>Science</option>
				<option name='wtf' value='WTF'>WTF</option>
				<option name='conspiracy' value='Conspiracy'>Conspiracy</option>
				<option name='must_watch' value='Must_Watch'>Must_Watch</option>
			  </select> 
		  </li>
						 
	 </ul> 		    
</div>

<?//VIDEOS CONTENT START\\?>		
<?//VIDEOS CONTENT START\\?>
<style>
 #vidOutput > div:nth-of-type(even) #midDesc {
	color:#C7C7FF;
}
</style>
<div id='vidOutput' >
</div> 
<!--- END #vidOUtput --->

	 <?// end of rows \\?> <?// end of rows \\?>
	 <?// end of rows \\?> <?// end of rows \\?>
</section>
 