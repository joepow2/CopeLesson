<?php
//+++++++++++++各功能選項定義++++++++++++++++//


//ini_set('display_errors', 'On');
//error_reporting(E_ALL);

/* ==[ NEWS新聞發布區塊 news_list.php]== */ 
  $READ_NEWSNUM="10" ;  //新聞發布每頁分頁筆數
   
  $NEWS_THUMB_WIDTH_01 = 100; //新聞縮圖寬
  $NEWS_THUMB_HEIGHT_01 = 1000; //新聞縮圖高
  
  $FCK_InnerWidth = 600; //FCKeditor內頁圖片最大寬
  $FCK_InnerHeight = 1000; //FCKeditor內頁圖片最大高

/* ==[產品類別設定cm_list.php]== */ 
  $READ_CMNUM="20" ; //產品類別每頁分頁筆數
  $CM_THUMB_WIDTH_01 = 147; //產品類別縮圖寬
  $CM_THUMB_HEIGHT_01 = 104; //產品類別縮圖高

/* ==[產品列表設定product_list.php]== */ 
  $READ_PDTNUM="40" ; ; //產品列表每頁分頁筆數
  $P_THUMB_WIDTH_01 = 200; //產品維護-最新產品-縮圖寬
  $P_THUMB_HEIGHT_01 = 200; //產品維護-最新產品-縮圖高
  

/* ==[會員管理mem_list.php]== */  
  $READ_MEMNUM="10" ;  //會員列表每頁分頁筆數



/* ==[會員管理 - 留言列表msg_list.php]== */  
$READ_MSGNUM="10" ;  //留言列表每頁分頁筆數


/* ==[訂單管理order_list.php]== */  
 $READ_ODNUM = "40";
 
//上傳路徑 "PHOTOS/"
$MAINTAIN_THUMB_WIDTH_01 = 300; //產品圖 大張縮圖寬(產品規格內) -只限定寬
$MAINTAIN_THUMB_HEIGHT_01 = 300;//產品圖 大張縮圖高(產品規格內)- 高不限
 


//+++++++++++++++++++++++++++++++++++++++++//

//防止sql注入
function quotes($content){
	if (!get_magic_quotes_gpc()) {
	  if (is_array($content)) {
		  foreach ($content as $key=>$value) {
			  $content[$key] = addslashes($value);
		  }
	  } else {
		  $content = addslashes($content);
	  }
	}
	return $content;
}

function CutWords($sourcestr,$cutlength){
	$returnstr = '';
	$i = 0;
	$n = 0;
	$str_length = strlen(strip_tags($sourcestr));
	$mb_str_length = mb_strlen(strip_tags($sourcestr),'utf-8');
	while(($n < $cutlength) && ($i <= $str_length)){
		$temp_str = substr(strip_tags($sourcestr),$i,1);
		$ascnum = ord($temp_str);
		if($ascnum >= 224){
			$returnstr = $returnstr.substr(strip_tags($sourcestr),$i,3);
			$i = $i + 3;
			$n++;
		}elseif($ascnum >= 192){
			$returnstr = $returnstr.substr(strip_tags($sourcestr),$i,2);
			$i = $i + 2;
			$n++;
		}elseif(($ascnum >= 65) && ($ascnum <= 90)){
			$returnstr = $returnstr.substr(strip_tags($sourcestr),$i,1);
			$i = $i + 1;
			$n++;
		}else{
			$returnstr = $returnstr.substr(strip_tags($sourcestr),$i,1);
			$i = $i + 1;
			$n = $n + 0.5;
		}
	}
	if ($mb_str_length > $cutlength){
		$returnstr = $returnstr . "..";
	}
	return $returnstr;
}

//計算分頁function
// $ALL_PAGE所有分頁數目  $page_num頁數
function PageCount($ALL_PAGE,$page_num){
          for($i=1;$i<=$ALL_PAGE;$i++)  {
           $selected=($i==$page_num)?"selected":"";  
           echo  "<option value=".$_SERVER['PHP_SELF']."?page_num=$i  $selected>第".$i."頁</option>"; 
             }    
}	

