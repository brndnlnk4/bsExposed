	<div id='myModal1' class='modal modal1' >
		
	  <div class='modal-content' style='min-height:550px;'>
	   <span class='close' style='border:4px outset #888;background:#ddd;' onclick='closeModal()' >
		 <button class='btn btn-danger'>Close</button>
		</span>
		<p align='center'>
		   <h2> Video Title</h2>
		    <p align='center' valign='center'>
			  
			  <div  class='well well-md'>
				<table class='table table-condensed' id='' cellspacing='0' cellpadding='0' >
				 <tr>
				  <th> 
				   <center>
 					
					<figcaption style='text-shadow:0px 2px 3px #333;font-size:150%;font-weight:bold;'>Comments</figcaption>
				   
				   </center>
				  </th>
				 </tr>
				 <tr> <!---TR----->
				  <td align='center' rowspan='1' colspan='100%' > 
				   <center><?=date('D-m-Y')?></center> 
					<hr /> 
					 
					 <?// posted by... \\?> 
					  <h3 class='lead text-left'>Posted By:
					   <strong><?="Example"?></strong>
					  </h3>				  
					   <p align='left' class='text-left text-primary'>
						 <?=DT?>
					   </p>
				  </td>
				 </tr>
				</table>
			   </div>	 
			</p>
		 </p>		   
	  </div>
	</div>
	<?// end of modal \\?>
	<?// end of modal \\?>
<script>
var modal = document.getElementById('myModal1');

	function cmtModal(modalTitle){
		var closeBtn = document.getElementsByClassName("close")[0];
		$('document').ready(function(){
		
			$.post('incl/vidCmtProc.php', {modalTitle:modalTitle}, function(response){
 				
				$(modal).html(response);
					
				})
			})
			
			modal.style.display = "block";
 
	}
	function closeModal(){
		modal.style.display = "none";
	}
</script>
	