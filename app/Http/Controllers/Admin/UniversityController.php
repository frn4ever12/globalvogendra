<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
    return view('Admin.University.index', compact('universities'));
    }
    public function create()
    {
        return view('Admin.University.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image_url' => 'nullable|mimes:png,jpg',
            'website_url' => 'required',
            'description' => 'required',
        ]);
        $filepath = null;
        try {
            DB::beginTransaction();
            if ($request->hasFile('image_url')) {
                $file = $request->file('image_url');
                $filepath = $file->store('images/universities', 'public');
            }
            $validatedData['image_url'] = $filepath;
            University::create($validatedData);
            DB::commit();
            return redirect()->route('admin.university.index')->with('success', 'Data has been saved Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            return back()->with('error', 'Failed to add data.');
        }
    }
    public function edit(University $university)
    {
        return view('Admin.University.edit', compact('university'));
    }
    public function update(Request $request, University $university)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image_url' => 'nullable|mimes:png,jpg',
            'status' => 'nullable|in:0,1',
            'website_url' => 'required',
            'description' => 'required',
        ]);
        $filepath=$university->image_url??null;
        try{
            DB::beginTransaction();
            if ($request->hasFile('image_url')) {
                if (Storage::disk('public')->exists($filepath)) {
                    Storage::disk('public')->delete($filepath);
                }
                $file=$request->file('image_url');
                $filepath = $file->store('images/universities', 'public');
            }
            $validatedData['image_url']=$filepath;
            $university->update($validatedData);
            DB::commit();
            return redirect()->route('admin.university.index')->with('success', 'Data has been saved Successfully.');

        }catch(\Exception $e){
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            return back()->with('error','Failed to add data.');
        }
    }
    public function destroy(University $university)
    {
        try {
            if ($university) {
                $filePath = $university->image_url;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                $university->delete();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
