<?php
	include("public/DBClass.php");
    $objDB = new DBClass();
	//include("../include/phpfunction.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>風華聯合診所-後台管理系統</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
<script language="JavaScript" src="js/common.js"></script>
<script language="JavaScript" src="js/jquery.js"></script>
<script language="JavaScript" type="text/JavaScript">

$(function(){
	
	
	$("form#loginform input").keypress(function (e) {
		  if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			 $("#loginbtn").click();
			  return false;
		  } else {
			  return true;
		  }
      });
	
	
   $("#loginbtn").click(function(){
	
		if($("#userid").val()=='') {
					alert("請輸入帳號");
					$("#userid").focus();
					return false;
	    }else if($("#password").val()=='') {
					alert("請輸入密碼");
					$("#password").focus();
					return false;
	     }else{
			  		$("form#loginform").submit();
		}
	})
})
</script>

<link href="css/backend.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <td valign="middle">
   
    <form action="public/LoginAuth.php" method="post" name="loginform" id="loginform" >
    <br />
    <br />
    <br />
      <table width="220" border="0" align="center" cellpadding="2" cellspacing="0" id="upload" style="border:#666666 1px solid;">
      <tr>
      <td height="10"></td>
      </tr>
        <tr>
          <td colspan="2"><div align="center" class="event_gray"><img src="images/logo.png" /></div></td>
        </tr>
        <tr>
          <td width="38" nowrap="nowrap" class="content"><div align="center">帳號</div></td>
          <td width="174" ><input name="userid" id="userid"  style="width:150px;" /></td>
        </tr>
        <tr>
          <td width="38" nowrap="nowrap" class="content"><div align="center">密碼</div></td>
          <td ><input name="password"  id="password" type="password"  style="width:150px;"/></td>
        </tr>
        <tr>
          <td colspan="2">
            <div  align="center">
              <input name="loginbtn" id="loginbtn" type="button" class="content" value="登入" />
              
              <input name="reset" type="reset" class="content" value="取消" />
            </div>            
            <br />          </td>
        </tr>
      </table>
  
    </form>
     
    </td>
  </tr>
</table>

</body>
</html>
