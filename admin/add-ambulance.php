<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $ambulancetype = $_POST['ambulancetype'];
    $ambregnum = $_POST['ambregnum'];
    $dname = $_POST['dname'];
    $dconnum = $_POST['dconnum'];
    $ret=mysqli_query($con, "select AmbRegNum from tblambulance where AmbRegNum='$ambregnum'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo "<script>alert('السيارة مسجلة بالفعل لدينا');</script>";
    }
    else{
     
    $query=mysqli_query($con, "insert into tblambulance(AmbulanceType,AmbRegNum,DriverName,DriverContactNumber) value('$ambulancetype','$ambregnum','$dname','$dconnum')");
    if ($query) {
   
    echo "<script>alert('تم إضافة السيارة بنجاح');</script>";
echo "<script type='text/javascript'> document.location = 'add-ambulance.php'; </script>";
  }
  else
    {

      echo "<script>alert('حدث خطأ ما ، حاول مره اخري');</script>";
    }
}
  
}
  ?>

<!DOCTYPE html>

<head>
<title>إضافة سيارة جديدة </title>

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
                            إضافة سيارة اسعاف جديدة
                            <span class="tools pull-right">
							
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>

                        <div class="panel-body">
						  <div class="texter">
                            <div class="form">
                                

                                <form class="cmxform form-horizontal " method="post" action="">
                                    <div class="form-group">
                                        <label for="adminname">أنواع السيارات</label>
                                        <div class="col-lg-6">
                                            
                                            <select  name="ambulancetype" id="ambulancetype" class=" form-control">
                <option value="">اختر النوع</option>
                <option value="1">سيارات الإسعاف الأولية: توفر هذه السيارات الرعاية الطبية الأساسية</option>
                <option value="2">سيارات الإسعاف المتقدمة: توفر هذه السيارات الرعاية الطبية الطارئة</option>
                <option value="3">سيارات الإسعاف الجوي: تُستخدم هذه السيارات لنقل المرضى إلى المستشفيات أو مراكز الرعاية الطبية الأخرى</option>
                
               
              </select>
                                        </div>

                                    </div>
                                     <div class="form-group ">
                                        <label for="adminname" >رقم اللوحة</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="ambregnum" name="ambregnum" type="text" autocomplete="off" required="true" value="">
                                            
                                        </div>
                                        
                                    </div>
                                     <div class="form-group ">
                                        <label for="adminname" >اسم السائق</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="dname" name="dname" type="text" autocomplete="off" required="true" value="">
                                            
                                        </div>
                                        
                                    </div>
                                     <div class="form-group ">
                                        <label for="adminname" >رقم السائق</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="dconnum" name="dconnum" type="text" autocomplete="off" required="true" value="" maxlength="10" pattern="[0-9]+">
                                            
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">إضافة</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                           <div>
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