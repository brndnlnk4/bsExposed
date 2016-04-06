<?php
include("loginProcess.php");

 ////////////////////////////////////////////////////
 /////////////FUNCTIONS RE_NAMED////////////////////
function switchIfLogged($loggedIn, $loggedOut){
      global $dbCon;	
        if(isset($_SESSION['username'])){
			echo "$loggedIn";
		}else{
			echo "$loggedOut";
 		}
 
 	}
function getMemId($mem_name){
        global $dbCon;
        $qry = "SELECT `id`
                FROM `members`
                WHERE `mem_username` = '$mem_name' ";
        $rslt = mysqli_query($dbCon, $qry);
            if($rslt){
                while($row = mysqli_fetch_assoc($rslt)){
                     $mem_id = $row['id'];                
                    } 
                 }else{
                    $mem_id = 'NULL';  
                    echo mysqli_error($dbCon);
                    }
        return $mem_id;
     }	
function get_Avatr($memName){
     global $dbCon;
        $pic_qry = "SELECT `mem_avatar` 
                    FROM `members` 
                    WHERE `mem_username` = '{$memName}'
                    LIMIT 1";
				  //$R = mysqli_query($dbCon, $pic_qry) or die("couldnt find pic"); 
				  $avatars = array(mysqli_fetch_row(mysqli_query($dbCon, $pic_qry)));
         if(!empty($avatars) || mysqli_num_rows(mysqli_query($dbCon, $pic_qry)) > '0'){
             $t = mysqli_query($dbCon, $pic_qry) or die();
             while($av = mysqli_fetch_assoc($t)){
				
				if(!empty($av['mem_avatar']) 
					&& strstr($av['mem_avatar'],'upl/')){
						$a = $av['mem_avatar'];
				}elseif(strstr($av['mem_avatar'],'css/')){
						$a = $av['mem_avatar'];
				}else{
					$a = "upl/".$av['mem_avatar'];
				}
				
                 break;
             }

         }
        return $a;
    }	
function echoIfIset($chkIfSet,$ifSetEcho,$elseEcho){
        if(isset($chkIfSet) || !empty($chkIfSet)){
            echo $ifSetEcho;
        }else{
            echo $elseEcho;
        }
    }
function getRplyId($r){
		global $dbCon;
		global $cmtReplyTbl;
		global $cmtId;
		 $qr = "SELECT `id` 
				FROM `$cmtReplyTbl`
				WHERE `id`
				LIKE '$r'";
	 $rz = mysqli_query($dbCon,$qr) or print(strtoupper(mysqli_error($dbCon)));
			 while($rowss = mysqli_fetch_assoc($rz)){
				 $iD = $rowss['id'];
			   break;
			 }
			return $iD;
	 }	
function showR8Icons($tblName,$rowName,$fieldId,$updMem){
    //// TBL_NAME = table
    //// ROW_NAME = collumn name, usually a string
    //// FIELD_ID = id of row
    //// UPD_MEM = mem_name to update his or her membr votes
    global $dbCon;
        echo "<div class='";	
         if(isset($_SESSION['username'])){
           echo "rate-icons";
            }else{
                echo "hide";
                }
					echo "'>";
					///////////////////
	///////////////// SHOW CURRENT
	///////////////// SHOW CURRENT
	if((isset($fieldId) 
	  && isset($tblName)) 
	  && isset($rowName)){
         $qry = "SELECT `$rowName`
                 FROM `$tblName`
                 WHERE `id` = '$fieldId'";
            $rzlt = mysqli_query($dbCon, $qry) or $error = (mysqli_error($dbCon));
            ///// PULL STUPID VOTE COUNT IN DB \\\\\
             if(mysqli_num_rows($rzlt) > '0'){   
                 while($votes = mysqli_fetch_row($rzlt)){ 
					$votes = intval($votes[0], 0);
					
                        break;
                     }
					
                }else{
					 
				} 
			} //////////////////////////////
    ?>
	
    <!--------VOTE UP-------->

     <ul class='list-group' title='Can only rate once' >
		<li class='list-group-item text-center' style='background-color:#555;'>
		   
		   <button class='btn btn-warning' id='btnPlus' type='button' onclick='voteAjax("plus","<?=$fieldId?>","<?=$tblName?>","<?=$rowName?>","<?=$updMem?>");this.setAttribute("disabled","");changeInner("plus","<?=$fieldId?>");' >		
			<img src='css/pix/ico/ratePositive.png' />
		   </button>
		   
				<b id='voteElement<?=$fieldId?>' style='display:inline-block;padding:2px 2px;margin:0 auto;text-shadow:0px 1px 2.5px #222;font-size:150%;text-align:center;clear:both;'>
			
				 
					<?=$votes?>
					
				 		
				</b>					
    
	<!--------VOTE DWN-------->		   
		   <button class='btn btn-warning' id='btnPlus' type='button' onclick='voteAjax("minus","<?=$fieldId?>","<?=$tblName?>","<?=$rowName?>","<?=$updMem?>");this.setAttribute("disabled","");changeInner("minus","<?=$fieldId?>")' >		
			<img src='css/pix/ico/rateNegative.png' />
		   </button>    
	   </li>
     </ul>	
<script>
function changeInner(val,id){
  id = document.getElementById("voteElement"+id);
   //alert(id.innerHTML);
	if(val == "plus"){
		id.innerHTML = id.innerHTML++;
	}else if(val == "minus"){
		id.innerHTML = id.innerHTML--;
	}
}
</script>
<script> 
//////////////////////////////////////
	//// UPDATE VOTES IF ON CLICK ////
	//// UPDATE VOTES IF ON CLICK ////
		
		function voteAjax(vote,voteElmId,tblName,rowName,updMem){		
			var val2snd = "newVote="+vote+"&tblName="+tblName+"&voteElmId="+voteElmId+"&rowName="+rowName+"&updMem="+updMem;
			var voteUpd = new XMLHttpRequest(); //request 2 use GET||POST METHOD 
			
			voteUpd.open("POST","incl/Vote.php",true); //choose method GET||POST & data & NULL=asynchronous
			voteUpd.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			voteUpd.onreadystatechange = function(){
				if(voteUpd.readyState == 4){
					if(voteUpd.status == 200){
						
 						 showVote(voteElmId,tblName,rowName);
						
					}else{
						alert(voteUpd.statusText);
					}
				}
			}
			voteUpd.send(val2snd);
	}
///////////////////////////////////////////
	//// PULL AND DISPLAY UPDATED VOTE ////
	//// PULL AND DISPLAY UPDATED VOTE ////
		function showVote(voteElmId,tblName,rowName){
			var voteElementName = "voteElement"+voteElmId;
			var voteElement = document.getElementById(voteElementName);				
			var vals = "voteElmId="+voteElmId+"&tblName="+tblName+"&rowName="+rowName;
			var vote = new XMLHttpRequest();
			
			vote.open('POST','incl/curVote.php',true);
			
			vote.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
			vote.onreadystatechange = function(){
				if(vote.readyState == 4){
					if(vote.status == 200){
						
						voteElement.innerHTML = vote.responseText;
						
					}else{
						alert(vote.statusText);
					}
				}
			}
			
			vote.send(vals);
		}		
</script>	


</div>
<?php
	}
?>
