<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
 

  <title>متابعة حالة الطلب</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <?php include_once('includes/header.php');?>

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.php" href="#hero">الرئيسية</a></li>
            <li></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <form class="cmxform form-horizontal" method="post" action="" name="search">
                                   
                                    
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-12" style="font-weight: bolder;padding-bottom: 10px;">بحث عن طريق رقم الطلب / اسم المريض / رقم الهاتف:</label>

                                        <div class="col-lg-6">
                                            <input type="text" name="searchdata" id="searchdata" autocomplete="off" placeholder="ابحث هنا" class="form-control" value="" required="true">
                                        </div>
                                    </div>
                                    <br>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="search">بـــــــــــــــحـــــــــــث</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                                <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  
<div class="panel-heading">
   
         نتائج البحث عن"<?php echo $sdata;?>" </div>

      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>

       <thead>
           <tr>
            <th data-breakpoints="xs">الرقم</th>
            <th>رقم الطلب</th>
            <th>اسم المريض</th>
            <th>رقم احد الاقارب</th>
            <th>زمن وتاريخ الحجز</th>
            <th>تاريخ الطلب</th>
            <th>حالة الطلب</th>
            <th data-breakpoints="xs">العملية</th>
          </tr>
        </thead>
          
         <?php
       
$ret=mysqli_query($con,"select * from  tblambulancehiring where (tblambulancehiring.BookingNumber like '%$sdata%' || tblambulancehiring.PatientName  like '%$sdata%' || tblambulancehiring.RelativeConNum like '%$sdata%') ");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
        
        <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['BookingNumber'];?></td>
              <td><?php  echo $row['PatientName'];?></td>
                  <td><?php  echo $row['RelativeConNum'];?></td>
                  <td><?php  echo $row['HiringDate'];?> : <?php  echo $row['HiringTime'];?></td>
                  <td><?php  echo $row['BookingDate'];?></td>

                                   <td> <?php   $pstatus=$row['Status'];  
                 if($pstatus==""){ ?>
<span>جديد</span>
 <?php } elseif($pstatus=="Assigned"){ ?>
<span } >تم تخصيص سيارة</span>
 <?php } elseif($pstatus=="On the way"){ ?>
<span >السيارة في طريقها اليك</span>
 <?php } elseif($pstatus=="Pickup"){ ?>
<span>تم اخذ المريض</span>
 <?php } elseif($pstatus=="Reached"){ ?>
<span>تم إيصال المريض للمستشفي</span>
 <?php } elseif($pstatus=="Rejected"){ ?>
<span>تم رفض الطلب</span>

<?php } ?>
</td>
                  <td><a href="booking-details.php?id=<?php echo $row['ID'];?>&&bookingnum=<?php echo $row['BookingNumber'];?>" class="btn btn-primary">عرض</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}} else {?>
<tr>
  <td colspan="9" style="color:red">لم يتم العثور علي اي سجلات</td>
</tr>

<?php } ?>  
 </tbody>
            </table>
            <?php } ?>
      </div>
    </section>

  </main><!-- End #main -->
<br><br>
<?php include_once('includes/footer.php');?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>