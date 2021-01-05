-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2021 at 08:15 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportsshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountadmin`
--

DROP TABLE IF EXISTS `accountadmin`;
CREATE TABLE IF NOT EXISTS `accountadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountadmin`
--

INSERT INTO `accountadmin` (`id`, `email`, `username`, `password`, `Phone`) VALUES
(1, 'hongloi12123@gmail.com', 'Hongloi12123', '194a322ba78278d2de6ccf50c535ed1c', 12),
(2, 'hongloi12123@gmail.com', 'Hongloi12123', 'HongLoi12123', 13),
(3, 'admin', 'admin', 'admin', 123),
(4, 'hongloi12123@gmail.com', 'Hongloi12123', 'Hongloi12123', 123);

-- --------------------------------------------------------

--
-- Table structure for table `accountmanager`
--

DROP TABLE IF EXISTS `accountmanager`;
CREATE TABLE IF NOT EXISTS `accountmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountmanager`
--

INSERT INTO `accountmanager` (`id`, `photo`, `username`, `password`, `Phone`) VALUES
(16, '1609382836cuc.png', 'c', '123', NULL),
(15, '1609382658alo.png', '123', '2', NULL),
(10, '1609381405chinnhoi.png', 'nguuyen', 'nguyyen', 123),
(9, '1609381393heo-wallpapers-pc-19-01-2019 (17).jpg', 'alo', 'alo', 123),
(13, '1609381418ahihi.png', 'a', '1', 1),
(14, '1609381458didien.png', '123', '2', 123),
(17, '1609383075cut.png', '123', '2', NULL),
(18, '1609383203cut.png', '123', '2', NULL),
(19, '1609383595baymau.png', 'ad', 'ad', NULL),
(20, '1609384378chinnhoi.png', '123', '2', NULL),
(21, '1609387672cut.png', '123', '2', NULL),
(22, '1609419399chipchiu.png', '23133', '333', NULL),
(23, '1609419450cuc.png', '123', '2', NULL),
(24, '1609419523didien.png', '3333333', '33', NULL),
(25, '1609419541didien.png', '31231231231', '123123', NULL),
(26, '1609419651chipchiu.png', '333332323', '33', NULL),
(54, '16097465649 (1).png', 'hoho', 'hoho', NULL),
(53, '16097457951 (1).png', 'xxx', 'xxx', NULL),
(55, NULL, 'loinh.41.student@fit.tdc.edu.vn', '12345', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_link`) VALUES
(1, 'Home', 'index.php\r\n'),
(2, 'products', 'products.php'),
(3, 'About', ''),
(4, 'Contact', 'account.php'),
(5, 'Account', 'account.php');

-- --------------------------------------------------------

--
-- Table structure for table `categoryofproducts`
--

DROP TABLE IF EXISTS `categoryofproducts`;
CREATE TABLE IF NOT EXISTS `categoryofproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryofproducts`
--

INSERT INTO `categoryofproducts` (`id`, `category_name`) VALUES
(1, 'Đồ Bộ'),
(2, 'Giày'),
(3, 'Dép'),
(4, 'Quần'),
(5, 'Áo'),
(6, 'Đồng hồ'),
(7, 'Trang sức');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_1`, `image_2`, `image_3`, `image_4`) VALUES
(4, 'STT1.jpg', 'STT2.jpg', 'STT3.jpg', 'STT4.jpg'),
(5, 'GiayUTB1.jpg', 'GiayUTB2.jpg', 'GiayUTB3.jpg', 'GiayUTB4.jpg'),
(6, 'Dep1.jpg', 'Dep2.jpg', 'Dep3.jpg', 'Dep4.jpg'),
(7, 'AoPhong1.jpg', 'AoPhong2.jpg', 'AoPhong3.jpg', 'AoPhong4.jpg'),
(8, 'gallery-1.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 'gallery-4.jpg'),
(9, 'AoThun1.jpg', 'AoThun2.jpg', 'AoThun3.jpg', 'AoThun4.jpg'),
(10, '	\r\nAoNguc1.jpg', '	\r\nAoNguc2.jpg', '	\r\nAoNguc3.jpg', '	\r\nAoNguc4.jpg'),
(11, 'QuanDui1.jpg', 'QuanDui2.jpg', 'QuanDui3.jpg', 'QuanDui4.jpg'),
(12, 'giay-adidas1.jpg', 'giay-adidas2.jpg', 'giay-adidas3.jpg', 'giay-adidas4.jpg'),
(13, 'GiayUTB1.jpg', 'GiayUTB2.jpg', 'GiayUTB3.jpg', 'GiayUTB4.jpg'),
(14, 'SB4_1.png', 'SB4_2.jpg', 'SB4_3.jpg', 'SB4_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images_for_products`
--

