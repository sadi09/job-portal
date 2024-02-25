<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'password'];
    protected $fillable = [
        "company_name",
        "contact_number",
        "company_description",
        "company_website",
        "password",
    ];

    public function industry()
    {
        return $this->belongsTo(IndustryType::class);
    }
}
