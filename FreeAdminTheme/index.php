<?php
  include("public/DBClass.php");
    $objDB = new DBClass();
  //include("../include/phpfunction.php");
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="../../assets/ico/favicon.ico">-->

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="public/LoginAuth.php" method="post" name="loginform" id="loginform">
        <h2 class="form-signin-heading">Please sign in</h2>
        <!--<input type="email" class="form-control" placeholder="Email address" required autofocus >-->
        <input type="text" class="form-control" placeholder="Account" required autofocus name="userid" id="userid">
        <input type="password" class="form-control" placeholder="Password" required name="password" id="password">
        <!--
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="loginbtn" id="loginbtn">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <!--
    <script language="JavaScript" type="text/JavaScript">
    $(function(){
      $("form#loginform input").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
          $("#loginbtn").click();
          return false;
        } else {
          return true;
        }
      });
  
      $("#loginbtn").click(function(){
        if($("#userid").val()=='') {
          alert("請輸入帳號");
          $("#userid").focus();
          return false;
        }else if($("#password").val()=='') {
          alert("請輸入密碼");
          $("#password").focus();
          return false;
        }else{
          $("form#loginform").submit();
        }
      })
    })
    </script>
    -->
  </body>
</html>
