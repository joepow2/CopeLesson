<?php
include_once("../public/mem_check.php");

//$AM_Type = $_SESSION['MCH_LOGIN_TYPE'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $html_title?> 歡迎頁</title>

<script src="../js/common.js" language="javascript"></script>
<link href="../css/backend.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
		<!-- header starting point -->
        <?php include("../include/header.php");?>
        <!-- header ending point -->	
    </td>
  </tr>
  <tr>
    <td valign="top">      
    <table width="1000" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="160" valign="top" background="../images/bkline.jpg">
       		<!--menu starting point-->
            <?php include("../include/menu.php");?>
			<!--menu ending point-->
        </td>
        <td width="10" valign="top"><img src="../images/spacer.gif" width="10" height="1" /></td>
        <td width="830" valign="top"><table width="830" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="836" height="30" class="content">歡迎！</td>
            </tr>
            <tr>
              <td height="10" class="content_red_b"><img src="../images/spacer.gif" width="1" height="1" /></td>
            </tr>
            <tr>
              <td class="content_red_b"> <?php echo $_SESSION['MCH_LOGIN_NAME'];?>  登入</td>
            </tr>
            <tr>
              <td height="10"><img src="../images/spacer.gif" width="1" height="1" /></td>
            </tr>

            <tr>
              <td valign="top"><p>請依照左側授權單元管理<br />
              </p>
                <p>&nbsp;</p></td>
            </tr>
            <tr>
              <td align="right" class="content_list"><br /></td>
            </tr>
          </table>
            <br />
            <br /></td>
      </tr>
    </table>
    </td>
  </tr>
    <td height="1" bgcolor="B5B4B3" class="copyright"><img src="../images/spacer.gif" width="1" height="1" /></td>
  </tr>
  <tr>
    <td class="copyright">
      <!--footer starting point-->
      <?php include("../include/footer.php");?>
      <!--footer starting point-->
    </td>
  </tr>
</table>
</body>
</html>
