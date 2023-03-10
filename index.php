<?php
session_start();
include('includes/config.php');
error_reporting(0);


  $item_per_page = !empty($_GET['per-page'])?$_GET['per-page']:9;
  $current_page = !empty($_GET['page'])?$_GET['page']:1 ;
  $offset = ($current_page - 1) * $item_per_page;

  $totalPage = $dbh->prepare("SELECT COUNT(*) AS number from tblvehicles");
  $totalPage->execute();
  $resultsnum = $totalPage->fetch(PDO::FETCH_OBJ);
  $totalPages = $resultsnum -> number;
  $totalPages = ceil($totalPages/$item_per_page);
  // var_dump($totalPages); die();

  $sql1 = "SELECT tblvehicles.id,tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand ORDER BY tblvehicles.id DESC LIMIT ".$item_per_page." OFFSET ".$offset;
  $query1 = $dbh->prepare($sql1);
  $query1->execute();
  $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

  <title>Cổng thông tin cho thuê xe</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

  <!-- Start Switcher -->
  <?php include('includes/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!-- Banners -->
  <div id="banner" class="banner-sections" style = "height: 600px;margin-top: 135px;">
    <img src="./assets/images/slider2.jpg" alt="" class="slider-home">
    <img src="./assets/images/slider3.jpg" alt="" class="slider-home">
    <img src="./assets/images/slider4.jpg" alt="" class="slider-home">
  </div>
  <!-- /Banners -->


  <!-- Resent Cat-->
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="section-header text-center"></div>
      <div class="row">

        <!-- Nav tabs -->
        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">DANH SÁCH XE</a></li>
          </ul>
        </div>
        <!--  New Cars -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="resentnewcar">

            <?php 
            if ($query1->rowCount() > 0) {
              foreach ($results1 as $result) {
            ?>
                <div class="col-list-3">
                  <div class="recent-car-list">
                    <div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"></a>
                      <ul>
                        <li><i class="fa fa-car" aria-hidden="true"></i>
                          <?php 
                            if($result->FuelType == "Petrol"){
                              echo "Xăng";
                            }
                            if($result->FuelType == "Diesel"){
                              echo "Dầu";
                            }
                            if($result->FuelType == "EV"){
                              echo "Điện";
                            }
                          ?>
                        </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i>Mô hình: <?php echo htmlentities($result->ModelYear); ?></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i>Ghế ngồi : <?php echo htmlentities($result->SeatingCapacity); ?></li>
                      </ul>
                    </div>
                    <div class="car-title-m">
                      <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                      <span class="price">
                        <?php 
                          $tien = (int) $result->PricePerDay;
                          $bien = number_format($tien,0,",",".");
                          echo $bien." đ/ngày";
                        ?></span>
                    </div>
                    <div class="inventory_info_m">
                      <p><?php echo substr($result->VehiclesOverview, 0, 120); ?>...</p>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>  
          </div>
        </div>
      </div>
        <!-- phân trang -->
        <?php include './includes/page-division.php'; ?>
        <!-- /Phân trang -->
      </div>
  </section>

  <!-- /Resent Cat -->

  <!-- Fun Facts-->
  <section class="fun-facts-section">
    <div class="container div_zindex">
      <div class="row">

      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Fun Facts-->

  <!-- /Testimonial-->


  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <!--Switcher-->
  <script src="assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function() {
    $('#banner').slick({
      loop: true,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 1800,
      slidesToShow: 1,
      adaptiveHeight: true,
      prevArrow: `<button type='button' class='slick-prev pull-left slick-arrow' ><i class="fa-solid fa-chevron-left"></i></button>`,
      nextArrow: `<button type='button' class='slick-next pull-right slick-arrow'><i class="fa-solid fa-chevron-right"></i></button>`,
    });
  });
</script>
<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->

</html>