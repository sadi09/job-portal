<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Contactus;
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

        // Seed Contactus
        Contactus::create([
            'title' => 'Contactus Us',
            'content' => 'Contactus us content goes here.',
            'receive_email' => CompanyInfo::find(1)->email,
            'location_embed_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd',
        ]);
    }
}
