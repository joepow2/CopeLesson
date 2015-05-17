<?php
	include_once 'web_function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

if (isset($_POST['userid']) && isset($_POST['password']))
{
  
  
  $userid = quotes(trim($_POST['userid']));
  $password = base64_encode(quotes(trim($_POST['password'])));
  
  include_once 'DBClass.php';
  $objDB = new DBClass();
   

  $rs = $objDB->Recordset("select * from admin where AM_Account='$userid' and AM_Password='$password'");
  $row = $objDB->GetRows($rs);
  $AllNum = $objDB->RecordCount($rs);


	   if ($AllNum <> 0){
		   /*
	        session_register('MCH_LOGIN_ID');
			session_register('MCH_LOGIN_ACCOUNT');
			session_register('MCH_LOGIN_NAME');
	
			session_register('MCH_LOGIN_PERMIT');
	   		*/
			$_SESSION['MCH_LOGIN_ID'] = $row[0]["AM_ID"];
			$_SESSION['MCH_LOGIN_ACCOUNT'] = $row[0]["AM_Account"];
			$_SESSION['MCH_LOGIN_NAME'] = $row[0]['AM_Name'];
			$_SESSION['MCH_LOGIN_TYPE'] = $row[0]['AM_Type'];
	
			//$_SESSION['MCH_LOGIN_PERMIT'] = explode(",",$row[0]['AM_Permit']);
			
			$AM_ID = $row[0]["AM_ID"];
		
			$objDB->Execute("UPDATE admin SET Last_login = now() where AM_ID='$AM_ID' "); 
		
				 ?>
			      <script language=javascript>
					 location.href="../welcome/main.php";
				 </script>  
				 <?php
				
	   }else{ ?>
		  <script language=javascript>
			 alert("帳號或密碼錯誤！");
			 history.go(-1);
		  </script>
	   <?php
	   }
   }else{?>
     <script language=javascript>
		 alert("未取的權限！");
		 window.location="index.php";
	 </script>
   <?php
   }
?>
