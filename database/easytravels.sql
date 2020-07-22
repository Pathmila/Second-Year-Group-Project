-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2020 at 10:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`aid`, `uid`, `username`, `password`, `admin`) VALUES
(1, 1, 'asi', 'asini', 0),
(2, 0, 'admin', 'admin', 1),
(3, 3, 'hotel', 'hotel', 0),
(4, 4, 'vehicle', 'vehicle', 0),
(5, 5, 'guide', 'guide', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `photo` int(20) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
-- Table structure for table `category-subcategory`
--

DROP TABLE IF EXISTS `category-subcategory`;
CREATE TABLE IF NOT EXISTS `category-subcategory` (
  `cat-subcatid` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  PRIMARY KEY (`cat-subcatid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category-subcategory`
--

INSERT INTO `category-subcategory` (`cat-subcatid`, `catid`, `subcatid`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `photo1` int(11) NOT NULL,
  `photo2` int(11) NOT NULL,
  `photo3` int(11) NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `hotelrating` int(11) NOT NULL,
  `guide` varchar(50) NOT NULL,
  `guiderating` int(11) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `vehiclerating` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `destid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`destid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

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
(35, 'Haputale', 'HAPUTALE 173 KM (107 Miles) From Colombo\r\n<br /><br />\r\n\r\nLocated in the Badulla District, and is 4695 ft high above the sea level. It is one of the places with a very rich biodiversity and allows a very beautiful view of the Southern Plains. It is approximately 193 km away from Colombo. The town is no doubt one of the spectacular places in Sri Lanka. Haputale is makes hiking and trekking a great exhilarating exercise. The major attraction of Haputale is the Liptons seat, Adisham Bungalow and the famous Dambatenna tea factory.\r\n<br /><br />\r\n\r\nThe Climate\r\n<br /><br />\r\n\r\nDue to its elevation the temperature is significantly lower than other parts of the country, running a temperature of approximately less than 25 degrees.\r\n<br /><br />\r\n\r\nAdisham\'s Bungalow\r\n<br /><br />\r\n\r\nOne of the few remnants of the British Colonial, during which a Kentish gentleman built this magnificent mansion which is also influenced by post victorian architecture. Right next to it is the Tangalamalai Bird Santuary where paradise flycatchers and many more birds of the such can be seen.\r\n<br /><br />\r\n\r\nLipton\'s Seat\r\n<br /><br />\r\n\r\nThe Lipton tea factory founder was said to have bought the estate on which the factory built because he fell in love with the breath-taking panoramic view, which today is known as the Lipton\'s seat, however the mist tends to set in during the evening so the journey up the lipton\'s seat should be made early in the morning.\r\n\r\nDambatenna Tea Factory\r\n<br /><br />\r\n\r\n10 km along the road, east of Haputale the famous Tea factory built by Sir Thomas Lipton. The factory is open for visitors where you can also get a taste of the best tea in the whole world.\r\n<br /><br />\r\n<br /><br />', 61);

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

DROP TABLE IF EXISTS `guide`;
CREATE TABLE IF NOT EXISTS `guide` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`gid`, `aid`, `name`, `birthday`, `address`, `telephone`, `email`, `description`, `photo`) VALUES
(1, 4, 'G', '2019-06-10', 'GGG', 772345678, 'g.@g.g', 'GGGGG', 6);

-- --------------------------------------------------------

--
-- Table structure for table `guideavailability`
--

DROP TABLE IF EXISTS `guideavailability`;
CREATE TABLE IF NOT EXISTS `guideavailability` (
  `gaid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`gaid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `singleroomprice` int(11) NOT NULL,
  `doubleroomprice` int(11) NOT NULL,
  `familyroomprice` int(11) NOT NULL,
  `singlerooms` int(11) NOT NULL,
  `doublerooms` int(11) NOT NULL,
  `familyrooms` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hid`, `aid`, `name`, `address`, `telephone`, `email`, `singleroomprice`, `doubleroomprice`, `familyroomprice`, `singlerooms`, `doublerooms`, `familyrooms`, `description`, `photo`) VALUES
(1, 3, 'H', 'H', 772345678, 'h.h@h.com', 1000, 2500, 3500, 12, 10, 4, 'HHHHHH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotelavailability`
--

DROP TABLE IF EXISTS `hotelavailability`;
CREATE TABLE IF NOT EXISTS `hotelavailability` (
  `haid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `singlerooms` int(11) NOT NULL,
  `doublerooms` int(11) NOT NULL,
  `familyrooms` int(11) NOT NULL,
  PRIMARY KEY (`haid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `telephone`, `details`) VALUES
(9, 'asini', 'asinipathmila@gmail.com', 776543451, 'aaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `packid` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(20) NOT NULL,
  `subcatname` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `days` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `details` text NOT NULL,
  `photo1` int(11) NOT NULL,
  `photo2` int(11) NOT NULL,
  `photo3` int(11) NOT NULL,
  PRIMARY KEY (`packid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packid`, `catname`, `subcatname`, `name`, `days`, `price`, `details`, `photo1`, `photo2`, `photo3`) VALUES
(1, 'Family Tours', 'Two Days Packages', 'Package 1', 2, 2000, 'This 2 days Sri Lanka tour package will cover Kandy and Colombo. The city of Kandy in Sri Lanka is renowned as the social and cultural capital of the country. This breathtaking hill country is the perfect place for relaxing and reflecting. This city is well known for housing many ancient temples, and among them, the most renowned is the temple of \'Dalada Maligawa\'(The Temple of the Tooth). Here, the tooth relic of Lord Buddha is reserved. It attracts thousands of visitors including the devotees to this city per year. Apart from that, this city has the largest and beautiful botanical garden in the island, known as Peradeniya Botanical Garden.\r\n<br /><br />\r\nActivity Covered<br /><br />\r\nVisit the Temple of Tooth Relic<br />\r\nEnjoy a Kandy City Tour<br />\r\nEnjoy a Cultural Dance<br />\r\nperadeniya botanical gardens<br />\r\nVisit the Pinnawala Elephant Orphanage<br />\r\n\r\n', 13, 15, 14),
(2, 'Family Tours', 'Two Days Packages', 'Package 2', 2, 2500, 'Bentota and its breathtaking sandy beach pretty much transform your dreams and visions of a tropical paradise into an everyday reality. Located close to the Southern tip of the Island of Sri Lanka and only about 200 km from the Equator, this secluded crescent shaped beach is the perfect place to sit back, relax and forget about all the hustle and bustle of your other life that\'s a million miles away.<br />\r\nThe eye-catching Bentota city is situated 200 km away from the Equator as well as very close to the Southern tip of the Island of Sri Lanka. The eye-catching beauty of this golden sandy beach will turn your dreams and visions of a tropical heaven into a normal reality.<br />\r\n<br />\r\nActivities Covered<br /><br />\r\nSpend First day at Bentota<br />\r\nOn the way stop over at Stilt Fishermen in Sri Lanka<br />\r\nOvernight stay at the Hotel<br />\r\nTrip in Madu river<br />\r\nGalle City tour <br />\r\n', 17, 16, 18),
(3, 'Family Tours', 'There Days Packages', 'Package 3', 3, 3500, 'The Yala National Park is a popular and world renowned wildlife reservation in the Sri Lanka. It is most notable renowned for being home to the attractive and elusive Sri Lankan leopard. Despite their elusive nature, almost all of the travelers will certainly identify a leopard in this stunning place because of the high attention of leopard residing in the park.<br />\r\nKataragama is a pilgrimage town sacred to Buddhist, Hindu and indigenous Vedda people of Sri Lanka. People from South India also go there to worship. The town has the Kataragama temple, a shrine dedicated to Skanda Kumara also known as Kataragama deviyo<br />\r\n<br />\r\n\r\nActivities Covered<br /><br />\r\nFirst day for Yala Safari<br />\r\nSecond day at Katharagama<br />\r\nThird day at Galle<br />\r\n', 20, 19, 18),
(4, 'Family Tours', 'Three Days Packages', 'Package 4', 3, 3500, 'Nuwara Eliya is dubbed as the garden city of Asia for its marvelous valleys, hills and waterfalls. It is standing 6,182 feet above the sea level and it is to be found at the foot of Mount Pidurutalagala, Sri Lanka\'s highest peak. Apart from these, the Hakgala gardens grown tea plantations and the Worlds End at Horton Plains are also fantastic tourist attractions where visitors come in big numbers.\r\n<br /><br />\r\nActivities Covered<br /><br />\r\nProceed to Nuwara Eliya known as Little England<br />\r\nEn route, Tea Plantation & Tea Factory visit<br />\r\nVisit beautiful waterfalls in Hill Country<br />\r\nTake Nuwara Eliya city Tour (Strawberry farm visit, boat ride can be arranged)<br />\r\nVisit the Hakgala Botanical Gardens<br />\r\n', 22, 21, 23),
(5, 'Religious Tour', 'Two Days Packages', 'Package 5', 2, 2500, 'Declared a World Heritage Site by UNESCO, the ancient city of Polonnaruwa is a melting pot of history. It is known to be one of the best planned archaeological relic cities in Sri Lanka, carried out by the self-sufficient King Parakramabahu; the last king of the city. Stroll through the ruins and discover the charms of the city as the famed monkeys swing on tree tops; Disney’s, Monkey Kingdom was based off the toque macaques of the city.\r\n<br />\r\nDambulla is to be found in the central province of the island and the city is home to a number of spectacular attractions. In addition, the city has the largest rose quartz mountain range in the entire Asia and the ironwood forest known as Namal Uyana. Now, the big quartz rose mountain is millions of years old and it encircled by the ancient ironwood forest trees. Also, the grand rock fortress of Sigiriya is another major attraction, which is worth checking.\r\n<br />\r\nActivities Covered<br /><br />\r\nFirst day at Polonnaruwa<br />\r\nVisit the Parakrama Samudraya<br />\r\nSecond day at Dambulla<br />\r\nDambulla City tour and Visit the Dambulla Cave Temple (Golden Temple & Golden Buddha Statue)<br />', 24, 25, 26);

-- --------------------------------------------------------

--
-- Table structure for table `packdestination`
--

DROP TABLE IF EXISTS `packdestination`;
CREATE TABLE IF NOT EXISTS `packdestination` (
  `packdesid` int(11) NOT NULL AUTO_INCREMENT,
  `packid` int(11) NOT NULL,
  `destid` int(11) NOT NULL,
  PRIMARY KEY (`packdesid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packdestination`
--

INSERT INTO `packdestination` (`packdesid`, `packid`, `destid`) VALUES
(1, 1, 1),
(2, 1, 30),
(3, 2, 10),
(4, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `resvid` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telephone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resavation`
--

DROP TABLE IF EXISTS `resavation`;
CREATE TABLE IF NOT EXISTS `resavation` (
  `resvid` int(11) NOT NULL AUTO_INCREMENT,
  `packid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `travelers` int(11) NOT NULL,
  `singlerooms` int(11) NOT NULL,
  `doublerooms` int(11) NOT NULL,
  `familyrooms` int(11) NOT NULL,
  PRIMARY KEY (`resvid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcatid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`subcatid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcatid`, `name`, `description`, `photo`) VALUES
(1, 'One Day Packages', 'This is one day tour package. To find the packages please Click here!!', 62),
(2, 'Two Days Packages', 'This is two days tour package. To find the travel packages please Click here!!', 63),
(3, 'Three Days Packages', 'This is three days tour package. To find the packages please Click here!!', 64),
(4, 'Four Days Packages', 'This is four days tour package. To find the packages please Click here!!', 65),
(5, 'Five Days Packages', 'This is five days tour package. To find the packages please Click here!!', 66),
(6, 'Seven Days Packages', 'This is seven days tour package. To find the packages please Click here!!', 67);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `address`, `email`, `telephone`) VALUES
(1, 'Asini Pathmila Silva', 'Ambalangoda', 'asini@gmail.com', 773153130),
(4, 'pathmila', 'ambalangoda', 'asinipathmila@gmail.com', 776543451),
(5, 'pathmila', 'ambalangoda', 'asinipathmila@gmail.com', 776543451);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vid` varchar(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `aid`, `name`, `email`, `address`, `telephone`, `type`, `details`, `photo`) VALUES
('VVV1111', 5, 'V', 'v@v.v', 'V', 772345678, 'V', 'VVVVVVVVVVV', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleavailability`
--

DROP TABLE IF EXISTS `vehicleavailability`;
CREATE TABLE IF NOT EXISTS `vehicleavailability` (
  `vaid` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL,
  `availability` varchar(20) NOT NULL,
  PRIMARY KEY (`vaid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
