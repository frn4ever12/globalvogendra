<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubMenuController extends Controller
{
    public function index()
    {
        $subMenus = SubMenu::with('menu')->orderBy('order_no')->get();
        return view('Admin.SubMenu.index', compact('subMenus'));
    }

    public function create()
    {
        $menus = Menu::where('status', true)->get();
        return view('Admin.SubMenu.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'name' => 'required',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'order_no' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;
        $validatedData['status'] = $request->has('status') ? true : false;

        if ($request->hasFile('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('submenus/banners', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validatedData['featured_image'] = $request->file('featured_image')->store('submenus/featured', 'public');
        }

        SubMenu::create($validatedData);

        return redirect()->route('admin.submenu.index')->with('success', 'Sub Menu created successfully.');
    }

    public function edit(SubMenu $subMenu)
    {
        $menus = Menu::where('status', true)->get();
        return view('Admin.SubMenu.edit', compact('subMenu', 'menus'));
    }

    public function update(Request $request, SubMenu $subMenu)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'name' => 'required',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'order_no' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;
        $validatedData['status'] = $request->has('status') ? true : false;

        if ($request->hasFile('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('submenus/banners', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validatedData['featured_image'] = $request->file('featured_image')->store('submenus/featured', 'public');
        }

        $subMenu->update($validatedData);

        return redirect()->route('admin.submenu.index')->with('success', 'Sub Menu updated successfully.');
    }

    public function destroy(SubMenu $subMenu)
    {
        try {
            $subMenu->delete();
            return response()->json(['status' => 200, 'message' => 'Sub Menu deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete sub menu'], 404);
        }
    }
}
