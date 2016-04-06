	 <tr style='background:#ccc;border-bottom:1px double rgba(0,0,0,0.05);'>
	  <td colspan='5%' style='padding-left:10px;border-right:1px dotted rgba(0,0,0,0.03);'>

		<?// mem-name & avatar \\?>			 
		<a href='#' target='_self' class='btn btn-info btn-lg' style='min-width:240px;'> 
		 <strong style='font-weight:800;color:rgba(255,255,255,0.8);'>  
		   Ex_name 	   
		  </strong>
		 </a>
		<p align='center' valign='top' class='pull-right' style='width:auto;padding:0;'>
		 <img src='css/pix/Brandon.jpg' width='35px' alt='Avatar' title='Avatar' class='img-responsive img-circle' style='border:2px double #888;' /> 
		</p>
	  </td>
	 <td colspan='45%' style='background-color:rgba(0,0,0,0.05);'> 
		 
	  <?// lvl status \\?>   
	  <ul style='display:inline;'>
	   <?// ranking \\?>
		<li> <sup style='color:#999;'>
		 Veteran
		</sup></li>
		
		  <?// ranking lvl icon \\?>
			<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  /></li>
			<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  /></li>
			<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  /></li>
			<li class='pull-left'><img src='css/pix/ico/icon_rate_good .png' width='30px'  title='Level Points' alt='Level'  /></li>
	  </ul>
	 </td>
	<td>
	
		<?// social icons \\?>
		<img src='css/pix/ico/google.png' width='30px' alt='Social_Networks' /> 
		<img src='css/pix/ico/linkedin.png' width='30px' alt='Social_Networks' /> 
		<img src='css/pix/ico/facebook.png' width='30px' alt='Social_Networks' /> 	  
	   </td>
	  <td colspan='30%' >
		
  <?// contact member & profile icon btns \\?>	

	<div class="<?=switchIfLoggedIn("", "hide")?>">
	 <a href='#' target='_self' type='button' class='btn btn-link msgBtn' >
	  <img src='css/pix/ico/icon_contact.png' width='35px' alt='Message' />
	 </a>	
	 <a href='#' target='_self'>
	  <img src='css/pix/ico/icon_profile.gif' width='35px' alt='Message' />
	 </a>
	</div>
  </td>
 </tr>
