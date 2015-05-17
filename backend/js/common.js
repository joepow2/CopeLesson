function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function chk_data() {
     if ( find.searchtext.value == "" ) {
	alert("您是不是忘了輸入關鍵字？");
	find.searchtext.focus();
	}else {
		alert("開始搜尋！");
		 return true ;
	} 
         return false;
  }

function IsEmail(strEmail) {
  var objRe = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
  if(objRe.test(strEmail)) return true;
  alert("E-mail 格式不正確");
  return false;
}


function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

//限制輸入浮點數
function ValidateFloat(e, pnumber){  
	if (!/^\d+[.]?\d*$/.test(pnumber)) { 
	$(e).val(/^\d+[.]?\d*/.exec($(e).val())); 
	}   
	 return false;
}
//限制輸入整數
function ValidateNumber(e, pnumber){ 
	if (!/^\d+$/.test(pnumber))    { 
	e.value = /^\d+/.exec(e.value); 
	} 
	return false;
} 

//限制數字
function numberChcek (e, pnumber) {
    if (!/^\d+$/.test(pnumber))    { 
		e.value = /^[+|-]?\d*\.?\d*$/.exec(e.value); 
	} 
	return false;
 }
//-->