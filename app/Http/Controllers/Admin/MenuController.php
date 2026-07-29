<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('subMenus')->orderBy('order_no')->get();
        return view('Admin.Menu.index', compact('menus'));
    }

    public function create()
    {
        return view('Admin.Menu.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'icon' => 'nullable',
            'order_no' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;
        $validatedData['status'] = $request->has('status') ? true : false;

        Menu::create($validatedData);

        return redirect()->route('admin.menu.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('Admin.Menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'icon' => 'nullable',
            'order_no' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['order_no'] = $validatedData['order_no'] ?? 0;
        $validatedData['status'] = $request->has('status') ? true : false;

        $menu->update($validatedData);

        return redirect()->route('admin.menu.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return response()->json(['status' => 200, 'message' => 'Menu deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Failed to delete menu'], 404);
        }
    }
}
