<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name'=>'Global Excel',
            'phone'=>'9851362301',
            'address'=>'TMT Complex Baghbazar, Kathmandu',
            'email'=>'sales@geusic.edu.np',
        ]);
    }
}
