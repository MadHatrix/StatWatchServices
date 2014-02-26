--
-- Database: `tempchattery`
--

-- --------------------------------------------------------

--
-- Table structure for table `AllServices`
--

CREATE TABLE IF NOT EXISTS `AllServices` (
  `siteID` char(3) NOT NULL,
  `profitCenter` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(40) NOT NULL,
  PRIMARY KEY (`siteID`,`profitCenter`,`serviceID`)
) ENGINE=InnoDB;

--
-- Dumping data for table `AllServices`
--

INSERT INTO `AllServices` (`siteID`, `profitCenter`, `serviceID`, `serviceName`) VALUES
('NCA', 1, 500001, 'Wash Replacement'),
('NCA', 1, 1000007, 'Outside Works'),
('NCA', 1, 1000008, 'Sparkler+'),
('NCA', 1, 1000009, 'Sparkler+Max'),
('NCA', 1, 1000010, 'The Works'),
('NCA', 1, 1500006, 'Wax Express'),
('NCA', 1, 1500007, 'Works Express'),
('NCA', 1, 1500010, 'Basic Wash'),
('NCA', 1, 1500014, 'Basic Express Wash'),
('NCA', 1, 2500014, 'CTA'),
('NCA', 1, 3500002, 'DELUXE EXTERIOR'),
('NCA', 1, 3500003, 'SUPER EXTERIOR'),
('NCA', 1, 3500004, 'RX TTL SHINE EXT'),
('NCA', 1, 3500009, 'INTERIOR CLEAN'),
('NCA', 1, 3500011, 'COMPLETE DRESSING'),
('NCA', 1, 3500023, 'Tire Shine History'),
('NCA', 1, 3500024, 'Tri Foam History'),
('NCA', 1, 3500025, 'RainX Pkg History'),
('NCA', 1, 3500028, 'RX TTL SHINE FULL'),
('NCA', 1, 3500029, 'SUPER FULL'),
('NCA', 3, 20, 'Lube Chassis'),
('NCA', 3, 32, 'Air Filter'),
('NCA', 3, 35, 'Wiper Blades'),
('NCA', 3, 1000027, '14 Point Service'),
('NCA', 3, 1000028, 'Synthetic Blend O/C'),
('NCA', 3, 1000030, 'High Mileage'),
('NCA', 3, 1000031, 'Full Synthetic O/C'),
('NCA', 3, 1000035, 'SAFETY FEE'),
('NCA', 3, 1500008, 'Oil Filter'),
('NCA', 3, 2000019, 'State Inspection'),
('NCA', 4, 1000013, 'Spot Clean'),
('NCA', 4, 1000014, 'Area Buff'),
('NCA', 4, 1000015, 'Interior Detail'),
('NCA', 4, 1000016, 'Exterior Detail'),
('NCA', 4, 1000017, 'Carpet/Seats'),
('NCA', 4, 1000018, 'Wash Handwax'),
('NCA', 4, 1000019, 'Complete'),
('NCA', 4, 1000020, 'Misc. Detail Charge'),
('NCA', 4, 1000021, 'Carpet Shampoo'),
('NCA', 4, 1000022, 'Seat Shampoo'),
('NCA', 4, 1000023, 'Express Detail'),
('NCA', 4, 1000024, 'Engine Clean'),
('NCA', 4, 1000025, 'Carnuba Wax'),
('NCB', 1, 500001, 'Wash Replacement'),
('NCB', 1, 1000007, 'Outside Works'),
('NCB', 1, 1000008, 'Sparkler+'),
('NCB', 1, 1000009, 'Sparkler+Max'),
('NCB', 1, 1000010, 'The Works'),
('NCB', 1, 1000041, 'PMA-Basic Wash'),
('NCB', 1, 1000042, 'PMA- 2nd Soap'),
('NCB', 1, 1500006, 'Wax Express'),
('NCB', 1, 1500007, 'Works Express'),
('NCB', 1, 1500010, 'Basic Wash'),
('NCB', 1, 1500014, 'Basic Express Wash'),
('NCB', 1, 2500003, 'Good Wash'),
('NCB', 1, 2500014, 'CTA'),
('NCB', 3, 20, 'Lube Chassis'),
('NCB', 3, 32, 'Air Filter'),
('NCB', 3, 35, 'Wiper Blades'),
('NCB', 3, 1000027, '14 Point Service'),
('NCB', 3, 1000028, 'Synthetic Blend O/C'),
('NCB', 3, 1000030, 'High Mileage'),
('NCB', 3, 1000031, 'Full Synthetic O/C'),
('NCB', 3, 1000035, 'SAFETY FEE'),
('NCB', 3, 1000047, 'Ultra Full Synth O/C'),
('NCB', 3, 1500008, 'Oil Filter'),
('NCB', 3, 2000019, 'State Inspection'),
('NCB', 4, 1000013, 'Spot Clean'),
('NCB', 4, 1000014, 'Area Buff'),
('NCB', 4, 1000015, 'Interior Detail'),
('NCB', 4, 1000016, 'Exterior Detail'),
('NCB', 4, 1000017, 'Carpet/Seats'),
('NCB', 4, 1000018, 'Wash Handwax'),
('NCB', 4, 1000019, 'Complete'),
('NCB', 4, 1000020, 'Misc. Detail Charge'),
('NCB', 4, 1000021, 'Carpet Shampoo'),
('NCB', 4, 1000022, 'Seat Shampoo'),
('NCB', 4, 1000023, 'Express Detail'),
('NCB', 4, 1000024, 'Engine Clean'),
('NCB', 4, 1000025, 'Carnuba Wax'),
('NCC', 1, 500001, 'Wash Replacement'),
('NCC', 1, 1000007, 'Outside Works'),
('NCC', 1, 1000008, 'Sparkler+'),
('NCC', 1, 1000009, 'Sparkler+Max'),
('NCC', 1, 1000010, 'The Works'),
('NCC', 1, 1500006, 'Wax Express'),
('NCC', 1, 1500007, 'Works Express'),
('NCC', 1, 1500010, 'Basic Wash'),
('NCC', 1, 1500014, 'Basic Express Wash'),
('NCC', 1, 1500017, 'Basic Express TLFA01'),
('NCC', 1, 1500018, 'Basic Wash TLFA01'),
('NCC', 1, 2500006, 'Sparkler Wash'),
('NCC', 1, 2500014, 'CTA'),
('NCC', 1, 3500009, 'INTERIOR CLEAN'),
('NCC', 3, 20, 'Lube Chassis'),
('NCC', 3, 32, 'Air Filter'),
('NCC', 3, 35, 'Wiper Blades'),
('NCC', 3, 42, 'Serpentine Belt'),
('NCC', 3, 1000027, '14 Point Service'),
('NCC', 3, 1000028, 'Synthetic Blend O/C'),
('NCC', 3, 1000030, 'High Mileage'),
('NCC', 3, 1000031, 'Full Synthetic O/C'),
('NCC', 3, 1000035, 'SAFETY FEE'),
('NCC', 3, 1500008, 'Oil Filter'),
('NCC', 3, 2000019, 'State Inspection'),
('NCC', 4, 1000013, 'Spot Clean'),
('NCC', 4, 1000014, 'Area Buff'),
('NCC', 4, 1000015, 'Interior Detail'),
('NCC', 4, 1000016, 'Exterior Detail'),
('NCC', 4, 1000017, 'Carpet/Seats'),
('NCC', 4, 1000018, 'Wash Handwax'),
('NCC', 4, 1000019, 'Complete'),
('NCC', 4, 1000020, 'Misc. Detail Charge'),
('NCC', 4, 1000021, 'Carpet Shampoo'),
('NCC', 4, 1000022, 'Seat Shampoo'),
('NCC', 4, 1000023, 'Express Detail'),
('NCC', 4, 1000024, 'Engine Clean'),
('NCC', 4, 1000025, 'Carnuba Wax');

-- --------------------------------------------------------

--
-- Table structure for table `CustomServices`
--

CREATE TABLE IF NOT EXISTS `CustomServices` (
  `siteID` char(3) NOT NULL,
  `profitCenter` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  PRIMARY KEY (`siteID`,`profitCenter`,`serviceID`)
) ENGINE=InnoDB;