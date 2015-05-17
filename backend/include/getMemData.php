<?php	
	header("Cache-Control: no-cache");
	include_once("../public/mem_check.php");
	include_once("../public/web_function.php");

	
	$CT_Account = quotes(trim($_REQUEST['CT_Account']));
    $AM_Type = quotes(trim($_REQUEST['AM_Type']));
	
	$rs = $objDB->Recordset("select * from customer  where CT_Account = '$CT_Account' AND AM_Type = '$AM_Type'");
	$row = $objDB->GetRows($rs);
	//有符合資料
	if($objDB->RecordCount($rs)>0){?>
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

    <table width="300" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
    <tr>
    <td width="87" align="left" bgcolor="#CCCCCC" class="content">&nbsp;&nbsp;<?php echo $row["0"]["CT_Name"]; ?></td>
      <td width="167" align="left" bgcolor="#CCCCCC" class="content"><input name="search" type="button" class="content" id="search" value="開 始 下 單"  onclick="MM_goToURL('parent','cart.php?CT_Account=<?=$CT_Account; ?>&AM_Type=<?=$AM_Type; ?>');return document.MM_returnValue"/></td>
    </tr>
</table>
<?php }else{ ?>
          <table border="0" cellpadding="0" cellspacing="0">	
<tr>
                <td colspan="2" align="right" class="content"></td>
                <td class="content">無符合資會員資料~!</td>
              </tr>
    	  </table>
<?php } ?>