<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers');
            $table->foreignId('job_categories_id')->constrained('job_categories');
            $table->string('title');
            $table->integer('vacancy')->default('1');
            $table->enum('type', ['full time', 'part time', 'contractual', 'internship']);
            $table->string('location');
            $table->decimal('salary_lower_limit', 10, 2);
            $table->decimal('salary_upper_limit', 10, 2);
            $table->date('deadline');
            $table->text('description');
            $table->date('published_at')->nullable();
            $table->enum('status', ['draft', 'published', 'cancelled']);
            $table->enum('isRemote', ['0', '1'])->default(0);

            // Additional Fields
            $table->integer('experience_requirements')->nullable();
            $table->string('education_requirements')->nullable();
            $table->text('skills_and_qualifications')->nullable();
            $table->text('application_instructions')->nullable();
            $table->string('contact_information')->nullable();
            $table->date('application_deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
