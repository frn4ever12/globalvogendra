<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index(Request $request)
    {
        $query = WhyChooseUs::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status === 'active');
        }

        $features = $query->ordered()->paginate(10);

        return view('Admin.WhyChooseUs.index', compact('features'));
    }

    public function create()
    {
        return view('Admin.WhyChooseUs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable|string',
            'counter' => 'nullable',
            'counter_suffix' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'background_color' => 'nullable',
            'icon_color' => 'nullable',
            'animation' => 'nullable',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#ffffff';
        $validated['icon_color'] = $validated['icon_color'] ?? '#2563eb';
        $validated['animation'] = $validated['animation'] ?? 'fade-up';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('why-choose-us', 'public');
        }

        WhyChooseUs::create($validated);

        return redirect()->route('admin.why-choose-us.index')->with('success', 'Feature created successfully!');
    }

    public function show(WhyChooseUs $whyChooseUs)
    {
        return view('Admin.WhyChooseUs.show', compact('whyChooseUs'));
    }

    public function edit(WhyChooseUs $whyChooseUs)
    {
        return view('Admin.WhyChooseUs.edit', compact('whyChooseUs'));
    }

    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable|string',
            'counter' => 'nullable',
            'counter_suffix' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'background_color' => 'nullable',
            'icon_color' => 'nullable',
            'animation' => 'nullable',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#ffffff';
        $validated['icon_color'] = $validated['icon_color'] ?? '#2563eb';
        $validated['animation'] = $validated['animation'] ?? 'fade-up';

        if ($request->hasFile('image')) {
            if ($whyChooseUs->image) {
                \Storage::disk('public')->delete($whyChooseUs->image);
            }
            $validated['image'] = $request->file('image')->store('why-choose-us', 'public');
        }

        $whyChooseUs->update($validated);

        return redirect()->route('admin.why-choose-us.index')->with('success', 'Feature updated successfully!');
    }

    public function destroy(WhyChooseUs $whyChooseUs)
    {
        if ($whyChooseUs->image) {
            \Storage::disk('public')->delete($whyChooseUs->image);
        }

        $whyChooseUs->delete();
        return redirect()->route('admin.why-choose-us.index')->with('success', 'Feature deleted successfully!');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            WhyChooseUs::find($id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function toggleStatus(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->update(['status' => !$whyChooseUs->status]);
        return response()->json(['success' => true, 'status' => $whyChooseUs->status]);
    }
}
