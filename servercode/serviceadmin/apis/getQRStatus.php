<?php
include('dbcon.php');

    $code = $_REQUEST['code'];
    
    
    if(!empty($code))
    {
       $qry="SELECT `scan_flag` FROM `Enquiry` WHERE `security_code`='$code'";
  
   
    $rs = mysqli_query($db,$qry);
    $getRowAssoc = mysqli_fetch_assoc($rs);
    if(count($getRowAssoc)>0){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = " successfully ";
		$arr['response']['status']=$status;
        	$arr['response']['message']=$getRowAssoc['scan_flag'];
        	$arr['response']['QrStatus']=$getRowAssoc['scan_flag'];
        	
				
	$json = json_encode($arr);
		echo $json;
		
	}else{
        $status = "0";
     	$msg = "Failed";
     	$arr['response']['status']=$status;
     	$arr['response']['message']=0;
       	$arr['response']['QrStatus']=0;
       
         
     	$json = json_encode($arr);
     	echo $json;
	}
    }
	else
	{
	    $status = "0";
     	$msg = "Param. Missing";
     	$arr['response'][0]['status']=$status;
     	$arr['response'][0]['message']=$msg;
     	$arr['response'][0]['pendingJob']="0";
     	$arr['response'][0]['completeJob']="0";
     	$arr['response'][0]['pendingJob']="0";
     	
         
     	$json = json_encode($arr);
     	echo $json;
	
    }
    
   
    

?>