<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('permissions')) {
            $permission = DB::table('permissions')
                ->where('name', 'clear cache check')
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
            DB::table('panel_keywords')->where('key', 'optimizer')->delete();
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('permissions')) {
            $exists = DB::table('permissions')
                ->where('name', 'clear cache check')
                ->exists();

            if (! $exists) {
                DB::table('permissions')->insert([
                    'name' => 'clear cache check',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            app()[PermissionRegistrar::class]->forgetCachedPermissions();
        }

        if (Schema::hasTable('panel_keywords')) {
            $exists = DB::table('panel_keywords')
                ->where('key', 'optimizer')
                ->exists();

            if (! $exists) {
                DB::table('panel_keywords')->insert([
                    'language_id' => 1,
                    'key' => 'optimizer',
                    'value' => 'Optimizer',
                ]);
            }
        }
    }
};
