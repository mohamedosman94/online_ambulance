<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('تم تغيير كلمة السر بنجاح');</script>";
session_destroy();
   }
  
  }
  ?>


<!DOCTYPE html>
<html dir="rtl">
<head>
<title>إعادة ضبط كلمة السر</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="assets/js/modernizr.min.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('كلمة المرور وتأكيد كلمة المرور غير متطابقين');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2 style="color:white">المدير |  استعادة كلمة المرور</h2>
		<form action="" method="post" name="changepassword" onsubmit="return checkpass();">
			
			<input class="ggg" type="password" required="true" autocomplete="off" name="newpassword" placeholder="كلمة المرور الجديدة">
      <input class="ggg" type="password" name="confirmpassword" autocomplete="off" required="true" placeholder="تأكيد كلمة المرور">
			
			
			
				<div class="clearfix"></div>
				<input type="submit" value="موافق" name="submit">
		</form>
		<p><a href="login.php" style="color:white;">تسجيل الدخول</a></p>
		 <p class="mb-1">
   
     <i class="fa fa-home" aria-hidden="true" style="color:indigo;"><a href="../index.php" style="color:yellow;">الصفحة الرئيسية</a></i>
      </p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
