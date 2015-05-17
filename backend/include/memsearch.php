<script type="text/JavaScript">
function CheckForm1()
{
if(document.form1.searchVal.value=="")
{
alert("您尚未填寫會員名稱或會員帳號喔!!");
document.form1.searchVal.focus();
return false;
}

else
return true;
} 	
</script>
<form name="form1" id="form1" method="post" action="mem_result.php" style="border:none;float:left" onsubmit="return CheckForm1()">
            帳號搜尋 : 請輸入電子郵件: 
              <input name="searchVal" type="text" class="content"  />
              <input type="hidden" name="searchType">
              <input name="button6" type="submit"  id="button6" value="搜尋" class="content"  />
             </form>