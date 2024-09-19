<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
 

  <title>متابعة حالة الطلب</title>


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
          <h2>متابعة حالة الطلب</h2>
          <ol>
            <li><a href="index.php" href="#hero">الرئيسية</a></li>
            <li>متابعة حالة الطلب</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
       <?php
$id = $_GET['id'];   
$ret = mysqli_query($con, "SELECT tblambulancehiring.*,tblambulance.AmbRegNum, tblambulance.DriverName,tblambulance.DriverContactNumber FROM tblambulancehiring 
    left join tblambulance on tblambulance.AmbRegNum=tblambulancehiring.AmbulanceRegNo  WHERE tblambulancehiring.ID = '$id'");


while ($row = mysqli_fetch_array($ret)) {
   $arnum = $row['AmbulanceRegNo'];
?>
<table border="1" class="table table-bordered mg-b-0">
    <tr align="center">
        <th colspan="6" style="font-size:20px;color:blue;text-align: center;">
           عرض تفاصيل الطلب رقم #<?php echo $row['BookingNumber']; ?></th>
        
    </tr>
    <tr>
        <th>اسم المريض</th>
        <td><?php echo $row['PatientName']; ?></td>
        <th>اسم احد الاقارب</th>
        <td><?php echo $row['RelativeName']; ?></td>
    </tr>
    <tr>
    <th>رقم احد الاقارب</th>
    <td><?php  echo $row['RelativeConNum'];?></td>
    <th>تاريخ الحجز</th>
    <td><?php  echo $row['HiringDate'];?></td>
    
  </tr>
  <tr>
    <th>زمن الحجز</th>
    <td><?php  echo $row['HiringTime'];?></td>
     <th>تاريخ الطلب</th>
     <td><?php  echo $row['BookingDate'];?></td>
     <tr>
        <tr>
    <th>العنوان</th>
    <td><?php  echo $row['Address'];?></td>
    <th>المدينة</th>
    <td><?php  echo $row['City'];?></td>
  </tr>
   <tr>
    <th>المحلية</th>
    <td><?php  echo $row['State'];?></td>
    <th>الرسالة</th>
    <td><?php  echo $row['Message'];?></td>
  </tr>
    <!-- Display other request details -->

    <?php
    $atype = $row['AmbulanceType'];  
    $ambulanceTypeText = "";
    switch ($atype) {
        case "1":
            $ambulanceTypeText = "سيارات الإسعاف الأولية: توفر هذه السيارات الرعاية الطبية الأساسية";
            break;
        case "2":
            $ambulanceTypeText = "سيارات الإسعاف المتقدمة: توفر هذه السيارات الرعاية الطبية الطارئة";
            break;
        case "3":
            $ambulanceTypeText = "سيارات الإسعاف الجوي: تُستخدم هذه السيارات لنقل المرضى إلى المستشفيات أو مراكز الرعاية الطبية الأخرى";
            break;
      
        default:
            $ambulanceTypeText = "نوع السيارة غير محدد";
            break;
    }
    ?>
    <tr>
        <th>أنواع سيارات الإسعاف</th>
        <td colspan="3"><?php echo $ambulanceTypeText; ?></td>
    </tr>
    <!-- Display other request details -->

    <?php if ($row['Remark'] != ''): ?>
    <tr>
        <th>ملاحظة</th>
        <td><?php echo $row['Remark']; ?></td>
        <?php if ($row['Status'] != ''): ?>
        <th>حالة الطلب</th>
        <td><?php echo $row['Status']; ?></td>
        <?php endif; ?>
    </tr>
  
    </tr>
    <?php endif; ?>
     <?php if ($row['Status'] != ''){ ?>
    <tr>     
       <th>اسم السائق</th>
        <td><?php echo $row['DriverName']; ?></td>
         <th>رقم السائق</th>
        <td><?php echo $row['DriverContactNumber']; ?></td>
      </tr>
 <?php }else {?>
  <tr>     
       <th>اسم السائق</th>
        <td>قيد المعالجة</td>
         <th>رقم السائق</th>
        <td>قيد المعالجة</td>
      </tr><?php }?>
</table>

<?php
}
?>

<?php 
  $bookingnum=$_GET['bookingnum'];
$query1=mysqli_query($con,"SELECT Remark,Status,UpdationDate,BookingNumber,AmbulanceRegNum FROM tbltrackinghistory

    where BookingNumber='$bookingnum'");
$count=mysqli_num_rows($query1);
if($count>0){
     ?>
 <div class="col-12">
        <table class="table table-bordered" border="1" width="100%">
                                        <tr>
                                            <th colspan="6" style="text-align:center;">سجل المتابعة</th>
                                        </tr>
                                        <tr>
                                            <th>ملاحظة</th>
                                            <th>حالة الطلب</th>
                                            <th>رقم اللوحة</th>
                                            <th>تاريخ العملية</th>
                                        </tr>
<?php 
while($row1=mysqli_fetch_array($query1))
{
?>  

<tr>
<td><?php echo htmlentities($row1['Remark']);?></td>
                 <td> <?php   $pstatus=$row1['Status'];  
                 if($pstatus==""){ ?>
<span>جديد</span>
 <?php } elseif($pstatus=="Assigned"){ ?>
<span>تم تخصيص سيارة</span>
 <?php } elseif($pstatus=="On the way"){ ?>
<span>السيارة في طريقها اليك</span>
 <?php } elseif($pstatus=="Pickup"){ ?>
<span>تم أخذ المريض</span>
 <?php } elseif($pstatus=="Reached"){ ?>
<span>تم إيصال المريض للمستشفي</span>
 <?php } elseif($pstatus=="Rejected"){ ?>
<span>تم رفض الطلب</span>

<?php } ?>
</td>
<td><?php echo htmlentities($row1['AmbulanceRegNum']);?></td>
<td><?php echo htmlentities($row1['UpdationDate']);?></td>
             
</tr>
<?php } ?>

</table>
<?php } ?>
      </div>
    </section>

  </main><!-- End #main -->

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