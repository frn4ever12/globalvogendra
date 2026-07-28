<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::where('status', 1)->get();
        return view('Admin.Country.index', compact('countries'));
    }
    public function create(){
        return view('Admin.Country.create');
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'name'=>'required',
            'flag_url'=>'required|mimes:png,jpg',
            'cover_image'=>'required|mimes:png,jpg'
        ]);
        $filepath=null;
        $coverfilepath=null;
        try{
            DB::beginTransaction();
            if ($request->hasFile('flag_url')) {
                $file = $request->file('flag_url');
                $filepath = $file->store('images/country/flag', 'public');
            }
            if ($request->hasFile('cover_image')) {
                $coverfile = $request->file('cover_image');
                $coverfilepath = $coverfile->store('images/country/cover', 'public');
            }
            $validatedData['flag_url']=$filepath;
            $validatedData['cover_image']=$coverfilepath;
            Country::create($validatedData);
            DB::commit();
            return redirect()->route('admin.country.index')->with('success', 'Data has been saved Successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            if ($coverfilepath && Storage::disk('public')->exists($coverfilepath)) {
                Storage::disk('public')->delete($coverfilepath);
            }
            return back()->with('error','Failed to add data.');
        }
    }
    public function edit(Country $country){
        return view('Admin.Country.edit',compact('country'));
    }
    public function update(Request $request,Country $country){
        $validatedData=$request->validate([
            'name'=>'required',
            'flag_url'=>'nullable|mimes:png,jpg',
            'cover_image'=>'nullable|mimes:png,jpg',
            'status'=>'nullable|in:0,1'
        ]);
        $filepath=$country->flag_url;
        $coverfilepath=$country->cover_image;
        try{
            DB::beginTransaction();
            if ($request->hasFile('flag_url')) {
                if (Storage::disk('public')->exists($filepath)) {
                    Storage::disk('public')->delete($filepath);
                }
                $file=$request->file('flag_url');
                $filepath = $file->store('images/country/flag', 'public');

            }
            if ($request->hasFile('cover_image')) {
                if (Storage::disk('public')->exists($coverfilepath)) {
                    Storage::disk('public')->delete($coverfilepath);
                }
                $coverfile=$request->file('cover_image');
                $coverfilepath = $coverfile->store('images/country/cover', 'public');
            }
            $validatedData['flag_url']=$filepath;
            $validatedData['cover_image']=$coverfilepath;
            $country->update($validatedData);
            DB::commit();
            return redirect()->route('admin.country.index')->with('success', 'Data has been saved Successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            if ($coverfilepath && Storage::disk('public')->exists($coverfilepath)) {
                Storage::disk('public')->delete($coverfilepath);
            }
            dd($e);
            return back()->with('error','Failed to add data.');
        }
    }
    public function destroy(Country $country)
    {
        try {
            if ($country) {
                $filePath = $country->flag_url;
                $coverfilePath = $country->cover_image;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                if (Storage::disk('public')->exists($coverfilePath)) {
                    Storage::disk('public')->delete($coverfilePath);
                }
                $country->delete();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
