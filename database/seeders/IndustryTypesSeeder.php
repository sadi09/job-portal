<?php

namespace Database\Seeders;

use App\Models\IndustryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industryTypes = [
            'Undefined',
            'Information Technology and Services',
            'Healthcare',
            'Financial Services',
            'Education',
            'Manufacturing',
            'Retail',
            'E-commerce',
            'Real Estate',
            'Hospitality',
            'Automotive',
            'Telecommunications',
            'Energy',
            'Media and Entertainment',
            'Construction',
            'Food and Beverage',
            'Travel and Tourism',
            'Consulting',
            'Marketing and Advertising',
            'Transportation',
            'Pharmaceuticals',
            'Biotechnology',
            'Fashion',
            'Non-profit Organization',
            'Legal Services',
            'Agriculture',
            'Environmental Services',
            'Architecture',
            'Sports and Recreation',
            'Government',
            'Aerospace and Defense',
        ];

        foreach ($industryTypes as $industryType) {
            IndustryType::create(['name' => $industryType]);
        }
    }
}
