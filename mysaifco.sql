-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 11:03 AM
-- Server version: 8.4.2
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysaifco`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

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

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
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

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

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

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(14,2) DEFAULT NULL,
  `discount_type` enum('In Percent','Fix Value') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Percent',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `usage_limit` int UNSIGNED NOT NULL DEFAULT '0',
  `has_used` int UNSIGNED NOT NULL DEFAULT '0',
  `min_order_value` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
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
(1, 'Ramazan Offer1', 'ramazan30', 1000.00, 'Fix Value', '2026-04-25', '2026-04-28', 15, 0, 3000, 'Active', 1, 1, '2026-04-06 15:16:35', '2026-04-06 15:40:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoices`
--

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
(1, 'INV-202511-0001', 'sales', 'Dismak CSP', 'info@dismakcsp.com', '+9271568965', 'Office 123, Dubai - UAE.', '2025-11-03', '2025-11-12', 'sent', 'Paid', 'AED', 15000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15000.00, '4 to 6 weeks for completion the work.', 'Payment cheque will be deposited in the Bank.', '1762454328_letterhead.webp', '1762199781_signature.webp', '1762454328_stamp.webp', 0, 1, 1, 1, '2025-11-03 03:37:14', '2026-03-25 10:28:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_quotations`
--

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
(1, 'QUO-202511-0001', 'Lila Roy', 'dytuj@mailinator.com', '+1 (284) 349-2444', 'Aliqua Laboris temp', '2025-11-04', '2025-11-13', 'sent', 'AED', 10000.00, 0.00, 0.00, 5.00, 500.00, 500.00, 10000.00, 'Ut do excepteur cupi', 'Dolore qui est aliqu', '1762287641_letterhead.webp', '1762287642_signature.webp', '1762287642_stamp.webp', 0, 0, 1, 1, NULL, '2025-11-04 15:20:42', '2025-11-06 15:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

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
-- Table structure for table `explores`
--

CREATE TABLE `explores` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tour_type_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explores`
--

INSERT INTO `explores` (`id`, `title`, `description`, `tour_type_id`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Explore Dubai With Us – Online Travel Agency', 'It’s everyone’s dream to explore the world and enjoy its beauty. Saifco Travel & Tourism LLC is making that possible and is also offering affordable Dubai tour packages. We are not only letting you explore the UAE but are also arranging tours out of the country. And you can easily find a travel agency near me like ours. All of our Dubai tour packages are priced relatively lower than other companies. Also, we make it easier and more convenient for you to go on any tour whether in the country or internationally. Moreover, you can also roam inside Dubai, Sharjah, and Abu Dhabi on our other inbound tours. Rent a jet ski, Go for the Dubai Desert Safari, Eat a delicious Dhow cruise dinner, or opt for luxury yacht cruising.', 9, 'Active', 0, 1, NULL, '2026-05-25 14:54:55', '2026-05-25 15:03:25'),
(2, 'Explore Dubai With Us – Online Travel Agency', 'It’s everyone’s dream to explore the world and enjoy its beauty. Saifco Travel & Tourism LLC is making that possible and is also offering affordable Dubai tour packages. We are not only letting you explore the UAE but are also arranging tours out of the country. And you can easily find a travel agency near me like ours. All of our Dubai tour packages are priced relatively lower than other companies. Also, we make it easier and more convenient for you to go on any tour whether in the country or internationally. Moreover, you can also roam inside Dubai, Sharjah, and Abu Dhabi on our other inbound tours. Rent a jet ski, Go for the Dubai Desert Safari, Eat a delicious Dhow cruise dinner, or opt for luxury yacht cruising.', 10, 'Active', 0, 1, NULL, '2026-05-25 15:03:16', '2026-05-25 15:03:16'),
(3, 'Desert Safari Dubai Deals', '<p>All You Need to Know About Desert Safari in Dubai.</p>\r\n<p>Have you ever been captivated by the breathtaking scenes of a Dubai Desert Safari in movies or music videos? Ever dreamed of feeling the golden sand slip through your fingers, surrounded by endless dunes that stretch as far as the eye can see? There&rsquo;s a reason why the Desert Safari in Dubai is one of the most talked-about experiences among tourists&mdash;it&rsquo;s a thrilling adventure that leaves an unforgettable mark on every traveler.</p>\r\n<p>If you&rsquo;re planning a trip to Dubai, make sure the Dubai Desert Safari is at the top of your itinerary. This iconic tour offers a perfect mix of excitement, culture, and natural beauty, making it a must-do activity. Whether you&rsquo;re looking for heart-racing dune bashing, serene camel rides, or mesmerizing desert sunsets, a desert safari tour in Dubai delivers it all&mdash;and more.</p>', 1, 'Active', 0, 1, NULL, '2026-05-25 15:04:55', '2026-05-25 15:11:19'),
(4, 'Dubai to Abu Dhabi Tours', '<p>Explore with Saifco Travel &amp; Tourism</p>\r\n<p>Dubai is a land of opportunities. People love to explore the land of skyscrapers and mysterious dessert yet luxurious malls have another story. Although these attractions are not anything unusual for a person who already resides in Dubai, still they all are attracted to Abu Dhabi, why? Abu Dhabi city tour from Dubai is always extraordinary. They have full of excitement, luxury, and joy. Abu Dhabi day trip from Dubai is like a one-day government on yourself, where you only have to look for joy, happiness, and memories. Abu Dhabi tour offers a great deal of museums,&nbsp; mosques, and glimpses of a Palace.</p>', 4, 'Active', 0, 1, NULL, '2026-05-25 15:05:38', '2026-05-26 05:52:04'),
(5, 'UAE City Tours', '<p>Dubai is a land of opportunities. People love to explore the land of skyscrapers and mysterious dessert yet luxurious malls have another story. Although these attractions are not anything unusual for a person who already resides in Dubai, still they all are attracted to&nbsp;Abu Dhabi,&nbsp;why? Abu Dhabi city tour from Dubai is always extraordinary. They have full of excitement, luxury, and joy. Abu Dhabi day trip from Dubai is like a one-day government on yourself, where you only have to look for joy, happiness, and memories. Abu Dhabi tour offers a great deal of&nbsp;museums,&nbsp;<br>mosques, and glimpses of a Palace.</p>', 3, 'Active', 0, 1, NULL, '2026-05-25 15:13:34', '2026-05-29 14:57:28'),
(6, 'UAE City Tours', '<p>Dubai is a land of opportunities. People love to explore the land of skyscrapers and mysterious dessert yet luxurious malls have another story. Although these attractions are not anything unusual for a person who already resides in Dubai, still they all are attracted to&nbsp;Abu Dhabi,&nbsp;why? Abu Dhabi city tour from Dubai is always extraordinary. They have full of excitement, luxury, and joy. Abu Dhabi day trip from Dubai is like a one-day government on yourself, where you only have to look for joy, happiness, and memories. Abu Dhabi tour offers a great deal of&nbsp;museums,&nbsp;<br>mosques, and glimpses of a Palace.</p>', 2, 'Active', 0, 1, NULL, '2026-05-25 15:14:22', '2026-05-26 07:30:18'),
(7, 'Water Activities', '<p>Dubai Water Activities &ndash; The Ultimate Guide to Water Sports &amp; Adventures with Saifco Travel &amp; Touris</p>\r\n<p>Dubai is a&nbsp;dream destination for water sports lovers, offering a stunning coastline, crystal-clear waters, and year-round sunshine. Whether you&rsquo;re craving&nbsp;thrilling adventures, a relaxing cruise, or an unforgettable underwater experience,&nbsp;Saifco Travel &amp; Tourism&nbsp;brings you the best&nbsp;Dubai water activities, designed for every type of traveler.<br>From high-speed jet skiing and exciting parasailing to luxurious yacht cruises and deep-sea fishing, we offer a wide range of top-rated water activities in Dubai. Whether you&rsquo;re a beginner or an experienced adventurer, our expert-guided tours ensure a safe, fun, and memorable experience.</p>', 7, 'Active', 0, 1, NULL, '2026-05-25 15:15:16', '2026-05-26 07:31:10'),
(8, 'Theme Park Tickets Tour', '<p>Theme park tours in Dubai</p>\r\n<p>Are you arranging a family trip to Dubai and want to spend some time at the city&rsquo;s most adventures places and now not sure where to buy theme park ticket? There is a wide variety of entertainment, from conventional amusement parks to cafes specializing in virtual gaming. Dubai is well known for its theme parks. In the city, there are between 35 and 40 theme parks. In Dubai, every theme park is an amusement park with a central theme. Theme parks in Dubai are fancier than city parks and playgrounds, with activities for all ages. Themes are a significant feature of theme parks that center around a subject or group of issues. Whether you&rsquo;re looking for family entertainment or heart-pounding thrills, Dubai has a theme park for you.</p>', 8, 'Active', 0, 1, NULL, '2026-05-25 15:15:57', '2026-05-25 15:15:57'),
(9, 'Cruise Dinner Dubai Tour', '<p>Dubai is famous for being an excellent holiday destination. Tourists frequently visit Dubai because of the beautiful skyscrapers, dunes, shopping malls, cruise dinner dubai and all-inclusive accommodation options. However, people like to enjoy sunsets and dining outside at such times. If you are visiting&nbsp;Dubai&nbsp;or are already a local, we suggest you avail cruise dinner options in Dubai. Why do you always have to eat at restaurants with your partner or family? How about we give you a wonderful idea for dinner with your partner?<br>Here we bring you dinner in the ocean of beautiful Dubai. We guarantee it will be one of the best dinners you have ever had in your life. What else could be more beautiful than eating on the water under the mesmerizing skyline of Dubai?</p>', 5, 'Active', 0, 1, NULL, '2026-05-25 15:16:36', '2026-05-25 15:16:36'),
(10, 'Tours in UAE', '<p>Dubai Combo Tours &ndash; Experience More &amp; Save More with Saifco Travel &amp; Tourism</p>\r\n<p>Dubai is a city of unmatched beauty and adventure, offering an extraordinary mix of modern marvels, cultural heritage, thrilling experiences, and luxury getaways. Instead of booking individual tours, why not combine multiple attractions into one seamless package? With Saifco Travel &amp; Tourism&rsquo;s Dubai Combo Tours, you can explore Dubai&rsquo;s top attractions, experience thrilling adventures, and enjoy luxurious getaways&mdash;all while saving time and money. Our combo tour packages are designed to provide a hassle-free and cost-effective way to enjoy the best Dubai has to offer.</p>', 6, 'Active', 0, 1, NULL, '2026-05-25 15:17:18', '2026-05-25 15:17:18'),
(11, 'Umrah Travel Agency', '<p>Avail Umrah packages from one of the best umrah travel agency,&nbsp;Saifco Travel &amp; Tourism? Our Umrah travel agency UAE or UK should be your first choice if you are looking for a reliable option. What&rsquo;s more, we are not limited to a specific country as we are offering services from UAE and UK. We are also providing&nbsp;Umrah visa services&nbsp;from Pakistan as well. With our Umrah travel agency Pakistan, you can travel for Umrah from different cities in the country.<br>Finding a travel agency that offers affordable and customized packages is not easy. But we are here for you. Since we make every process easier for our customers, you will love to travel with us. It&rsquo;s simple to get a passport, visa, return tickets, and accommodation in a hotel of your choice.</p>', 11, 'Active', 0, 1, NULL, '2026-05-25 15:17:50', '2026-05-27 08:41:24'),
(12, 'Everything You Need to Know About Umrah by Bus from Dubai 2025', '<p>It&rsquo;s a dream of every Muslim to perform Umrah at least once in their lifetime. Although it is not compulsory for every Muslim in Islam, those who can afford to travel must complete it with all of their heart and soul. Umrah is a way to seek forgiveness for all past sins and reward man with a more purposeful life. One Umrah can be performed within a few hours, but it is necessary to perform Four essential rituals which are wearing Ihram, Do Neyat, tawaf, and Sai.<br>Every year, thousands of pilgrims from around the world come to Saudi Arabia to perform the Holy Umrah. Therefore, Mecca is always crowded, and you need a well-organized trip to stay focused on your Ibadah rather than worrying about visa, residence, commute, and other basic amenities. Although these amenities are necessary to have an enjoyable time in the Holy City, they should never be an obstruction in the way of your concentration towards Allah Almighty. Therefore, we are responsible for making you feel comfortable and stress-free during your stay at Umrah.</p>', 14, 'Active', 0, 1, NULL, '2026-06-08 04:14:18', '2026-06-08 04:14:54'),
(13, 'Everything You Need to Know About Umrah by Bus from Dubai 2025', '<p>It&rsquo;s a dream of every Muslim to perform Umrah at least once in their lifetime. Although it is not compulsory for every Muslim in Islam, those who can afford to travel must complete it with all of their heart and soul. Umrah is a way to seek forgiveness for all past sins and reward man with a more purposeful life. One Umrah can be performed within a few hours, but it is necessary to perform Four essential rituals which are wearing Ihram, Do Neyat, tawaf, and Sai.<br>Every year, thousands of pilgrims from around the world come to Saudi Arabia to perform the Holy Umrah. Therefore, Mecca is always crowded, and you need a well-organized trip to stay focused on your Ibadah rather than worrying about visa, residence, commute, and other basic amenities. Although these amenities are necessary to have an enjoyable time in the Holy City, they should never be an obstruction in the way of your concentration towards Allah Almighty. Therefore, we are responsible for making you feel comfortable and stress-free during your stay at Umrah.</p>', 15, 'Active', 0, 1, NULL, '2026-06-12 12:09:00', '2026-06-12 12:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `explore_uaes`
--

CREATE TABLE `explore_uaes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explore_uaes`
--

INSERT INTO `explore_uaes` (`id`, `title`, `description`, `title1`, `sub_title1`, `title2`, `sub_title2`, `title3`, `sub_title3`, `title4`, `sub_title4`, `title5`, `sub_title5`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Explore UAE with saifco travel & trourism', '<p>Book the best Dubai tours, desert safari deals, and luxury yacht tours with a trusted local Operator Enjoy top-rated Dubai city tours and Abu Dhabi trips at the best prices with instant confirmation and 18+ years of experience.</p>', 'Best Price', 'Guaranteed Deals', '18 + Years', 'Trusted Experience', 'Top Rated', '5 Starts Rated', 'Licensed Operator', 'Dubai Approved', '50K + Customers', 'World Wide Travelers', 'Active', 0, 1, NULL, '2026-06-13 12:36:58', '2026-06-13 12:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

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

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` enum('Default','Tour','Products') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default',
  `tour_type_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `ordering` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `image`, `status`, `type`, `tour_type_id`, `created_by`, `ordering`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'What are the best tours to book in Dubai?', 'Dubai offers a variety of top-rated experiences including desert safari tours, luxury yacht rentals, Dubai city tours, Abu Dhabi day trips, and dhow cruise dinners. At Saifco Travel & Tourism, we provide carefully curated UAE inbound tours designed for families, couples, and corporate groups.', NULL, 'Active', 'Tour', 9, 1, 1, '2026-05-26 15:47:33', '2026-05-26 15:47:33', NULL),
(2, 'How much does a Dubai desert safari cost?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 9, 1, 2, '2026-05-26 15:48:35', '2026-05-26 15:48:35', NULL),
(3, 'Do you provide hotel pickup and drop-off for tours?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 9, 1, 3, '2026-05-26 15:48:54', '2026-05-26 15:48:54', NULL),
(4, 'Do you offer private yacht rentals in Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 9, 1, 4, '2026-05-26 15:49:08', '2026-05-26 15:49:08', NULL),
(5, 'Can I apply for a UAE visa through your company?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 9, 1, 5, '2026-05-26 15:49:21', '2026-05-26 15:54:51', NULL),
(6, 'Can I apply for a UAE visa through your company?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 1, '2026-05-26 15:54:22', '2026-05-26 15:54:39', NULL),
(7, 'Do you offer private yacht rentals in Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 2, '2026-05-26 15:55:02', '2026-05-26 15:55:10', NULL),
(8, 'Do you provide hotel pickup and drop-off for tours?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 3, '2026-05-26 15:55:16', '2026-05-26 15:55:34', NULL),
(9, 'How much does a Dubai desert safari cost?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 4, '2026-05-26 15:55:41', '2026-05-26 15:55:50', NULL),
(10, 'What are the best tours to book in Dubai?', 'Dubai offers a variety of top-rated experiences including desert safari tours, luxury yacht rentals, Dubai city tours, Abu Dhabi day trips, and dhow cruise dinners. At Saifco Travel & Tourism, we provide carefully curated UAE inbound tours designed for families, couples, and corporate groups.', NULL, 'Active', 'Tour', 10, 1, 5, '2026-05-26 15:55:54', '2026-05-26 15:56:08', NULL),
(11, 'Do you provide Umrah packages from Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 6, '2026-05-26 15:56:42', '2026-05-26 15:56:42', NULL),
(12, 'How can I book a tour with Saifco Travel?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 7, '2026-05-26 15:57:03', '2026-05-26 15:57:03', NULL),
(13, 'Is Saifco Travel a licensed tour operator in Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 10, 1, 8, '2026-05-26 15:57:20', '2026-05-26 15:57:20', NULL),
(14, 'What is included in Desert Safari Dubai packages?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 1, '2026-05-26 15:58:34', '2026-05-26 15:58:34', NULL),
(15, 'Is BBQ dinner included in desert safari Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 2, '2026-05-26 15:58:54', '2026-05-26 15:58:54', NULL),
(16, 'Which is better, morning or evening desert safari Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 3, '2026-05-26 15:59:08', '2026-05-26 15:59:08', NULL),
(17, 'What should I wear for desert safari?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 4, '2026-05-26 15:59:25', '2026-05-26 15:59:25', NULL),
(18, 'Is dune bashing safe in Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 5, '2026-05-26 16:00:05', '2026-05-26 16:00:05', NULL),
(19, 'Can kids and elderly join desert safari?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 6, '2026-05-26 16:00:29', '2026-05-26 16:00:29', NULL),
(20, 'What activities are included in desert safari tours?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 7, '2026-05-26 16:01:00', '2026-05-26 16:01:00', NULL),
(21, 'Do desert safari tours include hotel pickup?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 8, '2026-05-26 16:01:18', '2026-05-26 16:01:18', NULL),
(22, 'Are private desert safari tours available?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 9, '2026-05-26 16:01:41', '2026-05-26 16:01:41', NULL),
(23, 'How long does desert safari Dubai last?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 1, 1, 10, '2026-05-26 16:02:00', '2026-05-26 16:02:00', NULL),
(24, 'How far is Abu Dhabi from Dubai?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 1, '2026-05-26 16:18:57', '2026-05-26 16:18:57', NULL),
(25, 'Is hotel pickup available?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 2, '2026-05-26 16:19:30', '2026-05-26 16:19:30', NULL),
(26, 'What is included in Abu Dhabi city tours?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 3, '2026-05-26 16:20:06', '2026-05-26 16:20:06', NULL),
(27, 'What should I wear for Grand Mosque visit?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 4, '2026-05-26 16:20:23', '2026-05-26 16:20:23', NULL),
(28, 'Is Ferrari World Abu Dhabi included in tours?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 5, '2026-05-26 16:20:44', '2026-05-26 16:20:44', NULL),
(29, 'How long is Abu Dhabi tour?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 6, '2026-05-26 16:20:59', '2026-05-26 16:20:59', NULL),
(30, 'Can I visit Ferrari World and Grand Mosque in one day?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 7, '2026-05-26 16:21:36', '2026-05-26 16:21:36', NULL),
(31, 'Are private tours available?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 8, '2026-05-26 16:22:02', '2026-05-26 16:22:02', NULL),
(32, 'Are Louvre Abu Dhabi tickets included?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 9, '2026-05-26 16:22:22', '2026-05-26 16:22:22', NULL),
(33, 'Is Abu Dhabi worth visiting?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolore doloremque labore laborum quidem rerum sint? Assumenda consectetur doloremque dolorum impedit modi recusandae! Aspernatur aut deserunt dignissimos esse et exercitationem nostrum repellendus repudiandae sapiente vitae.', NULL, 'Active', 'Tour', 4, 1, 10, '2026-05-26 16:22:34', '2026-05-26 16:22:34', NULL),
(34, 'UAE Visit visa holder can perform Umrah?', 'test', NULL, 'Active', 'Tour', 11, 1, 1, '2026-05-27 15:22:34', '2026-05-27 15:22:34', NULL),
(35, 'Can I travel to my home country from Saudi Arabia after performing Umrah?', 'test', NULL, 'Active', 'Tour', 11, 1, 2, '2026-05-27 15:22:46', '2026-05-27 15:22:46', NULL),
(36, 'Can single women perform Umrah while traveling with a sister or female relative?', 'test', NULL, 'Active', 'Tour', 11, 1, 3, '2026-05-27 15:23:16', '2026-05-27 15:23:16', NULL),
(37, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 11, 1, 4, '2026-05-27 15:23:36', '2026-05-27 15:23:36', NULL),
(38, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 11, 1, 5, '2026-05-27 15:23:53', '2026-05-27 15:23:53', NULL),
(39, 'How long it takes time to process visa procedure?', 'test', NULL, 'Active', 'Tour', 11, 1, 6, '2026-05-27 15:24:06', '2026-05-27 15:24:06', NULL),
(40, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 11, 1, 7, '2026-05-27 15:24:25', '2026-05-27 15:24:25', NULL),
(41, 'How long it takes time to process visa procedure?', 'test', NULL, 'Active', 'Tour', 11, 1, 8, '2026-05-27 15:24:39', '2026-05-27 15:24:39', NULL),
(42, 'UAE Visit visa holder can perform Umrah?', 'test', NULL, 'Active', 'Tour', 14, 1, 1, '2026-06-08 14:10:04', '2026-06-08 14:10:32', NULL),
(43, 'Can I travel to my home country from Saudi Arabia after performing Umrah?', 'test', NULL, 'Active', 'Tour', 14, 1, 2, '2026-06-08 14:10:57', '2026-06-08 14:10:57', NULL),
(44, 'Can single women perform Umrah while traveling with a sister or female relative?', 'test', NULL, 'Active', 'Tour', 14, 1, 0, '2026-06-08 14:11:45', '2026-06-08 14:11:45', NULL),
(45, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 14, 1, 0, '2026-06-08 14:12:09', '2026-06-08 14:12:09', NULL),
(46, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 14, 1, 5, '2026-06-08 14:12:23', '2026-06-08 14:12:23', NULL),
(47, 'How long it takes time to process visa procedure?', 'test', NULL, 'Active', 'Tour', 14, 1, 6, '2026-06-08 14:12:33', '2026-06-08 14:12:33', NULL),
(48, 'UAE Visit visa holder can perform Umrah?', 'test', NULL, 'Active', 'Tour', 15, 1, 6, '2026-06-12 12:10:54', '2026-06-12 12:11:06', NULL),
(49, 'Can I travel to my home country from Saudi Arabia after performing Umrah?', 'test', NULL, 'Active', 'Tour', 15, 1, 6, '2026-06-12 12:11:10', '2026-06-12 12:11:18', NULL),
(50, 'Can single women perform Umrah while traveling with a sister or female relative?', 'test', NULL, 'Active', 'Tour', 15, 1, 6, '2026-06-12 12:11:39', '2026-06-12 12:11:42', NULL),
(51, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 15, 1, 6, '2026-06-12 12:11:50', '2026-06-12 12:11:53', NULL),
(52, 'Can I still travel if my passport is expiring soon?', 'test', NULL, 'Active', 'Tour', 15, 1, 6, '2026-06-12 12:12:00', '2026-06-12 12:12:05', NULL),
(53, 'How long it takes time to process visa procedure?', 'test', NULL, 'Active', 'Tour', 15, 1, 6, '2026-06-12 12:12:13', '2026-06-12 12:12:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `galleries` (`id`, `title`, `tour_type`, `cover_image`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dubai City Tour', NULL, 'images/1773614082_image.webp', 'active', 1, 1, NULL, '2026-03-15 17:34:42', '2026-03-15 17:49:10'),
(2, 'Demo Gallery', NULL, '1773683694_cover_image.webp', 'active', 2, 1, NULL, '2026-03-16 12:54:54', '2026-03-16 12:54:54'),
(3, 'Test Gallery', NULL, '1773684118_69b8459664a47_cover_image.webp', 'active', 0, 1, NULL, '2026-03-16 13:01:47', '2026-03-16 13:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

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
(64, 1, 'Website Designing', '<p>Lorem ipsum dolor sit amet.</p>', 3, 0.00, 0.00, 5000.00, 15000.00, '2026-01-09 11:44:26', '2026-01-09 11:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

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
(7, 5, 'Page Under Maintenance', 1, NULL, '2025-10-07 20:37:33', '2025-10-07 20:37:36'),
(8, 9, 'Page Under Maintenance', 1, NULL, '2025-10-07 20:37:33', '2025-10-07 20:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

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
(74, '2026_04_06_185909_create_coupons_table', 49),
(75, '2026_05_21_000001_create_tour_types_table', 50),
(76, '2026_05_24_000001_add_short_description_and_seo_to_tour_types_table', 51),
(77, '2026_05_24_000002_add_tour_type_id_to_faqs_and_reviews_table', 52),
(78, '2026_05_24_000003_add_tour_type_id_to_galleries_table', 53),
(79, '2026_05_24_000004_drop_faq_id_and_gallery_id_from_tours_table', 54),
(80, '2026_05_25_000001_replace_title_1_title_2_with_title_on_tour_types_table', 55),
(81, '2026_05_21_000001_replace_tour_type_id_with_tour_type_on_galleries_table', 56),
(82, '2026_05_21_000002_replace_tour_type_id_with_tour_type_on_galleries_table', 57),
(83, '2026_05_26_000001_create_red_tags_table', 58),
(84, '2026_05_26_000002_add_red_tag_id_to_tours_table', 59),
(85, '2026_05_26_000003_register_red_tags_admin_module', 60),
(86, '2026_05_26_000004_order_tour_types_for_all_categories', 61),
(87, '2026_05_27_000001_add_friendly_url_to_tour_types_table', 62),
(88, '2026_05_28_000001_add_services_and_country_to_testimonials_table', 63),
(89, '2026_05_26_100001_create_explores_table', 64),
(90, '2026_05_26_100002_create_popular_searches_table', 64),
(91, '2026_05_26_100003_register_explore_and_popular_searches_modules', 64),
(92, '2026_05_26_110000_update_popular_searches_for_repeater', 65),
(93, '2026_05_26_120000_add_description_to_popular_searches_table', 66),
(94, '2026_05_26_130000_change_faqs_description_to_text', 67),
(95, '2026_06_13_171859_create_explore_uaes_table', 68);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

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
(46, 0, 'Tours & Packages', 'tours-pricing', 'nil', 'Yes', 22, 'Active', 'code', 1, '2026-03-09 11:18:09', '2026-05-23 16:22:52', NULL),
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
(58, 0, 'Coupons', 'coupons', 'add | edit | view | status | delete | deleteall | More | duplicate', 'Yes', 11, 'Active', 'report-money', 1, '2026-04-06 14:51:30', '2026-04-06 14:52:24', '2026-04-06 14:52:24'),
(59, 40, 'Tour Categories', 'tour-types', 'add | edit | view | status | delete | delete all | More | import | export | duplicate', 'Yes', 22, 'Active', 'circle', 1, '2026-05-23 16:30:50', '2026-06-13 13:40:36', NULL),
(60, 40, 'Red Tags', 'red-tags', 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view', 'Yes', 23, 'Active', 'circle', 1, '2026-05-24 15:07:19', '2026-06-13 13:32:33', NULL),
(61, 40, 'Explore', 'explore', 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view', 'Yes', 23, 'Active', 'circle', 1, '2026-05-25 14:23:59', '2026-06-13 13:32:37', NULL),
(62, 40, 'Popular Searches', 'popular-searches', 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view', 'Yes', 23, 'Active', 'circle', 1, '2026-05-25 14:24:39', '2026-06-13 13:32:40', NULL),
(63, 0, 'Explore UAE', 'explore-uae', 'add | edit | view | status | delete | deleteall | More | duplicate', 'Yes', 15, 'Active', 'code', 1, '2026-06-13 12:05:14', '2026-06-13 12:05:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

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
(3, 0, 'About Us', 'About Us', 1, NULL, 'about-us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum molestiae praesentium repellendus? Ab, consequuntur esse iste iure iusto libero quidem sint ullam. Atque debitis hic nobis placeat repellendus. Beatae dolor eaque iure nisi quae! Accusamus aliquam cupiditate est ex, maiores molestiae mollitia officia perferendis quas quos sapiente temporibus unde.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum molestiae praesentium repellendus? Ab, consequuntur esse iste iure iusto libero quidem sint ullam. Atque debitis hic nobis placeat repellendus. Beatae dolor eaque iure nisi quae! Accusamus aliquam cupiditate est ex, maiores molestiae mollitia officia perferendis quas quos sapiente temporibus unde.</p>\r\n<p>[include file=\"about_us\"]</p>', 'published', '1779911456_6a174b209e553_image.webp', 'about-us', 'About Us', 'Default', 'Yes', 2, 'About Us', 'about, about company', 'meta description', 1, '2025-04-15 18:30:13', '2026-05-27 15:21:37', NULL),
(42, 0, 'Contact Us', 'Contact Us', 0, NULL, 'contact-us', '<p>[include file=\"contact_us\"]</p>', 'published', NULL, NULL, NULL, 'Default', 'Yes', 1, 'Contact Us', 'Et consequatur Cons', 'Modi officia qui min', 1, '2025-09-05 14:32:19', '2026-05-27 15:29:32', NULL),
(45, 0, 'Desert Safari Tours', 'Desert Safari Tours', 1, NULL, 'desert-safari-tours', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Experience the best Desert Safari Dubai with thrilling dune bashing, camel rides, sandboarding, and BBQ dinner under the stars. Choose from evening desert safari, morning safari, private desert safari, and VIP desert camp experiences. Enjoy live entertainment, including belly dance, Tanoura show, and fire show, while exploring the golden dunes of Dubai. These desert safari tours offer a perfect mix of adventure, culture, and relaxation, making them one of the top things to do in Dubai for tourists and families.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663128_6a138118563c8_image.webp', 'desert-safari-tours', 'Desert Safari Tours', 'Box Container', 'Yes', 2, 'Desert Safari Tours', NULL, NULL, 1, '2025-12-09 11:12:29', '2026-05-29 16:10:24', NULL),
(46, 0, 'All Tour Categories', 'All Tour Categories', 0, NULL, 'all-tour-categories', '<p>[include file=\"all-categories\"]</p>', 'published', '1779663114_6a13810aa05d7_image.webp', 'About Image', 'Hello', 'Default', 'Yes', 2, 'All Tour Categories', 'tour, dubai, umrah, abu dhabi,', 'call us for more details.', 1, '2025-12-09 11:13:30', '2026-05-29 13:44:41', NULL),
(47, 0, 'About Us (Copy)', 'About Us (Copy)', 1, 'Welcome to the Company', 'about-us-copy-tsildt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum molestiae praesentium repellendus? Ab, consequuntur esse iste iure iusto libero quidem sint ullam. Atque debitis hic nobis placeat repellendus. Beatae dolor eaque iure nisi quae! Accusamus aliquam cupiditate est ex, maiores molestiae mollitia officia perferendis quas quos sapiente temporibus unde.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi earum molestiae praesentium repellendus? Ab, consequuntur esse iste iure iusto libero quidem sint ullam. Atque debitis hic nobis placeat repellendus. Beatae dolor eaque iure nisi quae! Accusamus aliquam cupiditate est ex, maiores molestiae mollitia officia perferendis quas quos sapiente temporibus unde.</p>', 'published', 'dup_6a13688a4129f8.03666149.webp', NULL, NULL, 'Default', 'Yes', 2, 'About Us | Alpha Tech', 'about, about company', 'meta description', 1, '2026-05-24 16:07:22', '2026-05-27 15:29:08', '2026-05-27 15:29:08'),
(48, 0, 'Abu Dhabi Tours', 'Abu Dhabi Tours', 1, NULL, 'abu-dhabi-tours', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Explore Abu Dhabi tours from Dubai and discover the UAE&rsquo;s capital with guided sightseeing experiences. Visit Sheikh Zayed Grand Mosque, Louvre Abu Dhabi, Emirates Palace, and Ferrari World Abu Dhabi. These full-day tours offer comfortable transport, expert guides, and a well-planned itinerary. Abu Dhabi tours are perfect for travellers looking to explore culture, architecture, and world-class attractions in one unforgettable day trip.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663072_6a1380e0b3ea9_image.webp', 'abu-dhabi-tours', 'Abu Dhabi Tours', 'Box Container', 'Yes', 2, 'Abu Dhabi Tours', NULL, NULL, 1, '2026-05-24 17:14:35', '2026-05-29 16:41:50', NULL),
(49, 0, 'Dubai City Tours', 'Dubai City Tours', 1, NULL, 'dubai-city-tours', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Discover Dubai city tours covering iconic attractions like Burj Khalifa views, Dubai Frame, Jumeirah Mosque, Palm Jumeirah, and Dubai Marina. These guided tours offer a complete overview of modern and old Dubai with comfortable transport and expert insights. Ideal for first-time visitors, Dubai city tours provide a convenient way to explore city&rsquo;s highlights in short time.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663795_6a1383b3e6b7c_image.webp', 'dubai-city-tours', 'Dubai City Tours', 'Box Container', 'Yes', 2, 'Dubai City Tours', NULL, NULL, 1, '2026-05-24 18:00:46', '2026-05-29 16:41:15', NULL),
(50, 0, 'Yacht Charter Tours', 'Yacht Charter Tours', 1, NULL, 'yacht-charter-tours', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Enjoy luxury yacht charter Dubai with private yacht rental in Dubai Marina and Palm Jumeirah. Cruise past iconic landmarks like Atlantis, Burj Al Arab, and JBR while enjoying a premium experience with professional crew and modern facilities. Perfect for parties, family trips, and corporate events.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663833_6a1383d9865b4_image.webp', 'yacht-charter-tours', 'Yacht Charter Tours', 'Box Container', 'Yes', 2, 'Yacht Charter Tours', NULL, NULL, 1, '2026-05-24 18:03:27', '2026-05-29 16:41:03', NULL),
(51, 0, 'Water Activities', 'Water Activities', 1, NULL, 'water-activities', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">EExplore the best Dubai water activities including jet ski, parasailing, flyboarding, banana boat rides, and speed boat tours along the city&rsquo;s stunning coastline. These exciting water sports are perfect for thrill seekers, families, and tourists looking for adventure in Dubai. Operated by certified professionals with safety equipment, Dubai water activities offer a fun, safe, and unforgettable experience at popular locations like JBR Beach and Dubai Marina.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663865_6a1383f99d779_image.webp', NULL, NULL, 'Box Container', 'Yes', 2, 'Water Activities', NULL, NULL, 1, '2026-05-24 18:03:59', '2026-05-29 16:40:50', NULL),
(52, 0, 'Theme Park Tickets', 'Theme Park Tickets', 1, NULL, 'theme-park-tickets', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Enjoy a relaxing dhow cruise Dubai experience with dinner, live entertainment, and stunning views of Dubai Marina or Dubai Creek. Cruise on a traditional wooden dhow while enjoying an international buffet dinner, Tanoura dance, and cultural performances. Dhow cruise tours are perfect for couples, families, and tourists looking for a peaceful and memorable evening in Dubai.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663891_6a1384138df93_image.webp', NULL, NULL, 'Box Container', 'Yes', 2, 'Theme Park Tickets', NULL, NULL, 1, '2026-05-24 18:04:28', '2026-05-29 16:40:38', NULL),
(53, 0, 'Dhow Cruise Tours', 'Dhow Cruise Tours', 1, NULL, 'dhow-cruise-tours', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Enjoy a relaxing dhow cruise Dubai experience with dinner, live entertainment, and stunning views of Dubai Marina or Dubai Creek. Cruise on a traditional wooden dhow while enjoying an international buffet dinner, Tanoura dance, and cultural performances. Dhow cruise tours are perfect for couples, families, and tourists looking for a peaceful and memorable evening in Dubai.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663919_6a13842fdb5f1_image.webp', 'dhow-cruise-tours', 'Dhow Cruise Tours', 'Box Container', 'Yes', 2, 'Dhow Cruise Tours', NULL, NULL, 1, '2026-05-24 18:04:54', '2026-05-29 16:38:56', NULL),
(54, 0, 'Dubai Combo Tours', 'Dubai Combo Tours', 1, NULL, 'dubai-combo-tours', '<div class=\"w-6xl max-w-full mx-auto\">\r\n<p style=\"text-align: center;\">Experience camel race Dubai tours and discover a unique part of Emirati culture. Visit camel racing tracks like Al Marmoom, watch live races, and learn about this traditional sport. These tours offer an authentic desert experience away from modern city attractions and are perfect for cultural exploration.</p>\r\n</div>\r\n<p style=\"text-align: center;\">[include file=\"all-tours-packages\"]</p>', 'published', '1779663945_6a1384498a220_image.webp', 'dubai-combo-tours', 'Dubai Combo Tours', 'Box Container', 'Yes', 2, 'Dubai Combo Tours', NULL, NULL, 1, '2026-05-24 18:05:22', '2026-05-29 16:38:30', NULL),
(55, 0, 'Umrah', 'Umrah', 0, NULL, 'umrah', '<p>[include file=\"umrah\"]</p>\r\n<p>[include file=\"all-tours-packages\"]</p>', 'published', '1779909275_6a17429bd44ee_image.webp', 'umrah', 'Umrah', 'Box Container', 'Yes', 2, 'Umrah', NULL, NULL, 1, '2026-05-27 03:02:27', '2026-06-08 04:12:40', NULL),
(57, 0, 'Umrah by Bus', 'Umrah By Bus', 0, NULL, 'umrah-by-bus', '<p>[include file=\"umrah-by-bus\"]</p>\r\n<p>[include file=\"all-tours-packages\"]</p>', 'published', '1780945337_6a2711b9a102b_image.webp', 'umrah-by-bus', 'Umrah By Bus', 'Box Container', 'Yes', 2, 'Umrah By Bus', NULL, NULL, 1, '2026-06-08 04:13:10', '2026-06-08 14:02:17', NULL),
(58, 0, 'Umrah for Single Lady', 'Umrah For Single Lady', 0, NULL, 'umrah-for-single-lady', '<p>[include file=\"umrah-for-single-lady\"]</p>\r\n<p>[include file=\"all-tours-packages\"]</p>', 'published', NULL, 'umrah-for-single-lady', 'Umrah For Single Lady', 'Box Container', 'Yes', 2, 'Umrah For Single Lady', NULL, NULL, 1, '2026-06-12 05:40:35', '2026-06-12 05:41:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

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
-- Table structure for table `popular_searches`
--

CREATE TABLE `popular_searches` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tour_type_id` bigint UNSIGNED DEFAULT NULL,
  `search_items` json DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_searches`
--

INSERT INTO `popular_searches` (`id`, `title`, `description`, `tour_type_id`, `search_items`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 9, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}]', 1, NULL, '2026-05-25 15:28:48', '2026-05-26 07:26:10'),
(2, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 10, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-25 15:43:03', '2026-05-26 07:26:05'),
(3, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 1, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-25 15:43:56', '2026-05-26 07:25:48'),
(4, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 4, '[{\"title\": \"Sheikh Zayed Mosque\"}, {\"title\": \"Abu Dhabi city tour with Louvre Museum\"}, {\"title\": \"Abu Dhabi city tour with Ferrari World\"}, {\"title\": \"Ferrari World\"}, {\"title\": \"Dubai Tours\"}, {\"title\": \"Desert Dubai Trip\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-25 15:47:24', '2026-05-26 07:25:25'),
(5, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 3, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-25 15:47:42', '2026-05-29 14:56:37'),
(6, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 2, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-26 07:29:16', '2026-05-26 07:29:26'),
(7, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 7, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-26 07:31:22', '2026-05-26 07:32:17'),
(8, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 8, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-26 07:32:58', '2026-05-26 07:33:05'),
(9, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 5, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-26 07:34:19', '2026-05-26 07:34:27'),
(10, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 6, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-26 13:59:26', '2026-05-26 13:59:34'),
(11, 'Popular Searches', 'Quick access to what travelers explore most—making it easier to find the right experience without the search', 11, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-05-27 10:16:46', '2026-05-27 10:16:58'),
(12, 'Related Services', 'Quick access to what travelers explore most—making it easier to find the right experience without the search.', 14, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-06-08 14:09:10', '2026-06-08 14:09:40'),
(13, 'Related Services', 'Quick access to what travelers explore most—making it easier to find the right experience without the search.', 15, '[{\"title\": \"Yacht in Dubai Marina\"}, {\"title\": \"Yacht Rental Dubai\"}, {\"title\": \"Dune Bashing Dubai\"}, {\"title\": \"Quad Biking Dubai\"}, {\"title\": \"VR5 Tasheel Locations\"}, {\"title\": \"Desert Safari in Dubai\"}, {\"title\": \"Ski Dubai Tickets Offer\"}, {\"title\": \"Legoland Dubai Tickets\"}, {\"title\": \"The Frame Dubai Tickets\"}, {\"title\": \"Umrah By Bus\"}, {\"title\": \"Umrah Services Dubai\"}, {\"title\": \"Theme Park Tickets\"}, {\"title\": \"Safari Tour Dubai\"}, {\"title\": \"Speed Boat Tour\"}, {\"title\": \"Yacht for Party\"}, {\"title\": \"Online Travel Agency\"}, {\"title\": \"Dinner Cruise Dubai\"}, {\"title\": \"Abu Dhabi City Tour\"}, {\"title\": \"Abu Dhabi Tour Packages\"}, {\"title\": \"Umrah By Air\"}, {\"title\": \"Deep Sea Fishing\"}, {\"title\": \"Desert Safari Deals\"}, {\"title\": \"Dibba Dhow Cruise\"}, {\"title\": \"Tour Operator in Dubai\"}, {\"title\": \"Umrah From Dubai\"}, {\"title\": \"Umrah Travel Agency\"}, {\"title\": \"Aquaventure Waterpark\"}, {\"title\": \"Morning Desert Safari\"}]', 1, NULL, '2026-06-12 12:09:34', '2026-06-12 12:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `stock_status` enum('In Stock','Out of Stock') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Stock',
  `product_types` json DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `discount` enum('10','15','20','25','50') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tag` enum('New','Sale') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,2) DEFAULT NULL,
  `length` decimal(12,2) DEFAULT NULL,
  `width` decimal(12,2) DEFAULT NULL,
  `height` decimal(12,2) DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `full_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_specifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `regular_price` decimal(14,2) DEFAULT NULL,
  `sale_price` decimal(14,2) DEFAULT NULL,
  `sale_start` date DEFAULT NULL,
  `sale_end` date DEFAULT NULL,
  `main_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Published','Unpublished') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `visibility` enum('Public','Private') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `friendly_url`, `quantity`, `stock_status`, `product_types`, `brand_id`, `discount`, `style_no`, `product_tag`, `video_link`, `sku`, `isbn`, `weight`, `length`, `width`, `height`, `short_description`, `full_description`, `product_features`, `product_specifications`, `regular_price`, `sale_price`, `sale_start`, `sale_end`, `main_image`, `image_alt`, `image_title`, `status`, `visibility`, `ordering`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Iphone 17 Pro Max phone', 'iphone-17-pro-max-phone', 10, 'In Stock', '[\"Normal\", \"Best Seller\"]', 2, '15', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-562365', '5659865', 0.50, 30.00, 15.00, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', 1999.00, 1699.00, '2026-03-31', '2026-04-10', '1774972742_69cbef465bf36_main_image.svg', 'iphone', 'iphone', 'Published', 'Public', 1, 'Iphone 17 Pro Max Phone', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-30 16:22:18', '2026-03-31 16:25:06', '2026-03-31 16:25:06'),
(2, 'Iphone 17 Pro Max phone (Copy)', 'iphone-17-pro-max-phone-copy', 10, 'In Stock', '[\"Normal\", \"Best Seller\"]', 2, '15', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-562365-copy', '5659865', 0.50, 30.00, 15.00, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', 1999.00, 1699.00, '2026-03-31', '2026-04-10', '1774972742_69cbef465bf36_main_image.svg', 'iphone', 'iphone', 'Published', 'Public', 1, 'Iphone 17 Pro Max Phone', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:13:59', '2026-03-31 16:25:06', '2026-03-31 16:25:06'),
(3, 'Iphone 17 Pro Max phone (Copy)', 'iphone-17-pro-max-phone-copy-1', 10, 'In Stock', '[\"Normal\", \"Best Seller\"]', 2, '15', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-562365-copy-1', '5659865', 0.50, 30.00, 15.00, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', 1999.00, 1699.00, '2026-03-31', '2026-04-10', '1774972742_69cbef465bf36_main_image.svg', 'iphone', 'iphone', 'Published', 'Public', 1, 'Iphone 17 Pro Max Phone', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:20:24', '2026-03-31 16:25:06', '2026-03-31 16:25:06'),
(4, 'Sansumg Ultra S26', 'sansumg-ultra-s26', 10, 'In Stock', '[\"Normal\"]', 2, '20', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-56202', '5659865', 0.50, 30.00, 15.00, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', 50.00, 0.00, '2026-03-31', '2026-04-10', '1774992559_69cc3caf87ef8_main_image.webp', 'samsung', 'samsung', 'Published', 'Public', 1, 'Sansumg Ultra S26', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:20:53', '2026-04-06 16:18:01', NULL),
(5, 'Realme Note26', 'realme-note26', 10, 'In Stock', '[\"Normal\"]', 2, '20', '56560', 'New', 'https://www.youtube.com/watch?v=BTsC4tATFHo', 'PH-0565', '56501', 0.50, 30.00, 15.00, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', 150.00, 0.00, '2026-03-31', '2026-04-10', '1774992442_69cc3c3a8292b_main_image.webp', 'Realme', 'Realme', 'Unpublished', 'Public', 1, 'Realme Note26', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:25:22', '2026-04-06 16:24:57', NULL),
(6, 'Realme Note2610', 'realme-note2610', 10, 'In Stock', '[\"Normal\"]', 2, '20', '56560', 'New', NULL, '4545', NULL, 0.50, 30.00, 15.00, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aliquam aperiam aspernatur at explicabo incidunt inventore itaque iusto magni molestias nesciunt, numquam, omnis quasi sint? Accusamus ad, adipisci animi aut corporis debitis dolor esse fugiat illum ipsa quasi, quibusdam quo rem similique sit soluta ullam vero voluptas. A ab debitis et, ex excepturi inventore laudantium libero magnam perferendis placeat quam quisquam tempora. Ab accusantium ad at autem cum cumque delectus deleniti deserunt distinctio, eius facere harum hic inventore, iusto libero molestias necessitatibus numquam perferendis placeat porro possimus quidem sapiente tempore ut vitae. Asperiores aut eligendi ipsum, nulla repellendus saepe!</p>', 100.00, 0.00, '2026-03-31', '2026-04-10', '1774992442_69cc3c3a8292b_main_image.webp', 'Realme', 'Realme', 'Published', 'Public', 1, 'Realme Note26', 'iphone, 17pro, iphone max', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2026-03-31 16:44:31', '2026-04-06 16:13:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `show_title` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `show_in_menu` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `ordering` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(14,2) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` smallint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `item_name`, `value`, `price`, `description`, `ordering`, `created_at`, `updated_at`) VALUES
(64, 1, 'orange', '#ff7b00', 1900.00, 'premium color', 0, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(65, 1, 'grey', '#f1f0ff', 1700.00, 'regular color', 1, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(66, 1, 'blue', '#0060fa', 1500.00, 'running color', 2, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(67, 2, 'orange', '#ff7b00', 1900.00, 'premium color', 0, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(68, 2, 'grey', '#f1f0ff', 1700.00, 'regular color', 1, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(69, 2, 'blue', '#0060fa', 1500.00, 'running color', 2, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(70, 3, 'orange', '#ff7b00', 1900.00, 'premium color', 0, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(71, 3, 'grey', '#f1f0ff', 1700.00, 'regular color', 1, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(72, 3, 'blue', '#0060fa', 1500.00, 'running color', 2, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(94, 6, 'grey', '#f1f0ff', 1700.00, 'regular color', 0, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(95, 6, 'blue', '#0060fa', 1500.00, 'running color', 1, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(96, 5, 'grey', '#f1f0ff', 1700.00, 'regular color', 0, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(97, 5, 'blue', '#0060fa', 1500.00, 'running color', 1, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(98, 4, 'grey', '#f1f0ff', 1700.00, 'regular color', 0, '2026-04-06 16:18:01', '2026-04-06 16:18:01'),
(99, 4, 'blue', '#0060fa', 1500.00, 'running color', 1, '2026-04-06 16:18:01', '2026-04-06 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

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

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(14,2) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` smallint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `item_name`, `value`, `price`, `description`, `ordering`, `created_at`, `updated_at`) VALUES
(43, 1, 'mini', '17 pro', 1800.00, 'regular size', 0, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(44, 1, 'standard', '17 pro', 1900.00, 'regular size', 1, '2026-03-31 13:23:35', '2026-03-31 13:23:35'),
(45, 2, 'mini', '17 pro', 1800.00, 'regular size', 0, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(46, 2, 'standard', '17 pro', 1900.00, 'regular size', 1, '2026-03-31 16:14:00', '2026-03-31 16:14:00'),
(47, 3, 'mini', '17 pro', 1800.00, 'regular size', 0, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(48, 3, 'standard', '17 pro', 1900.00, 'regular size', 1, '2026-03-31 16:20:25', '2026-03-31 16:20:25'),
(60, 6, 'standard', '17 pro', 1900.00, 'regular size', 0, '2026-04-06 16:13:00', '2026-04-06 16:13:00'),
(61, 5, 'standard', '17 pro', 1900.00, 'regular size', 0, '2026-04-06 16:13:09', '2026-04-06 16:13:09'),
(62, 4, 'standard', '17 pro', 1900.00, 'regular size', 0, '2026-04-06 16:18:01', '2026-04-06 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_options`
--

CREATE TABLE `product_type_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, 1, 'Meghan Graves', NULL, 1, 0.00, 0.00, 10000.00, 10000.00, '2025-11-06 15:45:12', '2025-11-06 15:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `red_tags`
--

CREATE TABLE `red_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `red_tags`
--

INSERT INTO `red_tags` (`id`, `title`, `icon`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Best Seller', NULL, 'Active', 0, 1, NULL, NULL, NULL),
(2, 'Best Price Yacht Deal', NULL, 'Active', 0, 1, NULL, NULL, NULL),
(3, 'Top Rated Dinner Cruise', NULL, 'Active', 0, 1, NULL, NULL, NULL),
(4, 'Top Rated Dinner Cruise (Copy)', NULL, 'Active', 0, 1, '2026-05-25 14:20:30', '2026-05-25 14:19:50', '2026-05-25 14:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` enum('Tour','Product') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_type_id` bigint UNSIGNED DEFAULT NULL,
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

INSERT INTO `reviews` (`id`, `name`, `email`, `phone`, `designation`, `company`, `rating`, `review`, `type`, `tour_type_id`, `status`, `ordering`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'David John', 'david@gmail.com', '+125659896', 'Manager', 'Elite Engineering', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, porro.', 'Tour', NULL, 'Active', 1, 1, NULL, '2026-03-24 14:04:59', '2026-03-24 14:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

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
('izjvRqt80zw0n4GZWyxyCUdvCDFB5LZvjaBWUZjS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNVFrb3JaUkJNUlFWTGxXTkZQSVV0YVVyOUk2VlVzdE45MWphMGVMVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vbXlzYWlmY28tbGFyYXZlbC50ZXN0IjtzOjU6InJvdXRlIjtzOjE6Ii8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQxOiJodHRwczovL215c2FpZmNvLWxhcmF2ZWwudGVzdC9hZG1pbi90b3VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1781434878);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

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
(1, 'site_title', 'Mysaifco Travel & Tourism', NULL, '2026-05-26 15:30:43'),
(2, 'site_keywords', 'travel, tour, umrah, desert safari', NULL, '2026-05-26 15:30:43'),
(3, 'site_description', 'Saifco Travel & Tourism is a leading Dubai-based travel company offering Dubai tours, desert safari, yacht charters, holiday packages, Umrah services, and global visa assistance with trusted service and competitive prices.', NULL, '2026-05-26 15:30:43'),
(4, 'phone', '+92 (300) 2563325', NULL, NULL),
(5, 'email', 'info@mysaifco.com', NULL, '2026-05-26 15:30:43'),
(6, 'loader', 'Yes', NULL, '2026-05-26 15:30:43'),
(7, 'logo', '1779565602_logo.svg', NULL, '2026-05-23 14:46:42'),
(8, 'footer_logo', '1779565602_footer-logo.svg', NULL, '2026-05-23 14:46:42'),
(9, 'favicon', '1779565602_favicon.png', NULL, '2026-05-23 14:46:42'),
(10, 'address', '16th Street Shop # 5, Bohra Masjid Road, Ayal Nasir, Deira, Dubai, UAE.', NULL, '2026-05-26 15:30:43'),
(11, 'maintenance_mode', 'Inactive', NULL, '2026-05-26 15:30:43'),
(12, 'robots', 'NOINDEX, NOFOLLOW', NULL, '2026-05-26 15:30:43'),
(13, 'copyright_text', 'Copyright © 2025 Mysaifco.com. All Rights Reserved.', NULL, '2026-05-26 15:30:43'),
(14, 'google_analytics_code', 'no code', NULL, '2026-05-26 15:30:43'),
(15, 'landline_number', '+92 21 31234567', NULL, '2026-05-25 14:06:52'),
(16, 'landline_number_2', '+92 21 31234567', NULL, '2026-05-25 14:06:52'),
(17, 'mobile_number', '+971 4 2733868', NULL, '2026-05-26 15:30:43'),
(18, 'whatsapp_number', '+92 300 1234567', NULL, '2026-05-25 14:06:52'),
(19, 'website_url', 'www.mysaifco.com', NULL, '2026-05-26 15:30:43'),
(20, 'google_map_code', 'nil', NULL, '2026-05-26 15:30:43'),
(21, 'admin_title', 'WebSigntist', NULL, '2026-05-26 15:30:43'),
(22, 'show_title_logo', 'image_logo', NULL, '2026-05-26 15:30:43'),
(23, 'facebook', 'https://www.facebook.com/', NULL, '2026-05-26 15:30:43'),
(24, 'instagram', 'instagram', NULL, '2026-05-26 15:30:43'),
(25, 'linkeding', NULL, NULL, NULL),
(26, 'youtube', 'youtube', NULL, '2026-05-26 15:30:43'),
(27, 'twitter', 'twitter', NULL, '2026-05-26 15:30:43'),
(28, 'tiktok', 'tiktok', NULL, '2026-05-26 15:30:43'),
(29, 'smtp_host', 'localhost', NULL, '2026-05-26 15:30:43'),
(30, 'smtp_user', 'info@domain.com', NULL, '2026-05-26 15:30:43'),
(31, 'smtp_password', '123456', NULL, '2026-05-26 15:30:43'),
(32, 'smtp_port', '468', NULL, '2026-05-26 15:30:43'),
(33, 'recaptcha_site_key', '2s1f21sf21s2df12sd', NULL, '2026-05-26 15:30:43'),
(34, 'recaptcha_secret_key', '12435121t2re1ter2t12er', NULL, '2026-05-26 15:30:43'),
(35, 'paypal_payment_mode', 'sandbox', NULL, '2026-05-26 15:30:43'),
(36, 'paypal_live', 'info@livedomain.com', NULL, '2026-05-26 15:30:43'),
(37, 'paypal_sandbox', 'info@sandboxdomain.com', NULL, '2026-05-26 15:30:43'),
(38, 'stripe_payment_mode', 'live_mode', NULL, '2026-05-26 15:30:43'),
(39, 'stripe_live_site_key', 'ssdf6s5df6sd6f0f5405sdf4s5', NULL, '2026-05-26 15:30:43'),
(40, 'stripe_live_secret_key', 'f45sf50sd4f5sf45sdf4s5d0f4', NULL, '2026-05-26 15:30:43'),
(41, 'stripe_test_site_key', '50sfs6f56tr56t0rt6r', NULL, '2026-05-26 15:30:43'),
(42, 'stripe_test_secret_key', '065sf6s0f56sdf5r9e5', NULL, '2026-05-26 15:30:43'),
(43, 'content', 'Hello', NULL, '2026-05-26 15:30:43'),
(44, 'show_timer', 'Yes', NULL, '2026-05-26 15:30:43'),
(45, 'linkedin', 'linkedin', NULL, '2026-05-26 15:30:43'),
(46, 'm_logo', '1761895808_undermian.webp', NULL, NULL),
(47, 'admin_logo', '1761686938_websigntist.svg', NULL, NULL),
(48, 'maintenance_title', 'Website Under Maintenance', NULL, '2026-05-26 15:30:43'),
(49, 'site_currency', 'aed', NULL, '2026-03-17 13:12:45'),
(50, 'contact_form_email', 'info@mysaifco.com', NULL, '2026-05-26 15:30:43'),
(51, 'shop_currency', 'aed', NULL, '2026-05-26 15:30:43'),
(52, 'product_unit', 'kilogram', NULL, '2026-03-30 13:59:36'),
(53, 'measurment_unit', 'cm', NULL, '2026-05-26 15:30:43'),
(54, 'weight_unit', 'kg', NULL, '2026-05-26 15:30:43'),
(55, 'facebook_status', '1', NULL, '2026-05-26 15:30:43'),
(56, 'instagram_status', '0', NULL, '2026-05-26 15:30:43'),
(57, 'linkedin_status', '0', NULL, '2026-05-26 15:30:43'),
(58, 'youtube_status', '0', NULL, '2026-05-26 15:30:43'),
(59, 'twitter_status', '0', NULL, '2026-05-26 15:30:43'),
(60, 'tiktok_status', '0', NULL, '2026-05-26 15:30:43'),
(61, 'umrah_inquiry_whatsapp', '+971 55 663 7710', NULL, '2026-05-26 15:30:43'),
(62, 'tour_inquiry_whatsapp', '+971 50559 3840', NULL, '2026-05-26 15:30:43'),
(63, 'office_whatsapp', '+971 4 2733868', NULL, '2026-05-26 15:30:43'),
(64, 'footer_about_us', 'Saifco Travel & Tourism is a leading Dubai-based travel company offering Dubai tours, desert safari, yacht charters, holiday packages, Umrah services, and global visa assistance with trusted service and competitive prices.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

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
(2, 'Hero Banner', 'Best Dubai Tours, Desert Safari & Yacht Experience', NULL, 'Explore Desert Safari, luxury yacht tours & city experiences with trusted local experts. Best yacht prices in Dubai with instant booking & confirmation.', '#', 'Book Now', '1781366383_6a2d7e6fabd9d_image.webp', 'Active', 'Home', 1, 1, NULL, '2025-10-27 15:40:01', '2026-06-13 11:51:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_blocks`
--

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

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Default','Home','Blog','Tour') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default',
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

INSERT INTO `testimonials` (`id`, `name`, `designation`, `company`, `services`, `country`, `review`, `image`, `type`, `status`, `created_by`, `ordering`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Melissa Johnson', 'nil', 'nil', 'Desert Safari', 'UK', 'My trip to Dubai was amazing, and the desert safari with Saifco was the highlight! The team was friendly, knowledgeable, and made us feel so welcome.', NULL, 'Default', 'Active', 1, 3, '2025-10-29 14:11:10', '2026-05-24 18:44:54', NULL),
(4, 'Preety Zinta', 'nil', 'nil', 'Dubai City Tour', 'India', 'Very good service from start to end! I really recommend this company for anyone visiting Dubai — the experience was world-class.', NULL, 'Default', 'Active', 1, 2, '2025-11-19 15:12:50', '2026-05-24 18:44:06', NULL),
(5, 'Syed Hussain Hashmi', 'nil', 'nil', 'Umrah Traveler', 'Dubai', 'Saifco made our Umrah journey truly unforgettable. Every detail was handled with care and professionalism. Highly recommended.', NULL, 'Default', 'Active', 1, 1, '2025-12-09 13:35:27', '2026-05-24 18:44:22', NULL),
(6, 'Leonard Hobbs (Copy)', 'Nulla est quia et pl', 'Nelson and Watkins Inc', NULL, NULL, 'Neque quia ex minus', 'dup_69c2f0bad55f10.73402511.webp', 'Home', 'Active', 1, 92, '2026-03-24 15:14:50', '2026-03-24 15:14:59', '2026-03-24 15:14:59'),
(7, 'Fatima Zahra', 'nil', 'nil', 'Pilgrim', 'Pakistan', 'From airport transfers to hotel coordination, the team made our Umrah journey stress-free. Kind staff and reliable timing at every step.', NULL, 'Default', 'Active', 1, 4, '2026-05-24 18:45:22', '2026-05-24 18:45:22', NULL),
(8, 'Omar El-Sayed', 'nil', 'nil', 'Honeymoon', 'Egypt', 'The dhow cruise dinner exceeded expectations — great food, live music, and a magical view of the marina skyline. Worth every dirham.', NULL, 'Default', 'Active', 1, 5, '2026-05-24 18:45:50', '2026-05-24 18:46:02', NULL),
(9, 'Priya Natarajan', 'nil', 'nil', 'Solo Traveler', 'India', 'Responsive WhatsApp support and flexible rescheduling when our flight was delayed. That level of service is rare and deeply appreciated.', NULL, 'Default', 'Active', 1, 6, '2026-05-24 18:46:37', '2026-05-24 18:46:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_duration` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tour_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_persons` int NOT NULL DEFAULT '0',
  `min_age` int NOT NULL DEFAULT '0',
  `tour_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `red_tag_id` bigint UNSIGNED DEFAULT NULL,
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

INSERT INTO `tours` (`id`, `title`, `friendly_url`, `tour_duration`, `tour_location`, `max_persons`, `min_age`, `tour_type`, `red_tag_id`, `extra_options`, `description`, `itinerary`, `price`, `status`, `image`, `image_alt`, `image_title`, `ordering`, `created_by`, `deleted_at`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Abu Dhabi City Tour', 'abu-dhabi-city-tour', '6 hours', '', 50, 10, '\"[\\\"Dubai Tour\\\",\\\"Abu Dhabi Tour\\\",\\\"Dubai City Tours\\\"]\"', NULL, NULL, '<h2>Overview</h2>\r\n<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>\r\n<p>On the way to Abu Dhabi you will pass through an industrial area called Jebel Ali free zone. Once you reach Abu Dhabi&rsquo;s border you will see several stunning plantations all along the wayside and superb villages in the city. First stop will be at Sheikh Zayed Grand Mosque, the 3rd largest Mosque in the world and one of the best architectural landmarks of the capital. The mosque also features an exceptional collection of marble works and the largest carpet in the world designed by Iranian artists.</p>\r\n<p>You will see the Cultural Foundation, not far from it close walk to &lsquo;Qasr Al Hosn&rsquo; (meaning &lsquo;White Fort&rsquo;-The oldest stone building in the city). Continue the drive to admire the panoramic view of the Al Bateen District where the &lsquo;Presidential Palace&rsquo; is situated. A visit to Heritage Village will follow.</p>\r\n<p>Moving on to the next stop toward the breakwater and get a chance to capture the city&rsquo;s skyline and probably take a snack or lunch then drive ahead towards Abu Dhabi Corniche.</p>\r\n<p>On the way back to Dubai by pass through Abudhabi Yas Island and Formula-1 racing circuit on with a memorable memories.</p>\r\n<h3 data-start=\"170\" data-end=\"217\"><strong data-start=\"174\" data-end=\"217\">Cancellation, Amendment &amp; Refund Policy</strong></h3>\r\n<p data-start=\"219\" data-end=\"356\">We understand that plans can change, and we strive to be as flexible as possible. Please review our&nbsp;<a href=\"https://saif.local/travel-agency-terms-conditions/\">cancellation and refund policy</a>&nbsp;below:</p>\r\n<p data-start=\"360\" data-end=\"497\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/2705.svg\" alt=\"✅\">&nbsp;<strong data-start=\"362\" data-end=\"377\">100% refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"401\" data-end=\"421\">72 hours or more</strong>&nbsp;before the start time of the tour (excluding the 4% payment gateway fee).</p>\r\n<p data-start=\"500\" data-end=\"635\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/2705.svg\" alt=\"✅\" width=\"20\">&nbsp;<strong data-start=\"502\" data-end=\"516\">50% refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"540\" data-end=\"566\">between 48 to 72 hours</strong>&nbsp;before the tour start time (excluding the 4% payment gateway fee).</p>\r\n<p data-start=\"638\" data-end=\"735\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/274c.svg\" alt=\"❌\" width=\"20\">&nbsp;<strong data-start=\"640\" data-end=\"653\">No refund</strong>&nbsp;for cancellations made&nbsp;<strong data-start=\"677\" data-end=\"699\">less than 48 hours</strong>&nbsp;before the tour, or for no-shows.</p>\r\n<p data-start=\"738\" data-end=\"855\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/274c.svg\" alt=\"❌\" width=\"20\">&nbsp;Once a tour or service has started, or if any part of a package has been utilized,&nbsp;<strong data-start=\"823\" data-end=\"837\">no refunds</strong>&nbsp;will be provided.</p>\r\n<p data-start=\"857\" data-end=\"985\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/1f4b3.svg\" alt=\"💳\" width=\"20\">&nbsp;<strong data-start=\"860\" data-end=\"878\">Important Note</strong>: A&nbsp;<strong data-start=\"882\" data-end=\"908\">4% payment gateway fee</strong>&nbsp;applies to all online payments. This fee is&nbsp;<strong data-start=\"953\" data-end=\"971\">non-refundable</strong>&nbsp;in all cases.</p>\r\n<p data-start=\"987\" data-end=\"1201\"><img class=\"emoji\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/17.0.2/svg/1f501.svg\" alt=\"🔁\" width=\"20\">&nbsp;<strong data-start=\"990\" data-end=\"1008\">Refund Process</strong>: Any eligible refunds will be processed within&nbsp;<strong data-start=\"1056\" data-end=\"1074\">7 working days</strong> from the date of cancellation. The final refunded amount will depend on the above terms, minus the non-refundable gateway fee.</p>', '<p>test</p>', 150.00, 'active', '1773153639_image.webp', 'About Image', 'Hello', 4, 1, '2026-05-24 14:06:38', 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', '2026-03-10 09:40:39', '2026-05-24 14:06:38'),
(2, 'At Quo Et Tempor Dol', 'at-quo-et-tempor-dol', '7', '', 5, 3, '[\"Dubai Tour\",\"Abu Dhabi Tour\"]', NULL, NULL, '<p>test</p>', '<p>testtest</p>', 200.00, 'inactive', '1773178729_image.webp', 'Odio inventore nostr', 'Repellendus Volupta', 65, 1, '2026-03-10 16:40:10', 'At Quo Et Tempor Dol', 'Velit fuga Asperior', 'Qui officia distinct', '2026-03-10 16:38:49', '2026-03-10 16:40:10'),
(3, 'Aliqua Et Optio Qu', 'Sed mollit et cum au', '5', '', 5, 5, '\"[\\\"Dubai Tour\\\",\\\"Dubai City Tours\\\"]\"', NULL, NULL, '<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south.</p>', '<p>test</p>', 168.00, 'inactive', '1773179429_image.webp', 'Dolores dolores volu', 'Alias dolorem tempor', 23, 1, '2026-05-24 14:06:38', 'In aliqua Consequun', 'Laboris in perspicia', 'Laborum Labore quas', '2026-03-10 16:43:29', '2026-05-24 14:06:38'),
(4, 'Dubai: Royal Camel Race, Standard', 'dubai-royal-camel-race-standard', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 726.00, 'active', '1779649526_6a134bf6aecd5_image.webp', 'dubai royal camel race standard', 'Dubai Royal Camel Race Standard', 2, 1, NULL, 'Dubai Royal Camel Race Standard', 'Abu Dhabi City Tour', 'Abu Dhabi City Tour', '2026-03-11 16:39:16', '2026-05-29 15:34:31'),
(5, 'Desert Safari with 30 mins Quad', 'desert-safari-with-30-mins-quad', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 726.00, 'active', '1779649590_6a134c36d9dd1_image.webp', 'desert safari with 30 mins quad', 'Desert Safari With 30 Mins Quad', 3, 1, NULL, 'Desert Safari With 30 Mins Quad', NULL, NULL, '2026-03-11 16:39:16', '2026-05-29 15:33:31'),
(6, 'Dubai Desert Safari', 'dubai-desert-safari', '3 Days', 'Dubai', 10, 20, 'Desert Safari Tours', 1, NULL, '<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south. On the way to Abu Dhabi you will pass through an industrial area called Jebel Ali free zone. Once you reach Abu Dhabi&rsquo;s border you will see several stunning plantations all along the wayside and superb villages in the city. First stop will be at Sheikh Zayed Grand Mosque, the 3rd largest Mosque in the world and one of the best architectural landmarks of the capital. The mosque also features an exceptional collection of marble works and the largest carpet in the world designed by Iranian artists. Read More</p>', '<p>Marvel the beauty of the United Arab Emirates&rsquo; capital &ndash; Abu Dhabi .Also known as one of the riches cities in the middle east and world&rsquo;s largest producer of oil. House of the world&rsquo;s most expensive hotel is the famous Emirates Palace. This amazing tour starts with a pick up from your hotel, approximately 2 hours drive towards south. On the way to Abu Dhabi you will pass through an industrial area called Jebel Ali free zone. Once you reach Abu Dhabi&rsquo;s border you will see several stunning plantations all along the wayside and superb villages in the city. First stop will be at Sheikh Zayed Grand Mosque, the 3rd largest Mosque in the world and one of the best architectural landmarks of the capital. The mosque also features an exceptional collection of marble works and the largest carpet in the world designed by Iranian artists. Read More</p>', 150.00, 'active', '1779649444_6a134ba49ee73_image.webp', 'dubai desert safari', 'Dubai Desert Safari', 1, 1, NULL, 'Dubai Desert Safari', 'dubai, desert, tour, city tour', 'Marvel the beauty of the United Arab Emirates’ capital – Abu Dhabi .Also known as one of the riches cities in the middle east and world’s largest producer of oil.', '2026-03-13 13:10:43', '2026-06-13 14:04:42'),
(7, 'Shared Yacht Tour Dubai Marina', 'shared-yacht-tour-dubai-marina', '0', '', 0, 0, 'Yacht Charter Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779649725_6a134cbd956c1_image.webp', 'shared yacht tour dubai marina', 'Shared Yacht Tour Dubai Marina', 1, 1, NULL, 'Shared Yacht Tour Dubai Marina', NULL, NULL, '2026-05-24 14:08:45', '2026-05-29 15:24:38'),
(8, 'Private Luxury Yacht Cruising 36 Ft', 'private-luxury-yacht-cruising-36-ft', '0', '', 0, 0, 'Yacht Charter Tours', NULL, NULL, NULL, NULL, 726.00, 'active', '1779650866_6a1351324d576_image.webp', 'private luxury yacht cruising 36 ft', 'Private Luxury Yacht Cruising 36 Ft', 0, 1, NULL, 'Private Luxury Yacht Cruising 36 Ft', NULL, NULL, '2026-05-24 14:27:46', '2026-05-29 15:24:29'),
(9, 'Jet Ski rental Dubai', 'jet-ski-rental-dubai', '0', '', 0, 0, 'Yacht Charter Tours', NULL, NULL, NULL, NULL, 726.00, 'active', '1779653654_6a135c16d15e2_image.webp', 'jet ski rental dubai', 'Jet Ski Rental Dubai', 0, 1, NULL, 'Jet Ski Rental Dubai', NULL, NULL, '2026-05-24 15:14:14', '2026-05-29 15:24:19'),
(10, 'Dubai City Tour', 'dubai-city-tour', '0', '', 0, 0, 'Dubai City Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779653716_6a135c54ab4c1_image.webp', 'dubai city tour', 'Dubai City Tour', 0, 1, NULL, 'Dubai City Tour', NULL, NULL, '2026-05-24 15:15:16', '2026-05-29 15:19:58'),
(11, 'Dubai Trio City Tour, Desert Safari', 'dubai-trio-city-tour-desert-safari', '0', '', 0, 0, 'Dubai City Tours', NULL, NULL, NULL, NULL, 726.00, 'active', '1779653764_6a135c84d9440_image.webp', 'dubai trio city tour desert safari', 'Dubai Trio City Tour Desert Safari', 0, 1, NULL, 'Dubai Trio City Tour Desert Safari', NULL, NULL, '2026-05-24 15:16:04', '2026-05-29 15:19:54'),
(12, '4 Tours: Desert Safari, Dubai City', '4-tours-desert-safari-dubai-city', '0', '', 0, 0, 'Dubai City Tours', NULL, NULL, NULL, NULL, 726.00, 'active', '1779653843_6a135cd320f7d_image.webp', '4 tours desert safari dubai city', '4 Tours Desert Safari Dubai City', 0, 1, NULL, '4 Tours Desert Safari Dubai City', NULL, NULL, '2026-05-24 15:17:23', '2026-05-29 15:19:13'),
(13, 'Abu Dhabi City Tours', 'abu-dhabi-city-tours', '0', '', 0, 0, 'Abu Dhabi Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779653875_6a135cf31e96c_image.webp', 'abu dhabi city tours', 'Abu Dhabi City Tours', 0, 1, NULL, 'Abu Dhabi City Tours', NULL, NULL, '2026-05-24 15:17:55', '2026-05-29 15:21:34'),
(14, 'Abu Dhabi City Tour with Louvre', 'abu-dhabi-city-tour-with-louvre', '0', '', 0, 0, 'Abu Dhabi Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779653917_6a135d1d5c516_image.webp', 'abu dhabi city tour with louvre', 'Abu Dhabi City Tour With Louvre', 0, 1, NULL, 'Abu Dhabi City Tour With Louvre', NULL, NULL, '2026-05-24 15:18:37', '2026-05-29 15:21:40'),
(15, 'Abu Dhabi City Tour with Ferrari', 'abu-dhabi-city-tour-with-ferrari', '0', '', 0, 0, 'Abu Dhabi Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779653938_6a135d32c6793_image.webp', 'abu dhabi city tour with ferrari', 'Abu Dhabi City Tour With Ferrari', 0, 1, NULL, 'Abu Dhabi City Tour With Ferrari', NULL, NULL, '2026-05-24 15:18:58', '2026-05-29 15:21:46'),
(16, 'Dhow Cruise Dinner in Dubai Marina', 'dhow-cruise-dinner-in-dubai-marina', '0', '', 0, 0, 'Dhow Cruise Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779653986_6a135d625ad12_image.webp', 'dhow cruise dinner in dubai marina', 'Dhow Cruise Dinner In Dubai Marina', 0, 1, NULL, 'Dhow Cruise Dinner In Dubai Marina', NULL, NULL, '2026-05-24 15:19:46', '2026-05-29 15:33:24'),
(17, 'Musandam Dibba Day Cruise with', 'musandam-dibba-day-cruise-with', '0', '', 0, 0, 'Dhow Cruise Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654016_6a135d800622b_image.webp', 'musandam dibba day cruise with', 'Musandam Dibba Day Cruise With', 0, 1, NULL, 'Musandam Dibba Day Cruise With', NULL, NULL, '2026-05-24 15:20:16', '2026-05-29 15:33:14'),
(18, 'Dhow Cruise Dinner in Dubai Creek', 'dhow-cruise-dinner-in-dubai-creek', '0', '', 0, 0, 'Dhow Cruise Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654060_6a135dac52cd6_image.webp', 'dhow cruise dinner in dubai creek', 'Dhow Cruise Dinner In Dubai Creek', 0, 1, NULL, 'Dhow Cruise Dinner In Dubai Creek', NULL, NULL, '2026-05-24 15:21:00', '2026-05-29 15:32:58'),
(19, 'Dubai Trio Dubai City Tour, Desert', 'dubai-trio-dubai-city-tour-desert', '0', '', 0, 0, 'Dubai Combo Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654118_6a135de6bca71_image.webp', 'dubai trio dubai city tour desert', 'Dubai Trio Dubai City Tour Desert', 0, 1, NULL, 'Dubai Trio Dubai City Tour Desert', NULL, NULL, '2026-05-24 15:21:58', '2026-05-29 15:35:27'),
(20, '4 Tours Combo: Desert Safari, Dubai City', '4-tours-combo-desert-safari-dubai-city', '0', '', 0, 0, 'Dubai Combo Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654195_6a135e33e1e42_image.webp', '4 tours combo desert safari dubai city', '4 Tours Combo Desert Safari Dubai City', 0, 1, NULL, '4 Tours Combo Desert Safari Dubai City', NULL, NULL, '2026-05-24 15:23:15', '2026-05-29 15:26:19'),
(21, 'Combo 1: Dubai City Tour & Desert', 'combo-1-dubai-city-tour-desert', '0', '', 0, 0, 'Dubai Combo Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654225_6a135e51b0ea5_image.webp', 'combo 1 dubai city tour desert', 'Combo 1 Dubai City Tour Desert', 0, 1, NULL, 'Combo 1 Dubai City Tour Desert', NULL, NULL, '2026-05-24 15:23:45', '2026-05-29 15:30:08'),
(22, 'Water Jet Ski rental Dubai', 'water-jet-ski-rental-dubai', '0', '', 0, 0, 'Water Activities', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654290_6a135e92c233a_image.webp', 'water jet ski rental dubai', 'Water Jet Ski Rental Dubai', 0, 1, NULL, 'Water Jet Ski Rental Dubai', NULL, NULL, '2026-05-24 15:24:50', '2026-05-24 15:24:50'),
(23, 'Speed Water Boat Tour Dubai - 90 mins', 'speed-water-boat-tour-dubai-90-mins', '0', '', 0, 0, 'Water Activities', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654335_6a135ebf2796d_image.webp', 'speed water boat tour dubai 90 mins', 'Speed Water Boat Tour Dubai 90 Mins', 0, 1, NULL, 'Speed Water Boat Tour Dubai 90 Mins', NULL, NULL, '2026-05-24 15:25:35', '2026-05-24 15:25:35'),
(24, 'Deep Sea Fishing 4 hours Tour', 'deep-sea-fishing-4-hours-tour', '0', '', 0, 0, 'Water Activities', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654360_6a135ed89729b_image.webp', 'deep sea fishing 4 hours tour', 'Deep Sea Fishing 4 Hours Tour', 0, 1, NULL, 'Deep Sea Fishing 4 Hours Tour', NULL, NULL, '2026-05-24 15:26:00', '2026-05-24 15:26:00'),
(25, 'Hot Air Balloon Tour (6 Hours)', 'hot-air-balloon-tour-6-hours', '0', '', 0, 0, 'Theme Park Tickets', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654411_6a135f0b06008_image.webp', 'hot air balloon tour 6 hours', 'Hot Air Balloon Tour 6 Hours', 0, 1, NULL, 'Hot Air Balloon Tour 6 Hours', NULL, NULL, '2026-05-24 15:26:51', '2026-05-24 15:26:51'),
(26, 'Wonder Bus Tour', 'wonder-bus-tour', '0', '', 0, 0, 'Theme Park Tickets', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654429_6a135f1dbc533_image.webp', 'wonder bus tour', 'Wonder Bus Tour', 0, 1, NULL, 'Wonder Bus Tour', NULL, NULL, '2026-05-24 15:27:09', '2026-05-24 15:27:09'),
(27, 'Bollywood Parks™ Dubai', 'bollywood-parks-dubai', '0', '', 0, 0, 'Theme Park Tickets', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654449_6a135f314671b_image.webp', 'bollywood parks dubai', 'Bollywood Parks Dubai', 0, 1, NULL, 'Bollywood Parks Dubai', NULL, NULL, '2026-05-24 15:27:29', '2026-05-24 15:27:29'),
(28, 'Private Dubai Desert Safari with BBQ Dinner', 'private-dubai-desert-safari-with-bbq-dinner', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654738_6a1360529c27b_image.webp', 'private dubai desert safari with bbq dinner', 'Private Dubai Desert Safari With BBQ Dinner', 0, 1, NULL, 'Private Dubai Desert Safari With BBQ Dinner', NULL, NULL, '2026-05-24 15:32:18', '2026-05-29 15:26:11'),
(29, 'Morning Desert Safari', 'morning-desert-safari', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654822_6a1360a6d5afa_image.webp', 'morning desert safari', 'Morning Desert Safari', 0, 1, NULL, 'Morning Desert Safari', NULL, NULL, '2026-05-24 15:33:42', '2026-05-29 15:25:58'),
(30, 'Morning Desert Safari with 30 mins Quad Bike ride', 'morning-desert-safari-with-30-mins-quad-bike-ride', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654840_6a1360b89209b_image.webp', 'morning desert safari with 30 mins quad bike ride', 'Morning Desert Safari With 30 Mins Quad Bike Ride', 0, 1, NULL, 'Morning Desert Safari With 30 Mins Quad Bike Ride', NULL, NULL, '2026-05-24 15:34:00', '2026-05-29 15:25:52'),
(31, 'Dubai Trio ( Dubai City Tour, Desert Safari and Dhow Cruise D...', 'dubai-trio-dubai-city-tour-desert-safari-and-dhow-cruise-d', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654916_6a136104bef85_image.webp', 'dubai trio dubai city tour desert safari and dhow cruise d', 'Dubai Trio Dubai City Tour Desert Safari And Dhow Cruise D', 0, 1, NULL, 'Dubai Trio Dubai City Tour Desert Safari And Dhow Cruise D', NULL, NULL, '2026-05-24 15:35:16', '2026-05-29 15:25:49'),
(32, '4 Tours: Desert Safari, Dubai City Tour, Cruise Dinner & Abu Dhabi', '4-tours-desert-safari-dubai-city-tour-cruise-dinner-abu-dhabi', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654952_6a136128093c9_image.webp', '4 tours desert safari dubai city tour cruise dinner abu dhabi', '4 Tours Desert Safari Dubai City Tour Cruise Dinner Abu Dhabi', 0, 1, NULL, '4 Tours Desert Safari Dubai City Tour Cruise Dinner Abu Dhabi', NULL, NULL, '2026-05-24 15:35:52', '2026-05-29 15:25:43'),
(33, 'Dubai Desert Safari Pick-up from Shj, Ajman and Ras al Khaimah', 'dubai-desert-safari-pick-up-from-shj-ajman-and-ras-al-khaimah', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654979_6a136143577c3_image.webp', 'dubai desert safari pick up from shj ajman and ras al khaimah', 'Dubai Desert Safari Pick Up From Shj Ajman And Ras Al Khaimah', 0, 1, NULL, 'Dubai Desert Safari Pick Up From Shj Ajman And Ras Al Khaimah', NULL, NULL, '2026-05-24 15:36:19', '2026-05-29 15:25:37'),
(34, 'Combo 1 : Dubai City Tour and Desert Safari', 'combo-1-dubai-city-tour-and-desert-safari', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779654998_6a136156a0cf2_image.webp', 'combo 1 dubai city tour and desert safari', 'Combo 1 Dubai City Tour And Desert Safari', 0, 1, NULL, 'Combo 1 Dubai City Tour And Desert Safari', NULL, NULL, '2026-05-24 15:36:38', '2026-05-29 15:25:34'),
(35, 'Combo 3: Desert Safari and Dhow Cruise Dinner', 'combo-3-desert-safari-and-dhow-cruise-dinner', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779655014_6a136166191e8_image.webp', 'combo 3 desert safari and dhow cruise dinner', 'Combo 3 Desert Safari And Dhow Cruise Dinner', 0, 1, NULL, 'Combo 3 Desert Safari And Dhow Cruise Dinner', NULL, NULL, '2026-05-24 15:36:54', '2026-05-29 15:25:26'),
(36, 'Combo 4 : Desert Safari and Abu Dhabi City Tour', 'combo-4-desert-safari-and-abu-dhabi-city-tour', '0', '', 0, 0, 'Desert Safari Tours', NULL, NULL, NULL, NULL, 99.00, 'active', '1779655033_6a1361799a357_image.webp', 'combo 4 desert safari and abu dhabi city tour', 'Combo 4 Desert Safari And Abu Dhabi City Tour', 0, 1, NULL, 'Combo 4 Desert Safari And Abu Dhabi City Tour', NULL, NULL, '2026-05-24 15:37:13', '2026-05-29 15:25:23'),
(37, 'Combo 4 : Desert Safari and Abu Dhabi City Tour (Copy)', 'combo-4-desert-safari-and-abu-dhabi-city-tour-copy-2gjknq', '0', '', 0, 0, 'Desert Safari', NULL, NULL, NULL, NULL, 99.00, 'active', 'dup_6a136912e43ff9.26618470.webp', 'combo 4 desert safari and abu dhabi city tour', 'Combo 4 Desert Safari And Abu Dhabi City Tour', 0, 1, '2026-05-24 16:11:51', 'Combo 4 Desert Safari And Abu Dhabi City Tour', NULL, NULL, '2026-05-24 16:09:38', '2026-05-24 16:11:51'),
(38, 'Speed Boat Tour Dubai – 90 mins', 'speed-boat-tour-dubai-90-mins', '2 Days', 'Dubai', 10, 20, 'Yacht Charter Tours', NULL, NULL, NULL, NULL, 149.00, 'active', '1779665007_6a13886f2559d_image.webp', 'speed boat tour dubai 90 mins', 'Speed Boat Tour Dubai 90 Mins', 0, 1, NULL, 'Speed Boat Tour Dubai 90 Mins', NULL, NULL, '2026-05-24 18:23:27', '2026-06-13 14:00:47'),
(39, 'testtttttttttttttt', 'testtttttttttttttt', '0', '', 0, 0, 'Umrah Travel Agency', NULL, NULL, NULL, NULL, 149.00, 'active', 'dup_6a1a0ad295bb36.88740656.webp', 'testtttttttttttttt', 'Testtttttttttttttt', 0, 1, '2026-05-29 16:56:17', 'Testtttttttttttttt', NULL, NULL, '2026-05-29 16:53:22', '2026-05-29 16:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `tour_faq`
--

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
-- Table structure for table `tour_types`
--

CREATE TABLE `tour_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `view_all_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_types`
--

INSERT INTO `tour_types` (`id`, `title`, `friendly_url`, `short_description`, `description`, `image`, `image_alt`, `image_title`, `status`, `view_all_link`, `ordering`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Desert Safari Tours', 'desert-safari-tours', 'Book Desert Safari Dubai tours with dune bashing, camel rides, sandboarding, and BBQ dinner, including evening, morning, private, and VIP desert safari experiences.', '<p>Experience the best Desert Safari Dubai with thrilling dune bashing, camel rides, sandboarding, and BBQ dinner under the stars. Choose from evening desert safari, morning safari, private desert safari, and VIP desert camp experiences. Enjoy live entertainment including belly dance, Tanoura show, and fire show while exploring the golden dunes of Dubai. These desert safari tours offer a perfect mix of adventure, culture, and relaxation, making them one of the top things to do in Dubai for tourists and families.</p>', '1781375700_6a2da2d46738a_image.webp', 'desert-safari-tours', 'Desert Safari Tours', 'Active', NULL, 1, 'Desert Safari Tours', NULL, NULL, 1, NULL, '2026-05-23 17:09:22', '2026-06-13 13:35:00'),
(2, 'Yacht Charter Tours', 'yacht-charter-tours', 'Enjoy luxury yacht charter Dubai experiences with private yacht rental, Dubai Marina cruises, and views of Atlantis, Burj Al Arab, and JBR.', '<p>Enjoy luxury yacht charter Dubai with private yacht rental in Dubai Marina and Palm Jumeirah. Cruise past iconic landmarks like Atlantis, Burj Al Arab, and JBR while enjoying a premium experience with professional crew and modern facilities. Perfect for parties, family trips, and corporate events.</p>', '1781375711_6a2da2df502d9_image.webp', 'yacht-charter-tours', 'Yacht Charter Tours', 'Active', NULL, 2, 'Yacht Charter Tours', NULL, NULL, 1, NULL, '2026-05-23 17:24:24', '2026-06-13 13:35:11'),
(3, 'Dubai City Tours', 'dubai-city-tours', 'Discover Dubai city tours covering Burj Khalifa views, Dubai Frame, Jumeirah Mosque, and top attractions with guided sightseeing experiences.', '<p>Discover Dubai city tours covering iconic attractions like Burj Khalifa views, Dubai Frame, Jumeirah Mosque, Palm Jumeirah, and Dubai Marina. These guided tours offer a complete overview of modern and old Dubai with comfortable transport and expert insights. Ideal for first-time visitors, Dubai city tours provide a convenient way to explore city&rsquo;s highlights in short time.</p>', '1781375725_6a2da2edae3e1_image.webp', 'dubai-city-tours', 'Dubai City Tours', 'Active', NULL, 3, 'Dubai City Tours', NULL, NULL, 1, NULL, '2026-05-24 13:17:28', '2026-06-13 13:35:25'),
(4, 'Abu Dhabi Tours', 'abu-dhabi-tours', 'Explore Abu Dhabi tours with Sheikh Zayed Grand Mosque, Louvre Museum, city sightseeing, and full-day guided tours from Dubai.', '<p>Explore Abu Dhabi tours from Dubai and discover the UAE&rsquo;s capital with guided sightseeing experiences. Visit Sheikh Zayed Grand Mosque, Louvre Abu Dhabi, Emirates Palace, and Ferrari World Abu Dhabi. These full-day tours offer comfortable transport, expert guides, and a well-planned itinerary. Abu Dhabi tours are perfect for travellers looking to explore culture, architecture, and world-class attractions in one unforgettable day trip.</p>', '1781375739_6a2da2fbdeaa7_image.webp', 'abu-dhabi-tours', 'Abu Dhabi Tours', 'Active', NULL, 4, 'Abu Dhabi Tours', NULL, NULL, 1, NULL, '2026-05-24 13:18:02', '2026-06-13 13:35:39'),
(5, 'Dhow Cruise Tours', 'dhow-cruise-tours', 'Book dhow cruise Dubai with dinner, live entertainment, and scenic views of Dubai Marina or Creek for a relaxing evening experience.', '<p>Enjoy a relaxing dhow cruise Dubai experience with dinner, live entertainment, and stunning views of Dubai Marina or Dubai Creek. Cruise on a traditional wooden dhow while enjoying an international buffet dinner, Tanoura dance, and cultural performances. Dhow cruise tours are perfect for couples, families, and tourists looking for a peaceful and memorable evening in Dubai.</p>', '1781375790_6a2da32e33a93_image.webp', 'dhow-cruise-tours', 'Dhow Cruise Tours', 'Active', NULL, 8, 'Dhow Cruise Tours', NULL, NULL, 1, NULL, '2026-05-24 13:18:50', '2026-06-13 13:36:30'),
(6, 'Dubai Combo Tours', 'dubai-combo-tours', 'Save more with Dubai combo tours including desert safari, city tours, dhow cruise, and Abu Dhabi tours in one package.', '<p>Experience camel race Dubai tours and discover a unique part of Emirati culture. Visit camel racing tracks like Al Marmoom, watch live races, and learn about this traditional sport. These tours offer an authentic desert experience away from modern city attractions and are perfect for cultural exploration.</p>', '1781375751_6a2da3071b767_image.webp', 'dubai-combo-tours', 'Dubai Combo Tours', 'Active', NULL, 5, 'Dubai Combo Tours', NULL, NULL, 1, NULL, '2026-05-24 13:19:27', '2026-06-13 13:35:51'),
(7, 'Water Activities', 'water-activities', 'Experience Dubai water activities including jet ski, parasailing, flyboarding, banana rides, and exciting beach adventures across Dubai.', '<p>Explore the best Dubai water activities including jet ski, parasailing, flyboarding, banana boat rides, and speed boat tours along the city&rsquo;s stunning coastline. These exciting water sports are perfect for thrill seekers, families, and tourists looking for adventure in Dubai. Operated by certified professionals with safety equipment, Dubai water activities offer a fun, safe, and unforgettable experience at popular locations like JBR Beach and Dubai Marina.</p>', '1781375760_6a2da310055d1_image.webp', 'water activities', 'Water Activities', 'Active', NULL, 6, 'Water Activities', NULL, NULL, 1, NULL, '2026-05-24 13:20:00', '2026-06-13 13:36:00'),
(8, 'Theme Park Tickets', 'theme-park-tickets', 'Get theme park tickets for Dubai attractions including Ferrari World, IMG Worlds, Motiongate, and Aquaventure water park experiences.', '<p>Enjoy a relaxing dhow cruise Dubai experience with dinner, live entertainment, and stunning views of Dubai Marina or Dubai Creek. Cruise on a traditional wooden dhow while enjoying an international buffet dinner, Tanoura dance, and cultural performances. Dhow cruise tours are perfect for couples, families, and tourists looking for a peaceful and memorable evening in Dubai.</p>', '1781375770_6a2da31a00205_image.webp', 'theme park tickets', 'Theme Park Tickets', 'Active', NULL, 7, 'Theme Park Tickets', NULL, NULL, 1, NULL, '2026-05-24 13:20:33', '2026-06-13 13:36:10'),
(9, 'Home', 'home', NULL, NULL, NULL, 'home', 'Home', 'Inactive', NULL, 0, 'Home', NULL, NULL, 1, '2026-06-13 13:37:59', '2026-05-25 15:00:01', '2026-06-13 13:37:59'),
(10, 'Tour Categories', 'tour-categories', NULL, NULL, NULL, 'tour categories', 'Tour Categories', 'Inactive', NULL, 0, 'Tour Categories', NULL, NULL, 1, '2026-06-13 13:37:59', '2026-05-25 15:00:34', '2026-06-13 13:37:59'),
(11, 'Umrah', 'umrah', NULL, NULL, '1781375953_6a2da3d1a0f7a_image.webp', 'umrah', 'Umrah', 'Active', NULL, 0, 'Umrah', NULL, NULL, 1, NULL, '2026-05-25 15:18:16', '2026-06-13 13:39:13'),
(12, 'About Us', 'about-us', NULL, NULL, NULL, 'about-us', 'About Us', 'Inactive', NULL, 0, 'About Us', NULL, NULL, 1, '2026-06-13 13:37:59', '2026-05-27 15:13:46', '2026-06-13 13:37:59'),
(13, 'Contact Us', 'contact-us', NULL, NULL, NULL, 'contact-us', 'Contact Us', 'Inactive', NULL, 0, 'Contact Us', NULL, NULL, 1, '2026-06-13 13:37:59', '2026-05-27 15:30:47', '2026-06-13 13:37:59'),
(14, 'Umrah by Bus', 'umrah-by-bus', NULL, NULL, '1781375968_6a2da3e085020_image.webp', 'umrah-by-bus', 'Umrah By Bus', 'Active', NULL, 0, 'Umrah By Bus', NULL, NULL, 1, NULL, '2026-06-08 04:13:58', '2026-06-13 13:39:28'),
(15, 'Umrah for Single Lady', 'umrah-for-single-lady', NULL, NULL, '1781375982_6a2da3ee597b0_image.webp', 'umrah-for-single-lady', 'Umrah For Single Lady', 'Active', NULL, 0, 'Umrah For Single Lady', NULL, NULL, 1, NULL, '2026-06-12 12:08:49', '2026-06-13 13:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(1, 1, 'adnan', 'khan', 'websigntist@gmail.com', '1757108294_image_oXKwiH8xDJ.png', NULL, '+92300-9876542', '+922131234567', '1984-10-19', 'Karachi', '75160', 'Sindh', 'Home 123', 'Australia', '$2y$12$jah8qDomb5SR2UMtbeqoh.ZYZ41cFUbRNRtKeXUJAqdqsD5V1gVG6', 'Active', 'Male', 'YwTpWoa2qMrtHUXvYc5SIhSlbTWFBVK83EHDaRZidr9VliCqsPn5xJGYSIyb', 1, 1, '2025-01-22 10:05:55', '2026-03-11 12:57:37', NULL),
(2, 18, 'Sophia', 'Jan', 'adnan1@gmail.com', '1774467703_69c43a7720ee4_image.webp', NULL, '+92300-9876542', '+922131234567', '2025-11-15', 'Pariatur Aliquip et', '78583', 'Ducimus et totam al', 'Reiciendis at minim', 'Pakistan', '$2y$12$a5btXjxflcR0wbh6dGeccOPFILwT7dsKGp4odi5eAxWz2b5361muy', 'Active', 'Other', NULL, 1, 92, '2025-01-22 10:15:04', '2026-03-25 14:41:43', NULL),
(58, 10, 'Allan', 'Johson', 'adnan1+copy.elpyiq@gmail.com', 'dup_69c2e691c3f143.17426739.webp', NULL, '+92300-9876542', '+922131234567', '2025-11-15', 'Pariatur Aliquip et', '78583', 'Ducimus et totam al', 'Reiciendis at minim', 'Pakistan', '$2y$12$uD5KIBEp7aWr.PDIQCNuuOTF8B4wdlUqkDXmf6.m1pL4Llb/opKdG', 'Active', 'Other', NULL, 1, 92, '2026-03-24 14:31:30', '2026-03-24 14:31:59', '2026-03-24 14:31:59'),
(59, 18, 'Bevis', 'Howe', 'mycemu@mailinator.com', '1774468612_69c43e04b3a30_image.webp', NULL, '+1 (257) 545-3108', '+1 (418) 826-9222', '2026-02-12', NULL, NULL, NULL, 'Est vel sunt do in', 'United Arab Erimates', '$2y$12$g.f25KBh2xXr9HrkKtdKEObsNCjAxzsx45zpmoAGPgZCwh4GWd4Ou', 'Active', 'Male', NULL, 1, 65, '2026-03-25 14:56:53', '2026-03-25 14:56:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

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
-- Indexes for table `explores`
--
ALTER TABLE `explores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `explores_tour_type_id_foreign` (`tour_type_id`);

--
-- Indexes for table `explore_uaes`
--
ALTER TABLE `explore_uaes`
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
-- Indexes for table `popular_searches`
--
ALTER TABLE `popular_searches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `popular_searches_tour_type_id_foreign` (`tour_type_id`);

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
-- Indexes for table `red_tags`
--
ALTER TABLE `red_tags`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tour_types`
--
ALTER TABLE `tour_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_types_friendly_url_unique` (`friendly_url`);

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
-- AUTO_INCREMENT for table `explores`
--
ALTER TABLE `explores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `explore_uaes`
--
ALTER TABLE `explore_uaes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `popular_searches`
--
ALTER TABLE `popular_searches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `red_tags`
--
ALTER TABLE `red_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- AUTO_INCREMENT for table `tour_types`
--
ALTER TABLE `tour_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Constraints for table `explores`
--
ALTER TABLE `explores`
  ADD CONSTRAINT `explores_tour_type_id_foreign` FOREIGN KEY (`tour_type_id`) REFERENCES `tour_types` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `popular_searches`
--
ALTER TABLE `popular_searches`
  ADD CONSTRAINT `popular_searches_tour_type_id_foreign` FOREIGN KEY (`tour_type_id`) REFERENCES `tour_types` (`id`) ON DELETE SET NULL;

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
