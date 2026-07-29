<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubMenu;
use App\Models\Menu;

class SubMenuSeeder extends Seeder
{
    public function run()
    {
        // Get existing menus
        $menus = Menu::all();
        
        if ($menus->isEmpty()) {
            $this->command->warn('No menus found. Please create menus first.');
            return;
        }
        
        // Create sample submenus for each menu
        foreach ($menus as $menu) {
            SubMenu::create([
                'menu_id' => $menu->id,
                'name' => $menu->name . ' Submenu 1',
                'slug' => \Illuminate\Support\Str::slug($menu->name . '-submenu-1'),
                'banner_image' => null,
                'featured_image' => null,
                'order_no' => 1,
                'status' => true
            ]);
            
            SubMenu::create([
                'menu_id' => $menu->id,
                'name' => $menu->name . ' Submenu 2',
                'slug' => \Illuminate\Support\Str::slug($menu->name . '-submenu-2'),
                'banner_image' => null,
                'featured_image' => null,
                'order_no' => 2,
                'status' => true
            ]);
        }
        
        $this->command->info('Submenus seeded successfully.');
    }
}