// $ALL_PAGE所有分頁數目  $page_num頁數 $Category類別名稱 $ID 參數
function PageCountType($ALL_PAGE,$page_num,$Category,$ID){
          for($i=1;$i<=$ALL_PAGE;$i++)  {
           $selected=($i==$page_num)?"selected":"";  
           echo  "<option value=".$_SERVER['PHP_SELF']."?page_num=$i&$Category=$ID  $selected>第".$i."頁</option>"; 
             }    
}


function ckselect($str1,$str2) {
	if($str1==$str2) {
		return 'selected';
	}
	return '';
}

function ckRadio($str1,$str2) {
	if($str1==$str2) {
		return 'checked="checked"';
	}
	return '';
}

function ckbox($str1,$strarray) {
			if(in_array($str1,$strarray)) {
				return 'checked="checked"';
			}
			return '';
		 }
		 
function dateDiff($startTime, $endTime) {
    $start = strtotime($startTime);
    $end = strtotime($endTime);
    $timeDiff = $end - $start;
    return floor($timeDiff / (60 * 60 * 24));
}

//檔案壓縮功能

/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false,$nfile = array()) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		$i = 0;
		foreach($valid_files as $file) {
			//sibu Added
			//$new_filename = substr($file,strrpos($file,'/') + 1);
			//$file = iconv("UTF-8","big5",$file);   
			//$nfile[$i] = iconv("UTF-8","big5",$nfile[$i]);   
			//$zip->addFile($file,$file);
			//$nfile[$i] =  mb_convert_encoding($nfile[$i],"big5","utf8");
			$zip->addFile($file,$nfile[$i]);
			$i++;
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
		//close the zip -- done!
		$zip->close();
		
		//check to make sure the file exists
		return file_exists($destination);
	} 
	else
	{                                                                          
		return false;
	}
}


//檔案下載功能
function dl_file($file,$nfile=''){

   //檢查檔案是否存在
   if (!is_file($file)) { die("404 File not found!"); }

   //取得檔案相關資料
   $len = filesize($file);
   $filename = basename($file);
   $file_extension = strtolower(substr(strrchr($filename,"."),1));

   //將檔案格式設定為將要下載的檔案
  switch( $file_extension ) {
     case "pdf": $ctype="application/pdf"; break;
     case "exe": $ctype="application/octet-stream"; break;
     case "zip": $ctype="application/zip"; break;
     case "doc": $ctype="application/msword"; break;
     case "xls": $ctype="application/vnd.ms-excel"; break;
     case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
     case "gif": $ctype="image/gif"; break;
     case "png": $ctype="image/png"; break;
     case "jpeg":
     case "jpg": $ctype="image/jpg"; break;
     //case "mp3": $ctype="audio/mpeg"; break;
	 case "mp3": $ctype="application/octet-stream"; break;
	 case "m4r": $ctype="application/octet-stream"; break;
	
	
     case "wav": $ctype="audio/x-wav"; break;
     case "mpeg":
     case "mpg":
     case "mpe": $ctype="video/mpeg"; break;
     case "mov": $ctype="video/quicktime"; break;
     case "avi": $ctype="video/x-msvideo"; break;
     //禁止下面幾種類型的檔案被下載
     case "php":
     case "htm":
     case "html":
     case "txt": die("Cannot be used for ". $file_extension ." files!"); break;

     default: $ctype="application/force-download";
   }
   
   require_once 'phpUserAgent.php';
   require_once 'phpUserAgentStringParser.php';
   
   $userAgent = new phpUserAgent();
   $ua = $userAgent->getBrowserName();     
   $version = $userAgent->getBrowserVersion();
   
   //開始編寫header
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public");
   header("Content-Description: File Transfer");
   
   
   if($ua == 'msie' &&  $version == '8.0' && $file_extension =='zip'){ 
   	   header("Content-Encoding: gzip");
   }
    
 
   //使用利用 switch判別的檔案類型
   header("Content-Type: $ctype");

   //執行下載動作 改名
   if($nfile==''){
	   $header="Content-Disposition: attachment; filename=".$filename;
   }else{
	   $header="Content-Disposition: attachment; filename=".$nfile;
   }
   
   header($header);
   
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: ".$len);
   ob_end_clean();
   @readfile($file);
   exit;
}

	if(!session_id())
	{
	  @session_start();
	}

?>