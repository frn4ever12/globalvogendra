<?php

namespace App\Http\Controllers;

use App\Models\GermanLanguageLevel;
use Illuminate\Http\Request;

class GermanLevelController extends Controller
{
    public function show($slug)
    {
        $level = GermanLanguageLevel::where('level_code', $slug)
            ->with(['curricula', 'faqs', 'benefits'])
            ->firstOrFail();
        
        $relatedLevels = GermanLanguageLevel::active()
            ->where('id', '!=', $level->id)
            ->ordered()
            ->take(3)
            ->get();
        
        return view('german-level-detail', compact('level', 'relatedLevels'));
    }
}
