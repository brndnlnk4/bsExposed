<footer>	
<section class='footer'>
 <div class='content'>
  <div class='container'>
   <div class='row'>
	<div class='col-xl-12' id='footerMainSec'>
	  <div id='btmTable' class='table'>
	   <section align='center'  style='height:350px;padding:10px 0;margin:0 1%;'>


<?/// FORM XPLAIN VOTE \\\?>
<?/// FORM XPLAIN VOTE \\\?>
<div class='pull-right' id='xplainSec' style='display:none;background-color:rgba(0,0,0,0.3);border-radius:10px;padding:25px 3px;width:24%;margin-top:20px;z-index:900;margin-right:10%;'>
	<p align='center' >
	 <span class='lead' id='xplainTitle'>
		Please tell me...
	 </span>
	  <form id='xplainFrm'>
	     <label for='name' class='label'>Name</label>
		  <input type='name' id='xplainName' class='input-sm' name='name' maxlength='30' placeholder='Your Name' size='30' />
		   <br>
		   <br>
			<textarea id='xplainTxt' class='form-control' placeholder='Quick reason why you chose this candidate' rows='3' cols='35' ></textarea>	  
	     <button type='button' id='xplainBtn' class='btn btn-sm btn-success' title='Send'>
		  Send
	     </button>
	   <input type='reset' value='Clear' class='btn btn-sm btn-success' />
	  </form>  
	</p> 
</div>		

<?/// bargraph \\\?>	<?/// bargraph \\\?>	
<?/// bargraph \\\?>	<?/// bargraph \\\?>	

  <div id='rzlts' class='pull-left well well-lg' style='width:65%;margin:5px auto;border:none;max-height:350px;'>
   <p align='left' id='titl'>
    Total Results:
   </p>
	  <span  id='hillaryBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;margin-bottom:10px;border-radius:8px;'> 
 
		<span class='text-left' style='display:inline-block;width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			Hillary
		</span>
   
	  </span>
	 <br>
	 <br>
	  <span id='sandersBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;border-radius:8px;'> 
 
		<span class='text-left' style='display:inline-block;width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			Sanders
		</span>
   
	  </span>
	 <br>
	 <br>
	  <span  id='cruzBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;border-radius:8px;'> 
 
		<span class='text-left' style='display:inline-block; width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			Cruz
		</span>
   
	  </span>
     <br>
     <br>
	  <span id='kasichBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;border-radius:8px;'> 
 
		<span class='text-left' style='display:inline-block; width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			kasich
		</span>
   
	  </span>
	 <br>
	 <br>
	  <span  id='trumpBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;border-radius:8px;'> 
 
		<span class='text-left' style='display:inline-block; width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			Trump
		</span>
   
	  </span>
	  <br>
	  <br>
	  <span id='paulBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;border-radius:8px;'> 
 
		<span class='text-left'  style='display:inline-block;width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			Paul
		</span>
   
	  </span>
	  <br>
	  <br>
	  <span  id='ryanBar' class='progress-bar progress-bar active progress-bar-successprogress-bar-striped' style='width:100%;border-radius:8px;'> 
 
		<span class='text-left' style='display:inline-block;width:100%;padding:0 5px;border:1px solid #999;border-radius:8px;'>
			Ryan
		</span>
   
	  </span>  
	</div>	   

<?/// PRESIDENTIAL POLL \\\?>
<?/// PRESIDENTIAL POLL \\\?>
<?/// PRESIDENTIAL POLL \\\?>
<div align='center' class='well well-lg' id='presUl' valign='center' style='margin-top:10px;'>
 <span class='text-center lead' style='display:block;width:60%;color:#fff;margin-bottom:10px;padding:5px 8px;font-weight:bold;'> 
   Who Deserves to be our next President
 </span>
