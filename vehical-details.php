<?php 
session_start();
include('includes/config.php');
error_reporting(0);

$vhid = $_GET['vhid'];
//  $querynum = $dbh -> prepare("SELECT *  FROM tblvehicles WHERE id =:vhid");
//     $querynum->bindParam(':vhid',$vhid, PDO::PARAM_STR);
//     $querynum->execute();
//     $resultsnum = $querynum->fetch(PDO::FETCH_OBJ);
//     $quantity = (int) $resultsnum -> quantity;
//     var_dump($resultsnum -> quantity); die();
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$quantity=$_POST['quantity']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$bookingno=mt_rand(100000000, 999999999);

  $sql="INSERT INTO tblbooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,quantity,message,Status) VALUES(:BookingNumber,:useremail,:vhid,:fromdate,:todate,:quantity,:message,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':BookingNumber',$bookingno,PDO::PARAM_STR);
  $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
  $query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
  $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
  $query->bindParam(':todate',$todate,PDO::PARAM_STR);
  $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
  $query->bindParam(':message',$message,PDO::PARAM_STR);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();

  if($lastInsertId)
  {
    echo "<script>alert('Yêu cầu thuê xe của bạn đã được gửi');</script>";
    echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
  }
  else 
  {
    echo "<script>alert('Đã xảy ra lỗi. Vui lòng thử lại');</script>";
    echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
  } 
}

?>

<script>
  function checkQuanrityCar() {
    var vhId = <?php echo json_encode($vhid); ?> ;
    var fromdate = $("#fromdate").val();
    var todate = $("#todate").val();
    var quantity= $("#quantity").val();
    jQuery.ajax({
      url: "check-quantity-car.php?fromdate="+ fromdate + "&todate="+ todate+ "&quantity=" + quantity + "&vhId=" + vhId,
      success: function(data) {
        $("#user-availability-status").html(data);
      },
      error: function() {}
    });
  }
</script>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Chi tiết phương tiện</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
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
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Danh sách xe</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Trang chủ</a></li>
        <li>Thông tin chi tiết xe</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-12">
        <h2><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php 
                if($result->FuelType == "Petrol"){
                  echo "Xăng";
                }
                if($result->FuelType == "Diesel"){
                  echo "Dầu";
                }
                if($result->FuelType == "EV"){
                  echo "Điện";
                }
              ?></h5>
              <p>Loại nhiên liệu</p>
            </li>
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->ModelYear);?></h5>
              <p>Năm sản xuất</p>
            </li>
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p>Ghế ngồi</p>
            </li>
            <li> <i class="far fa-money-bill-alt" aria-hidden="true"></i>
              <h5><?php 
              $tien = (int) $result->PricePerDay;
              $bien = number_format($tien,0,",",".");
              echo $bien;
              ?></h5>
              <p>VNĐ/Ngày</p>
            </li>
            <li> <i class="fas fa-car-side" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->quantity);?></h5>
              <p>Đang còn</p>
            </li>
          </ul>
        </div>
        <section >
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-detail" alt="image" width="900" height="560";></div>
        </section>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Tổng quan về xe </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Phụ kiện</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Phụ kiện</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Điều hòa</td>
                      <?php if($result->AirConditioner==1)
                      {
                      ?>
                        <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?> 
                        <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?> </tr>

                      <tr>
                      <td>Hệ thống chống khóa phanh</td>
                      <?php if($result->AntiLockBrakingSystem==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else {?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                      <tr>
                      <td>Tay lái trợ lực</td>
                      <?php if($result->PowerSteering==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>
                                        

                      <tr>

                      <td>Cửa sổ điện</td>

                      <?php if($result->PowerWindows==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>
                                        
                      <tr>
                      <td>Máy nghe nhạc</td>
                      <?php if($result->CDPlayer==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                      <tr>
                      <td>Ghế da</td>
                      <?php if($result->LeatherSeats==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                      <tr>
                      <td>Khóa trung tâm</td>
                      <?php if($result->CentralLocking==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                      <tr>
                      <td>Khóa cửa điện</td>
                      <?php if($result->PowerDoorLocks==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                        </tr>
                        <tr>
                      <td>Hỗ trợ phanh</td>
                      <?php if($result->BrakeAssist==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php  } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                      <tr>
                      <td>Túi khí tài xế</td>
                      <?php if($result->DriverAirbag==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>
                      
                      <tr>
                      <td>Túi khí hành khách</td>
                      <?php if($result->PassengerAirbag==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else {?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                      <tr>
                      <td>Cảm biến sự cố</td>
                      <?php if($result->CrashSensor==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true" style = "color: #1da521"></i></td>
                      <?php } else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                      </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Đặt thuê xe ngay</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <label>Từ ngày:</label>
              <input type="date" class="form-control" name="fromdate" id="fromdate"  placeholder="Từ ngày" required>
            </div>
            <div class="form-group">
              <label>Đến ngày:</label>
              <input type="date" class="form-control" name="todate" id="todate" placeholder="Tới ngày" required>
            </div>
            <div class="form-group">
              <label>Số lượng xe:</label>
              <input type="number" class="form-control" name="quantity" id="quantity" onBlur="checkQuanrityCar()" required>
              <p id="user-availability-status" style="font-size:12px;margin-top: 5px;"></p>
            </div>
            <div class="form-group">
              <label>Lời nhắn: </label>
              <textarea rows="4" class="form-control" name="message" placeholder="Lời nhắn"></textarea>
            </div>
          <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" id="submits" value="Đặt ngay">
              </div>
              <?php } else { ?>
              <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Đăng nhập để đặt lịch</a>
              <?php } ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--img-->
    <h3>Một số hình ảnh chi tiết của xe</h3>
    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-detail" alt="image" width="900" height="560"></div>
    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-detail" alt="image" width="900" height="560"></div>
    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-detail"  alt="image" width="900" height="560"></div>
    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-detail"  alt="image" width="900" height="560"></div>
    <!--/img--> 
    
  </div>
</section>
<!--/Listing-detail--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
<script>
  $(document).ready(function () {
      fromdate.min = new Date().toISOString().split("T")[0];
      todate.min = new Date().toISOString().split("T")[0];
  });
</script>

</body>
</html>