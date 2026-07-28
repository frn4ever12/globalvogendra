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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->onDelete('cascade');
            $table->string('section_type'); // heading, sub_heading, paragraph, rich_text, single_image, two_images, image_gallery, video, youtube_embed, table, bullet_list, number_list, faq, accordion, download_file, quote, call_to_action, button, apply_now, contact_form, related_pages
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('image2')->nullable(); // For two images
            $table->json('gallery')->nullable(); // For image gallery
            $table->string('video_url')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('file')->nullable(); // For download files
            $table->json('items')->nullable(); // For lists, FAQs, accordions
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
