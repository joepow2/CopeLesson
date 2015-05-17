<script type="text/JavaScript">

function CheckForm1(){
	if(document.form1.searchVal.value==""){
		alert("請輸入搜尋關鍵字喔!!");
		document.form1.searchVal.focus();
		return false;
	}
	else
		return true;
} 	

</script>
<form name="form1" id="form1" method="post" action="result.php" style="border:none;float:left" onsubmit="return CheckForm1()">
      <input name="searchVal" type="text" class="content"  placeholder="姓名 / 帳號"/>
      <input type="hidden" name="searchType">
      <input name="button6" type="submit"  id="button6" value="搜尋" class="content"  />
</form>