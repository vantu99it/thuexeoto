-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2023 lúc 04:38 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `carrental`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '123456', '2022-12-15 14:03:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(1, 123456789, 'test@gmail.com', 1, '2022-01-01', '2022-01-02', 'Phí là bao nhiêu?', 3, '2022-12-15 14:03:09', '2023-01-05 14:17:05'),
(3, NULL, 'Test1@gmail.com', 1, '2022-01-19', '2022-01-29', 'Tôi muốn được giảm giá?', 1, '2022-12-15 14:03:09', '2022-12-15 14:03:09'),
(4, NULL, 'Tu123@gmail.com', 2, '2022-01-21', '2022-01-23', 'Tôi muốn thuê xe', 1, '2022-12-15 14:03:09', '2022-12-15 14:03:09'),
(5, NULL, 'nguyenbathanh88888@gmail.com', 10, '2022-01-21', '2023-01-21', 'Thuê luôn năm', 1, '2022-12-15 14:03:09', '2022-12-15 14:03:09'),
(8, NULL, 'linhlinh12345@gmail.com', 11, '2022-01-23', '2022-02-25', 'thuê', 2, '2022-12-15 14:03:09', '2023-01-05 14:17:36'),
(9, NULL, 'nguyenbathanh88888@gmail.com', 1, '2023-01-08', '2023-01-08', 'ã', 2, '2023-01-01 11:15:58', '2023-01-01 11:17:25'),
(10, NULL, 'nguyenbathanh88888@gmail.com', 2, '2023-01-01', '2023-01-02', 'x', 1, '2023-01-01 11:18:04', '2023-01-01 11:18:58'),
(11, NULL, 'Array', 1, '2023-01-04', '2023-01-05', 'Thuê xe', 0, '2023-01-04 15:24:28', NULL),
(12, NULL, 'Array', 2, '2023-01-04', '2023-01-06', 'Thời gian', 0, '2023-01-04 15:25:32', NULL),
(13, NULL, 'testtu@gmail.com', 2, '2023-01-08', '2023-01-10', 'ưes', 1, '2023-01-05 09:26:24', '2023-01-05 09:31:08'),
(14, NULL, 'testtu@gmail.com', 13, '2023-01-05', '2023-01-06', '', 1, '2023-01-05 10:33:24', '2023-01-05 10:56:59'),
(15, NULL, 'testtu@gmail.com', 13, '2023-01-08', '2023-01-10', '', 2, '2023-01-05 11:00:44', '2023-01-05 12:06:15'),
(16, NULL, 'testtu@gmail.com', 13, '2023-01-14', '2023-01-15', '', 2, '2023-01-05 11:04:37', '2023-01-05 12:11:53'),
(17, NULL, 'testtu@gmail.com', 13, '2023-01-20', '2023-01-22', '', 2, '2023-01-05 11:33:44', '2023-01-05 12:14:18'),
(18, NULL, 'testtu@gmail.com', 13, '2023-01-08', '2023-01-08', '', 2, '2023-01-05 11:49:25', '2023-01-05 12:17:23'),
(19, NULL, 'testtu@gmail.com', 13, '2023-01-05', '2023-01-06', '', 2, '2023-01-05 11:51:21', '2023-01-05 12:19:48'),
(20, NULL, 'testtu@gmail.com', 13, '2023-01-05', '2023-01-06', '', 1, '2023-01-05 11:51:42', '2023-01-05 12:27:48'),
(21, NULL, 'testtu@gmail.com', 13, '2023-01-05', '2023-01-06', '', 3, '2023-01-05 11:52:28', '2023-01-05 12:29:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2022-12-15 14:03:09', '2023-01-05 14:18:30'),
(2, 'BMW', '2022-12-15 14:03:09', '2023-01-05 14:18:34'),
(3, 'Audi', '2022-12-15 14:03:15', '2023-01-05 14:18:42'),
(4, 'Nissan', '2022-12-15 14:05:09', '2023-01-05 14:18:49'),
(5, 'Toyota', '2022-12-15 14:05:09', '2023-01-05 14:18:53'),
(7, 'Vinfast', '2022-12-15 14:05:09', '2023-01-05 14:18:58'),
(8, 'KIA', '2022-12-15 14:06:09', '2023-01-05 14:19:04'),
(9, 'Hyundai ', '2022-12-15 14:06:09', '2023-01-05 14:19:07'),
(10, 'Honda', '2022-12-15 14:06:09', '2023-01-05 14:19:09'),
(11, 'Mitsubishi', '2022-12-15 14:06:09', '2023-01-05 14:19:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmailId` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactNumber` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'nhom7', 'nhom7@gmail.com', '0348331028', 'Giá bao nhiêu', '2022-12-15 14:06:09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(3, 'Về chúng tôi', 'aboutus', '																																																																																<div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-weight: 700; font-size: medium; font-family: arial;\">Nhóm thực hiện: Nhóm 07 - Phát triển ứng dụng dựa trên mã nguồn mở</span></div><div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-weight: 700; font-size: medium; font-family: arial;\">Thành viên:</span></div><div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-weight: 700; font-size: medium; font-family: arial;\">Nguyễn Văn Tú (Nhóm trưởng)</span></div><div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-weight: 700; font-size: medium; font-family: arial;\">Nguyễn Bá Thành</span></div><div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-weight: 700; font-size: medium; font-family: arial;\">Nguyễn Thị Thùy Linh</span></div><div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: medium; font-weight: 700;\">Phạm Thị Thu Trà</span></div><div style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: medium; font-weight: 700;\">Nguyễn Văn Trúc</span></div>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'bathanh@gmail.com', '2022-12-15 17:00:00'),
(5, 'thuylinh@gmail.com', '2022-12-01 14:20:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'test@gmail.com', 'Rất tốt', '2022-12-16 14:30:12', 1),
(2, 'Test1@gmail.com', 'Quá tuyệt vời', '2022-12-23 16:06:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Test', 'test@gmail.com', '123456', '6465465465', '', 'Số 80 trường tiến', 'Vinh', 'Viet Nam', '2022-12-27 15:53:54', '2023-01-05 09:15:37'),
(3, 'Nguyễn Văn Tú', 'Tu123@gmail.com', '12345', '0978114308', NULL, NULL, NULL, NULL, '2022-11-23 14:21:21', '2023-01-05 14:21:30'),
(4, 'Nguyễn Bá Thành', 'nguyenbathanh88888@gmail.com', '123456', '0988838275', NULL, NULL, NULL, NULL, '2022-11-22 17:00:00', '2023-01-05 14:21:35'),
(5, 'Nguyễn Thị Thùy Linh', 'linhlinh12345@gmail.com', '123456', '0349756314', '', 'Đại học Vinh', 'Vinh', 'Việt Nam', '2022-12-27 15:53:54', '2022-12-27 15:53:54'),
(7, 'Nguyễn Văn Tú', 'testtu@gmail.com', '$2y$10$hOJj3kFNQBIC2kdZjIDfSea9UE0ElzDZzTsNE9O7UAOtiLVyiXmF2', '0932379943', '', '80 Trường tiến', 'Vinh, Nghệ An', 'Việt Nam', '2023-01-05 07:57:51', '2023-01-05 09:19:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vimage2` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vimage3` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vimage4` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Vimage5` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `quantity`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'Suzuki XL7', 1, 'Suzuki XL7 2021là tên dòng SUV đích thực ra đời từ năm 1998 tại Nhật Bản. XL7 Hoàn toàn mới là thế hệ thứ 3 được phát triển để tiếp nối thành công từ thế hệ tiền nhiệm.\r\n\r\nÝ tưởng về một chiếc SUV 7 chỗ thực sự đáp ứng kỳ vọng của khách hàng Việt Nam về một mẫu xe không những thỏa mãn được nhu cầu sử dụng cho gia đình mà còn đáp ứng đam mê tự do của người dùng.', 2, 500000, 'Petrol', 2021, 5, 'gia-xe-suzuki-xl-7-oto-com-vn-1-7a15.jpg', 'Suzuki XL75.jpg', 'Suzuki XL72.jpg', 'Suzuki XL73.jpg', 'Suzuki XL71.jpg', NULL, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(2, 'BMW 5 Series', 2, 'Mẫu xe BMW 5 Series cao cấp nhất từ trước đến nay: Sedan, Touring, ActiveHybrid, Gran Turismo và M5 Sedan. Ngoài sự sang trọng và hiệu suất ấn tượng, những mẫu xe thuộc dòng xe này này còn sở hữu hàng loạt những phẩm chất khiến nó trở nên không thể thiếu trong cuộc sống hàng ngày.', 2, 100000, 'Petrol', 2021, 5, '2017_ac_schnitzer_bmw_5-series_1.jpg', '2017_ac_schnitzer_bmw_5-series_8_1920x1080.jpg', '2017_ac_schnitzer_bmw_5-series_35_1920x1080.jpg', '2017_ac_schnitzer_bmw_5-series_25_1920x1080.jpg', '2017_ac_schnitzer_bmw_5-series_35_1920x1080.jpg', 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(3, 'Audi Q8', 3, 'Audi Q8 2022 sở hữu khoang hành lý với diện tích đến 605L đảm bảo đáp ứng tốt nhu cầu của người dùng. Thiết kế hàng ghế sau có khả năng gập xuống nhằm mở rộng diện tích lên đến 1.755L mỗi khi cần chứa nhiều đồ', 2, 300000, 'Petrol', 2021, 5, 'AUDI , AUDI Q8.jpg', 'Audi Q81.png', 'Audi Q82.png', 'Audi Q83.png', 'Audi Q8.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(4, 'VinFast Lux A 2.0', 4, 'Sự kết hợp giữa dáng vẻ khỏe khoắn và cấu trúc hoàn hảo của ngoại thất tạo nên điểm nhấn sang trọng nhưng vẫn đầy tinh tế cho LUX A2.0, thổi làn gió mới vào thiết kế đặc hữu của dòng sedan thông thường.', 2, 800000, 'Petrol', 2019, 5, 'VINFAST LUX A 2.0.jpg', 'VinFast Lux A 2.01.png', 'VinFast Lux A 2.02.png', 'VinFast Lux A 2.03.png', 'VinFast Lux A 2.04.jpg', 1, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(5, 'Nissan GT-R', 4, 'Trải qua 7 thế hệ, biến thể nhanh nhất của GT-R ngày nay là GT-R Nismo sử dụng động cơ 3.8 V6 tăng áp kép cho công suất 600 mã lực tại tua máy 6800 vòng/phút và momen xoắn tối đa 650 Nm, đi kèm hệ dẫn động bốn bánh toàn thời gian thông qua hộp số tự động 6 cấp ly hợp kép. Đó là những con số không hề thua kém bất cứ đối thủ châu Âu nào.', 2, 2000000, 'Petrol', 2019, 5, 'nissan-gt-r50-by-italdesign-2337.jpg', 'nissan-gt-r50-1-2337.jpg', 'nissan-gt-r50-2-2337.jpg', 'Danh-gia-Nissan-GT-R-2021-ve-noi-that.jpg', 'nissan-gt-r50-by-italdesign-2337.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(6, 'Nissan Sunny 2020', 4, 'Nissan Sunny 2020 đã được giới thiệu vào tháng 11 năm 2019 tại Triển lãm ô tô Thái Lan. ', 2, 400000, 'Diesel', 2018, 5, 'NISSAN SUNNY 2020.jpg', 'images (1).jpg', 'Nissan-Sunny-Interior-114977.jpg', 'nissan-sunny-8a29f53-500x375.jpg', 'new-nissan-sunny-photo.jpg', 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(7, 'Toyota Fortuner', 5, 'Toyota Fortuner 2022   chắc hẳn là cái tên rất quen thuộc trên thị trường xe ô tô Việt Nam. Fortuner là phiên bản xe SUV 7 chỗ bán chạy nhất Việt Nam trong những năm gần đây. ', 2, 3000000, 'Petrol', 2019, 7, '2015_Toyota_Fortuner_(New_Zealand).jpg', 'toyota-fortuner-legender-rear-quarters-6e57.jpg', 'zw-toyota-fortuner-2020-2.jpg', 'download (1).jpg', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(8, 'Maruti Suzuki ', 1, 'Bên ngoài, xe được trang bị lưới tản nhiệt mạ crôm mới, tấm ốp bảo vệ gầm giả, đèn sương mù thay đổi vị trí, cản trước/sau \"cơ bắp\" hơn, đèn pha LED, bộ vành hợp kim 16 inch phối 2 tông màu và đèn hậu hình LED chữ C. ', 2, 600000, 'Petrol', 2018, 5, 'MARUTI SUZUKI.png', 'marutisuzuki-vitara-brezza-rear-view37.jpg', 'marutisuzuki-vitara-brezza-dashboard10.jpg', 'marutisuzuki-vitara-brezza-boot-space59.jpg', 'marutisuzuki-vitara-brezza-boot-space28.jpg', NULL, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(9, 'KIA Morning 2022', 8, 'KIA Morning 2022 là một trong những cái tên nổi bật tại phân khúc hạng A. Mẫu xe này từng có thời gian dài sở hữu doanh số thuộc top 10 toàn thị trường. Tuy nhiên, thời gian gần đây trước sự vươn lên của VinFast Fadil và Hyundai Grand i10, Morning buộc phải chia sẻ thị phần lớn cho các đối thủ.\r\n\r\nNgày 14/11/2020, KIA Morning thế hệ mới chính thức ra mắt thị trường Việt Nam tại sự kiện tri ân khách hàng của đại lý. Ở thế hệ thứ 4, KIA Morning 2021-2022 có 2 phiên bản gồm X-Line và GT-Line với giá 439 triệu đồng cho cả 2. Phiên bản mới sẽ được phân phối song song cùng 4 phiên bản của thế hệ trước đó.', 2, 500000, 'Petrol', 2022, 4, 'kia-morning2.jpg', 'kia-morning1.jpg', 'kia-morning3.jpg', 'kia-morning4.jpg', 'kia-morning5.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(10, 'Hyundai 2022', 9, 'Mẫu xe cỡ C trang bị nhiều tính năng hỗ trợ lái như     xế đua, lắp động cơ 2.0 tăng áp, bán ra từ cuối năm.\r\n\r\nDự kiến Hyundai có màn chào sân đầu tiên của Elantra N 2022 trước công chúng tại Triển lãm ôtô quốc tế New York. Sau đó, sự kiện bị hủy do ảnh hưởng của dịch Covid-19. Không còn lựa chọn, hãng xe Hàn Quốc đưa sản phẩm mới nhất của mình ra mắt trực tuyến. Elantra N 2022 bổ sung thêm lựa chọn cho dòng sản phẩm hiệu suất cao của Hyundai tại Mỹ, bên cạnh những Veloster N (hatchback) và Kona N (crossover).', 2, 1000000, 'Petrol', 2022, 5, 'Hyundai1.jpg', 'Hyundai 2.jpg', 'Hyundai 4.jpg', 'Hyundai 5.jpg', 'Hyundai 3.jpg', 1, 1, 1, 1, NULL, 1, 1, 1, 1, NULL, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(11, 'Honda CRV 2022', 10, 'Honda CRV 2022 bản 7 chỗ được trang bị đèn pha dạng LED tùy chọn, tích hợp dải đèn LED định vị ban ngày DRL trên cả ba phiên bản. Cụm đèn trước đã chuyển sang công nghệ LED hoàn toàn giống với Honda Civic thế hệ mới và Honda Accord phiên bản mới. Cụm đèn pha này cùng với thanh chrome trên lưới tản nhiệt tạo thành hình “đôi cánh vững chãi”, giúp cho đầu xe của Honda CR-V thế hệ mới mang kiểu dáng mạnh mẽ hơn. Về cơ bản phần đầu xe CR-V 2022 thực sự rất ấn tượng, thể thao và hầm hố hơn thế hệ thứ 4 tiền nhiệm.', 2, 1000000, 'Petrol', 2022, 7, 'Honda CRV5.jpg', 'Honda CRV2.jpg', 'Honda CRV3.jpg', 'Honda CRV4.jpg', 'Honda CRV1.jpg', 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(12, 'Mitsubishi 2022', 11, 'Trên thị trường xe bán tải hiện nay ở nước ta, Mitsubishi Triton đến từ Nhật cũng là cái tên nổi bật bên cạnh những thương hiệu có tiếng như Chevrolet Colorado và Ford Ranger. Ngày 22/11/2021, Mitsubishi Motors Việt Nam chính thức giới thiệu thêm Mitsubishi Triton Athlete mới và được nhập khẩu nguyên chiếc.\r\n\r\nVậy giá xe Mitsubishi Triton 2022 hiện nay như thế nào? Hãy cùng tìm hiểu cụ thể trong bài viết tổng hợp của Tinxe dưới đây.\r\n\r\nGiá niêm yết và lăn bánh Mitsubishi Triton tháng 1/2022\r\nMitsubishi Triton Athlete được nhập khẩu nguyên chiếc và có 2 phiên bản là 4x2 AT và 4x4 AT, thay thế cho 2 phiên bản AT Premium trước đó. Như vậy, giá bán của 2 phiên bản mới lần lượt là 760 triệu và 885 triệu đồng, cao hơn trước 20 triệu, phiên bản 4x2 AT tiêu chuẩn vẫn được giữ nguyên.\r\n\r\nGiá xe Mitsubishi Triton 2021-2022 được chúng tôi cập nhật theo bảng giá xe Mitsubishi Triton 2022 chính hãng mới nhất trong tháng 1 vẫn khởi điểm từ 630 triệu đồng cho phiên bản thấp nhất là 4x2AT MIVEC, bản cao nhất có giá 885 triệu đồng cho mẫu xe mới về là Triton Athlete 4x4 AT.', 2, 1200000, 'Petrol', 2022, 5, 'MITSUBISHI 2022.png', 'Mitsubishi2.jpg', 'Mitsubishi3.jpg', 'Mitsubishi4.jpg', 'Mitsubishi5.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-12-18 07:04:35', '2023-01-05 14:24:34'),
(13, 'VinFast VF8 2022', 7, 'Được giới thiệu là một mẫu SUV hạng D có thiết kế \"năng động\", nhưng nhìn thực tế Vinfast VF8 chạy điện mới lại khá bề thế và bắt mắt. Xe sở hữu kích thước dài x rộng x cao lần lượt là 4.750 x 1.900 x 1.660 mm, tương đương nhiều mẫu SUV cỡ D chạy xăng truyền thống hiện nay.\r\nCó thể thấy rõ các đường gân dập nổi ở mặt trước, cũng như nắp capo và 2 khe hút gió 2 bên. Đèn pha của xe nhìn sắc và hiện đại, trong khi dải LED ban ngày chạy ngang bao quanh logo chữ V khá quen thuộc trên các mẫu xe của VinFast. Ngay chính giữa bên dưới là vị trí đặt cảm biến lidar để hỗ trợ các tính năng trợ lái thông minh (ADAS).\r\n', 3, 500000, 'EV', 2022, 4, 'chi-tiet-vinfast-vf8-2022-tai-viet-nam-gia-cao-nhat-hon-12-ty-dong.jpg', 'chi-tiet-vinfast-vf8-2022-tai-viet-nam-gia-cao-nhat-hon-12-ty-dong-hinh-4.jpg', 'chi-tiet-vinfast-vf8-2022-tai-viet-nam-gia-cao-nhat-hon-12-ty-dong-hinh-6.jpg', 'chi-tiet-vinfast-vf8-2022-tai-viet-nam-gia-cao-nhat-hon-12-ty-dong-hinh-7.jpg', 'chi-tiet-vinfast-vf8-2022-tai-viet-nam-gia-cao-nhat-hon-12-ty-dong-hinh-12.jpg', 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, '2023-01-05 10:29:23', '2023-01-05 13:55:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Chỉ mục cho bảng `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
