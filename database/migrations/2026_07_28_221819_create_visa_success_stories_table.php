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
        Schema::create('visa_success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('country');
            $table->string('city')->nullable();
            $table->string('university');
            $table->string('course');
            $table->string('intake')->nullable();
            $table->date('visa_date')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('student_image')->nullable();
            $table->string('visa_image')->nullable();
            $table->string('passport_image')->nullable();
            $table->text('testimonial')->nullable();
            $table->integer('rating')->default(5);
            $table->string('video_url')->nullable();
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
        Schema::dropIfExists('visa_success_stories');
    }
};
