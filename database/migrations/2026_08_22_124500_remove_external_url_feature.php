<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('external_urls');

        if (Schema::hasTable('permissions')) {
            $permission = DB::table('permissions')
                ->where('name', 'external url check')
                ->first();

            if ($permission) {
                if (Schema::hasTable('role_has_permissions')) {
                    DB::table('role_has_permissions')
                        ->where('permission_id', $permission->id)
                        ->delete();
                }

                if (Schema::hasTable('model_has_permissions')) {
                    DB::table('model_has_permissions')
                        ->where('permission_id', $permission->id)
                        ->delete();
                }

                DB::table('permissions')->where('id', $permission->id)->delete();
            }

            app()[PermissionRegistrar::class]->forgetCachedPermissions();
        }

        if (Schema::hasTable('panel_keywords')) {
            DB::table('panel_keywords')->where('key', 'external_url')->delete();
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('external_urls')) {
            Schema::create('external_urls', function ($table) {
                $table->id();
                $table->unsignedBigInteger('language_id');
                $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
                $table->string('btn_name')->nullable();
                $table->text('btn_link')->nullable();
                $table->integer('status')->default(1);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('permissions')) {
            $exists = DB::table('permissions')
                ->where('name', 'external url check')
                ->exists();

            if (! $exists) {
                DB::table('permissions')->insert([
                    'name' => 'external url check',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            app()[PermissionRegistrar::class]->forgetCachedPermissions();
        }

        if (Schema::hasTable('panel_keywords')) {
            $exists = DB::table('panel_keywords')
                ->where('key', 'external_url')
                ->exists();

            if (! $exists) {
                DB::table('panel_keywords')->insert([
                    'language_id' => 1,
                    'key' => 'external_url',
                    'value' => 'External Url',
                ]);
            }
        }
    }
};
