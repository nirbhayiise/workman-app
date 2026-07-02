<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$Businessn=$_POST['Businessn'];
$Businessemail=$_POST['Businessemail'];
$Reps=$_POST['Reps'];
$Phone=$_POST['Phone'];
$addres=$_POST['addres'];


$res = $user->addbusiness($Businessn,$Businessemail,$Reps,$Phone,$addres);


 
 echo "<script>alert('Business Createded successfully!'); window.location='addbusinessregister.php'</script>";   

	

 

} 



?>