<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'title' => 'Visa Success Rate',
                'short_description' => 'Professional visa guidance with a high approval rate.',
                'icon' => 'passport',
                'counter' => '98',
                'counter_suffix' => '%',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'icon_color' => '#16a34a',
                'animation' => 'fade-up',
                'display_order' => 1,
                'status' => true
            ],
            [
                'title' => 'Partner Universities',
                'short_description' => 'Strong partnerships with German universities.',
                'icon' => 'university',
                'counter' => '150',
                'counter_suffix' => '+',
                'button_text' => 'View Universities',
                'button_link' => '/university',
                'background_color' => '#ffffff',
                'icon_color' => '#2563eb',
                'animation' => 'fade-up',
                'display_order' => 2,
                'status' => true
            ],
            [
                'title' => 'Students Guided',
                'short_description' => 'Helping students achieve their study abroad dreams.',
                'icon' => 'user-graduate',
                'counter' => '5000',
                'counter_suffix' => '+',
                'button_text' => 'Success Stories',
                'button_link' => '/successstory',
                'background_color' => '#ffffff',
                'icon_color' => '#f59e0b',
                'animation' => 'fade-up',
                'display_order' => 3,
                'status' => true
            ],
            [
                'title' => 'Years Experience',
                'short_description' => 'Trusted consultancy with years of experience.',
                'icon' => 'award',
                'counter' => '12',
                'counter_suffix' => '+',
                'button_text' => 'About Us',
                'button_link' => '/about',
                'background_color' => '#ffffff',
                'icon_color' => '#ef4444',
                'animation' => 'fade-up',
                'display_order' => 4,
                'status' => true
            ]
        ];

        foreach ($features as $feature) {
            WhyChooseUs::create($feature);
        }
    }
}