<form>
<ul class='list-inline'>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Hillary
	 </b>
	</caption>
	 
	 <img src="http://www.politics1.com/pix2/clinton-2016.jpg" title="Hillary Clinton" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' name='' class='form-control radio' value='hillary' onclick='presPoll(this.value);'></input>
   
   </p>
 </li>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Sanders
	 </b>
	</caption>
	 
	 <img src="http://www.politics1.com/pix2/berniesanders.jpg" title="sanders" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' name='' class='form-control radio' value='sanders' onclick='presPoll(this.value);'></input>
   
   </p>
 </li>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Cruz
	 </b>
	</caption>
	 
	 <img src="http://www.politics1.com/pix2/TedCruz.jpg" title="cruz" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' class='form-control radio' value='cruz' onclick='presPoll(this.value)'></input>
   
   </p>
 </li>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Kasich 
	 </b>
	</caption>
	 
	 <img src="http://www.politics1.com/pix2/Kasich16.jpg" title="kasich" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' class='form-control radio' value='kasich' onclick='presPoll(this.value)'></input>
   
   </p>
 </li>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Trump 
	 </b>
	</caption>
	 
	 <img src="http://www.politics1.com/pix2/trump.jpg" title="trump" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' class='form-control radio' value='trump' onclick='presPoll(this.value)'></input>
   
   </p>
 </li>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Paul
	 </b>
	</caption>
	 
	 <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRWt8Jp3PVE1lJkpqqMMSG3ppl0taqkoZmOYq7KIM7tC28aLLXEAk840kQc" title="paul" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' class='form-control radio' value='paul' onclick='presPoll(this.value)'></input>
   
   </p>
 </li>
 <li class='list-item'>
   <p class='well well-sm' style='float:left;'>
	<caption>
	 <b>
	  Ryan
	 </b>
	</caption>
	 
	 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdnw8y9ljG3HEOHsB9Ew7eLnt1ZD73CMcm7qBKrLMqw1m0AgYaw3UfaA" title="ryan" alt="Hillary" class='img-responsive img-rounded' style='width:80px;height:100px;border:4px solid #555;' />
	  
	  <input type='radio' class='form-control radio' value='ryan' onclick='presPoll(this.value)'></input>
	</p>   
   </li>	

  </ul> 
 </form>   
</div>	
</div>	


	
  	   </section>
