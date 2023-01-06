<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['id'])) {
		$id = intval($_GET['id']);
		$sql = "update tblcontactusquery set status = 1 where id = :id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$msg = "Cập nhật thành công!";
	}

	if (isset($_REQUEST['del'])) {
		$delid = intval($_GET['del']);
		$sql = "delete from tblcontactusquery WHERE  id=:delid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':delid', $delid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Xóa thành công!";
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

		<title>Trang quản tr | Quản lý phương tiện </title>

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

							<h2 class="page-title">Quản lý liên hệ</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">Các liên hệ mới cần giải quyết</div>
								<div class="panel-body">
									<?php if ($error) { ?><div class="errorWrap"><strong>Lỗi</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>Thành công</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>STT</th>
												<th>Tên người gửi</th>
												<th>Email</th>
												<th>Số điện thoại</th>
												<th>Lời nhắn</th>
												<th>Thời gian gửi</th>
												<th>Trạng thái</th>
												<th>Hoạt động</th>
											</tr>
										</thead>

										<?php $sql = "SELECT * from tblcontactusquery where status = 1";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1;
										if ($query->rowCount() > 0) {
											foreach ($results as $result) {	?>
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($result->name); ?></td>
													<td><?php echo htmlentities($result->EmailId); ?></td>
													<td><?php echo htmlentities($result->ContactNumber); ?></td>
													<td><?php echo htmlentities($result->Message); ?></td>
													<td><?php echo htmlentities($result->PostingDate); ?></td>
													<td style = "text-align: center; color: #1da521;">Đã xử lý</td>
													<td style = "text-align: center;">
														<a href="new-contact.php?del=<?php echo $result->id; ?>" onclick="return confirm('Bạn muốn xóa liên hệ này?');"><i class="fa fa-close"></i></a>
													</td>
												</tr>
										<?php $cnt = $cnt + 1;
											}
										} ?>
										</tbody>
									</table>
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