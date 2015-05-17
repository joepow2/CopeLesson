<script >
function CheckForm1()
{
if(document.form1.searchVal.value=="")
{
alert("您尚未填寫會員名稱或會員帳號或電子郵件喔!!");
document.form1.searchVal.focus();
return false;
}

else
return true;
} 	

</script>
<div>
  <form name="form1" id="form1" method="post" action="order_result.php" style="border:none;float:left;" onsubmit="return CheckForm1()">
     輸入會員名稱或會員帳號或電子郵件:<input name="searchVal" type="text" class="content" id="textfield2" />
    <input type="submit"  class="content"  value="搜尋" />
  </form>
  

</div>