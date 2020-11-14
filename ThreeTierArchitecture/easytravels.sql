-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 12:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easytravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `aid` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`aid`, `uid`, `username`, `password`, `admin`) VALUES
(1, '0', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, '1', 'user', '2b04927a48b1a3a928f843c0696109b8', 0),
(3, '2', 'user1', '2b04927a48b1a3a928f843c0696109b8', 0),
(4, '3', 'user2', '2b04927a48b1a3a928f843c0696109b8', 0),
(5, '4', 'user3', '2b04927a48b1a3a928f843c0696109b8', 0),
(6, '5', 'user4', '2b04927a48b1a3a928f843c0696109b8', 0),
(7, '6', 'user5', '2b04927a48b1a3a928f843c0696109b8', 0),
(8, '7', 'user6', '2b04927a48b1a3a928f843c0696109b8', 0),
(9, '8', 'user7', '2b04927a48b1a3a928f843c0696109b8', 0),
(10, '9', 'user8', '2b04927a48b1a3a928f843c0696109b8', 0),
(11, '10', 'user9', '2b04927a48b1a3a928f843c0696109b8', 0),
(12, '11', 'user11', '2b04927a48b1a3a928f843c0696109b8', 0),
(13, '12', 'user12', '2b04927a48b1a3a928f843c0696109b8', 0),
(14, '13', 'user13', '2b04927a48b1a3a928f843c0696109b8', 0),
(15, '14', 'user14', '2b04927a48b1a3a928f843c0696109b8', 0),
(16, '15', 'user15', '2b04927a48b1a3a928f843c0696109b8', 0),
(17, '1', 'Hotel1', 'a17e81739b06d6fb43159c920d990979', 3),
(18, '2', 'Hotel2', '39904811f56318ad557392a78c708e9f', 3),
(19, '3', 'Hotel3', 'a87fd9fdf4667374a09837f5147bee46', 3),
(20, '4', 'Hotel4', '9ba3fd831b1ab3e0b16adda1752618a8', 3),
(21, '5', 'Hotel5', 'c2457c5866ec568d3a8cd05b4a2e0a3d', 3),
(22, '6', 'Hotel6', '69ff1f118559333323b5af5010ddbaed', 3),
(23, '7', 'Hotel7', '5627188985d75292bb73888b07d51f9b', 3),
(24, '8', 'Hotel8', '53ca3271ef7f6589761a5ae19c274f93', 3),
(25, '9', 'Hotel9', 'a251a581738b299ed2f01ad5852532dc', 3),
(26, '10', 'Hotel10', '76744dcba7e6a31f9239e96a451c459a', 3),
(27, '11', 'Hotel11', '2346deb5d41fce87d2c827e1af15b761', 3),
(28, '12', 'Hotel12', '9be2be8f81b6baa6876178ddf347a8d2', 3),
(29, '13', 'Hotel13', 'b7a199792d416869907cb813d0d91e9e', 3),
(30, '14', 'Hotel14', 'e3b5be4b30d938ff55b0e5f31b6b3bf3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `photo` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `name`, `photo`) VALUES
(1, 'Family Tours', 1),
(2, 'Religious Tours', 2),
(3, 'Adventure Tours', 3),
(4, 'National Parks ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categorysubcategory`
--

CREATE TABLE `categorysubcategory` (
  `cat-subcatid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorysubcategory`
--

INSERT INTO `categorysubcategory` (`cat-subcatid`, `catid`, `subcatid`) VALUES
(4, 1, 2),
(5, 1, 2),
(6, 1, 2),
(12, 1, 3),
(11, 1, 3),
(10, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `details` text NOT NULL,
  `photo1` int(11) NOT NULL,
  `photo2` int(11) NOT NULL,
  `photo3` int(11) NOT NULL,
  `hotel` varchar(200) NOT NULL,
  `hotelrating` int(11) NOT NULL,
  `guide` varchar(200) NOT NULL,
  `guiderating` int(11) NOT NULL,
  `vehicle` varchar(200) NOT NULL,
  `vehiclerating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destid`, `name`, `description`, `photo`) VALUES
(1, 'Kandy', 'KANDY 114 KM (71 Miles) From Colombo<br /><br />\r\nKandy is one of the most scenic cities in Sri Lanka and lies in the midst of hills. It is the Capital of the Central Province. It is both an administrative ad religious city. Kandy is the second largest city in the country and is frequently visited by Buddhists especially of the Theravada School.<br /><br />\r\nKandy is very famous among tourist for three main reasons: It is home to the sacred tooth relic of the Buddha (Temple of the Sacred Tooth Relic ; Dalada Maligawa ), The Botanical Gardens ( Located in Peradeniya) and it always has a special place when it comes to festivities such as the Esala Perahara.<br /><br />\r\nTooth Relic<br /><br />\r\nThe Temple of the Tooth relic is the place that houses the Relic of the tooth of the Buddha. Originally part of the Royal Palace complex of the Kandyan Kingdom, it is one of the holiest places of worship and pilgrimage for Buddhist around the world. The Palace of the Tooth relic, the palace complex and the holy city of Kandy are associated with the history of the dissemination of Buddhism. The temple is the product of the last peregrination of the relic of the tooth of Buddha and the testimony of a religion which continues to be practiced today.\r\n<br /><br />\r\nParks and Gardens<br /><br />\r\nThe Royal Botanical Garden is the largest botanical garden in the whole island providing residence to over a large variety of plants, some even hundreds of years old.<br /><br />\r\nFestivals (annual pageant)<br /><br />\r\nKandy as stated earlier is also very popular due to the annual pageant known as the Esala Perahera, in which one of the inner caskets used for covering the tooth relic of Buddha is taken in a grand procession through the streets of the city. This casket is taken on a royal tusker. The procession includes traditional dancers and drummers, flag bearers of the provinces of the old Kandyan kingdom, the Nilames wearing their traditional dresses, torch bearers and also the grandly attired elephant. This ceremony which is annually held in the months of July or August attracts large crowds from all parts of the country and also many foreign tourists.\r\nKandy is must for anyone\'s itinerary when visiting Sri Lanka. It is considered one of the most beautiful places in Sri Lanka which at the same time show cases the Sri Lankan Culture at its highest level.\r\n<br /><br />\r\n\r\n', 27),
(2, 'Trincomalee', 'TRINCOMALEE 264 KM (164 Miles) From Colombo<br /><br />\r\nTrincomalee is a port city on the east coast of Sri Lanka. The city is located on a peninsula, which divides the inner and outer harbours.Trincomalee is an anglicized version of the Tamil word Tirukonamalai (which means \"lord of the sacred hill\"); it is a hill situated in the end of a natural land formation that resembles an arc. It is one of the main where Tamil is spoken at large scale. Historically referred to as Gokanna or Gokarna it has been a sea port that has played a major role in maritime and international trading history of Sri Lanka.<br /><br />\r\nThe Bay of Trincomalee provides security and is openly accessible to all types of sea crafts in all weathers. The beaches are used for recreational purposes such as surfing, scuba diving, fishing and whale watching. The city is renowned for housing the largest Dutch fort in Sri Lanka. It is home to major Sri Lankan naval bases and a Sri Lankan Air Force base.<br /><br />\r\nReligious Significance<br /><br />\r\nTrincomalee is considered a very sacred place by the Tamil and Sinhalese. Trincomalee and its surroundings have both Hindu and Buddhist sites of historical importance. These sites are sacred to the Hindus and Buddhists.\r\nIt has been said that King Mahasena destroyed the Sivan Temple and on top of it built a Mahayana temple. Despite the historical rivalries between the two ethnic groups initiated by kings such as Mahasena the Theravada Buddhists have maintained a remarkably peaceful relationship with the Hindus.<br /><br />\r\n\r\nTrincomalee during the colonial era<br /><br />\r\nTrincomalee strategic importance has shaped its recent history. The great European powers vied for mastery of the harbor. The Portuguese, the Dutch, the French, and the English, each held it in turn, and there have been many sea battles nearby.<br /><br />\r\n\r\nHarbour<br /><br />\r\nThe Trincomalee boasts a record as the fifth largest natural harbor in the world In the map Trincomalee isn\'t quite populated a lot and is less developed. However it is used as a commercial seaport.<br /><br />\r\n\r\nRare hot spring wells<br /><br />\r\nThe hot springs in Trincomalee is always a major tourist attraction. There are the seven hot springs of Kanniya on the way to Trincomalee. The seven springs are enclosed by a high wall, each of which is again enclosed and bound by smaller walls to make up wells. The use of the springs for bathing however is under strict control.<br /><br />\r\n\r\n\r\n\r\n\r\n', 28),
(3, 'Nilaveli ', 'NILAVELI 275 KM (171 Miles) From Colombo<br /><br />\r\nNilaveli (Open-land of the moon-shine) is located north-west of the Island. It is one of the most beautiful beaches in Sri Lanka renowned for its soft white sand and breath-taking bays. Nilaveli is famous for recreational water sports such as scuba diving.\r\n<br /><br />\r\nNilaveli Beach\r\n<br /><br />\r\nOne of the finest beaches in Sri lanka, the pearly sands, the breath-taking coastline this is a tangible proof of serenity in our island. It is so unique that the feeling you experience when you see it, is unique itself. One can really connect with nature at this beach at an intense level. This is a place where most people come to take a break from the hectic lives and rejuvenate.\r\nThe beach is ideal to visit durin April and October. The Sun is at its most intense during this period so that you can work out on your tan. Watersports are also a huge feature in this beach, surfing and windsurfing are the major excursions undertaken here. This is a must in everyones itinerary when visiting Sri Lanka.\r\n<br /><br />\r\n\r\n', 29),
(4, 'Ella', '\r\n<br />ELLA 208 KM (129 Miles) From Colombo<br />\r\n\r\nElla, often described as lonely planet and waterfall is a congested town located in Sri Lanka. Ella is pure natural beauty, with its waterfalls, greenery, and hills it is just jaw-dropping. It has views that one has not witnessed before, scenes one has not seen before and nature one has not felt before. Ella is the perfect place to go to if one wants to refresh the brain. It has many famous places and has been under the attention of tourist for a decent amount of time now.\r\n<br /><br />\r\n\r\nElla Rock\r\n<br /><br />\r\n\r\nOne of Ella is wonders is the Ella Rock. Ella rock might be a long way up but it is worth all the struggle. Every day, tons and tons of people go and climb the Ella Rock. This is because of the special view it provides to its climber. The view from the top of the Ella Rock is difficult to put in such simple words.\r\n<br /><br />\r\n\r\nNature\r\n<br /><br />\r\n\r\nElla is filled with nature; everywhere one sees he gets to know why people want to visit Ella so much. The greenery, flowers, gardens all of them shape the beauty of Ella, a shape that is difficult to resist. The environment is fresh and clean.\r\n<br /><br />\r\n\r\nWaterfalls\r\n<br /><br />\r\n\r\nAnother wonder of Ella is its waterfalls. Ravana falls is a very popular waterfall. The refreshing and clean water that slide down on earth. It is one of the most popular sites in Sri Lanka. However, this panorama is just so attractive.\r\n\r\nPeople from all around the world come to visit this place because of its natural beauty and its beautiful outlook.\r\n<br /><br />\r\n', 30),
(5, 'Mirissa ', 'MIRISSA 154 KM (95 Miles) From Colombo <br /><br />\r\n\r\nMirissa is a small heaven located in the South Coast of Sri Lanka, only about 200km away from the Equator. The small town is ever-famous for it\'s natural beaches which are mostly untouched by any man-made modernization, which makes it well-loved and very sought after when it comes to holidays and vacations, even honeymoons.\r\n<br /><br />\r\nMirissa\'s sandy beaches gives life to your fantasies of a tropical heaven, the secluded crescent shaped beach is like a reclusive hidden Island that is a hideaway for many. The town\'s sunsets and sunrises are said to be one of the finest ever, the peace that surrounds people spending time in the hotels set aback from the actual beach is quiet unmeasured. The gentle waves of the ocean crashing and building into a crescendo, coconuts falling and birds chirping. Mirissa is a tourist heaven and must not be missed!\r\n<br /><br />\r\n\r\nMirissa Beach\r\n<br /><br />\r\n\r\nThe sandy beach with it is golden sand and undeniably warming atmosphere with chilled breezes, the perfect combination of hot and cold is a travel location that\'s the envy of many countries.\r\n\r\nThe beach offers the peace you can\'t find elsewhere, the hotels provide the customers with everything that they require; even with many people occupying the beach, the noise and rush is minimum.\r\n<br /><br />\r\n\r\nSurfing at Mirissa\r\n<br /><br />\r\n\r\nMirissa\'s Bay Surf point is famous for smooth surfing; you can surf with no inhibitions and enjoy a carefree ride through the ocean, experiencing it on a level that would be unforgettable for the many years to come.\r\n<br />\r\n\r\nDolphin and Whale Watching\r\n<br /><br />\r\nSri Lanka\'s Navy Passenger Craft called Princess of Lanka was launched in 2011 and since then has been a vessel for people who want to enjoy a profound activity such as Whale Watching.\r\n\r\nA person has a firsthand experiences watching the humongous creatures wriggle about and float underwater, the scene is truly enrapturing. The dolphins are extremely friendly as well, giving people a show of a lifetime. Their packages are reasonable and would suit a average person nicely. The Whale Watching activity is famous among avid tourists.\r\n<br />', 31),
(6, 'Tangalle', 'TANGALLE 195 KM (121 Miles) From Colombo<br /><br />\r\n\r\nAre you looking for the perfect city to be in while being in Sri lanka? Are you looking for a place with the perfect beach? And tourist attractions? A simple answer is this big town in Sri Lanka, Tangalle.\r\nTangalle is a huge town with beautiful attractions and breathtaking views. Tangalle is filled with attractive places and sandy beaches. Just everything you are looking for, Tangalle is fulfilling all the requirements.\r\n<br /><br />\r\n\r\nTangalle Beach\r\n<br /><br />\r\n\r\nOne of the main reasons of its hype and popularity is its alluring beaches which never fail to capture ones attention. It has rough, strong waves. It is beaches are Sri Lanka is reply to heaven. Is not that just delightful? What a perfect way to beat the summer heat with some fresh water. The beaches in Tangalle have a harmonized environment and the sunsets are a must see! The beaches have hotels built as well.\r\nPeople all around the world come to witness the beauty of the beaches that Sri Lanka holds in it.\r\n<br /><br />\r\n\r\nTourist Attractions in Tangalle\r\n<br /><br />\r\n\r\n\r\nTangalle has alot of places one can boast about. It is beautiful zoo that capture the imagine of wildlife so accurately that one can just not forget. Obviously, the flawless beaches and historic places Tangalle is so full of these things.\r\nTangalle never fails to surprise its visitors, it never does. It is just so full of life and happiness one surely doesnt want to return back home.\r\n<br /><br />\r\n', 32),
(8, 'Arugam Bay ', 'ARUGAM BAY 342 KM (212 Miles) From Colombo\r\n<br /><br />\r\n\r\nArugam Bay is in the dry zone of Sri Lanka\'s southeastern drift of the Indian Ocean. The bay is almost of 320 kilometers (200 mi) due east of Arugam Bay, and covers an area of roughly 4 kilometers (2.5 mi) south of the market town of Pottuvil. The primary settlement in the zone, referred to locally as Ullae, is overwhelmingly Muslim, however there is a huge Tamil and Sinhala population towards the south of the town, and additionally various worldwide transients, to a great extent from Europe and Australia.\r\nWhile generally angling has overwhelmed the neighborhood economy, tourism has developed quickly in the zone as of late. Tourism in Arugam Bay is overwhelmed by surf tourism, on account of a few quality breaks in the zone; however visitors are likewise pulled in by the neighborhood shorelines, tidal ponds, noteworthy sanctuaries and the adjacent Kumana National Park.\r\n<br /><br />\r\n\r\nSurfing in Arugam Bay\r\n<br /><br />\r\n\r\nThe Arugam Bay territory is known for its quality surf breaks. The \'Main Point\' is one of the main surfing areas of the Bay found towards the south of the sound. This is a correct hand point break, with a stone/reef base, and has various areas with incidental barrels. Different breaks in the zone incorporate Whiskey Point and Pottuvil Point toward the north, and Elephant Rock, Peanut Farm and Okanda toward the south. These breaks have pulled in a constant flow of worldwide travelers for quite a few years. Arugam Bay has a decent neighborhood surf scene and is home to some of Sri Lanka\'s most gifted surfers and lately surfers from Arugam Bay have ruled national competitions. The first international surfing competition in this bay was held in mid 2010.\r\n<br /><br />\r\n\r\nTourist Attractions in Arugam Bay\r\n<br /><br />\r\n\r\nBesides Surf Breaks, there are many other tourist\'s attraction and visiting spots in the Bay as well. The Kumana National park which is adjacent to the bay is one of the main tourist\'s attraction places of the entire area. The Kumana National Park was known as the Yala East National Park and was named Kumana National park in September 2005. Besides National park, the tidal ponds and sanctuaries present in the place also catches the tourist\'s eyes.\r\n<br /><br />', 34),
(9, 'Damulla', 'DAMBULLA 177 KM (110 Miles) From Colombo\r\n<br /><br />\r\n\r\nSri Lanka is rich and overflowing when it comes to colourful history, many came and went, the essence of the dominance still lingers about in the cities and buildings. From Portuguese to Dutch, Sri Lanka has suffered and bloomed through many events.\r\nDamulla is a large town situated in the Matale district, pretty near to Colombo. It is also given the title of a World Heritage Site. The town\'s most fascinated fact seems to be the time period of it\'s construction, it was built in just 167 days. Bursting with beautiful sites like the ironwood forest, rose quartz mountain, Rangiri Stadium and Na Uyana Aranya, one can\'t exactly pinpoint what this town is most known for.\r\n<br /><br />\r\n\r\nDambulla Cave Temple\r\n<br /><br />\r\n\r\nIt\'s glory is recognised and that is why it holds the title of a world heritage site, Dambulla Cave Temple lies in the central part of the country and is also known as the Golden Temple. People from faraway places come to see the cultural beauty with their own eyes.\r\nInside the caves around the golden temple there are paintings and statues strewn all over, all related to the life of Gautama Buddha, his life and the events that took place in it. Vishnu, Ganesha and Demon-Mara are historic gods and goddesses that also have some paintings and structures sculpted for them, situated in the caves.\r\nIt\'s predicted that the site has 2700 human skeletons buried underneath it.\r\n<br /><br />\r\n\r\nHistory of Dambulla\r\n<br /><br />\r\n\r\nThis historic temple dates way back to first century BCE. The structure can be explained as a overhanging rock looming over five enormous caves.\r\nWhen it was made, it was considered as one of the largest and most essential monasteries. The hands of many Kings and rulers have interfered with the temple, but it still stands and screams the history embedded deep inside every crack of it\'s walls.\r\n<br /><br />', 35),
(10, 'Galle', 'GALLE 128 KM (79 Miles) From Colombo\r\n<br /><br />\r\n\r\nGalle is situated in the southwestern tip of Sri Lanka; it is one of the country\'s integral cities. Galle has a colorful history and beauty that renders many speechless.\r\nThe city is filled with Dutch-colonial buildings people come from faraway places to see. The air is filled with the sweet smell of spices and the salty winds give it a authentic recognition. Galle is filled with art that\'s rare, the streets are filled with people who are ambitious and hardworking, showcasing their efforts in one the best displays that please the eye immensely.\r\nThe classic architecture fuses with the tropical setting that\'s the envy of many man-made resorts and architects.\r\nGalle is said to be a heavenly piece of art, tropical heaven and rich in history.\r\n<br /><br />\r\n\r\nGalle Fort\r\n<br /><br />\r\n\r\nThe fort built by the Portuguese in 1588 holds most of the attention as you can explore the city of Galle through it\'s walls. The Fort has a multi-religious ethnic population and embedded deep inside it\'s walls is a rich history people are besotted with. This glorious building suffered through the Boxing Day Tsunami and was later restored to it\'s magnificent beauty. It has been given the title of Unesco World Heritage Site because of it\'s endless glory. It\'s a beautiful travelling location which gives you a experience that\'s hard to forget.\r\n<br /><br />\r\n\r\nHistory\r\n<br /><br />\r\n\r\nGalle\'s history is a wonder in it\'s own. Under the dominance of Portuguese and Dutch for a long period of time, it suffered through a thousand changes. It was referred to as Gimhathiththa in the 16th century before the Portuguese took over. But Galle showed it\'s true potential in the Dutch-colonial period, the buildings they constructed are sight seeings wonders people wish to see to this day.\r\nIt suffered through a massive tsunami but the city has been restored to it\'s original beauty and stands to be one of the best tropical areas on the planet, a tourist\'s heaven*\r\n<br /><br />\r\n', 36),
(11, 'Kalpitya', 'KALPITIYA 167 KM (103 Miles) From Colombo\r\n<br /><br />\r\n\r\nKalpitya is located in the North Western Province, Puttalam, of Sri Lanka . The city consists of a total 14 islands, that are a crown for its stunning natural beauty.\r\nKalpitya is also famous for its oceanic beauty. It is definitely showing its true potential under great refinement and development, which is ultimately leading it to become a relentless tourist attraction.\r\nIts history is rich and dating back many centuries. It was once under the rule of Portuguese. The city has suffered its share of tragedies over the decades but still stands erect and proud. Kalpitya is famous for it\'s wide range of water sports.\r\npeople fond of such activities will love this city and enjoy it immensely. Most of the residents of Kalpitya are fishers. The sea food is so good that it melts in your mouth. Above all, the setting and landscapes give it a serene beauty not many can even imagine.\r\n<br /><br />\r\n\r\nWater Sports - Kitesurfing and Surfing\r\n<br /><br />\r\n\r\nSport activities like Kitesurfing, Stand Up Paddling, Diving, Skate boarding and simple surfing are the norm around the islands. Tourists can experience the blue ocean, sandy beaches and arid plains from the skies before they get tired and enjoy the fine Sri Lankan cuisine at the customer pleasing resorts and restaurants. Their packages are highly reasonable.\r\n<br /><br />\r\n\r\nDolphin and Whale Watching\r\n<br /><br />\r\n\r\nThe breathtaking view of these enigmatic creatures submerging and reemerging from the sparkling water, a real life experience of watching nature\'s beauty strut about is a offer no one should refuse. Whale watching and Dolphin shows are one of Kalpitya\'s many wonders and tourists love their fair-priced deals and packages.\r\n<br /><br />\r\n', 37),
(12, 'Kumana', 'KUMANA 391 KM (242 Miles) From Colombo\r\n<br /><br />\r\n\r\nFostering within it a combination of wild-life that\'s not only beautiful but an opener for a common man to the wonderful beauty of this world, Sri Lanka is a country known to many but it\'s hidden gems it\'s places who lock within themselves the rhymes of beauty and God\'s exquisite nature.\r\nSri Lanka is not only a beautiful place but is rich with history that dates back to many centuries. Every city has it\'s specialty and offers a person many activities that they wouldn\'t have dreamed of doing otherwise.\r\nGolden sandy beaches, tropical heavens, mountains that touch the sky, a landscape to steal your breath, rainforests and the wildlife that it\'s the habitat. Sri Lanka is heaven on Earth.\r\n<br /><br />\r\n\r\nKumana National Park\r\n<br /><br />\r\n\r\nKumana National Park, a favourite outing spot for the country\'s residents is located at the south eastern corner of Sri Lanka. One of their most prominent features would be the bird sanctuary and their wide swamp lake, which gives it all the vibe of a safari park. It is home to some famous mammals the likes of elephants, leopards and deers etc. It\'s said that some rare birds were spotted in the lake and tourists rushed to witness their existence at once.\r\n<br /><br />\r\n\r\nFlora & Fauna\r\n<br /><br />\r\n\r\nSri Lanka displays the rhyme of wilderness with it\'s naturally run system. Animals are left untouched to wander in their natural habitats, to offer them security and safety. Travellers speak of the rare plants they discover in Sri Lankan forests. Combining everything the country\'s Flora and Fauna are one of nature\'s true gifts.\r\n<br /><br />\r\n', 38),
(13, 'Minneriya', 'MINNERIYA 208 KM (129 Miles) From Colombo\r\n<br /><br />\r\n\r\nMinneriya National Park is a national stop in North Central Province of Sri Lanka. The region was assigned as a national stop on 12 August 1997, having been initially pronounced as an untamed life haven in 1938.The explanation behind proclaiming the region as ensured is to secure the catchment of Minneriya tank and the natural life of the encompassing territory. The tank is of recorded significance, having been worked by King Mahasen in third century AD.\r\nThe recreation center is a dry season bolstering ground for the elephant populace abiding in backwoods of Matale, Polonnaruwa, and Trincomalee areas. The recreation center earned the income of Rs. 10.7 million in the six months finishing in August 2009. Along with Kaudulla and Girithale, Minneriya shapes one of the 70 Important Bird Areas (IBAs) of Sri Lanka. The recreation center is arranged 182 kilometers (113 mi) from Colombo.\r\n<br /><br />\r\n\r\nMinneriya National Park\r\n<br /><br />\r\n\r\nExpansive quantities of Sri Lankan elephants are pulled into grass fields on the edges of the repository amid the dry season. The Minneriya tank adds to manage an extensive group. Elephants assembled here are numbers around 150-200.\r\nBesides Elephants, Minneriya is especially known for its wildlife. The recreation center and the national park is critical natural surroundings for the two endemic monkeys of Sri Lanka: purple-confronted langur and toque macaque. Large herbivorous well evolved creatures, for example, Sri Lankan sambar deer and Sri Lankan pivot deer visit the recreation center.\r\n<br /><br />\r\n\r\nSafari and Camping\r\n<br /><br />\r\n\r\nDue to huge reservoirs of grassy fields and lovely wildlife of the park, a lot of tourists travel to this part of the world for safari and camping.\r\nSafari and camping are the two biggest adventurous activities of the park and people from all across the world gather for camping in the summer seasons while the park remains empty during the winters.\r\n<br /><br />', 39),
(14, 'Adam\'s Peak', 'ADAM\'S PEAK(Sri Pada) 147 KM (91 Miles) From Colombo\r\n<br /><br />\r\n\r\nThere are a lot of places to be visited in Sri Lanka but you would not have seen the land of the Lord Buddha before in your life. Sri Pada(Adam\'s Peak) is first mentioned (as `Samanthakuta\') in the Deepawamsa, the earliest Pali chronicle, (4th century), and also in the 5th century chronicle Mahawamsa, where it is stated that the Buddha visited the Sri Pada mountain peak.\r\nAdam\'s Peak is the fourth highest mountain with the height of 2244m and is located 40km northeast of Ratnapura district of Sri Lanka. This mount is also named as the sacred mountain as the footprints of the Lord Buddha and still there are millions of people came here every year to pay tribute to the lord Buddha arrival.\r\n<br /><br />\r\n\r\nFor centuries this place has been used by pilgrims from all over the world to pay religious ceremonies associated with their religions but unfortunately, this religious ceremonies changed with the time and people started many new religions out of it. The Buddha\'s visit to Sri Lanka and the sacred footprint but due to various changes with the changing time this mount becomes something new for some new people.\r\n<br /><br />\r\n\r\nA mount with different names\r\n<br /><br />\r\n\r\nMount Sri Pada(Adam\'s Peak) is not a hidden secret. Every religion follows the first human relation with God concept and that is the reason we find this mount with different names as people of different nations have different languages and that is the reason people call it with different names but it is sacred for all. Sri Pada for Sri Lankans and some people called it the mountain of butterflies as there are a huge amount of them on the top (Sinhala) hill of the butterflies.\r\n<br /><br />\r\n\r\nHiking on Sri Pada (Adam\'s Peak)\r\n<br /><br />\r\n\r\nApart from the religious attraction for Mount Sri Pada(Adam\'s Peak), a number of tourists visit it for its geographical position it took almost 5 hours to reach the top. A rich biodiversity exists near this mountain where a number of forests and hills awaits you. There is no railway or Air service to the mountain but the highway of Hatton city where you might find a railway line to to reach your destination.\r\n<br /><br />\r\n', 40),
(15, 'Bentota', 'BENTOTA 85 KM (52 Miles) From Colombo\r\n<br /><br />\r\n\r\nBentota is a small town situated on coastal areas in Sri Lanka. Positioned 65 kilometers south of Colombo the capital, in the Bentota region of the Southern Province\r\nIt is quite famous for its breath taking view, and especially the Bentota Beach.\r\n<br /><br />\r\n\r\nIf you are looking to spend your holidays and give yourself a calm and natural treat, with no bars and restaurants, this is the most refreshing and relaxing site.\r\nThe Bentota Beach which extends across 7-8 kilometers is truly a symbol of peace, calmness and cleanness.\r\nOne of its strongest points is its quiet surroundings which, according to many people, run the natural and relaxing environment of the beach. There is plenty of space of everyone to settle in perfectly and enjoy the sun bath to the fullest.\r\n<br /><br />\r\n\r\nBentota River\r\n<br /><br />\r\n\r\nWhile enjoying the eye catching view of the Bentota beach another thing that caught the attention of many tourists is the stunning Bentota River. it is highly recommended by people who have taken the 2-3 hour ride on boat of the river. People have witnessed different kinds of animals, birds, reptiles such as crocodile, iguana etc in their natural habitats, which makes it an animal\'s lover dream as well.\r\nThe River is also pretty popular for water activities like surfing and boating.\r\n\r\nBased on the views generated by the people who have visited this beach, if you want to enjoy a perfectly warm and quiet holidays then it are an ideal place for you.\r\n<br /><br />', 41),
(16, 'Hikkaduwa ', 'HIKKADUWA 119 KM (73 Miles) From Colombo\r\n<br /><br />\r\n\r\nHikkaduwa is the name of a small town which is located on the south coast of Sri lank around 98 KM on the south of Colombo. It is well known for the Hikkaduwa beach which is labeled as one of the best surfing site in Sri Lanka and for Hikkaduwa Coral Sanctuary which is located a few meters away from the shore.\r\n<br /><br />\r\n\r\nHikkaduwa Beach and Surfing\r\n<br /><br />\r\n\r\nHikkaduwa Beach and Surfing Hikkaduwa beach is one of the most popular tourist places in Sri lanka Known for the harmonized and calm environment. The Beach is considered to be one of the finest places in the country for surfing and it is also well known for seafood currie which gives an extraordinary touch while having the perfect day on the beach. You can enjoy Surfing to the fullest in the months of November to March when waves rise up. Many tourists have recommended surfing in these months.\r\n<br /><br />\r\n\r\nHikkaduwa Coral Sanctuary and Snorkeling\r\n<br /><br />\r\n\r\nWhile enjoying the beach and the sea, it is necessary to have a look inside the sea to investigate and examine the aquatic life. Whoever has visited the Beach has highly recommended snorkeling. It is very much suitable if one wants to watch all the beautiful fishes and marine life closely. People get a chance to look at a lot of different types of small and big fishes and turtles etc. very closely. So, whenever you get the chance to visit Sri Lanka and especially Hikkaduwa beach, don\'t forget to experience surfing as well as snorkeling, it will be an experience of a life time.\r\n<br /><br />\r\n\r\n\r\n', 42),
(17, 'Kitulgala', 'KITULGALA 90 KM (55 Miles) From Colombo\r\n<br /><br />\r\n\r\nIn the wet zone forest area you\'ll find one of Sri Lanka\'s finest locations, splendid and rich with nature\'s gifts. The town is called Kitulgala, where wildlife lives, plants grow, fishes and water creatures strut about with no inhibitions at all.\r\nSri Lanka preserves natural beauty by protecting it, the people do not let any harm come to the nature of animals and plants.\r\nKitulgala goes through two monsoons each year and is titled the wettest place in the whole country.\r\nKitulgala is famous for the exotic birds that roam the sky above it, the mouth-watering rice-curry lunch that\'s served and the Kelani River.\r\n<br /><br />\r\n\r\nKitulgala White Water Rafting/ Adventure\r\n<br /><br />\r\n\r\nThe Kellani River is safe except for some shallow parts in the opposite bank, it\'s a very secluded place to enjoy swimming and water sports like rafting. People enjoy picnics beside the lake and are often seen indulging in their favorite water sports. Wild and harmless fishes swim about the lake; all in all it provides a natural get-away for people finding peace.\r\n<br /><br />\r\n\r\nKitulgala Nature/ Bird Watching\r\n<br /><br />\r\n\r\nExotic birds like mountain hawk eagle, crested tree swift and layard\'s parakeet have made Kitulagala their home. Some researches and explorers even indicated that the newly discovered species of owl called serendip scops owl was heard calling throughout the forests. The untouched world of Flora and Fauna gives wild creatures and wild plants a home of their own; the place is eco-friendly and a tourist or explorer\'s next favorite.\r\n<br /><br />\r\n', 43),
(18, 'Koggala', 'KOGGALA 140 KM (86 Miles) From Colombo\r\n<br /><br />\r\n\r\nKoggala is a little seaside town, arranged at the edge of a tidal pond on the south shoreline of Sri Lanka, situated in Galle District, Southern Province of Sri Lanka and is represented by a Urban Council. Koggala is limited on one side by a reef, and on the other by an expansive lake, Koggala Lake, into which the various tributaries of the Koggala Oya deplete. It is roughly 139 kilometers (86 mi) south of Colombo and is arranged at a height of 3 meters (9.8 ft) over the sea level.\r\n<br /><br />\r\n\r\nKoggala Beach\r\n<br /><br />\r\n\r\nKoggala has one of the longest shorelines in Sri Lanka, and is situated in closeness to the prevalent vacationer resort of Unawatuna, Koggala in examination is moderately uncluttered as a traveler goal and for the most part unexplored. With the longest beach and coastline of the country, Koggala has significantly caught tourist\'s attention and now hosts thousands of tourists every year.\r\n\r\nKoggala was fundamentally influenced by the wave brought about by the 2004 Indian Ocean quake, where the waters measured 9.1 meters (30 ft) high.\r\n<br /><br />\r\n\r\nKoggala Tourist Attractions\r\n<br /><br />\r\n\r\nBesides the longest and most attractive beach of the country, the town is also a neighborhood to many tourist attractions and ancient temples\r\n\r\nKoggala is the birthplace of a well known Sri Lankan author and artist Martin Wickramasinghe whose work for the field of art is displayed in Martin Wickramasinghe Folk Art Museum, especially dedicated to his arts and traditions in the town.\r\n\r\nOther then this museum, Stilt Fisherman, Koggala lake, and Turtle hatcheries are tourist attractions.\r\n<br /><br />', 44),
(19, 'Pasikuda', 'PASIKUDAH 297 KM (184 Miles) From Colombo\r\n<br /><br />\r\n\r\nBeautiful beach along with coral reefs and amazing hotels awaits you people to visit Pasikudah in Sri Lanka Pasikudah is a coastal resort town located at a distance of 35 kilometers northwest of Baticola district Sri Lanka. This place is an exciting place not only for the tourists but some religious people who believes in Buddhism often visits this place. As a lot of beautiful temples were also there for your religious ethics and practices.\r\nSince the end of civil war in 2009 against the Black Group of Tamils, Places like Pasikuda gained more importance as tourism become active once again in Sri Lanka. For Tourists comfort an airport near the Batticola had been working from many years and giving an easy travel service so that they could reach their destinations without any problems faced.\r\n<br /><br />\r\n\r\nIf we talk about the attractions present in this resort town then there are a lot of things which we cannot expressed in this article and you should visits once in your life this beautiful place.\r\n\r\nPasikuda is a great place to enjoy your holidays also as a number of world class hotels awaits you to spend some time there along with your family and friends.\r\n<br /><br />\r\n\r\nPasikudah Beach\r\n<br /><br />\r\n\r\nYou would have visited a number of beaches in your life but would not have visited the famous Pasikuda beach a sight full of natural delights one could see in his life. Swimming in the sea and enjoying sun bath are all exciting plans for your vacations but when you choose this destination you enjoy it better than anywhere else that is the reason tourists came here every year for their vacations.\r\n<br /><br />\r\n\r\nCoral Reef Snorkeling\r\n<br /><br />\r\n\r\nPasikuda along with its beautiful beach also gives you the opportunity for coral reef snorkeling and deep sea diving which would be loved by your family in such an amazing place. Everyone likes to collect coral reefs and some people are found to collect them as their hobby and if we talk about the sea diving then there is complete safety measures taken as tourists are not only customers but guests first.\r\n<br /><br />\r\n', 45),
(20, 'Udawalawe', 'UDAWALAWE 175 KM (108 Miles) From Colombo\r\n<br /><br />\r\n\r\nIf you are intending to visit Sri Lanka or are already in Sri Lanka and are looking for good places or parks to visit, then here is one simple answer.\r\nThe flawless Udawalawe. It is filled with huge parks that were built to provide an alternate experience of wildlife. The travelling there has cheap fees if we make comparison to the brilliant experience it gives to its visitors.\r\n<br /><br />\r\n\r\nUdawalawe National Park\r\n<br /><br />\r\n\r\nThought watching Elephants and other wildlife animals doing their natural actions was hard? This hardship has come to an ease because of this enormous yet flawless park. From birds to Mammals, Udawalawe park has it all and in a large quantity too. All the animals are given good amount of space so that they can do whatever they want to, like they naturally do.\r\n<br /><br />\r\n\r\nUdawalawe Wildlife and Safari\r\n<br /><br />\r\n\r\nIt obviously starts from elephants, UDAWALAWE is known for its elephants which are in a huge quantity, about 400. There are herds of them, bathing and playing and are given huge space for them to do whatever they like. There are beautiful peacocks all roaming around and dancing. It has its own safari resort and a jeep will be provided to the visitors so that they can roam around in the park with ease and can witness the animals easily as well.\r\n<br /><br />\r\n\r\nUdawalawe Camping\r\n<br /><br />\r\n\r\nIt has amazing places to camp, there are a number of rivers that make it look very much appealing in terms of camping. It is a good place if one is looking for some adventure and a long lasting experience.\r\n<br /><br />', 46),
(21, 'Unawatuna', 'UNAWATUNA 128 KM (79 Miles) From Colombo\r\n<br /><br />\r\n\r\nUnawatuna is a town in coastal Area of the Galle District in Sri Lanka. It is one of the most famous and largest sources of attraction for people. The main things that catch the attention of people are its beautiful beach and corals.\r\n<br /><br />\r\n\r\nUnawatuna Beach and Corals\r\n<br /><br />\r\n\r\nThe Unawatuna beach is a major source of tourist attraction. The beach is a beautifully stretched area of land covered with sand that can raise the standards of any holidays with its exotic view and extraordinary environment. Corals are basically aquatic invertebrates that are established in colonies of a number of indistinguishable polyps. One of the things of this beach that hands it the grip over the others is these corals which are viewed and examined while snorkeling. One of the main preferences of tourists is to enjoy the marine life and examine it carefully and if you are one of them then the Unawatuna beach might just be the place to spend your holidays.\r\n<br /><br />\r\n\r\nUnawatuna Jungle Beach\r\n<br /><br />\r\n\r\nJungle beach is a small beach which looks like it is located in middle of a jungle. The beach is most of the times over crowded, yet it is clean most of the time and because of its refreshing scenery and pleasant weather along with the breathtaking sea view it is labeled as paradise by many.\r\n<br /><br />\r\n\r\nMany people over the years have preferred ecotourism. It is basically to observe wild life and animals in their natural habitat. Unawatuna luckily also has the ecotourism facility available for the tourist to examine the wild life as closely as possible. So, if you are planning to enjoy beach along with examining wildlife then Unawatuna is the perfect place for you.\r\n<br /><br />\r\n', 47),
(22, 'Weligama', 'WELIGAMA 148 KM (91 Miles) From Colombo\r\n<br /><br />\r\n\r\nSri Lanka has such beautiful cities, Weligama is just another addition to this long list. Located in the south coast of Sri Lanka, Weligama is a popular tourist destination and it is for a strong reason as well. Its marvelous rivers and just beautiful sceneries are so captivating that one just cant resist. Weligama means \'\'sandy village\'\' and it has suffered a number of natural disasters in its past but still has managed to burst out as a such eye catching town. It has villages that are filled with kind hearted and welcoming people. Those people make the stay there worth the time.\r\n<br /><br />\r\n\r\nWeligama Beach and Surfing Schools\r\n<br /><br />\r\n\r\nJust like other Sri Lankan cities, it is also filled with beaches that enhance its beauty alot more than before. Its beaches are half occupied with fishermen who are busy fishing and boating. A little way away from the beaches, villages are filled with busy people working day and night to make a fortune, Schools that give surfing lessons can be seen at the ends of the beaches. Its such a pleasent sight to witness. It has attractive beaches that are ideal for surfing. Along the beaches, there are resort open for people who want to stay alongside the beautiful scenario.\r\n<br /><br />\r\n\r\nWeligama is so full of attractive places. The villages are filled with all kinds of people that are open hearted and do alot for the visitors there.\r\nIt has surf schools and beautiful greenry that attracts the tourists.\r\nIt has been reviewed as a beautiful place by many for a reason.\r\n<br /><br />\r\n\r\n\r\n<br /><br />', 48),
(23, 'Wilpattu', 'WILPATTU 165 KM (102 Miles) From Colombo\r\n<br /><br />\r\n\r\nWilpattu National Park (Also known as Park of natural lakes) is a recreation center situated in the Northwest dry zone of the island of Sri Lanka. The extraordinary element of this stop is the presence of \"Willus\" (Natural lakes), sand-rimmed water bowls or dejections that load with water.\r\nThe recreation center is found 30 km west Anuradhapura, 26 km north of Puttalam and roughly 180 km north of the capital Colombo. The recreation center is 131, 693 hectares and reaches from 0 to 152 meters above ocean level. About sixty lakes (Willu) and tanks are discovered spread all through Wilpattu. Wilpattu is the biggest and one of the most seasoned National Parks in Sri Lanka. Wilpattu is among the top national parks widely acclaimed for its panther (Panthera pardus kotiya) population.\r\n<br /><br />\r\n\r\nWilpattu National Park\r\n<br /><br />\r\n\r\nSurely, the National Park is known for its amazing wildlife which gets all the attention of the tourists. The Wilpattu National park is especially known for its population of Leopards who are the main source of entertainment and excitation in the entire region. Behind Leopards, the park is full of fascinating birds and animals and is thus one of the most famous tourist attractions of the country.\r\n\r\nThe painted stork, the open bill, little cormorant, Sri Lankan junglefowl alongside numerous types of owls, terns, gulls, falcons, kites vultures are to be found at Wilpattu National Park. Wetland fowl species that can be seen in Wilpattu are the garganey, pintail, shrieking greenish blue, spoonbill, white ibis, substantial white egret, steers egret and purple heron.\r\n\r\nThe most widely recognized reptiles found in the recreation center are the screen reptile, mugger crocodile, basic cobra, rodent wind, Indian Lake Turtle and the delicate shelled turtle which are inhabitant in the huge perpetual Villus.\r\n<br /><br />\r\n\r\nWilpattu Safari and Camping\r\n<br /><br />\r\n\r\nDue to the immense wildlife of the park and the scenic beauty, the park is a perfect camping site for the tourists and is a perfect spot for safari as well. Several private companies are providing packages for camping and safari in the Park. Three shifts of safari are offered in shape of morning safari, evening safari and full day safari at extremely affordable rates.\r\n<br /><br />', 49),
(24, 'Kataragama', 'KATARAGAMA 222 KM (138 Miles) From Colombo\r\n<br /><br />\r\n\r\nKataragama is place of pilgrimage for a variety of religions such as Hinduism, Buddhism and Islam and is located in south-east corner of Sri Lanka. Therefore is a multi-religious sacred city.\r\n<br /><br />\r\n\r\nHistory\r\n<br /><br />\r\n\r\nThe deity at Kataragama is indigenous and long-celebrated in Sri Lankan lore and legend, and originally resides on the top of mountain called Wadahiti Kanda just outside of the Kataragama town. Since ancient times an inseparable connection between the God and his domain has existed. At one time the local deity was identified with God Saman, a deity that was important to the Sinhalese people before their conversion to Buddhism.\r\n<br /><br />\r\n\r\nKataragama Shrine\r\n<br /><br />\r\n\r\nKataragama is a holy shrine and a popular pilgrim center for Buddhists and Hindus. In fact Kataragama is one of the 16 principal places of Buddhist pilgrimage. Tamil Hindus of Sri Lanka and South India refer to the place as Katirkamam and it has a famous Hindu shrine dedicated to Lord Katirkaman.\r\n<br /><br />\r\n\r\nManik Ganga (River of Gems)\r\n<br /><br />\r\n\r\nThe local river namely Manik Ganga has a similar function as that of the River Ganges in India as place of absolution where a bath taken from this river purifies and individual. Local residents declare that one can be healed of ailments by bathing in it not only from its high gem content but also the medicinal properties of the roots of various trees that line the river through the jungle.\r\n<br /><br />\r\n\r\n', 50),
(25, 'Nuwara Eliya', 'NUWARA ELIYA 165 KM (103 Miles) From Colombo\r\n<br /><br />\r\n\r\nNuwara Eliya meaning \"city on the plain or \"city of light\" is a town in the central highlands of Sri Lanka. It is one of the major tea producing areas in the world. The tallest mountain in Sri Lanka \"Pidurutalagala\" oversees this beautiful city. It is the most visited hill country.\r\n<br /><br />\r\n\r\nHistory\r\n<br /><br />\r\n\r\nNuwara Eliya is said to have been founded by a couple of British officers who apparently got lost while elephant hunting. The British governor Sir Edward Barnes was notified about the town and he himself decided to reside at Nuwara Eliya and subsequently creating a health resort that was internationally renowned. The town was later the ultimate destination for English pastimes such as golf, fox hunting, polo, etc. Nuwara Eliya also has an archeological importance as well in which pre-historic human remains are found. The city is has a good reflection of the colonial period even new hotels are furnished according to the colonial era.\r\n<br /><br />\r\n\r\nModern Day Nuwara Eliya\r\n<br /><br />\r\n\r\nNuwara Eliya is now a modern, busy city with department stores, fast food chains. Nevertheless the further away you are away from the busy town the more you will be revisiting the past. Tourists will find a variety of recreational activities to do in this beautiful city, Nuwara Eliya is known to have the best 18-hole golf course in Asia and that\'s not all horse-riding, boating, bird-watching and hiking are few of the many fun things you can do.\r\n<br /><br />\r\n\r\nTea Production\r\n<br /><br />\r\n\r\nSri Lanka is produces a significant share of the world\'s best tea and in the mean time is also one of the world\'s largest exporters of tea. Since the introduction of tea to Sri Lanka in mid 19the century Nuwara Eliya has been the capital of the tea industry.\r\n<br /><br />\r\n\r\nWaterfalls\r\n<br /><br />\r\n\r\nLittle England\" is also home to some beautiful waterfalls such as Ramboda Falls, Devon Falls, and Laksapana Falls. Trekking and hiking expeditions usually evolve around these land marks.\r\n<br /><br />\r\n\r\nClimate\r\n<br /><br />\r\n\r\nNatives usually tend to visit the hill country during the summer time, just to escape the excess humidity that accompanies with the heat since Nuwara Eliya has a average temperature of 16 degrees and sometimes can decrease to extreme conditions such as 3 degrees due to the high altitudes.\r\n<br /><br />\r\n\r\nHorton Plains\r\n<br /><br />\r\n\r\nHorton Plains is yet another national park in Sri Lanka located at the highest plateau in the island. The park is very famous among nature lovers. However within Horton Plains are the World\'s End exhibiting an abrupt drop of 1000m offering a breath-taking view of land including tea estates.\r\n<br /><br />', 51);
INSERT INTO `destination` (`destid`, `name`, `description`, `photo`) VALUES
(26, 'Sigiriya', 'SIGIRIYA 169 KM (105 Miles) From Colombo\r\n<br /><br />\r\n\r\nSigiriya also known as the Lion\'s Rock is a rock fortress and a palace located in the Matale district of Sri Lanka. This ruin is surrounded by gardens, ponds and other structures. Sigiriya was built by King Kassapa and it is included as a World Heritage site. Sigiriya is the best preserved city centre in Asia.\r\n<br /><br />\r\n\r\nHistory\r\n<br /><br />\r\n\r\nEarlier is was a rock-shelter mountain monastery which was donated by Buddhist devotees. Later King Kassapa renovated it by building gardens and palace. After his death it was again used as a monastery.\r\nHuman habilitation in Sigiriya at its earliest was found to be nearly five thousand years during the Mesothilic period.\r\nRock inscriptions are carved near the drip ledges on many of the shelters, recording the donation of the shelters to the Buddhist monastic order as residences. These have been made within the period between the third century B.C and the first century A.D.\r\nIn 1831 Major Jonathan Forbes of the 78th Highlanders of the British army while returning on horseback from a trip to Polonnaruwa came across the \"bush covered summit of Sigiriya\". Sigiriya came to the attention of antiquarians and later archaeologists.\r\nThe Sigiriya complex itself consists of the central rock and two rectangular precincts which are surrounded by two moats and three ramparts. The city is based on a square module.\r\n<br /><br />\r\n\r\nStructure of The Lion Rock\r\n<br /><br />\r\n\r\nThe Sigiriya Rock is actually a hardened magma plug from an extinct volcano. The most significant feature of the rock would be the Lion staircase leading to the palace garden. The Lion could be visualized as a huge figure towering against the granite cliff. The opened mouth of the Lion leads to the staircase built of bricks and timber. However the only remains of this majestic structure are the two paws and the masonry walls surrounding it. Nevertheless the cuts and groves in the rock face give an impression of a lion figure.\r\n<br /><br />\r\n\r\nFrescos\r\n<br /><br />\r\n\r\nThere are only two pockets of paintings covering most of the western face of the rock. The ladies depicted in the paintings have been identified as Apsaras. However a lot of these ladies have been wiped out when the palace was again converted into a monastery so as to not to disturb meditation.\r\n<br /><br />\r\n\r\nThe Gardens\r\n<br /><br />\r\n\r\nThe gardens are amongst the oldest landscaped gardens in the world. The gardens are divided into three distinct but linked forms; water gardens, Cave and boulder gardens, and terraced gardens.\r\n<br /><br />\r\n\r\nThe Mirror Wall\r\n<br /><br />\r\n\r\nOriginally this wall was so well polished that the king could see himself whilst he walked alongside it. Made of a kind of porcelain, the wall is now partially covered with verses scribbled by visitors to the rock. Well preserved, the mirror wall has verses dating from the 8th century. People of all types wrote on the wall, on varying subjects such as love, irony, and experiences of all sorts. Further writing on the mirror wall has now been banned.\r\n<br /><br />', 52),
(27, 'Anuradhapura', 'ANURADHAPURA 213 Km (132 Miles) From Colombo\r\n<br /><br />\r\n\r\nAnuradhapura is one of the ancient cities in Sri Lanka, well known for its ruins depicting early Sri Lankan civilization. It is very famous among Buddhists pilgrims. Anuradhapura was earlier the capital of the Island (in ancient times) and most of the Kings who ruled Sri Lanka resided in this vast city. The city is now named as a world heritage site by UNESCO.\r\n<br /><br />\r\n\r\nHistory Anuradhapura\r\n<br /><br />\r\n\r\nOn the contrary to the historical data that indicates that the city is founded in the 5 century BC archeological data puts that date back to far as the 10 century BC. However it was King Pandukabhaya who planned the layout of the city and made it his capital in the 4th century BC. He constructed many reservoirs and shrines. The city reached its highest magnificence by the beginning of the Christian era. The city boasted some of the most complex irrigation systems in the ancient world.\r\n<br /><br />\r\n\r\nThe ruins in Anuradhapura\r\n<br /><br />\r\n\r\nRuins are the only remains of what Anuradhapura used to be. Ruins generally have three classes of buildings:\r\n<br />\r\n1.Dagobas ( bell-shaped masses of masonry)\r\n<br />\r\n2.Monastic Buildings\r\n<br />\r\n3.Pokunas ( bathing tanks/ tanks that supply water for drinking)\r\n<br /><br />\r\n\r\nMajor Tourist Attractions at Anuradhapura\r\n<br /><br />\r\n\r\n1. Sri Maha Bodhi - It is the sacred Bodhi Tree ( Fig Tree ) which is believed to be a direct descendant from the original Bo tree under which The Lord Buddha reached his enlightenment.\r\n<br /><br />\r\n\r\n2. Ruwanwelisaya - It is the stupa built by King Dutugamunu. The stupa is considered as one of the world\'s tallest monuments.\r\n<br /><br />\r\n\r\n3. Thuparamaya - It is another dagaba in Anuradhapura. Following the introduction of Buddhism to Sri Lanka it was the first dagaba to be built in Sri Lanka which also enshrines the collarbone of the Buddha.\r\n<br /><br />\r\n\r\n4. Lovamahapaya - Also known as the Brazen Palace or Lohaprasadaya. This building was also built by King Dutugamunu.\r\n<br /><br />\r\n5. Jetavanaramaya - The Jetavanaramaya is yet another stupa which was initiated by King Mahasena. A part of a sash or belt which was used by the Buddha himself is believed to be enshrined here.\r\n<br /><br />\r\n\r\n6. Abhayagiri Dagaba - This ruin is considered one of the most extensive ruins in the world and has a roof made of gilt bronze or tiles of burnt clay. The Abhayagiri Dagaba attracted scholars in the ancient times from all over the world.\r\n<br /><br />\r\n\r\n7. Mirisaveti Stupa - Another masterpiece built by King Dutugamunu.\r\n<br /><br />\r\n\r\n8. Lankarama - This stupa was built by King Valagamba.\r\n<br /><br />', 53),
(28, 'Polonnaruwa', 'POLONNARUWA 224 KM (139 Miles) From Colombo\r\n<br /><br />\r\n\r\nPolonnaruwa is the Island\'s 2nd largest kingdom. Today the ancient city of Polonnaruwa remains one of the best planned Archeological relic sites in the country, standing testimony to the discipline and greatness of the Kingdom\'s first rulers. Its beauty and serenity was captured in the Duran Duran music video Save a Prayer in 1982. The ancient city of Polonnaruwa has been declared a World Heritage site by UNESCO. The Lankathilaka temple and a colossal statue of the Buddha made from stone is located here.\r\n<br /><br />\r\n\r\nAncient city of Polonnaruwa\r\n<br /><br />\r\n\r\nPolonnaruwa is the 2nd largest city in north central province. But it is known as one of the cleaner and more beautiful cities in the country. The greeny environment houses amazing ancient constructions, Parakrama Samudraya (a huge lake built in 1200 A.C) and above all nice hospitable people. Scientific observation has been made about its climate changes it has been noted that the temperature of the later part in the year drops significantly low. Nevertheless leaving the country without even stepping on to the fertile land would be a huge waste, make sure that Polonnaruwa is a part in the itinerary.\r\n<br /><br />\r\n\r\nReligious Significance of Polonnaruwa\r\n<br /><br />\r\n\r\nBuddhist pilgrimages are organised among people to visit ancient ruins of temples, stupas and even hindu temples. Rankot Vihara, the largest stupa in the city is about 180 ft high. Lankathilaka Gedige, buil during the rule of Parakramabahu, however the roof of it is missing but still is worth a visit to view the temple\'s magnificence. Kiri Vihara another stupa redicovered during the 19th century, it was surrounded by the dense forest and thereby wasn\'t known to man for long periods of time. Shiva Dewale, a hindu temple that was built during the 13th century, is also one of the famous attractions in Polonnaruwa.\r\n<br /><br />\r\n\r\n\r\n', 54),
(29, 'Yapahuwa ', 'YAPAHUWA 147KM (91Miles) From Colombo\r\n<br /><br />\r\n\r\nYapahuwa is located a little way off the Kurunegala-Anuradhapura road, in the Wayamba province of Sri Lanka. Of all the ancient ruins in the country the Rock Fortress Complex of Yapahuwa is considered to be quite remarkable despite the fact that it isn\'t famous among most visitors. However, it is renowned as one of the best archeological site in the country. It is even rumored to be more significant than The Rock Fortress in Sigiriya.\r\n<br /><br />\r\n\r\nHistory Of Yapahuwa\r\n<br /><br />\r\n\r\nIn the early 13th century Yapahuwa was the capital of the country and it housed the Sacred Tooth Relic of the Buddha for 11 Years. King Bhuvanekabhu I, the son of the King Parakramabahu who at that time ruled Dambadeniya, was stationed at Yapahuwa in order to protect the Country from Invaders; built the palace and the temple. After the Fortress was abandoned monks converted it into a monastery and monks still reside among the ancient ruins. Even today signs of early defense mechanisms can still be seen among the ruins.\r\n<br /><br />\r\n\r\nStructural Significance\r\n<br /><br />\r\n\r\nOn top of the rock the remains of a stupa, a Bodhi tree, and a rock shelter/cave used by Buddhist monks is visible. A couple of caves are seen at the base of the rock, one of which is a Buddhist Shrine whereas another cave has some inscriptions on it. The rock fortress has a strong resemblance to the Sigiriya Rock Fortress.\r\n<br /><br />', 55),
(30, 'Colombo', 'Colombo 0 KM (0 Miles) From Colombo\r\n<br /><br />\r\n\r\nThe largest city and commercial capital of Sri Lanka is Colombo which is located in the western province adjacent to Sri Jayewardenepura Kotte (the capital city of Sri Lanka ) Colombo is a vibrant city with a mixture of modern life , colonial buildings and ruins.\r\nDue to its very large harbor and its position along the East-West sea trade routes Colombo was very popular among ancient traders 2000 years ago.\r\nColombo houses a majority of the Sri Lanka\'s corporate offices, restaurants and entertainment venues. Famous land marks in Colombo include the National Museum, World Trade Center , Vihara Maha Devi Park and the Galle Face Green.\r\nThe name \"Colombo\", first introduced by the Portuguese in 1505, is believed to be derived from the classical Sinhalese name Kolon thota, meaning \"port on the river Kelani\". It has also been suggested that the name may be derived from the Sinhalese name Kola-amba-thota which means \"Harbor with leafy mango trees\". However, it is also possible that the Portuguese named the city after Christopher Columbus.\r\n<br /><br />\r\n\r\nNatural Harbor\r\n<br /><br />\r\n\r\nDue to the fact that Colombo had a natural harbor of its own the Romans, Arabs and Chinese traders were well aware of its significance. Colombo\'s geography is a mix of land and water. The city has many canals and, in the heart of the city is located a lake known as the Beira Lake. The lake has a historical significance for which it was used to defend the city by colonists\r\n<br /><br />\r\n\r\nGeography and Climate\r\n<br /><br />\r\n\r\nColombo\'s climate is fairly temperate all throughout the year averaging around 31 degrees. Colombo is a multi-ethnic, multi-cultural city. The population of Colombo is a mix of numerous ethnic groups, mainly Sinhalese, Moors and Tamils. There are also small communities of people with Chinese, Portuguese, Dutch, Malay and Indian origins living in the city, as well as numerous European expatriates. Colombo is the most populous city in Sri Lanka.\r\n<br /><br />\r\n', 56),
(31, 'Yala', 'YALA National Park 305KM (190Miles) From Colombo\r\n<br /><br />\r\n\r\nYala National Park is situated in the south-east region of Sri Lanka and is the 2nd largest National Park in the island, situated some 300 km away from Colombo. It was at first established in the early 1890s as a game sanctuary . The park is located in the dry-zone region where the drought season is very long .The day time average temperature is over 30 degrees which is not uncommon in the region. The parkland makes up most of the reserve but also includes lakes, beaches, jungle, rivers and scrubland. This variety in habitats provides an excellent range in wildlife. The largest concentration of Leopards can be seen in this region though the chances of seeing this animal are very low, and the creature is said to be one of the most endangered species. About 32 species of mammals, 125 species of birds and many reptiles and lagoon fauna species have been recorded in the park. The Yala National Park is famous among visitors as the best place to view large mammals within one territory.\r\n<br /><br />\r\n\r\nHistory\r\n<br /><br />\r\n\r\nThe Yala National Reserve was a part of the Ruhuna Kingdom. The Situl Pahuwa temple housed more than 12000 inhabitants. The Magul Mahavihara, which is also another temple within the park was the place where King Kawantissa and Vihara Maha Devi were married.\r\n<br /><br />\r\n\r\nCultural Significance\r\n<br /><br />\r\n\r\nYala was where Ravana established his kingdom. The many mane-made tanks show that yala was used as an agricultural center with an intensive irigation system. The temple Situlpahuwa is within Yala and was built during the 87 BC and the Akasa Stupa in 2 BC. During the colonial era Yala was used as a place to hunt down game. Even today more than 400,000 pilgrims visit the stupas within the confinements of thepark.\r\n<br /><br />\r\n\r\n', 57),
(32, 'Jaffna', 'JAFFNA 411 KM (255 Miles) From Colombo\r\n<br /><br />\r\n\r\nAlso known as Yaalpanam among Tamils. Located on the northern-most part of Sri Lanka. One of the oldest places of inhabition in South-east Asia. Mostly populated by Tamils along with a handful of Sri Lankan Muslims. However it is one of the most populated cities of Sri Lanka. Sri Lankan Tamil is the main language spoken in Jaffna along with a little bit of sinhala , however english is widely understood and spoken.\r\n<br /><br />\r\n\r\nJaffna Fort\r\n<br /><br />\r\n\r\nBuilt during the late 1600s by the Dutch. Close to the fort is a British-period house, in which Virginia Woolf\'s husband Leonard Woolf lived for sometime it was mentioned in his memoir \'Growing\'.\r\n<br /><br />\r\n\r\nTemples\r\n<br /><br />\r\n\r\nHindu Kiovels or temples are one of the major attractions in Jaffna, the most famous kovil is the Nallur Kovil, which reflects the Dravidian architecture and style beautifully. The Kandaswamy Kovil is also mostly visited by tourists which is one of the oldest kovils in Sri Lanka. The kovil was built during the 10th century. However the original Kovil was demolished by the Portugese during the colonial era.\r\n<br /><br />\r\n\r\nFestivals\r\n<br /><br />\r\n\r\nJaffna is a very cultural place due to the fact that Tamils belong to the Darvidian culture. Colourful festivals are a huge part of the culture Deepawali, Navarathri and Shivarathri are the few among the many festivals.\r\n<br /><br />\r\n\r\n', 58),
(33, 'Nagadeepa', 'NAGADEEPA 441 KM (274 Miles) From Colombo\r\n<br /><br />\r\n\r\nNagadeepa or Nainativu is one of the smallest island in the Gulf of mannar. The only way to the island is via a boat. It is both a place of religious significance and beauty. It is one of the places in Sri Lanka that they Buddha was said to have visited by the Great Chronicle of Mahavamsa. The island is sandy and flat and is home to a lot of palm trees. The island is located abt 30 km away from Jaffna. There are two main jetties in order to enter the island , one leads to a hindu temple and the other to the Nagadeepa Vihara.\r\n<br /><br />\r\n\r\nHistory\r\n<br /><br />\r\n\r\nThe island was earlier visited by mechants who wanted to buy conch shells. However the major historical event was the Buddha\'s visit to Nagadeepa to settle a dispute between the two kings of the Nagas Chulodara and Mahodara. Since the Buddha advocated non-violence and compassion somehow he was able to make the kings settle the dispute. The Kings later presented a throne to the Buddha who kindly refused and is now enshrined in the Nagadeepa Stupa and thus makes it one of main places of travel for Buddhist pilgrims.\r\n<br /><br />\r\n\r\nTemples\r\n<br /><br />\r\n\r\nOne of the most visited holy places for Buddhists. The Vihara houses two very ancient artefacts which are placed strategically at the entrance on either side. A large ancient anchor and a big stone with an inscription written by King Parakramabahu I. The stupa of the vihara enshrines a throne that was built by the two kings who wanted to express their gratitude to the Buddha who refused the token of appreciation. The Hindu Temple is also a major attractions with its distinctive red and white walls.\r\n<br /><br />', 59),
(34, 'Negombo', 'NEGOMBO 40 KM (25 Miles) From Colombo\r\n<br /><br />\r\n\r\nNegombo (Migamuwa) is a town of about 40 km north of Colombo. It has a small port and its economy is based on centuries old fishing industries and tourism. During the Dutch and Portuguese invasion it was used as a trading port.\r\n<br /><br />\r\n\r\nBeach\r\n<br /><br />\r\n\r\nThe beaches of Negombo are most of the time less crowded and unexplored which means that the beach is mostly to yourself. Recreational sports such as Diving and surfing are famous among tourists. The Muthurajawela Marsh off Negombo lagoon just south of the town is a unique wetland habitat and the largest marsh in Sri Lanka popular with eco enthusiasts.\r\n<br /><br />\r\n\r\nKite Surfing\r\n<br /><br />\r\n\r\nThe latest exhilarating extreme sport in Sri Lanka, it is a fusion of Kite flying , Wind Surfing , Wave boarding and Surfing. It is a bit difficult to master however, well qualified trainers are available at your disposal so that within a week you will be able to kite-surf like a pro.\r\n<br /><br />\r\n\r\nChurches\r\n<br /><br />\r\n\r\nNegombo has a majority of Roman Catholics since the European Colonization. Negombo is also known as Little Rome due to Portugese Era Churches.\r\n<br /><br />', 60),
(35, 'Haputale', 'HAPUTALE 173 KM (107 Miles) From Colombo\r\n<br /><br />\r\n\r\nLocated in the Badulla District, and is 4695 ft high above the sea level. It is one of the places with a very rich biodiversity and allows a very beautiful view of the Southern Plains. It is approximately 193 km away from Colombo. The town is no doubt one of the spectacular places in Sri Lanka. Haputale is makes hiking and trekking a great exhilarating exercise. The major attraction of Haputale is the Liptons seat, Adisham Bungalow and the famous Dambatenna tea factory.\r\n<br /><br />\r\n\r\nThe Climate\r\n<br /><br />\r\n\r\nDue to its elevation the temperature is significantly lower than other parts of the country, running a temperature of approximately less than 25 degrees.\r\n<br /><br />\r\n\r\nAdisham\'s Bungalow\r\n<br /><br />\r\n\r\nOne of the few remnants of the British Colonial, during which a Kentish gentleman built this magnificent mansion which is also influenced by post victorian architecture. Right next to it is the Tangalamalai Bird Santuary where paradise flycatchers and many more birds of the such can be seen.\r\n<br /><br />\r\n\r\nLipton\'s Seat\r\n<br /><br />\r\n\r\nThe Lipton tea factory founder was said to have bought the estate on which the factory built because he fell in love with the breath-taking panoramic view, which today is known as the Lipton\'s seat, however the mist tends to set in during the evening so the journey up the lipton\'s seat should be made early in the morning.\r\n\r\nDambatenna Tea Factory\r\n<br /><br />\r\n\r\n10 km along the road, east of Haputale the famous Tea factory built by Sir Thomas Lipton. The factory is open for visitors where you can also get a taste of the best tea in the whole world.\r\n<br /><br />\r\n<br /><br />', 61),
(36, 'Pinnawala Elephant Orphanage', 'The Pinnawala Elephant Orphanage is situated northwest of the town of Kegalle, halfway between the present capital Colombo and the ancient royal residence Kandy. It was established in 1975 by the Sri Lanka Wildlife Department in a 25 acre coconut property adjoining the Maha Oya River. The orphanage was originally founded in order to afford care and protection to the many orphaned Elephants found in the jungles of Sri Lanka.<br /> <br />\r\nLocation:<br />\r\nPinnawala (Pinnawela) Elephant Orphanage is located in the village Pinnawala in the district of Kegalle at a distance of 90km from Colombo.\r\n\r\n', 62),
(37, ' Horton Plains National Park', 'Horton National Park is a ‘food for the soul’ kind of mesmerizing locale. The park is perched in the shadows of the country’s 2nd and 3rd highest mountains, Kirigalpota and Totapola. The place is also termed as world’s end due to its undaunting mysterious views of waterfalls, misted lakes and earthy species of flora and fauna. The national park is actually a plateau and is 2000m high. It is better to start early in the morning to witness this heavenly place.<br /> <br />\r\n\r\nLocation: 11 kms approx from Ohiya.<br /> <br />\r\n\r\nHighlights: An array of wildlife such as Samba deers, leopards, wild boars, purple faced langoor; an ideal site for birdwatchers as you may encounter a variety of flying wonders such as bulbul,                                Ceylon blackbird, Ceylon white eyed arrenga, mountain hawk etc; the epic walk to world’s end(4kms) and Farr Inn hunting lodge.<br /> <br />\r\n\r\nPrice: Adult – 1895 Child: 1011.<br /> <br />\r\n\r\nTimings: 6 am to 6 pm', 63),
(38, 'Sinharaja Forest Reserve', 'Declared as a World Heritage Site by UNESCO, Sinharaja Forest Reserve (kingdom of the lion), is a paradise for nature and wildlife lovers. It is home to a vast number of endemic species of birds and mammals of Sri Lanka. About 95 per cent of Sri Lankan endemic birds and more than 50 per cent of endemic mammals are known to have their habitats in this Forest Reserve.<br /> <br />\r\n\r\nYear round, the forest is covered by plenty of rain clouds. It is one of the famous places to visit in Galle. You can experience the leisurely pace of wildlife and the splendour of dense and copious evergreen rainforests. <br /> <br />\r\n\r\n\r\n\r\nLocation: Sinharaja Forest Reserve, Southern Province <br /> <br />\r\n\r\nTimings: Opens daily from 6:30 AM to 6 PM<br /> <br />\r\n\r\nPrice: Approximate price ranges from INR 260 to INR460 (664 LKR to 1160 LKR)', 64),
(39, 'Attidiya Bird Sanctuary', 'This is probably the only place in Colombo that provides shelter to at least 50 different species of birds (both local and migratory). \r\n\r\nHighlights: A large number of water monitors, butterflies, insects and other birds tend to catch your attention as you walk through the muddy paths of the sanctuary. The biodiversity of this place is highly commendable, as you cannot help but feel awe-struck at the diverse species of birds here. As the place is replete with mosquitoes, you need to be fully covered while visiting the park.<br /> <br /> \r\n\r\nLocation: The sanctuary is located at Boralesgamuwa in Colombo.<br /> <br /> \r\n\r\nTimings: The sanctuary is open all through the day; however early mornings and evenings are best to visit migratory birds.<br /> <br /> \r\n\r\nBest Season to Visit: You must visit this place during the months between December and January, as this is the peak season for migratory birds to seek protection here.<br /> <br /> \r\n\r\nPrice: Entry to the place is free of cost.', 65),
(40, 'Perandeniya Botanical Gardens', 'Peradeniya Gardens is a spacious 147 acre of natural extravaganza consisting of more than 4000 species of plants, and 10,000 varied kinds of trees, incidentally serves as the largest garden of Sri Lanka.<br />\r\n\r\nThe unique and rarest collection in these gardens is the Giant Bamboo of Burma which grows 12 inches each day to a height of 40 meters. Apart from this other amazing collections include Javan fig tree, Cannonball tree, Double Coconut Palm and about 200 other varieties of palm trees and versatile collection of flora.<br /> <br />\r\n\r\nThe Peradeniya Botanical Garden is one prime tourist attraction of hill country and remains quite flooded with tourists every weekend. One can pack some food to enjoy an open air picnic here or can relish the cafeteria inside serving local and western cuisine.<br /> <br />\r\n\r\nLocation: 5.5km from Kandy <br /> <br />\r\n\r\nBest Time: 7:30am to 5:00pm ', 66),
(41, 'Nilaveli Beach ', 'Nilaveli Beach is a stretch of beach which is situated approximately 16 kilometres North of Trincomalle, passing a thriving lagoon on either side and lush coconut palm groves and hordes of cattle, note that the people in the area are predominantly Hindu and consider the cows sacred. Arriving at the hamlet of “Errakkandy”, a sharp right turn will take you down a gravel road to Nilaweli beach, almost a kilometre of in lenght, white sandy beach with gentle surf. Across the beach about two kilometres into the ocean you will see the famous pigeon island, named due to rock pigeons roosting on it by the hundreds and crystal clear water around it to snorkel on to the clear depths of a reef. Further up North you will see a cluster of reddish rocks which are referred to as the red rock beach.', 67),
(42, 'Vedda Village Tours to Dambana', 'Sri Lanka’s Aborigines’, or the Veddha’s meaning “people of the forest” of Sri Lanka has a history much older than prince Vijaya’s landing in 5th century BC and the origins of the Sinhala race. Archaeological evidence suggest that modern Veddha’s Neolithic ancestors inhabited this island as far back as 10,000 BC with. Once roaming the Great Plains’ of the north central region to the central mountains, today the remaining Veddha population are confined to Dambana which is close to Maduru oya sanctuary.<br /> <br />\r\n\r\nThey are essentially hunter gatherer forest dwellers without much change in their life style from Stone Age to modern times. The language used by them is an ancient dialect of Sinhala, staple diet being venison, Veddha’s are allowed to hunt legally to sustain themselves within certain areas, are also expert fisherman. Veddha’s also collect bee’s honey and exchange it with the locals for axe blades and cloth.', 68),
(43, 'Batadombalena Cave', 'A hike from the nearest township of Sudugala, and then a climb of about 50m will bring you to the mouth of this fairly large cave, is a very important archaeological site since it contains evidence of human habitation from 32,000 BC and the 10 skeletal remains of the oldest human remains of Sri Lanka were also excavated from this cave, the “Homo sapiens balangodensis”, the Balangoda man may also have been responsible for the creation of Horton plains for agriculture.', 69),
(44, 'Mahalenama Cave', 'Located between Kumana & Lahugala-Kithulana National parks this ancient Buddhist monastery is also believed to be the place where according to preserved Vedda legend for us a recollection of a lost race known as the Nittevo. There has been much controversy as to the identity of this folk. Some hold that the Nittevo are a lost tribe of Negritoes while others believe them to have been some kind of ape-man. Yet others identify them with an extinct species of bear known as rahu valaha. <br /> <br />\r\n\r\nThe Nittevo are said to have been a dwarfish race of men who lived in the Mahalenama region now within the Yala East Intermediate Zone and the Tamankaduva area. These folk are believed to have been exterminated by the Veddas about 250 years ago.', 70),
(45, 'Birds park Hambantota', 'Bird park is one of the very few destinations for bird and nature lovers looking for a calm and relaxed experience, yet with ample time to view, study and enjoy the beasts of the air.<br />\r\n\r\nMost visitors who enjoy our park would like to collect a memento or share their experiences with their loved ones when they get back home. You can do your souvenir shopping right within our own gift shop.<br />\r\n\r\nWith over 35 acres of land the park gives visitors the opportunity to meet and interact with our feathered residents. We invite you to come and enjoy!<br />\r\n\r\nIf you are coming from Colombo take Southern Highway to Matara and come to Hambanthota Town.Then come to Katuwewa Junction and turn left. 7km From Katuwewa junction you will find our Birds Research Center & Resort.<br /> <br />\r\n\r\n\r\nPrice :<br />\r\nRates for Locals: LKR 250.00<br />\r\nRates for Foreigners:  LKR 1000.00', 71),
(46, 'Sabaragamuwa Maha Saman Devalaya', 'The Sabaragamuwa Maha Saman Devalaya is considered the main Devalaya of deity Saman except for the Shrine at top of Sri Pada.<br />\r\n\r\nThe history speaks of a temple at Ratnapura area since the time of king Dutugemunu of Anuradhapura Kingdom, But the recent history starts from Dambadeniya period.<br />\r\n\r\n\r\n A court Minister called Aryakamadeva had come over to Ratnapura to make a vow for gemming, and if lucky to build a Devalaya to keep God Sumana Saman’s statue. After a sucessful gem mining expedition, he is said to have built the first devalaya dedicated to God Saman at Ratnapura. Although the devalaya was highly influenced by Hindu culture, it remained a Buddhist place of worship throughout the years.', 72),
(47, 'Mihinthalaya ', 'In the 3rd century BC, area of Mihintale (mihinthalaya) was a thick jungle area inhibited by wild animals and was a hunting ground reserved for the royals. All this changed in 250 BC when the son of the Indian Emperor Asoka, Mahinda Maha Thero arrived at the Missaka Pauwa to meet king Devamnampiyatissa for the first time and asked the famous questions to decide whether he is intelligent enough to understand the philosophy of the Buddha. Initially Mahinda Maha Thero’s residence, but later Mihintale (mihinthalaya) became a main center for Theravada Buddhism and is considered the cradle of Buddhism in Sri Lanka.<br /> <br />\r\n\r\nMihinthale is a collection of four mountains each about 1000 feet in height.<br />\r\n\r\nThey are<br />\r\n\r\nMihinthalawa<br />\r\nAth Vehera mountain<br />\r\nAnaikutti mountain<br />\r\nRajagiri Lena mountain<br />\r\nMihinthalawa is the main mountain and where the Aradhana gala (The rock of invitation) and the main Mahaseya stupa is situated.<br /><br />\r\n\r\nalternate names : mihinthalawa, Mihinthalaya, mihinthale', 73),
(49, 'Elephant Rock - ATHUGALA TEMPLE', 'This rock overlooking Kurunegala and cutting the city in two offers a unique panorama on the city, its lake and surrounding area. It is a very popular place of visit. It was he who gave his name to the city. In Sinhala, kurune means elephant defense and gala means rock. You can reach its summit by a road about 1,5 km from Wathhimi Road. There is a Buddhist temple (Athugala Temple), a communication tower from Sri Lanka Telecom and a huge statue of Buddha, the main point of interest on the site. This statue, inaugurated in 2003 after 27 months of work, is metres high, including the base. You can penetrate inside. An information panel placed in the approach of the statue recalls the history of the city which was the capital of the kingdom from 1341 to 1293 under the name Hasthiasailapura. Near the access road, you can see a former royal basin dug in the rock.\r\n\r\n', 74);

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `gid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `charge` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guideavailability`
--

CREATE TABLE `guideavailability` (
  `gaid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `availability_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `singleroomprice` int(11) NOT NULL,
  `doubleroomprice` int(11) NOT NULL,
  `familyroomprice` int(11) NOT NULL,
  `singlerooms` int(11) NOT NULL,
  `doublerooms` int(11) NOT NULL,
  `familyrooms` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `photo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hid`, `name`, `address`, `telephone`, `email`, `singleroomprice`, `doubleroomprice`, `familyroomprice`, `singlerooms`, `doublerooms`, `familyrooms`, `description`, `photo`) VALUES
(1, 'Water Garden Sigiriya', 'Indigaswewa, Sigiriya ', 664933067, 'watergarden@gami.com', 13000, 23000, 41000, 10, 15, 8, 'High-end villas, some with plunge pools, in a hotel offering gourmet dining, a spa & butler service', 1),
(2, 'Amari Hotel Galle', 'Galle Main Rd, Galle', 912030500, 'amari@gmail.com', 14000, 25000, 45000, 20, 25, 10, 'Set on a beach along the Indian Ocean, this upscale hotel is 4 km from Galle Dutch Fort.', 2),
(3, 'Heritance Kandalam', 'Heritance Kandalama 11, Dambulla', 667834125, 'kandalam@gmail.com', 15500, 29000, 41000, 15, 20, 10, 'Sleek rooms & suites with reservoir views, plus a fusion restaurant, a spa & 3 outdoor pools.', 3),
(4, 'EKHO Ella', 'Sandungama Rd, Ella', 572228655, 'ekho@gmail.com', 17000, 27000, 48000, 8, 15, 8, 'One of the newest additions to Ella, Ekho Ella is a mountainous holiday resort amidst eternal overlooking the popular \"Ella Gap View\".', 4),
(5, 'Heritage Hotel, Anuradhapura', 'Galwala Rd, Pothanegama', 252237806, 'heritageh@gmail.com', 9000, 19000, 36500, 12, 15, 15, 'Surrounded by trees and overlooking Tissa Wewa reservoir.', 5),
(6, 'Pelwehera Village Resort', 'Bulagala Junction, Habarana Road, Dambulla', 662284280, 'pvr@gmai.com', 7500, 18000, 34000, 16, 18, 20, 'A great place to stay while traveling to Dambulla.', 6),
(7, 'Elements Beach & Nature Resort, Kalpitiya', 'Elements Beach & Nature Resort Kappalady, Talawila Kalpitiya, Puttalam District Sri Lanka', 775066468, 'beachhotel@gmail.com', 11000, 21000, 39000, 12, 15, 15, 'eenergize with the rhythm of the Indian Ocean and the Kappalady Lagoon', 7),
(8, 'The Queens Wood Cottage', '110 PBC Hwy, Nuwara Eliya', 523456789, 'qwc@gmail.com', 13000, 28000, 45000, 8, 18, 15, 'experience the nature with full facilities', 8),
(9, 'Grand Camellia hotel', '14, 35 Gajabapura Road, Nuwara Eliya', 529876567, 'gch@gmail.com', 12000, 26000, 45000, 5, 15, 10, 'Airy quarters in a laid-back hotel offering 2 restaurants, plus a lounge with a pool table.', 9),
(10, 'Sasvi cabana', 'Unnamed Road, EP, Trincomalee', 773429749, 'Sasvi@gmail.com', 5000, 11000, 31000, 5, 8, 15, '3-star hotel with full facikities', 10),
(11, 'Le Grand Galle', '30 Park Rd, Galle', 912228555, 'legrand@gmail.com', 6000, 17000, 31000, 6, 10, 15, 'New, contemporary hotel perfectly positioned on a promontory overlooking the historic Fort and the Indian Ocean', 11),
(12, 'CocoBay Unawatuna', '10/4, Roomassala Road, Unawatuna', 867478341, 'coco@gmail.com', 8000, 20000, 37000, 8, 15, 15, 'Flanked by trees, this upscale hotel on a secluded part of Unawatuna Beach is 1 km from Katugoda train station.', 12),
(13, 'Turtle Eco Hotel', 'Beach Road, Madiha,Matara, Matara', 412223377, 'tch@gmail.com', 7500, 20000, 39000, 6, 16, 10, 'Turtle Eco Beach is a newly refurbished resort just 2.5 mi away from Mirissa city. This elegant property features an outdoor swimming pool and offers snorkeling', 13),
(14, 'Cinnamon Lakeside Colombo', '115, Sir Chittampalam A Gardiner Mawatha', 112491000, 'clc@gmail.com', 17000, 29000, 48000, 10, 15, 15, 'polished lodging with elegant Rooms.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `hotelavailability`
--

CREATE TABLE `hotelavailability` (
  `haid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `availability_date` varchar(50) NOT NULL,
  `singlerooms` int(11) NOT NULL,
  `doublerooms` int(11) NOT NULL,
  `familyrooms` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelavailability`
--

INSERT INTO `hotelavailability` (`haid`, `hid`, `availability_date`, `singlerooms`, `doublerooms`, `familyrooms`) VALUES
(1, 1, '2020-12-12', 4, 6, 3),
(2, 1, '2020-11-23', 2, 10, 4),
(3, 2, '2020-11-24', 13, 16, 5),
(4, 2, '2020-11-27', 12, 14, 7),
(5, 2, '2020-11-29', 13, 18, 2),
(6, 3, '2020-11-15', 4, 10, 6),
(7, 3, '2020-11-17', 11, 17, 4),
(8, 3, '2020-11-28', 12, 14, 1),
(9, 3, '2020-12-12', 11, 13, 5),
(10, 3, '2020-12-01', 2, 13, 4),
(11, 3, '2020-12-08', 12, 17, 8),
(12, 4, '2020-11-25', 3, 12, 6),
(13, 4, '2020-11-28', 7, 10, 6),
(14, 4, '2020-12-02', 3, 11, 5),
(15, 5, '2020-11-21', 10, 10, 8),
(16, 5, '2020-11-22', 8, 13, 12),
(17, 5, '2020-11-23', 5, 7, 9),
(18, 6, '2020-11-23', 13, 14, 12),
(19, 6, '2020-11-27', 6, 8, 5),
(20, 7, '2020-11-24', 10, 13, 8),
(21, 7, '2020-11-27', 7, 4, 8),
(22, 7, '2020-11-20', 4, 7, 11),
(23, 8, '2020-11-20', 4, 12, 7),
(24, 8, '2020-11-21', 6, 9, 4),
(25, 8, '2020-11-26', 5, 11, 8),
(26, 9, '2020-11-20', 1, 9, 6),
(27, 9, '2020-11-23', 2, 7, 5),
(28, 9, '2020-11-26', 4, 11, 7),
(29, 10, '2020-11-22', 2, 5, 10),
(30, 10, '2020-11-23', 1, 3, 11),
(31, 10, '2020-11-25', 2, 3, 8),
(32, 11, '2020-11-20', 2, 10, 7),
(33, 11, '2020-11-24', 3, 8, 11),
(34, 12, '2020-11-23', 4, 11, 8),
(35, 12, '2020-11-25', 5, 7, 12),
(36, 12, '2020-11-27', 4, 5, 8),
(37, 12, '2020-11-29', 6, 14, 7),
(38, 13, '2020-11-23', 2, 11, 7),
(39, 13, '2020-11-28', 1, 12, 9),
(40, 14, '2020-11-20', 9, 13, 11),
(41, 14, '2020-11-21', 8, 11, 8),
(42, 14, '2020-11-22', 5, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packid` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL,
  `subcatname` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `days` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `details` text NOT NULL,
  `photo1` int(11) NOT NULL,
  `photo2` int(11) NOT NULL,
  `photo3` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packid`, `catname`, `subcatname`, `name`, `days`, `price`, `details`, `photo1`, `photo2`, `photo3`) VALUES
(9, 'Family Tours', 'Three Days Packages', 'Package 1 (Bronze)', 3, 1500, 'This is the three days (Bronze) travel package which covers Nuwara Eliya, Haputale and Colombo.\r\n', 25, 26, 27),
(4, 'Family Tours', 'Two Days Packages', 'Package 2 (Gold)', 2, 3000, 'Package 2 (Gold) will cover Galle and Hikkaduwa cities with high facilities.', 10, 11, 12),
(5, 'Family Tours', 'Two Days Packages', 'Package 2 (Silver)', 2, 2000, 'Package 2 (Silver) will cover Galle and Hikkaduwa cities with moderate facilities.', 13, 14, 15),
(6, 'Family Tours', 'Two Days Packages', 'Package 2 (Bronze)', 2, 1000, 'Package 2 (Bronze) will cover Galle and Hikkaduwa cities with average facilities.', 16, 17, 18),
(8, 'Family Tours', 'Three Days Packages', 'Package 1 (Silver)', 3, 2500, 'This is the three days (Silver) travel package which covers Nuwara Eliya, Haputale and Colombo.\r\n', 22, 23, 24),
(7, 'Family Tours', 'Three Days Packages', 'Package 1 (Gold)', 3, 3500, 'This is the three days (Gold) travel package which covers Nuwara Eliya, Haputale and Colombo.\r\n', 19, 20, 21);

-- --------------------------------------------------------

--
-- Table structure for table `packdestination`
--

CREATE TABLE `packdestination` (
  `packdesid` int(11) NOT NULL,
  `packid` int(11) NOT NULL,
  `destid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packdestination`
--

INSERT INTO `packdestination` (`packdesid`, `packid`, `destid`) VALUES
(18, 8, 30),
(17, 8, 35),
(16, 8, 25),
(4, 4, 16),
(5, 4, 10),
(6, 5, 16),
(7, 5, 10),
(8, 6, 16),
(9, 6, 10),
(15, 7, 30),
(14, 7, 35),
(13, 7, 25),
(19, 9, 25),
(20, 9, 35),
(21, 9, 30);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `resvid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` int(11) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resavation`
--

CREATE TABLE `resavation` (
  `resvid` int(11) NOT NULL,
  `packid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `travelers` int(11) NOT NULL,
  `singlerooms` int(11) NOT NULL,
  `doublerooms` int(11) NOT NULL,
  `familyrooms` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcatid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcatid`, `name`, `description`) VALUES
(2, 'Two Days Packages', 'This is two days tour package. To find the travel packages please Click here!!'),
(3, 'Three Days Packages', 'This is three days tour package. To find the packages please Click here!!'),
(4, 'Four Days Packages', 'This is four days tour package. To find the packages please Click here!!'),
(5, 'Five Days Packages', 'This is five days tour package. To find the packages please Click here!!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `address`, `email`, `telephone`) VALUES
(1, 'Asini Pathmila Silva', 'No. 45, main road, Ambalangoda', 'asinipathmila@gmail.com', 774567823),
(2, 'Ruwan Hemachandra', 'No. 25, main road, Rathnapura', 'ruwanthi@gmail.com', 774567823),
(3, 'Hansaka Sadaruwan ', 'No. 45, main road, Kaluthara', 'hansaka@gmail.com', 774567823),
(4, 'Sachini Maneesha', 'No. 45, main road, Matara', 'sachini@gmail.com', 774567823),
(5, 'Medani Gunathilaka', 'No. 45, main road,  Kagalle', 'medani@gamil.com', 774567823),
(6, 'Uvini De Silva', 'No. 45, main road, Piliyandara', 'uvini@gmail.com', 774567823),
(7, 'Sandeepa Ranathunga', 'No. 45, main road, Galle', 'sandeepa@gmail.com', 774567823),
(8, 'Chanaka Prasad', 'No. 45, main road, Matara', 'chanaka@gmail.com', 774567823),
(9, 'Shifna Shafeek', 'No. 45, main road, Colombo', 'shifna@gmail.com', 774567823),
(10, 'Anushka Dharshana', 'No. 45, main road, Badulla', 'anushka@gmail.com', 774567823),
(11, 'Nuwan Fernando', 'No. 45, main road, Moratuwa', 'nuwan@gmail.com', 774567823),
(12, 'Ayomal Praveen', 'No. 45, main road, Dankotuwa', 'ayomal@gmail.com', 774567823),
(13, 'Chanaka Wickramasinghe', 'No. 45, main road, Kandy', 'chanakawic@gmail.com', 774567823),
(14, 'Hirusha Chamod', 'No. 55, main road, Ambalangoda', 'hirusha@gmail.com', 774567890),
(15, 'Aveesha Jayawardhana', 'No. 45, main road, Gampaha', 'aveesha@gmail.com', 774567890);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vid` varchar(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `charge` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleavailability`
--

CREATE TABLE `vehicleavailability` (
  `vaid` int(11) NOT NULL,
  `vid` varchar(20) NOT NULL,
  `availability_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `categorysubcategory`
--
ALTER TABLE `categorysubcategory`
  ADD PRIMARY KEY (`cat-subcatid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destid`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `guideavailability`
--
ALTER TABLE `guideavailability`
  ADD PRIMARY KEY (`gaid`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `hotelavailability`
--
ALTER TABLE `hotelavailability`
  ADD PRIMARY KEY (`haid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packid`);

--
-- Indexes for table `packdestination`
--
ALTER TABLE `packdestination`
  ADD PRIMARY KEY (`packdesid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `resavation`
--
ALTER TABLE `resavation`
  ADD PRIMARY KEY (`resvid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcatid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `vehicleavailability`
--
ALTER TABLE `vehicleavailability`
  ADD PRIMARY KEY (`vaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorysubcategory`
--
ALTER TABLE `categorysubcategory`
  MODIFY `cat-subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guideavailability`
--
ALTER TABLE `guideavailability`
  MODIFY `gaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotelavailability`
--
ALTER TABLE `hotelavailability`
  MODIFY `haid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packdestination`
--
ALTER TABLE `packdestination`
  MODIFY `packdesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resavation`
--
ALTER TABLE `resavation`
  MODIFY `resvid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicleavailability`
--
ALTER TABLE `vehicleavailability`
  MODIFY `vaid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
