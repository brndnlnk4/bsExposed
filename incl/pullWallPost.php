 <?php
include("sv.php");
include("fn2.php");
 ///// check if wall post snt \\\\
 
		if(isset($_POST['wall_post']) && strlen($_POST['wall_post']) >= '1'){		
			$post =  ($_POST['wall_post']);
			$post = mysqli_real_escape_string($dbCon, $post);
			$post = addcslashes($post, "%_");

			 $qry = "INSERT INTO `wall`(`post_user`,
										`post_message`,
										`post_date`,
										`visible_to_public`)
						VALUES ('{$_SESSION['username']}',
								'$post',
								NOW(),
								'{$_POST['publicView']}')";
				$rslt = mysqli_query($dbCon, $qry) or die(mysqli_error($dbCon));
		 }
	 
   ?>
 
<table rows=' ' width=' ' cellpadding='0' cellspacing='1' class='table table-responsive table-striped' id='wallTbl'>

 <tr style='background-color: rgba(0,0,0,0.15);'>	 
		
		<td colspan='100%' rowspan=''>  
			<br>
			 <div class='<?=switchIfLogged("", "hide")?>' style='border-radius:15px 15px;padding:5px 5px;border:5px double #999;'>
			  <form action=''>
			   <center>
				<textarea maxlength='300' class='form-control'  title='Enter Your Post' id='wall_post' size='300' rows='6' cols='100%' placeholder='Post Anything for Anyone to See'  ></textarea>	
			   </center>
			   
				<div id='wall_npt' style='border-bottom:10px solid rgba(0,0,0,0.4);border-radius:0 0 10px 10px;width:55%;background-color:rgba(0,0,0,0.45); margin-top: 5px; margin-bottom: 15px; margin-left: auto; margin-right: auto; padding:5px 10px 35px 5px;'>
				 <label for='public' class='form-control-label center-block text-center'>Visible to only Members</label>
				  <input type='radio' id='public0' value='0' class='form-control input-sm' ></input>
				 <label for='public' class='form-control-label center-block text-center'>Visible to All</label>	 
				  <input type='radio'  id='public1' value='1' class='form-control input-sm' checked></input>
				   <br>																			

					<input type='button' class='form-control btn btn-warning btn-md center-block' onclick='pullPost()' value='Submit' placeholder='' style='width:50%;float:left;' />
					<input type='reset' class='form-control btn btn-warning btn-md center-block' name='' value='Clear' placeholder='' style='width:50%;float:left'  />
					</form>		
				</div>  
		 
			
			  </div>	
			</td>
		</tr>	
<?php

 /////////////////////////////////////
   $Q = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `wall`"));
    /////////////////////////////////////
    if($Q !== 0){
        $r = mysqli_query($dbCon,"SELECT * FROM `wall`") or die(mysqli_error($dbCon));								 
        $rowCnt = mysqli_num_rows($r);
            $rows = $rowCnt; //max rows
            $diviser = $rowCnt / 15; //each pg = max rows divided by '5', '5' = limit
            $rowCnt = ceil($diviser); ///round up everything lol
	
	///////////////////////////////	
    if($rows > 15){
		$offset = '0';
		if(isset($_REQUEST['page'])){
			$p = intval($_REQUEST['page'], 0);
			$offset = 15 * $p; // limit end 'offset'	
		}
	}else{
		$p = 0;
		$offset = 0;
		}
	}else{
		$offset = 0;
	}					
         //////////
 //////THIS IS WALL POST\\\\\\\\						
		$qry = "SELECT `id`,		
						`post_user`,
						`post_message`,
						`post_date` 
				FROM `wall` ";		
				if(isset($_SESSION['username'])){			
		$qry .= " WHERE `visible_to_public` = '1' ";
		$qry .= " OR `visible_to_public` = '0' ";
				}else{				
		$qry .=	" WHERE `visible_to_public` = '1' ";
				}			
		$qry .= " ORDER BY `id` DESC
				  LIMIT 15 OFFSET ".$offset;		
		$rslt = mysqli_query($dbCon, $qry);
		
		if(mysqli_num_rows($rslt) > '0'){
			
			while($wall = mysqli_fetch_assoc($rslt)){
				$post_id = $wall['id'];
				$poster = $wall['post_user'];
			?>
			<tr>
			  <td align='center' rowspan='1' colspan='100%' > 
				 <center class='lead' style='color:rgba(255,255,255,0.4);'><?=$wall['post_date']?></center> 
				<hr /> 
				 
				 <?// posted by... \\?> 
				  <h3 class='lead text-left'>Posted By: 
				   <strong><?=$wall['post_user']?></strong>
				   
				   <span class='pull-right'>
				    <?=showR8Icons('wall','post_vote',$post_id,$poster)?>
				   </span>
				   
				   <div class='pull-left' >
				    <a href='<?="mem.php?".md5('p')."=".getMemId($poster)."#mem_list_xpand"?>' target='_self' >
					 <img src='<?=get_Avatr($poster)?>' target='_self' class='img img-circle img-repsonsive' width='80px' height='100px' style='border:4px solid #555;margin-right:5px;'  />
					</a>
 				   </div>
				  </h3>
				  
				 <?// wall post \\??>
				  <p align='left' class='text-left text-primary word-wrap:break-word;word-break:break-word;'>
					<?=$wall['post_message']?>
				 </p>
			   </td>
			 </tr>
			<?php
				}
 		}else{			
?>
				 <tr>
				  <td align='center' rowspan='1' colspan='100%' > 
					 <center><?=date('D-m-Y')?></center> 
					<hr /> 
					 
					 <?// posted by... \\?> 
					  <h3 class='lead text-left'>Posted By: 
					   <strong>Brandon</strong>
					   <span class='pull-right'><?=showR8Icons('wall','post_vote','','')?></span>
					  </h3>
					  
					 <?// wall post \\??>
					  <p align='left' class='text-left text-primary' style='position:relative;top:10px;word-wrap:break-word;word-break:break-word;'>
						Welcome to the wall, here you can post anything you want, this is a great section to give feedback or ask questions about a topic or subject. 
						Be the first to post something here!
					  </p>
				   </td>
				 </tr>
<?php
		} // END OF WALL 
?>
	</div>
 </table>
<div class='text-primary text-center bg-success' >
<?php
//////////////////////////////////////////////////////////////////////////
//////////////////_PAGINATION_PAGE_NUMBERS_///////////////////
$rowCnt = mysqli_num_rows(mysqli_query($dbCon,"SELECT * FROM `wall`"));
$rowCnt = ceil($rowCnt / 15);
	if($rowCnt !== 0){
		print("<span class='well well-sm center-block text-center' style='max-width:100%'>");		
	  if(empty($p)){
		  $p = 0;
	  }
 		for($i = 0; $i < $rowCnt; $i++){
		  $pgNumShown = $i + 1;
			$btn = "<button type='button' class='btn btn-sm btn-link' onclick='go2pg($i)' ";
		  if(isset($p) && $i == $p){
		  	$btn .= " disabled ";
		  }
			$btn .= " >".$pgNumShown."</button>";
						
				echo $btn;
		}
		print("</span>");
	}				
?>
</div>