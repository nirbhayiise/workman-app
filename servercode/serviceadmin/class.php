		<?php
			include 'dbconfig.php';
			session_start();
			class user
			{
			public $db;
			
			public function __construct(){
				$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
				if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
			exit;
			}
			}
			
			
				public function addsection($catname,$imgname,$status){
			$sql1="INSERT INTO g_section SET section_title='$catname',sectionimage='$imgname',sectionstatus='$status',sectioncdate=now()";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		//	echo mysqli_connect_errno();
			return $result;
			}
			
			
				public function addtechnicians($bname,$Professional,$technicianname,$Address,$phone,$mail,$pas,$state,$cty,$img){
			$sql1="INSERT INTO `technician`(`b_id`, `professional_area`, `tech_name`, `t_address`, `t_phone`, `t_email`, `t_pass`, `t_created`, `t_status`,state,city,proImg) VALUES
			('$bname','$Professional','$technicianname','$Address','$phone','$mail','$pas',now(),'1','$state','$cty','$img')";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		//	echo mysqli_connect_errno();
			return $result;
			}
			
			public function updatetechnicians($bname,$Professional,$technicianname,$Address,$phone,$mail,$pas,$state,$city,$image,$id){
			$sql1="Update `technician` set `b_id`='$bname', `professional_area`='$Professional', `tech_name`='$technicianname', `t_address`='$Address', `t_phone`='$phone', `t_email`='$mail', `t_pass`='$pas', state='$state', city='$city', proImg='$image' where t_id='$id'";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		//	echo mysqli_connect_errno();
			return $result;
			}
			
			public function addsubcat($sect,$subcat,$serialno){
			$sql1="INSERT INTO g_category SET secction_id='$sect',category_title='$subcat',Categorycdate=now(),category_status='1',serialno='$serialno'";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		//	echo mysqli_connect_errno();
			return $result;
			}
			
			
			public function getCategoryls()
			{
			$sql3="SELECT * FROM g_section";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
				public function getnofic()
			{
			$sql3="SELECT * FROM notification";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
				public function getCountReq()
			{
			$sql3="SELECT count(*) AS TotalCount FROM Enquiry";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
				public function getCountTech()
			{
			$sql3="SELECT count(*) AS TotalCount FROM technician";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
				public function getCountCust()
			{
			$sql3="SELECT COUNT(*) As total FROM `customer`";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
				public function getinvoiceDetails($eid)
			{
			$sql3="SELECT * from Enquiry a, technician b, customer c where a.c_id=c.c_id and a.alloted_technician_id=b.t_id and a.e_id='$eid' LIMIT 1";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
			
			
				public function getfaultList($id)
			{
			//$sql3="SELECT * FROM fault_analysis where e_id='$id' and f_status='1'";
			$sql3="SELECT a.*, b.* FROM Enquiry a, fault_analysis b where a.e_id=b.e_id and b.e_id='$id' and f_status='1'";

			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
				public function getrequrestList()
			{
			$sql3="SELECT a.*,b.*,d.*,e.* FROM Enquiry a, professional_area b, services d, customer e 
		WHERE a.cat_id=b.pro_id and a.service_id=d.s_id and a.c_id=e.c_id and a.e_status=1 ORDER by a.e_id DESC";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			public function deletenoty($bid)
			{
			$sql3="Delete  FROM notification where n_id='$bid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			public function adminlogin($uid,$pas)
			{
			$sql2="SELECT * FROM admin where admin_user_name='$uid' and admin_pass='$pas' and admin_status=1";
			
			//checking if the username is available in the table
			$result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;

				if ($count_row == 1) {
			// this login var will use for the session thing
			$_SESSION['login'] = true;
		//	$_SESSION['username'] = $user_data['ADMIN_USERID'];
		//	$_SESSION['typ'] = 'admin';
		//		$_SESSION['name'] = 'admin';
				$_SESSION['id'] = 'admin';
			return '1';
			}
			else{
			return '0';
			}
			}
			
				public function getusers()
			{
			$sql3="SELECT * FROM user_details";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
			public function getTech()
			{
			$sql3="SELECT * FROM technician where t_status=1";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
			
				public function listCity()
			{
			$sql3="SELECT * FROM citylist";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
				public function getcty()
			{
			$sql3="SELECT * FROM citylist where city_status=1";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
			public function getSubCategoryls()
			{
			$sql3="SELECT * FROM g_section a, g_category b where a.section_id=b.secction_id and a.sectionstatus=1";
			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
			public function getFetchRequrest($eid)
			{
				$sql3="SELECT a.*,b.*,d.*,e.* FROM Enquiry a, professional_area b, services d, customer e 
				WHERE a.cat_id=b.pro_id and a.service_id=d.s_id and a.c_id=e.c_id and a.e_status=1 and a.e_id='$eid' ";
			   
				$result = mysqli_query($this->db, $sql3); 
				$data = mysqli_fetch_array($result);
				return $data;
			}
			
				public function getProductLs()
			{
			$sql3="SELECT * FROM g_section a, g_category b, g_itemdetails c where a.section_id=c.section_id and b.category_id=c.category_id";

			$res = mysqli_query($this->db,$sql3);

			  return $res;
			}
			
			
			
			public function CategoryactiveORdeactiveDriver($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update g_category set category_status='1' where category_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update g_category set category_status='0' where category_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
				public function requestActiveCategory($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update category set cat_status='1' where cat_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update category set cat_status='0' where cat_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			public function getJobDetailsForAccpt($reqId)
			{
			// $qry = "select a.*, b.*, c.* from Enquiry a, services b, professional_area c where c.pro_id=a.cat_id and b.s_id=a.service_id and a.security_code='$tid'";
               $qry="SELECT a.*,b.*,d.*,e.*, f.* FROM Enquiry a, professional_area b, services d, customer e, technician f
		                  WHERE a.cat_id=b.pro_id and a.service_id=d.s_id and a.c_id=e.c_id and a.e_status=1 and a.alloted_technician_id=f.t_id and a.e_id=$reqId";
		                 
                $rs = mysqli_query($this->db,$qry);
                $getRowAssoc = mysqli_fetch_assoc($rs);
               
             return $getRowAssoc;
			}
			
			
			public function asskignedTechUpdate($reqId,$techId)
			{
			    //echo 'Hi';
				$qry="update Enquiry set alloted_technician_id='$techId', work_status='2' where e_id='$reqId' ";
				 
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			public function requestActiveBisiness($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update business set b_status='1' where b_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update business set b_status='0' where b_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			public function getAmountApprove($amt,$status)
			{
				$qry="update fault_analysis set f_amount='$amt', pay_approve='1' where f_id='$status'";
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			public function getpaymentDetails()
			{
				
				$sql3="SELECT a.*, c.*, d.* FROM Enquiry a,customer c, technician d  WHERE a.c_id=c.c_id and a.alloted_technician_id=d.t_id";

				$res = mysqli_query($this->db,$sql3);

			  return $res;
			   
			}
			
			public function getBankPaymentDetails()
			{
				
				$sql3="SELECT a.*, c.*, d.* FROM Enquiry a,customer c, pay_bank d  WHERE a.e_id= d.req_id and c.c_id=u_id Order by d.bnk_pay_id desc";

				$res = mysqli_query($this->db,$sql3);

			  return $res;
			   
			}
			
				public function invc($eid)
			{
				
				$sql3="SELECT a.*, c.*,b.*, d.*,e.*,f.* FROM Enquiry a, fault_analysis b, customer c, technician d, services e, professional_area f WHERE a.c_id=c.c_id and a.alloted_technician_id=d.t_id and a.e_id=b.e_id and a.service_id=e.s_id and a.cat_id=f.pro_id and a.e_id='$eid'";

				$res = mysqli_query($this->db,$sql3);

			  return $res;
			   
			}
			
				public function totalAmountUpdateToCust($eid,$servicecharge)
			{
				 $qry="select SUM(b.f_amount) as Amount from Enquiry a, fault_analysis b where a.e_id= b.e_id and b.e_id='$eid'";
				   
				  
					 $rs = mysqli_query($this->db,$qry);
					$getRowAssoc = mysqli_fetch_assoc($rs);
		 
					$amt=$getRowAssoc['Amount'];
				   
					$qryupdate="update Enquiry set amount_paid='$amt', payment_status='1', payment_dialog_status='0' where e_id='$eid'";
				 
					$res = mysqli_query($this->db,$qryupdate);
						
						
						 $qryupdate1="update Enquiry set service_amount='$servicecharge', payment_dialog_status='0' where e_id='$eid'";
				 
				   $res1 = mysqli_query($this->db,$qryupdate1);
						
						
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
						
					
			}
			
			
			public function requestActiveTechnicain($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update technician set t_status='1' where t_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update technician set t_status='0' where t_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
				public function requestActivesrvs($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update services set s_status='1' where s_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update services set s_status='0' where s_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			public function requestActivesrvsNotifi($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update notification set n_status='1' where n_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update notification set n_status='0' where n_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			
				public function updatepayst($schoolId,$status)
			{
					$qry="";
					if($status=='1')
					{
					$qry="update Enquiry set payment_status='2',work_status='5' where e_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update Enquiry set payment_status='2', work_status='5' where e_id='$schoolId'";    
					}
				   
					$res = mysqli_query($this->db,$qry);
						
						
						 
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			
			
			public function requestActiveProfessional($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update professional_area set pro_status='1' where pro_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update professional_area set pro_status='0' where pro_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			
				public function requestActivectm($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update customer set c_status='1' where c_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update customer set c_status='0' where c_id='$schoolId'";    
					}
				   
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			
			
				public function ctyact($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update citylist set city_status='1' where city_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update citylist set city_status='0' where city_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
			
			
			public function vendorActivestatusdeactive($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update vendorlist set vendor_status='1' where vendor_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update vendorlist set vendor_status='0' where vendor_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
				public function activedeactiveItems($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update g_itemdetails set item_statuss='1' where item_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update g_itemdetails set item_statuss='0' where item_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			public function AddProducts($item_name,$item_image,$section_id,$remark,$mrp,$sellingprice,$qtyunit,$item_statuss,$gst,$vid)
			{
			 $qry="INSERT INTO `itemdetails`
			 (`item_name`, `item_image`, `section_id`,  `remark`, `mrp`, `sellingprice`, `qtyunit`, `item_cdate`, `item_statuss`,  `gst`,v_id) 
			 VALUES ('$item_name','$item_image','$section_id','$remark','$mrp','$sellingprice','$qtyunit',now(),'1','$gst','$vid')";

			 $res = mysqli_query($this->db,$qry);  
				return $result;
			}
			
			
			public function addvend($first_name,$last_name,$complete_address,$mobile,$password)
			{
				$qry="INSERT INTO `vendors`(`first_name`, `last_name`, `complete_address`, `mobile`, `password`, `create_date`, `vend_lat`, `vend_long`, `status`)
				VALUES ('$first_name','$last_name','$complete_address','$mobile','$password',now(),'0','0','1')";
				$res = mysqli_query($this->db,$qry);  
				return $result;
			}
			
				public function getSect()
			{
			$sql3="SELECT * FROM category where cat_status=1";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function getbusinessnam()
			{
			$sql3="SELECT * FROM business where b_status=1";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function getProfessionalArea()
			{
			$sql3="SELECT * FROM professional_area where pro_status=1";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function getState()
			{
			$sql3="SELECT * FROM state";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function getvendorList()
			{
			$sql3="SELECT * FROM vendorlist";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function gettimeslot()
			{
			$sql3="SELECT * FROM timeslot";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function getcatList()
			{
			$sql3="SELECT * FROM category";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function getbusinessList()
			{
			$sql3="SELECT * FROM business";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function gettechList()
			{
			$sql3="SELECT a.*,b.*,c.* FROM business a,professional_area b, technician c where c.b_id=a.b_id and c.professional_area=b.pro_id";

			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function gettechListByid($id)
			{
			$sql3="SELECT * FROM  technician where t_id='$id'";

			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function getProfes()
			{
			$sql3="SELECT * FROM professional_area";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function getsrv()
			{
			$sql3="SELECT * FROM professional_area a, services b where a.pro_id=b.pro_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			
			public function deletebusiness($bid)
			{
			$sql3="Delete  FROM business where b_id='$bid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function deletetechnician($bid)
			{
			$sql3="Delete  FROM technician where t_id='$bid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function deleteServices($bid)
			{
			$sql3="Delete  FROM services where s_id='$bid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			public function deletectm($bid)
			{
			$sql3="Delete  FROM customer where c_id='$bid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function getvend()
			{
			$sql3="SELECT * FROM vendors";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			
			public function getService($pid)
			{
			$sql3="SELECT * FROM services where s_status='1' and pro_id='$pid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function itemsls($vid)
			{
			$sql3="SELECT * FROM itemdetails where v_id='$vid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function getfeedback($vid)
			{
			$sql3="SELECT * FROM Satisfaction where e_id='$vid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			public function vendorAdd($vname,$vmobile,$vaddress,$vcity,$vemail,$vpas,$vopen,$vown,$vlat,$vlng,$vgst)
			{
				 $qry="INSERT INTO `vendorlist`( `vendor_name`, `vendor_mobile`, `vendor_address`, `city_id`, `vendor_email`, `vendor_password`, `vendor_status`, `vendor_open`, `is_vendor_own`, `vendor_updatedate`, `vendorlat`, `vendorlong`, `vendor_cdate`, `vendor_devicetoken`, `gstnumber`, `bill_status`, `login_verified`, `owner_name`, `app_status`) VALUES 
				('$vname','$vmobile','$vaddress','$vcity','$vemail','$vpas','1','$vopen','$vown',now(),'$vlat','$vlng',now(),'token','$vgst','0','0','N','0')";
			
			 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
				public function adddelivery($vname,$vmobile,$vaddress,$vemail,$vpas,$vlat,$vlng)
			{
				 $qry="INSERT INTO `deliveryboylist`( `dl_name`, 
				 `dl_mobile`, 
				 `dl_address`, 
				 `dl_email`, 
				 `dl_password`, 
				 `dl_status`,
				 `dl_open`, 
				 `dl_updatedate`,
				 `dllat`,
				 `dllong`, 
				 `dl_cdate`,
				 `dl_devicetoken`,
				 `app_status`) VALUES ('$vname','$vmobile','$vaddress','$vemail','$vpas','1','1',now(),'$vlat','$vlng',now(),'NA','1')";
			
			 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
				public function addcity($citynam)
			{
				 $qry="INSERT INTO `citylist`(`city_name`, `city_status`) VALUES ('$citynam','1')";
			
				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
			
				public function adcat($nam,$dis)
			{
				 $qry="INSERT INTO `professional_area`(`pro_name`, `pro_dis`, `pro_created`, `pro_status`) 
				 VALUES ('$nam','$dis',now(),'1')";
			
				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
			
				public function chnagepas($nam,$dis)
			{
				if($nam==$dis)
				{
				 $qry="update admin set admin_pass='$nam'";
			
				 $res = mysqli_query($this->db,$qry);  
				return $result;
				}
				
			}
			
			
				public function notif($nam,$dis)
			{
				 $qry="INSERT INTO `notification`(`n_title`, `n_message`, `n_created`, `n_status`) 
				 VALUES ('$nam','$dis',now(),'1')";
			
				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
			
				public function addserv($nam,$dis)
			{
				 $qry="INSERT INTO `services`( `pro_id`,`s_name`, `s_created`, `s_status`) 
				 VALUES ('$nam','$dis',now(),'1')";
			
				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
			
			public function addbusiness($Businessn,$Businessemail,$Reps,$Phone,$addres)
			{
				 $qry="INSERT INTO `business`(`b_name`,`b_mail`, `b_reps`, `b_phone`, `b_address`, `b_created`, `b_status`) VALUES ('$Businessn','$Businessemail','$Reps','$Phone','$addres',now(),'1')";

				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			
				
			public function addctm($firstname,$lastname,$mobile,$CompleteAddress,$email,$password,$state,$cty)
			{
				 $qry="INSERT INTO `customer`(`c_first_name`, `c_last_name`, `c_phone`, `c_address`, `c_email`, `c_pass`, `c_created`, `c_status`,NGstate,NGcity) 
				 VALUES ('$firstname','$lastname','$mobile','$CompleteAddress','$email','$password',now(),'1','$state','$cty')";

				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
				public function addtimeslot($slot,$start,$end)
			{
				 $qry="INSERT INTO `timeslot`(`time_slot`, `timestart`, `timeend`, `status`) VALUES ('$slot','$start','$end','1')";
			
				 $res = mysqli_query($this->db,$qry);  
				return $result;
				
			}
			public function getCat($category_id)
			{
			$sql3="SELECT * FROM g_category where secction_id='$category_id' and category_status=1";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function getCtm()
			{
			$sql3="SELECT * FROM customer";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
		//======================================================================================================================================	
			
			/*** for login process ***/
			public function check_login($ADMIN_USERID, $ADMIN_PASSWORD,$schl){
				if(empty($schl))
				{
			$sql2="SELECT * from access_users WHERE ADMIN_USERID='$ADMIN_USERID' AND ADMIN_PASSWORD='$ADMIN_PASSWORD'";
			//checking if the username is available in the table
			$result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;
				if ($count_row == 1) {
			// this login var will use for the session thing
			$_SESSION['login'] = true;
			$_SESSION['username'] = $user_data['ADMIN_USERID'];
			$_SESSION['typ'] = 'admin';
				$_SESSION['name'] = 'admin';
				$_SESSION['id'] = 'admin';
			return true;
			}
			else{
			return false;
			}
		}else{
			
			$sql2="SELECT * from school WHERE login_id='$ADMIN_USERID' AND school_password='$ADMIN_PASSWORD' and school_id='$schl' and school_active_status=1";
			//checking if the username is available in the table
			$result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;
				if ($count_row == 1) {
			// this login var will use for the session thing
			$_SESSION['login'] = true;
			$_SESSION['username'] = $user_data['ADMIN_USERID'];
			$_SESSION['typ'] = 'school';
				$_SESSION['name'] = $user_data['school_name'];
				$_SESSION['id'] =  $user_data['school_id'];
			return true;
			}
			else{
			return false;
			}
			}
			}
			
			
			/*** starting the session ***/
			public function get_session(){
			return $_SESSION['login'];
			}
			
			public function user_logout() {
			$_SESSION['login'] = false;
			session_destroy();
			}
			//Fare
			public function add_fare($fare_base_fare,$fare_city_id){
			$sql1="INSERT INTO fare SET fare_base_fare='$fare_base_fare',fare_city_id='$fare_city_id',status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			public function list_fare()
			{
			$sql3="SELECT f.*,c.city_name As cityName FROM fare f,city c WHERE f.fare_city_id=c.city_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function edit_fare($id)
			{
			$sql3="SELECT f.*,c.city_name As cityName FROM fare f,city c WHERE f.fare_city_id=c.city_id AND fare_id='$id'";
			$res = mysqli_query($this->db,$sql3);
			return $res;
			}
			public function update_fare($id,$fare_base_fare,$fare_city_id){
				
			$sql1="UPDATE fare SET fare_base_fare='$fare_base_fare',fare_city_id='$fare_city_id' WHERE fare_id =".$id ;
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
			return $result;
			}
			public function delete_fare($table,$id)
			{
				$sql3= "DELETE FROM $table WHERE fare_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			}
			//end fare
			//Bus
			public function add_bus($bus_name,$bus_number,$totalSeats,$school_id){
			$sql1="INSERT INTO bus SET bus_name='$bus_name',bus_number='$bus_number',totalSeats='$totalSeats',school_id='$school_id',bus_status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
				public function addstudents($studentname1,$studentname2,$adrees,$phone,$parents,$school,$sections,$bus,$classes,$img,$cardId){
			$sql1="INSERT INTO students set student_first_name='$studentname1',student_card_id='$cardId', profile_pic='$img', student_last_name='$studentname2', student_address='$adrees', student_phone='$phone', student_parents_id='$parents', student_school_id='$school', student_class='$classes', student_section='$sections', student_bus_id='$bus', student_created_date=NOW() , student_active_status='1'";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
			
				public function adddriver($drivername1,$driver2,$adrees,$phone,$phone1,$dl,$school,$bus,$psw){
			$sql1="INSERT INTO bus_driver  SET driver_first_name='$drivername1', driver_last_name='$driver2', driver_Address='$adrees', driver_phone='$phone', driver_emncy_phone='$phone1', driver_bus_id='$bus', driver_school_id='$school', driving_licence='$dl', driver_created_date=NOW(), driver_active_status='1', driver_password='$psw'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
				public function add_schools($schoolName,$adrees,$phone,$cty,$schlId,$spas){
			$sql1="INSERT INTO school SET school_name='$schoolName',login_id='$schlId',school_password='$spas',school_address='$adrees',school_city='$cty',school_phone='$phone',school_create_date=NOW(),school_active_status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
			
				public function addparents($pname,$lname,$ph,$mail,$emcyno,$adr,$cty,$pas,$schl){
			$sql1="INSERT INTO parents SET parents_first_name='$pname',parents_last_name='$lname',parents_phone='$ph',parents_mail='$mail',parents_emergency_contact='$emcyno',parents_address='$adr',parents_city='$cty',parents_created_date=NOW(),parents_active_status='1',ppassword='$pas',school_id=$schl";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			public function list_bus()
			{
			$sql3="SELECT * FROM bus";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function edit_bus($id)
			{
			$sql3="SELECT * FROM bus WHERE bus_id='$id'";
			$res = mysqli_query($this->db,$sql3);
			return $res;
			}
			public function update_bus($id,$bus_name,$bus_number){
				
			$sql1="UPDATE bus SET bus_name='$bus_name',bus_number='$bus_number',totalSeats='$totalSeats' WHERE bus_id =".$id ;
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
			return $result;
			}
			public function delete_bus($table,$id)
			{
				$sql3= "DELETE FROM $table WHERE bus_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			}
			

			public function getPickUpPointAll($id,$src,$des)
			{

			$sql3="SELECT * FROM bus_route where bus_id='$id' and bus_source='$src' and bus_dest='$des'";

			$result = mysqli_query($this->db,$sql3);


			  return $result ;
			}

			//End Bus
			//city
			public function add_city($city_name){
			$sql1="INSERT INTO city SET city_name='$city_name',city_status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			public function list_city()
			{
			$sql3="SELECT * FROM city";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function getBusList()
			{
			$sql3="SELECT * FROM bus";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}


			public function getCityList()
			{
			$sql3="SELECT * FROM city";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function getParents()
			{
			$sql3="SELECT * FROM parents where parents_active_status='1'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
				public function getParentsschoolby($scholid)
			{
			$sql3="SELECT * FROM parents where parents_active_status='1' and school_id='$scholid'";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			public function edit_city($id)
			{
			$sql3="SELECT * FROM city WHERE city_id='$id'";
			$res = mysqli_query($this->db,$sql3);
			return $res;
			}
			public function update_city($id,$city_name){
				
			$sql1="UPDATE user SET city_name='$city_name' WHERE city_id =".$id ;
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
			return $result;
			}
			public function delete_city($table,$id)
			{
				$sql3= "DELETE FROM $table WHERE city_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			}
			//end city
			//user
			public function add_user($u_name,$pass,$u_add,$email){
				
			$sql1="INSERT INTO user SET u_name='$u_name',pass='$pass',u_add='$u_add',email='$email',u_status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			public function list_user()
			{
			$sql3="SELECT * FROM user";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function edit_user($id)
			{
			$sql3="SELECT * FROM user WHERE u_id='$id'";
			$res = mysqli_query($this->db,$sql3);
			return $res;
			}
			public function update_user($id,$u_name,$pass,$u_add,$email){
				
			$sql1="UPDATE user SET u_name='$u_name',pass='$pass',u_add='$u_add',email='$email'WHERE u_id =".$id ;
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
			return $result;
			}
			public function delete_user($table,$id)
			{
				$sql3= "DELETE FROM $table WHERE u_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			}
			//end user
			//Tour Package
			
			public function add_tour_pkg($pkg_passenger,$pkg_from,$pkg_to,$pkg_date){

			$sql1="INSERT INTO package SET pkg_passenger='$pkg_passenger',pkg_from='$pkg_from',pkg_to='$pkg_to',pkg_date='$pkg_date',pkg_status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			public function list_tour_pkg()
			{
			$sql3="SELECT * FROM package";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function edit_tour_pkg($id)
			{
			$sql3="SELECT * FROM package WHERE pkg_id='$id'";
			$res = mysqli_query($this->db,$sql3);
			return $res;
			}
			public function update_tour_package($id,$pkg_passenger,$pkg_from,$pkg_to,$pkg_date)
			 {
				$sql3= "UPDATE package SET pkg_passenger='$pkg_passenger',pkg_from='$pkg_from',pkg_to='$pkg_to',pkg_date='$pkg_date' WHERE pkg_id =".$id ;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			 }
			 public function delete_tour_package($table,$id)
			 {
				$sql3= "DELETE FROM $table WHERE pkg_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			 }
			//End Tour package

			
			
			 // Add Routes

			public function addBusRoute($busSource,$busDes,$busPickup,$BusId,$source_time,$des_time,$bus_fare){
			$sql1="INSERT INTO bus_route SET bus_source='$busSource',bus_dest='$busDes',bus_pickup='$busPickup',bus_id='$BusId',source_time='$source_time',des_time='$des_time',route_state='1',bus_fare='$bus_fare'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			  public function listRoutes()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  br.*,bs.* From bus_route br,bus bs where br.bus_id=bs.bus_id and bs.bus_status=1
		GROUP BY bus_source,bus_dest";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			  public function listBusOnly()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From bus 
		GROUP BY bus_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			  public function listBusSchoolOnly($schoolId)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From bus where bus_status=1 and school_id='$schoolId'
		GROUP BY bus_id ";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			
				public function listparent()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From parents 
		GROUP BY parents_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function listparentSchoolwise($id)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From parents where parents_active_status='1' and school_id='$id'
		GROUP BY parents_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			
			
				public function listScanCards()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		/*$sql3="SELECT a.* , 
		b.* ,
		c.* ,
		d.* ,
		e.* ,
		g.*,
		(select f.address_txt from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As address_txt ,
		(select f.bus_latitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_latitude ,
		(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_longitude ,
		(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As update_date_time 


		from school a,
		students b,
		parents c,
		bus d ,
		bus_driver e,
		scan_logs g
		where b.student_school_id = a.school_id
		and b.student_parents_id = c.parents_id
		and b.student_bus_id = d.bus_id
		and b.student_school_id = d.school_id
		and e.driver_bus_id = d.bus_id
		and b.student_id=g.student_id
		and c.parents_id=g.parents_id
		and d.bus_id=g.bus_id
		and e.driver_id=g.driver_id";
		*/
		$sql3="SELECT a.* , b.* , c.* , d.* , e.* , g.*, 
		(select f.address_txt from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As address_txt , 
		(select f.bus_latitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_latitude , 
		(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_longitude , 
		(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
		As update_date_time from school a, students b, parents c, bus d , bus_driver e, scan_logs g 
		where g.student_id=b.student_id 
		and g.logs_school_id=a.school_id 
		and g.driver_id=e.driver_id 
		and g.bus_id=d.bus_id 
		and g.parents_id=c.parents_id 
		ORDER BY g.log_id DESC";

			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function listScanCardsSchoolwise($id)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		/*$sql3="SELECT a.* , 
		b.* ,
		c.* ,
		d.* ,
		e.* ,
		g.*,
		(select f.address_txt from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As address_txt ,
		(select f.bus_latitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_latitude ,
		(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_longitude ,
		(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As update_date_time 


		from school a,
		students b,
		parents c,
		bus d ,
		bus_driver e,
		scan_logs g
		where b.student_school_id = a.school_id
		and b.student_parents_id = c.parents_id
		and b.student_bus_id = d.bus_id
		and b.student_school_id = d.school_id
		and e.driver_bus_id = d.bus_id
		and b.student_id=g.student_id
		and c.parents_id=g.parents_id
		and d.bus_id=g.bus_id
		and e.driver_id=g.driver_id";
		*/
		$sql3="SELECT a.* , b.* , c.* , d.* , e.* , g.*, 
		(select f.address_txt from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As address_txt , 
		(select f.bus_latitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_latitude , 
		(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_longitude , 
		(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
		As update_date_time from school a, students b, parents c, bus d , bus_driver e, scan_logs g 
		where g.student_id=b.student_id 
		and g.logs_school_id=a.school_id 
		and g.driver_id=e.driver_id 
		and g.bus_id=d.bus_id 
		and g.parents_id=c.parents_id
		and g.logs_school_id='$id'
		ORDER BY g.log_id DESC";

			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			
			
			public function listparents()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From parents 
		GROUP BY bus_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function liststudents()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT a.*,b.*,c.*,d.* From students a, parents b, bus c, school d where a.student_parents_id=b.parents_id and a.student_school_id=d.school_id and a.student_bus_id=c.bus_id  ORDER BY student_id DESC";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function liststudentsSchoolwise($id)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT a.*,b.*,c.*,d.* From students a, parents b, bus c, school d where a.student_parents_id=b.parents_id and a.student_school_id=d.school_id and a.student_bus_id=c.bus_id and a.student_school_id='$id' ORDER BY a.student_id DESC";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			
			public function listdriver()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT * From bus_driver a, bus b, school c where a.driver_bus_id=b.bus_id and a.driver_school_id=c.school_id GROUP BY driver_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
				public function listdriverSchoolWise($id)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT * From bus_driver a, bus b, school c where a.driver_bus_id=b.bus_id and a.driver_school_id=c.school_id and a.driver_school_id='$id' GROUP BY a.driver_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function listSchools()
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From school 
		GROUP BY school_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
				public function listSchoolsOnlybySchoolId($id)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT  * From school where school_id='$id'  and bus_status=1
		GROUP BY school_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			
			 public function delete_busRoute($table,$id)
			 {
				$sql3= "DELETE FROM $table WHERE route_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			 }
			 
			 
				 public function updateBusStatus($table,$id,$status)
				{
				$sql3= "Update $table set bus_status=$status WHERE bus_id=".$id;
			
				$res = mysqli_query($this->db,$sql3);
				return $res;
				}
			//end Bus route
			
			//Ticket Booking
			public function add_ticket_booking($b_passanger_name,$b_mob,$b_from,$b_to,$b_date,$b_date_of_jry,$b_fare,$b_dist,$b_bus_id){

			$sql1="INSERT INTO ticket_booking SET b_passanger_name='$b_passanger_name',b_mob='$b_mob',b_from='$b_from',b_to='$b_to',b_date='$b_date',b_date_of_jry='$b_date_of_jry',b_fare='$b_fare',b_dist='$b_dist',b_bus_id='$b_bus_id',b_status='1'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			public function list_ticket_booking()
			{
			$sql3="SELECT * FROM ticket_booking";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function edit_ticket_booking($id)
			{
			$sql3="SELECT * FROM ticket_booking WHERE b_id='$id'";
			$res = mysqli_query($this->db,$sql3);
			return $res;
			}
			public function update_ticket_booking($id,$b_passanger_name,$b_mob,$b_from,$b_to,$b_date,$b_date_of_jry,$b_fare,$b_dist,$b_bus_id)
			 {
				$sql3= "UPDATE ticket_booking SET b_passanger_name='$b_passanger_name',b_mob='$b_mob',b_from='$b_from',b_to='$b_to',b_date='$b_date',b_date_of_jry='$b_date_of_jry',b_fare='$b_fare',b_dist='$b_dist',b_bus_id='$b_bus_id' WHERE b_id =".$id ;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			 }
			 public function delete_ticket_booking($table,$id)
			 {
				$sql3= "DELETE FROM $table WHERE b_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			 }
			//end Ticket Booking
			
			//view feedback
			public function view_feedback()
			{
			$sql3="SELECT * FROM feedback";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function delete_viewFeedback($table,$id)
			{
				$sql3= "DELETE FROM $table WHERE feed_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			}
			 //end
			 
			//view Cancellation
			public function view_cancellation()
			{
			$sql3="SELECT c.*,u.u_name As uname FROM cancellation c,user u WHERE c.cancel_uid=u.u_id";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			public function delete_cancellation($table,$id)
			{
				$sql3= "DELETE FROM $table WHERE cancel_id=".$id;
				$res = mysqli_query($this->db,$sql3);
				return $res;
			}
			public function activeORdeactiveschools($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update school set school_active_status='1' where school_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update school set school_active_status='0' where school_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
				public function activeORdeactiveParents($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update parents set parents_active_status='1' where parents_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update parents set parents_active_status='0' where parents_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
				public function activeORdeactiveStudents($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update students set student_active_status='1' where student_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update students set student_active_status='0' where student_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
				public function activeORdeactiveDriver($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update bus_driver set driver_active_status='1' where driver_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update bus_driver set driver_active_status='0' where driver_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			public function activeORdeactiveBus($schoolId,$status)
			{
				$qry="";
				  if($status=='1')
					{
					$qry="update bus set bus_status='1' where bus_id='$schoolId'";
				   
					}else if($status=='0')
					{
					$qry="update bus set bus_status='0' where bus_id='$schoolId'";    
					}
					
						$res = mysqli_query($this->db,$qry);
						
					//return $qry;
					 return mysqli_affected_rows($this->db);
			}
			
			
				public function getStudentRecordForEdit($sid)
			{
			$sql3="SELECT * FROM students where student_id='$sid'";
			$res = mysqli_query($this->db,$sql3);
			$data = mysqli_fetch_array($res);
			  return $data;
			}
			
				public function getSchoolRecordForEdit($sid)
			{
			$sql3="SELECT * FROM school where school_id='$sid'";
			$res = mysqli_query($this->db,$sql3);
			$data = mysqli_fetch_array($res);
			  return $data;
			}
			
			
			
				public function fetchAllParents($sid,$flg){
					if($flg==1)
					{
				   $sql1="select COUNT(*) As countNo from parents where school_id='$sid'";
					}else{
					   $sql1="select COUNT(*) As countNo from parents ";  
					}
					
					

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");

			$user_data = mysqli_fetch_array($result);
			
			return $user_data['countNo'];
			}
			
			
			public function fetchAllAdminParents(){
				  $sql1="select COUNT(*) As countNo from parents ";  
					

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");

			$user_data = mysqli_fetch_array($result);
			
			return $user_data['countNo'];
			}
			
			
				public function fecthstudentCount(){
				  $sql1="select COUNT(*) As countNo from students ";  
					

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");

			$user_data = mysqli_fetch_array($result);
			
			return $user_data['countNo'];
			}
			
				public function fetchQRupdateQRCodeStatus($eid){
				  $sql1="select * from Enquiry where e_id='$eid' ";  
					
        			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        
        			$user_data = mysqli_fetch_array($result);
        			$qr=$user_data['security_code'];
			
    
                    $qrystr="UPDATE `Enquiry` SET `scan_flag`=1 WHERE `security_code`='$qr' and e_id='$eid'";
                  
                     $qry = mysqli_query($this->db,$qrystr); 
                    
            		$addressId = mysqli_affected_rows($this->db);
            		if($addressId>0){
            		
            	        
            			$status = "1";
            // 			$msg = "Scan successfully .";
            // 			$arr['response']['status']=$status;
            // 			$arr['response']['message']=$msg; 
            // 			$arr['response']['DetailsData']=$data;
            			
            			
            				
            		}else{
            			$status = "0";
            // 			$msg = "Failed to scan .";
            // 			$arr['response']['status']=$status;
            // 			$arr['response']['message']=$msg;
            			
            // 			 	$arr['response']['DetailsData']=$data;
            						
            		}
     
      
		
			
			return $status;//json_encode($arr);
			}
			
			
				public function fetchschoolcount(){
					$sql1="select COUNT(*) As countNo from school";
					
					

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");

			$user_data = mysqli_fetch_array($result);
			
			return $user_data['countNo'];
			}
			
			
			
			public function fetchAllStudents($sid,$flg){
				 if($flg==1)
					{
			$sql1="select COUNT(*) As countNo from students where student_school_id='$sid'";
					}else{
						$sql1="select COUNT(*) As countNo from students ";
					}

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");

			$user_data = mysqli_fetch_array($result);
			
			return $user_data['countNo'];
			}
			
				public function updateSchoolPass($oldpas,$newps,$sid){
			$sql1="Update school SET school_password='$newps', where school_id='$sid' and school_password='$oldpas'";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $sql1;
			}
			
				public function getupdateSchoolDetails($schoolName,$adrees,$phone,$cty,$sid,$passs){
			$sql1="Update school SET school_name='$schoolName',school_address='$adrees',school_city='$cty',school_phone='$phone',school_password='$passs' where school_id='$sid'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
				public function getUpdateParentsDetails($pname,$lname,$ph,$mail,$emcyno,$adr,$cty,$pas,$schl,$pid){
			$sql1="Update parents SET parents_first_name='$pname',parents_last_name='$lname',parents_phone='$ph',parents_mail='$mail',parents_emergency_contact='$emcyno',parents_address='$adr',parents_city='$cty',ppassword='$pas',school_id=$schl where parents_id='$pid'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
			public function getParentsRecordForEdit($sid)
			{
			$sql3="SELECT * FROM parents where parents_id='$sid'";
			$res = mysqli_query($this->db,$sql3);
			$data = mysqli_fetch_array($res);
			  return $data;
			}
			
			
				public function updateStudent($studentname1,$studentname2,$adrees,$phone,$parents,$school,$sections,$bus,$classes,$sid){
			$sql1="Update students set student_first_name='$studentname1', student_last_name='$studentname2', student_address='$adrees', student_phone='$phone', student_parents_id='$parents', student_school_id='$school', student_class='$classes', student_section='$sections', student_bus_id='$bus' where student_id='$sid'";

			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
				public function updateDriverDetails($drivername1,$driver2,$adrees,$phone,$phone1,$dl,$school,$bus,$psw,$did){
			$sql1="Update bus_driver  SET driver_first_name='$drivername1', driver_last_name='$driver2', driver_Address='$adrees', driver_phone='$phone', driver_emncy_phone='$phone1', driver_bus_id='$bus', driver_school_id='$school', driving_licence='$dl', driver_password='$psw' where driver_id='$did'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
			public function getDriverDetails($sid)
			{
			$sql3="SELECT * FROM bus_driver where driver_id='$sid'";
			$res = mysqli_query($this->db,$sql3);
			$data = mysqli_fetch_array($res);
			  return $data;
			}
			
			public function getrecordOfBust($sid)
			{
			$sql3="SELECT * FROM bus where bus_id='$sid'";
			$res = mysqli_query($this->db,$sql3);
			$data = mysqli_fetch_array($res);
			  return $data;
			}
			
				public function updateBus($bus_name,$bus_number,$totalSeats,$school_id,$bid){
			$sql1="Update bus SET bus_name='$bus_name',bus_number='$bus_number',totalSeats='$totalSeats',school_id='$school_id' where bus_id='$bid'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
			}
			
			
			
				public function getHostoryParents($pid)
			{
			/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
		//	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";

		$sql3="SELECT a.* , b.* , c.* , d.* , e.* , g.*, 
		(select f.address_txt from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As address_txt , 
		(select f.bus_latitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_latitude , 
		(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_longitude , 
		(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
		As update_date_time from school a, students b, parents c, bus d , bus_driver e, scan_logs g 
		where g.student_id=b.student_id 
		and g.logs_school_id=a.school_id 
		and g.driver_id=e.driver_id 
		and g.bus_id=d.bus_id 
		and g.parents_id=c.parents_id 
		and date(g.pick_up_datetime) between '2020-01-25' and '2020-01-31'
		and g.parents_id = '$pid'
		ORDER BY g.log_id DESC";
			$res = mysqli_query($this->db,$sql3);
			  return $res;
			}
			
			function checkSchoolIdExist($id)
			{
				
					$sql2="SELECT * from school WHERE login_id='$id'";
				
			//checking if the username is available in the table
			$result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;
			if($count_row>0)
			{
				return true;
			}else
			{
				return false;
			}
			}
			//end
			 
			}//class closing
			
		?>