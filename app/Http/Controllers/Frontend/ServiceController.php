<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->paginate(12);
        return view('Frontend.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->active()->firstOrFail();
        $allServices = Service::active()->ordered()->get();
        
        // Get previous and next services
        $currentIndex = $allServices->search(function($item) use ($slug) {
            return $item->slug === $slug;
        });
        
        $previousService = $currentIndex > 0 ? $allServices[$currentIndex - 1] : null;
        $nextService = $currentIndex < $allServices->count() - 1 ? $allServices[$currentIndex + 1] : null;
        
        // Get related services (excluding current)
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->when($service->category, function($query) use ($service) {
                return $query->where('category', $service->category);
            })
            ->take(4)
            ->get();
        
        return view('Frontend.services.show', compact('service', 'allServices', 'previousService', 'nextService', 'relatedServices'));
    }
}
