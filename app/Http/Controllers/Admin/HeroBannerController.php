<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroBanner;
use Illuminate\Http\Request;

class HeroBannerController extends Controller
{
    public function index()
    {
        $banners = HeroBanner::orderBy('display_order')->get();
        return view('Admin.HeroBanner.index', compact('banners'));
    }

    public function create()
    {
        return view('Admin.HeroBanner.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $validatedData['subtitle'] = $request->subtitle;
        $validatedData['description'] = $request->description;
        $validatedData['button_text'] = $request->button_text;
        $validatedData['button_url'] = $request->button_url;
        $validatedData['overlay_color'] = $request->overlay_color ?? '#000000';
        $validatedData['overlay_opacity'] = $request->overlay_opacity ?? 50;
        $validatedData['text_position'] = $request->text_position ?? 'center';
        $validatedData['text_color'] = $request->text_color ?? '#ffffff';
        $validatedData['button_color'] = $request->button_color ?? '#007bff';
        $validatedData['button_text_color'] = $request->button_text_color ?? '#ffffff';
        $validatedData['enable_dark_overlay'] = $request->has('enable_dark_overlay');
        $validatedData['enable_gradient'] = $request->has('enable_gradient');
        $validatedData['banner_height'] = $request->banner_height ?? 'large';
        $validatedData['display_order'] = $request->display_order ?? 0;
        $validatedData['status'] = $request->has('status');
        $validatedData['start_date'] = $request->start_date;
        $validatedData['end_date'] = $request->end_date;

        if ($request->hasFile('desktop_image')) {
            $validatedData['desktop_image'] = $request->file('desktop_image')->store('hero-banners/desktop', 'public');
        }

        if ($request->hasFile('mobile_image')) {
            $validatedData['mobile_image'] = $request->file('mobile_image')->store('hero-banners/mobile', 'public');
        }

        HeroBanner::create($validatedData);

        return redirect()->route('admin.hero-banner.index')->with('success', 'Hero banner created successfully.');
    }

    public function edit(HeroBanner $heroBanner)
    {
        return view('Admin.HeroBanner.edit', compact('heroBanner'));
    }

    public function update(Request $request, HeroBanner $heroBanner)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $validatedData['subtitle'] = $request->subtitle;
        $validatedData['description'] = $request->description;
        $validatedData['button_text'] = $request->button_text;
        $validatedData['button_url'] = $request->button_url;
        $validatedData['overlay_color'] = $request->overlay_color ?? '#000000';
        $validatedData['overlay_opacity'] = $request->overlay_opacity ?? 50;
        $validatedData['text_position'] = $request->text_position ?? 'center';
        $validatedData['text_color'] = $request->text_color ?? '#ffffff';
        $validatedData['button_color'] = $request->button_color ?? '#007bff';
        $validatedData['button_text_color'] = $request->button_text_color ?? '#ffffff';
        $validatedData['enable_dark_overlay'] = $request->has('enable_dark_overlay');
        $validatedData['enable_gradient'] = $request->has('enable_gradient');
        $validatedData['banner_height'] = $request->banner_height ?? 'large';
        $validatedData['display_order'] = $request->display_order ?? 0;
        $validatedData['status'] = $request->has('status');
        $validatedData['start_date'] = $request->start_date;
        $validatedData['end_date'] = $request->end_date;

        if ($request->hasFile('desktop_image')) {
            $validatedData['desktop_image'] = $request->file('desktop_image')->store('hero-banners/desktop', 'public');
        }

        if ($request->hasFile('mobile_image')) {
            $validatedData['mobile_image'] = $request->file('mobile_image')->store('hero-banners/mobile', 'public');
        }

        $heroBanner->update($validatedData);

        return redirect()->route('admin.hero-banner.index')->with('success', 'Hero banner updated successfully.');
    }

    public function destroy(HeroBanner $heroBanner)
    {
        try {
            $heroBanner->delete();
            return response()->json(['status' => 200, 'message' => 'Hero banner deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete hero banner'], 404);
        }
    }

    public function reorder(Request $request)
    {
        $bannerIds = $request->input('banner_ids');
        
        foreach ($bannerIds as $index => $bannerId) {
            HeroBanner::where('id', $bannerId)->update(['display_order' => $index]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Banners reordered successfully'
        ]);
    }
}
