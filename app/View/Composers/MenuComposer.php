<?php
namespace App\View\Composers;

use App\Models\AboutUs;
use App\Models\HeroBanner;
use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    private $menus;
    private $heroBanners;
    private $aboutUs;
    
    public function compose(View $view)
    {
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
                $this->aboutUs = AboutUs::active()->first();
            } catch (\Exception $e) {
                $this->aboutUs = null;
            }
        }
        
        return $view->with('menus', $this->menus)
                    ->with('heroBanners', $this->heroBanners)
                    ->with('aboutUs', $this->aboutUs);
    }
}
