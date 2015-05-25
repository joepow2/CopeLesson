<?php 
include("login/public/mem_check.php");

//$CS_ID = $_GET["cs_id"];
$CH_ID = $_GET["ch_id"];

?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>我要教</title>
		<meta charset="utf-8">
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/sForm.js"></script>
		<script src="js/TMForm.js"></script>
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
			<?php include 'include/header.php'; ?>
		</header>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">Joe Chang, 2015!</div>
			<div class="container_12">
				<div class="grid_12">

					<h2>我要教:</h2>
					<p>&nbsp;</p>

					<form class="form-horizontal" method="post" action="process.php" enctype="multipart/form-data">
        				<input type="hidden" id="action" name="action" value="teach">
						<!-- <input type="hidden" id="CS_ID" name="CS_ID" value="<?php echo $CS_ID;?>"> -->
						<input type="hidden" id="CH_ID" name="CH_ID" value="<?php echo $CH_ID;?>">
        				<div class="form-group">
          					<label class="col-sm-2 control-label" for="">章節名稱</label>
          					<div class="col-sm-3">
            					<input type="text" class="form-control" id="CH_Name" name="CH_Name" placeholder="" required autofocus>
          					</div>
        				</div>
        				<div class="form-group">
          					<label class="col-sm-2 control-label" for="">上傳封面照片</label>
          					<div class="col-sm-4">
            					<input type="file" class="form-control" id="CH_Pic" name="CH_Pic" placeholder="" required autofocus>
          					</div>
        				</div>
        				<div class="form-group">
          					<label class="col-sm-2 control-label" for="">上傳章節影片</label>
          					<div class="col-sm-4">
            					<input type="file" class="form-control" id="CH_Video" name="CH_Video" placeholder="" required autofocus>
          					</div>
        				</div>
        				<div class="form-group">
          					<label class="col-sm-2 control-label" for="">輸入章節大綱</label>
          					<div class="col-sm-4">
          						<textarea class="form-control" rows="3" placeholder="" required autofocus id="CH_Content" name="CH_Content"></textarea>
          					</div>
        				</div>
        
        				<div class="form-group">
          					<div class="col-sm-offset-2 col-sm-3">
            					<button type="submit" class="btn btn-default">送出</button>
          					</div>
        				</div>
      				</form>

					<!-- <form id="form" method="post" action="process.php">
						<input type="hidden" id="action" name="action" value="teach">
						<input type="hidden" id="CS_ID" name="CS_ID" value="<?php echo $CS_ID;?>">
						<input type="hidden" id="CH_ID" name="CH_ID" value="<?php echo $CH_ID;?>">
						<div class="success_wrapper">
							<div class="success-message">上傳成功</div>
						</div>

						<label class="text">
						請輸入章節名稱: <br>
							<input type="text" placeholder="章節名稱：" data-constraints="@Required @Length(min=1,max=20)" id="CH_Name" name="CH_Name"/>
							<span class="empty-message">*此欄位不可為空</span>
							<span class="error-message">*This is not a valid name.</span>
						</label>

						<label class="">
						請上傳封面照片: <br>
							<input type="file" accept="image/*" id="CH_Pic" name="CH_Pic"/>
							<span class="empty-message">*此欄位不可為空</span>
							<span class="error-message">*This is not a valid image.</span>
						</label>

						<label class="">
						請上傳章節影片: <br>
							<input type="file" accept="video/*" id="CH_Video" name="CH_Video"/>
							<span class="empty-message">*此欄位不可為空</span>
							<span class="error-message">*This is not a valid video.</span>
						</label>


						<label class="message">
						<br><br>請輸入章節大綱: <br>
							<textarea placeholder="章節大綱：" data-constraints='@Required @Length(min=20,max=999999)' id="CH_Content" name="CH_Content"></textarea>
							<span class="empty-message">*此欄位不可為空</span>
							<span class="error-message">*The message is too short.</span>
						</label>

						<div>
							<div class="clear"></div>
							<div class="btns">
								
								<button type="submit" data-type="submit" name="loginbtn" id="loginbtn">送出</button>

							</div>
						</div>

					</form> -->
				</div>
			</div>
		</div>
		
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="copy">
						CopeLesson &copy; 2015 | <a href="#">Privacy Policy</a> <br> Website designed by <a href="https://www.facebook.com/wowJoepower" rel="nofollow">Joe Chang</a>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>