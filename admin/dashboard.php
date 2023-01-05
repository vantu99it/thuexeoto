<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>Trang quản trị | Bảng điều khiển Admin</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Thư viện nút Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Bảng điều khiển</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-3">
											<div class="panel1 panel-default">
												<div class="panel-body bk-primary text-light">
													<div class="stat-panel text-center">
														<?php
														$sql = "SELECT id from tblusers ";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$regusers = $query->rowCount();
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($regusers); ?></div>
														<div class="stat-panel-title text-uppercase">Người dùng đăng kí</div>
													</div>
												</div>
												<a href="reg-users.php" class="block-anchor panel-footer text-center">Chi tiết <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel1 panel-default">
												<div class="panel-body bk-success text-light">
													<div class="stat-panel text-center">
														<?php
														$sql1 = "SELECT id from tblvehicles ";
														$query1 = $dbh->prepare($sql1);;
														$query1->execute();
														$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
														$totalvehicle = $query1->rowCount();
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($totalvehicle); ?></div>
														<div class="stat-panel-title text-uppercase">Liệt kê phương tiện</div>
													</div>
												</div>
												<a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Chi tiết &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel1 panel-default">
												<div class="panel-body bk-info text-light">
													<div class="stat-panel text-center">
														<?php
														$sql2 = "SELECT id from tblbooking ";
														$query2 = $dbh->prepare($sql2);
														$query2->execute();
														$results2 = $query2->fetchAll(PDO::FETCH_OBJ);
														$bookings = $query2->rowCount();
														?>

														<div class="stat-panel-number h1 "><?php echo htmlentities($bookings); ?></div>
														<div class="stat-panel-title text-uppercase">Tổng số đặt</div>
													</div>
												</div>
												<a href="confirmed-bookings.php" class="block-anchor panel-footer text-center">Chi tiết &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										<div class="col-md-3">
											<div class="panel1 panel-default">
												<div class="panel-body bk-warning text-light">
													<div class="stat-panel text-center">
														<?php
														$sql3 = "SELECT id from tblbrands ";
														$query3 = $dbh->prepare($sql3);
														$query3->execute();
														$results3 = $query3->fetchAll(PDO::FETCH_OBJ);
														$brands = $query3->rowCount();
														?>
														<div class="stat-panel-number h1 "><?php echo htmlentities($brands); ?></div>
														<div class="stat-panel-title text-uppercase">Liệt kê thương hiệu</div>
													</div>
												</div>
												<a href="manage-brands.php" class="block-anchor panel-footer text-center">Chi tiết &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>