<?php
namespace App\View\Composers;

use App\Models\AboutUs;
use App\Models\HeroBanner;
use App\Models\Process;
use App\Models\Service;
use App\Models\Menu;
use App\Models\WhyChooseUs;
use App\Models\GermanLanguageLevel;
use App\Models\VisaSuccessStory;
use Illuminate\View\View;

class MenuComposer
{
    private $menus;
    private $heroBanners;
    private $aboutUs;
    private $siteServices;
    private $processes;
    private $whyChooseUs;
    private $germanLanguageLevels;
    private $visaSuccessStories;
    
    public function compose(View $view)
    {
        // Skip admin views to prevent variable conflicts
        if (str_contains($view->getName(), 'admin')) {
            return;
        }

        if (!$this->menus) {
            try {
                $this->menus = Menu::where('status', true)
                    ->with('subMenus')
                    ->orderBy('order_no')
                    ->get();
            } catch (\Exception $e) {
                $this->menus = collect();
            }
        }

        if (!$this->heroBanners) {
            try {
                $this->heroBanners = HeroBanner::active()->ordered()->get();
            } catch (\Exception $e) {
                $this->heroBanners = collect();
            }
        }

        if (!$this->aboutUs) {
            try {
                $this->aboutUs = AboutUs::first();
            } catch (\Exception $e) {
                $this->aboutUs = null;
            }
        }

        if (!$this->siteServices) {
            try {
                $this->siteServices = Service::active()->ordered()->get();
            } catch (\Exception $e) {
                $this->siteServices = collect();
            }
        }

        if (!$this->processes) {
            try {
                $this->processes = Process::active()->ordered()->get();
            } catch (\Exception $e) {
                $this->processes = collect();
            }
        }

        if (!$this->whyChooseUs) {
            try {
                $this->whyChooseUs = WhyChooseUs::active()->ordered()->get();
            } catch (\Exception $e) {
                $this->whyChooseUs = collect();
            }
        }

        if (!$this->germanLanguageLevels) {
            try {
                $this->germanLanguageLevels = GermanLanguageLevel::active()->ordered()->get();
            } catch (\Exception $e) {
                $this->germanLanguageLevels = collect();
            }
        }

        if (!$this->visaSuccessStories) {
            try {
                $this->visaSuccessStories = VisaSuccessStory::active()->ordered()->get();
            } catch (\Exception $e) {
                $this->visaSuccessStories = collect();
            }
        }
        
        return $view->with('menus', $this->menus)
                    ->with('heroBanners', $this->heroBanners)
                    ->with('aboutUs', $this->aboutUs)
                    ->with('frontendServices', $this->siteServices)
                    ->with('processes', $this->processes)
                    ->with('whyChooseUs', $this->whyChooseUs)
                    ->with('germanLanguageLevels', $this->germanLanguageLevels)
                    ->with('visaSuccessStories', $this->visaSuccessStories);
    }
}
