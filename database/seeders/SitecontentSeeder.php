<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Contact;
use App\Models\JobCategory;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SitecontentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyInfo::create([
            'name' => 'Your Company Name',
            'address' => 'Company Address',
            'phone' => '1234567890',
            'email' => 'company@example.com',
            'fax' => '0987654321',
            'logo' => 'company_logo.png',
            'motto' => 'Your Company Motto',
        ]);

        // Seed Slider
        Slider::create([
            'title' => 'Slider Title',
            'text' => 'Slider Text',
            'img' => 'slider_image.png',
            'link' => 'https://example.com',
        ]);

        // Seed Job Categories
        JobCategory::create([
            'name' => 'Category Name',
            'icon' => 'category_icon.png',
        ]);

        // Seed Testimonials
//        Testimonial::create([
//            'review' => 'Client review text',
//            'employeer_id' => 1,
//        ]); /* need to create this after creating employeer table */

        // Seed About
        About::create([
            'title' => 'About Us',
            'content' => "<h1 class='mb-4'>We Help To Get The Best Job And Find A Talent</h1>
                <p class='mb-4'>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p><i class='fa fa-check text-primary me-3'></i>Tempor erat elitr rebum at clita</p>
                <p><i class='fa fa-check text-primary me-3'></i>Aliqu diam amet diam et eos</p>
                <p><i class='fa fa-check text-primary me-3'></i>Clita duo justo magna dolore erat amet</p>
                <a class='btn btn-primary py-3 px-5 mt-3' href=''>Read More</a>",
        ]);

        // Seed Contact
        Contact::create([
            'title' => 'Contact Us',
            'content' => 'Contact us content goes here.',
            'receive_email' => true,
            'location_lat_long' => '40.7128,-74.0060',
        ]);
    }
}
