<?php 
include_once("../public/mem_check.php");
include_once("../public/web_function.php");

	if(!$_SESSION['MCH_LOGIN_ID'])
	{
		header("location:../index.php");
		exit;
	}	

	
	if(is_numeric(quotes($_GET['am_id']))){
		 $AM_ID = quotes($_GET['am_id']);
	}else{
		 ?>
     <script language="javascript">		
		location.href='../index.php';
	 </script>	
         <?php
	}

	$rs = $objDB->Recordset("select * from admin where AM_ID ='$AM_ID'");
	$row = $objDB->GetRows($rs);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $html_title;?>後台帳號管理</title>
<script language="JavaScript" src="../js/common.js"></script>
<script language="javascript" src="../js/jquery.js" ></script>
<script>

 $(document).ready(function(){
 
 	$("#mybtn").click(function(){
		 
		  if($("#AM_Pass").val()!=''){
			  if($("#AM_Pass").val()=='') {
					alert('請填入新密碼');
					$("#AM_Pass").focus();
					return false;
			  }else if($("#AM_Pass").val()!=$("#AM_RePass").val()) {
					alert("確認密碼不相符");
					$("#AM_RePass").focus();
					return false;
			  }
		 }
		 
		 if($("#AM_Name").val()=='') {
					alert("請填入名稱");
					$("#AM_Name").focus();
					return false;
	     }else{
			  		$("form#form1").submit();
		}
	})
 	
 })

</script>
<link href="../css/backend.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<!-- header starting point -->
	<?php include("../include/header.php");?>
	<!-- header ending point -->    </td>
  </tr>
  <tr>
    <td valign="top"><table width="1100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="160" valign="top" background="../images/bkline.jpg">
          	<!--menu starting point-->
            <?php include("../include/menu.php");?>
            <!--menu ending point-->          </td>
            
          <td width="10" valign="top"><img src="../images/spacer.gif" width="1" height="1" /></td>
          <td width="930" valign="top"><table width="830" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" class="content">系統設定 > 後台帳號管理 &gt; 帳號修改</td>
              </tr>
            <tr>            
              <td height="10"></td>
             </tr>
            <tr>
              <td height="10">
                <span class="form_title">
                <input name="search" type="button" class="content" id="search" value="回上一頁" onClick="MM_goToURL('parent','admin.php');return document.MM_returnValue"/>
                </span></td>
             </tr>
             <tr>         
              <td>                          
              <!--管理員管理startinging-->              
              <form name="form1" id="form1" method="post" action="admin_process.php">
			   <input type="hidden" name="action" id="action" value="mdy">
              <input type="hidden" name="AM_ID" id="AM_ID" value="<?php echo $AM_ID;?>">
              <table width="495" border="0">
              <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">姓名：</td>
                  <td><input name="AM_Name" type="text" class="form_fix" id="AM_Name" value="<?php echo $row[0]['AM_Name'];?>"/></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td width="115" align="right" class="content">帳號：</td>
                  <td width="370" >&nbsp;&nbsp;<?php echo $row[0]["AM_Account"];?></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">新密碼：<br />(若要變更密碼才填)</td>
                   <td><input name="AM_Pass" type="password" class="form_fix" id="AM_Pass" /></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">再次確認密碼：</td>
                  <td><input name="AM_RePass" type="password" class="form_fix" id="AM_RePass" /></td>
                </tr> 
                <!--               
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">帳號權限：</td>
                  <td class="content">
                  	<input name="AM_Type" type="radio" value="1" <?php echo ckRadio("1",$row[0]['AM_Type']);?> />最高
                      <input name="AM_Type" type="radio" value="2" <?php echo ckRadio("2",$row[0]['AM_Type']);?> />一般
                  </td>
                </tr>
                -->
                <tr>
                  <td align="right" class="content">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>
                      <input name="mybtn" type="button" class="form_fix" id="mybtn"  value="確定送出"/>
                  </td>
                </tr>                
              </table>
              </form>
              <!--管理員管理 ending-->              </td>
            </tr>
            
            
          </table>         </td>
        </tr>
        
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><img src="../images/spacer.gif" width="1" height="1" /></td>
  </tr>
  <tr>
    <td>
       <div class="copyright">
          <!--footer starting point-->
          <?php include("../include/footer.php");?>
          <!--footer starting point-->
       </div>   
    </td>
  </tr>
</table>
</body>
</html>
