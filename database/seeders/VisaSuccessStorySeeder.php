<?php

namespace Database\Seeders;

use App\Models\VisaSuccessStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisaSuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'student_name' => 'Aarav Sharma',
                'country' => 'Nepal',
                'city' => 'Kathmandu',
                'university' => 'Technical University of Munich',
                'course' => 'BSc Computer Science',
                'intake' => 'September 2026',
                'visa_date' => '2026-07-15',
                'visa_type' => 'Student Visa',
                'testimonial' => 'Global Consultancy made my dream of studying in Germany a reality. Their guidance throughout the application process was exceptional. From university selection to visa approval, they were with me every step of the way. Highly recommended!',
                'rating' => 5,
                'display_order' => 1,
                'status' => true
            ],
            [
                'student_name' => 'Sita Rai',
                'country' => 'Nepal',
                'city' => 'Pokhara',
                'university' => 'University of Stuttgart',
                'course' => 'MSc Mechanical Engineering',
                'intake' => 'October 2026',
                'visa_date' => '2026-06-20',
                'visa_type' => 'Student Visa',
                'testimonial' => 'I am grateful to the entire team at Global Consultancy for their professional approach and personalized support. They helped me secure admission at one of Germany\'s top universities and guided me through the complex visa process.',
                'rating' => 5,
                'display_order' => 2,
                'status' => true
            ],
            [
                'student_name' => 'Ramesh Gurung',
                'country' => 'Nepal',
                'city' => 'Lalitpur',
                'university' => 'RWTH Aachen University',
                'course' => 'Ausbildung Nursing',
                'intake' => 'August 2026',
                'visa_date' => '2026-05-10',
                'visa_type' => 'Work Visa',
                'testimonial' => 'The Ausbildung program guidance I received was outstanding. Global Consultancy helped me understand the requirements, prepared me for interviews, and ensured all documentation was perfect. I\'m now living my dream in Germany!',
                'rating' => 5,
                'display_order' => 3,
                'status' => true
            ],
            [
                'student_name' => 'Puja Karki',
                'country' => 'Nepal',
                'city' => 'Chitwan',
                'university' => 'University of Bremen',
                'course' => 'MBA',
                'intake' => 'September 2026',
                'visa_date' => '2026-07-01',
                'visa_type' => 'Student Visa',
                'testimonial' => 'Pursuing my MBA in Germany seemed impossible until I met the team at Global Consultancy. Their expertise in German education system and visa procedures made everything smooth. Thank you for making this possible!',
                'rating' => 5,
                'display_order' => 4,
                'status' => true
            ]
        ];

        foreach ($stories as $story) {
            VisaSuccessStory::create($story);
        }
    }
}
