<?php

namespace Database\Seeders;

use App\Models\GermanLanguageLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GermanLanguageLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'level_name' => 'Beginner',
                'level_code' => 'A1',
                'title' => 'Beginner German',
                'short_description' => 'Start your German journey with basic vocabulary, grammar, and everyday conversations.',
                'duration' => '8 Weeks',
                'class_type' => 'Online',
                'class_schedule' => 'Evening',
                'course_fee' => '$500',
                'exam_name' => 'Goethe',
                'certificate' => true,
                'students_count' => 250,
                'icon' => 'seedling',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'text_color' => '#1e293b',
                'animation' => 'fade-up',
                'ribbon' => 'New Batch',
                'display_order' => 1,
                'status' => true
            ],
            [
                'level_name' => 'Elementary',
                'level_code' => 'A2',
                'title' => 'Elementary German',
                'short_description' => 'Build on your basics with more complex grammar and practical communication skills.',
                'duration' => '10 Weeks',
                'class_type' => 'Hybrid',
                'class_schedule' => 'Weekend',
                'course_fee' => '$600',
                'exam_name' => 'Goethe',
                'certificate' => true,
                'students_count' => 200,
                'icon' => 'leaf',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'text_color' => '#1e293b',
                'animation' => 'fade-up',
                'ribbon' => null,
                'display_order' => 2,
                'status' => true
            ],
            [
                'level_name' => 'Intermediate',
                'level_code' => 'B1',
                'title' => 'Intermediate German',
                'short_description' => 'Achieve independent language use for work, study, and travel in German-speaking countries.',
                'duration' => '12 Weeks',
                'class_type' => 'Online',
                'class_schedule' => 'Day',
                'course_fee' => '$700',
                'exam_name' => 'TELC',
                'certificate' => true,
                'students_count' => 180,
                'icon' => 'tree',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'text_color' => '#1e293b',
                'animation' => 'fade-up',
                'ribbon' => 'Most Popular',
                'display_order' => 3,
                'status' => true
            ],
            [
                'level_name' => 'Upper Intermediate',
                'level_code' => 'B2',
                'title' => 'Upper Intermediate German',
                'short_description' => 'Master advanced grammar and fluency for professional and academic environments.',
                'duration' => '14 Weeks',
                'class_type' => 'Physical',
                'class_schedule' => 'Morning',
                'course_fee' => '$800',
                'exam_name' => 'TestDaF',
                'certificate' => true,
                'students_count' => 150,
                'icon' => 'graduation-cap',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'text_color' => '#1e293b',
                'animation' => 'fade-up',
                'ribbon' => 'Recommended',
                'display_order' => 4,
                'status' => true
            ],
            [
                'level_name' => 'Advanced',
                'level_code' => 'C1',
                'title' => 'Advanced German',
                'short_description' => 'Achieve near-native fluency for university admission and professional success.',
                'duration' => '16 Weeks',
                'class_type' => 'Hybrid',
                'class_schedule' => 'Evening',
                'course_fee' => '$900',
                'exam_name' => 'Goethe',
                'certificate' => true,
                'students_count' => 100,
                'icon' => 'award',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'text_color' => '#1e293b',
                'animation' => 'fade-up',
                'ribbon' => 'Fast Track',
                'display_order' => 5,
                'status' => true
            ],
            [
                'level_name' => 'Proficiency',
                'level_code' => 'C2',
                'title' => 'Proficiency German',
                'short_description' => 'Master the German language at the highest level for academic and professional excellence.',
                'duration' => '20 Weeks',
                'class_type' => 'Online',
                'class_schedule' => 'Weekend',
                'course_fee' => '$1000',
                'exam_name' => 'TestDaF',
                'certificate' => true,
                'students_count' => 50,
                'icon' => 'star',
                'button_text' => 'Enroll Now',
                'button_link' => '/contact',
                'background_color' => '#ffffff',
                'text_color' => '#1e293b',
                'animation' => 'fade-up',
                'ribbon' => null,
                'display_order' => 6,
                'status' => true
            ]
        ];

        foreach ($levels as $level) {
            GermanLanguageLevel::create($level);
        }
    }
}
