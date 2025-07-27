<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LandingPageSection;
use App\Models\SiteSettings;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        // Create landing page sections
        $sections = [
            [
                'name' => 'Hero Section',
                'type' => 'hero',
                'title' => 'Welcome to Our Amazing Landing Page',
                'subtitle' => 'Build beautiful, responsive landing pages with our powerful admin panel',
                'content' => '<p>Create stunning landing pages that convert visitors into customers. Our admin panel gives you complete control over every aspect of your page design and content.</p>',
                'background_color' => '#3B82F6',
                'text_color' => '#FFFFFF',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'About Us',
                'type' => 'about',
                'title' => 'About Our Company',
                'subtitle' => 'We are passionate about creating amazing digital experiences',
                'content' => '<p>Our team of experts has been crafting digital solutions for over a decade. We believe in the power of great design and user experience to transform businesses and drive growth.</p><p>Whether you\'re a startup looking to make your mark or an established company seeking to modernize your online presence, we have the tools and expertise to help you succeed.</p>',
                'background_color' => '#F9FAFB',
                'text_color' => '#1F2937',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Our Services',
                'type' => 'services',
                'title' => 'What We Offer',
                'subtitle' => 'Comprehensive solutions for all your digital needs',
                'content' => '<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8"><div class="text-center"><h4 class="font-semibold mb-2">Web Development</h4><p>Custom websites built with modern technologies</p></div><div class="text-center"><h4 class="font-semibold mb-2">UI/UX Design</h4><p>Beautiful, user-friendly interfaces that convert</p></div><div class="text-center"><h4 class="font-semibold mb-2">Digital Marketing</h4><p>Strategies to grow your online presence</p></div></div>',
                'background_color' => '#10B981',
                'text_color' => '#FFFFFF',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Features',
                'type' => 'features',
                'title' => 'Powerful Features',
                'subtitle' => 'Everything you need to create an amazing landing page',
                'content' => '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8"><div class="text-center p-6 bg-white bg-opacity-10 rounded-lg"><h4 class="font-semibold mb-2">Easy to Use</h4><p>Intuitive admin panel with drag-and-drop functionality</p></div><div class="text-center p-6 bg-white bg-opacity-10 rounded-lg"><h4 class="font-semibold mb-2">Fully Responsive</h4><p>Looks great on all devices and screen sizes</p></div><div class="text-center p-6 bg-white bg-opacity-10 rounded-lg"><h4 class="font-semibold mb-2">Customizable</h4><p>Change colors, fonts, and layouts to match your brand</p></div></div>',
                'background_color' => '#8B5CF6',
                'text_color' => '#FFFFFF',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Contact Us',
                'type' => 'contact',
                'title' => 'Get In Touch',
                'subtitle' => 'Ready to start your project? Let\'s talk!',
                'content' => '<div class="text-center mt-8"><p class="mb-4">Have questions? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.</p><div class="flex justify-center space-x-8"><div><h5 class="font-semibold">Email</h5><p>hello@example.com</p></div><div><h5 class="font-semibold">Phone</h5><p>+1 (555) 123-4567</p></div></div></div>',
                'background_color' => '#EF4444',
                'text_color' => '#FFFFFF',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($sections as $section) {
            LandingPageSection::firstOrCreate(
                ['name' => $section['name']],
                $section
            );
        }

        // Create site settings
        $settings = [
            // Theme Settings
            ['key' => 'primary_color', 'value' => '#3B82F6', 'type' => 'color', 'group' => 'theme', 'label' => 'Primary Color', 'description' => 'Main brand color used throughout the site'],
            ['key' => 'secondary_color', 'value' => '#EF4444', 'type' => 'color', 'group' => 'theme', 'label' => 'Secondary Color', 'description' => 'Secondary accent color'],
            ['key' => 'accent_color', 'value' => '#10B981', 'type' => 'color', 'group' => 'theme', 'label' => 'Accent Color', 'description' => 'Accent color for highlights and CTAs'],
            ['key' => 'text_color', 'value' => '#1F2937', 'type' => 'color', 'group' => 'theme', 'label' => 'Text Color', 'description' => 'Default text color'],
            ['key' => 'background_color', 'value' => '#FFFFFF', 'type' => 'color', 'group' => 'theme', 'label' => 'Background Color', 'description' => 'Default background color'],
            
            // General Settings
            ['key' => 'site_title', 'value' => 'Amazing Landing Page', 'type' => 'text', 'group' => 'general', 'label' => 'Site Title', 'description' => 'The title of your website'],
            ['key' => 'site_description', 'value' => 'Create beautiful, converting landing pages with our powerful admin panel', 'type' => 'text', 'group' => 'general', 'label' => 'Site Description', 'description' => 'Brief description of your website'],
            ['key' => 'contact_email', 'value' => 'hello@example.com', 'type' => 'text', 'group' => 'general', 'label' => 'Contact Email', 'description' => 'Primary contact email address'],
            ['key' => 'phone_number', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'group' => 'general', 'label' => 'Phone Number', 'description' => 'Primary contact phone number'],
            ['key' => 'company_address', 'value' => '123 Business Street, City, State 12345', 'type' => 'text', 'group' => 'general', 'label' => 'Company Address', 'description' => 'Physical business address'],
            
            // Social Media
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/yourpage', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL', 'description' => 'Link to your Facebook page'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/yourhandle', 'type' => 'text', 'group' => 'social', 'label' => 'Twitter URL', 'description' => 'Link to your Twitter profile'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/yourhandle', 'type' => 'text', 'group' => 'social', 'label' => 'Instagram URL', 'description' => 'Link to your Instagram profile'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/yourcompany', 'type' => 'text', 'group' => 'social', 'label' => 'LinkedIn URL', 'description' => 'Link to your LinkedIn page'],
            ['key' => 'youtube_url', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'YouTube URL', 'description' => 'Link to your YouTube channel'],
            
            // SEO Settings
            ['key' => 'meta_title', 'value' => 'Amazing Landing Page - Create Beautiful Pages', 'type' => 'text', 'group' => 'seo', 'label' => 'Meta Title', 'description' => 'SEO title for search engines'],
            ['key' => 'meta_description', 'value' => 'Build stunning, converting landing pages with our easy-to-use admin panel. Customize every aspect of your page design.', 'type' => 'text', 'group' => 'seo', 'label' => 'Meta Description', 'description' => 'SEO description for search engines'],
            ['key' => 'meta_keywords', 'value' => 'landing page, website builder, admin panel, responsive design', 'type' => 'text', 'group' => 'seo', 'label' => 'Meta Keywords', 'description' => 'SEO keywords (comma-separated)'],
            ['key' => 'google_analytics_id', 'value' => '', 'type' => 'text', 'group' => 'seo', 'label' => 'Google Analytics ID', 'description' => 'Google Analytics tracking ID'],
        ];

        foreach ($settings as $setting) {
            SiteSettings::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
