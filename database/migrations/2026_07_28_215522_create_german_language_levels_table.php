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
        Schema::create('german_language_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name'); // A1, A2, B1, B2, C1, C2
            $table->string('level_code')->unique(); // A1, A2, B1, B2, C1, C2
            $table->string('title');
            $table->text('short_description');
            $table->string('duration')->nullable();
            $table->string('class_type')->nullable(); // Online, Physical, Hybrid
            $table->string('class_schedule')->nullable(); // Morning, Day, Evening, Weekend
            $table->string('course_fee')->nullable();
            $table->string('exam_name')->nullable(); // Goethe, TELC, TestDaF
            $table->boolean('certificate')->default(false);
            $table->integer('students_count')->default(0);
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('background_color')->default('#ffffff');
            $table->string('text_color')->default('#1e293b');
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('animation')->default('fade-up');
            $table->string('ribbon')->nullable(); // Most Popular, Recommended, etc.
            $table->integer('display_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('german_language_levels');
    }
};
