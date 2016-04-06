
<!--[if !IE]>
				<object type="application/x-shockwave-flash" data=" " width="100%" height="100%" style='height:100%;'>
					<param name="movie" value="headerBG.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="transparent" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
 					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				</object> 
////////////////////////////////////////////////////////////////////////////////////////////				-->
<script>
 function hideFlsh(){
		  var flshBg = document.getElementById('flshBg');
		  var tblMain = document.getElementById('tableMain');
		 flshBg.style.animationName = "minFlash";
		 tblMain.style.animationName = "minConFlash";
			  }
</script>
<div id='minimize_flsh' class='embed-responsive embed-responsive-16by9'>

	<div class='jumbotron'>
		 <embed width='99.8%' id='flsh' src='' pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" size='100%' name=" " quality="High" wmode="" align='center'> &nbsp;</embed>
	</div>
 
 <center onClick='hideFlsh()'> 
  <img src='<?="\\bs_exposed/css/img/ico/upArrow.png"?>' name='min' width='10%' alt='Minimize' title='Minimize Animated Logo' style='border-bottom:1px solid #777;margin:0 auto;'>
 
  </img>
 </center>
 
</div>
				

		
 