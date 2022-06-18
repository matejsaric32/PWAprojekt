-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 01:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `kategorija` varchar(255) NOT NULL,
  `vrijemeObjave` datetime NOT NULL,
  `slika` varchar(255) NOT NULL,
  `sazetak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `naslov`, `kategorija`, `vrijemeObjave`, `slika`, `sazetak`) VALUES
(120, 'Od idućeg tjedna novi rast cijena goriva?', 'Economie', '2022-06-16 20:17:19', 'https://ip.index.hr/remote/indexnew.s3.index.hr/04bee4db-fedf-416f-84b1-1ce059a6c871.jpg?width=765&height=510', 'Novi skok cijena'),
(121, 'Jako nevrijeme pogodilo Sloveniju', 'Monde', '2022-06-16 20:18:23', 'https://ip.index.hr/remote/indexnew.s3.index.hr/bd0fcb80-b2cf-4062-a502-c4f12f0e1e51.jpg?width=765&height=402', 'VRUĆ i sparan četvrtak u Sloveniji rashladili su lokalni pljuskovi i nevrijeme. Najgore je bilo u Štajerskoj, Koruškoj te na istoku i jugoistoku Slovenije.'),
(122, 'Novi ukrajinski zahtjev za oružjem od SAD-a mogao bi jako utjecati na Hrvatsku vojsku', 'Economie', '2022-06-16 20:19:26', 'https://ip.index.hr/remote/indexnew.s3.index.hr/0e2e4efd-bc78-4dc3-91e3-bb6eef919a17.jpg?width=765&height=431', 'Samo SAD u kratko vrijeme može poslati puno oružja'),
(124, 'A man in Lego City just can’t take it anymore', 'Monde', '2022-06-18 13:02:41', 'https://i.pinimg.com/736x/33/1d/6d/331d6d029a5a93396cc9a0a5a75cfe74.jpg', '#IHATEPHP'),
(125, 'Among Us – Red was not an imposter', 'Monde', '2022-06-18 13:04:04', 'https://i.pinimg.com/564x/9b/37/c3/9b37c3db8f21e7c4bd72468d6b97afa7.jpg', 'SUSSYYYY'),
(126, 'AMOGUS', 'Monde', '2022-06-18 13:21:57', 'https://i.pinimg.com/736x/f2/0f/cd/f20fcdca1fd94196313ff660e9e7c4fd.jpg', 'sUs'),
(127, 'Among Us is great, my fav part is…', 'Economie', '2022-06-18 13:23:17', 'https://i.pinimg.com/564x/b7/78/d3/b778d30b618c540a4c9bdafd756e26ed.jpg', 'RED'),
(128, 'Among Us in a nutshell', 'Economie', '2022-06-18 13:24:27', 'https://i.pinimg.com/564x/ec/58/2a/ec582ad1f52eb05b71e993a8961d0ca9.jpg', 'nutshell'),
(129, 'Among Us – Oh Hi Mark', 'Monde', '2022-06-18 13:25:28', 'https://i.pinimg.com/564x/40/f5/03/40f503c0fb06bed79c1113ae1ac8c51e.jpg', 'Yo'),
(130, 'Ben Shapiro playing Among Us', 'Monde', '2022-06-18 13:26:50', 'https://i.pinimg.com/564x/74/2d/4a/742d4ac1487db4d3a281c15392a4ebba.jpg', 'idk'),
(131, 'A MAN HAS BEEN SPOTTED PROTESTING IN LEGO CITY', 'Monde', '2022-06-18 13:30:43', 'https://i.pinimg.com/564x/b8/d9/c2/b8d9c2bc2c7e4d2acf2688f7cde2813c.jpg', 'CCP'),
(132, 'Beutifuly day on Tiananmen Square', 'Economie', '2022-06-18 13:35:05', 'https://preview.redd.it/u1qbo5r6x2y21.jpg?auto=webp&s=5ca8887a5e17de1f3b898cca8fb8b9d69b00265b', '[REDACTED]'),
(133, 'Where was the Paw Patrol during the Iran Hostage Crisis?', 'Monde', '2022-06-18 13:41:36', 'https://preview.redd.it/cpyps4llz2021.jpg?auto=webp&s=923a51899345e2d4a5d8da17148b002309c423a7', 'What?');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `pass`, `razina`) VALUES
(10, 'admin', '$2y$10$YNxGdEAzhSeXaDHARx1Lk.s3ypbYqbhGAcypYsBcQcOlwLrYET9qm', 2),
(11, 'guest', '$2y$10$UgHUrnLgAU6ENk9QehbLE.dO/nSIUoSOFaKHkTuuTplryPepXGwFy', 1),
(14, '', '$2y$10$V8GMylm25P8aLTvKxB9whuvZQ7OHPacCGGeYNcF3VdETgZYsQCvD.', 1),
(15, 'guest1', '$2y$10$6JGU38ocKAHrqQhe5Hrvce8GJLJqRizQLXjuYUQGhHr7XmTy2xxo2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paragrafi`
--

