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
                ->where('name', 'subscribe check')
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
            DB::table('panel_keywords')->whereIn('key', [
                'subscribers',
                'add_subscriber',
            ])->delete();
        }

        if (Schema::hasTable('frontend_keywords')) {
            DB::table('frontend_keywords')->whereIn('key', [
                'subscribe_newsletter',
                'enter_email',
            ])->delete();
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('permissions')) {
            $exists = DB::table('permissions')
                ->where('name', 'subscribe check')
                ->exists();

            if (! $exists) {
                DB::table('permissions')->insert([
                    'name' => 'subscribe check',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            app()[PermissionRegistrar::class]->forgetCachedPermissions();
        }
    }
};
