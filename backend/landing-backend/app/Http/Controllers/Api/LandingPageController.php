<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingPageSection;
use App\Models\SiteSettings;

class LandingPageController extends Controller
{
    public function getSections()
    {
        $sections = LandingPageSection::active()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'sections' => $sections
        ]);
    }

    public function getSettings()
    {
        $settings = SiteSettings::all()->groupBy('group');

        return response()->json([
            'success' => true,
            'settings' => $settings
        ]);
    }

    public function getFullPage()
    {
        $sections = LandingPageSection::active()
            ->ordered()
            ->get();

        $settings = SiteSettings::all()->groupBy('group');

        return response()->json([
            'success' => true,
            'data' => [
                'sections' => $sections,
                'settings' => $settings
            ]
        ]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you could save to database, send email, etc.
        // For now, we'll just return success

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message. We will get back to you soon!'
        ]);
    }
}
