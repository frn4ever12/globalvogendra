<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processes = [
            [
                'title' => 'Free Consultation',
                'description' => 'Meet our experienced counsellors and discuss your study goals. Get personalized guidance for your educational journey.',
                'icon' => 'comments',
                'button_text' => 'Book Consultation',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'icon_color' => '#2563eb',
                'animation' => 'fade-up',
                'step_no' => 1,
                'display_order' => 1,
                'status' => true
            ],
            [
                'title' => 'Language Preparation',
                'description' => 'Prepare German language from A1 to B2 with certified trainers. Master the language requirements for your desired program.',
                'icon' => 'language',
                'button_text' => 'Learn More',
                'button_link' => '/ielts',
                'background_color' => '#ffffff',
                'icon_color' => '#16a34a',
                'animation' => 'fade-up',
                'step_no' => 2,
                'display_order' => 2,
                'status' => true
            ],
            [
                'title' => 'Admission & Documentation',
                'description' => 'We process university application and complete documentation. Get expert assistance with application forms and required documents.',
                'icon' => 'file-alt',
                'button_text' => 'Get Started',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'icon_color' => '#f59e0b',
                'animation' => 'fade-up',
                'step_no' => 3,
                'display_order' => 3,
                'status' => true
            ],
            [
                'title' => 'Visa & Departure',
                'description' => 'Receive visa support and fly confidently to Germany. Complete visa application assistance and pre-departure guidance.',
                'icon' => 'plane',
                'button_text' => 'Contact Us',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'icon_color' => '#ef4444',
                'animation' => 'fade-up',
                'step_no' => 4,
                'display_order' => 4,
                'status' => true
            ]
        ];

        foreach ($processes as $process) {
            Process::create($process);
        }
    }
}
