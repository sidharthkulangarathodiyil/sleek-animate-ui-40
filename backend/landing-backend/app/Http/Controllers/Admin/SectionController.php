<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPageSection;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = LandingPageSection::ordered()->get();

        return response()->json([
            'success' => true,
            'sections' => $sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'settings' => 'nullable|array',
            'background_image' => 'nullable|string',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $section = LandingPageSection::create($request->all());

        return response()->json([
            'success' => true,
            'section' => $section,
            'message' => 'Section created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LandingPageSection $section)
    {
        return response()->json([
            'success' => true,
            'section' => $section
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandingPageSection $section)
    {
        $request->validate([
            'name' => 'string|max:255',
            'type' => 'string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'settings' => 'nullable|array',
            'background_image' => 'nullable|string',
            'background_color' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $section->update($request->all());

        return response()->json([
            'success' => true,
            'section' => $section->fresh(),
            'message' => 'Section updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandingPageSection $section)
    {
        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'Section deleted successfully'
        ]);
    }

    /**
     * Update sections order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'sections' => 'required|array',
            'sections.*.id' => 'required|integer|exists:landing_page_sections,id',
            'sections.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->sections as $sectionData) {
            LandingPageSection::where('id', $sectionData['id'])
                ->update(['sort_order' => $sectionData['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Section order updated successfully'
        ]);
    }
}
