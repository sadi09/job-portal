<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobCategories = [
            'HR',
            'Project Management',
            'Business Development',
            'UI/UX',
            'IT Support',
            'Marketing',
            'Finance',
            'Sales',
            'Customer Service',
            'Software Development',
            'Data Science',
            'Graphic Design',
            'Healthcare',
            'Education',
            'Engineering',
            'Legal',
            'Research and Development',
            'Quality Assurance',
            'Operations',
            'Media and Communications',
            'Architecture',
            'Consulting',
            'Social Services',
            'Transportation',
        ];

        foreach ($jobCategories as $category) {
            JobCategory::create(['name' => $category, 'icon' => '']);
        }
    }
}
