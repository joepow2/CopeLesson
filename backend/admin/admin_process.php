<?php
    include_once '../public/web_function.php';
	include_once '../public/mem_check.php';
	
	if(!$_SESSION['MCH_LOGIN_ID'])
	{
		header("location:../index.php");
		exit;
	}	
	
	$action = $_REQUEST["action"];
	switch ($action) {
		case "new":	
		
		$AM_ID = $objDB->GetMaxID('AM_ID','admin',3);
		$AM_Account = quotes($_POST["AM_Account"]);
		$AM_Pass = base64_encode(quotes($_POST["AM_Pass"]));
		$AM_Name = quotes($_POST["AM_Name"]);		
		//$AM_Type = quotes($_POST["AM_Type"]);
		$AM_Type = 1;		
			
		$Create_date = date("Y-m-d H:i:s");	
		
		$sql = "insert into admin (AM_ID,AM_Name,AM_Account,AM_Password,AM_Type,Create_date) values ('$AM_ID','$AM_Name','$AM_Account','$AM_Pass','$AM_Type','$Create_date')";
		$objDB->Execute($sql);
		
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript">
alert('帳號新增成功!');
location.href='admin.php';
</script>
<?php
		break;
		
		case "mdy":	
		$AM_ID = quotes(trim($_POST["AM_ID"]));
		$AM_Account = quotes($_POST["AM_Account"]);
		$AM_Name = quotes($_POST["AM_Name"]);
		
		//$AM_Type = quotes($_POST["AM_Type"]);		
		$AM_Type = 1;
					
		$AM_Pass = quotes(trim($_POST["AM_Pass"]));
		$AM_UdpPass = base64_encode($AM_Pass);
		
		if($AM_Pass!=''){
			$sql = "update admin set AM_Password='$AM_UdpPass',AM_Name='$AM_Name',AM_Type='$AM_Type' where AM_ID='$AM_ID'";			
		}else{
			$sql = "update admin set AM_Name='$AM_Name',AM_Type='$AM_Type' where AM_ID='$AM_ID'";
		}
		$objDB->Execute($sql);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
<script language="javascript">
alert('修改成功!');
location.href='admin.php';
</script>	
	<?php
		break;
	
		case "del":
				$AM_ID = quotes(trim($_REQUEST["am_id"]));
			
				$sql = "delete from admin where AM_ID ='$AM_ID'";
				$objDB->Execute($sql);
	?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="javascript">
	alert('資料刪除完畢!');
	location.href="admin.php";
	</script>
	<?php
		break;
		
		case "delall":
		$adm_del = $_POST["adm_del"];
		foreach ($adm_del as $key=>$value) {
			$AM_ID = $value;
			$sql = "delete from admin where AM_ID ='$AM_ID'";
			$objDB->Execute($sql);
		}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="javascript">
    alert('管理者資料資料刪除完畢!');
    location.href="admin.php";
    </script>
<?php
		
		break;
	
	}	
	
?>
