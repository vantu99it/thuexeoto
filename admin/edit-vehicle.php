<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$quantity = $_POST['quantity'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		$id = intval($_GET['id']);

		$sql = "update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats, quantity = :quantity where id=:id ";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
		$query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$msg = "C???p nh???t th??nh c??ng";
	}


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

		<title>Trang qu???n tr??? | Ch???nh s???a b??i vi???t</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>
	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">Ch???nh s???a th??ng tin xe</h2>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Th??ng tin c?? b???n</div>
										<div class="panel-body">
											<?php if ($msg) { ?><div class="succWrap"><strong>Th??nh c??ng</strong>:<?php echo htmlentities($msg); ?>
												</div><?php } ?>
											<?php
											$id = intval($_GET['id']);
											$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
											$query = $dbh->prepare($sql);
											$query->bindParam(':id', $id, PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {	?>
												<form method="post" class="form-horizontal" enctype="multipart/form-data">
													<div class="form-group">
														<label class="col-sm-2 control-label">T??n xe<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result->VehiclesTitle) ?>" required>
														</div>
														
													</div>

													<div class="hr-dashed"></div>
													<div class="form-group">
														<label class="col-sm-2 control-label">T???ng quan<span style="color:red">*</span></label>
														<div class="col-sm-10">
															<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->VehiclesOverview); ?></textarea>
														</div>
													</div>

													<div class="form-group">
														<label class="col-sm-2 control-label">Ch???n th????ng hi???u<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select class="selectpicker" name="brandname" required>
																<option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->BrandName); ?> </option>
																<?php $ret = "select id,BrandName from tblbrands";
																$query = $dbh->prepare($ret);
																//$query->bindParam(':id',$id, PDO::PARAM_STR);
																$query->execute();
																$resultss = $query->fetchAll(PDO::FETCH_OBJ);
																if ($query->rowCount() > 0) {
																	foreach ($resultss as $results) {
																		if ($results->BrandName == $bdname) {
																			continue;
																		} else {
																?>
																			<option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->BrandName); ?></option>
																<?php }
																	}
																} ?>

															</select>
														</div>
														
														<label class="col-sm-2 control-label">Ch???n nhi??n li???u<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select class="selectpicker" name="fueltype" required>
																<option value="<?php echo htmlentities($result->FuelType); ?>"> <?php echo htmlentities($result->FuelType); ?> </option>

																<option value="Petrol">X??ng</option>
																<option value="Diesel">D???u</option>
																<option value="EV">??i???n</option>
															</select>
														</div>
														<label class="col-sm-2 control-label">?????i xe<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear); ?>" required>
														</div>
													</div>


													<div class="form-group">
														
														<label class="col-sm-2 control-label">Ch??? ng???i<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity); ?>" required>
														</div>
														<label class="col-sm-2 control-label">S??? l?????ng xe<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="number" name="quantity" class="form-control" value="<?php echo htmlentities($result->quantity); ?>" required>
														</div>
														<label class="col-sm-2 control-label">Gi?? thu?? m???i ng??y(??)<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay); ?>" required>
														</div>
													</div>

													<div class="hr-dashed"></div>
													<div class="form-group">
														<div class="col-sm-12">
															<h4><b>H??nh ???nh ph????ng ti???n</b></h4>
														</div>
													</div>


													<div class="form-group">
														<div class="col-sm-4" style="width: 32%;">
															H??nh 1 <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Thay ?????i h??nh ???nh 1</a>
														</div>
														<div class="col-sm-4" style="width: 32%;">
															H??nh 2<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Thay ?????i h??nh ???nh 2</a>
														</div>
														<div class="col-sm-4" style="width: 32%;">
															H??nh 3 <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Thay ?????i h??nh ???nh 3</a>
														</div>
													</div>


													<div class="form-group">
														<div class="col-sm-4" style="width: 32%;">
															H??nh 4 <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Thay ?????i h??nh ???nh 4</a>
														</div>
														<div class="col-sm-4" style="width: 32%;">
															H??nh 5
															<?php if ($result->Vimage5 == "") {
																echo htmlentities("File not available");
															} else { ?>
																<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Thay ?????i h??nh ???nh 5</a>
															<?php } ?>
														</div>
													</div>

											<div class="hr-dashed"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Ph??? ki???n</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-3">
													<?php if ($result->AirConditioner == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
															<label for="inlineCheckbox1"> ??i???u h??a </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
															<label for="inlineCheckbox1"> ??i???u h??a </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->PowerDoorLocks == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
															<label for="inlineCheckbox2"> Kh??a ??i???n </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-success checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
															<label for="inlineCheckbox2"> Kh??a ??i???n </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->AntiLockBrakingSystem == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
															<label for="inlineCheckbox3"> H??? th???ng ch???ng b?? c???ng phanh ABS </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
															<label for="inlineCheckbox3"> H??? th???ng ch???ng b?? c???ng phanh ABS </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->BrakeAssist == 1) {
													?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
															<label for="inlineCheckbox3"> H??? tr??? phanh </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
															<label for="inlineCheckbox3"> H??? tr??? phanh </label>
														</div>
													<?php } ?>
												</div>

												<div class="form-group">
													<?php if ($result->PowerSteering == 1) {
													?>
														<div class="col-sm-3">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
																<label for="inlineCheckbox1"> Tr??? l???c l??i </label>
															</div>
														<?php } else { ?>
															<div class="col-sm-3">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
																	<label for="inlineCheckbox1"> Tr??? l???c l??i </label>
																</div>
															<?php } ?>
															</div>
															<div class="col-sm-3">
																<?php if ($result->DriverAirbag == 1) {
																?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
																		<label for="inlineCheckbox2">T??i kh?? t??i x???</label>
																	</div>
																<?php } else { ?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
																		<label for="inlineCheckbox2">T??i kh?? t??i x???</label>
																	<?php } ?>
																	</div>
																	<div class="col-sm-3">
																		<?php if ($result->DriverAirbag == 1) {
																		?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
																				<label for="inlineCheckbox3"> T??i kh?? h??nh kh??ch</label>
																			</div>
																		<?php } else { ?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
																				<label for="inlineCheckbox3"> T??i kh?? h??nh kh??ch</label>
																			</div>
																		<?php } ?>
																	</div>
																	<div class="col-sm-3">
																		<?php if ($result->PowerWindows == 1) {
																		?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
																				<label for="inlineCheckbox3"> C???a s??? ??i???n </label>
																			</div>
																		<?php } else { ?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
																				<label for="inlineCheckbox3"> C???a s??? ??i???n </label>
																			</div>
																		<?php } ?>
																	</div>


																	<div class="form-group">
																		<div class="col-sm-3">
																			<?php if ($result->CDPlayer == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1">
																					<label for="inlineCheckbox1"> M??y nghe nh???c </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1">
																					<label for="inlineCheckbox1"> M??y nghe nh???c </label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CentralLocking == 1) {
																			?>
																				<div class="checkbox  checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1">
																					<label for="inlineCheckbox2">Kh??a trung t??m</label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-success checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1">
																					<label for="inlineCheckbox2">Kh??a trung t??m</label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CrashSensor == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1">
																					<label for="inlineCheckbox3"> C???m bi???n s??? c??? </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1">
																					<label for="inlineCheckbox3"> C???m bi???n s??? c??? </label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CrashSensor == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1">
																					<label for="inlineCheckbox3"> Gh??? da </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1">
																					<label for="inlineCheckbox3"> Gh??? da </label>
																				</div>
																			<?php } ?>
																		</div>
																	</div>
															<?php }
													} ?>


															<div class="form-group">
																<div class="col-sm-8 col-sm-offset-2">

																	<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">L??u thay ?????i</button>
																</div>
															</div>

															</form>
															</div>
														</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

		<!-- Scripts -->
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