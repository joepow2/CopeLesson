<?php

//error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
session_start();

if (strlen($_SESSION['MCH_LOGIN_ID'])<1){

	?>
		<script language="javascript">		
		location.href='../index.php';
		</script>				
	<?php

}

include("DBClass.php");
$objDB = new DBClass();
date_default_timezone_set("Asia/Taipei");
$html_title="風華聯合診所後台管理系統 - ";

?>
