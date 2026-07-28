<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index(){
        return view('Admin.Faqs.index');
    }
    public function create(){
        return view('Admin.Faqs.create');
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);
        Faqs::create($validatedData);
        return redirect()->route('admin.faqs.index')->with('success', 'Data has been saved Successfully.');
    }
    public function edit(Faqs $faq){
        return view('Admin.Faqs.edit',compact('faq'));
    }
    public function update(Request $request,Faqs $faq){
        $validatedData=$request->validate([
            'question'=>'required',
            'answer'=>'required',
            'status'=>'nullable|in:0,1'
        ]);
        $faq->update($validatedData);
        return redirect()->route('admin.faqs.index')->with('success', 'Data has been saved Successfully.');
    }
    public function destroy(Faqs $faqs)
    {
        try {
            if ($faqs) {
                $faqs->delete();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