<?/// empty \\\?>		
<?/// empty \\\?>			
			<section class='empty-4'>
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
			   <center id='footerCenter' ><br>
				 <?//// FOOTER TABLE FOOTER TABLE \\\\\?>
					<table cellpadding='0' class='table-responsive table-hover' cellspacing='1' width='70%'>
					 <tbody>
					  <tr>
					   <th colspan='100% ' rowspan=''>
						<h3 class='well well-sm'>					 
						 <img title='Sanders' src='https://lh4.googleusercontent.com/-MoJHeOqT5Pg/AAAAAAAAAAI/AAAAAAAAUGY/QK9h6BxPcP8/s0-c-k-no-ns/photo.jpg' width='60px' class='pull-left img-responsive img-circle' style='border:3px solid #777;' />
						 <b>Bernie Sanders	</b>
						</h3>
						 <p align='center' valign='center'>
							United States Senator 
						<br>	
							berniesanders.com
							Bernard "Bernie" Sanders is an American politician and the junior United States Senator from Vermont. He is a candidate for the Democratic nomination for President of the United States in the 2016 election.
						 </p>
						<br>
						<i>Bernie Sanders on Google & Twitter</i>
						 <p align='center' valign='bottom' style='word-break:brea-word;text-indent:20px;'>
						  <blockquote>
							As President, I will invest $1 trillion to rebuild our crumbling infrastructure to put 13 million Americans to work in good jobs, invest $5.5 billion to employ 1 million young Americans and provide job-training to hundreds of thousands of others, and create a Clean-Energy Workforce of 10 million good jobs through a 100% clean energy system.
						  </blockquote>
						  <blockquote>
							Fossil fuel companies are willing to destroy the planet for short-term profits. That is incomprehensible.
						  </blockquote>
						  <blockquote>						
							Offshore drilling does not achieve the goals its advocates claim and is not worth the risk. Time to move away from oil, not drill for more.						  
						  </blockquote>
						 </p>
					   </th>
					   <th>
						<h3 class='well well-sm'>					 
						 <img title='Sanders' src='https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQBt04ijbICiZJDTtcFTu-D7PI6KXSDO2Bh8cCx5pToD4MoT-scwPfWpw' width='90px' class='pull-left img-responsive img-circle' style='border:3px solid #777;' />
						 <b>George Soros</b>
						</h3>
						 <p align='center' valign='center'>
							Business magnate  
						<br>	
						 <p align='center' valign='bottom' style='word-break:brea-word;text-indent:20px;'>
							George Soros is an American business magnate, investor, philanthropist, and author who is of Jewish-Hungarian ancestry and holds dual citizenship. He is chairman of Soros Fund Management.						 </p>
						 </p>
						 <p align='left'>
						  <blockquote>
							Markets are constantly in a state of uncertainty and flux and money is made by discounting the obvious and betting on the unexpected.
						  </blockquote>
						  <blockquote>
							Stock market bubbles don't grow out of thin air. They have a solid basis in reality, but reality as distorted by a misconception.
						  </blockquote>
						 </p>
					   </th>
 
					  </tr>
					  <tr>
					  
					   <td colspan='25%'>					 
 					    <p align='left' valign='top'>
						 <img src='http://hw.infowars.com/wp-content/themes/infowars-sitegoals/images/logo.png' width='150px' class='img-rounded' />
 						</p>
						 <br>
 					    <p align='left' valign='top'>
						 <img src='http://d2pggiv3o55wnc.cloudfront.net/oann/wp-content/uploads/2015/08/cropped-OANtoplogo.jpg' width='150px' class='img-rounded' />
 						</p>
					   </td>
					   <td colspan='25%'>
 					    <p align='left' valign='top'>
						 <img src='http://s3.reutersmedia.net/resources_v2/images/masthead-logo.gif' width='150px' class='img-rounded' />
 						</p>
						<br>
 					    <p align='left' valign='top'>
						 <img src='http://edge.liveleak.com/80281E/u/u/ll2/logo.gif' width='150px' class='img-rounded' />
 						</p>

					   </td>
					   <td colspan='' rowspan=''>
					    <p align='left' valign='top'>
						 <img src='http://www.aljazeera.com/mritems/images/site/aje-logo-white.svg' width='150px' class='img-rounded' />						
  						</p>
						<br>
					    <p align='left' valign='top'>
						 <img src='http://www.geoengineeringwatch.org/wp-content/uploads/2012/04/logo2.png' width='180px' class='img-rounded' />						
  						</p>					    

					   </td>	
					   <td colspan='' rowspan=''>
						<p align='left' valign='top'>
						 <img src='http://www.drudge.com/resources/logosmall.gif' width='150px' class='img-rounded' />						
  						</p>
						<br>
						<p align='left' valign='top'>
						 <img src='http://www.carnicominstitute.org/survey/upload/templates/carnicomsurvey/logo_beige.png' width='150px' class='img-rounded' />						
  						</p>					   
					   </td>
					   <td colspan='50%' rowspan=''>
						 <p align='center' class='well' style='word-wrap:normal;word-break:break-word;'>
						<strong>
						 Welcome and Hello.					
						</strong>
						  <br>
						   <u> About me, Brandon Osuji</u>
						   <br>
						   As a web designer & developer, my focus has been on expanding my knowledge of JavaScript, AJAX, jQuery, PHP, and MySQL. 
						   Also, I currently devote majority of my time to not only learning new code but in educating myself and others on current events around the world.						
						</p>
					   </td>
					  </tr>
					  <td colspan='100%'>
					   &nbsp;
					   <center>
					   BS Exposed©
					   </center>
					  </td>						   
					  <tr>
					  </tr>
					 </tbody>
					</table>
			   </center>
			  </div>
			 <br>
			</div>
		   </div>
		  </div>
		 </div>
		</section>
<?/// empty \\\?>		
<?/// empty \\\?>			
			<section class='empty-5'>
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
	</footer>
	
