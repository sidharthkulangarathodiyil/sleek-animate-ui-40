<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPageSection;
use App\Models\SiteSettings;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_sections' => LandingPageSection::count(),
            'active_sections' => LandingPageSection::where('is_active', true)->count(),
            'total_settings' => SiteSettings::count(),
            'total_users' => User::count(),
        ];

        $recentSections = LandingPageSection::latest()
            ->take(5)
            ->get(['id', 'name', 'type', 'is_active', 'created_at']);

        return response()->json([
            'success' => true,
            'stats' => $stats,
            'recent_sections' => $recentSections
        ]);
    }

    public function overview()
    {
        $sections = LandingPageSection::select('id', 'name', 'type', 'is_active', 'sort_order')
            ->ordered()
            ->get();

        $settingsGroups = SiteSettings::select('group')
            ->distinct()
            ->pluck('group');

        return response()->json([
            'success' => true,
            'data' => [
                'sections' => $sections,
                'settings_groups' => $settingsGroups
            ]
        ]);
    }
}
