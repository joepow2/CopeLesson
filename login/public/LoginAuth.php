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
   
  $rs = $objDB->Recordset("select * from member where MB_Email='$userid' and MB_Password='$password'");
  $row = $objDB->GetRows($rs);
  $AllNum = $objDB->RecordCount($rs);

	if ($AllNum <> 0){
		/*
	    session_register('CPL_LOGIN_ID');
		session_register('CPL_LOGIN_ACCOUNT');
		session_register('CPL_LOGIN_NAME');
	
		session_register('CPL_LOGIN_PERMIT');
	   	*/
		$_SESSION['CPL_LOGIN_ID'] = $row[0]["MB_ID"];
		//$_SESSION['CPL_LOGIN_ACCOUNT'] = $row[0]["MB_Account"];
		$_SESSION['CPL_LOGIN_EMAIL'] = $row[0]["MB_Email"];
		$_SESSION['CPL_LOGIN_NAME'] = $row[0]['MB_Name'];
		//$_SESSION['CPL_LOGIN_TYPE'] = $row[0]['AM_Type'];
	
		//$_SESSION['CPL_LOGIN_PERMIT'] = explode(",",$row[0]['AM_Permit']);
			
		//$AM_ID = $row[0]["AM_ID"];
		
		//$objDB->Execute("UPDATE admin SET Last_login = now() where AM_ID='$AM_ID' "); 
		
?>
		<script language=javascript>
		location.href="../../index.html";
		//location.replace('../welcome/main.php');
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
		 window.location="../index.php";
	 </script>
   <?php
   }
?>
