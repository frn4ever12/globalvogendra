<?php
namespace App\View\Composers;

use App\Models\SiteSetting;
use Illuminate\View\View;

class SiteSettingComposer
{
    private $setting;
    public function compose(View $view)
    {
        if (!$this->setting) {
            try {
                $this->setting = SiteSetting::first();
            } catch (\Exception $e) {
                $this->setting = null;
            }
        }
        return $view->with('setting', $this->setting);
    }
}
