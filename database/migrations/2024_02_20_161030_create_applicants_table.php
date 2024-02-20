<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('full_name');
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('contact_number');
            // Additional columns for profile information
            $table->text('resume');
            $table->text('career_summery')->nullable();
            $table->text('skills')->nullable();
            $table->text('education_history')->nullable();
            $table->text('work_experience')->nullable();
            // Additional information
            $table->string('profile_picture')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->string('portfolio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
