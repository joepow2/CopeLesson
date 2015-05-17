<?php
	if(!session_id()){
	  session_start();
	}

	$T=session_destroy();
    $_SESSION['MCH_LOGIN_ACCOUNT']="";   
?>

<script language="javascript">location.href='../index.php';</script>