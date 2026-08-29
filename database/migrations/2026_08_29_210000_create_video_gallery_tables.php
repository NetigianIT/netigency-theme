<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('category_name');
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->string('category_slug')->nullable();
            $table->timestamps();
        });

        Schema::create('video_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('video_categories')->onDelete('cascade');
            $table->string('category_name')->nullable();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('video_url');
            $table->string('provider', 20)->default('youtube');
            $table->string('video_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->default(0);
            $table->string('video_slug')->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('sections')) {
            $exists = DB::table('sections')->where('section', 'videos_section')->exists();
            if (! $exists) {
                DB::table('sections')->insert([
                    'title' => 'Videos Section',
                    'section' => 'videos_section',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if (class_exists(Permission::class)) {
            $permission = Permission::firstOrCreate(['name' => 'videos check', 'guard_name' => 'web']);
            foreach (['admin', 'super-admin', 'editor'] as $roleName) {
                $role = Role::where('name', $roleName)->first();
                if ($role && ! $role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            }
        }

        if (Schema::hasTable('panel_keywords')) {
            $panelKeys = [
                'videos' => 'Videos',
                'add_video' => 'Add Video',
                'edit_video' => 'Edit Video',
                'video_url' => 'Video URL',
                'video_url_help' => 'Paste a YouTube or Vimeo video link.',
            ];
            foreach ($panelKeys as $key => $value) {
                $exists = DB::table('panel_keywords')->where('language_id', 1)->where('key', $key)->exists();
                if (! $exists) {
                    DB::table('panel_keywords')->insert([
                        'language_id' => 1,
                        'key' => $key,
                        'value' => $value,
                    ]);
                }
            }
        }

        if (Schema::hasTable('frontend_keywords')) {
            $exists = DB::table('frontend_keywords')->where('language_id', 1)->where('key', 'videos')->exists();
            if (! $exists) {
                DB::table('frontend_keywords')->insert([
                    'language_id' => 1,
                    'key' => 'videos',
                    'value' => 'Videos',
                ]);
            }
            $existsAll = DB::table('frontend_keywords')->where('language_id', 1)->where('key', 'all')->exists();
            if (! $existsAll) {
                DB::table('frontend_keywords')->insert([
                    'language_id' => 1,
                    'key' => 'all',
                    'value' => 'All',
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('video_items');
        Schema::dropIfExists('video_categories');

        if (Schema::hasTable('sections')) {
            DB::table('sections')->where('section', 'videos_section')->delete();
        }

        if (class_exists(Permission::class)) {
            Permission::where('name', 'videos check')->delete();
        }

        if (Schema::hasTable('panel_keywords')) {
            DB::table('panel_keywords')->whereIn('key', [
                'videos', 'add_video', 'edit_video', 'video_url', 'video_url_help',
            ])->delete();
        }

        if (Schema::hasTable('frontend_keywords')) {
            DB::table('frontend_keywords')->where('key', 'videos')->delete();
        }
    }
};
