<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with(['subMenu' => function($query) {
            $query->with('menu');
        }])->latest()->get();
        return view('Admin.Page.index', compact('pages'));
    }

    public function create()
    {
        $subMenus = SubMenu::where('status', true)->with('menu')->get();
        return view('Admin.Page.create', compact('subMenus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'submenu_id' => 'required|exists:sub_menus,id',
            'title' => 'required',
            'subtitle' => 'nullable',
            'short_description' => 'nullable',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'content' => 'nullable',
            'video_url' => 'nullable|url',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'status' => 'nullable'
        ]);

        $validatedData['status'] = $request->has('status') ? true : false;

        if ($request->hasFile('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('pages/banners', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validatedData['featured_image'] = $request->file('featured_image')->store('pages/featured', 'public');
        }

        if ($request->hasFile('pdf')) {
            $validatedData['pdf'] = $request->file('pdf')->store('pages/pdfs', 'public');
        }

        $page = Page::create($validatedData);

        return redirect()->route('admin.page.edit', $page->id)->with('success', 'Page created successfully. You can now add gallery images and FAQs.');
    }

    public function edit(Page $page)
    {
        $page->load('galleries', 'faqs');
        $subMenus = SubMenu::where('status', true)->with('menu')->get();
        return view('Admin.Page.edit', compact('page', 'subMenus'));
    }

    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate([
            'submenu_id' => 'required|exists:sub_menus,id',
            'title' => 'required',
            'subtitle' => 'nullable',
            'short_description' => 'nullable',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'content' => 'nullable',
            'video_url' => 'nullable|url',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'seo_title' => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_description' => 'nullable',
            'status' => 'nullable'
        ]);

        $validatedData['status'] = $request->has('status') ? true : false;

        if ($request->hasFile('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('pages/banners', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validatedData['featured_image'] = $request->file('featured_image')->store('pages/featured', 'public');
        }

        if ($request->hasFile('pdf')) {
            $validatedData['pdf'] = $request->file('pdf')->store('pages/pdfs', 'public');
        }

        $page->update($validatedData);

        return redirect()->route('admin.page.edit', $page->id)->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        try {
            $page->delete();
            return response()->json(['status' => 200, 'message' => 'Page deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete page'], 404);
        }
    }
}
