<?php 
include 'dbconnect.php';
$sql = "SELECT * FROM tb_booking
    LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
    LEFT JOIN tb_vehicle ON tb_booking.b_car = tb_vehicle.v_reg
    LEFT JOIN tb_customer ON tb_booking.b_cust = tb_customer.c_ic ";

$ppl = "SELECT * FROM tb_customer";
$rs = $result = mysqli_query($con, $ppl);     
$total = mysqli_num_rows($rs);

$result = mysqli_query($con, $sql);   
$rows = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PokiPoki Rental Car</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
<!--   MODAL for Register -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
          <h1 style="text-align:center" class="modal-title">Sign Up</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" action="registerprocess.php">
        <div class="form-group">
        <label for="IC">IC Number:</label>
        <input type="text" class="form-control" id="pic" placeholder="Identification Number" name="pic" onkeypress="return isNumberKey(event)" required>
        </div>

        <div class="form-group">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="pname" placeholder="Name" name="pname" required>
        </div>

        <div class="form-group">
        <label for="Gender">Gender:</label> <br>
        &nbspMale
        <input type="radio" name="gender" value="m">
        &nbspFemale
        <input type="radio" name="gender" value="f">
        </div>

        <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="pemail" placeholder="Email" name="pemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title = "Please fill-in with the correct email" required>
        </div>

        <div class="form-group">
        <label for="email">Contact Number:</label>
        <input type="text" class="form-control" id="pcontact" placeholder="Contact Number" name="pcontact" onkeypress="return isNumberKey(event)" required>
        </div>

        <div class="form-group">
        <label for="comment">Address:</label>
        <textarea class="form-control" rows="3" id="paddress" placeholder="Address" name="paddress" required></textarea>
        </div>

        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="ppassword" placeholder="Enter password" name="ppassword" pattern=".{6,}" title = "Must at least have 6 charachter" required>
        </div>

        <button type="submit" class="button btn-info">Sign Up</button>
        <button type="reset" class="button btn-warning">Reset Data</button>
        <br><br>
        </form>
        </div>
           <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="button btn-danger" data-dismiss="modal">Close</button>
        </div>         
            </div>
            </div>
        </div>
    </div>



  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="manual/manualuser.pdf" target="_blank" >User Manual</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro.gif" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>We provide<br><span>Cars</span><br>for your luxury!</h2>
        <div>
          <a href="#signup" class="btn-get-started scrollto" data-toggle="modal" data-target="#myModal">Register Now! </a>
          <a href="#services" class="btn-services scrollto">Our Services</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Less Documentation</a></h4>
              <p class="description">With PokPoki Car Rental, No need to hassle with all the paperwork! </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Advanced Car</a></h4>
              <p class="description">Our Car are ready to book with newest technology and very smooth to drive</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Book Anytime, Anywhere</a></h4>
              <p class="description">You can rent a car with us 24 hours, 7 days a week, 12 months a year</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-clock-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Faster Approval</a></h4>
              <p class="description">Faster approval of your booking!</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
        </header>

        <div class="row counters">

     <?php     
           echo '<div class="col-lg-4 col-6 text-center">';
           echo '<span data-toggle="counter-up">'.$total.'</span>'; ?>
            <p>Clients</p>
          </div>
    <?php 
          echo '<div class="col-lg-4 col-6 text-center">';
          echo '<span data-toggle="counter-up">'.$rows.'</span>'; ?>
            <p>Booking had been made</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">203</span>
            <p>Days of car being rented</p>
          </div>
  
        </div>

      </div>
    </section>
    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Teluk Intan, Perak</h4>
                <p>
                  Booking with PokiPoki Rental Car are super convinient and easy!
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                <h3>Sara McMilda</h3>
                <h4>Kuala Kangsar, Perak</h4>
                <p>
                  Easy, Good and Recommended!
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Sabak Bernam, Selangor</h4>
                <p>
                 One of the best service car rental available online in Malaysia!
                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section><!-- #testimonials -->
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=penjara%20sg%20buloh+(PokiPoki%20Rental%20Car)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>KM 20 Sungai Buloh, 47000 Sungai Buloh, Selangor</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>info@pokipoki.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+60 - 3604 2525</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Syahmi Sufakhi, Student of SCSP, 2u2i UTM</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->


      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
