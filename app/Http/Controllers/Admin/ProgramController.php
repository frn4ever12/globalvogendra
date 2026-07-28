<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        return view('Admin.Program.index');
    }
    public function create(){
        return view('Admin.Program.create');
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'name'=>'required'
        ]);
        Program::create($validatedData);
        return redirect()->route('admin.program.index')->with('success', 'Data has been saved Successfully.');
    }
    public function edit(Program $program){
        return view('Admin.Program.edit',compact('program'));
    }
    public function update(Request $request,Program $program){
        $validatedData=$request->validate([
            'name'=>'required',
            'status'=>'nullable|in:0,1'
        ]);
        $program->update($validatedData);
        return redirect()->route('admin.program.index')->with('success', 'Data has been saved Successfully.');
    }
    public function destroy(Program $program)
    {
        try {
            if ($program) {
                $program->delete();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
