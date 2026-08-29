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
            $table->string('animated_title_1')->nullable()->after('title');
            $table->string('animated_title_2')->nullable()->after('animated_title_1');
            $table->string('animated_title_3')->nullable()->after('animated_title_2');
            $table->string('animated_title_4')->nullable()->after('animated_title_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fixed_contents', function (Blueprint $table) {
            $table->dropColumn([
                'animated_title_1',
                'animated_title_2',
                'animated_title_3',
                'animated_title_4',
            ]);
        });
    }
};
