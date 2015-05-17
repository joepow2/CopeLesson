<?php 
include_once("../public/mem_check.php");
include_once("../public/web_function.php");

if(!$_SESSION['MCH_LOGIN_ID'])
	{
		header("location:../index.php");
		exit;
	}	
/*
//下面是計算全部留言用的
$ALL_COUNT = $objDB->Recordset("SELECT * FROM admin where AM_Type='1' order by Create_date desc");
$ALL_WORDS = $objDB->RecordCount($ALL_COUNT);

//分頁選單用的
$ALL_PAGE=ceil($ALL_WORDS/$READ_MEMNUM); //計算所需頁數

//判斷頁數為數字
if(is_numeric(quotes($_GET['page_num']))){
	 $page_num = quotes($_GET['page_num']);
}else{
     $page_num = 0;
}

//依照帳號權限顯示內容
if(quotes($_GET['am_type'])){
	$am_type = quotes($_GET['am_type']);
	
	$rs = $objDB->Recordset("SELECT * FROM admin WHERE AM_Type = '$am_type' order by Create_date desc");
	$row = $objDB->GetRows($rs);
}else{
	$rs = $objDB->Recordset("SELECT * FROM admin order by Create_date desc");	
	$row = $objDB->GetRows($rs);
}
*/	
$rs = $objDB->Recordset("SELECT * FROM admin order by Create_date desc");	
$row = $objDB->GetRows($rs);			 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $html_title;?>後台帳號管理</title>
<script src="../js/common.js" language="javascript"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter/jquery-latest.js"></script> 
<script type="text/javascript" src="../js/jquery.tablesorter/jquery.tablesorter.js"></script> 
<script type="text/JavaScript">

function changed(theselect) {
	//var am_type = theselect.selectedIndex + 1 ;
	var am_type = $('#type_slt').val();
	window.location.href="admin.php?am_type="+am_type;
}

