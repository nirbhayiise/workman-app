<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$adminuser=$_POST['Catname'];
$des=$_POST['des'];





 if($adminuser==$des)
 {
    $res = $user->chnagepas($adminuser,$des); 
    echo "<script>alert('Admin Password Change successfully!!'); window.location='changepass.php'</script>";   
 }else
 {
      echo "<script>alert('Password not match!!'); window.location='changepass.php'</script>";
   return;  
 }
 

	

 

} 



?>