<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$adminuser=$_POST['Catname'];
$des=$_POST['des'];



$res = $user->adcat($adminuser,$des);


 
 echo "<script>alert('Category Createded successfully!'); window.location='addcategory.php'</script>";   

	

 

} 



?>