<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSettings::all()->groupBy('group');

        return response()->json([
            'success' => true,
            'settings' => $settings
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:site_settings,key',
            'value' => 'nullable|string',
            'type' => 'required|string|in:text,color,image,json,boolean',
            'group' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        $setting = SiteSettings::create($request->all());

        return response()->json([
            'success' => true,
            'setting' => $setting,
            'message' => 'Setting created successfully'
        ], 201);
    }

    public function update(Request $request, SiteSettings $setting)
    {
        $request->validate([
            'value' => 'nullable|string',
            'type' => 'string|in:text,color,image,json,boolean',
            'group' => 'string|max:255',
            'label' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        $setting->update($request->all());

        return response()->json([
            'success' => true,
            'setting' => $setting->fresh(),
            'message' => 'Setting updated successfully'
        ]);
    }

    public function destroy(SiteSettings $setting)
    {
        $setting->delete();

        return response()->json([
            'success' => true,
            'message' => 'Setting deleted successfully'
        ]);
    }

    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string'
        ]);

        foreach ($request->settings as $settingData) {
            SiteSettings::where('key', $settingData['key'])
                ->update(['value' => $settingData['value']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Settings updated successfully'
        ]);
    }

    public function getByGroup($group)
    {
        $settings = SiteSettings::where('group', $group)->get();

        return response()->json([
            'success' => true,
            'settings' => $settings
        ]);
    }

    public function initializeDefaultSettings()
    {
        $defaults = [
            // Theme Settings
            ['key' => 'primary_color', 'value' => '#3B82F6', 'type' => 'color', 'group' => 'theme', 'label' => 'Primary Color'],
            ['key' => 'secondary_color', 'value' => '#EF4444', 'type' => 'color', 'group' => 'theme', 'label' => 'Secondary Color'],
            ['key' => 'accent_color', 'value' => '#10B981', 'type' => 'color', 'group' => 'theme', 'label' => 'Accent Color'],
            ['key' => 'text_color', 'value' => '#1F2937', 'type' => 'color', 'group' => 'theme', 'label' => 'Text Color'],
            ['key' => 'background_color', 'value' => '#FFFFFF', 'type' => 'color', 'group' => 'theme', 'label' => 'Background Color'],
            
            // General Settings
            ['key' => 'site_title', 'value' => 'My Landing Page', 'type' => 'text', 'group' => 'general', 'label' => 'Site Title'],
            ['key' => 'site_description', 'value' => 'Welcome to our amazing landing page', 'type' => 'text', 'group' => 'general', 'label' => 'Site Description'],
            ['key' => 'contact_email', 'value' => 'contact@example.com', 'type' => 'text', 'group' => 'general', 'label' => 'Contact Email'],
            ['key' => 'phone_number', 'value' => '+1234567890', 'type' => 'text', 'group' => 'general', 'label' => 'Phone Number'],
            
            // Social Media
            ['key' => 'facebook_url', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL'],
            ['key' => 'twitter_url', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'Twitter URL'],
            ['key' => 'instagram_url', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'Instagram URL'],
            ['key' => 'linkedin_url', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'LinkedIn URL'],
        ];

        foreach ($defaults as $default) {
            SiteSettings::firstOrCreate(
                ['key' => $default['key']],
                $default
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Default settings initialized successfully'
        ]);
    }
}
