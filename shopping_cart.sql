--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--


INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00);
--
-- Indexes for dumped tables
--



INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`) VALUES

(33, 'Virgin Mojito', 'VIM033', 'product-images/virginmojito.jpg', 119.00),
(34, 'Pomegranate Spritzer', 'POS034', 'product-images/drink-8.jpg', 119.00),
(35, 'Quick Fruit Punch', 'QFP035', 'product-images/quickfruit.jpg', 119.00),
(36, 'Virgin Margarita', 'VIG036', 'product-images/virginmargarita.jpg', 119.00),
(37, 'Watermelon Lime', 'WAL037', 'product-images/watermelonlime.jpg', 119.00),
(38, 'Coca Cola', 'COA038', 'product-images/cocacola.jpg', 59.00),
(39, 'Fanta', 'FAT039', 'product-images/fanta.jpg', 59.00),
(40, 'Sprite', 'SPR040', 'product-images/sprite.jpg', 59.00),
(41, '7-UP', '7UP041', 'product-images/7up.jpg', 59.00),
(42, 'Lemon Ice Tea', 'LIT042', 'product-images/lemonicetea.jpg', 59.00),
(43, 'Banana Shake', 'BAN043', 'product-images/banana.jpg', 139.00),
(44, 'Mango Shake', 'BAN044', 'product-images/mango.jpg', 139.00),
(45, 'Chocolate Shake', 'CSH045', 'product-images/chocolate.jpg', 139.00),
(46, 'Black Current Shake', 'BCS046', 'product-images/blackcurrant.jpg', 139.00),
(47, 'Strawberry', 'STW047', 'product-images/strawberry.jpg', 139.00),
(48, 'Chocolate Ice Cream', 'CIC048', 'product-images/chocolateice.jpg', 49.00),
(49, 'Strawberry Ice Cream', 'STI049', 'product-images/strawberryice.jpg', 49.00),
(50, 'Vanilla Ice Cream', 'VAN050', 'product-images/vanillaice.jpg', 49.00),
(51, 'Mix Fruit Ice Cream', 'MFI051', 'product-images/mixfruitice.jpg', 49.00),
(52, 'Kulfi', 'KFI052', 'product-images/kulfi.jpg', 49.00),
(53, 'Gulab Jamun', 'GJA053', 'product-images/gulabb.jpg', 59.00),
(54, 'Jalebi', 'JAL054', 'product-images/jalebi.jpg', 59.00),
(55, 'Rabdi', 'RAB055', 'product-images/rabdi.jpg', 59.00),
(56, 'Rasmalai', 'RAS056', 'product-images/rasmalai.jpg', 59.00),
(57, 'Moong Dal Ka Halwa', 'MDH057', 'product-images/moongdal.jpg', 59.00),
(58, 'Chocolate Moose', 'CHM058', 'product-images/chocolatemoose.jpg', 89.00),
(59, 'Red Velvet', 'REV059', 'product-images/redvelvet.jpg', 89.00),
(60, 'Fruit Punch', 'FRP060', 'product-images/fruitpastry.jpg', 89.00),
(61, 'Croissants', 'CRO061', 'product-images/croissants.jpg', 89.00),
(62, 'Swiss Cakes', 'SWS062', 'product-images/swisscake.jpg', 89.00);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
