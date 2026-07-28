<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index(Request $request)
    {
        $query = Process::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status === 'active');
        }

        $processes = $query->ordered()->paginate(10);

        return view('Admin.Processes.index', compact('processes'));
    }

    public function create()
    {
        return view('Admin.Processes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable|string',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'background_color' => 'nullable',
            'icon_color' => 'nullable',
            'animation' => 'nullable',
            'step_no' => 'required|integer',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#ffffff';
        $validated['icon_color'] = $validated['icon_color'] ?? '#2563eb';
        $validated['animation'] = $validated['animation'] ?? 'fade-up';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('processes', 'public');
        }

        Process::create($validated);

        return redirect()->route('admin.process.index')->with('success', 'Process created successfully!');
    }

    public function show(Process $process)
    {
        return view('Admin.Processes.show', compact('process'));
    }

    public function edit(Process $process)
    {
        return view('Admin.Processes.edit', compact('process'));
    }

    public function update(Request $request, Process $process)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'icon' => 'nullable|string',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'background_color' => 'nullable',
            'icon_color' => 'nullable',
            'animation' => 'nullable',
            'step_no' => 'required|integer',
            'display_order' => 'nullable|integer',
            'status' => 'nullable'
        ]);

        $validated['status'] = $request->has('status');
        $validated['display_order'] = $validated['display_order'] ?? 0;
        $validated['background_color'] = $validated['background_color'] ?? '#ffffff';
        $validated['icon_color'] = $validated['icon_color'] ?? '#2563eb';
        $validated['animation'] = $validated['animation'] ?? 'fade-up';

        if ($request->hasFile('image')) {
            // Delete old image
            if ($process->image) {
                \Storage::disk('public')->delete($process->image);
            }
            $validated['image'] = $request->file('image')->store('processes', 'public');
        }

        $process->update($validated);

        return redirect()->route('admin.process.index')->with('success', 'Process updated successfully!');
    }

    public function destroy(Process $process)
    {
        // Delete image
        if ($process->image) {
            \Storage::disk('public')->delete($process->image);
        }

        $process->delete();
        return redirect()->route('admin.process.index')->with('success', 'Process deleted successfully!');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            Process::find($id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function toggleStatus(Process $process)
    {
        $process->update(['status' => !$process->status]);
        return response()->json(['success' => true, 'status' => $process->status]);
    }
}
