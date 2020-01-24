SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `gogreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `evid` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `host` text NOT NULL,
  `description` text NOT NULL,
  `venue` text NOT NULL,
  `city` text NOT NULL,
  `start-date` text NOT NULL,
  `end-date` text NOT NULL,
  `registrations` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenge` (
  `cid` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `start-date` text NOT NULL,
  `end-date` text NOT NULL,
  `registrations` int(11) DEFAULT NULL,
  `completions` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issue` (
  `isid` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `host` text NOT NULL,
  `category` text NOT NULL,
  `heading` text NOT NULL,
  `issue` text NOT NULL,
  `attachments` text NOT NULL,
  `upvotes` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solution` (
  `sid` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `user` text NOT NULL,
  `isid` text NOT NULL,
  `description` text NOT NULL,
  `attachments` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `rid` int(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `uid` text NOT NULL,
  `type` text NOT NULL,
  `eid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `ords` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_req`
--

CREATE TABLE `password_req` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `datetimesss` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
