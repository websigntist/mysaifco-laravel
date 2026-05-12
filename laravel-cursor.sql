-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2026 at 09:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-cursor`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `show_in_menu` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_by` int NOT NULL DEFAULT '0',
  `ordering` int NOT NULL DEFAULT '0',
  `status` enum('unpublish','published') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `show_title`, `friendly_url`, `image`, `description`, `show_in_menu`, `created_by`, `ordering`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Amazon Books', '1', 'amazon-books', '1759442373_image.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab aperiam asperiores autem beatae corporis cumque dignissimos esse fugit hic ipsa libero magni nam, natus nihil omnis quisquam sequi soluta sunt unde? Accusantium ea facere iste itaque labore nulla quia. Doloribus in ipsam iste nemo quae soluta veritatis! Magni, perspiciatis.', 'Yes', 1, 1, 'published', 'Amazon Books', 'Amazon', 'Amazon', '2025-10-02 16:59:33', '2025-10-03 10:08:41', NULL),
(2, 'Book Publication', '0', 'book-publication', '1759442668_image.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab aperiam asperiores autem beatae corporis cumque dignissimos esse fugit hic ipsa libero magni nam, natus nihil omnis quisquam sequi soluta sunt unde? Accusantium ea facere iste itaque labore nulla quia. Doloribus in ipsam iste nemo quae soluta veritatis! Magni, perspiciatis.', 'Yes', 1, 2, 'published', 'Book Publication', 'sd', 'dsdsdssd', '2025-10-02 17:04:28', '2025-10-03 10:08:31', NULL),
(3, 'Eliana Best Book Writer', '1', 'eliana-best-book-writer', '1759769183_image.jpg', 'Eliana Best Book Writer', 'Yes', 1, 1, 'unpublish', 'Eliana Best Book Writer', 'Est aut eaque deseru', 'Veniam et sunt expl', '2025-10-02 17:19:01', '2025-10-23 15:20:35', '2025-10-23 15:20:35'),
(15, 'Ipsum consequuntur', '0', 'ipsum-consequuntur', '1759867792_image.jpg', 'Consequatur Commodo', 'Yes', 1, 79, 'published', 'Ipsum Consequuntur', 'Minima a esse hic et', 'Nisi sequi ducimus', '2025-10-07 14:59:22', '2025-10-23 11:37:38', NULL),
(16, 'Buddy Back', '0', 'buddy-back', '1761250531_image.webp', '<p>A guest visit prompts a New Yorker&rsquo;s self-discovery.</p>', 'Yes', 1, 3, 'unpublish', 'Buddy Back', 'Vel maiores dolor ex', 'Aliquip id neque odi', '2025-10-23 15:15:31', '2025-10-28 05:04:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `show_title` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `show_in_menu` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `ordering` int NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `friendly_url`, `parent_id`, `image`, `description`, `show_title`, `show_in_menu`, `ordering`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Book Writing', 'book-writing', 0, '1761170674_image.webp', '<p>book writing</p>', '0', 'Yes', 1, 'Active', 'book', NULL, NULL, 1, '2025-10-02 21:43:14', '2025-10-22 17:04:34', NULL),
(3, 'News & Tech', 'news-tech', 4, '1761170631_image.webp', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '0', 'Yes', 3, 'Inactive', 'News Tech', 'news, tech', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2025-10-06 09:55:33', '2025-10-22 17:04:02', NULL),
(4, 'Logo Design News', 'logo-design-news', 1, '1761170344_image.webp', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '0', 'Yes', 4, 'Active', 'Logo Design News', 'logo, design, news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit heloo', 1, '2025-10-06 09:57:04', '2025-10-22 16:59:04', NULL),
(16, 'Doloremque tempore', 'doloremque-tempore', 3, '1761167914_image.webp', '<p>test</p>', '1', 'Yes', 39, 'Active', 'Doloremque Tempore', 'Totam occaecat et mi', 'Ratione fuga Consec', 1, '2025-10-22 16:18:34', '2025-10-22 17:08:22', NULL),
(17, 'Laborum id amet of', 'laborum-id-amet-of', 0, NULL, '<p>test</p>', '0', 'Yes', 36, 'Inactive', 'Laborum Id Amet Of', 'Quibusdam qui sed al', 'Mollitia qui laborum', 1, '2025-10-22 17:09:11', '2025-10-22 17:27:46', '2025-10-22 17:27:46'),
(20, 'Culpa itaque qui fu', 'culpa-itaque-qui-fu', 1, '1761171022_image.webp', '<p>test</p>', '0', 'Yes', 25, 'Active', 'Culpa Itaque Qui Fu', 'Ut sint ad consecte', 'Dolorem excepturi qu', 1, '2025-10-22 17:10:22', '2025-10-22 17:10:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_rel`
--

DROP TABLE IF EXISTS `blog_category_rel`;
CREATE TABLE `blog_category_rel` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `blog_category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_rel`
--

INSERT INTO `blog_category_rel` (`id`, `blog_id`, `blog_category_id`) VALUES
(2, 3, 2),
(5, 2, 4),
(6, 1, 1),
(7, 1, 2),
(25, 15, 1),
(26, 15, 2),
(27, 16, 1),
(28, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE `blog_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `ordering` int NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `title`, `created_by`, `ordering`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'News One', 1, 1, 'Active', '2025-10-07 15:04:50', '2025-10-23 16:56:25', NULL),
(2, 'tach', 1, 2, 'Active', '2025-10-07 10:10:39', '2025-10-07 10:13:27', NULL),
(4, 'web', 1, 4, 'Inactive', '2025-10-07 10:12:33', '2025-10-23 16:56:35', NULL),
(10, 'Book Writing', 1, 33, 'Active', '2025-10-23 17:36:19', '2025-10-24 08:44:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag_rel`
--

DROP TABLE IF EXISTS `blog_tag_rel`;
CREATE TABLE `blog_tag_rel` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `blog_tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tag_rel`
--

INSERT INTO `blog_tag_rel` (`id`, `blog_id`, `blog_tag_id`, `created_at`, `updated_at`) VALUES
(1, 15, 2, NULL, NULL),
(3, 15, 1, NULL, NULL),
(4, 16, 1, NULL, NULL),
(5, 16, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `friendly_url`, `description`, `image`, `ordering`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gul Ahmed', 'gul-ahmed', 'test', NULL, 1, 'Active', 1, '2026-03-25 11:17:36', '2026-03-25 11:18:39', NULL),
(2, 'iPhon', 'iphon', '<p>test</p>', NULL, 2, 'Active', 1, '2026-03-30 16:33:16', '2026-03-30 16:33:16', NULL),
(3, 'Realme', 'realme', '<p>test</p>', NULL, 3, 'Active', 1, '2026-03-30 16:33:44', '2026-03-30 16:33:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE `category_product` (
  `product_category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`product_category_id`, `product_id`) VALUES
(2, 1),
(3, 1),
(2, 2),
(3, 2),
(2, 3),
(3, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`name`) VALUES
('Afganistan'),
('Albania'),
('Algeria'),
('American Samoa'),
('Andorra'),
('Angola'),
('Anguilla'),
('Antigua & Barbuda'),
('Argentina'),
('Armenia'),
('Aruba'),
('Australia'),
('Austria'),
('Azerbaijan'),
('Bahamas'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Belarus'),
('Belgium'),
('Belize'),
('Benin'),
('Bermuda'),
('Bhutan'),
('Bolivia'),
('Bonaire'),
('Bosnia & Herzegovina'),
('Botswana'),
('Brazil'),
('British Indian Ocean Ter'),
('Brunei'),
('Bulgaria'),
('Burkina Faso'),
('Burundi'),
('Cambodia'),
('Cameroon'),
('Canada'),
('Canary Islands'),
('Cape Verde'),
('Cayman Islands'),
('Central African Republic'),
('Chad'),
('Channel Islands'),
('Chile'),
('China'),
('Christmas Island'),
('Cocos Island'),
('Colombia'),
('Comoros'),
('Congo'),
('Cook Islands'),
('Costa Rica'),
('Cote DIvoire'),
('Croatia'),
('Cuba'),
('Curaco'),
('Cyprus'),
('Czech Republic'),
('Denmark'),
('Djibouti'),
('Dominica'),
('Dominican Republic'),
('East Timor'),
('Ecuador'),
('Egypt'),
('El Salvador'),
('Equatorial Guinea'),
('Eritrea'),
('Estonia'),
('Ethiopia'),
('Falkland Islands'),
('Faroe Islands'),
('Fiji'),
('Finland'),
('France'),
('French Guiana'),
('French Polynesia'),
('French Southern Ter'),
('Gabon'),
('Gambia'),
('Georgia'),
('Germany'),
('Ghana'),
('Gibraltar'),
('Great Britain'),
('Greece'),
('Greenland'),
('Grenada'),
('Guadeloupe'),
('Guam'),
('Guatemala'),
('Guinea'),
('Guyana'),
('Haiti'),
('Hawaii'),
('Honduras'),
('Hong Kong'),
('Hungary'),
('Iceland'),
('India'),
('Indonesia'),
('Iran'),
('Iraq'),
('Ireland'),
('Isle of Man'),
('Israel'),
('Italy'),
('Jamaica'),
('Japan'),
('Jordan'),
('Kazakhstan'),
('Kenya'),
('Kiribati'),
('Korea North'),
('Korea Sout'),
('Kuwait'),
('Kyrgyzstan'),
('Laos'),
('Latvia'),
('Lebanon'),
('Lesotho'),
('Liberia'),
('Libya'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Macau'),
('Macedonia'),
('Madagascar'),
('Malaysia'),
('Malawi'),
('Maldives'),
('Mali'),
('Malta'),
('Marshall Islands'),
('Martinique'),
('Mauritania'),
('Mauritius'),
('Mayotte'),
('Mexico'),
('Midway Islands'),
('Moldova'),
('Monaco'),
('Mongolia'),
('Montserrat'),
('Morocco'),
('Mozambique'),
('Myanmar'),
('Nambia'),
('Nauru'),
('Nepal'),
('Netherland Antilles'),
('Netherlands'),
('Nevis'),
('New Caledonia'),
('New Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('Niue'),
('Norfolk Island'),
('Norway'),
('Oman'),
('Pakistan'),
('Palau Island'),
('Palestine'),
('Panama'),
('Papua New Guinea'),
('Paraguay'),
('Peru'),
('Phillipines'),
('Pitcairn Island'),
('Poland'),
('Portugal'),
('Puerto Rico'),
('Qatar'),
('Republic of Montenegro'),
('Republic of Serbia'),
('Reunion'),
('Romania'),
('Russia'),
('Rwanda'),
('St Barthelemy'),
('St Eustatius'),
('St Helena'),
('St Kitts-Nevis'),
('St Lucia'),
('St Maarten'),
('St Pierre & Miquelon'),
('St Vincent & Grenadines'),
('Saipan'),
('Samoa'),
('Samoa American'),
('San Marino'),
('Sao Tome & Principe'),
('Saudi Arabia'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra Leone'),
('Singapore'),
('Slovakia'),
('Slovenia'),
('Solomon Islands'),
('Somalia'),
('South Africa'),
('Spain'),
('Sri Lanka'),
('Sudan'),
('Suriname'),
('Swaziland'),
('Sweden'),
('Switzerland'),
('Syria'),
('Tahiti'),
('Taiwan'),
('Tajikistan'),
('Tanzania'),
('Thailand'),
('Togo'),
('Tokelau'),
('Tonga'),
('Trinidad & Tobago'),
('Tunisia'),
('Turkey'),
('Turkmenistan'),
('Turks & Caicos Is'),
('Tuvalu'),
('Uganda'),
('Ukraine'),
('United Arab Erimates'),
('United Kingdom'),
('USA'),
('Uraguay'),
('Uzbekistan'),
('Vanuatu'),
('Vatican City State'),
('Venezuela'),
('Vietnam'),
('Virgin Islands (Brit)'),
('Virgin Islands (USA)'),
('Wake Island'),
('Wallis & Futana Is'),
('Yemen'),
('Zaire'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(14,2) DEFAULT NULL,
  `discount_type` enum('In Percent','Fix Value') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Percent',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `usage_limit` int UNSIGNED NOT NULL DEFAULT '0',
  `has_used` int UNSIGNED NOT NULL DEFAULT '0',
  `min_order_value` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_title`, `coupon_code`, `discount_value`, `discount_type`, `start_date`, `end_date`, `usage_limit`, `has_used`, `min_order_value`, `status`, `ordering`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ramazan Offer1', 'ramazan30', '1000.00', 'Fix Value', '2026-04-25', '2026-04-28', 15, 0, 3000, 'Active', 1, 1, '2026-04-06 15:16:35', '2026-04-06 15:40:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoices`
--

DROP TABLE IF EXISTS `customer_invoices`;
CREATE TABLE `customer_invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_type` enum('sales','purchase') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sales',
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('sent','draft','overdue','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sent',
  `payment_status` enum('Paid','Unpaid') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `currency` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AED',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `tax_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vat_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `vat_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `terms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `letterhead` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stamp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_discount` tinyint(1) NOT NULL DEFAULT '0',
  `show_tax` tinyint(1) NOT NULL DEFAULT '0',
  `show_vat` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_invoices`
--

INSERT INTO `customer_invoices` (`id`, `invoice_number`, `invoice_type`, `client_name`, `client_email`, `client_phone`, `client_address`, `invoice_date`, `due_date`, `status`, `payment_status`, `currency`, `subtotal`, `tax_rate`, `tax_amount`, `vat_rate`, `vat_amount`, `discount`, `total`, `notes`, `terms`, `letterhead`, `signature`, `stamp`, `show_discount`, `show_tax`, `show_vat`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INV-202511-0001', 'sales', 'Dismak CSP', 'info@dismakcsp.com', '+9271568965', 'Office 123, Dubai - UAE.', '2025-11-03', '2025-11-12', 'sent', 'Paid', 'AED', '15000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15000.00', '4 to 6 weeks for completion the work.', 'Payment cheque will be deposited in the Bank.', '1762454328_letterhead.webp', '1762199781_signature.webp', '1762454328_stamp.webp', 0, 1, 1, 1, '2025-11-03 03:37:14', '2026-03-25 10:28:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_quotations`
--

DROP TABLE IF EXISTS `customer_quotations`;
CREATE TABLE `customer_quotations` (
  `id` bigint UNSIGNED NOT NULL,
  `quotation_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quotation_date` date NOT NULL,
  `valid_until` date NOT NULL,
  `status` enum('sent','draft','accepted','rejected','expired') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sent',
  `currency` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AED',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `tax_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vat_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `vat_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `terms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `letterhead` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stamp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_discount` tinyint(1) NOT NULL DEFAULT '0',
  `show_tax` tinyint(1) NOT NULL DEFAULT '0',
  `show_vat` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_quotations`
--

INSERT INTO `customer_quotations` (`id`, `quotation_number`, `client_name`, `client_email`, `client_phone`, `client_address`, `quotation_date`, `valid_until`, `status`, `currency`, `subtotal`, `tax_rate`, `tax_amount`, `vat_rate`, `vat_amount`, `discount`, `total`, `notes`, `terms`, `letterhead`, `signature`, `stamp`, `show_discount`, `show_tax`, `show_vat`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'QUO-202511-0001', 'Lila Roy', 'dytuj@mailinator.com', '+1 (284) 349-2444', 'Aliqua Laboris temp', '2025-11-04', '2025-11-13', 'sent', 'AED', '10000.00', '0.00', '0.00', '5.00', '500.00', '500.00', '10000.00', 'Ut do excepteur cupi', 'Dolore qui est aliqu', '1762287641_letterhead.webp', '1762287642_signature.webp', '1762287642_stamp.webp', 0, 0, 1, 1, NULL, '2025-11-04 15:20:42', '2025-11-06 15:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `document` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `slug`, `description`, `status`, `document`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Reset Password', 'reset-password', '<p>Dear [first_name],</p>\r\n<p>We received a request to reset the password for your account.</p>\r\n<p><strong>Reset Your Password:</strong><br>Password reset link : [reset_link]</p>\r\n<p>This link will expire in 60 minutes for your security.</p>\r\n<p><strong>Didn\'t request this?</strong><br>No action is needed your account remains secure. Ignore this email if you didn&rsquo;t initiate the request.</p>\r\n<p><strong>Security Tip:</strong><br>Use a strong, unique password and enable Two-Factor Authentication (2FA) in your dashboard after logging in.</p>\r\n<p><br>Stay Secure,<br>[site_title]<br>[site_url]</p>', 'Active', NULL, 1, '2025-10-31 05:11:20', '2026-03-11 13:31:00', NULL),
(2, 'New User Registration', 'new-user-registration', '<p>Dear [first_name],</p>\r\n<p>Thank you for registering with [site_title]! Your account has been successfully created, and you&rsquo;re now ready to explore secure, fast, and seamless CMS system.<br><br></p>\r\n<p><strong>Your Login Credential:</strong><br>Username: [username]<br>Password: [password]<br>Login link: <a href=\"login_link\">[login_link]</a></p>\r\n<p><br>Best regards,<br>[site_title]<br>[site_url]</p>', 'Active', NULL, 1, '2025-10-31 14:28:31', '2025-10-31 15:51:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` enum('Default','Tour','Products') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default',
  `created_by` int DEFAULT NULL,
  `ordering` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `image`, `status`, `type`, `created_by`, `ordering`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'How do I contact customer support?', 'You can reach our support team via the contact form on our website, by email, or by calling our helpline during business hours.', NULL, 'Active', 'Default', 1, 1, '2025-10-29 13:57:06', '2026-03-17 14:39:09', NULL),
(4, 'Is my personal information safe?', 'Yes, we take your privacy seriously. All data is encrypted and securely stored. We never share your information with third parties.', NULL, 'Active', 'Default', 1, 0, '2026-03-13 16:03:39', '2026-03-17 14:39:03', NULL),
(5, 'How do I create an account?', 'Click the \"Sign Up\" button on the top right, fill in your details, and verify your email address to get started.', NULL, 'Active', 'Default', 1, 0, '2026-03-13 16:08:28', '2026-03-17 14:38:55', NULL),
(6, 'What payment methods do you accept?', 'We accept all major credit/debit cards, PayPal, and bank transfers. All payments are processed securely.', NULL, 'Active', 'Default', 1, 0, '2026-03-13 16:08:52', '2026-03-17 14:38:48', NULL),
(7, 'How can I update my account information?', 'Log in to your account, go to \"Profile Settings\", make your changes and click \"Save\" to update your information.', NULL, 'Active', 'Default', 1, 1, '2026-03-13 16:09:11', '2026-03-25 09:17:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `cover_image`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dubai City Tour', 'images/1773614082_image.webp', 'active', 1, 1, NULL, '2026-03-15 17:34:42', '2026-03-15 17:49:10'),
(2, 'Demo Gallery', '1773683694_cover_image.webp', 'active', 2, 1, NULL, '2026-03-16 12:54:54', '2026-03-16 12:54:54'),
(3, 'Test Gallery', '1773684118_69b8459664a47_cover_image.webp', 'active', 0, 1, NULL, '2026-03-16 13:01:47', '2026-03-16 13:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE `gallery_images` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_ext` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `ordering` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image`, `image_alt`, `image_title`, `image_ext`, `status`, `ordering`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1773614082_image.webp', 'dubai_city', 'Dubai City', NULL, 'active', 1, NULL, '2026-03-15 17:34:42', '2026-03-15 17:38:19'),
(2, 1, '1773614082_image.webp', NULL, NULL, NULL, 'active', 2, '2026-03-16 13:02:08', '2026-03-15 17:34:42', '2026-03-16 13:02:08'),
(3, 1, '1773614082_image.webp', NULL, NULL, NULL, 'active', 3, '2026-03-15 17:36:55', '2026-03-15 17:34:42', '2026-03-15 17:36:55'),
(4, 1, '1773614082_image.webp', NULL, NULL, NULL, 'active', 4, '2026-03-15 17:36:45', '2026-03-15 17:34:42', '2026-03-15 17:36:45'),
(5, 1, '1773672675_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 09:51:37', '2026-03-16 09:51:15', '2026-03-16 09:51:37'),
(6, 1, '1773672675_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 09:51:47', '2026-03-16 09:51:15', '2026-03-16 09:51:47'),
(7, 1, '1773672675_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 09:51:40', '2026-03-16 09:51:15', '2026-03-16 09:51:40'),
(8, 1, '1773672675_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 09:51:45', '2026-03-16 09:51:15', '2026-03-16 09:51:45'),
(9, 1, '1773672731_image.webp', NULL, NULL, 'webp', 'active', 2, NULL, '2026-03-16 09:52:11', '2026-03-16 13:02:28'),
(10, 1, '1773672731_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 13:02:10', '2026-03-16 09:52:11', '2026-03-16 13:02:10'),
(11, 2, '1773683694_image.webp', NULL, NULL, 'webp', 'active', 999, NULL, '2026-03-16 12:54:54', '2026-03-19 10:49:47'),
(12, 2, '1773683694_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 13:00:40', '2026-03-16 12:54:54', '2026-03-16 13:00:40'),
(13, 2, '1773683694_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 13:00:45', '2026-03-16 12:54:54', '2026-03-16 13:00:45'),
(14, 2, '1773683694_image.webp', NULL, NULL, 'webp', 'active', 999, '2026-03-16 13:00:42', '2026-03-16 12:54:54', '2026-03-16 13:00:42'),
(15, 2, '1773684058_69b8455a0652b_image.webp', NULL, NULL, 'webp', 'active', 999, NULL, '2026-03-16 13:00:58', '2026-03-16 13:00:58'),
(16, 2, '1773684058_69b8455a08a1c_image.webp', NULL, NULL, 'webp', 'active', 999, NULL, '2026-03-16 13:00:58', '2026-03-16 13:00:58'),
(17, 3, '1773684107_69b8458b766b6_image.webp', NULL, NULL, 'webp', 'active', 1, NULL, '2026-03-16 13:01:47', '2026-03-31 14:08:14'),
(18, 3, '1773684107_69b8458b77d80_image.webp', NULL, NULL, 'webp', 'active', 2, NULL, '2026-03-16 13:01:47', '2026-03-31 14:08:16'),
(19, 3, '1773684107_69b8458b78d05_image.webp', NULL, NULL, 'webp', 'active', 3, NULL, '2026-03-16 13:01:47', '2026-03-31 14:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Replied') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `new` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `subject`, `document`, `status`, `new`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Gillian', 'Bruce', 'qecyjem@mailinator.com', '+1 (547) 959-6291', 'Ut reprehenderit la', 'Dolore incididunt a', NULL, 'Replied', '1', NULL, '2025-10-30 15:59:18', '2025-10-31 02:32:00', NULL),
(10, 'Daquan', 'Benson', 'zawykot@mailinator.com', '+1 (584) 746-8444', 'Impedit reprehender', 'Et suscipit quisquam', NULL, 'Pending', '1', NULL, '2025-10-30 16:03:59', '2025-10-30 16:03:59', NULL),
(16, 'Allan', 'Johson', 'zefewel@mailinator.com', '+1 (771) 384-8996', 'Aperiam provident e', 'Qui aliquip maiores', '1761899252_George_Website_Content.docx', 'Pending', '1', 1, '2025-10-31 02:33:57', '2025-10-31 03:27:32', NULL),
(17, 'John', 'Doe', 'john@test.com', '+1234567890', 'This is a test message from external website', 'Test Subject', NULL, 'Pending', '1', NULL, '2025-11-05 09:46:50', '2025-11-05 10:40:30', '2025-11-05 10:40:30'),
(18, 'Isabelle', 'Chapman', 'kakyk@mailinator.com', '+1 (551) 764-2599', 'Mollitia omnis harum', 'Sapiente dolor labor', NULL, 'Pending', '1', NULL, '2025-11-05 09:52:04', '2025-11-05 10:40:26', '2025-11-05 10:40:26'),
(19, 'Mia', 'Valencia', 'wejaboho@mailinator.com', '+1 (533) 558-5265', 'Suscipit repellendus', 'Saepe commodi dignis', NULL, 'Pending', '1', NULL, '2025-11-05 09:52:43', '2025-11-05 10:40:23', '2025-11-05 10:40:23'),
(20, 'Arden', 'Jenkins', 'juruherupy@mailinator.com', '+1 (836) 843-1707', 'Labore dolore numqua', 'Beatae dolor magnam', NULL, 'Pending', '1', NULL, '2025-11-05 09:54:42', '2025-11-05 10:40:20', '2025-11-05 10:40:20'),
(21, 'John', 'Doe', 'john@test.com', '+1234567890', 'This is a test message without file', 'Test Subject', NULL, 'Pending', '1', NULL, '2025-11-05 10:32:59', '2025-11-05 10:40:17', '2025-11-05 10:40:17'),
(22, 'Victor', 'Good', 'bariwycyw@mailinator.com', '+1 (304) 255-6276', 'Veniam eu aute qui', 'Quo in ad quisquam p', '1762356931_690b6ec3881fc.jpg', 'Pending', '1', NULL, '2025-11-05 10:35:31', '2025-11-05 10:35:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int NOT NULL DEFAULT '1',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_type` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '0=flat, 1=percentage',
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `item_name`, `description`, `quantity`, `discount`, `discount_type`, `unit_price`, `amount`, `created_at`, `updated_at`) VALUES
(64, 1, 'Website Designing', '<p>Lorem ipsum dolor sit amet.</p>', 3, '0.00', '0.00', '5000.00', '15000.00', '2026-01-09 11:44:26', '2026-01-09 11:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_modes`
--

DROP TABLE IF EXISTS `maintenance_modes`;
CREATE TABLE `maintenance_modes` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` int DEFAULT NULL,
  `maintenance_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Page Under Maintenance',
  `mode` tinyint(1) NOT NULL DEFAULT '0',
  `maintenance_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_modes`
--

INSERT INTO `maintenance_modes` (`id`, `page_id`, `maintenance_title`, `mode`, `maintenance_image`, `created_at`, `updated_at`) VALUES
(5, 3, 'Page Under Maintenance', 1, NULL, '2025-10-07 20:37:33', '2025-10-07 20:37:36'),
(6, 4, 'Page Under Maintenance', 1, NULL, '2025-10-07 20:37:33', '2025-10-07 20:37:36'),
(7, 5, 'Page Under Maintenance', 1, NULL, '2025-10-07 20:37:33', '2025-10-07 20:37:36'),
(8, 9, 'Page Under Maintenance', 1, NULL, '2025-10-07 20:37:33', '2025-10-07 20:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_21_135525_add_fields_to_users_table', 1),
(5, '2025_01_21_135711_add_fields_to_users_table', 1),
(6, '2025_01_21_140317_update_users_table_add_nullable_fields', 2),
(12, '2025_02_27_230240_create_pages_table', 3),
(13, '2025_02_28_181246_rename_column_in_users_table', 4),
(14, '2025_02_28_181246_rename_column_in_pages_table', 5),
(17, '2025_02_27_230240_create_maintenance_mode_table', 6),
(18, '2025_03_09_193026_page_id_to_maintenance_modes', 7),
(23, '2025_05_06_182701_add_image_column_to_users_table', 8),
(24, '2025_05_06_202053_static_blocks', 8),
(25, '2025_08_27_211114_add_status_to_users_table', 9),
(26, '2025_08_31_171434_create_user_types_table', 10),
(27, '2025_08_31_171653_create_modules_table', 11),
(28, '2025_08_31_173216_create_user_type_module_rel_table', 11),
(29, '2025_08_31_174434_create_user_types_table', 12),
(30, '2025_09_07_205448_create_user_type_modules_rel_table', 13),
(31, '2025_09_14_201215_create_setting_table', 14),
(32, '2025_09_19_214232_create_blog_cat_table', 15),
(33, '2025_09_19_214413_create_blogs_table', 15),
(34, '2025_09_19_214232_create_blog_category_table', 16),
(35, '2025_10_07_140736_create_blog_tags', 17),
(36, '2025_10_07_140835_create_blog_tag_rel', 18),
(37, '2025_10_27_164230_create_slider_table', 19),
(38, '2025_11_02_000001_create_invoices_table', 20),
(39, '2025_11_03_192530_add_new_columns_to_invoices_table', 21),
(40, '2025_11_03_192541_add_discount_to_invoice_items_table', 22),
(41, '2025_11_04_000001_create_quotations_table', 23),
(42, '2025_11_06_190107_add_invoice_type_to_invoices_and_quotations_table', 24),
(43, '2025_11_06_193556_add_payment_status_to_invoices_and_quotations_table', 25),
(44, '2026_03_09_193237_create_tours_table', 26),
(45, '2026_03_09_193840_create_tour_faqs_table', 27),
(46, '2026_03_09_193855_create_tour_reviews_table', 28),
(47, '2026_03_09_194002_create_tour_gallerys_table', 29),
(48, '2025_09_19_214232_create_blog_categories_table', 30),
(49, '2025_10_02_212803_create_blog_category_rel_table', 31),
(50, '2026_03_12_000001_create_tour_faq_table', 31),
(51, '2026_03_15_220702_create_galleries_table', 32),
(52, '2026_03_15_221002_create_gallery_images_table', 32),
(53, '2026_03_17_184539_create_tour_gallery_table', 33),
(54, '2026_03_25_000000_add_duplicate_action_to_users_module', 34),
(55, '2026_03_25_000001_add_duplicate_action_to_modules_module', 35),
(56, '2026_03_25_000002_add_duplicate_action_to_listed_modules', 36),
(57, '2026_03_25_000003_add_duplicate_action_to_blogs_tours_email_invoices_quotations', 37),
(58, '2026_03_25_210000_rename_invoice_and_quotation_tables_to_customer', 38),
(59, '2026_03_25_210100_update_invoice_and_quotation_module_titles', 38),
(60, '2026_03_26_120000_create_brands_table', 39),
(61, '2026_03_26_130000_create_product_categories_table', 40),
(62, '2026_03_25_220000_add_customers_module_menu', 41),
(63, '2026_03_26_130000_create_product_attributes_table', 42),
(64, '2026_03_27_100000_create_product_type_options_table', 43),
(65, '2026_03_27_100001_create_products_table', 43),
(66, '2026_03_27_100002_create_category_product_table', 43),
(67, '2026_03_27_100003_create_product_galleries_table', 43),
(68, '2026_03_27_140000_add_brand_id_to_products_table', 44),
(69, '2026_03_27_200000_rename_product_galleries_to_product_images', 45),
(70, '2026_03_31_100001_add_product_extra_fields_and_drop_color_size_columns', 46),
(71, '2026_03_31_100002_create_product_colors_and_sizes_tables', 46),
(72, '2026_03_31_100003_rename_sort_order_to_ordering_in_product_tables', 47),
(73, '2026_03_31_100004_rename_product_images_image_to_path', 48),
(74, '2026_04_06_185909_create_coupons_table', 49);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL,
  `module_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `actions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_in_menu` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `ordering` int DEFAULT '0',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `parent_id`, `module_title`, `module_slug`, `actions`, `show_in_menu`, `ordering`, `status`, `icon`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Roles & Permission', 'user-types', 'add | edit | view | status | delete | delete all | More | duplicate', 'Yes', 5, 'Active', 'lock', 1, '2025-09-05 14:04:36', '2026-03-09 11:05:18', NULL),
(2, 0, 'CMS Pages', 'cms-pages', 'nil', 'Yes', 8, 'Active', 'file-description', 1, '2025-09-05 14:04:36', '2026-03-09 11:09:52', NULL),
(4, 0, 'Home Page', 'home-page', 'add | edit | view | status | delete | delete all | more', 'Yes', 7, 'Active', 'brand-google-home', 1, '2025-09-05 11:30:56', '2026-03-09 11:09:19', NULL),
(6, 0, 'Users', 'users', 'add | edit | view | status | delete | delete all | more | duplicate', 'Yes', 4, 'Active', 'user-square', 1, '2025-09-07 15:34:21', '2026-03-09 11:05:14', NULL),
(7, 0, 'Static Blocks', 'static-blocks', 'add | edit | delete | delete all | duplicate', 'Yes', 10, 'Active', 'apps', 1, '2025-09-07 15:41:40', '2026-03-09 11:12:00', NULL),
(8, 0, 'Modules', 'modules', 'add | edit | view | status | delete | delete all | More | duplicate', 'Yes', 2, 'Active', 'color-swatch', 1, '2025-09-08 09:57:10', '2026-03-09 11:05:45', NULL),
(9, 0, 'Settings', 'settings', 'update', 'Yes', 97, 'Active', 'settings-check', 1, '2025-09-14 15:05:41', '2026-03-09 13:38:21', NULL),
(12, 0, 'Blogs', 'blogs', 'nil', 'Yes', 21, 'Active', 'brand-booking', 1, '2025-10-01 10:41:35', '2026-03-13 17:02:14', NULL),
(13, 12, 'All Posts', 'blogs', 'add | edit | view | status | delete | delete all | More | import | export | duplicate', 'Yes', 6, 'Active', 'circle', 1, '2025-10-01 10:43:56', '2026-03-09 11:09:41', NULL),
(14, 12, 'Add Post', 'blogs.create', 'add | edit | view | status | delete | delete all | More | import | export | duplicate', 'Yes', 7, 'Active', 'circle', 1, '2025-10-01 10:56:54', '2025-11-07 15:55:20', NULL),
(15, 12, 'Categories', 'blog-categories', 'add | edit | view | status | delete | delete all | More', 'Yes', 7, 'Active', 'circle', 1, '2025-10-06 09:38:05', '2025-11-07 16:00:39', NULL),
(16, 12, 'Tags', 'blog-tags', 'add | edit | view | status | delete | delete all | More', 'Yes', 7, 'Active', 'circle', 1, '2025-10-07 09:52:27', '2025-11-07 16:00:50', NULL),
(17, 16, 'Shopping Cart', 'shopping-cart', 'add | edit | delete | delete all', 'No', 11, 'Inactive', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><g fill=\"none\" stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\"><path d=\"M20 11a8.1 8.1 0 0 0-6.986-6.918A8.1 8.1 0 0 0 4.995 8M4 13a8.1 8.1 0 0 0 15 3\"/><path d=\"M18 16a1 1 0 1 0 2 0a1 1 0 1 0-2 0M4 8a1 1 0 1 0 2 0a1 1 0 1 0-2 0m5 4a3 3 0 1 0 6 0a3 3 0 1 0-6 0\"/></g></svg>', 1, '2025-10-24 12:47:46', '2025-10-28 05:39:42', '2025-10-28 05:39:42'),
(18, 16, 'Shopping Cart', 'shopping-cart', 'add | edit | delete | delete all', 'Yes', 11, 'Inactive', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path fill=\"none\" stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 15H5.5a2.5 2.5 0 1 1 0-5H6m9 2v6.5a2.5 2.5 0 1 1-5 0V18m2-9h6.5a2.5 2.5 0 1 1 0 5H18m-9-2V5.5a2.5 2.5 0 0 1 5 0V6\"/></svg>', 1, '2025-10-24 13:06:39', '2025-10-24 13:07:08', '2025-10-24 13:07:08'),
(19, 0, 'Dashboard', 'dashboard', 'nil', 'Yes', 1, 'Active', 'smart-home', 1, '2025-11-07 15:21:18', '2026-02-26 16:53:43', NULL),
(20, 2, 'Add Page', 'pages.create', 'add | edit | view | status | delete | delete all | More | import | export', 'Yes', 8, 'Active', 'circle', 1, '2025-11-07 15:45:47', '2026-03-09 11:09:53', NULL),
(21, 2, 'All Pages', 'pages', 'add|edit|view|status|delete|deleteall|More|import|export | duplicate', 'Yes', 8, 'Active', 'circle', 1, '2025-11-07 15:51:15', '2026-03-09 11:09:54', NULL),
(22, 0, 'Hero Sliders', 'sliders', 'add|edit|view|status|delete|deleteall|More | duplicate', 'Yes', 9, 'Active', 'slideshow', 1, '2025-11-07 16:06:55', '2026-03-09 11:12:02', NULL),
(23, 0, 'Testimonials', 'testimonials', 'add|edit|view|status|delete|deleteall|More | duplicate', 'Yes', 11, 'Active', 'brand-hipchat', 1, '2025-11-07 16:07:27', '2026-03-09 11:12:14', NULL),
(24, 0, 'FAQs', 'faqs', 'add|edit|view|status|delete|deleteall|More|import|export | duplicate', 'Yes', 13, 'Active', 'message-question', 1, '2025-11-07 16:07:58', '2026-03-09 11:21:04', NULL),
(25, 0, 'Customer Invoices', 'invoices', 'add|edit|view|status|delete|deleteall|More | duplicate', 'Yes', 28, 'Active', 'file-type-pdf', 1, '2025-11-07 16:09:24', '2026-04-06 15:49:50', NULL),
(26, 0, 'Customer Quotations', 'quotations', 'add|edit|view|status|delete|deleteall|More | duplicate', 'Yes', 28, 'Active', 'receipt', 1, '2025-11-07 16:09:55', '2026-04-06 15:50:01', NULL),
(27, 0, 'Email Templates', 'email-templates', 'add|edit|view|status|delete|deleteall|More | duplicate', 'Yes', 30, 'Active', 'mail-code', 1, '2025-11-07 16:10:43', '2026-03-25 12:02:52', NULL),
(28, 0, 'Contact Iquiries', 'inquiries', 'add|edit|view|status|delete|deleteall|More', 'Yes', 12, 'Active', 'message-circle-user', 1, '2025-11-07 16:11:16', '2026-03-09 11:21:02', NULL),
(29, 0, 'Portal Support', 'https://websigntist.com/', 'https://websigntist.com/', 'Yes', 98, 'Active', 'phone-call', 1, '2025-11-07 16:12:07', '2026-03-09 13:38:18', NULL),
(30, 0, 'Logout', 'logout', 'nil', 'Yes', 99, 'Active', 'logout-2', 1, '2025-11-07 16:12:34', '2026-03-09 13:38:15', NULL),
(31, 0, 'Online Store', 'online-store', 'nil', 'Yes', 25, 'Active', 'building-store', 1, '2026-01-09 10:31:30', '2026-03-25 12:06:23', NULL),
(32, 31, 'All Categories', 'product-categories', 'add | edit | status | delete | deleteall | More | import | export', 'Yes', 252, 'Active', 'circle', 1, '2026-01-09 10:41:01', '2026-03-25 12:26:28', NULL),
(33, 31, 'All Products', 'products', 'add|edit|view|status|delete|deleteall|More|import|export', 'Yes', 251, 'Active', 'circle', 1, '2026-01-09 10:44:32', '2026-03-25 12:26:23', NULL),
(34, 31, 'Attributes', 'attributes', 'add | edit | view | status | delete | deleteall | More | import | export', 'Yes', 258, 'Active', 'circle', 1, '2026-01-09 10:46:55', '2026-03-31 11:20:54', '2026-03-31 11:20:54'),
(35, 31, 'Orders', 'orders', 'add | edit | view | status | delete | deleteall | More | import | export', 'Yes', 254, 'Active', 'circle', 1, '2026-01-09 11:04:30', '2026-03-25 12:07:34', NULL),
(36, 31, 'Customers', 'customers', 'add | edit | view | status | delete | deleteall | More | import | export', 'Yes', 255, 'Active', 'circle', 1, '2026-01-09 11:06:03', '2026-03-25 12:07:36', NULL),
(37, 31, 'Coupons', 'coupons', 'add | edit | view | status | delete | deleteall | More | duplicate', 'Yes', 256, 'Active', 'circle', 1, '2026-01-09 11:07:31', '2026-04-06 14:52:47', NULL),
(38, 31, 'Brands', 'brands', 'add | edit | view | status | delete | deleteall | More | import | export', 'Yes', 253, 'Active', 'circle', 1, '2026-01-09 11:08:25', '2026-03-25 12:07:32', NULL),
(39, 31, 'Product Reviews', 'reviews', 'add | edit | view | status | delete | deleteall | More | import | export', 'Yes', 257, 'Active', 'circle', 1, '2026-01-09 11:08:45', '2026-03-25 12:07:43', NULL),
(40, 0, 'Tour Packages', 'tour-packages', 'add | edit | view | status | delete | delete all | More | import | export', 'Yes', 23, 'Active', 'backpack', 1, '2026-02-25 15:59:23', '2026-03-13 17:02:21', NULL),
(41, 40, 'All Tours', 'tours', 'add | edit | view | status | delete | delete all | More | import | export | duplicate', 'Yes', 23, 'Active', 'circle', 1, '2026-02-25 16:07:04', '2026-03-25 09:04:10', NULL),
(42, 40, 'Add Tour', 'tours.create', 'add | edit | view | status | delete | delete all | More | import | export | duplicate', 'Yes', 23, 'Active', 'circle', 1, '2026-02-25 16:07:39', '2026-03-25 09:04:11', NULL),
(43, 0, 'CMS Management', 'cms-management', 'nil', 'Yes', 6, 'Active', 'code', 1, '2026-03-09 11:03:45', '2026-03-09 11:06:25', NULL),
(44, 0, 'User Management', 'user-management', 'nil', 'Yes', 3, 'Active', 'code', 1, '2026-03-09 11:04:29', '2026-03-09 11:05:46', NULL),
(45, 0, 'Blog & Post', 'blog-post', 'nil', 'Yes', 20, 'Active', 'code', 1, '2026-03-09 11:13:27', '2026-03-13 17:02:11', NULL),
(46, 0, 'Tours & Pricing', 'tours-pricing', 'nil', 'Yes', 22, 'Active', 'code', 1, '2026-03-09 11:18:09', '2026-03-13 17:02:16', NULL),
(47, 0, 'Others', 'others', 'nil', 'Yes', 29, 'Active', 'code', 1, '2026-03-09 11:24:18', '2026-03-25 12:03:18', NULL),
(48, 0, 'Setting & Support', 'setting-support', 'nil', 'Yes', 96, 'Active', 'code', 1, '2026-03-09 13:38:59', '2026-03-09 13:38:59', NULL),
(49, 40, 'Tour FAQs', 'faqs', 'add | edit | view | status | delete | delete all | More | import | export | duplicate', 'Yes', 23, 'Active', 'circle', 1, '2026-03-11 16:48:01', '2026-03-25 09:04:17', NULL),
(50, 40, 'Tour Reviews', 'reviews', 'nil', 'Yes', 23, 'Active', 'circle', 1, '2026-03-11 16:49:41', '2026-03-25 09:04:13', NULL),
(51, 52, 'Add Gallery', 'galleries.create', 'add | edit | view | status | delete | deleteall | More', 'Yes', 15, 'Active', 'circle', 1, '2026-03-11 16:50:32', '2026-03-15 17:33:56', NULL),
(52, 0, 'image Gallery', 'image-gallery', 'nil', 'Yes', 14, 'Active', 'image-in-picture', 1, '2026-03-13 17:01:43', '2026-03-13 17:01:43', NULL),
(53, 52, 'All Galleries', 'galleries', 'nil', 'Yes', 16, 'Active', 'circle', 1, '2026-03-14 17:38:26', '2026-03-25 15:26:40', NULL),
(54, 40, 'Tour Gallery', 'image-gallery', 'add | edit | view | status | delete | delete all | More | import | export', 'Yes', 23, 'Active', 'circle', 1, '2026-03-24 13:48:41', '2026-03-25 09:04:13', NULL),
(55, 12, 'Tags (Copy)', 'blog-tags-copy-carfmo', 'add | edit | view | status | delete | delete all | More', 'Yes', 7, 'Active', 'circle', 1, '2026-03-24 14:37:27', '2026-03-24 14:37:42', '2026-03-24 14:37:42'),
(56, 0, 'eCommerce Store', 'ecommerce-store', 'nil', 'Yes', 24, 'Active', 'code', 1, '2026-03-25 08:57:25', '2026-03-25 12:06:05', NULL),
(57, 0, 'Invoices & Quotations', 'invoices-quotations', 'nil', 'Yes', 27, 'Active', 'code', 1, '2026-03-25 10:53:47', '2026-03-25 12:04:06', NULL),
(58, 0, 'Coupons', 'coupons', 'add | edit | view | status | delete | deleteall | More | duplicate', 'Yes', 11, 'Active', 'report-money', 1, '2026-04-06 14:51:30', '2026-04-06 14:52:24', '2026-04-06 14:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `menu_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT '0',
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('published','unpublish') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `container_layout` enum('Default','Box Container','Full Container') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Default',
  `show_in_menu` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `ordering` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `menu_title`, `page_title`, `show_title`, `sub_title`, `friendly_url`, `description`, `status`, `image`, `image_alt`, `image_title`, `container_layout`, `show_in_menu`, `ordering`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 0, 'About Us', 'About Us', 1, 'Welcome to the Company', 'about-us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum molestiae praesentium repellendus? Ab, consequuntur esse iste iure iusto libero quidem sint ullam. Atque debitis hic nobis placeat repellendus. Beatae dolor eaque iure nisi quae! Accusamus aliquam cupiditate est ex, maiores molestiae mollitia officia perferendis quas quos sapiente temporibus unde.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum molestiae praesentium repellendus? Ab, consequuntur esse iste iure iusto libero quidem sint ullam. Atque debitis hic nobis placeat repellendus. Beatae dolor eaque iure nisi quae! Accusamus aliquam cupiditate est ex, maiores molestiae mollitia officia perferendis quas quos sapiente temporibus unde.</p>', 'published', '1762359453_image.webp', NULL, NULL, 'Default', 'Yes', 2, 'About Us | Alpha Tech', 'about, about company', 'meta description', 1, '2025-04-15 18:30:13', '2025-11-05 12:15:57', NULL),
(4, 0, 'Home', 'Home Page', 0, 'First App on Laravel 11', 'home', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, facere facilis maxime odio odit sint! Aspernatur dolorem eius eligendi enim error est illum molestias officiis quod tenetur. Ab dolore eaque et in iusto laboriosam maiores perspiciatis provident sint tenetur? Ab alias aperiam asperiores at beatae consectetur cumque delectus dolores doloribus eaque eligendi est et ex explicabo facere fugiat impedit incidunt inventore laboriosam modi nam nemo numquam odio officia omnis quaerat quasi quia quidem, quisquam quos rem repellat sit suscipit ullam velit veniam voluptatibus! Cupiditate deserunt est magni molestiae optio, quaerat, quis sequi soluta sunt, temporibus totam ullam! Cum, quidem sit!', 'published', '1757102190_image_zZQwJd6zSi.webp', NULL, NULL, 'Default', 'Yes', 3, 'Home page', 'laravel, framwork', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2025-04-15 18:39:28', '2025-10-21 14:50:12', NULL),
(5, 0, 'Gallery', 'Gallery', 0, 'Et facere corrupti', 'gallery', 'Aute eos qui quisqua', 'unpublish', '1757102276_image_1QZF6iy8zl.webp', NULL, NULL, 'Default', 'Yes', 2, 'Gallery', 'Voluptatem magnam se', 'Qui mollit eos enim', 1, '2025-04-28 18:05:54', '2025-10-21 15:13:51', NULL),
(9, 0, 'Contact Us1', 'Contact Us1', 0, 'Ut non in ex tenetur', 'contact-us1', '<p>Ut ut provident ist</p>', 'published', '1763411007_image.webp', NULL, NULL, 'Default', 'Yes', 1, 'Contact Us1', 'Et consequatur Cons', 'Modi officia qui min', 1, '2025-09-05 14:32:19', '2025-12-09 11:12:46', '2025-12-09 11:12:46'),
(35, 3, 'Marian Books', 'Marian Book', 0, 'Book Writing Service', 'marian', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'unpublish', '1760564361_image.webp', NULL, NULL, 'Default', 'Yes', 11, 'Books', 'books', 'books', 1, '2025-10-22 13:44:42', '2025-12-09 11:12:39', '2025-12-09 11:12:39'),
(36, 36, 'Pete', 'Pete', 0, 'About Author', 'pete', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'published', '1761688265_image.webp', NULL, NULL, 'Default', 'No', 12, 'Authors', 'authors', 'authors', 1, '2025-10-22 13:44:42', '2025-11-05 11:25:29', NULL),
(38, 0, 'Illo reprehenderit', 'Ut id laboris laboru', 0, 'Est et in quaerat si', 'Tempora ipsum magna', '<p>sdfsdfsdfsdf</p>', 'published', NULL, NULL, NULL, 'Default', 'Yes', 1, 'Dolore voluptatem C', 'Ut ullamco consequun', 'Magni modi officia d', 1, '2025-11-04 13:42:11', '2025-11-06 09:39:32', '2025-11-06 09:39:32'),
(39, 36, 'Pete', 'Pete', 0, 'About Author', 'pete', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'published', '1761688265_image.webp', NULL, NULL, 'Default', 'No', 12, 'Authors', 'authors', 'authors', 1, '2025-10-22 13:44:42', '2025-11-05 11:25:29', NULL),
(40, 3, 'Marian Books', 'Marian Book', 0, 'Book Writing Service', 'marian', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'published', '1760564361_image.webp', NULL, NULL, 'Default', 'Yes', 11, 'Books', 'books', 'books', 1, '2025-10-22 13:44:42', '2025-12-09 11:12:46', '2025-12-09 11:12:46'),
(41, 0, 'Home', 'Home Page', 0, 'First App on Laravel 11', 'home', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, facere facilis maxime odio odit sint! Aspernatur dolorem eius eligendi enim error est illum molestias officiis quod tenetur. Ab dolore eaque et in iusto laboriosam maiores perspiciatis provident sint tenetur? Ab alias aperiam asperiores at beatae consectetur cumque delectus dolores doloribus eaque eligendi est et ex explicabo facere fugiat impedit incidunt inventore laboriosam modi nam nemo numquam odio officia omnis quaerat quasi quia quidem, quisquam quos rem repellat sit suscipit ullam velit veniam voluptatibus! Cupiditate deserunt est magni molestiae optio, quaerat, quis sequi soluta sunt, temporibus totam ullam! Cum, quidem sit!', 'published', '1757102190_image_zZQwJd6zSi.webp', NULL, NULL, 'Default', 'Yes', 3, 'Home page', 'laravel, framwork', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2025-04-15 18:39:28', '2025-10-21 14:50:12', NULL),
(42, 0, 'Contact Us', 'Contact Us', 0, 'Ut non in ex tenetur', 'contact-us', '<p>Ut ut provident ist</p>', 'published', '1761140917_image.webp', NULL, NULL, 'Default', 'Yes', 1, 'Contact Us', 'Et consequatur Cons', 'Modi officia qui min', 1, '2025-09-05 14:32:19', '2025-10-22 09:50:24', NULL),
(43, 0, 'Illo reprehenderit', 'Ut id laboris laboru', 0, 'Est et in quaerat si', 'Tempora ipsum magna', '<p>sdfsdfsdfsdf</p>', 'published', NULL, NULL, NULL, 'Default', 'Yes', 1, 'Dolore voluptatem C', 'Ut ullamco consequun', 'Magni modi officia d', 1, '2025-11-04 13:42:11', '2025-11-06 09:39:35', '2025-11-06 09:39:35'),
(44, 41, 'Repudiandae consecte', 'Expedita reprehender', 0, 'Architecto laborum a', 'Debitis a ea est exe', '<p>sdfsdfsd</p>', 'published', '1763583295_image.webp', NULL, NULL, 'Box Container', 'No', 90, 'Ut dolore omnis recu', 'Quia officia in omni', 'Perspiciatis non in', 1, '2025-11-17 15:24:28', '2025-11-19 15:14:55', NULL),
(45, 4, 'Culpa et sint ut fu', 'Culpa Et Sint Ut Fu', 0, 'Voluptatem id qui q', 'culpa-et-sint-ut-fu', '<p>test</p>', 'unpublish', '1765296749_image.webp', NULL, NULL, 'Box Container', 'Yes', 2, 'Culpa Et Sint Ut Fu', 'Ab dicta animi dolo', 'In sit ea explicabo', 1, '2025-12-09 11:12:29', '2026-02-26 16:44:40', NULL),
(46, 0, 'Error perspiciatis', 'Error Perspiciatis', 0, 'Sit dolore nobis mi', 'error-perspiciatis', '<p>test</p>', 'published', '1765296829_image.webp', 'About Image', 'Hello', 'Default', 'Yes', 2, 'Error Perspiciatis', 'Facere quos et animi', 'Et asperiores sed ex', 1, '2025-12-09 11:13:30', '2026-03-09 17:09:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('adnan@gmail.com', 'XPPGAgySKDLRdQEp909nyz4zaj1vS8yM6Qr7LpqYYrFs1TlIQ0LfDTuxgMr1Xraw', '2025-10-24 17:13:39'),
('websigntist@gmail.com', 'vtfZahE6r3de6wHvVQyY4g5BncIjfNZDthpVkOff8MC4w6kShEEEFUZeXKLzsG9M', '2026-03-11 14:04:02'),
('wordpressdev.digi@gmail.com', 'iz0Giot6lOEmkmfFrFREWN9HJFYpVF3TasMbs67PKQVgeTDLVb5rnHzIFzfBMtPS', '2025-01-24 12:14:26'),
('zoe@test.com', 'yLh9Pd15nZ8X19T1kTSvUUYti6i1OKRiMON8c4tRPLFj6zkkXQ5WRYChxr294IsU', '2025-09-08 13:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `stock_status` enum('In Stock','Out of Stock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Stock',
  `product_types` json DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `discount` enum('10','15','20','25','50') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tag` enum('New','Sale') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,2) DEFAULT NULL,
  `length` decimal(12,2) DEFAULT NULL,
  `width` decimal(12,2) DEFAULT NULL,
  `height` decimal(12,2) DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `full_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_features` longtext COLLATE utf8mb4_unicode_ci,
  `product_specifications` longtext COLLATE utf8mb4_unicode_ci,
  `regular_price` decimal(14,2) DEFAULT NULL,
  `sale_price` decimal(14,2) DEFAULT NULL,
  `sale_start` date DEFAULT NULL,
  `sale_end` date DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Published','Unpublished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `visibility` enum('Public','Private') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `friendly_url`, `quantity`, `stock_status`, `product_types`, `brand_id`, `discount`, `style_no`, `product_tag`, `video_link`, `sku`, `isbn`, `weight`, `length`, `width`, `height`, `short_description`, `full_description`, `product_features`, `product_specifications`, `regular_price`, `sale_price`, `sale_start`, `sale_end`, `main_image`, `image_alt`, `image_title`, `status`, `visibility`, `ordering`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Iphone 17 Pro Max phone', 'iphone-17-pro-max-phone', 10, 'In Stock', '[\"Normal\", \"Best Seller\"]', 2, '15', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-562365', '5659865', '0.50', '30.00', '15.00', '50.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '1999.00', '1699.00', '2026-03-31', '2026-04-10', '1774972742_69cbef465bf36_main_image.svg', 'iphone', 'iphone', 'Published', 'Public', 1, 'Iphone 17 Pro Max Phone', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-30 16:22:18', '2026-03-31 16:25:06', '2026-03-31 16:25:06'),
(2, 'Iphone 17 Pro Max phone (Copy)', 'iphone-17-pro-max-phone-copy', 10, 'In Stock', '[\"Normal\", \"Best Seller\"]', 2, '15', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-562365-copy', '5659865', '0.50', '30.00', '15.00', '50.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '1999.00', '1699.00', '2026-03-31', '2026-04-10', '1774972742_69cbef465bf36_main_image.svg', 'iphone', 'iphone', 'Published', 'Public', 1, 'Iphone 17 Pro Max Phone', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:13:59', '2026-03-31 16:25:06', '2026-03-31 16:25:06'),
(3, 'Iphone 17 Pro Max phone (Copy)', 'iphone-17-pro-max-phone-copy-1', 10, 'In Stock', '[\"Normal\", \"Best Seller\"]', 2, '15', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-562365-copy-1', '5659865', '0.50', '30.00', '15.00', '50.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '1999.00', '1699.00', '2026-03-31', '2026-04-10', '1774972742_69cbef465bf36_main_image.svg', 'iphone', 'iphone', 'Published', 'Public', 1, 'Iphone 17 Pro Max Phone', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:20:24', '2026-03-31 16:25:06', '2026-03-31 16:25:06'),
(4, 'Sansumg Ultra S26', 'sansumg-ultra-s26', 10, 'In Stock', '[\"Normal\"]', 2, '20', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-56202', '5659865', '0.50', '30.00', '15.00', '50.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '50.00', '0.00', '2026-03-31', '2026-04-10', '1774992559_69cc3caf87ef8_main_image.webp', 'samsung', 'samsung', 'Published', 'Public', 1, 'Sansumg Ultra S26', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:20:53', '2026-04-06 16:18:01', NULL),
(5, 'Realme Note26', 'realme-note26', 10, 'In Stock', '[\"Normal\"]', 2, '20', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-0565', '56501', '0.50', '30.00', '15.00', '50.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '150.00', '0.00', '2026-03-31', '2026-04-10', '1774992442_69cc3c3a8292b_main_image.webp', 'Realme', 'Realme', 'Unpublished', 'Public', 1, 'Realme Note26', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:25:22', '2026-04-06 16:24:57', NULL),
(6, 'Realme Note2610', 'realme-note2610', 10, 'In Stock', '[\"Normal\"]', 2, '20', '56560', 'New', NULL, '4545', NULL, '0.50', '30.00', '15.00', '50.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '100.00', '0.00', '2026-03-31', '2026-04-10', '1774992442_69cc3c3a8292b_main_image.webp', 'Realme', 'Realme', 'Published', 'Public', 1, 'Realme Note26', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:44:31', '2026-04-06 16:13:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `show_title` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `show_in_menu` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `friendly_url`, `parent_id`, `image`, `description`, `show_title`, `show_in_menu`, `ordering`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ladies Stitched Suits', 'ladies-stitched-suits', 0, '1774457477_69c41285b8549_image.webp', '<p>Air Jordan is a line of basketball shoes produced by Nike</p>', '0', 'Yes', 0, 'Active', 'Ladies Stitched Suits', NULL, NULL, 1, '2026-03-25 11:51:18', '2026-03-27 12:27:07', NULL),
(2, 'Mobile Phones', 'mobile-phones', 1, '1774632559_69c6be6f26a00_image.webp', '<p>Air Jordan is a line of basketball shoes produced by Nike</p>', '0', 'Yes', 2, 'Active', 'Mobile Phones', NULL, NULL, 1, '2026-03-27 11:36:13', '2026-03-27 12:29:19', NULL),
(3, 'Products', 'products', 0, '1774632548_69c6be648b5b4_image.webp', '<p>Air Jordan is a line of basketball shoes produced by Nike.</p>', '0', 'Yes', 0, 'Active', 'Products', NULL, NULL, 1, '2026-03-27 12:26:01', '2026-03-27 12:29:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(14,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` smallint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `item_name`, `value`, `price`, `description`, `ordering`, `created_at`, `updated_at`) VALUES
(64, 1, 'orange', '#ff7b00', '1900.00', 'premium color', 0, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(65, 1, 'grey', '#f1f0ff', '1700.00', 'regular color', 1, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(66, 1, 'blue', '#0060fa', '1500.00', 'running color', 2, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(67, 2, 'orange', '#ff7b00', '1900.00', 'premium color', 0, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(68, 2, 'grey', '#f1f0ff', '1700.00', 'regular color', 1, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(69, 2, 'blue', '#0060fa', '1500.00', 'running color', 2, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(70, 3, 'orange', '#ff7b00', '1900.00', 'premium color', 0, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(71, 3, 'grey', '#f1f0ff', '1700.00', 'regular color', 1, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(72, 3, 'blue', '#0060fa', '1500.00', 'running color', 2, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(94, 6, 'grey', '#f1f0ff', '1700.00', 'regular color', 0, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(95, 6, 'blue', '#0060fa', '1500.00', 'running color', 1, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(96, 5, 'grey', '#f1f0ff', '1700.00', 'regular color', 0, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(97, 5, 'blue', '#0060fa', '1500.00', 'running color', 1, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(98, 4, 'grey', '#f1f0ff', '1700.00', 'regular color', 0, '2026-04-06 16:18:01', '2026-04-06 16:18:01'),
(99, 4, 'blue', '#0060fa', '1500.00', 'running color', 1, '2026-04-06 16:18:01', '2026-04-06 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` smallint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `ordering`, `created_at`, `updated_at`) VALUES
(50, 1, '1774973386_kLJlo3IH_gallery.webp', 0, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(51, 1, '1774973386_XHgwYVmm_gallery.webp', 1, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(52, 1, '1774973386_02tU2Px8_gallery.webp', 2, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(53, 1, '1774973386_LRbCTAMz_gallery.webp', 3, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(54, 2, '1774973386_kLJlo3IH_gallery.webp', 0, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(55, 2, '1774973386_XHgwYVmm_gallery.webp', 1, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(56, 2, '1774973386_02tU2Px8_gallery.webp', 2, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(57, 2, '1774973386_LRbCTAMz_gallery.webp', 3, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(58, 3, '1774973386_kLJlo3IH_gallery.webp', 0, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(59, 3, '1774973386_XHgwYVmm_gallery.webp', 1, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(60, 3, '1774973386_02tU2Px8_gallery.webp', 2, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(61, 3, '1774973386_LRbCTAMz_gallery.webp', 3, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(102, 6, '1774992280_AafqcQH5_gallery.webp', 0, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(103, 6, '1774992280_qPAu0gHv_gallery.webp', 1, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(104, 6, '1774992280_pEk7p7TI_gallery.webp', 2, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(105, 6, '1774992280_2k4G9v0q_gallery.webp', 3, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(106, 5, '1774992280_AafqcQH5_gallery.webp', 0, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(107, 5, '1774992280_qPAu0gHv_gallery.webp', 1, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(108, 5, '1774992280_pEk7p7TI_gallery.webp', 2, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(109, 5, '1774992280_2k4G9v0q_gallery.webp', 3, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(110, 4, '1774992280_AafqcQH5_gallery.webp', 0, '2026-04-06 16:18:01', '2026-04-06 16:18:01'),
(111, 4, '1774992280_qPAu0gHv_gallery.webp', 1, '2026-04-06 16:18:01', '2026-04-06 16:18:01'),
(112, 4, '1774992280_pEk7p7TI_gallery.webp', 2, '2026-04-06 16:18:01', '2026-04-06 16:18:01'),
(113, 4, '1774992280_2k4G9v0q_gallery.webp', 3, '2026-04-06 16:18:01', '2026-04-06 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(14,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` smallint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `item_name`, `value`, `price`, `description`, `ordering`, `created_at`, `updated_at`) VALUES
(43, 1, 'mini', '17 pro', '1800.00', 'regular size', 0, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(44, 1, 'standard', '17 pro', '1900.00', 'regular size', 1, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(45, 2, 'mini', '17 pro', '1800.00', 'regular size', 0, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(46, 2, 'standard', '17 pro', '1900.00', 'regular size', 1, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(47, 3, 'mini', '17 pro', '1800.00', 'regular size', 0, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(48, 3, 'standard', '17 pro', '1900.00', 'regular size', 1, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(60, 6, 'standard', '17 pro', '1900.00', 'regular size', 0, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(61, 5, 'standard', '17 pro', '1900.00', 'regular size', 0, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(62, 4, 'standard', '17 pro', '1900.00', 'regular size', 0, '2026-04-06 16:18:01', '2026-04-06 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_options`
--

DROP TABLE IF EXISTS `product_type_options`;
CREATE TABLE `product_type_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_type_options`
--

INSERT INTO `product_type_options` (`id`, `name`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Normal', 1, '2026-03-30 16:10:20', '2026-03-30 16:10:20'),
(2, 'Best Seller', 2, '2026-03-30 16:10:20', '2026-03-30 16:10:20'),
(3, 'New Arrival', 3, '2026-03-30 16:10:20', '2026-03-30 16:10:20'),
(4, 'Clearance Sale', 4, '2026-03-30 16:10:20', '2026-03-30 16:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

DROP TABLE IF EXISTS `quotation_items`;
CREATE TABLE `quotation_items` (
  `id` bigint UNSIGNED NOT NULL,
  `quotation_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int NOT NULL DEFAULT '1',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_type` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '0=flat, 1=percentage',
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `quotation_id`, `item_name`, `description`, `quantity`, `discount`, `discount_type`, `unit_price`, `amount`, `created_at`, `updated_at`) VALUES
(5, 1, 'Meghan Graves', NULL, 1, '0.00', '0.00', '10000.00', '10000.00', '2025-11-06 15:45:12', '2025-11-06 15:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` enum('Tour','Product') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `phone`, `designation`, `company`, `rating`, `review`, `type`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'David John', 'david@gmail.com', '+125659896', 'Manager', 'Elite Engineering', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, porro.', 'Tour', 'Active', 1, 1, NULL, '2026-03-24 14:04:59', '2026-03-24 14:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wRYyNVwhNPQH7hIZZPSIroKeAJaVzBF5U7jLMOMb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYWhtUG9GcjhoUUxZR2VaQTJ4UzJyYWt0bXhrNGNERWl2clU0amt2byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1775510701);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'WebSigntist', NULL, '2026-03-31 13:10:46'),
(2, 'site_keywords', 'laravel, cms, system', NULL, '2026-03-31 13:10:46'),
(3, 'site_description', 'This is my first laravel CMS system wow', NULL, '2026-03-31 13:10:46'),
(4, 'phone', '+92 (300) 2563325', NULL, NULL),
(5, 'email', 'info@websigntist.com', NULL, '2026-03-31 13:10:46'),
(6, 'loader', 'Yes', NULL, '2026-03-31 13:10:46'),
(7, 'logo', '1761686903_websigntist.svg', NULL, NULL),
(8, 'footer_logo', '1761688298_laravel-svgrepo-com.svg', NULL, NULL),
(9, 'favicon', '1761686938_websigntist.svg', NULL, NULL),
(10, 'address', 'Office # 123', NULL, '2026-03-31 13:10:46'),
(11, 'maintenance_mode', 'Inactive', NULL, '2026-03-31 13:10:46'),
(12, 'robots', 'NOINDEX, NOFOLLOW', NULL, '2026-03-31 13:10:46'),
(13, 'copyright_text', 'Copyright 2026 - All Right Reserved.', NULL, '2026-03-31 13:10:46'),
(14, 'google_analytics_code', 'no code', NULL, '2026-03-31 13:10:46'),
(15, 'landline_number', '+92 21 31234567', NULL, '2026-03-31 13:10:46'),
(16, 'landline_number_2', '+92 21 31234567', NULL, '2026-03-31 13:10:46'),
(17, 'mobile_number', '+92 300 1234567', NULL, '2026-03-31 13:10:46'),
(18, 'whatsapp_number', '+92 300 1234567', NULL, '2026-03-31 13:10:46'),
(19, 'website_url', 'www.websigntist.com', NULL, '2026-03-31 13:10:46'),
(20, 'google_map_code', 'nil', NULL, '2026-03-31 13:10:46'),
(21, 'admin_title', 'WebSigntist', NULL, '2026-03-31 13:10:46'),
(22, 'show_title_logo', 'image_logo', NULL, '2026-03-31 13:10:46'),
(23, 'facebook', 'https://www.facebook.com/', NULL, '2026-03-31 13:10:46'),
(24, 'instagram', 'instagram', NULL, '2026-03-31 13:10:46'),
(25, 'linkeding', NULL, NULL, NULL),
(26, 'youtube', 'youtube', NULL, '2026-03-31 13:10:46'),
(27, 'twitter', 'twitter', NULL, '2026-03-31 13:10:46'),
(28, 'tiktok', 'tiktok', NULL, '2026-03-31 13:10:46'),
(29, 'smtp_host', 'localhost', NULL, '2026-03-31 13:10:46'),
(30, 'smtp_user', 'info@domain.com', NULL, '2026-03-31 13:10:46'),
(31, 'smtp_password', '123456', NULL, '2026-03-31 13:10:46'),
(32, 'smtp_port', '468', NULL, '2026-03-31 13:10:46'),
(33, 'recaptcha_site_key', '2s1f21sf21s2df12sd', NULL, '2026-03-31 13:10:46'),
(34, 'recaptcha_secret_key', '12435121t2re1ter2t12er', NULL, '2026-03-31 13:10:46'),
(35, 'paypal_payment_mode', 'sandbox', NULL, '2026-03-31 13:10:46'),
(36, 'paypal_live', 'info@livedomain.com', NULL, '2026-03-31 13:10:46'),
(37, 'paypal_sandbox', 'info@sandboxdomain.com', NULL, '2026-03-31 13:10:46'),
(38, 'stripe_payment_mode', 'live_mode', NULL, '2026-03-31 13:10:46'),
(39, 'stripe_live_site_key', 'ssdf6s5df6sd6f0f5405sdf4s5', NULL, '2026-03-31 13:10:46'),
(40, 'stripe_live_secret_key', 'f45sf50sd4f5sf45sdf4s5d0f4', NULL, '2026-03-31 13:10:46'),
(41, 'stripe_test_site_key', '50sfs6f56tr56t0rt6r', NULL, '2026-03-31 13:10:46'),
(42, 'stripe_test_secret_key', '065sf6s0f56sdf5r9e5', NULL, '2026-03-31 13:10:46'),
(43, 'content', 'Hello', NULL, '2026-03-31 13:10:46'),
(44, 'show_timer', 'Yes', NULL, '2026-03-31 13:10:46'),
(45, 'linkedin', 'linkedin', NULL, '2026-03-31 13:10:46'),
(46, 'm_logo', '1761895808_undermian.webp', NULL, NULL),
(47, 'admin_logo', '1761686938_websigntist.svg', NULL, NULL),
(48, 'maintenance_title', 'Website Under Maintenance', NULL, '2026-03-31 13:10:46'),
(49, 'site_currency', 'aed', NULL, '2026-03-17 13:12:45'),
(50, 'contact_form_email', 'info@websigntist.com', NULL, '2026-03-31 13:10:46'),
(51, 'shop_currency', 'aed', NULL, '2026-03-31 13:10:46'),
(52, 'product_unit', 'kilogram', NULL, '2026-03-30 13:59:36'),
(53, 'measurment_unit', 'cm', NULL, '2026-03-31 13:10:46'),
(54, 'weight_unit', 'kg', NULL, '2026-03-31 13:10:46'),
(55, 'facebook_status', '1', NULL, '2026-03-31 13:10:46'),
(56, 'instagram_status', '0', NULL, '2026-03-31 13:10:46'),
(57, 'linkedin_status', '0', NULL, '2026-03-31 13:10:46'),
(58, 'youtube_status', '0', NULL, '2026-03-31 13:10:46'),
(59, 'twitter_status', '0', NULL, '2026-03-31 13:10:46'),
(60, 'tiktok_status', '0', NULL, '2026-03-31 13:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_heading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` enum('Home','About','Services') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Home',
  `created_by` int DEFAULT NULL,
  `ordering` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `heading`, `sub_heading`, `description`, `link`, `button_text`, `image`, `status`, `type`, `created_by`, `ordering`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Welcome to the site', 'Website Services', 'Architecto vero elit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, perspiciatis.', 'https://www.google.com/', 'Read More', '1761597601_image.webp', 'Active', 'Home', 1, 2, NULL, '2025-10-27 15:40:01', '2025-10-27 15:51:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_blocks`
--

DROP TABLE IF EXISTS `static_blocks`;
CREATE TABLE `static_blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_blocks`
--

INSERT INTO `static_blocks` (`id`, `title`, `sub_title`, `identifier`, `image`, `status`, `description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home About Us', 'wow test', 'home-about-us', '1757106854_image_lUK6YBcaui.webp', 'Active', '<p>Hello Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, est eveniet iusto laudantium\r\n                  quaerat ratione voluptatem! Corporis eius itaque sequi. Accusamus beatae fugiat magnam maxime nam\r\n                  nihil nulla officia officiis quaerat ratione? Accusantium asperiores atque, blanditiis consectetur\r\n                  dolorem dolores error iste nulla numquam officiis optio qui quod rerum similique voluptatibus.</p>', 1, '2025-05-06 17:51:56', '2025-10-08 10:27:55', NULL),
(6, 'Contact Details', 'Let\'s Connect', 'contact-details', '1761603842_image.webp', 'Active', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, natus.</p>', 1, '2025-05-06 18:21:06', '2025-10-27 17:24:02', NULL),
(8, 'Saepe molestiae maxi', 'Placeat excepteur b', 'saepe-molestiae-maxi', '1757105376_image.jpg', 'Active', 'Qui inventore est po', 1, '2025-09-05 15:49:36', '2025-10-27 16:28:30', '2025-10-27 16:28:30'),
(21, 'Ut omnis aut illum', 'Sint voluptas dolore', 'ut-omnis-aut-illum', '1761602799_image.webp', 'Active', NULL, 1, '2025-10-27 17:06:39', '2025-10-27 17:31:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Default','Home','Blog','Tour') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` int DEFAULT NULL,
  `ordering` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `company`, `review`, `image`, `type`, `status`, `created_by`, `ordering`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Lane Guerra', 'Director', 'AlphaTech', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, repudiandae.', '1761765070_image.webp', 'Default', 'Active', 1, 1, '2025-10-29 14:11:10', '2025-10-29 14:15:14', NULL),
(4, 'Colleen Compton', 'Ab architecto ut rer', 'Peterson and Ray Plc', 'Suscipit quibusdam m', '1763583842_image.webp', 'Default', 'Inactive', 1, 39, '2025-11-19 15:12:50', '2025-11-19 15:24:02', NULL),
(5, 'Leonard Hobbs', 'Nulla est quia et pl', 'Nelson and Watkins Inc', 'Neque quia ex minus', '1765305337_image.webp', 'Home', 'Active', 1, 92, '2025-12-09 13:35:27', '2026-03-17 13:23:51', NULL),
(6, 'Leonard Hobbs (Copy)', 'Nulla est quia et pl', 'Nelson and Watkins Inc', 'Neque quia ex minus', 'dup_69c2f0bad55f10.73402511.webp', 'Home', 'Active', 1, 92, '2026-03-24 15:14:50', '2026-03-24 15:14:59', '2026-03-24 15:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE `tours` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_id` int DEFAULT NULL,
  `gallery_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `max_persons` int NOT NULL DEFAULT '0',
  `min_age` int NOT NULL DEFAULT '0',
  `tour_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_options` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `itinerary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `faq_id`, `gallery_id`, `title`, `friendly_url`, `tour_duration`, `max_persons`, `min_age`, `tour_type`, `extra_options`, `description`, `itinerary`, `price`, `status`, `image`, `image_alt`, `image_title`, `ordering`, `created_by`, `deleted_at`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Abu Dhabi City Tour', 'abu-dhabi-city-tour', '6 hours', 50, 10, '\"[\\\"Dubai Tour\\\",\\\"Abu Dhabi Tour\\\",\\\"Dubai City Tours\\\"]\"', NULL, '<h2>Overview</h2>\r\n<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>\r\n<p>On the way to Abu Dhabi you will pass through an industrial area called Jebel Ali free zone. Once you reach Abu Dhabi&rsquo;s border you will see several stunning plantations all along the wayside and superb villages in the city. First stop will be at Sheikh Zayed Grand Mosque, the 3rd largest Mosque in the world and one of the best architectural landmarks of the capital. The mosque also features an exceptional collection of marble works and the largest carpet in the world designed by Iranian artists.</p>\r\n<p>You will see the Cultural Foundation, not far from it close walk to &lsquo;Qasr Al Hosn&rsquo; (meaning &lsquo;White Fort&rsquo;-The oldest stone building in the city). Continue the drive to admire the panoramic view of the Al Bateen District where the &lsquo;Presidential Palace&rsquo; is situated. A visit to Heritage Village will follow.</p>\r\n<p>Moving on to the next stop toward the breakwater and get a chance to capture the city&rsquo;s skyline and probably take a snack or lunch then drive ahead towards Abu Dhabi Corniche.</p>\r\n<p>On the way back to Dubai by pass through Abudhabi Yas Island and Formula-1 racing circuit on with a memorable memories.</p>\r\n<h3 data-start=\"170\" data-end=\"217\"><strong data-start=\"174\" data-end=\"217\">Cancellation, Amendment &amp; Refund Policy</strong></h3>\r\n<p data-start=\"219\" data-end=\"356\">We understand that plans can change, and we strive to be as flexible as possible. Please review our&nbsp;<a href=\"https://saif.local/travel-agency-terms-conditions/\">cancellation and refund policy</a>&nbsp;below:</p>\r\n<p data-start=\"360\" data-end=\"497\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/2705.svg\" alt=\"✅\">&nbsp;<strong data-start=\"362\" data-end=\"377\">100% refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"401\" data-end=\"421\">72 hours or more</strong>&nbsp;before the start time of the tour (excluding the 4% payment gateway fee).</p>\r\n<p data-start=\"500\" data-end=\"635\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/2705.svg\" alt=\"✅\" width=\"20\">&nbsp;<strong data-start=\"502\" data-end=\"516\">50% refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"540\" data-end=\"566\">between 48 to 72 hours</strong>&nbsp;before the tour start time (excluding the 4% payment gateway fee).</p>\r\n<p data-start=\"638\" data-end=\"735\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/274c.svg\" alt=\"❌\" width=\"20\">&nbsp;<strong data-start=\"640\" data-end=\"653\">No refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"677\" data-end=\"699\">less than 48 hours</strong>&nbsp;before the tour, or for no-shows.</p>\r\n<p data-start=\"738\" data-end=\"855\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/274c.svg\" alt=\"❌\" width=\"20\">&nbsp;Once a tour or service has started, or if any part of a package has been utilized,&nbsp;<strong data-start=\"823\" data-end=\"837\">no refunds</strong>&nbsp;will be provided.</p>\r\n<p data-start=\"857\" data-end=\"985\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/1f4b3.svg\" alt=\"💳\" width=\"20\">&nbsp;<strong data-start=\"860\" data-end=\"878\">Important Note</strong>: A&nbsp;<strong data-start=\"882\" data-end=\"908\">4% payment gateway fee</strong>&nbsp;applies to all online payments. This fee is&nbsp;<strong data-start=\"953\" data-end=\"971\">non-refundable</strong>&nbsp;in all cases.</p>\r\n<p data-start=\"987\" data-end=\"1201\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/1f501.svg\" alt=\"🔁\" width=\"20\">&nbsp;<strong data-start=\"990\" data-end=\"1008\">Refund Process</strong>: Any eligible refunds will be processed within&nbsp;<strong data-start=\"1056\" data-end=\"1074\">7 working days</strong> from the date of cancellation. The final refunded amount will depend on the above terms, minus the non-refundable gateway fee.</p>', '<p>test</p>', '150.00', 'active', '1773153639_image.webp', 'About Image', 'Hello', 4, 1, NULL, 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', '2026-03-10 09:40:39', '2026-03-10 16:55:11'),
(2, NULL, NULL, 'At Quo Et Tempor Dol', 'at-quo-et-tempor-dol', '7', 5, 3, '[\"Dubai Tour\",\"Abu Dhabi Tour\"]', NULL, '<p>test</p>', '<p>testtest</p>', '200.00', 'inactive', '1773178729_image.webp', 'Odio inventore nostr', 'Repellendus Volupta', 65, 1, '2026-03-10 16:40:10', 'At Quo Et Tempor Dol', 'Velit fuga Asperior', 'Qui officia distinct', '2026-03-10 16:38:49', '2026-03-10 16:40:10'),
(3, NULL, NULL, 'Aliqua Et Optio Qu', 'Sed mollit et cum au', '5', 5, 5, '\"[\\\"Dubai Tour\\\",\\\"Dubai City Tours\\\"]\"', NULL, '<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>', '<p>test</p>', '168.00', 'inactive', '1773179429_image.webp', 'Dolores dolores volu', 'Alias dolorem tempor', 23, 1, NULL, 'In aliqua Consequun', 'Laboris in perspicia', 'Laborum Labore quas', '2026-03-10 16:43:29', '2026-03-31 13:30:57'),
(4, NULL, NULL, 'Abu Dhabi City Tour one', 'abu-dhabi-city-tour11', '6 hours', 50, 10, '\"[\\\"Dubai Tour\\\",\\\"Abu Dhabi Tour\\\",\\\"Dubai City Tours\\\"]\"', '', '<h2>Overview</h2>\r\n<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>\r\n<p>On the way to Abu Dhabi you will pass through an industrial area called Jebel Ali free zone. Once you reach Abu Dhabi&rsquo;s border you will see several stunning plantations all along the wayside and superb villages in the city. First stop will be at Sheikh Zayed Grand Mosque, the 3rd largest Mosque in the world and one of the best architectural landmarks of the capital. The mosque also features an exceptional collection of marble works and the largest carpet in the world designed by Iranian artists.</p>\r\n<p>You will see the Cultural Foundation, not far from it close walk to &lsquo;Qasr Al Hosn&rsquo; (meaning &lsquo;White Fort&rsquo;-The oldest stone building in the city). Continue the drive to admire the panoramic view of the Al Bateen District where the &lsquo;Presidential Palace&rsquo; is situated. A visit to Heritage Village will follow.</p>\r\n<p>Moving on to the next stop toward the breakwater and get a chance to capture the city&rsquo;s skyline and probably take a snack or lunch then drive ahead towards Abu Dhabi Corniche.</p>\r\n<p>On the way back to Dubai by pass through Abudhabi Yas Island and Formula-1 racing circuit on with a memorable memories.</p>\r\n<h3 data-start=\"170\" data-end=\"217\"><strong data-start=\"174\" data-end=\"217\">Cancellation, Amendment &amp; Refund Policy</strong></h3>\r\n<p data-start=\"219\" data-end=\"356\">We understand that plans can change, and we strive to be as flexible as possible. Please review our&nbsp;<a href=\"https://saif.local/travel-agency-terms-conditions/\">cancellation and refund policy</a>&nbsp;below:</p>\r\n<p data-start=\"360\" data-end=\"497\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/2705.svg\" alt=\"✅\">&nbsp;<strong data-start=\"362\" data-end=\"377\">100% refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"401\" data-end=\"421\">72 hours or more</strong>&nbsp;before the start time of the tour (excluding the 4% payment gateway fee).</p>\r\n<p data-start=\"500\" data-end=\"635\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/2705.svg\" alt=\"✅\" width=\"20\">&nbsp;<strong data-start=\"502\" data-end=\"516\">50% refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"540\" data-end=\"566\">between 48 to 72 hours</strong>&nbsp;before the tour start time (excluding the 4% payment gateway fee).</p>\r\n<p data-start=\"638\" data-end=\"735\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/274c.svg\" alt=\"❌\" width=\"20\">&nbsp;<strong data-start=\"640\" data-end=\"653\">No refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"677\" data-end=\"699\">less than 48 hours</strong>&nbsp;before the tour, or for no-shows.</p>\r\n<p data-start=\"738\" data-end=\"855\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/274c.svg\" alt=\"❌\" width=\"20\">&nbsp;Once a tour or service has started, or if any part of a package has been utilized,&nbsp;<strong data-start=\"823\" data-end=\"837\">no refunds</strong>&nbsp;will be provided.</p>\r\n<p data-start=\"857\" data-end=\"985\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/1f4b3.svg\" alt=\"💳\" width=\"20\">&nbsp;<strong data-start=\"860\" data-end=\"878\">Important Note</strong>: A&nbsp;<strong data-start=\"882\" data-end=\"908\">4% payment gateway fee</strong>&nbsp;applies to all online payments. This fee is&nbsp;<strong data-start=\"953\" data-end=\"971\">non-refundable</strong>&nbsp;in all cases.</p>\r\n<p data-start=\"987\" data-end=\"1201\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/1f501.svg\" alt=\"🔁\" width=\"20\">&nbsp;<strong data-start=\"990\" data-end=\"1008\">Refund Process</strong>: Any eligible refunds will be processed within&nbsp;<strong data-start=\"1056\" data-end=\"1074\">7 working days</strong> from the date of cancellation. The final refunded amount will depend on the above terms, minus the non-refundable gateway fee.</p>', '<p>test</p>', '150.00', 'active', '1773153639_image.webp', 'About Image', 'Hello', 4, 1, NULL, 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', '2026-03-11 16:39:16', '2026-03-11 16:39:16'),
(5, NULL, NULL, 'Dubai Burj Khalifa', 'dubai-232-sdf', '5', 5, 5, '\"[\\\"Dubai Tour\\\",\\\"Dubai City Tours\\\"]\"', NULL, '<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>', '<p>test</p>', '168.00', 'active', '1773179429_image.webp', 'Dolores dolores volu', 'Alias dolorem tempor', 23, 1, NULL, 'In aliqua Consequun', 'Laboris in perspicia', 'Laborum Labore quas', '2026-03-11 16:39:16', '2026-03-31 13:30:51'),
(6, NULL, NULL, 'Dubai Future Museum', 'dubai-future-museum', '6 hours', 50, 10, '\"[\\\"Dubai Tour\\\",\\\"Dubai City Tours\\\"]\"', NULL, '<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>', '<p>test</p>', '275.00', 'active', '1773425443_image.webp', 'dubai future museum', 'Dubai Future Museum', 5, 1, NULL, 'Dubai Future Museum', NULL, NULL, '2026-03-13 13:10:43', '2026-03-31 13:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `tour_faq`
--

DROP TABLE IF EXISTS `tour_faq`;
CREATE TABLE `tour_faq` (
  `id` bigint UNSIGNED NOT NULL,
  `tour_id` bigint UNSIGNED NOT NULL,
  `faq_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_faq`
--

INSERT INTO `tour_faq` (`id`, `tour_id`, `faq_id`) VALUES
(1, 6, 4),
(2, 6, 5),
(3, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tour_gallery`
--

DROP TABLE IF EXISTS `tour_gallery`;
CREATE TABLE `tour_gallery` (
  `id` bigint UNSIGNED NOT NULL,
  `tour_id` bigint UNSIGNED NOT NULL,
  `gallery_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_gallery`
--

INSERT INTO `tour_gallery` (`id`, `tour_id`, `gallery_id`) VALUES
(1, 6, 3),
(2, 6, 1),
(3, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tour_review`
--

DROP TABLE IF EXISTS `tour_review`;
CREATE TABLE `tour_review` (
  `id` bigint UNSIGNED NOT NULL,
  `tour_id` bigint UNSIGNED NOT NULL,
  `review_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_review`
--

INSERT INTO `tour_review` (`id`, `tour_id`, `review_id`) VALUES
(4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_type_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `gender` enum('Male','Female','Other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `ordering` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `first_name`, `last_name`, `email`, `image`, `email_verified_at`, `mobile_no`, `landline_no`, `dob`, `city`, `zipcode`, `state`, `address`, `country`, `password`, `status`, `gender`, `remember_token`, `created_by`, `ordering`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'adnan', 'khan', 'websigntist@gmail.com', '1757108294_image_oXKwiH8xDJ.png', NULL, '+92300-9876542', '+922131234567', '1984-10-19', 'Karachi', '75160', 'Sindh', 'Home 123', 'Australia', '$2y$12$jah8qDomb5SR2UMtbeqoh.ZYZ41cFUbRNRtKeXUJAqdqsD5V1gVG6', 'Active', 'Male', 'gGsoiE3ptbOA52FiHBm565i18Zj16qymGKKAWLKqA3P9cs0QBtjasuf4axmw', 1, 1, '2025-01-22 10:05:55', '2026-03-11 12:57:37', NULL),
(2, 18, 'Sophia', 'Jan', 'adnan1@gmail.com', '1774467703_69c43a7720ee4_image.webp', NULL, '+92300-9876542', '+922131234567', '2025-11-15', 'Pariatur Aliquip et', '78583', 'Ducimus et totam al', 'Reiciendis at minim', 'Pakistan', '$2y$12$a5btXjxflcR0wbh6dGeccOPFILwT7dsKGp4odi5eAxWz2b5361muy', 'Active', 'Other', NULL, 1, 92, '2025-01-22 10:15:04', '2026-03-25 14:41:43', NULL),
(58, 10, 'Allan', 'Johson', 'adnan1+copy.elpyiq@gmail.com', 'dup_69c2e691c3f143.17426739.webp', NULL, '+92300-9876542', '+922131234567', '2025-11-15', 'Pariatur Aliquip et', '78583', 'Ducimus et totam al', 'Reiciendis at minim', 'Pakistan', '$2y$12$uD5KIBEp7aWr.PDIQCNuuOTF8B4wdlUqkDXmf6.m1pL4Llb/opKdG', 'Active', 'Other', NULL, 1, 92, '2026-03-24 14:31:30', '2026-03-24 14:31:59', '2026-03-24 14:31:59'),
(59, 18, 'Bevis', 'Howe', 'mycemu@mailinator.com', '1774468612_69c43e04b3a30_image.webp', NULL, '+1 (257) 545-3108', '+1 (418) 826-9222', '2026-02-12', NULL, NULL, NULL, 'Est vel sunt do in', 'United Arab Erimates', '$2y$12$g.f25KBh2xXr9HrkKtdKEObsNCjAxzsx45zpmoAGPgZCwh4GWd4Ou', 'Active', 'Male', NULL, 1, 65, '2026-03-25 14:56:53', '2026-03-25 14:56:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_type` enum('Backend','Frontend','Both','None') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Frontend',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `login_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'Both', 'Active', '2025-10-07 21:06:36', '2025-11-07 14:44:01', NULL),
(3, 'Sales', 'Backend', 'Active', '2025-10-07 21:06:42', '2025-11-07 14:43:13', '2025-11-07 14:43:13'),
(9, 'Shop Manager', 'Backend', 'Active', '2025-09-07 16:38:00', '2025-11-07 14:43:21', '2025-11-07 14:43:21'),
(10, 'Manager', 'Both', 'Active', '2025-09-07 17:06:55', '2025-09-07 17:06:55', NULL),
(17, 'Test', 'Backend', 'Active', '2025-10-26 13:59:19', '2025-11-07 14:43:13', '2025-11-07 14:43:13'),
(18, 'Customer', 'Frontend', 'Active', '2026-03-25 13:17:51', '2026-03-25 13:17:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_modules_rel`
--

DROP TABLE IF EXISTS `user_type_modules_rel`;
CREATE TABLE `user_type_modules_rel` (
  `id` bigint UNSIGNED NOT NULL,
  `user_type_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `actions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_type_modules_rel`
--

INSERT INTO `user_type_modules_rel` (`id`, `user_type_id`, `module_id`, `actions`, `created_at`, `updated_at`) VALUES
(21, 9, 6, NULL, '2025-09-07 17:04:25', '2025-09-07 17:04:25'),
(22, 9, 1, 'add|edit|delete|update|delete all', '2025-09-07 17:04:25', '2025-09-07 17:04:25'),
(86, 17, 9, NULL, '2025-10-26 14:23:44', '2025-10-26 14:23:44'),
(87, 17, 2, 'add|edit|delete|delete-all|import|export', '2025-10-26 14:23:45', '2025-10-26 14:23:45'),
(110, 3, 2, 'add|edit|view|status|delete|delete-all|import|export|more', '2025-10-26 16:41:04', '2025-10-26 16:41:04'),
(111, 1, 6, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(112, 1, 9, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(113, 1, 12, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(114, 1, 13, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(115, 1, 14, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(116, 1, 15, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(117, 1, 16, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(118, 1, 8, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(119, 1, 2, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(120, 1, 7, NULL, '2025-11-07 14:44:01', '2025-11-07 14:44:01'),
(127, 10, 2, NULL, '2026-02-25 11:25:50', '2026-02-25 11:25:50'),
(128, 10, 21, 'add', '2026-02-25 11:25:50', '2026-02-25 11:25:50'),
(129, 10, 20, NULL, '2026-02-25 11:25:50', '2026-02-25 11:25:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_friendly_url_unique` (`friendly_url`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_category_friendly_url_unique` (`friendly_url`);

--
-- Indexes for table `blog_category_rel`
--
ALTER TABLE `blog_category_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_rel_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tag_rel`
--
ALTER TABLE `blog_tag_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_tag_rel_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_tag_rel_blog_tag_id_foreign` (`blog_tag_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_friendly_url_unique` (`friendly_url`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`product_category_id`,`product_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `customer_invoices`
--
ALTER TABLE `customer_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `customer_quotations`
--
ALTER TABLE `customer_quotations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quotations_quotation_number_unique` (`quotation_number`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_modes`
--
ALTER TABLE `maintenance_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_friendly_url_unique` (`friendly_url`),
  ADD KEY `products_sku_index` (`sku`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_friendly_url_unique` (`friendly_url`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_type_options`
--
ALTER TABLE `product_type_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_type_options_name_unique` (`name`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_items_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_blocks`
--
ALTER TABLE `static_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_faq`
--
ALTER TABLE `tour_faq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_faq_tour_id_faq_id_unique` (`tour_id`,`faq_id`),
  ADD KEY `tour_faq_faq_id_foreign` (`faq_id`);

--
-- Indexes for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_gallery_tour_id_foreign` (`tour_id`),
  ADD KEY `tour_gallery_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `tour_review`
--
ALTER TABLE `tour_review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_faq_tour_id_faq_id_unique` (`tour_id`,`review_id`),
  ADD KEY `tour_faq_faq_id_foreign` (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type_modules_rel`
--
ALTER TABLE `user_type_modules_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_modules_rel_user_type_id_foreign` (`user_type_id`),
  ADD KEY `user_type_modules_rel_module_id_foreign` (`module_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog_category_rel`
--
ALTER TABLE `blog_category_rel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_tag_rel`
--
ALTER TABLE `blog_tag_rel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_invoices`
--
ALTER TABLE `customer_invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_quotations`
--
ALTER TABLE `customer_quotations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_modes`
--
ALTER TABLE `maintenance_modes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_type_options`
--
ALTER TABLE `product_type_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `static_blocks`
--
ALTER TABLE `static_blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tour_faq`
--
ALTER TABLE `tour_faq`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour_review`
--
ALTER TABLE `tour_review`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_type_modules_rel`
--
ALTER TABLE `user_type_modules_rel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_category_rel`
--
ALTER TABLE `blog_category_rel`
  ADD CONSTRAINT `blog_category_rel_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_tag_rel`
--
ALTER TABLE `blog_tag_rel`
  ADD CONSTRAINT `blog_tag_rel_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_tag_rel_blog_tag_id_foreign` FOREIGN KEY (`blog_tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `customer_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD CONSTRAINT `quotation_items_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `customer_quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_faq`
--
ALTER TABLE `tour_faq`
  ADD CONSTRAINT `tour_faq_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tour_faq_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  ADD CONSTRAINT `tour_gallery_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tour_gallery_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_type_modules_rel`
--
ALTER TABLE `user_type_modules_rel`
  ADD CONSTRAINT `user_type_modules_rel_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_type_modules_rel_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
