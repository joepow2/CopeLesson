<?php 
include("include/DBClass.php");
$objDB = new DBClass();
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>課程列表</title>
		<meta charset="utf-8">
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/sForm.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->
		</head>
	<body class="" id="top">
<!--==============================header=================================-->
		<header>
			<?php include "include/header.php" ?>
		</header>
<!--==============================Content=================================-->
		<?php 
			$rs = $objDB->Recordset("SELECT * FROM course ORDER BY CS_ID");
			$row = $objDB->GetRows($rs);
		?>
		<div class="content"><div class="ic">Joe Chang, 2015!</div>
			<?php for($i=0;$i<$objDB->RecordCount($rs);$i++){?>
			<div class="container_12">
				<div class="grid_6">
					<h2><?php echo $row[$i]['CS_Name'];?></h2>
					<img height="250" src="<?php echo 'backend/course/pic/'. $row[$i]['CS_Pic'];?>" alt="" class="img_inner fleft">
					<div class="extra_wrapper">
						<p class="col2"><!-- <a href="#">課程：網路行銷</a> --></p>
						<?php echo $row[$i]['CS_Content'];?>
						<br>
						<a href="course-listdetail.php?cs_id=<?php echo $row[$i]['CS_ID'];?>" class="btn">課程詳情</a>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
		
<!--==============================footer=================================-->
		<footer>
			<?php include "include/footer.php"; ?>
		</footer>
	</body>
</html>