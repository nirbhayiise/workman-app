<?php
include('dbcon.php');

    $tid = $_REQUEST['tid'];
    
    
    if(!empty($tid))
    {
       $qry="select * from Enquiry where alloted_technician_id='$tid' and payment_status='1' ORDER BY e_id DESC";
  
   
    $rs = mysqli_query($db,$qry);
    $getRowAssoc = mysqli_fetch_assoc($rs);
    if(count($getRowAssoc)>0){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = " successfully ";
		$arr['response'][0]['status']=$status;
        	$arr['response'][0]['message']=$msg;
        	$arr['response'][0]['amount']=$getRowAssoc['amount_paid'];
        	if(empty($getRowAssoc['payment_status']))
        	{
        	  	$arr['response'][0]['pendingJob']="0";  
        	}else{
        	    	$arr['response'][0]['pendingJob']=$getRowAssoc['payment_status'];
        	}
        
          $arr['response'][0]['pendingJob']=getpendingJobs($db,$tid);
     	 $arr['response'][0]['completeJob']=getCompleteJobs($db,$tid);
			
				
	$json = json_encode($arr);
		echo $json;
		
	}else{
        $status = "0";
     	$msg = "no previus due payment your work in progress ";
     	$arr['response'][0]['status']=$status;
     	$arr['response'][0]['message']=$msg;
        $arr['response'][0]['pendingJob']=getpendingJobs($db,$tid);
     	 $arr['response'][0]['completeJob']=getCompleteJobs($db,$tid);
     	$arr['response'][0]['amount']="0";
         
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
    
    function getpendingJobs($conn,$tid)
    {
        
    $qry = "select COUNT(*) As cnt from Enquiry where alloted_technician_id='$tid' and work_status='2'";
    $rs = mysqli_query($conn,$qry);
    $getRowAssoc = mysqli_fetch_assoc($rs);
    
    $pendingTotal=$getRowAssoc['cnt'];
    return $pendingTotal;

    }
    
     function getCompleteJobs($conn,$tid)
    {
        
    $qry = "select COUNT(*) As cnt from Enquiry where alloted_technician_id='$tid' and work_status='5' and payment_status='2'";
    $rs = mysqli_query($conn,$qry);
    $getRowAssoc = mysqli_fetch_assoc($rs);
    
    $pendingTotal=$getRowAssoc['cnt'];
    return $pendingTotal;

    }
    

?>