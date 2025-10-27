-- Demo Database SQL Dump for Laravel Landing Page
-- Generated on: 2025-01-27
-- This file contains the complete database structure and demo data

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `landing_page_db`

-- --------------------------------------------------------
-- Table structure for table `cache`
-- --------------------------------------------------------

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `cache_locks`
-- --------------------------------------------------------

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `failed_jobs`
-- --------------------------------------------------------

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `jobs`
-- --------------------------------------------------------

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `job_batches`
-- --------------------------------------------------------

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `landing_page_sections`
-- --------------------------------------------------------

CREATE TABLE `landing_page_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `settings` json DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `migrations`
-- --------------------------------------------------------

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- --------------------------------------------------------

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `personal_access_tokens`
-- --------------------------------------------------------

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `sessions`
-- --------------------------------------------------------

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `site_settings`
-- --------------------------------------------------------

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `migrations`
-- --------------------------------------------------------

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_27_191307_create_personal_access_tokens_table', 1),
(5, '2025_07_27_191309_create_landing_page_sections_table', 1),
(6, '2025_07_27_191311_create_site_settings_table', 1);

-- --------------------------------------------------------
-- Dumping data for table `users`
-- --------------------------------------------------------

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NOW(), NOW());

-- --------------------------------------------------------
-- Dumping data for table `landing_page_sections`
-- --------------------------------------------------------

INSERT INTO `landing_page_sections` (`id`, `name`, `type`, `title`, `subtitle`, `content`, `settings`, `background_image`, `background_color`, `text_color`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Hero Section', 'hero', 'Welcome to Our Amazing Landing Page', 'Build beautiful, responsive landing pages with our powerful admin panel', '<p>Create stunning landing pages that convert visitors into customers. Our admin panel gives you complete control over every aspect of your page design and content.</p>', NULL, NULL, '#3B82F6', '#FFFFFF', 1, 1, NOW(), NOW()),
(2, 'About Us', 'about', 'About Our Company', 'We are passionate about creating amazing digital experiences', '<p>Our team of experts has been crafting digital solutions for over a decade. We believe in the power of great design and user experience to transform businesses and drive growth.</p><p>Whether you\'re a startup looking to make your mark or an established company seeking to modernize your online presence, we have the tools and expertise to help you succeed.</p>', NULL, NULL, '#F9FAFB', '#1F2937', 1, 2, NOW(), NOW()),
(3, 'Our Services', 'services', 'What We Offer', 'Comprehensive solutions for all your digital needs', '<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8"><div class="text-center"><h4 class="font-semibold mb-2">Web Development</h4><p>Custom websites built with modern technologies</p></div><div class="text-center"><h4 class="font-semibold mb-2">UI/UX Design</h4><p>Beautiful, user-friendly interfaces that convert</p></div><div class="text-center"><h4 class="font-semibold mb-2">Digital Marketing</h4><p>Strategies to grow your online presence</p></div></div>', NULL, NULL, '#10B981', '#FFFFFF', 1, 3, NOW(), NOW()),
(4, 'Features', 'features', 'Powerful Features', 'Everything you need to create an amazing landing page', '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8"><div class="text-center p-6 bg-white bg-opacity-10 rounded-lg"><h4 class="font-semibold mb-2">Easy to Use</h4><p>Intuitive admin panel with drag-and-drop functionality</p></div><div class="text-center p-6 bg-white bg-opacity-10 rounded-lg"><h4 class="font-semibold mb-2">Fully Responsive</h4><p>Looks great on all devices and screen sizes</p></div><div class="text-center p-6 bg-white bg-opacity-10 rounded-lg"><h4 class="font-semibold mb-2">Customizable</h4><p>Change colors, fonts, and layouts to match your brand</p></div></div>', NULL, NULL, '#8B5CF6', '#FFFFFF', 1, 4, NOW(), NOW()),
(5, 'Contact Us', 'contact', 'Get In Touch', 'Ready to start your project? Let\'s talk!', '<div class="text-center mt-8"><p class="mb-4">Have questions? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.</p><div class="flex justify-center space-x-8"><div><h5 class="font-semibold">Email</h5><p>hello@example.com</p></div><div><h5 class="font-semibold">Phone</h5><p>+1 (555) 123-4567</p></div></div></div>', NULL, NULL, '#EF4444', '#FFFFFF', 1, 5, NOW(), NOW());

-- --------------------------------------------------------
-- Dumping data for table `site_settings`
-- --------------------------------------------------------

INSERT INTO `site_settings` (`id`, `key`, `value`, `type`, `group`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 'primary_color', '#3B82F6', 'color', 'theme', 'Primary Color', 'Main brand color used throughout the site', NOW(), NOW()),
(2, 'secondary_color', '#EF4444', 'color', 'theme', 'Secondary Color', 'Secondary accent color', NOW(), NOW()),
(3, 'accent_color', '#10B981', 'color', 'theme', 'Accent Color', 'Accent color for highlights and CTAs', NOW(), NOW()),
(4, 'text_color', '#1F2937', 'color', 'theme', 'Text Color', 'Default text color', NOW(), NOW()),
(5, 'background_color', '#FFFFFF', 'color', 'theme', 'Background Color', 'Default background color', NOW(), NOW()),
(6, 'site_title', 'Amazing Landing Page', 'text', 'general', 'Site Title', 'The title of your website', NOW(), NOW()),
(7, 'site_description', 'Create beautiful, converting landing pages with our powerful admin panel', 'text', 'general', 'Site Description', 'Brief description of your website', NOW(), NOW()),
(8, 'contact_email', 'hello@example.com', 'text', 'general', 'Contact Email', 'Primary contact email address', NOW(), NOW()),
(9, 'phone_number', '+1 (555) 123-4567', 'text', 'general', 'Phone Number', 'Primary contact phone number', NOW(), NOW()),
(10, 'company_address', '123 Business Street, City, State 12345', 'text', 'general', 'Company Address', 'Physical business address', NOW(), NOW()),
(11, 'facebook_url', 'https://facebook.com/yourpage', 'text', 'social', 'Facebook URL', 'Link to your Facebook page', NOW(), NOW()),
(12, 'twitter_url', 'https://twitter.com/yourhandle', 'text', 'social', 'Twitter URL', 'Link to your Twitter profile', NOW(), NOW()),
(13, 'instagram_url', 'https://instagram.com/yourhandle', 'text', 'social', 'Instagram URL', 'Link to your Instagram profile', NOW(), NOW()),
(14, 'linkedin_url', 'https://linkedin.com/company/yourcompany', 'text', 'social', 'LinkedIn URL', 'Link to your LinkedIn page', NOW(), NOW()),
(15, 'youtube_url', '', 'text', 'social', 'YouTube URL', 'Link to your YouTube channel', NOW(), NOW()),
(16, 'meta_title', 'Amazing Landing Page - Create Beautiful Pages', 'text', 'seo', 'Meta Title', 'SEO title for search engines', NOW(), NOW()),
(17, 'meta_description', 'Build stunning, converting landing pages with our easy-to-use admin panel. Customize every aspect of your page design.', 'text', 'seo', 'Meta Description', 'SEO description for search engines', NOW(), NOW()),
(18, 'meta_keywords', 'landing page, website builder, admin panel, responsive design', 'text', 'seo', 'Meta Keywords', 'SEO keywords (comma-separated)', NOW(), NOW()),
(19, 'google_analytics_id', '', 'text', 'seo', 'Google Analytics ID', 'Google Analytics tracking ID', NOW(), NOW());

-- --------------------------------------------------------
-- Auto-increment values for dumped tables
-- --------------------------------------------------------

ALTER TABLE `failed_jobs` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `jobs` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `landing_page_sections` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `migrations` MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `personal_access_tokens` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `site_settings` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
ALTER TABLE `users` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

COMMIT;

-- --------------------------------------------------------
-- DEMO LOGIN CREDENTIALS
-- --------------------------------------------------------
-- Admin Panel Login:
-- Email: admin@example.com
-- Password: password
-- 
-- Admin Panel URL: https://yourdomain.com/admin/login
-- Landing Page URL: https://yourdomain.com
-- 
-- Note: The password hash in this SQL file corresponds to 'password'
-- You can change the password after importing by using the admin panel
-- or by running: php artisan tinker and User::find(1)->update(['password' => Hash::make('newpassword')])
-- --------------------------------------------------------