<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageFaq;
use App\Models\Page;
use Illuminate\Http\Request;

class PageFaqController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_id' => 'required|exists:pages,id',
            'question' => 'required',
            'answer' => 'required',
            'order_no' => 'nullable|integer'
        ]);

        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;

        $faq = PageFaq::create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'FAQ added successfully',
            'faq' => $faq
        ]);
    }

    public function update(Request $request, PageFaq $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'order_no' => 'nullable|integer'
        ]);

        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;

        $faq->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'FAQ updated successfully'
        ]);
    }

    public function destroy(PageFaq $faq)
    {
        try {
            $faq->delete();
            return response()->json(['status' => 200, 'message' => 'FAQ deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete FAQ'], 404);
        }
    }
}
