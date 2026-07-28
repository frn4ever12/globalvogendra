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
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('image')->nullable()->after('description');
            $table->string('button_text')->default('Learn More')->after('image');
            $table->string('text_color')->default('#333333')->after('button_text');
            $table->string('background_color')->default('#ffffff')->after('text_color');
            $table->integer('display_order')->default(0)->after('background_color');
            $table->boolean('status')->default(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn(['title', 'image', 'button_text', 'text_color', 'background_color', 'display_order']);
        });
    }
};
