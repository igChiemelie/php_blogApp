-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2022 at 10:12 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `article` text NOT NULL,
  `userId` int(11) NOT NULL,
  `catId` int(3) NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fileName` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `article`, `userId`, `catId`, `datePosted`, `fileName`) VALUES
(5, 'BREAKING: ASUU WALKS OUT ON FEDERAL GOVT OFFERS.', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam ', 1, 4, '2020-11-27 00:00:00', NULL),
(6, 'NIGERIA REJECT CORONA-VIRUS VACCINE.bc', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio ', 2, 5, '2020-11-27 00:09:00', NULL),
(7, 'LOANS AND GRANTS OPPORTUNITY FOR FARMERS.', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Mo', 2, 7, '2020-11-27 00:27:00', NULL),
(8, 'RONALDO SET TO REJOIN MAN UNITED AS MESSI JOINS CITY.', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumq', 3, 1, '2020-11-27 00:42:00', NULL),
(9, 'cyril bbn naija 2021', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumq', 1, 2, '2020-11-30 00:00:00', NULL),
(12, 'ALOBA NDI OCHI', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias nostrum cupiditate ut cum, eveniet corporis adipisci dolore architecto sit sunt explicabo quae, voluptatum, repellat maxime possimus itaque voluptatibus excepturi impedit dicta ipsum odio neque harum fugit voluptates. Quibusdam tenetur facere quas vel earum totam repellendus esse perspiciatis voluptatibus deleniti rem reprehenderit ut quasi non, laudantium labore harum tempora voluptatem, accusamus magnam itaque aspernatur. Voluptatibus qui, corporis modi natus tempore in nihil mollitia excepturi placeat officiis eligendi fugit molestiae dignissimos ipsa adipisci? Iure porro perspiciatis pariatur ut vero cupiditate sint minima esse nulla voluptate quos aperiam facere cum voluptatibus necessitatibus repellendus, blanditiis ratione obcaecati. Distinctio vel sed sequi amet consequatur quidem porro voluptates rerum non aspernatur totam quis quia nesciunt facere explicabo qui animi in, repellendus reiciendis impedit, repellat ipsa atque ipsum. Architecto a iure dolore neque magnam recusandae aspernatur quibusdam quidem voluptates laudantium? Similique voluptates, placeat voluptatibus ab quae, fuga, quam aperiam laborum delectus minima sapiente amet cupiditate consequatur reprehenderit. Esse placeat nulla impedit, iure totam, blanditiis, assumenda quibusdam earum quaerat velit nemo reprehenderit illo commodi voluptatum ea! Accusantium officia ad ipsam recusandae voluptatibus fuga dicta aspernatur assumenda, reprehenderit sed enim, cupiditate laudantium exercitationem, et saepe corporis. Magnam veritatis quia non eveniet, eligendi quae consequatur pariatur nam, fugit corrupti dolorum accusantium quidem incidunt necessitatibus nulla odit rerum quam corporis alias. Odit illo eius id eum qui molestiae natus. Aperiam harum temporibus eos in maiores optio voluptate numquam reiciendis placeat officiis nostrum ratione odio possimus, ipsam ea et! Consequuntur accusantium asperiores fuga, saepe minima error repudiandae. Numquam cum eum amet quaerat natus quos, eius assumenda ipsam consequatur repudiandae adipisci ratione pariatur odio enim impedit maxime explicabo omnis labore, esse voluptatem, doloribus excepturi sed? Illum voluptatem hic officia debitis architecto voluptates culpa ipsam, incidunt quasi accusamus earum nostrum dolorem doloribus rerum possimus sunt error? Blanditiis id quod a explicabo corrupti magnam sunt quas minus, ducimus cupiditate quisquam, facilis numquam accusantium dicta eligendi placeat labore beatae impedit harum enim veritatis! Inventore provident quibusdam earum a, rerum fuga itaque molestias perspiciatis vel laboriosam, illum minus animi tempora nostrum maiores reprehenderit totam! Ex, excepturi enim? Minus pariatur molestiae voluptas saepe similique voluptatem nesciunt natus enim, deleniti magni hic libero, est, totam iure optio ratione unde deserunt tempora. Quam nostrum error nobis reiciendis aut incidunt porro commodi pariatur sed earum suscipit beatae nisi deleniti veniam corporis consectetur corrupti ducimus fugit officiis ullam, maxime dolor sit! Officiis?\n', 1, 2, '2020-11-30 00:08:00', NULL),
(13, 'olisa onye oru', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio ', 1, 2, '2020-11-30 00:32:00', NULL),
(14, 'onye alisa', 'CIW    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio ', 1, 7, '2020-11-30 00:54:00', NULL),
(15, 'CONFIRM', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio ', 1, 3, '2020-11-30 00:59:00', NULL),
(16, 'EMELIE', '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla a nisi amet, eum adipisci harum explicabo cumque. Optio id praesentium ea deleniti. Molestiae, sed eius explicabo libero quod facilis minima repudiandae iste animi adipisci veniam optio ', 1, 5, '2020-11-30 03:00:00', NULL),
(28, 'EMELIE ONYE GAME', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.  ', 1, 4, '2020-12-07 03:05:38', NULL),
(29, 'BRUNO FERNANDEZ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, vel eligendi. Eius odio, cumque aliquam illo recusandae ipsum dicta delectus, sapiente in fugit placeat tempore beatae ab doloremque! Modi officia ducimus obcaecati enim tempore cupiditate iusto architecto maxime iure impedit?\n', 1, 1, '2020-12-07 03:12:16', NULL),
(31, 'wwwwww', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est repellat, similique error maiores numquam fuga sit corrupti officia, nesciunt incidunt rerum quam asperiores magni odit, veniam ab reiciendis porro esse molestiae iste. Magnam rem expedita voluptatem a, fugit excepturi sequi cupiditate sed tempore ea est ipsam quia inventore incidunt officia obcaecati recusandae pariatur veniam aspernatur sunt! Nesciunt delectus cupiditate illo sapiente accusamus. Necessitatibus, eligendi iste! Quidem ad iusto odit reiciendis voluptatem, explicabo quasi velit sit, voluptatum nobis ipsam natus dolorem.\r\n', 1, 5, '2020-12-10 08:34:01', '2_image_1442940311_922021_WorshipHandsBlue.jpg'),
(36, 'rw1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est repellat, similique error maiores numquam fuga sit corrupti officia, nesciunt incidunt rerum quam asperiores magni odit, veniam ab reiciendis porro esse molestiae iste. Magnam rem expedita voluptatem a, fugit excepturi sequi cupiditate sed tempore ea est ipsam quia inventore incidunt officia obcaecati recusandae pariatur veniam aspernatur sunt! Nesciunt delectus cupiditate illo sapiente accusamus. Necessitatibus, eligendi iste! Quidem ad iusto odit reiciendis voluptatem, explicabo quasi velit sit, voluptatum nobis ipsam natus dolorem.\r\n', 1, 6, '2020-12-10 09:00:08', '11963309_images21_jpeg_jpegad5f22f11d0ef5eb2559157b08d9e524.jpg'),
(37, 'arrrr', 'rewgewew', 1, 8, '2020-12-19 22:18:00', 'images.jpg'),
(39, 'error', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem esse quae labore at quia molestias, ab qui facilis quam soluta harum eligendi libero dignissimos, tempora ipsam, debitis dolore voluptatum ipsa exercitationem eaque. Officia, rem. Molestiae accusamus quae omnis, earum dolorum cupiditate architecto commodi perferendis magni consequuntur nobis aliquam sed error quasi, dignissimos alias nemo fugiat ipsam aspernatur amet. Unde nobis, nulla qui dignissimos esse nesciunt. Non dolore perferendis odio, minima fuga a ducimus itaque repellat culpa officiis deleniti corrupti eos?\r\n', 45, 6, '2020-12-24 15:53:48', 'images.jpg'),
(40, 'Fff', 'new Vue({\n  el: \'#app\',\n  data: {\n    image: \'\'\n  },\n  methods: {\n    onFileChange(e) {\n      var files = e.target.files || e.dataTransfer.files;\n      if (!files.length)\n        return;\n      this.createImage(files[0]);\n    },\n    createImage(file) {\n      var image = new Image();\n      var reader = new FileReader();\n      var vm = this;\nâ€‹\n      reader.onload = (e) => {\n        vm.image = e.target.result;\n      };\n      reader.readAsDataURL(file);\n    },\n    removeImage: function (e) {\n      this.image = \'\';\n    }\n  }\n});', 1, 3, '2021-08-03 21:23:54', 'IMG_20210803_100826.jpg'),
(41, 'https://youtu.be/RyTRgQ7k6QE', 'https://youtu.be/RyTRgQ7k6QEhttps://youtu.be/RyTRgQ7k6QE', 1, 9, '2021-08-25 13:17:12', 'FB_IMG_16289387740906526.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'SPORTS'),
(2, 'ENTERTAINMENT'),
(3, 'ARTS'),
(4, 'POLITICS'),
(5, 'HEALTH'),
(6, 'MINING'),
(7, 'AGRICULTURE'),
(8, 'OIL & GAS'),
(9, 'RELIGION');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `comment` varchar(150) NOT NULL,
  `userId` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `datePosted` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `userId`, `articleId`, `datePosted`) VALUES
(26, ' emelieChi', 1, 7, '2021-05-26 07:16:58'),
(27, 'ehdfhffj', 1, 7, '2021-05-26 07:24:53'),
(28, 'bbb', 1, 7, '2021-05-26 07:27:50'),
(29, 'messs', 1, 7, '2021-05-26 07:29:30'),
(30, 'ronaldo', 1, 7, '2021-05-26 15:30:25'),
(31, 'xnjxf', 1, 7, '2021-05-26 15:39:20'),
(32, 'bbbbihuil', 1, 7, '2021-05-26 15:54:56'),
(33, 'how re you', 1, 7, '2021-05-26 15:57:31'),
(34, 'FGXNFNCVM', 1, 7, '2021-05-26 16:10:55'),
(35, 'sd;nczxdcl', 1, 7, '2021-05-26 16:12:48'),
(36, 'vc', 1, 7, '2021-05-26 16:13:18'),
(37, 'HOW RE YOU ? I HPOH', 1, 5, '2021-05-26 16:31:22'),
(38, 'dcdffvfwwsws', 1, 37, '2021-06-02 14:58:32'),
(39, 'swwwwwwwsww', 1, 37, '2021-06-02 14:58:58'),
(40, 'nwa uko', 1, 36, '2021-07-14 18:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(3) UNSIGNED NOT NULL,
  `state` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa-ibom'),
(4, 'Anambra');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `othername` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `gender` enum('M','F') NOT NULL,
  `stateId` int(3) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `othername`, `password`, `gender`, `stateId`, `dateCreated`) VALUES
(1, 'emelie', 'chiemelie', 'ezehigc@gmail.com', 'ig', '12345', 'M', 4, '2020-11-27'),
(2, 'Amaka', 'obi', 'ama@gmail.com', 'ami', '1234', 'F', 1, '2020-11-27'),
(3, 'olisa', 'raymond', 'olisa@gmail.com', 'ray', '1234', 'M', 3, '2020-11-27'),
(4, 'ig', 'chiemelie', 'ezehigc@gmail.com', 'chiemelie', '1234', 'M', 4, '2020-11-27'),
(5, 'chiemelie', 'lil', 'igc@gmail.com', 'chiemelie', 'vvvv', 'M', 4, '2020-12-02'),
(6, 'vivian', 'chiemelie', 'igchiemelie@gmail.com', 'rrrrrr', '123456', 'M', 4, '2020-12-07'),
(7, 'emmy', 'lil', 'igchiemelie@gmail.com', 'rrrr', 'xxx', 'M', 4, '2020-12-07'),
(10, 'nnnnn', 'nnnn', 'kkkc@gmail.com', 'nnnnn', '123', 'M', 4, '2020-12-24'),
(11, 'wdede', 'dfefeef', 'ofoegbuchidalu111@gmail', 'wedewdw', 'dalu111', 'M', 4, '2021-06-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
