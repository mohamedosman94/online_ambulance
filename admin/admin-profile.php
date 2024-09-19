<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['eahpaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    echo "<script>alert('تم تحديث ملفك الشخصي بنجاح');</script>";
echo "<script type='text/javascript'> document.location = 'admin-profile.php'; </script>";
  }
  else
    {
      echo "<script>alert('حدث خطأ ما ، حاول مرة اخري');</script>";
    }
  }
  ?>

<!DOCTYPE html>
<head>
<title>المدير |  الملف الشخصي </title>

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
                            الملف الشخصي للمدير
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                               

   <?php
$adminid=$_SESSION['eahpaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <div class="form-group ">
                                        <div class="col-lg-6">
									 <p style="text-align: center;padding-left:20px;"><label for="adminname" >اسم المدير</label></p>

                                     <p style="text-align: center;padding-left:200px;"> <input class=" form-control" id="adminname" name="adminname" type="text" autocomplete="off" value="<?php  echo $row['AdminName'];?>"></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
									<p style="text-align: center;padding-left:20px;"><label for="lastname">اسم المستخدم</label></p>

                                     <p style="text-align: center;padding-left:200px;"> <input class=" form-control" id="username" name="username" type="text" value="<?php  echo $row['UserName'];?>" required="true" readonly='true'></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
									  <p style="text-align: center;padding-left:20px;"><label for="username" >رقم الهاتف</label></p>

                                     <p style="text-align: center;padding-left:200px;"><input class="form-control " id="contactnumber" name="contactnumber" type="text" autocomplete="off" value="<?php  echo $row['MobileNumber'];?>" required="true">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <div class="col-lg-6">
			                          <p style="text-align: center;padding-left:20px;"><label for="email">البريد الإلكتروني</label></p>

                                           <p style="text-align: center;padding-left:200px;"> <input class="form-control " id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
                                        </div>
                                    </div>
                                    <?php } ?>
                        
                                  

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: left;padding-left:80px;"> <button class="btn btn-primary" type="submit" name="submit">تحديث</button></p>
                                           
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