-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2022 at 07:20 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkhuygsu_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `date`, `subject`, `file_name`, `uploaded_on`, `status`) VALUES
(1, '20.05.202', '', 'NCIIPC_Guidelines_V2.pdf', '2020-02-17 18:17:02', '1'),
(2, '10.20.200', 'test', '1280.pdf', '2020-02-17 18:21:19', '1'),
(3, '10.20.200', 'test', '1280.pdf', '2020-02-17 18:23:28', '1'),
(4, '4.10.20220', 'gfdgd', '111219.pdf', '2020-02-17 18:24:12', '1'),
(5, '10.20.2020', 'hjkjh', '9e83fbc6-8c9c-4f7d-9723-a3a48e5c5d39.jpg', '2020-02-17 18:28:53', '1'),
(6, '10.2.2020', 'hhhh', 'C-DAC_LogoTransp.png', '2020-02-17 18:44:13', '1'),
(16, 'zv', 'zvzv', '31format.jpg', '2020-03-19 10:31:10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `image_db`
--

CREATE TABLE `image_db` (
  `prj_catagory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `prj_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `author` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_db`
--

INSERT INTO `image_db` (`prj_catagory`, `prj_name`, `img`, `author`) VALUES
('Event', 'Drawing Competition (Ankan)', 'ankan (1).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (12).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (13).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (14).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (15).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (16).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (17).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (18).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (19).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (2).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (20).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (21).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (22).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (23).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (3).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (4).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (5).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (6).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (7).jpg', '2021-02-15 15:20:00'),
('Event', 'Drawing Competition (Ankan)', 'ankan (8).jpg', '2021-02-15 15:20:00'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (63).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (64).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (65).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (66).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (67).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (68).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (69).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (70).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (71).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (72).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (73).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (74).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (75).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (76).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (77).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (78).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (79).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (80).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (81).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 3', 'paridhan_3-0 (82).jpg', '2021-02-15 16:02:38'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (1).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (10).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (11).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (12).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (13).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (14).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (15).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (16).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (17).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (18).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (19).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (2).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (20).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (3).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (4).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (5).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (6).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (7).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (8).jpg', '2021-02-15 15:12:17'),
('Paridhan', 'Paridhan 6', 'paridhan_6 (9).jpg', '2021-02-15 15:12:17'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (1).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (10).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (11).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (12).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (13).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (14).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (15).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (2).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (3).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (4).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (5).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (6).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (7).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (8).jpg', '2021-02-15 14:05:09'),
('Shikshan', 'Shikshan 1.0', 'shikshan_1 (9).jpg', '2021-02-15 14:05:09'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (12).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (13).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (14).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (15).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (16).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (17).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (18).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (19).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (20).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (21).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (22).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (23).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (24).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (25).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (26).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (27).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (28).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (29).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (30).jpg', '2021-02-15 15:33:03'),
('Event', 'Walkathon 2k18', 'walkathon_2k18 (31).jpg', '2021-02-15 15:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `phone` varchar(10) NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `curr_occupation` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_work` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `joining_reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`name`, `gender`, `dob`, `phone`, `email`, `address`, `curr_occupation`, `other_work`, `joining_reason`, `photo`, `photo_id`) VALUES
('paridhan 2020', 'male', '2021-02-24', '2147483647', 'shibpursristi14@gmail.com', '1sassssssssss', 'dsasasasasasa', 'sadsad', 'zcxx', 'Lighthouse.jpg', ''),

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `prj_catagory` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prj_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `prj_date` date DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `long_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `uploaded_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`prj_catagory`, `prj_name`, `prj_date`, `place`, `thumb_image`, `short_desc`, `long_desc`, `uploaded_on`, `author`) VALUES
('Event', 'Amphan Relief 1.0', '2020-05-24', 'Dumurjala Slum Area', '99011031_3217212001656914_4731859332218486784_n.jpg', 'We went to Dumurjala Slum area where some 60 family lives. The cyclone completely uprooted their homes (jhupri. With no roof and food, they literally came to streets. We distributed packets of some dry foods [including Moori, Biscuits and Chira] and packaged drinking water to them as an initial aid to overcome the sudden mishap. ', '', '2021-04-14 05:11:39', NULL),
('Event', 'Amphan Relief 1.1', '2020-05-25', 'Dumurjala Slum Area', '99138501_3222058937838887_1346923429315477504_n.jpg', 'We couldn’t stay calm as we knew that they needed more help. So we decided to distribute some ration to them and started collecting materials accordingly. On 25th May again we went back to Dumurjala Slum area with some food materials (Rice, Dal, Oil, Potato etc). We genuinely hope that this aid has lowered their sufferings to some extent. ', '', '2021-04-14 05:16:35', NULL),
('Event', 'Amphan Relief 2.0', '2020-06-03', 'Hindalganj', '101850274_3249977828380331_4513766313176334336_n.jpg', 'we left for Minakha of Mohanpur and Sahebkhali of Hingalganj. We distributed 6000 litres of pure drinking water and dry ration, sanitary pads, masks, medicines and other necessary things to more than 300 families of the two areas. We are strongly indebted to Kolkata Festival for giving us the opportunity to work together and send our help to the distressed people. ', '', '2021-04-14 05:34:56', NULL),
('Event', 'Amphan Relief 3.0', '2020-06-07', 'Raidighi', '83129523_3259038177474296_5209558109942112351_n.jpg', 'we made a pledge of helping families by donating water alongside relief materials. Again we collaborated with Kolkata Festival. We decided to send 3000 liters of water to the people of Mathurapur, Raidighi, in South 24 Paragana. On 7th of June, 2020 our team along with the members of Kolkata festival went to Mathurapur and handed over the relief materials to the people of the village.', '', '2021-04-14 05:39:57', NULL),
('Event', 'Amphan Relief 4.0', '2020-06-13', 'Khejuri', '102279709_3274574272587353_431621327404040968_n.jpg', 'we collaborated with Mr. Swarnabha Dey and his group of friends. On 13th June, 2020 we went to Kartik Khali Bajar area of Rasulpur, Khejuri where we provided relief materials (including Rice, Dal, Potatoes, Soybean, Mustard Oil, Sugar, Salt, Soap and Mask) to 200 families residing in the area.', '', '2021-04-14 05:48:33', NULL),
('Event', 'Amphan Relief 5.0', '2020-07-05', 'Khejuri', '106780595_3340952425949537_4427946066076899026_n.jpg', 'For the last installment of our Amphan relief drive we decided to send our help to the people of Ajan Bari, Khejuri, Midnapur. On 5th of July, 2020 we went there with relief materials [including Moori (Puffed Rice), Dal, Soybean, Sugar, Salt, Oil, Biscuit, Sattu, Candle, Matchbox, Soap, Mask] and handed them over to 100 families. ', '', '2021-04-14 05:50:49', NULL),
('Event', 'COVID-19 Relief - I', '2020-04-03', 'Belpahari, Jhargram', '91914899_3092446760800106_2653490023067811840_n.jpg', 'We decided to send Ration of 1 week for 90 families which included Potato (2 kg), Dal (500 gm), Mustard Oil (250 gm), Salt (500 gm), Muri (1 packet), and Soap (1 piece). ', 'We created a COVID Relief Fund with the objective of providing relief to the deprived section in our communities. After the first phase at Howrah, we got a chance to send relief efforts to Belpahari in Jhargram district. We decided to send Ration of 1 week for 90 families which included Potato (2 kg), Dal (500 gm), Mustard Oil (250 gm), Salt (500 gm), Muri (1 packet), and Soap (1 piece). As it was not possible for us to be physically present at the venue due to the lockdown but we are thankful to Mr.Uttam Dutta, Mr. Uttam Sain, Mr. Raju Haldar, Mr.Sourav Das, Mr. Ranjit Bagal, Mr. Nityaprkash Haldar, Mr. Asim Dutta, and Mr. Pintu Dutta of Belpahari Well-Wishers who took the responsibility of distributing the food materials on our behalf on ground. On 3rd April, 2020 the distributions were made.', '2021-04-14 04:57:28', NULL),
('Event', 'Dengue Awareness Rally', '2015-11-15', 'Howrah', 'shibpur_sristi_dengue_awarness_rally.jpg', 'Dengue is one of most dangerous diseases now days. Hundreds of people lost their lives in our state due to this viral outbreak.', 'In this critical condition we agreed to arrange a rally to aware people residing nearby our space. On 15th November 2015 we started our rally from Narikeltala Sporting Club and we covered major areas of Howrah Municipal Corporation (Ward no – 26, 28, 29, 30).', '2020-12-31 12:46:05', NULL),
('Event', 'Donbosco Ashalaym Visit', '2019-02-16', 'Donbosco Ashalayam (Asha Maria), Liluah', 'Capt.jpg', 'we visited Donbosco Ashalayam (Asha Maria) where we met around 60 children', 'we arranged a drawing competition among the children and 1st 2nd 3rd were congratulated with education materials. We also have provided dry food to all the children. Overall with the unanimous effort of our members and volunteers Sristi’s birthday was successfully spent with some smiling faces. Lastly donbosco as always is doing great jobs by saving this kid’s life from a darker future.', '2021-02-14 15:29:58', NULL),
('Event', 'Drawing Competition (Ankan)', '2014-09-07', 'Howrah', 'shibpur_sristi_ankan_.jpg', 'On 7th September,2014 Shibpur Sristi organized a sit and draw competition at Narkeltala Sporting Club at Nabin Senapati Lane, Howrah. ', 'We wanted to provided a platform for budding artist so that they could showcase their talent.', '2020-12-31 12:42:25', NULL),
('Event', 'Food Drive', '2018-02-16', 'Ramkrishnapur Ghat, Howrah', 'DSC_1582.jpg', 'We distributed Food Packets (Chicken, Ruti) to 120 street children.', 'On the occasion of SHIBPUR SRISTI’s birthday (16th FEBRUARY, 2018) we arranged our 1st FOOD DRIVE near RAMKRISHNAPUR GHAT, HOWRAH. We distributed Food Packets (Chicken, Ruti) to 120 street children. They were very happy after receiving these food packets. With the great effort of all volunteers and members we made our 1st FOOD DRIVE successful.', '2021-02-14 14:47:55', NULL),
('Event', 'Food Drive 2', '2018-04-19', 'Ramkrishnapur Ghat. Howrah', 'WhatsApp.jpg', 'We shared our joy with poor children out there by successfully delivering dry foods.', 'On 19th April 2018, we once again reached at Ramkrishnapur Ghat. Howrah. We shared our joy with poor children out there by successfully delivering dry foods. Nearly 120 poor street kids were served on this day. Special thanks to our beloved member Debajyoti Bag for being the sponsor for the event.', '2021-02-14 15:16:12', NULL),
('Event', 'Food Drive 3.0', '2018-11-14', 'Ramkrishnapur Ghat, Howrah', 'Capture1.jpg', 'we provided food packets to about 120 children residing in the slums of Ramkrishnapur Ghat', 'Children are the source of happiness of the society as well as are the future of the country. But children living in the streets fight with poverty and helplessness every day to meet their basic requirements. On the occasion of Children’s Day we at Shibpur Sristi thought of fulfilling one of the requirements of these poor souls. On 14th November, 2018 we provided food packets to about 120 children residing in the slums of Ramkrishnapur Ghat, Howrah. We hope that everything we did for these kids will never be erased from their memories.', '2021-02-14 15:15:09', NULL),
('Event', 'Matrivasa Dibos', '2018-02-21', 'Howrah', 'IMG_20210101_021648.jpg', 'On 21st February,2018 on the occasion of “International Mother Language Day” we organised a recitation and extempore competition to celebrate this special day and show respect to our mother tongue.', 'The first word a child utters is usually in his/her mother tongue. It helps in shaping the character of a child and thus it is our responsibility to preserve it. 21st February holds a very significant place in the language movement of Bangladesh and is now celebrated as \'International Mother Language Day’.Many students from local schools and some recitation centers participated in the competition. At the end of the ceremony, prizes and certificates were provided to the participants. This event was not like our other scheduled events and it was the first time we were doing these sort of thing. We faced many challenges but our efficient volunteers made this event a grand success. It was our way of paying tribute to our mother language and to all those brave hearts who sacrificed their lives fighting for their mother tongue.', '2020-12-31 19:24:10', NULL),
('Paridhan', 'Paridhan 1', '2015-01-04', 'Rashbihari, Kolkata', ',khkh.jpg', 'We distributed winter apparels among 80 under-privileged kids along the pavements of Rashbehari Avenue', 'For this project specifically, we collected used clothes from our locality for this project and the response was quite overwhelming. After collection, the process of sorting those clothes began. Thanks to the efforts of our members we were able to sort the clothes effectively. Also, the last minute donation of 18 jackets from Mr. Diganta Bhowmick, an employee of Howrah Municipal Corporation caught us by surprise. In this regard, we must say that since our 2nd project Mr. Bhowmick has been constantly associated with us and enquires about our progress on a daily basis. Proud to have gained a supporter (we wish more would join us). Overall this project was not only a success but there was an emotional flair to it. Each and every core member worked hard for this project and finally to see the smiles on the faces of those beautiful kids was an enriching experience. Just a thought: “Smiles can’t be bought, not even with a zillion rupees. For, these smiles are even more valuable than the elixir found in heaven.\"', '2020-12-06 05:02:50', NULL),
('Paridhan', 'Paridhan 10', '2019-09-22', 'Medinipur, Purulia & Birbhum\r\n', 'P13.jpg\r\n', 'The initiation that started from 2014, reached its 5th year this year. So we wanted to make this huge and grand. We set the target of bringing smiles to 500 innocent souls.\r\n', 'Durga puja, the festival for all brings a lot of happiness along with it. In this festive season, people go on shopping sprees buying whatever they can. But there are a major section of our society that is left isolated, the one who can not afford to buy these new clothes. Even if they wish to, they cannot integrate themselves in the festivities. They look with curious eyes at the people wearing new clothes and rejoicing the festival from a distance. Here comes our initiation of giving every child an equal chance to enjoy during the time of festivals and trying to include them in the mainstream of society. We provide new clothes to the children belonging to the lower socio-economic groups during Durgapuja every year. The initiation that started from 2014, reached its 5th year this year. So we wanted to make this huge and grand. We set the target of bringing smiles to 500 innocent souls. After setting the target we started looking for suitable places where the children are in dire need. We always want to serve the remote of the remotest areas where basic necessities are not even fulfilled, hence our survey team started their work. A few days after extensive survey, we found our desired places. The committee after a long discussion decided three districts ( Medinipur, Purulia and Birbhum) to carry out our project this year. For our first paridhan project this year, two of our teams went to Medinipur and Birbhum on the same day, that is 22nd October, 2019 in Medinipur we went to two small villages namely Bera and Bagghora, the same place where we have worked last year. The reason for choosing the same place is simply that the people there live in utmost poverty, fighting every day to save their existence. On the day of the project the villagers welcomed us and treated us as their own brother and sister. The children were so happy because they knew that this year too they have Shibpur Sristi with them who will gift them new clothes. When we distributed the new clothes to those children, their joy knew no bounds. It is these smiles that gives us the energy to work harder and boost us to do better work. We distributed around 180 new clothes to the children of Medinipur.\r\n', '2020-12-31 22:56:26', NULL),
('Paridhan', 'Paridhan 11.0', '2019-12-22', 'jiling, sereng, Purulia', 'DSC_0071.jpg', 'While majority of the people wait the whole year for the winter to come so that they can enjoy the different festivals and delicacies, the situation is not the same for everyone.', 'There are many people residing in the remotest areas of the state who battle with the cold every year just because they lack enough woolen garments and blankets to protect them. With the aim of reducing some of their difficulties, we went to Jiling Seren village of Baghmundi, Purulia on 22nd December. We distributed 250 new blankets to 500 people of nearly 90 families residing there. We faced many challenges during the execution of this project but with the support of our efficient volunteers everything went well at the end.', '2021-02-15 16:59:33', NULL),
('Paridhan', 'Paridhan 11.1 (Secret Santa)', '2019-12-25', 'Howrah', '80215835_2869621546415963_3419748150435381248_n.jpg', 'To reduce their immense sufferings, we took an innovative step to become the “Secret Santa” for these less fortunate people. On the night of 25th December, 2019, the members of Shibpur Sristi went out in the streets with sacks on their back.', 'To reduce their immense sufferings, we took an innovative step to become the “Secret Santa” for these less fortunate people. On the night of 25th December, 2019, the members of Shibpur Sristi went out in the streets with sacks on their back.', '2021-04-14 04:25:19', NULL),
('Paridhan', 'Paridhan 2', '2015-10-07', 'Kolkata', 'Untitled-1.jpg', 'Throughout Kolkata we served more than 120 street kids.New set of dresses were distributed among them in four individual rounds.', 'Paridhan 2.0 was an immense success for us.  First round of Puja clothes drive 2015(Paridhan 2.0) was done on 4th October ,2015 near Shibpur Nabanna ,where as the 2nd round was done on 7th October, 2015 at Nandan in Kolkata . For the third and fourth round we took a car and traveled throughout the city to distribute new clothes. In our third round we roamed around south Kolkata and handed out new dresses among kids of pavement dwellers. This round took place on 19th October, 2015. North Kolkata was the place where we did our final round of project on 20th October, 2015. More than 130 set of dresses were distributed. Thanks to all our members and volunteers as we were able to raise almost Rs. 25k of donations. Also their hard work paid off as this project was a monumental success for us. Thanks to all our donors and well wishers. Especially thanks to Mr. Guruprasad Mukhopadhaya for his support and contribution in this project. Just a thought: “Smiles can’t be bought, not even with a zillion rupees. For, these smiles are even more valuable than the elixir found in heaven.”', '2020-12-22 12:01:50', NULL),
('Paridhan', 'Paridhan 3', '2016-10-02', 'Masat, Hooghly ', 'P3.jpg', ' This time we served at Masat (A small village in Hooghly district) on 2nd October. We bring the smile on by providing new clothes to 200 children.', 'So we are back with our pet project Puja Cloth Drive 2016 (PARIDHAN 3.0). This time we served at Masat (A small village in Hooghly district) on 2nd October. We bring the smile on by providing new clothes to 200 children. By selecting the place on the basis of need we found that the students of Masat Vivekananda primary school are really needy and deprived of new clothes in the season of festivals. On the day of Gandhi Jayanti we planned to complete our mission and so we did. With great enthusiasm and co-operation of each individual we made this happen very successfully. We can proudly say that this won’t bring such a massive response both in cash and other aspects unless the help of all our donors, contributors, and especially volunteers like Mr. Guruprasad Mukhopadhaya, who always been there with all his kindness and support, are there.', '2020-12-22 11:42:28', NULL),
('Paridhan', 'Paridhan 4', '2016-12-11', 'Udaynarayanpur', 'P4.jpg', ' We distributed 25 blankets to the poor needy families of Udaynarayanpur Shibpur area.', 'On 11th of Decemmber 2016, we have executed our project which was a part of our clothes drive initiative named as “PARIDHAN”. We distributed 25 blankets to the poor needy families of Udaynarayanpur Shibpur area. For this project specifically, we raised funds from all our members and volunteers and the response was quite overwhelming. Meanwhile the survey for the place selection process was going on. Thanks to the efforts of our members and volunteers we were able to sort the proper place effectively. Also, the involvement of each individual throughout the project was nonpareil and finally on the project day we achieved the smiles on those innocent helpless faces of the beautiful kids and that was genuinely an enriching experience. Lastly one thing which if not mentioned then the entire process will remain incomplete i.e. the way the villagers welcomes us, was beyond our imagination. Even a small token of welcome greeting in the form of “ বাতাসা এবং জল” was so amazing to be witnessed of.', '2020-12-06 11:09:58', NULL),
('Paridhan', 'Paridhan 5.0', '2017-09-10', 'Raipur, Birbhum', 'P5.jpg', 'We provided new clothes to around 170 children there.', 'Just like every year, Durgapuja was round the corner and our search for a suitable place to carry out our Puja project “PARIDHAN 5.0” was on full mode. After an extensive survey we found out a perfect place to perform our activity. On a bright sunny morning of 10th September,2017 we began our journey to Raipur East Netaji Sishu Shikshya Niketan, Birbhum. When we reached there,we were welcomed by the teachers and the locals. The students gifted us some beautiful moments through the cultural program organised by the school teachers. We provided new clothes to around 170 children there. This was the largest number of children we have served so far. It was a very hot humid day and working in such a situation may sometimes become problematic. But at the end of the day when we were returning home, the only thing that remained with us was the hospitality of the school members and the innocent smile of those children. And this is what boosts us to do better job every time.', '2020-12-22 11:42:46', NULL),
('Paridhan', 'Paridhan 5.1', '2017-09-24', 'Rajnagar, Nischintapur ', 'P6.jpg', 'On 24th September,2017 we visited Rajnagar, Nischintapur to execute our project “PARIDHAN 5.1”. Around 80 children were given new clothes.', 'In Bengali their is a common saying \"বারো মাসে তেরো পার্বণ\" which translates into “thirteen festivals in twelve months” and Durgapuja is the greatest of them all. It brings new hope new joy to the hearts of Bengalis. People buy new clothes, shoes, accessories and what not. But there are some people for whom Durgapuja is just like another day of their life. We Shibpur Sristi have always wanted to help these people,mainly the children of rural parts of our state, where buying new clothes is a form of luxury. 2017 Puja project gave us the opportunity to serve another distant area Nischintapur. On 24th September,2017 we visited Rajnagar, Nischintapur to execute our project “PARIDHAN 5.1”. Around 80 children were given new clothes. The response of the children were priceless and every moment of their happiness brought us tears of joy. 2017 Puja project was like reaching a milestone for us, because this year we were able to conduct 2 clothing drive successfully i.e., PARIDHAN 5.0 and PARIDHAN 5.1. And all of this was possible because of the constant support and encouragement of our donors and well-wishers.', '2020-12-22 11:43:00', NULL),
('Paridhan', 'Paridhan 6', '2018-09-15', 'Heria, East Midnapore', 'P7.jpg', ' This time we went back to Heria, East Midnapore where we had conducted our Pre-children’s day project earlier. We provided new warm jackets to the 60 residents of ‘Krishnanagar Anath Sishu Ashram’.', 'Just like food and shelter, cloth is a basic human need. The need for clothes become much important in winter. But there are many people who do not have proper clothes to avoid the chilly winter winds. The success of our first winter drive (Paridhan 5.0) leads us to take up our second winter project PARIDHAN 6.0. This time we went back to Heria, East Midnapore where we had conducted our Pre-children’s day project earlier. We provided new warm jackets to the 60 residents of ‘Krishnanagar Anath Sishu Ashram’. We also provided lunch to the children for that day. This marks our first food drive. When we reached there, the children recognised us at once and welcomed us with a big smile on their face. This became a very special moment for all of us, cause this precious smile and the unending love of the children is what we thrive for. In this project we successfully conduct our 2 major initiative PARIDHAN and FOOD DRIVE.', '2020-12-22 11:43:09', NULL),
('Paridhan', 'Paridhan 7.0', '2018-10-02', 'Lalgarh, West Midnapore', 'P8.jpg', 'On 2 nd October, 2018 our team arrived at three remote villages of Lalgarh– Bagghora, Bera, Shiyarboni, with our small token of gift. We distributed new clothes to nearly 200 children.', 'For our very 1st puja project of the year we chose Lalgarh among the many places we surveyed. The people of Lalgarh, West Midnapore struggles everyday fighting for their livelihoods and their dignity. Despite the difficulties they face in their daily life, they are determined to overcome them. Amidst their hardships, we aim to provide some respite that will bring a ray of happiness in their lives. On 2 nd October, 2018 our team arrived at three remote villages of Lalgarh– Bagghora, Bera, Shiyarboni, with our small token of gift. We distributed new clothes to nearly 200 children. Working in such a place was a little challenging for us, but we overcome every challenges that cross our path and made the very first puja drive of the year a grand success.', '2020-12-22 11:43:19', NULL),
('Paridhan', 'Paridhan 7.1', '2018-10-07', 'Salboni, West Midnapore', 'P9.jpg', ' On 7th October, 2018 we visited Gaighata, Dhyanglashol, Tarinichawk, the three marginal villages of Salboni. We distributed new clothes to nearly 100 children and our commitment of making children smile continues.', 'For our 2nd PARIDHAN this year we went to Salboni, a village of West Midnapore. On Salboni, most families are living Below Poverty Line. People living here belong to different tribe and community and make their livelihood mainly by farming. On 7th October, 2018 we visited Gaighata, Dhyanglashol, Tarinichawk, the three marginal villages of Salboni. We distributed new clothes to nearly 100 children and our commitment of making children smile continues. Getting the stuffs, the children got so happy and started dancing with joy and it was ecstatic to see the smiles on their faces.', '2020-12-22 11:43:26', NULL),
('Paridhan', 'Paridhan 7.2', '2018-10-14', ' Bautipara & Purshura, Hooghly', 'P10.jpg', 'On the auspicious day of Panchami (14th October, 2018) we went to these places and distributed new clothes to around 100 children.', 'There is no great joy than making others smile. With this thought we went on to complete our 3rd and final puja project of the year. This time we went to Bautipara and Purshura, two small villages of Hooghly district. On the auspicious day of Panchami (14th October, 2018) we went to these places and distributed new clothes to around 100 children. Just before the onset of Durga puja we were able to make 100 children happy and be a reason of their joy.', '2020-12-22 11:43:36', NULL),
('Paridhan', 'Paridhan 8', '2018-12-16', 'Jhargram', 'P11.jpg', ' We served 200 families of Rangamati and Tumkashol, two extreme marginal villages of Jhargram distict with approximately 100+ blankets. ', 'There are still families in rural India who are not completely shielded from the vulnerabilities of a harsh winter season. Shibpur Sristi has always taken it as it’s own responsibility to tend some of these deprived families. With an effort to invoke the Christmas and New Years Eve spirit, we at Shibpur Sristi have decided to distribute blankets to people belonging to the Sabar community of Jhargram, West Bengal. We served 200 families of Rangamati and Tumkashol, two extreme marginal villages of Jhargram distict with approximately 100+ blankets. There is no better gift than providing warm clothes to the needy during winter season and there cannot be a bigger satisfaction than saving someone’s life. With this thought, we hope that this winter they were relieved from the extreme environmental condition.', '2020-12-06 13:05:00', NULL),
('Paridhan', 'Paridhan 9', '2019-07-14', 'Kendapara', 'P12.jpg', 'We at Shibpur Sristi have decided to distribute old clothes to people belonging to Kendapara , West Bengal.', 'There are still families in rural India who are not completely shielded from the vulnerabilities of a harsh monsoon season. Shibpur Sristi has always taken it as it’s own responsibility to tend some of these deprived families.We at Shibpur Sristi have decided to distribute old clothes to people belonging to Kendapara , West Bengal. There is no better gift than providing  clothes to the needy during monsoon season and there cannot be a bigger satisfaction than saving someone’s life. With this thought, we hope that this monsoon they were relieved from the extreme environmental condition.', '2020-12-06 13:22:54', NULL),
('Event', 'Pre Children’s Day Celebration', '2017-11-12', 'KRISNANAGAR', 'Capture123.JPG', 'We celebrated Pre Children’s Day with the children by providing some dry foods, food materials (Rice, Pulse, Soyabean, Biscuits) and study material to 60 orphans.', 'Our Children’s Day celebration was successful by seeing smile on the innocent faces. A special thanks from us to Mr. Ranjit Sadhukhan for donating food materials to them.', '2021-02-14 15:20:35', NULL),
('Event', 'Sabuj Sankalpa', '2018-06-03', 'Howrah', '34480472_1887231117988349_2747671350129721344_n.jpg', 'On the occasion of World Environmental Day we arranged a rally on 3rd June 2018 where we managed to get a crowd of 100 people who marched with us. We also invited few local NGOs out of which few (Uttaran, Ullol, Morning Icon, Vorsa) joined us on the same.', 'On the occasion of World Environmental Day we arranged a rally on 3rd June 2018 where we managed to get a crowd of 100 people who marched with us. We also invited few local NGOs out of which few (Uttaran, Ullol, Morning Icon, Vorsa) joined us on the same. We are greatful to our guests Mountaineer Mr. Malay Mukherjee and Mr. Kuntal Karar who shared the walk with us. Also we got Mr. Badal Panda on the rally. Post that we distributed 110 saplings to locals and shared awareness on the needs of plantation.', '2021-04-10 15:03:09', NULL),
('Event', 'Sabuj Sankalpa 2019', '2019-06-02', 'Howrah', 'sabuj_sankalpa_thumb_19.jpg', 'This year also we arranged an awareness rally \"Ecofreak\'s March\" on 2nd of June, 2019 on the eve of World Environment Day. We distributed biodegradable plastics to the local medicine and sweet shops and pledged them not to use the regular plastics that we generally get from these shops.', '', '2021-04-14 05:09:21', NULL),
('Shikshan', 'Shikshan 1.0', '2014-06-04', 'Nalpur, Howrah', 'shibpur_sristi_shikshan1_5.jpg', 'We carried out our first project in a BPL enlisted school Nalpur Sishu Kalyan Samiti Prathamik Vidalay in Nalpur', 'This project was the first project under our education drive initiative. We raised money collectively out of our own pockets for this project. We managed to provide educational materials to almost 120 kids ranging from classes 1 to 4. Our main objective was to motivate the young kids at the school so that they value education and use education as a tool to achieve their dreams. Just a thought: “Education is the key to empowerment', '2020-12-30 19:52:21', NULL),
('Shikshan', 'Shikshan 2.0', '2016-02-27', 'Paliarah, Udaynarayanpur', 'shibpur_sristi_shikshan2.jpg', 'We distributed educational materials such as elementary books, exercise books, geometry box (only for class IV students) pen pencil and other necessary stuff.', 'Shikshan 2.0 is just another step for our educational initiative. Total 15 members and volunteers were participated. After distributing materials we conducted a motivational session and detailed survey. A quiz contest was also held and prizes were given accordingly with 126 students.', '2020-12-31 19:28:21', NULL),
('Shikshan', 'Shikshan 3.0', '2016-03-12', 'Shivnarayanchawk, Udaynarayanpur', 'shibpur_sristi_shikshan3.jpg', 'We took a step forward to visit Uttar Shivnarayan Chawk Primary School on 12th March, 2016 to continue with our flagship project “Shikshan”.', 'This time around 12 members and volunteers were present to make this drive an immense success. Along with necessary educational stuffs we have had a great interactive session with them. We came to know about their hobbies and many other things. A motivational speech was also included in the session. Afterword we conducted a quiz contest with 72 students.', '2020-12-31 19:26:49', NULL),
('Event', 'Special Child Visit', '2017-02-27', 'Mallick Fatak, Howrah', 'DSC_0204.jpg', 'Team Shibpur Sristi visited a school of special children. Lion’s Deaf and Mute school it was, situated at Howrah Maidan having 50 special students.', 'Since from the beginning of the journey Of Shibpur Sristi we had the plan to serve these section of society as well so finally managed to find the school and as we the team Shibpur Sristi is a local NGO of that place we planned to make it happen. Art and collage workshop were done on the same day with both of the kind of students we had there. As it was a project with the special children we made sure that all the volunteers and members of the organization visiting the place were fully skilled and prepared themselves with the way of interaction with the kids. Co-operation of the faculties was also remarkable.', '2021-02-14 14:41:21', NULL),
('Event', 'Udvaban', '2020-03-08', 'Sarat Sadan, Howrah', '89148176_3041865872524862_3405556105315614720_n.jpg', 'On our 6th anniversary we decided to organize a one day cultural feast “Udvaban” for our well-wishers and donors. On 8th March, 2020. We published our Digital Magazine - <b>Udvaban</b>', 'sfsfc', '2021-04-14 05:04:19', NULL),
('Event', 'Walkathon 2k18', '2018-03-17', 'Saltlake, Kolkata', 'DSC_1703.jpg', 'We were very pleased to participate in Walkathon 2018 organized by Techno India, Saltlake on 17th March 2018.', 'It was a rally 6km long, started from Techno India Salt Lake campus. The theme of this event was a Protest Against Child Labour. It was really a privilege to find other NGO’s like CRY, The Hope Foundation India, You N Society, Wall o Books, Helping Hand stepped together in this noble mission. As we are very concerned about children and their future this event helped us to show our stand against this major social problem.', '2021-02-14 15:00:06', NULL),
('Event', 'World Environment Day Celebration', '2017-06-05', 'Howrah', 'shibpur_sristi_enviroment_day2017.jpg', 'As we all are the part of our environment, it isPrime job to take care of our environment. On 5th June, 2017 we distributed 200 saplings to the pedestrian.', 'With this small contribution towards our environment we celebrated this day. We made our Green Pledge the co-operation of all Sristians. Total Expenses: Rs. 2,985/', '2020-12-31 19:24:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`name`, `email`) VALUES
('hello', 'world'),

-- --------------------------------------------------------

--
-- Table structure for table `udvaban_track_visitor`
--

CREATE TABLE `udvaban_track_visitor` (
  `id` int(20) NOT NULL,
  `edition_id` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `visitor` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `udvaban_track_visitor`
--

INSERT INTO `udvaban_track_visitor` (`id`, `edition_id`, `title`, `flag`, `visitor`) VALUES
(1, '202003', 'March Edition', 'download', '23'),
(2, '202006', 'June Edition', 'download', '120'),
(4, '202006', 'June Edition', 'view', '90'),
(5, '202009', 'september edition', 'download', ''),
(6, '202009', 'september edition', 'view', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_password`) VALUES
(1, 'john@doe.com', 'John Doe', '$2y$10$vZJy7y4uqQQTRN3zdi2RE.5ZJJzGEEPnzEjFXm4nEOx023XQ2Qe..');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_db`
--
ALTER TABLE `image_db`
  ADD PRIMARY KEY (`prj_name`,`img`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`dob`,`phone`,`email`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`prj_name`);

--
-- Indexes for table `udvaban_track_visitor`
--
ALTER TABLE `udvaban_track_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `udvaban_track_visitor`
--
ALTER TABLE `udvaban_track_visitor`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
