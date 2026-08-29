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
        Schema::table('fixed_contents', function (Blueprint $table) {
            if (! Schema::hasColumn('fixed_contents', 'thumbnail_image_light')) {
                $table->text('thumbnail_image_light')->nullable()->after('thumbnail_image');
            }
        });

        Schema::table('abouts', function (Blueprint $table) {
            if (! Schema::hasColumn('abouts', 'about_image_light')) {
                $table->text('about_image_light')->nullable()->after('about_image');
            }
        });

        Schema::table('skills', function (Blueprint $table) {
            if (! Schema::hasColumn('skills', 'skill_image_light')) {
                $table->text('skill_image_light')->nullable()->after('skill_image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fixed_contents', function (Blueprint $table) {
            if (Schema::hasColumn('fixed_contents', 'thumbnail_image_light')) {
                $table->dropColumn('thumbnail_image_light');
            }
        });

        Schema::table('abouts', function (Blueprint $table) {
            if (Schema::hasColumn('abouts', 'about_image_light')) {
                $table->dropColumn('about_image_light');
            }
        });

        Schema::table('skills', function (Blueprint $table) {
            if (Schema::hasColumn('skills', 'skill_image_light')) {
                $table->dropColumn('skill_image_light');
            }
        });
    }
};
