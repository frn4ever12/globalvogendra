<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Str;

class UpdateMenuSlugsSeeder extends Seeder
{
    public function run()
    {
        $menus = Menu::whereNull('slug')->get();
        
        foreach ($menus as $menu) {
            $menu->slug = Str::slug($menu->name);
            $menu->save();
        }
        
        $this->command->info('Updated ' . $menus->count() . ' menus with slugs.');
    }
}
