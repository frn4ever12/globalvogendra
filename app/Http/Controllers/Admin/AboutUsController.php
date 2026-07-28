<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function show()
    {
        $about = AboutUs::first();
        if (!$about) {
            $about = new AboutUs();
        }
        return view('Admin.AboutUs.show', compact('about'));
    }

    public function edit()
    {
        $about = AboutUs::first();
        if (!$about) {
            $about = new AboutUs();
        }
        return view('Admin.AboutUs.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
            'button_text' => 'nullable',
            'text_color' => 'nullable',
            'background_color' => 'nullable',
            'status' => 'nullable',
            'display_order' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['title'] = $validated['title'] ?? 'About Us';
        $validated['button_text'] = $validated['button_text'] ?? 'Learn More';
        $validated['text_color'] = $validated['text_color'] ?? '#333333';
        $validated['background_color'] = $validated['background_color'] ?? '#f8f9fa';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about-us', 'public');
        }

        $about = AboutUs::first();
        if ($about) {
            $about->update($validated);
        } else {
            AboutUs::create($validated);
        }

        return redirect()->route('admin.about-us.show')->with('success', 'About Us updated successfully!');
    }
}
