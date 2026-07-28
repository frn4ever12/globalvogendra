<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        return view('Admin.Team.index');
    }
    public function create()
    {
        return view('Admin.Team.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'member_name' => 'required',
            'position' => 'required',
            'short_description' => 'required',
            'photo' => 'required|mimes:png,jpg'
        ]);
        $filepath=null;
        try {
            DB::beginTransaction();
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filepath = $file->store('images/team', 'public');
            }
            $validatedData['photo'] = $filepath;
            Team::create($validatedData);
            DB::commit();
            return redirect()->route('admin.team.index')->with('success', 'Data has been saved Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            return back()->with('error', 'Failed to add data.');
        }
    }
    public function edit(Team $team)
    {
        return view('Admin.Team.edit', compact('team'));
    }
    public function update(Request $request, Team $team)
    {
        $validatedData = $request->validate([
            'member_name' => 'required',
            'position' => 'required',
            'short_description' => 'required',
            'photo' => 'nullable|mimes:png,jpg',
            'status' => 'nullable|in:0,1'
        ]);
        $filepath=$team->photo??null;
        try{
            DB::beginTransaction();
            if ($request->hasFile('photo')) {
                if (Storage::disk('public')->exists($filepath)) {
                    Storage::disk('public')->delete($filepath);
                }
                $file=$request->file('photo');
                $filepath = $file->store('images/team', 'public');
            }
            $validatedData['photo']=$filepath;
            $team->update($validatedData);
            DB::commit();
            return redirect()->route('admin.team.index')->with('success', 'Data has been saved Successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            return back()->with('error','Failed to add data.');
        }
        
    }
    public function destroy(Team $team)
    {
        try {
            if ($team) {
                $filePath = $team->photo;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                $team->delete();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
