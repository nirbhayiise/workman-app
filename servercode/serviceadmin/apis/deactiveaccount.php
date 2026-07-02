<?php
include('dbcon.php');

$i=0;
$qrystr="";
$arr=array();
$cid= $_REQUEST['id'];
$type= $_REQUEST['type'];





if(!empty($cid))
{ 
    
$rendStr=mt_rand(1000,9999);  
$date1 =getDatetimeNow();
if($type=="C")
{
   $qrystr ="update customer set c_status=0 where c_id=$cid";
}else{
    $qrystr="update technician set t_status=0 where t_id=$cid";
}
// echo $qrystr;
// die;
  
   $qry = mysqli_query($db,$qrystr); 
        
		$addressId = mysqli_affected_rows($db);
		if($addressId>0){
		
		
			$status = "1";
			$msg = "Deactive successfully .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;   
			
			
				
		}else{
			$status = "0";
			$msg = "Not update  .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			
						
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

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}

?>