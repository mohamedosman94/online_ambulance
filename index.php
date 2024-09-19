<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit'])) {
    
    $bookingnum = mt_rand(100000000, 999999999);
    $pname = $_POST['pname'];
    $rname = $_POST['rname'];
    $phone = $_POST['phone'];
    $hdate = $_POST['hdate'];
    $htime = $_POST['htime'];
    $ambulancetype = $_POST['ambulancetype'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $message = $_POST['message'];
   
    $query = mysqli_query($con, "INSERT INTO tblambulancehiring (BookingNumber, PatientName, RelativeName, RelativeConNum, HiringDate, HiringTime, AmbulanceType, Address, City, State, Message) VALUES ('$bookingnum', '$pname', '$rname', '$phone', '$hdate', '$htime', '$ambulancetype', '$address', '$city', '$state', '$message')");

    if ($query) {
        echo "<script>alert('تم إرسال طلبك بنجاح.. رقم الطلب هو: $bookingnum');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('حدث خطأ ما ، حاول مره اخري');</script>";
    }
}
?>

<!DOCTYPE html>
<html dir="rtl">

<head>
  
  <title>المستخدم | الرئيسية</title>
 
  
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

  <!-- ======= Hero Section ======= -->
  <div align="right">
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
  
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/2.jpeg)">
          <div class="container">
        
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/3.jpg)">
          <div class="container">
          </div>
        </div>
		<!-- Slide 4 -->
		<div class="carousel-item" style="background-image: url(assets/img/slide/slide-1.jpg)">
        <div class="container">
        </div>
        </div>
        <!-- Slide 5 -->  
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
        <div class="container">
        </div>
        </div>
	</div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    



    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>حول الموقع</h2>

          <p>تلعب سيارة إسعاف دورًا مهمًا في نظام الرعاية الصحية. فهي توفر وسيلة نقل سريعة وفعالة للمرضى الذين يحتاجون إلى عناية طبية عاجلة. يمكن أن تساعد سيارة الإسعاف في إنقاذ الأرواح من خلال توفير الرعاية الأولية والرعاية الطبية الطارئة </p>
        </div>

      

      </div>
    </section><!-- End About Us Section -->

    



    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><font color="white">طلب سيارة إسعاف عبر الانترنت</font></h2>
        </div>

        <form action="" method="post" role="form" class="form-control" data-aos="fade-up" data-aos-delay="100">
          <div class="row" style="padding-top:20px">
            <div class="col-md-4 form-group">
              <input type="text" name="pname" class="form-control" autocomplete="off" id="pname" placeholder="اسم المريض" required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="rname" class="form-control" autocomplete="off" id="rname" placeholder="اسم احد الاقارب" required>
            </div>
           
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" autocomplete="off" id="phone" placeholder="رقم هاتف احد الاقارب" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="date" name="hdate" class="form-control datepicker" autocomplete="off"id="hdate" placeholder="تاريخ الحجز" required>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="time" name="htime" class="form-control datepicker" autocomplete="off" id="htime" placeholder="زمن الحجز" required>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="ambulancetype" id="ambulancetype" class="form-select">
                <option value="">اختر نوع سيارة الاسعاف</option>
                <option value="1">سيارات الإسعاف الأولية: توفر هذه السيارات الرعاية الطبية الأساسية</option>
                <option value="2">سيارات الإسعاف المتقدمة: توفر هذه السيارات الرعاية الطبية الطارئة</option>
                <option value="3">سيارات الإسعاف الجوي: تُستخدم هذه السيارات لنقل المرضى إلى المستشفيات أو مراكز الرعاية الطبية الأخرى</option>
                
                
               
              </select>
            </div>
          </div>
           <div class="row" style="padding-top:20px">
            <div class="col-md-4 form-group">
              <input type="text" name="address" class="form-control" id="address" autocomplete="off" placeholder="اكتب العنوان هنا" required>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="city" class="form-control" id="city"  autocomplete="off" placeholder="اكتب اسم المنطقة" required>
            </div>
           
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="state" id="state" autocomplete="off" placeholder="اكتب اسم المحلية" required>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5"  autocomplete="off" placeholder="رسالة (اختياري)"></textarea>
          </div>
         
          <div class="text-center" style="padding-top: 20px;padding-bottom: 20px;"><button type="submit"  name="submit" class="btn btn-primary">اطلب الان</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>تواصل معنا</h2>
          <p>نحن نرحب دائماً باستفساراتك ومشاركتنا كل مقترحاتك، يمكنك التواصل معنا عبر الرقم الموحد 249123000000+ او عبر البريد الإلكتروني online_ambulance@gmail.com </p>
        </div>

      </div>

  

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12">

             <div class="row">

              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>موقعنا</h3>
                  <p>الخرطوم ، شارع عبيد ختم ، جوار مستشفي يستبشرون</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>البريد الإلكتروني</h3>
                  <p>online_ambulance@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>اتصل بنا</h3>
                  <p>249123000000+</p>
                </div>
              </div>
            </div>

         

        </div>

      </div>
    </section><!-- End Contact Section -->

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