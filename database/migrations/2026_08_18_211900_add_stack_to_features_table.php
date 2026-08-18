<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->string('stack', 20)->default('supporting')->after('order');
        });

        $mainTitles = ['Laravel', 'Vue.js', 'PHP', 'Node.js', 'MySQL', 'React.js'];

        DB::table('features')
            ->whereIn('title', $mainTitles)
            ->update(['stack' => 'main']);
    }

    public function down(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropColumn('stack');
        });
    }
};
