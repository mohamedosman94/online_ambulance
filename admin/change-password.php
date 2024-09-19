<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['eahpaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
echo '<script>alert("تم تغيير كلمة السر بنجاح")</script>'; 
} else {

echo '<script>alert("كلمة السر الحالية غير صحيحة")</script>';
}



}

  
  ?>




<!DOCTYPE html>
<head>
<title>المدير | تغيير كلمة السر  </title>

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
<script src="js/jquery2.0.3.min.js"></script>
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
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            
          
            <div class="row">
                <div class="col-lg-12">
                  
                    <section class="panel">
                        <header class="panel-heading">
                            تغيير كلمة المرور
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
              

                                <form class="cmxform form-horizontal " method="post" action="" name="changepassword" onsubmit="return checkpass();">
                                    <div class="form-group ">
                                        <div class="col-lg-6">
										    <p style="text-align: center;padding-left:20px;"><label for="adminname">:كلمة المرور الحالية</label></p>

                                            <p style="text-align: center;padding-left:200px;"><input type="password" name="currentpassword" autocomplete="off" class=" form-control" required= "true" value=""></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
										   <p style="text-align: center;padding-left:20px;"><label for="lastname">:كلمة المرور الجديدة</label></p>

                                           <p style="text-align: center;padding-left:200px;"><input type="password" name="newpassword" autocomplete="off" class="form-control" value=""></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
										   <p style="text-align: center;padding-left:20px;"><label for="username">:تأكيد كلمة المرور</label></p>

                                           <p style="text-align: center;padding-left:200px;"> <input type="password" name="confirmpassword" autocomplete="off" class="form-control" value=""></p>
                                        </div>
                                    </div>
                                   
                                  
                        
                                  

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: left;left;padding-left:80px;"> <button class="btn btn-primary" type="submit" name="submit">تغيير</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>

</section>
 <!-- footer -->
		  <?php include_once('includes/footer.php');?>    
  <!-- / footer -->
</section>

</section>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>