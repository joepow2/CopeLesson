<?php
    include_once("login/public/web_function.php");
	include_once("login/public/mem_check.php");
	
	$action = $_REQUEST["action"];
	switch ($action) {
		case "teach":	
		
		//$BookId = $objDB->GetMaxID('BookId','book',3);
		$MB_ID = $_SESSION['CPL_LOGIN_ID'];
		//$CS_ID = quotes($_POST["CS_ID"]);
		$CH_ID = quotes($_POST["CH_ID"]);

		$CH_Name = quotes(trim($_POST["CH_Name"]));
		if($_FILES["CH_Pic"]["size"] > 0)
		{					
			if (false !== $pos = strripos($_FILES["CH_Pic"]["name"], '.')) {
    			$extension = substr($_FILES["CH_Pic"]["name"], $pos+1, strlen($_FILES["CH_Pic"]["name"]));
			}
			$PhotoName = $CH_ID . "." . $extension;
			move_uploaded_file($_FILES["CH_Pic"]["tmp_name"],"backend/chapter/pic/".$PhotoName);
		}
		$CH_Pic = $PhotoName;

		if($_FILES["CH_Video"]["size"] > 0)
		{					
			if (false !== $pos = strripos($_FILES["CH_Video"]["name"], '.')) {
    			$extension = substr($_FILES["CH_Video"]["name"], $pos+1, strlen($_FILES["CH_Video"]["name"]));
			}
			$VideoName = $CH_ID . "." . $extension;
			move_uploaded_file($_FILES["CH_Video"]["tmp_name"],"backend/chapter/video/".$VideoName);
		}
		$CH_Video = $VideoName;

		$CH_Content = quotes($_POST["CH_Content"]);			
			
		$CH_Date = date("Y-m-d H:i:s");	
		
		$sql = "UPDATE chapter SET MB_ID='$MB_ID', CH_Name='$CH_Name', CH_Content='$CH_Content', CH_Pic='$CH_Pic', CH_Video='$CH_Video', CH_Content='$CH_Content', CH_Date='$CH_Date' WHERE CH_ID = '$CH_ID'";
		$objDB->Execute($sql);

?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script language="javascript">
			alert('登記成功!');
			location.href='course-list.php';
		</script>
<?php
		break;
		
		case "mdy":	
		$BookId = quotes($_POST["BookId"]);
		$Title = quotes($_POST["Title"]);
		$AuthorName = quotes(trim($_POST["AuthorName"]));
		$PublisherName = quotes(trim($_POST["PublisherName"]));

		$TPEL01_copies = quotes($_POST["TPEL01_copies"]);
		$TPEL02_copies = quotes($_POST["TPEL02_copies"]);
		$TPEL03_copies = quotes($_POST["TPEL03_copies"]);
		$TPEL04_copies = quotes($_POST["TPEL04_copies"]);
		$TPEL05_copies = quotes($_POST["TPEL05_copies"]);
		$TPEL06_copies = quotes($_POST["TPEL06_copies"]);	
		
		$sql = "UPDATE book SET Title='$Title',AuthorName='$AuthorName',PublisherName='$PublisherName' WHERE BookId='$BookId'";			
		$objDB->Execute($sql);

		$objDB->Execute("UPDATE book_copies SET Copies='$TPEL01_copies' WHERE BookId='$BookId' AND BranchId='TPEL01'");
		$objDB->Execute("UPDATE book_copies SET Copies='$TPEL02_copies' WHERE BookId='$BookId' AND BranchId='TPEL02'");
		$objDB->Execute("UPDATE book_copies SET Copies='$TPEL03_copies' WHERE BookId='$BookId' AND BranchId='TPEL03'");
		$objDB->Execute("UPDATE book_copies SET Copies='$TPEL04_copies' WHERE BookId='$BookId' AND BranchId='TPEL04'");
		$objDB->Execute("UPDATE book_copies SET Copies='$TPEL05_copies' WHERE BookId='$BookId' AND BranchId='TPEL05'");
		$objDB->Execute("UPDATE book_copies SET Copies='$TPEL06_copies' WHERE BookId='$BookId' AND BranchId='TPEL06'");
?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
		<script language="javascript">
			alert('修改成功!');
			location.href='book-list.php';
		</script>	
<?php
		break;
	
		case "del":
		$BookId = quotes(trim($_REQUEST["BookId"]));
			
		$objDB->Execute("DELETE FROM book WHERE BookId ='$BookId'");
		$objDB->Execute("DELETE FROM book_copies WHERE BookId ='$BookId'");
		$objDB->Execute("DELETE FROM book_authors WHERE BookId ='$BookId'");
		$objDB->Execute("DELETE FROM book_loans WHERE BookId ='$BookId'");

?>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script language="javascript">
			alert('刪除完畢!');
			location.href="book-list.php";
		</script>
<?php
		
		break;
	
	}	
	
?>
