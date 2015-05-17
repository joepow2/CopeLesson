<?php	
   	header("Cache-Control: no-cache");
	
	include_once("../public/DBClass.php");
	include_once("../public/web_function.php");
    $objDB = new DBClass();

	$AM_Account = quotes(trim($_POST['AM_Account']));
	
	if($AM_Account!=''){
		
		$RS = $objDB->Recordset("SELECT * FROM admin  WHERE AM_Account = '$AM_Account' ");
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
	
function userunicode($id){
	$id = strtoupper($id);

	//建立字母分數陣列
	$headPoint = array(
		'A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
		'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
		'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
		'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
		'Y'=>12,'Z'=>30
	);
	//建立加權基數陣列
	$multiply = array(8,7,6,5,4,3,2,1);
	//檢查身份字格式是否正確
	if (ereg("^[a-zA-Z][1-2][0-9]+$",$id) AND strlen($id) == 10){
		//切開字串
		$len = strlen($id);
		for($i=0; $i<$len; $i++){
		$stringArray[$i] = substr($id,$i,1);
	}
	//取得字母分數
	$total = $headPoint[array_shift($stringArray)];
	//取得比對碼
	$point = array_pop($stringArray);
	//取得數字分數
	$len = count($stringArray);
	for($j=0; $j<$len; $j++){
		$total += $stringArray[$j]*$multiply[$j];
	}
	//計算餘數碼並比對
	$last = (($total%10) == 0 )?0:(10-($total%10));
	if ($last != $point) {
		return false;
	} else {
		return true;
	}
	}  else {
		return false;
	}
}	
	
?>	