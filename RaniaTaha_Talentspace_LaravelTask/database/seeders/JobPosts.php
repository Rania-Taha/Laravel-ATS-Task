<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class JobPosts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_posts')->insert([
            'title' => 'Front end engineer (Internship)',
            'location' => 'Amman - Jordan',
            'job_type' => 'Full Time',
            'deadline' => '2024-03-01',
            'created_at' => '2023-11-11',
            'responsibility' => 'Develop web applications using React, Angular
            Work with back-end engineers to integrate front-end and back-end systems
            Fix bugs and resolve technical issues',
            'qualifications' => 'HTML, CSS, and JavaScript
            Front-end framework (React.js, Node.js,Angular)
            CSS framework (Tailwind, bootstrap)
            UI/UX design Tools (Adobe XD,Figma,Sketch)',
            'job_description' => 'Talentspace.ai is a fast growing teach company that is passionate about building innovative and user-friendly products. We are looking for a talented and motivated front end engineer intern to join our team and help us create the next generation of our products.',
        ]);
        DB::table('job_posts')->insert([
            'title' => 'Back end engineer ',
            'location' => 'Amman - Jordan',
            'job_type' => 'Part Time',
            'deadline' => '2023-12-01',
            'created_at' => '2023-11-11',
            'responsibility' => 'Develop web applications using React, Angular
            Work with back-end engineers to integrate front-end and back-end systems
            Fix bugs and resolve technical issues',
            'qualifications' => 'HTML, CSS, and JavaScript
            Front-end framework (React.js, Node.js,Angular)
            CSS framework (Tailwind, bootstrap)
            UI/UX design Tools (Adobe XD,Figma,Sketch)',
            'job_description' => 'Talentspace.ai is a fast growing teach company that is passionate about building innovative and user-friendly products. We are looking for a talented and motivated front end engineer intern to join our team and help us create the next generation of our products.',
        ]);
        DB::table('job_posts')->insert([
            'title' => 'UIUX Engineer',
            'location' => 'Amman - Jordan',
            'job_type' => 'Full Time',
            'deadline' => '2023-12-01',
            'created_at' => '2023-11-11',
            'responsibility' => 'Develop web applications using React, Angular
            Work with back-end engineers to integrate front-end and back-end systems
            Fix bugs and resolve technical issues',
            'qualifications' => 'HTML, CSS, and JavaScript
            Front-end framework (React.js, Node.js,Angular)
            CSS framework (Tailwind, bootstrap)
            UI/UX design Tools (Adobe XD,Figma,Sketch)',
            'job_description' => 'Talentspace.ai is a fast growing teach company that is passionate about building innovative and user-friendly products. We are looking for a talented and motivated front end engineer intern to join our team and help us create the next generation of our products.',
        ]);
    }
}
