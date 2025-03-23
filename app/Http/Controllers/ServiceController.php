<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $total_services = $services->count();
        $active_services = $services->where('active', 1)->count();
        return view('content.services.index', compact('services', 'total_services', 'active_services'));
    }

    public function create() {
        return view('content.services.create');
    }
    
    public function store(Request $request)
    {
        try{
            // dd($request->all());
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:500',
                'content' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Process Avatar Upload
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('services', 'public');
            }

            // Save Service
            Service::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'short_description' => $validated['short_description'],
                'description' => $validated['description'],
                'content' => $validated['content'],
                'avatar' => $avatarPath,
                'active' => $request->has('active') ? 1 : 0,
            ]);

            return redirect()->route('dashboard-services')->with('success', 'Service created successfully.');
        } catch(Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $serviceId)
    {
        try {
            $service = Service::findOrFail($serviceId);

            // Validate input
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:500',
                'content' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $avatarPath = $service->avatar;

            // Check if a new avatar is uploaded
            if ($request->hasFile('avatar')) {
                // Delete the old avatar if it exists
                if ($service->avatar && Storage::disk('public')->exists($service->avatar)) {
                    Storage::disk('public')->delete($service->avatar);
                }

                // Store the new avatar
                $avatarPath = $request->file('avatar')->store('services', 'public');
            }

            // Update Service
            $service->update([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'short_description' => $validated['short_description'],
                'description' => $validated['description'],
                'content' => $validated['content'],
                'avatar' => $avatarPath,
                'active' => $request->has('active') ? 1 : 0,
            ]);

            return redirect()->route('dashboard-services')->with('success', 'Service updated successfully.');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function destroy($serviceId)
    {
        try {
            $service = Service::findOrFail($serviceId);

            // Check if the service has an avatar and delete it from the public disk
            if ($service->avatar && Storage::disk('public')->exists($service->avatar)) {
                Storage::disk('public')->delete($service->avatar);
            }

            $service->delete();

            return redirect()->route('dashboard-services')->with('success', 'Service deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('dashboard-services')->with('error', 'Failed to delete service.');
        }
    }
}
