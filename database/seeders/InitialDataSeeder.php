<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Home Info
        \App\Models\HomeInfo::updateOrCreate(['id' => 1], [
            'hero_title' => "Hello, I'm Sushma Thapa",
            'hero_subtitle' => "Laravel Developer",
            'profile_image' => 'img/profile.jpg',
            'typed_strings' => [
                "Laravel Developer", 
                "Frontend Designer", 
                "Tech Enthusiast", 
                "BIM Student", 
                ".Dot Net Developer", 
                "BackEnd Developer", 
                "Event Organizer"
            ],
            'education' => [],
            'skills' => [],
            'achievements' => []
        ]);

        // 2. About Info
        \App\Models\AboutInfo::updateOrCreate(['id' => 1], [
            'career_objective' => "To commit a professional job utilizing my field of study and gain work experience for future assiduous.",
            'technical_skills' => ['PHP', 'Laravel', 'Python', 'C', '.NET Core', 'HTML', 'CSS', 'JavaScript'],
            'soft_skills' => ['Communication', 'Teamwork', 'Leadership'],
            'achievements' => [
                'Scholarships & GPA honors',
                'Volunteer work',
                'Leadership roles & society membership'
            ],
            'education_details' => [
                ['institution' => "St. Xavier's College", 'degree' => 'BIM', 'year' => 'Present'],
                ['institution' => "St. Mary's High School", 'degree' => 'Grade 12', 'year' => '2021']
            ]
        ]);

        // 3. Projects
        $projects = [
            ['title'=>'Brain Champ','img'=>'brainchamp.jpeg','desc'=>'C-based quiz game with interactive learning features.','category'=>'c','tech'=>['C']],
            ['title'=>'Traffic Management System','img'=>'trafficmanagementsystem.jpeg','desc'=>'Real-time traffic control system using HTML, CSS, JS, and PHP.','category'=>'js','tech'=>['HTML','CSS','JS','PHP']],
            ['title'=>'Harati Webpage','img'=>'haratiwebpage.jpeg','desc'=>'Built using HTML, CSS, JS, PHP and Python for digital billing.','category'=>'js','tech'=>['HTML','CSS','JS','PHP','Python']],
            ['title'=>'.NET Core Website','img'=>'dotnet.png','desc'=>'Full website built using .NET Core framework.','category'=>'dotnet','tech'=>['.NET Core']],
            ['title'=>'Inventory Management','img'=>'inventory.jpeg','desc'=>'Python + HTML/CSS/JS/PHP system with CRUD and billing.','category'=>'python','tech'=>['Python','HTML','CSS','JS','PHP']],
            ['title'=>'Gold Shop Chatbot','img'=>'goldshop.jpeg','desc'=>'Python + HTML/CSS/JS/PHP interactive chatbot.','category'=>'python','tech'=>['Python','HTML','CSS','JS','PHP']],
            ['title'=>'Employee Login System','img'=>'employeelogin.png','desc'=>'Python + HTML/CSS/JS/PHP secure login and dashboard.','category'=>'python','tech'=>['Python','HTML','CSS','JS','PHP']],
            ['title'=>'Portfolio','img'=>'portfolio.jpeg','desc'=>'Laravel-based portfolio site.','category'=>'laravel','tech'=>['Laravel']],
            ['title'=>'Harati System','img'=>'haratisystem.jpeg','desc'=>'Laravel-based inventory and billing system.','category'=>'laravel','tech'=>['Laravel']],
        ];

        foreach ($projects as $p) {
            \App\Models\Project::updateOrCreate(
                ['title' => $p['title']],
                [
                    'image_path' => 'img/project/' . $p['img'],
                    'description' => $p['desc'],
                    'category' => $p['category'],
                    'tech_stack' => $p['tech']
                ]
            );
        }

        // 4. Gallery
        $galleryImages = glob(public_path('img/gallery/*.{jpg,png,jpeg,gif}'), GLOB_BRACE);
        foreach ($galleryImages as $img) {
            $path = 'img/gallery/' . basename($img);
            \App\Models\Gallery::updateOrCreate(
                ['image_path' => $path],
                ['title' => 'Gallery Image']
            );
        }
    }
}
