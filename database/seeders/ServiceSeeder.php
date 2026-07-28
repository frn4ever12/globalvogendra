<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Student Visa Consultation',
                'short_title' => 'Visa Consultation',
                'slug' => 'student-visa-consultation',
                'category' => 'Visa Services',
                'short_description' => 'Expert guidance for student visa applications to Germany, UK, USA, Canada, Australia, and other countries with high success rate.',
                'description' => 'Our experienced visa consultants provide comprehensive guidance for student visa applications. We assist with document preparation, application submission, interview preparation, and follow-up to ensure high success rates for Germany, UK, USA, Canada, Australia, and other study destinations.',
                'icon' => 'fa-passport',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'display_order' => 1,
                'featured' => true,
                'status' => true
            ],
            [
                'title' => 'University Admission',
                'short_title' => 'University Admission',
                'slug' => 'university-admission',
                'category' => 'Admission Services',
                'short_description' => 'Comprehensive support for university selection, application processing, and admission to top universities worldwide.',
                'description' => 'We help students identify the best universities based on their profile, interests, and career goals. Our team assists with application preparation, statement of purpose writing, recommendation letters, and direct communication with universities.',
                'icon' => 'fa-university',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'display_order' => 2,
                'featured' => true,
                'status' => true
            ],
            [
                'title' => 'German Language Training',
                'short_title' => 'German Language',
                'slug' => 'german-language-training',
                'category' => 'Language Training',
                'short_description' => 'Professional German language courses from A1 to C2 levels for study, work, and immigration purposes.',
                'description' => 'We offer comprehensive German language training from beginner (A1) to advanced (C2) levels. Our courses are designed for students preparing for university admission, professionals seeking work opportunities, and individuals planning to immigrate to German-speaking countries.',
                'icon' => 'fa-language',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'display_order' => 3,
                'featured' => true,
                'status' => true
            ],
            [
                'title' => 'Ausbildung Programs',
                'short_title' => 'Ausbildung',
                'slug' => 'ausbildung-programs',
                'category' => 'Career Programs',
                'short_description' => 'Vocational training programs in Germany with paid apprenticeship opportunities and guaranteed job placement.',
                'description' => 'Ausbildung is Germany\'s dual vocational training system that combines classroom education with on-the-job training. We guide students through the application process, help them find suitable programs, and assist with visa requirements for this unique career opportunity.',
                'icon' => 'fa-briefcase',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'display_order' => 4,
                'featured' => false,
                'status' => true
            ],
            [
                'title' => 'IELTS Preparation',
                'short_title' => 'IELTS Prep',
                'slug' => 'ielts-preparation',
                'category' => 'Test Preparation',
                'short_description' => 'Comprehensive IELTS preparation courses with expert instructors and proven strategies for high scores.',
                'description' => 'Our IELTS preparation courses are designed to help students achieve their target scores. We provide intensive training in all four modules - Listening, Reading, Writing, and Speaking - with practice tests, personalized feedback, and exam strategies.',
                'icon' => 'fa-graduation-cap',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'display_order' => 5,
                'featured' => false,
                'status' => true
            ],
            [
                'title' => 'Career Counseling',
                'short_title' => 'Career Counseling',
                'slug' => 'career-counseling',
                'category' => 'Counseling Services',
                'short_description' => 'Professional career guidance to help students choose the right study path and achieve their career goals.',
                'description' => 'Our career counselors provide personalized guidance to help students make informed decisions about their education and career. We assess interests, skills, and goals to recommend suitable courses, universities, and career paths.',
                'icon' => 'fa-user-tie',
                'button_text' => 'Learn More',
                'button_link' => '/contact',
                'display_order' => 6,
                'featured' => false,
                'status' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
