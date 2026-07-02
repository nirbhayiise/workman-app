<?php
include('dbcon.php');

$i=0;
$arr=array();
$code= $_REQUEST['code'];
$buttonsubmit= $_REQUEST['buttonsubmit'];



if(!empty($code))
{ 
    
  if($buttonsubmit==1)
  {
    $rendStr=mt_rand(1000,9999);  
    $date1 =getDatetimeNow();
    $qrystr="UPDATE `Enquiry` SET `scan_flag`=1 WHERE `security_code`='$code'";
  
    $qry = mysqli_query($db,$qrystr); 
        
		$addressId = mysqli_affected_rows($db);
		if($addressId>0){
		
	        $data=	getScanDetails($db,$code);
			$status = "1";
			$msg = "Scan successfully .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg; 
			$arr['response']['DetailsData']=$data;
			
			
				
		}else{
			$status = "0";
			$msg = "Failed to scan .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			 $arr['response']['OTP']='not found'; 
			 	$arr['response']['DetailsData']=$data;
						
		}
     
      }else if($buttonsubmit==-1){
          
            $date1 =getDatetimeNow();
            $qrystr="UPDATE `Enquiry` SET `accept_tech`=1 WHERE `security_code`='$code'";
            $qry = mysqli_query($db,$qrystr);
             $data=	getScanDetails($db,$code);
            $status = "1";
			$msg = "Accept By Technicial";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg; 
			$arr['response']['DetailsData']=$data;
      }else{
          
               $data=	getScanDetails($db,$code);
    			$status = "1";
    			$msg = "Scan successfully .";
    			$arr['response']['status']=$status;
    			$arr['response']['message']=$msg; 
    			$arr['response']['DetailsData']=$data;
      }

		$json = json_encode($arr);
		echo $json;

}else{
     $status = "0";
     $msg = "missing some required parameter.";
     $arr['response']['status']=$status;
     $arr['response']['message']=$msg;

         
     $json = json_encode($arr);
     echo $json;
}


function getScanDetails($conn,$tid)
    {
        
   // $qry = "select a.*, b.*, c.* from Enquiry a, services b, professional_area c where c.pro_id=a.cat_id and b.s_id=a.service_id and a.security_code='$tid'";
  $qry="select a.*, b.*, c.*, tc.* from Enquiry a, services b, professional_area c, technician tc where tc.t_id=a.alloted_technician_id and  c.pro_id=a.cat_id and b.s_id=a.service_id and a.security_code='$tid'";
    $rs = mysqli_query($conn,$qry);
    $getRowAssoc = mysqli_fetch_assoc($rs);
    
    //$pendingTotal=$getRowAssoc['cnt'];
    return $getRowAssoc;

    }
function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}

?>