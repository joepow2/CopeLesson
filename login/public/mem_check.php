<?php
//$_SERVER['SERVER_NAME'] = '127.0.0.1';
//$_SERVER['PHP_SELF'] = '/ntust_copelesson/FreeAdminTheme/mem_check.php';
//$_SERVER['SCRIPT_FILENAME'] = '/Applications/MAMP/htdocs/ntust_copelesson/FreeAdminTheme/mem_check.php';
//$_SERVER['DOCUMENT_ROOT'] = '/Applications/MAMP/htdocs';

//error_reporting(E_ALL ^ E_DEPRECATED); //隱藏Warning訊息
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
session_start();
//echo $_SERVER['SERVER_NAME'] . '/ntust_copelesson/FreeAdminTheme/index.php';

if (strlen($_SESSION['CPL_LOGIN_ID'])<1){
	session_destroy();
	?>
		<script language="javascript">	
		location.href="login/index.php";	
		//location.replace('../index.php');
		</script>				
	<?php

}

include("DBClass.php");
$objDB = new DBClass();
date_default_timezone_set("Asia/Taipei");
$html_title="CopeLesson - ";

?>
