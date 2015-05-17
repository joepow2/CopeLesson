<div id="menulist" class="arrowlistmenu">
<?php
//if(in_array("APP",$_SESSION['MCH_LOGIN_PERMIT'])){
?>
<!--
<div class="headerbar" id="menu-member">首頁</div>
	<ul>
    	<li><a href="../slide/slide-list.php">Photo Slide Show</a></li>
        <li><a href="../metro/metro-list.php">動態磚</a></li>
    </ul> 
-->
<div class="headerbar" id="menu-member">Menu-bar</div>
	<ul>
    	<!--
    	<li><a href="../about/about-list.php">關於醫師</a></li>
        <li><a href="../center/center-list.php">中心介紹</a></li>
        <li><a href="../orthognathic/orthognathic-list.php">正顎</a></li>
        <li><a href="../contouring/contouring-list.php">削骨</a></li>
        <li><a href="../revision/revision-list.php">二次修正手術</a></li>
        <li><a href="../facial/facial-list.php">臉型設計手術</a></li>
        <li><a href="../case/case-list.php">手術案例</a></li>
        <li><a href="../FAQ/FAQ-list.php">常見問題</a></li>
        <li><a href="../consultation/consultation-list.php">諮詢問題</a></li>
        -->
        <li><a href="../news/news-list.php">媒體新訊</a></li>
    </ul> 
<?php
//}
?>
<?php 
//if($_SESSION['MCH_LOGIN_TYPE'] == 1){ 
?>
<!--
<div class="headerbar" id="menu-member">會員管理</div>
	<ul>
    	<li><a href="../member/member-list.php">會員帳號管理</a></li>
	</ul>  
--> 
<?php 
//} 
?>  
<?php if($_SESSION['MCH_LOGIN_TYPE'] == 1){ ?>
<div class="headerbar" id="menu-member">系統設定</div>
	<ul>    	
    	<li><a href="../admin/admin.php">後台帳號管理</a></li>
        <!--<li><a href="../keyword/keyword-list.php">關鍵字管理</a></li>-->
	</ul> 
<?php } ?>
</div>    