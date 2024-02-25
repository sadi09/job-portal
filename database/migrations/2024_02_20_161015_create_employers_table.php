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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('company_name');
            $table->string('password')->nullable();
            $table->foreignId('industry_type_id')->default('1')->constrained('industry_types');
            $table->string('contact_number')->nullable();
            // Company information
            $table->string('company_logo')->nullable();
            $table->text('company_description')->nullable();
            $table->string('company_website')->nullable();
            $table->enum('status', ['pending', 'approved', 'suspended'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
