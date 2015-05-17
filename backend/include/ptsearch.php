<script >
function CheckForm1()
{
if(document.form1.searchVal.value=="")
{
alert("您尚未填寫產品名稱喔!!");
document.form1.searchVal.focus();
return false;
}

else
return true;
} 	

function CheckForm2()
{
if(document.form2.searchVal.value=="")
{
alert("您尚未填寫貨品編號喔!!");
document.form2.searchVal.focus();
return false;
}

else
return true;
} 
</script>			
                
                <form name="form1" id="form1" method="post" action="product_result.php" style="border:none;float:left" onsubmit="return CheckForm1()">
                產品名稱
                <input name="searchVal" type="text" class="content"  />
                <input type="hidden" name="searchType" value="P_Name">
             	<input type="submit" class="content" value="搜尋" />
                </form>
                <form name="form2" id="form2" method="post" action="product_result.php" style="border:none;float:left" onsubmit="return CheckForm2()">
　         	    貨品編號
                <input name="searchVal" type="text" class="content"/>
                <input type="hidden" name="searchType" value="P_GoodsNo">
                <input type="submit" class="content" value="搜尋" />
                 </form>
                 