DROP TABLE IF EXISTS `images_for_products`;
CREATE TABLE IF NOT EXISTS `images_for_products` (
  `image_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images_for_products`
--

INSERT INTO `images_for_products` (`image_id`, `products_id`) VALUES
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `list_rating`
--

DROP TABLE IF EXISTS `list_rating`;
CREATE TABLE IF NOT EXISTS `list_rating` (
  `products_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `phone`, `address`, `note`, `total`, `create_time`, `last_update`) VALUES
(44, 'Le Van Nghia', 328827134, 'duong so 8, Linh Trung, Thu Duc', 'Giao  trước ngày mai', 12445000, 1609074004, 1609074004),
(51, 'wewe', 34, 'ere', '', 13400000, 1609079861, 1609079861);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `create_time`, `last_update`) VALUES
(14, 44, 5, 2, 5000000, 1609074004, 1609074004),
(15, 44, 7, 1, 375000, 1609074004, 1609074004),
(16, 44, 9, 2, 935000, 1609074004, 1609074004),
(32, 51, 5, 2, 5000000, 1609079861, 1609079861),
(33, 51, 6, 4, 800000, 1609079861, 1609079861);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_photo`, `product_rating`) VALUES
(4, 'BỘ TRANG PHỤC THỂ THAO SST', 'Kiểu dáng thời trang vượt thời gian dành riêng cho trẻ em. Bộ trang phục thể thao này có 3 Sọc kẻ trên tay áo và ống quần khẳng định phong cách adidas Originals đích thực. Chất liệu vải tricot hơi bóng, mềm mại làm từ sợi tái chế mang lại vẻ hiện đại.', 1400000, 'STT1.jpg', 4),
(5, 'GIÀY ULTRABOOST 20', 'Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi.\r\n\r\n', 5000000, 'GiayUTB1.jpg', 4),
(6, 'DÉP QUAI NGANG ADILETTE COMFORT', 'Hồi phục năng lượng cho đôi chân mỏi mệt với mẫu dép quai ngang dành cho nam này. Đôi dép nhẹ với thân dép ôm chân theo công nghệ Cloudfoam Plus nâng niu mỗi bước đi với lớp đệm êm ái. Dép có thiết kế kinh điển với quai ngang mang họa tiết 3 Sọc tương phản.', 800000, 'Dep1.jpg', 4),
(7, 'ÁO PHÔNG RINGER 3 SỌC', 'Khi trời mưa ẩm ướt và còn cả một buổi tập burpee phía trước, bạn sẽ nhận ra giá trị của chiếc áo phông dáng lửng adidas này. Chất vải nhẹ kiểm soát độ ẩm giúp bạn luôn cảm thấy khô ráo. Tay áo bằng vải lưới nổi bật với viền 3 Sọc, cho vẻ ngoài đậm chất thể thao.', 375000, 'AoPhong1.jpg', 5),
(8, 'CTS MULTI TEE', 'Khi bạn đã dành cả tiếng đồng hồ miệt mài gắng sức, xóa tan mọi nghi ngờ và tự nhắc nhở về sức mạnh của bản thân. Khi mồ hôi chảy ròng ròng và cơ bắp dần đau nhức. Bạn chỉ muốn cởi ngay đồ tập ra và khoác lên mình chiếc áo mới sạch sẽ. Chiếc áo thun adidas này giúp bạn tận hưởng trọn vẹn cảm giác mãn nguyện ấy. Dáng áo suông mềm mại xoa dịu những vùng cơ bắp mỏi mệt. Hãy đứng dậy khỏi băng ghế ở phòng thay đồ. Và bước tiếp. Vẫn còn cả một ngày dài đang chờ bạn phía trước.', 500000, 'buy-1.jpg', 4),
(9, 'ÁO THUN ADIDAS Z.N.E.', 'Khi bạn đã dành cả tiếng đồng hồ miệt mài gắng sức, xóa tan mọi nghi ngờ và tự nhắc nhở về sức mạnh của bản thân. Khi mồ hôi chảy ròng ròng và cơ bắp dần đau nhức. Bạn chỉ muốn cởi ngay đồ tập ra và khoác lên mình chiếc áo mới sạch sẽ. Chiếc áo thun adidas này giúp bạn tận hưởng trọn vẹn cảm giác mãn nguyện ấy. Dáng áo suông mềm mại xoa dịu những vùng cơ bắp mỏi mệt. Hãy đứng dậy khỏi băng ghế ở phòng thay đồ. Và bước tiếp. Vẫn còn cả một ngày dài đang chờ bạn phía trước.', 935000, 'AoThun1.jpg', 2),
(10, 'ÁO NGỰC ULTIMATE', 'Siêu nâng đỡ, siêu thoải mái. Mẫu áo ngực thể thao này đem lại độ hỗ trợ vận động tối đa. Từ đai áo mềm mại đến dây áo có đệm, từng chi tiết nhỏ đều được thiết kế để đem đến cho bạn cảm giác thoải mái nhất có thể. Thiết kế với khóa kéo ở phía trước giúp dễ dàng mặc vào cởi ra. Hỗ trợ vận động nặng Mẫu áo ngực này là lựa chọn lý tưởng cho các môn chạy bộ, HIIT hoặc bất cứ ai muốn có độ hỗ trợ vận động tối đa Luôn sẵn sàng Chất liệu vải AEROREADY thấm hút mồ hôi để bạn luôn khô ráo và thoải mái Tùy chỉnh độ vừa vặn Điều chỉnh dây áo đan chéo chữ X sau lưng để vừa với bạn nhất', 1190000, 'AoNguc1.jpg', 5),
(11, 'QUẦN SHORT CELEBRATION', 'Mỗi đường chạy đều bao hàm cả chiến thắng và thất bại. Khi bạn luôn thoải mái nhờ chiếc quần short chạy bộ này, bạn sẽ dễ dàng trân trọng hành trình ấy hơn. Công nghệ AEROREADY thoát ẩm và kiểu dáng giúp bạn tự do vận động trong từng sải bước. Các mảng phối họa tiết graphic thể hiện niềm tự hào adidas mạnh mẽ.', 700000, 'QuanDui1.jpg', 4),
(12, 'GIÀY ĐÁ BÓNG ADIDAS', 'Đặc điểm giày đá bóng Future 5.1 sân cỏ nhân tạo\r\n➡️ Cổ thun được thiết kế dệt nguyên bản, bảo về cổ chân cho người chơi,cũng như chống lực cổ chân\r\n\r\n➡️ Bề mặt sản phẩm được làm bằng da Microfiber cao cấp kết hợp lớp TPU tạo độ bền chắc chắn, chịu lực tốt chống thấm nước tốt, thuận tiện khi vệ sinh hoặc lau chùi giày.\r\n\r\n➡️ Phần upper là những lớp vân 3D đan xen lẫn nhau giúp tiếp xúc bóng, chạm bóng, dứt điểm bóng xoáy trở nên dễ dàng hơn.\r\n\r\n➡️ Đế giày làm từ cao su kép cao cấp có độ bền cao.\r\n\r\n➡️ Phía bên trong giày có lớp lót mềm mại, thoáng khí.\r\n\r\n➡️ Form giày ôm chân, giúp người có cảm giác bóng tốt nhất.\r\n\r\n➡️ Chất liệu nhẹ và bền rất ôm chân, tăng độ bám cho cảm giác bóng tốt hơn.', 600000, 'giay-adidas1.jpg', 3),
(13, 'GIÀY ULTRABOOST 20', 'Ôm sát, vừa vặn như đi tất\r\nCó dây buộc\r\nThân giày bằng vải dệt công nghệ adidas Primeknit\r\nGiày chạy bộ nâng đỡ từ gót đến mũi chân\r\nĐế giữa công nghệ Boost đàn hồi\r\nTrọng lượng: 310 g (cỡ Anh: 5.5)\r\nChênh lệch độ cao đế giữa: 10 mm (gót giày 22 mm / mũi giày 12 mm)\r\nCông nghệ Torsion System tạo độ ổn định\r\nMàu sản phẩm: Core Black / Core Black / Signal Pink\r\nMã sản phẩm: FV8340', 4000000, 'GiayUTB1.jpg', 4),
(14, 'Garmin Vivosmart 4', 'Vivosmart 4 là chiếc vòng đeo tay thông minh thế hệ mới nhất của Garmin. Nếu bạn đang tự hỏi mình còn lại bao nhiêu năng lượng trong viên \"pin cơ thể\" mỗi ngày, thì với sản phẩm mới này của Garmin, câu trả lời sẽ có trong tích tắc. Chiếc Garmin Vivosmart 4 được trang bị một công cụ theo dõi năng lượng pin cơ thể để cho bạn biết khi nào nên sử dụng phần năng lượng đó vào một hoạt động, hay khi nào cần nghỉ ngơi (tính năng body battery).', 2990000, 'SB4_1.png', 3),
(25, '3', '23', 2, '1609397418Untitled-aaa.png', 2),
(26, 'Dead Click', 'Game là dễ ', 3000000, 'chipchiu.png,cuc.png,cut.png', 5),
(29, '11', '23', 123, 'cut.png,didien.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`product_id`, `category_id`) VALUES
(2, 5),
(4, 1),
(6, 3),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 4),
(12, 2),
(13, 2),
(14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sortproduct`
--

DROP TABLE IF EXISTS `sortproduct`;
CREATE TABLE IF NOT EXISTS `sortproduct` (
  `select_sortproduct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`select_sortproduct`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sortproduct`
--

INSERT INTO `sortproduct` (`select_sortproduct`) VALUES
('Default Shop'),
('Short by popularity'),
('Short by price'),
('Short by Rating'),
('Short by Sale');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
