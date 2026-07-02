<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$adminuser=$_POST['Professional'];
$des=$_POST['planvalidity'];



$res = $user->addserv($adminuser,$des);


 
 echo "<script>alert('Services Createded successfully!'); window.location='addplan.php'</script>";   

	

 

} 



?>