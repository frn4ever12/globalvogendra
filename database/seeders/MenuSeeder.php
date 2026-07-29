<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'name' => 'Services',
                'icon' => 'fa fa-cogs',
                'order_no' => 1,
                'status' => true
            ],
            [
                'name' => 'About Us',
                'icon' => 'fa fa-info-circle',
                'order_no' => 2,
                'status' => true
            ],
            [
                'name' => 'Countries',
                'icon' => 'fa fa-globe',
                'order_no' => 3,
                'status' => true
            ],
            [
                'name' => 'Universities',
                'icon' => 'fa fa-university',
                'order_no' => 4,
                'status' => true
            ],
            [
                'name' => 'Contact',
                'icon' => 'fa fa-envelope',
                'order_no' => 5,
                'status' => true
            ]
        ];
        
        // Check if slug column exists before seeding
        $hasSlugColumn = \Schema::hasColumn('menus', 'slug');
        
        foreach ($menus as $menu) {
            if ($hasSlugColumn) {
                $menu['slug'] = \Illuminate\Support\Str::slug($menu['name']);
            }
            Menu::create($menu);
        }
        
        $this->command->info('Menus seeded successfully.');
    }
}