$(function() {  
			
	$("#mybtn").click(function(){
		
		var mycount = 0;
		$("input[class='checkitem']").each(function() { 
			if($(this).attr("checked")!=undefined){
				mycount = mycount+1;
			}
		});

		if(mycount>0){
			var result = confirm("確定要刪除嗎?");
			if (result==true) {
				$("form#frmGroupudp").submit();
			}
		}else{
			alert("請勾選會員。");
		}
		
	}) 
	
	$("#checkAll").click(function() {
	
		if($("#checkAll").attr("checked")){
			$("input[class='checkitem']").each(function() { 
				$(this).attr("checked", true);
			});
		}else{
			$("input[class='checkitem']").each(function() { 
				$(this).attr("checked", false);
			});           
		}
		   
	});	     
		
});
/*
$(document).ready(function(){ 
	$("#myTable").tablesorter({ 
        // pass the headers argument and assing a object 
        headers: { 
            // assign the secound column (we start counting zero) 
            5: { 
                // disable it by setting the property sorter to false 
                sorter: false 
            }
        } 
    }); 
});    	
*/
</script>
<!--<link href="../js/jquery.tablesorter/themes/blue/style.css" rel="stylesheet" type="text/css" />-->
<link href="../css/backend.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><!-- header starting point -->
        <?php include("../include/header.php");?>
        <!-- header ending point -->
    </td>
  </tr>
  <tr>
    <td valign="top"><table width="1100" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="160" valign="top" background="../images/bkline.jpg">
        <!--menu starting point-->
        <?php include("../include/menu.php");?></td>
        <!--menu ending point-->
        <td width="10" valign="top"><img src="../images/spacer.gif" width="10" height="1" /></td>
        <td width="930" valign="top"><table width="830" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" class="content">系統設定 &gt; 後台帳號管理</td>
          </tr>
          <tr>
            <td height="10" class="content_red_b"><img src="../images/spacer.gif" width="1" height="1" /></td>
          </tr>
          <tr>
            <td valign="top">
               <table width="825" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>
                        <table width="830" height="25" border="0" cellpadding="0" cellspacing="0">
                        <!--<tr>
                        <td><?php //include ("../include/searchBar.php");?></td>
                        </tr>
                        <tr>
            				<td height="10" class="content"></td>
       					  </tr>-->
                          <tr>
                            <td width="218" height="30">
                            <input name="button3" type="button" class="content" id="button3" onclick="MM_goToURL('parent','add_admin.php');return document.MM_returnValue" value="新增帳號" />
                            </td>
                          </tr>                  
                          <tr>
            					<td height="10" class="content"></td>
       					  </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td>
                    	 <form name="frmGroupudp" id="frmGroupudp" method="post" action="admin_process.php">
                      <!--<input name="action" type="hidden" id="action" value="delall" />-->                      
                      <table width="830" height="55" border="0" cellpadding="1" cellspacing="1" bordercolor="#777777" bgcolor="#555555">                      
                        <tr>                        
                          <!--<td width="22"  align="center" bgcolor="#898989"><input type="checkbox" id="checkAll"/></td>-->
                          <td width="148" align="center" bgcolor="#898989" class="back_w"><a href="#">姓名</a></td>
                          <td width="148" align="center" bgcolor="#898989" class="back_w"><a href="#">帳號</a></td>
                          <td width="176" align="center" bgcolor="#898989" class="back_w"><a href="#">創立時間</a></td>
                          <td width="177" align="center" bgcolor="#898989" class="back_w"><a href="#">最近一次登入</a></td>
                          <td width="165" align="center" bgcolor="#898989" class="back_w"><a href="#">功能操作</a></td>                    
                        </tr>                       
                        <?php for($i=0;$i<$objDB->RecordCount($rs);$i++){?>
                        <?php if($i%2==0){$bgcolor="#EBEBEB";}else{$bgcolor="#FFFFFF";}?>
                        <tr>
                        	 <!--<td height="25" align="center" bgcolor="<?php echo $bgcolor;?>" class="content">
                          <input type="checkbox" name="adm_del[]" value="<?php echo $row[$i]["AM_ID"];?>" class="checkitem"  />
                          </td>-->                          
                          <td align="center" bgcolor="<?php echo $bgcolor;?>" class="content"><?php echo $row[$i]["AM_Name"]; ?></td>
                          <td align="center" bgcolor="<?php echo $bgcolor;?>" class="content"><?php echo $row[$i]["AM_Account"]; ?></td>
                          <td align="center" bgcolor="<?php echo $bgcolor;?>" class="content"><?php echo $row[$i]["Create_date"]; ?> </td>
                          <td align="center" bgcolor="<?php echo $bgcolor;?>" class="content"><?php echo $row[$i]["Last_login"]; ?> </td>
                          <td align="center" bgcolor="<?php echo $bgcolor;?>" class="content">
                        <input name="button2" type="button" class="login" id="button2" onclick="MM_goToURL('parent','md_admin.php?am_id=<?php echo $row[$i]["AM_ID"]; ?>');return document.MM_returnValue" value="修改" />
                        <input name="button4" type="button" class="login" id="button4" value="刪除" onclick="if(confirm('確定要刪除此筆資料嗎?'))MM_goToURL('parent','admin_process.php?action=del&am_id=<?php echo $row[$i]["AM_ID"]; ?>');return document.MM_returnValue"  
						  />
                         	 </td>
                        </tr>
                        <?php }?>                        
                        <?php if($objDB->RecordCount($rs)==0){?>
                        <div align="center" style="margin-top:5px">無管理者資料！</div>
                        <?php }?>
                      </table>
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <table width="830" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                  	  <td width="830">&nbsp;</td>
                    </tr>
                    <!--
                	  <tr>
                  	  <td align="center">
                       <input name="mybtn" type="button" class="form_fix" id="mybtn"  value="刪除"  />                        
                  	  </td>
                    </tr>
                    -->  
                    </table>
                    </td>
                  </tr>
                </table>              
                </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><img src="../images/spacer.gif" width="1" height="1" /></td>
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
