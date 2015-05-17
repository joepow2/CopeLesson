<?php 
include("../public/mem_check.php");
include("../public/web_function.php");
	
	if(!$_SESSION['MCH_LOGIN_ID'])
	{
		header("location:../index.php");
		exit;
	}	
	
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
 		
		$("#AM_Account").blur(function(){
			if($("#AM_Account").val()!=''){	
			$.ajax({
			type: "POST",
			dataType:'json', 
			data: {AM_Account: $('#AM_Account').val()},
			url: '../include/ckAccount.php',
			beforeSend: function(XMLHttpRequest){
			  $("#checkid").html(''); 
			  $("#loading").show();
			  $("#mybtn").attr('disabled', true);
			},
			success:function(json, textStatus) {
						var exist = json.obj.user;
						 if(exist == "yes"){
							$("#checkid").html('<font color="#FF0000">此管理者帳號已存在請重新輸入</font>');  
							$("#mybtn").attr('disabled', true);
						  }else{
							$("#checkid").html('<font color="#0033FF">此管理者帳號可以使用</font>');  
							$("#mybtn").attr('disabled', false);
						  }
					},
			complete: function(XMLHttpRequest, textStatus){
			  $("#loading").hide();
			},
			error: function(xhr) {
			  alert('Ajax request 發生錯誤');
			}
		 	 });
			 
		   }
		 });
		 /*
	$("#HiddenInstr").hide();	 
	$("input[name='AM_Type']").click(function(){
		var tmp = $("input[name='AM_Type']:checked").val();
		if(tmp == 1)
			$("#HiddenInstr").hide();	 
		else
			$("#HiddenInstr").show();	 
		
	})
	*/
		
 	$("#mybtn").click(function(){
		
		 if($("#AM_Name").val()=='') {
					alert("請輸入姓名");
					$("#AM_Name").focus();
					return false;
	     }else if($("#AM_Account").val()=='') {
					alert("請填入帳號");
					$("#AM_Account").focus();
					return false;
	     }else if($("#AM_Pass").val()=='') {
					alert("請填入密碼");
					$("#AM_Pass").focus();
					return false;
	     }else if($("#AM_RePass").val()=='') {
					alert("請填入確認密碼");
					$("#AM_RePass").focus();
					return false;
	     }else if($("#AM_Pass").val()!=$("#AM_RePass").val()) {
					alert("確認密碼不相符");
					$("#AM_RePass").focus();
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
              <td height="30" class="content">系統設定 > 後台帳號管理 &gt; 新增帳號</td>
              </tr>
            <tr>
              <td height="10"></td>
             </tr>
            <tr>
              <td height="10">
                <span class="form_title">
                <input name="search" type="button" class="content" id="search" value="回上一頁" onclick="MM_goToURL('parent','admin.php');return document.MM_returnValue"/>
                </span></td>
              </tr>
            <tr>         
              <td>    
              <!--管理員管理startinging-->              
              <form name="form1" id="form1" method="post" action="admin_process.php">
			   <input type="hidden" name="action" id="action" value="new">
              <table width="750" border="0">
              <tr>
                  <td height="5"></td>
                </tr>
              	  <tr>
                  <td align="right" class="content">姓名：</td>
                  <td><input name="AM_Name" type="text" class="form_fix" id="AM_Name" /></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td width="115" align="right"  class="content">帳號：</td>
                  <td width="625">
                  <input name="AM_Account" type="text" class="form_fix" id="AM_Account" />&nbsp;&nbsp;<img src="../js/ajax-loader.gif"  id="loading" style="margin-left:4px;display:none;" ><span id="checkid"></span> 
                  </td>
                </tr>
                  <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">密碼：</td>
                  <td><input name="AM_Pass" type="password" class="form_fix" id="AM_Pass" /></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">確認密碼：</td>
                  <td><input name="AM_RePass" type="password" class="form_fix" id="AM_RePass" /></td>
                </tr>
                <!--                
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td align="right" class="content">帳號權限：</td>
                  <td class="content">
                  	<input name="AM_Type" type="radio" value="1" />最高
                     <input name="AM_Type" type="radio" value="2" checked="checked" />一般
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
                      <input name="mybtn" type="button" class="form_fix" id="mybtn"  value="確定送出"  /> 
                   </td>
                </tr>                
              </table>
              </form>
              <!--管理員管理 ending-->              
              </td>
            </tr>
          </table>
          </td>
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
