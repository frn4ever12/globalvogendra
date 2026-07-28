<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('short_title', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status === 'active');
        }

        $services = $query->ordered()->paginate(10);
        $categories = Service::distinct()->pluck('category')->filter();

        return view('Admin.Services.index', compact('services', 'categories'));
    }

    public function create()
    {
        return view('Admin.Services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_title' => 'nullable',
            'slug' => 'nullable|unique:services,slug',
            'category' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'display_order' => 'nullable|integer',
            'featured' => 'nullable',
            'status' => 'nullable'
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['featured'] = $request->has('featured');
        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['button_text'] = $validated['button_text'] ?? 'Learn More';

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('services/featured', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('services/banner', 'public');
        }

        Service::create($validated);

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully!');
    }

    public function show(Service $service)
    {
        return view('Admin.Services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('Admin.Services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required',
            'short_title' => 'nullable',
            'slug' => 'nullable|unique:services,slug,' . $service->id,
            'category' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'display_order' => 'nullable|integer',
            'featured' => 'nullable',
            'status' => 'nullable'
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['featured'] = $request->has('featured');
        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['button_text'] = $validated['button_text'] ?? 'Learn More';

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('services/featured', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('services/banner', 'public');
        }

        $service->update($validated);

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully!');
    }

    public function duplicate(Service $service)
    {
        $newService = $service->replicate();
        $newService->title = $service->title . ' (Copy)';
        $newService->slug = Str::slug($newService->title);
        $newService->display_order = Service::max('display_order') + 1;
        $newService->save();

        return redirect()->route('admin.service.index')->with('success', 'Service duplicated successfully!');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            Service::find($id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['status' => !$service->status]);
        return response()->json(['success' => true, 'status' => $service->status]);
    }
}
