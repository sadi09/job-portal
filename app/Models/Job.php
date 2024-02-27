<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'vacancy',
        'type',
        'job_categories_id',
        'location',
        'salary_lower_limit',
        'salary_upper_limit',
        'deadline',
        'description',
        'experience_requirements',
        'education_requirements',
        'skills_and_qualifications',
        'application_instructions',
        'contact_information',
        'isRemote',
        'employer_id',
        'status'
    ];
}
