<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaSuccessStory;
use Illuminate\Http\Request;

class VisaSuccessStoryController extends Controller
{
    public function index(Request $request)
    {
        $query = VisaSuccessStory::query();

        if ($request->has('search')) {
            $query->where('student_name', 'like', '%' . $request->search . '%')
                  ->orWhere('university', 'like', '%' . $request->search . '%')
                  ->orWhere('country', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status === 'active');
        }

        $stories = $query->ordered()->paginate(10);

        return view('Admin.VisaSuccessStories.index', compact('stories'));
    }

    public function create()
    {
        return view('Admin.VisaSuccessStories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required',
            'country' => 'required',
            'city' => 'nullable',
            'university' => 'required',
            'course' => 'required',
            'intake' => 'nullable',
            'visa_date' => 'nullable|date',
            'visa_type' => 'nullable',
            'student_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'visa_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'passport_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'testimonial' => 'nullable',
            'rating' => 'nullable|integer|min:1|max:5',
            'video_url' => 'nullable|url',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['rating'] = $validated['rating'] ?? 5;
        $validated['display_order'] = $validated['display_order'] ?? 0;

        if ($request->hasFile('student_image')) {
            $validated['student_image'] = $request->file('student_image')->store('visa-stories', 'public');
        }

        if ($request->hasFile('visa_image')) {
            $validated['visa_image'] = $request->file('visa_image')->store('visa-stories', 'public');
        }

        if ($request->hasFile('passport_image')) {
            $validated['passport_image'] = $request->file('passport_image')->store('visa-stories', 'public');
        }

        VisaSuccessStory::create($validated);

        return redirect()->route('admin.visa-success-story.index')->with('success', 'Story created successfully!');
    }

    public function show(VisaSuccessStory $visaSuccessStory)
    {
        return view('Admin.VisaSuccessStories.show', compact('visaSuccessStory'));
    }

    public function edit(VisaSuccessStory $visaSuccessStory)
    {
        return view('Admin.VisaSuccessStories.edit', compact('visaSuccessStory'));
    }

    public function update(Request $request, VisaSuccessStory $visaSuccessStory)
    {
        $validated = $request->validate([
            'student_name' => 'required',
            'country' => 'required',
            'city' => 'nullable',
            'university' => 'required',
            'course' => 'required',
            'intake' => 'nullable',
            'visa_date' => 'nullable|date',
            'visa_type' => 'nullable',
            'student_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'visa_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'passport_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'testimonial' => 'nullable',
            'rating' => 'nullable|integer|min:1|max:5',
            'video_url' => 'nullable|url',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['rating'] = $validated['rating'] ?? 5;
        $validated['display_order'] = $validated['display_order'] ?? 0;

        if ($request->hasFile('student_image')) {
            if ($visaSuccessStory->student_image) {
                \Storage::disk('public')->delete($visaSuccessStory->student_image);
            }
            $validated['student_image'] = $request->file('student_image')->store('visa-stories', 'public');
        }

        if ($request->hasFile('visa_image')) {
            if ($visaSuccessStory->visa_image) {
                \Storage::disk('public')->delete($visaSuccessStory->visa_image);
            }
            $validated['visa_image'] = $request->file('visa_image')->store('visa-stories', 'public');
        }

        if ($request->hasFile('passport_image')) {
            if ($visaSuccessStory->passport_image) {
                \Storage::disk('public')->delete($visaSuccessStory->passport_image);
            }
            $validated['passport_image'] = $request->file('passport_image')->store('visa-stories', 'public');
        }

        $visaSuccessStory->update($validated);

        return redirect()->route('admin.visa-success-story.index')->with('success', 'Story updated successfully!');
    }

    public function destroy(VisaSuccessStory $visaSuccessStory)
    {
        if ($visaSuccessStory->student_image) {
            \Storage::disk('public')->delete($visaSuccessStory->student_image);
        }
        if ($visaSuccessStory->visa_image) {
            \Storage::disk('public')->delete($visaSuccessStory->visa_image);
        }
        if ($visaSuccessStory->passport_image) {
            \Storage::disk('public')->delete($visaSuccessStory->passport_image);
        }

        $visaSuccessStory->delete();
        return redirect()->route('admin.visa-success-story.index')->with('success', 'Story deleted successfully!');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            VisaSuccessStory::find($id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function toggleStatus(VisaSuccessStory $visaSuccessStory)
    {
        $visaSuccessStory->update(['status' => !$visaSuccessStory->status]);
        return response()->json(['success' => true, 'status' => $visaSuccessStory->status]);
    }
}
