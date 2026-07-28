<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GermanLanguageLevel;
use Illuminate\Http\Request;

class GermanLanguageLevelController extends Controller
{
    public function index(Request $request)
    {
        $query = GermanLanguageLevel::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('level_code', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status === 'active');
        }

        $levels = $query->ordered()->paginate(10);

        return view('Admin.GermanLanguageLevels.index', compact('levels'));
    }

    public function create()
    {
        return view('Admin.GermanLanguageLevels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level_name' => 'required',
            'level_code' => 'required|unique:german_language_levels,level_code',
            'title' => 'required',
            'short_description' => 'required',
            'duration' => 'nullable',
            'class_type' => 'nullable',
            'class_schedule' => 'nullable',
            'course_fee' => 'nullable',
            'exam_name' => 'nullable',
            'certificate' => 'nullable',
            'students_count' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable|string',
            'background_color' => 'nullable',
            'text_color' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'animation' => 'nullable',
            'ribbon' => 'nullable',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['certificate'] = $request->has('certificate');
        $validated['students_count'] = $validated['students_count'] ?? 0;
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#ffffff';
        $validated['text_color'] = $validated['text_color'] ?? '#1e293b';
        $validated['animation'] = $validated['animation'] ?? 'fade-up';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('german-levels', 'public');
        }

        GermanLanguageLevel::create($validated);

        return redirect()->route('admin.german-language-level.index')->with('success', 'Level created successfully!');
    }

    public function show(GermanLanguageLevel $germanLanguageLevel)
    {
        return view('Admin.GermanLanguageLevels.show', compact('germanLanguageLevel'));
    }

    public function edit(GermanLanguageLevel $germanLanguageLevel)
    {
        return view('Admin.GermanLanguageLevels.edit', compact('germanLanguageLevel'));
    }

    public function update(Request $request, GermanLanguageLevel $germanLanguageLevel)
    {
        $validated = $request->validate([
            'level_name' => 'required',
            'level_code' => 'required|unique:german_language_levels,level_code,' . $germanLanguageLevel->id,
            'title' => 'required',
            'short_description' => 'required',
            'duration' => 'nullable',
            'class_type' => 'nullable',
            'class_schedule' => 'nullable',
            'course_fee' => 'nullable',
            'exam_name' => 'nullable',
            'certificate' => 'nullable',
            'students_count' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable|string',
            'background_color' => 'nullable',
            'text_color' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'animation' => 'nullable',
            'ribbon' => 'nullable',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['certificate'] = $request->has('certificate');
        $validated['students_count'] = $validated['students_count'] ?? 0;
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#ffffff';
        $validated['text_color'] = $validated['text_color'] ?? '#1e293b';
        $validated['animation'] = $validated['animation'] ?? 'fade-up';

        if ($request->hasFile('image')) {
            if ($germanLanguageLevel->image) {
                \Storage::disk('public')->delete($germanLanguageLevel->image);
            }
            $validated['image'] = $request->file('image')->store('german-levels', 'public');
        }

        $germanLanguageLevel->update($validated);

        return redirect()->route('admin.german-language-level.index')->with('success', 'Level updated successfully!');
    }

    public function destroy(GermanLanguageLevel $germanLanguageLevel)
    {
        if ($germanLanguageLevel->image) {
            \Storage::disk('public')->delete($germanLanguageLevel->image);
        }

        $germanLanguageLevel->delete();
        return redirect()->route('admin.german-language-level.index')->with('success', 'Level deleted successfully!');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            GermanLanguageLevel::find($id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function toggleStatus(GermanLanguageLevel $germanLanguageLevel)
    {
        $germanLanguageLevel->update(['status' => !$germanLanguageLevel->status]);
        return response()->json(['success' => true, 'status' => $germanLanguageLevel->status]);
    }
}
