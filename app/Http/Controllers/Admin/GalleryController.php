<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_id' => 'required|exists:pages,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'order_no' => 'nullable|integer'
        ]);

        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery = Gallery::create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Gallery image added successfully',
            'image' => $gallery
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'order_no' => 'nullable|integer'
        ]);

        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;

        $gallery->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Gallery image updated successfully'
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        try {
            $gallery->delete();
            return response()->json(['status' => 200, 'message' => 'Gallery image deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete gallery image'], 404);
        }
    }
}
