	function showEmail2(email1value){
	 var email2row = document.getElementById("email2tr");
	 var email1 = document.getElementById("email1");
	 var email2 = document.getElementById("email2");		
	  var valueLen = lastIndexOf(email1value);
		if(valueLen == 5){
			email2row.style.visibility = "visible";
			//btn4Stp2.removeAttribute("disabled");
		}
 	}


	function showStp2(){
	 var email2row = document.getElementById("email2tr");
	 var email1 = document.getElementById("email1");
	 var email2 = document.getElementById("email2");		
		if(email1.value == email2.value){
			
		}
	}
 

 //////new acct registration
		var progressBar = document.getElementById("progBar");
		var progressBarStyle = document.getElementById("progBar").style;
		var progress_5Percent = progressBarStyle.width = 5 + '%';
		var progress_10Percent = progressBarStyle.width = 10 + '%';
		var progress_15Percent = progressBarStyle.width = 15 + '%';
		var progress_20Percent = progressBarStyle.width = 20 + '%';
		var progress_30Percent = progressBarStyle.width = 30 + '%';
		var progress_50Percent = progressBarStyle.width = 50 + '%';
		var progress_65Percent = progressBarStyle.width = 65 + '%';
		var progress_80Percent = progressBarStyle.width = 80 + '%';
		var progress_100Percent = progressBarStyle.width = 100 + '%';
	////PROGRESS PERCENT/////	
	function progress_10percent(){
		progressBarStyle.width = progress_10Percent;		
	}
	function progress_15percent(){
		progressBarStyle.width = progress_15Percent;		
	}
	function progress_20percent(){
		progressBarStyle.width = progress_20Percent;
	}
	function progress_30percent(){
		progressBarStyle.width = progress_30Percent;
	}
	function progress_50percent(){
		progressBarStyle.width = progress_50Percent;
	}
	function progress_65percent(){
		progressBarStyle.width = progress_65Percent;
	}
	function progress_80percent(){
		progressBarStyle.width = progress_80Percent;
	}
////////////END OF PROGRESS BAR FNC \\\\\\
	
	progressBarStyle.width = progress_5Percent;
	
////////////END OF PROGRESS BAR FNC \\\\\\
	

var EditModal = document.getElementById('usrRegModal');
var RegModalClose = document.getElementById("RegModalClose");
var carSlider = document.getElementById("car_slidr");

//////// OPEN MODAL FUNCTION
	function openFuncUsrReg(){
		EditModal.style.display = "block";
		carSlider.style.visibility = "hidden";
	}
	// CLOSE MODAL FUNCTION
	RegModalClose.onclick = function(){closeFuncUsrReg()};
		function closeFuncUsrReg(){
			EditModal.style.display = "none";
			carSlider.style.visibility = "visible";		
		}
	//CLICKS OUTSIDE MODAL WINDOW CLOSES MODAL WINDOW
	 window.onclick = function(e){
		if(e.target == EditModal){
			EditModal.style.display = "none";
			carSlider.style.visibility = "visible";			
			}
		}
