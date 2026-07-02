<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$adminuser=$_POST['notificationtitle'];
$des=$_POST['messagetxt'];



$res = $user->notif($adminuser,$des);


 
 echo "<script>alert('send successfully!'); window.location='addnotify.php'</script>";   

	

 

} 



?>