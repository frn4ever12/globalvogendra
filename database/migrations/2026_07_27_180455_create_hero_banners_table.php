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
        Schema::create('hero_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('desktop_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('overlay_color')->default('rgba(0,0,0,0.5)');
            $table->integer('overlay_opacity')->default(50);
            $table->enum('text_position', ['left', 'center', 'right'])->default('center');
            $table->string('text_color')->default('#ffffff');
            $table->string('button_color')->default('#007bff');
            $table->string('button_text_color')->default('#ffffff');
            $table->boolean('enable_dark_overlay')->default(true);
            $table->boolean('enable_gradient')->default(true);
            $table->enum('banner_height', ['small', 'medium', 'large', 'full_screen'])->default('large');
            $table->integer('display_order')->default(0);
            $table->boolean('status')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_banners');
    }
};
