<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_id' => 'required|exists:pages,id',
            'section_type' => 'required',
            'title' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'video_url' => 'nullable|url',
            'button_text' => 'nullable',
            'button_link' => 'nullable|url',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'items' => 'nullable|array',
            'sort_order' => 'nullable|integer'
        ]);

        $validatedData['sort_order'] = $validatedData['sort_order'] ?? 0;

        // Handle image uploads
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('sections', 'public');
        }

        if ($request->hasFile('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('sections', 'public');
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            $validatedData['file'] = $request->file('file')->store('sections/files', 'public');
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            $galleryImages = [];
            foreach ($request->file('gallery') as $image) {
                $galleryImages[] = $image->store('sections/gallery', 'public');
            }
            $validatedData['gallery'] = $galleryImages;
        }

        // Handle items (for lists, FAQs, accordions)
        if (isset($validatedData['items'])) {
            $validatedData['items'] = json_encode($validatedData['items']);
        }

        $section = PageSection::create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Section added successfully',
            'section' => $section
        ]);
    }

    public function update(Request $request, PageSection $section)
    {
        $validatedData = $request->validate([
            'section_type' => 'required',
            'title' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'video_url' => 'nullable|url',
            'button_text' => 'nullable',
            'button_link' => 'nullable|url',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'items' => 'nullable|array',
            'sort_order' => 'nullable|integer'
        ]);

        // Handle image uploads
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('sections', 'public');
        }

        if ($request->hasFile('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('sections', 'public');
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            $validatedData['file'] = $request->file('file')->store('sections/files', 'public');
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            $galleryImages = [];
            foreach ($request->file('gallery') as $image) {
                $galleryImages[] = $image->store('sections/gallery', 'public');
            }
            $validatedData['gallery'] = $galleryImages;
        }

        // Handle items
        if (isset($validatedData['items'])) {
            $validatedData['items'] = json_encode($validatedData['items']);
        }

        $section->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Section updated successfully'
        ]);
    }

    public function destroy(PageSection $section)
    {
        try {
            $section->delete();
            return response()->json(['status' => 200, 'message' => 'Section deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete section'], 404);
        }
    }

    public function duplicate(PageSection $section)
    {
        $newSection = $section->replicate();
        $newSection->sort_order = $section->sort_order + 1;
        $newSection->save();

        return response()->json([
            'status' => 200,
            'message' => 'Section duplicated successfully',
            'section' => $newSection
        ]);
    }

    public function reorder(Request $request)
    {
        $sectionIds = $request->input('section_ids');
        
        foreach ($sectionIds as $index => $sectionId) {
            PageSection::where('id', $sectionId)->update(['sort_order' => $index]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Sections reordered successfully'
        ]);
    }
}
