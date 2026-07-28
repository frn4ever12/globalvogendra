<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingUpdateRequest;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function setting()
    {
        return view('Admin.site.setting');
    }
    public function settingUpdate(SiteSettingUpdateRequest $request, SiteSetting $setting)
    {
        $validated = $request->validated();
        $filepath=null;
        try{
            DB::beginTransaction();
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filepath = $file->store('site/logo/', 'public');
                if (Storage::disk('public')->exists($setting->logo)) {
                    Storage::disk('public')->delete($setting->logo);
                }
            }
          
             
            $setting->update([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'logo' => $filepath??$setting->logo,
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'fb_link' => $validated['fb_link'],
                'insta_link' => $validated['insta_link'],
                'twitter_link' => $validated['twitter_link'],
            ]);
            DB::commit();
            return to_route('admin.site.setting')->with('success','Data has been saved successfully!');
        }catch(\Exception $e){
            DB::rollBack();
            if ($filepath && Storage::disk('public')->exists($filepath)) {
                Storage::disk('public')->delete($filepath);
            }
            
            return back()->with('error','Failed to add data.');
        }
    }
}