//////////////////////REGISTRATION MODAL\\\\\\\\\\\\\\\\
	var tblStp1 = document.getElementsByClassName("table step1")[0];
	var tblStp2 = document.getElementsByClassName("table step2")[0];
	var tblStp3 = document.getElementsByClassName("table step3")[0];
 
	var yoName = document.getElementById("yoName");
	var dob1 = document.getElementById("dob1");
	var email2row = document.getElementById("email2tr");
	var email22row = document.getElementById("email22tr");
	var email1 = document.getElementById("email1");
	var email2 = document.getElementById("email2");
	var usrNpt = document.getElementById("usrNpt");
	var pw1 = document.getElementById("pw1");
	var pw2 = document.getElementById("pw2");
	var pw2lbl = document.getElementById("pw2lbl");
	var swordColor = document.getElementById("swordColor");
	var regSubmitBtn = document.getElementById("regSubmitBtn");
	var btn4Stp2 = document.getElementById("btnContStp2");
		/////real form inputs for php to look 4 ////
		var real_name = document.getElementById("real_name");
		var usr_dob = document.getElementById("usr_dob");
		var usr_email = document.getElementById("usr_email");
		var usr_name = document.getElementById("usr_name");
		var urs_pw = document.getElementById("urs_pw");

   function fillValue(input, value){
	   if(input){
		   input.value = value;
	   }
   }		
		
	/////if name is entered///
		function yonameSet(){
	 	  var nameLen = yoName.value;
			if(nameLen.lastIndexOf('') > 6){
				progress_10percent();
				fillValue(real_name, yoName.value);				
		}
	}	
	///// if email 1 filled show email 2////
	function showEmail2(nputVal){
	 progressBar.className = "progress-bar progress-bar-striped active progress-bar-warning";

 	 var at = nputVal.indexOf('.');
	 var email_ending = nputVal.slice(at);
 		if((nputVal.lastIndexOf('@') > 1)
			&&((((email_ending == ".com") 
			|| email_ending == ".net") 
			|| email_ending == ".org") 
			|| email_ending == ".eu")){
			progress_20percent();
			email2row.style.display = "block";
			email22row.style.display = "block";
			progressBar.className = "progress-bar progress-bar-striped active";
 		}		
	}
	///// confirm emails match/////
	function showStp2Btn(val){
	 progressBar.className = "progress-bar progress-bar-striped active progress-bar-warning";
		
  		if(val == email1.value){
 		  btn4Stp2.removeAttribute("disabled");
		  progressBar.className = "progress-bar progress-bar-striped active progress-bar-success";
		  progress_30percent()	
		  fillValue(usr_email, val);		  
		  fillValue(usr_dob, dob1.value);		  
		}
	}
	//// continue to stp2 btn/////
	function showStp2(){
		tblStp2.className = "table step2 collapse in";
		tblStp1.className = "table step1 collapse";
	}	
	////check if username set///
	function chkUsrName(val){
	 progressBar.className = "progress-bar progress-bar-striped active progress-bar-warning";
 
		var usrnameLen = val.lastIndexOf('');
		if((usrnameLen.trim() > 3) && usrnameLen < 29){  
			progress_50percent();
		    progressBar.className = "progress-bar progress-bar-striped active progress-bar-success";
 		    fillValue(usr_name, val);
		}
	}
	/////check if passwrd > 7 char////
	 function yolo(){
	 progressBar.className = "progress-bar progress-bar-striped active progress-bar-warning";
		 
		var pw1Len = pw1.value.lastIndexOf('');
		 if((pw1Len > 6) && pw1Len < 19){
			progress_65percent();
		    progressBar.className = "progress-bar progress-bar-striped active progress-bar-success";
			pw2.style.display = "block";
			pw2lbl.style.display = "block";
		 }
	 }
	function chkIfMatchPW1(pw2val){
	 progressBar.className = "progress-bar progress-bar-striped active progress-bar-warning";

	 
		if(pw2val == pw1.value){
			tblStp3.className = "table step3";
			progress_80percent();
		    progressBar.className = "progress-bar progress-bar-striped active progress-bar-success";			
			pw1.style.opacity = ".5";
			pw2.style.opacity = ".5";
			usrNpt.style.opacity = ".5";
 		    fillValue(urs_pw, pw2val);			
			document.getElementById("pw1").setAttribute("disabled","");
			document.getElementById("pw2").setAttribute("disabled","");
			document.getElementById("usrNpt").setAttribute("disabled","");
		}
	}	
	///// anti bot security question /////////
	function chkSwordColor(colorEntered){
		progressBar.className = "progress-bar progress-bar-striped active progress-bar-warning";		
		if((((((colorEntered == "blue") 
			|| colorEntered == "lightblue") 
			|| colorEntered == "skyblue") 
			|| colorEntered == "sky-blue") 
			|| colorEntered == "Blue") 
			|| colorEntered == "light-blue"){	  
 			regSubmitBtn.removeAttribute("disabled");
			progressBarStyle.width = progress_100Percent;
			progressBar.className = "progress-bar progress-bar-striped active progress-bar-success";
		}
	}
	function resett(){
			progress_50percent();
		    progressBar.className = "progress-bar progress-bar-striped active progress-bar-danger";					
			pw1.style.opacity = "1";
			pw2.style.opacity = "1";
			usrNpt.style.opacity = "1";			
			document.getElementById("pw1").removeAttribute("disabled");
			document.getElementById("pw2").removeAttribute("disabled");
			document.getElementById("usrNpt").removeAttribute("disabled");
	}
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
//////////////DAM THIS TOOK ME ALL DAMN DAY!!!!////////
//////////////PLZ SHARE THE LOVE OF OPEN_SRC///////////
//////////////AND GIVE ME SOME KIND OF CREDIT//////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////