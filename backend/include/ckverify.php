<?php	
	
	if(!session_id())
	@session_start();

	if(!in_array("MEMBER",$_SESSION['MCH_LOGIN_PERMIT']))
	exit;
		

	include("../public/DBClass.php");
	include("../public/web_function.php");
    $objDB = new DBClass();
	
	$VR_Email = quotes(trim($_POST['VR_Email']));
	
	if($VR_Email!=''){
		
	$RS = $objDB->Recordset("SELECT * FROM verify  WHERE VR_Email = '$VR_Email' ");
	$AllNum = $objDB->RecordCount($RS);
	 	if ($AllNum <> 0){
			$myobj = array(
			      'obj' => array('user'=>'yes')
			 );
	 	}else{
			$myobj = array(
			      'obj' => array('user'=>'no')
			 );
		}
		echo json_encode($myobj);
	}
?>	