<section class='mainBottom' id='trgt2'>
  <p align='center' valign='top'>
	<h2 style='color:#999;font-weight:bold;text-align:center;text-align:center;text-shadow:0px 4px 8px #111;'>
	   Top 3 Videos
	</h2>
  </p>
	 <div class='content-1' id='vid-top3sel'>
	  <div class='container-fluid'>
	   <div class='row' >
		<style>
		  #place0:before{
				content: url("css/pix/ico/crown.png");
				margin: 0 auto;
			}
			.col-lg-4[name='first']:hover #place0:before{
				content: url("css/pix/ico/crownHvr.gif");
				margin: 0 auto;
			  }
			#place1:before{
				content: url("css/pix/ico/crown2.png");
				margin: 0 auto;
			}
			#place2:before{
				content: url("css/pix/ico/crown3.png");
				margin: 0 auto;
			}

</style>
<?php  /// PULLS TOP 3 HIGHEST VOTED VIDEOS FROM DB \\\
$qry = "SELECT	DISTINCT
			id,			
			video_title,
			video_images,
			video_description,
			video_category,
			video_rating_title,
			video_rating,
			video_date,
			video_publisher,
			video_src,
			video_vote
	FROM `videos`
	ORDER BY `video_vote` DESC
	LIMIT 3";		
	
	$rslt = mysqli_query($dbCon, $qry) or die("Could not retrieve video info for top 3 videos ".mysqli_error($dbCon));
	 $cnt = mysqli_num_rows($rslt);
	  if(!empty($rslt) && $cnt > "0"){			
		$i = '-1';	
		//// WHILE LOOP 4 TOP VID INFO					
		 while($topVid = mysqli_fetch_assoc($rslt)){
		  ////LOOP FOR CROWN ICON
		  $i = $i + '1';
		   $modalBtns = array('1st','2nd','3rd');
		   $crownIconId = array('1st_place','2nd-place','3rd-place');				  					
			$topVidd8 = explode('-',$topVid['video_date']);	
			$topVid['video_date'] = $topVidd8['1']."-".$topVidd8['2']."-".$topVidd8['0'];
			$vidTitle = $topVid['video_title'];
/////////////////////////////////////////////////////////////////////////////
?>

		<div class='col-lg-4' name='first'  style='border:11px solid transparent;'>
		 <span style='text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);'>
		  <?//// TOP VID TITLE AND CROWN ICON \\\\?> 
		   
		    <h2 class='well well-sm lead' style='font-weight:bold;text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);'>
				<sup id='<?="place".$i?>' style='color:#bbb;font-weight:200;'>
					<?=$modalBtns[$i]?>
				</sup>	
			  <br>
			 <figcaption id="<?=$crownIconId[$i]?>" > 
			  <?=ucfirst($topVid['video_title'])?>
			 </figcaption>			
			</h2>
			
			 </span>
			  <div class='table center-block' > 
			   <table class='table-responsive' cellspacing='0' cellpadding='1'>
				<tbody>
				<tr>
				 <thead>
				  <center>
				   <!--upload date-->
				  
				  <?=$topVid['video_date']?>
				  
				  </center>
					</thead>
					 </tr>
					 <tr>
					 <td colspan='100%' align='center'>
					
					 <?/// TOP VIDEO IMG \\\?>
					 <a href="view-vid.php?<?=md5('video_id')?>=<?=$topVid['id']?>#trgt3" target='_self' type='button' class='btn btn-warning' style='height:155px;padding:2px;'>					
					
					 <img src='upl/vid_pics/<?=$topVid['video_images']?>' alt='Top Video' title='Top Videos' width='255px' class='img-rounded img-responsive' style='margin: 0 auto;border:3px double rgba(0,0,0,0.3);box-shadow:0px 3px 5px #444;max-height:155px;' /> 
					
					</a>
					<hr>
					 <div id='<?=switchIfLoggedIn("mem-top-vid-icons", "hide")?>' >
					  <ul class='list-inline center-block'>
						<li style='width:50%;margin:0 auto;display:inline;min-height:55px;'>
							<button class='btn btn-link' id='<?=$modalBtns[$i]?>' onclick="cmtModal('<?=$vidTitle?>');" style='display:block;margin:0 auto;min-width:40px;'>
								<img src='css/pix/ico/cmt.png' alt='Comment' width='32px'  />
							</button>
						</li>
						<li style='width:50%;margin:0 auto;display:inline;min-height:55px;'>
							
							<?//email to friend \\?>
							<span type='button' class='btn btn-link' style='display:block;margin:0 auto;min-width:40px;overflow:none;' onmouseover='this.getElementsByTagName("span")[0].style.display="block"' onmouseout='this.getElementsByTagName("span")[0].style.display="none"'>
								<img src='css/pix/ico/email.png' alt='Comment' width='35px'  />
								 
								 <span class='well well-lg' title='copy' style='border:6px solid #555;background:#ccc;display:none;position:absolute;right:auto;padding:2px;z-index:900;cursor:auto;overflow:none;' >
								  URL:
								  <span class='text-center center-block input-lg' onmousedown='this.innerHTML = "<mark>"+"<?=urldecode("bsexposed.890m.com/view-vid.php?".md5('video_id')."=".$topVid['id']."#trgt3")?>"+"</mark>";' style='color:black;background-color:#ddd;'>
							   
									<?=urldecode("bsexposed.890m.com/view-vid.php?".md5('video_id')."=".$topVid['id']."#trgt3")?>
							  
								  </span>
								 </span>
							</span>
						</li>
						<li style='width:100%;margin:0 auto;'>
							<?/// VOTE COUNT SECTION \\\?>
							  <span style='width:50%;font-size:100%;border-radius:2px 2px;background:rgba(0,0,0,0.2);padding:2px 4px;display:block;text-align:center;line-height:1.32;letter-spacing:1.3px;margin:0 auto;'>
							  Votes: <b><?=$topVid['video_vote']?></b>
							  </span>								
						</li>
					   </ul>
					  </div>
					 </td>
					</tr>
			   </tbody>
			  </table>
			 </div>
		</div>	
	<?php
				}
		}else{
	?>
		 <div class='col-lg-4' name='first'>
		 <span style='text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);text-decoration:underline;'>
		  <h2 id='crown-png-4-1st-place' style='font-weight:bold;text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);text-decoration:underline;'>
				1st 
			</h2>
			 </span>
			  <div class='table center-block' > 
			   <table class='table-responsive' cellspacing='0' cellpadding='1' >
				<tbody>
				 <thead >
				  <center>
					  <!--upload date-->
					   <?=date('m-j-y')?>
				  </center>
					</thead>
					 <td colspan='100%' align='center'>
					<tr>
					 <?/// IMG \\\?>
				     <a href='view-vid.php' target='_self' >
					<img src='css/pix/car.jpg' alt='Vote' width='280px' class='img-rounded img-responsive' style='margin: 0 auto;border:3px double rgba(0,0,0,0.3);box-shadow:0px 3px 5px #444;' /> 
					</a>
					<hr>
					 <div  id='<?= switchIfLoggedIn("mem-top-vid-icons", "hide") ?>' >
					  <ul>
						<li>
							<a href='#trgt2' id='myBtn1'>
								<img src='css/pix/ico/cmt.png' alt='Comment' width='32px'  />
							</a>
						</li>
						<li>
							<a href='#' target='_blank' >
								<img src='css/pix/ico/dload.png' alt='Comment' width='32px'  />
							</a>
						</li>
						<li>
							<a href='#' target='_blank' >
								<img src='css/pix/ico/email.png' alt='Comment' width='32px'  />
							</a>
							<?/// VIEW COUNT SECTION \\\?>
						  <span style='border-radius:5px 5px;background:rgba(0,0,0,0.2);margin-left:15px;padding:2px 4px;display:inline-block;text-align:right;line-height:1.32;letter-spacing:2px;'>
						  Votes: <b>None</b>
						  </span>								
						</li>
					   </ul>
					  </div>
					 </td>
					</tr>

			   </tbody>
			  </table>
			 </div>
		</div>				
		<?// vid 2 of 3 \\?><?// vid 2 of 3 \\?>
		<?// vid 2 of 3 \\?><?// vid 2 of 3 \\?>
		 <div class='col-lg-4'>
		 <span style='text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);text-decoration:underline;'>
		  <h2 id='crown-png-4-2nd-place' style='font-weight:bold;text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);text-decoration:underline;'>
				2nd
			</h2>
			 </span>
			  <div class='table center-block' > 
			   <table class='table-responsive' cellspacing='0' cellpadding='1' >
				<tbody>
				 <thead >
				  <center> 
					  <!--upload date-->
					   <?=date('m-j-y')?>
				  </center>
					</thead>
					 <td colspan='100%' align='center'>
					<tr>
					 <?/// IMG OF TOP SONG \\\?>

					 <a href='view-vid.php' target='_self' >	 	 
					<img src='css/pix/car.jpg' alt='Vote' width='280px' class='img-rounded img-responsive' style='margin: 0 auto;border:3px double rgba(0,0,0,0.3);box-shadow:0px 3px 5px #444;' /> 
					</a>							
					<hr>
					 <div  id='<?= switchIfLoggedIn("mem-top-vid-icons", "hide") ?>' >
					  <ul>
						<li>
							<a href='#trgt2' id='myBtn2'>
								<img src='css/pix/ico/cmt.png' alt='Comment' width='32px'  />
							</a>
						</li>
						<li>
							<a href='#' target='_blank' >
								<img src='css/pix/ico/dload.png' alt='Comment' width='32px'  />
							</a>
						</li>
						<li>
							<a href='#' target='_blank' >
								<img src='css/pix/ico/email.png' alt='Comment' width='32px'  />
							</a>
							<?/// VIEW COUNT SECTION \\\?>
						  <span style='border-radius:5px 5px;background:rgba(0,0,0,0.2);margin-left:15px;padding:2px 4px;display:inline-block;text-align:right;line-height:1.32;letter-spacing:2px;'>
						  Votes: <b>None</b>
						  </span>								
						</li>
					   </ul>
					  </div>
					 </td>
					</tr>

			   </tbody>
			  </table>
			 </div>
		</div>
		<?// vid 3 of 3 \\?><?// vid 3 of 3 \\?>
		<?// vid 3 of 3 \\?><?// vid 3 of 3 \\?>
		 <div class='col-lg-4'>
		 <span style='text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);text-decoration:underline;'>
		  <h2 id='crown-png-4-3rd-place' style='font-weight:bold;text-align:center;text-shadow:0px 3px 5px rgba(0,0,0,0.3);text-decoration:underline;'>
				3rd
			</h2>
			 </span>
			  <div class='table center-block' > 
			   <table class='table-responsive' cellspacing='0' cellpadding='1' >
				<tbody>
				 <thead >
				  <center>
					  <!--upload date-->
					   <?=date('m-j-y')?>						  
				  </center>
					</thead>
					 <td colspan='100%' align='center'>
					<tr>
					 <?/// IMG OF TOP SONG \\\?>
					 <a href='view-vid.php' target='_self' >	 	 
					<img src='css/pix/car.jpg' alt='Vote' width='280px' class='img-rounded img-responsive' style='margin: 0 auto;border:3px double rgba(0,0,0,0.3);box-shadow:0px 3px 5px #444;' /> 
					</a>							
					<hr>
					 <div  id='<?= switchIfLoggedIn("mem-top-vid-icons", "hide") ?>' >
					  <ul>
						<li>						  
							<a href='#trgt2' id='myBtn3'>
								<img src='css/pix/ico/cmt.png' alt='Comment' width='32px'  />
							</a>	
						</li>
						<li>
							<a href='#' target='_blank' >
								<img src='css/pix/ico/dload.png' alt='Comment' width='32px'  />
							</a>
						</li>
						<li>
							<a href='#' target='_blank' >
								<img src='css/pix/ico/email.png' alt='Comment' width='32px'  />
							</a>
							<?/// VIEW COUNT SECTION \\\?>
						  <span style='border-radius:5px 5px;background:rgba(0,0,0,0.2);margin-left:15px;padding:2px 4px;display:inline-block;text-align:right;line-height:1.32;letter-spacing:2px;'>
						  Votes: <b>None</b>
						  </span>
						  
						</li>
					   </ul>
					  </div>
					 </td>
					</tr>

			   </tbody>
			  </table>
			 </div>
		</div>
	
	<?php
		}
?>
		

		<?/// end of top 3 rows of videos \\\?>
		<?/// end of top 3 rows of videos \\\?>
	   </div>
	  </div>
	 </div>
	
</section>