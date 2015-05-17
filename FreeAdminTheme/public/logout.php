<?php
	if(!session_id()){
	  session_start();
	}

	$T=session_destroy();
    $_SESSION['CPL_LOGIN_ACCOUNT']="";
    $_SESSION['CPL_LOGIN_ID']="";   
?>

<script language="javascript">location.href='../index.php';</script>