CREATE TABLE `paragrafi` (
  `id` int(11) NOT NULL,
  `idClanak` int(11) NOT NULL,
  `textParagrafa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paragrafi`
--

INSERT INTO `paragrafi` (`id`, `idClanak`, `textParagrafa`) VALUES
(67, 120, 'Kako doznaje Nova TV, cijene će od utorka vjerojatno opet rasti. Naime, ako bi se korekcija cijena dogodila danas  Eurosuper bi bio skuplji za 71 lipu te bi cijena po litri iznosila 14,20 kuna, dok bi oba dizela, i eurodizel i plavi, rasla za gotovo kunu i pol te bi bili 14,52 kune, odnosno gotovo 11 kuna po litri.'),
(68, 120, 'Vlada je 7. lipnja, podsjetimo, na telefonskoj sjednici smanjila marže distributera za dodatnih deset lipa po litri pa je tako marža za benzinska i dizelska goriva smanjena sa 75 lipa na 65 lipa po litri, a za plavi dizel s 50 na 40 lipa po litri. Ujedno je vlada smanjila trošarine na benzinska i dizelska goriva, i to na benzin za dodatnih 40 lipa po litri, što je ukupno za 80 lipa, a za dizel za dodatnih 20 lipa ili ukupno 40 lipa.'),
(69, 120, 'Potpredsjednik vlade i ministar financija Zdravko Marić ocijenio je tada kako se vladinim mjerama sniženja trošarina na benzin i dizelsko gorivo te ograničavanjem marži daje doprinos da cijene derivata ovaj tjedan dodatno ne rastu, a vjeruje da zbog tih mjera ne bi trebalo doći do poremećaja u opskrbi.'),
(70, 121, 'Aktivirana su i profesionalna i dobrovoljna vatrogasna društva jer se, kako navode slovenski mediji, događaji velikih razmjera bilježe na više od 20 lokacija: nevrijeme je izazvale bujične poplave, poplavljeni su neki objekti, odroni su zatvorili neke ceste, srušena su mnoga stabla.'),
(71, 121, 'Uprava Republike Slovenije za civilnu zaštitu i pomoć u katastrofama već javlja o problemima na području Dravograda, Maribora, Podvelke, Prevalja, Ruša, Radelj ob Dravi, Lovrenca na Pohorju, Ravne na Koroškem, Selnica ob Dravi, Starše i na području općina Hoče-Slivnica i Rače-Fram.'),
(72, 121, 'Aktivirana su profesionalna vatrogasna društva i dobrovoljna teritorijalna vatrogasna društva. Jedinice još nisu objavile broj ozlijeđenih, javljaju 24ur.com'),
(73, 121, 'Načelnica općine Črna na Koroškem u međuvremenu je na društvenoj mreži podijelila i fotografije odrona.'),
(74, 122, 'S obzirom na to da je dužina bojišta u Ukrajini duža od 1500 kilometara te da ruska vojska ima prevlast u količini naoružanja, ali ne i u kvaliteti, ovako veliki brojevi su razumljivi. No s obzirom na to da su se skoro sve vojske NATO saveza znatno smanjivale od 1991. godine i raspada SSSR-a, teško da će se na Zapadu naći takva količina naoružanja. I to u rokovima koji bi Ukrajinci željeli (tjedni, najviše mjeseci a ne godine).'),
(75, 122, 'Britanski Independent objavio je tekst u kojem se pobliže objašnjava što ukrajinski popis obuhvaća. Kijevu je jasno da tako velike isporuke oružja u kratko vrijeme mogu doći samo iz Sjedinjenih Američkih Država, pa ne čudi da su na popisu skoro isključivo američki borbeni sustavi.'),
(76, 122, 'Što se tiče 300 višecijevnih lansera raketa, nema nikakvog iznenađenja. Ukrajinci žele samovozne sustave M270 MLRS i M142 HIMARS. S obzirom na to da je ta brojka najmanja, vjerojatno je i najrealnija. Međutim, brojka od 300 primjeraka teško da će biti dostignuta jer je to otprilike 1/3 ukupnog broja tih sustava u američkoj vojsci.'),
(79, 124, 'A man has fallen into depression in Lego city'),
(80, 124, 'Start taking anti-depressants'),
(81, 124, 'hey.... (he says lifelessly to his wife and friends)'),
(82, 124, 'Climb to the top of the lego city bridge and say your goodbyes'),
(83, 124, 'Prepare to die, lower your expectations, and off the bridge'),
(84, 124, 'The new suicidal collection from Lego City'),
(85, 125, '. 　　　。　　　　•　 　ﾟ　　。 　　.\r\n.　　　 　　.　　　　　。　　 。　.\r\n.　　 。　　　　　 ඞ 。 . 　　 • 　　　　•\r\nﾟ　　 Red was not An Impostor.　 。　.\r\n\'　　　 1 Impostor remains 　 　　。\r\nﾟ　　　.　　　. ,　　　　.　 .'),
(86, 126, '⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⣤⣤⣤⣤⣤⣶⣦⣤⣄⡀⠀⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⢀⣴⣿⡿⠛⠉⠙⠛⠛⠛⠛⠻⢿⣿⣷⣤⡀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⣼⣿⠋⠀⠀⠀⠀⠀⠀⠀⢀⣀⣀⠈⢻⣿⣿⡄⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⣸⣿⡏⠀⠀⠀⣠⣶⣾⣿⣿⣿⠿⠿⠿⢿⣿⣿⣿⣄⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⣿⣿⠁⠀⠀⢰⣿⣿⣯⠁⠀⠀⠀⠀⠀⠀⠀⠈⠙⢿⣷⡄⠀\r\n⠀⠀⣀⣤⣴⣶⣶⣿⡟⠀⠀⠀⢸⣿⣿⣿⣆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⣷⠀\r\n⠀⢰⣿⡟⠋⠉⣹⣿⡇⠀⠀⠀⠘⣿⣿⣿⣿⣷⣦⣤⣤⣤⣶⣶⣶⣶⣿⣿⣿⠀\r\n⠀⢸⣿⡇⠀⠀⣿⣿⡇⠀⠀⠀⠀⠹⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠃⠀\r\n⠀⣸⣿⡇⠀⠀⣿⣿⡇⠀⠀⠀⠀⠀⠉⠻⠿⣿⣿⣿⣿⡿⠿⠿⠛⢻⣿⡇⠀⠀\r\n⠀⣿⣿⠁⠀⠀⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣧⠀⠀\r\n⠀⣿⣿⠀⠀⠀⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿⠀⠀\r\n⠀⣿⣿⠀⠀⠀⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿⠀⠀\r\n⠀⢿⣿⡆⠀⠀⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⡇⠀⠀\r\n⠀⠸⣿⣧⡀⠀⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⣿⠃⠀⠀\r\n⠀⠀⠛⢿⣿⣿⣿⣿⣇⠀⠀⠀⠀⠀⣰⣿⣿⣷⣶⣶⣶⣶⠶⠀⢠⣿⣿⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⣿⣿⠀⠀⠀⠀⠀⣿⣿⡇⠀⣽⣿⡏⠁⠀⠀⢸⣿⡇⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⣿⣿⠀⠀⠀⠀⠀⣿⣿⡇⠀⢹⣿⡆⠀⠀⠀⣸⣿⠇⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⢿⣿⣦⣄⣀⣠⣴⣿⣿⠁⠀⠈⠻⣿⣿⣿⣿⡿⠏⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠈⠛⠻⠿⠿⠿⠿⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀'),
(87, 127, 'The game is great.my favorite part is YOU DISCONECTED FROM THE SERVER.'),
(88, 127, 'RELIABLE PACKET 1 (size=13) WAS NOT ACK\'D AFTER 7505MS (9 RESENDS)'),
(89, 127, 'haha 10/10 '),
(90, 128, 'get friend'),
(91, 128, 'gift friend game'),
(92, 128, 'play game'),
(93, 128, 'argue for 2 minutes on why you\'re not imposter'),
(94, 128, 'you\'re imposter'),
(95, 128, 'lose friend'),
(96, 128, 'get other friend'),
(97, 128, '11/10 '),
(98, 129, 'I did not kill her, it\'s not true, it\'s bullsh**, I did not kill her, I did not.'),
(99, 129, 'Gets ejected anyways...'),
(100, 129, '*2 imposter remains* '),
(101, 130, 'Now let\'s say hypothetically I was the impostor. How would I get from reactor to medbay in that timespan, from which we saw each other, till you found yellow dead. Also if I were the impostor hypothetically speaking, how would I have finished all my tasks.'),
(102, 131, 'A MAN HAS BEEN SPOTTED PROTESTING IN LEGO CITY\r\nSTART THE NEW MILITARY TANKS\r\n嘿!\r\nBUILD THE TANKS\r\nAND OFF TO TIANANMEN SQUARE\r\nBRING IN THE SOLDIERS\r\nCENSOR THE MEDIA\r\nAND RUN OVER THE STUDENTS\r\nTHE NEW TIANANMEN SQUARE COLLECTION FROM LEGO CITY\r\nsets not available in china'),
(103, 132, '动态网自由门 天安門 天安门 法輪功 李洪志 Free Tibet 六四天安門事件 The Tiananmen Square protests of 1989 天安門大屠殺 The Tiananmen Square Massacre 反右派鬥爭 The Anti-Rightist Struggle 大躍進政策 The Great Leap Forward 文化大革命 The Great Proletarian Cultural Revolution 人權 Human Rights 民運 Democratization 自由 Freedom 獨立 Independence 多黨制 Multi-party system 台灣 臺灣 Taiwan Formosa 中華民國 Republic of China 西藏 土伯特 唐古特 Tibet 達賴喇嘛 Dalai Lama 法輪功 Falun Dafa 新疆維吾爾自治區 The Xinjiang Uyghur Autonomous Region 諾貝爾和平獎 Nobel Peace Prize 劉暁波 Liu Xiaobo 民主 言論 思想 反共 反革命 抗議 運動 騷亂 暴亂 騷擾 擾亂 抗暴 平反 維權 示威游行 李洪志 法輪大法 大法弟子 強制斷種 強制堕胎 民族淨化 人體實驗 肅清 胡耀邦 趙紫陽 魏京生 王丹 還政於民 和平演變 激流中國 北京之春 大紀元時報 九評論共産黨 獨裁 專制 壓制 統一 監視 鎮壓 迫害 侵略 掠奪 破壞 拷問 屠殺 活摘器官 誘拐 買賣人口 遊進 走私 毒品 賣淫 春畫 賭博 六合彩 天安門 天安门 法輪功 李洪志 Winnie the Pooh 劉曉波动态网自由门'),
(104, 133, 'Paw patrol is police propaganda.'),
(105, 133, 'Who\'s the main \"pup\"? That\'s right, you guessed it, Chase. Which \"pup\" experiences the most development? Chase. Who gets the most jobs? Chase again.'),
(106, 133, '\r\nNot on the contrary, who gets the least jobs? You guessed it, Rocky.'),
(107, 133, 'Now, what\'s so significant about Rocky getting low representation within the series? Well two things, Rocky represents recycling and conservation, two ideologies that don\'t exactly like up with the opinions and supporters of the police. Well, so what, only some think like this, what else is amiss? Well, Rocky is a \"mix-breed pup,\" and what do cops perpetrate the most in their crimes? Racism.'),
(108, 133, 'The fact that they put this minority, obviously liberal \"pup\" in the least powerful position, and the obviously purebred police dog in the highest renown only proves this.'),
(109, 133, 'TL;DR don\'t support paw patrol and it\'s insidious agenda to promote police to our children.'),
(110, 133, 'Stay safe reditors!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `paragrafi`
--
ALTER TABLE `paragrafi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClanak` (`idClanak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paragrafi`
--
ALTER TABLE `paragrafi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paragrafi`
--
ALTER TABLE `paragrafi`
  ADD CONSTRAINT `paragrafi_ibfk_1` FOREIGN KEY (`idClanak`) REFERENCES `clanak` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
