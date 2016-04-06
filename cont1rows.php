
<div id='output'>
	
<noscript>
Please allow Javascript to view entire content.
</noscript>
	
</div>	


<?///** JS ** JS ** \\\?>
<?///** JS ** JS ** \\\?>
<?///** JS ** JS ** \\\?>
<script src='js/jquery-1.11.3.min.js'></script>
<script>
  $('#output').load('home_pg1.php');
 	function go2pg(p){
 
		$.post('incl/homeProc.php', {page:p}, function(response){
			
			$('#output').html(response).show;
		})
			 	
	}	
 </script>
 
 