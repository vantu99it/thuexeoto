<?php 
require_once("includes/config.php");
// Kiểm tra số lượng xe đang còn
if(!empty($_GET["fromdate"]) && !empty($_GET["todate"]) && !empty($_GET["quantity"]) && !empty($_GET["vhId"])) {
	$fromdate = $_GET["fromdate"];
    $todate =$_GET["todate"];
    $quantity_input= $_GET["quantity"];
    $vhid = $_GET["vhId"];

    $date = (strtotime($todate) - strtotime($fromdate))/60/60/24;

    //đếm số xe đang cho thuê theo ngày nhập vào
	$ret="SELECT *, COUNT(quantity) as num FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid and Status = 1";
    $query1 = $dbh -> prepare($ret);
    $query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
    $query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
    $query1->bindParam(':todate',$todate,PDO::PARAM_STR);
    $query1->execute();
    $results1=$query1->fetch(PDO::FETCH_OBJ);
    $countAll = $query1->rowCount();
    $num = (int) $results1 -> num;

    //lấy ra số lượng xe đang có
    $querynum = $dbh -> prepare("SELECT *  FROM tblvehicles WHERE id =:vhid");
    $querynum->bindParam(':vhid',$vhid, PDO::PARAM_STR);
    $querynum->execute();
    $resultsnum = $querynum->fetch(PDO::FETCH_OBJ);
    $quantity = (int) $resultsnum -> quantity;
    $price = (int) $resultsnum -> PricePerDay;

    $quantity_check = $quantity - $num;
    $total = $date *  $price * $quantity_input;
    $total = number_format($total,0,",",".");

    if($quantity_check < $quantity_input){
        echo "<span style='color:red'> Số lượng xe trong thời gian trên chỉ còn ".$quantity_check." cái.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
        echo "<span style='color:red'> Tổng số tiền bạn cần thanh toán là:  ".$total." VNĐ cho ".$quantity_input." xe và ".$date." ngày.</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}