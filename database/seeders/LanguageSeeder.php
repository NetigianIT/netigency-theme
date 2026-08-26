<?php

namespace Database\Seeders;

use App\Models\Admin\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::firstOrCreate(
            ['language_code' => Language::CODE_ENGLISH],
            [
                'language_name' => 'English',
                'direction' => 0,
                'status' => 1,
                'display_dropdown' => 1,
                'default_site_language' => 1,
            ]
        );

        Language::firstOrCreate(
            ['language_code' => Language::CODE_BENGALI],
            [
                'language_name' => 'Bengali',
                'direction' => 0,
                'status' => 0,
                'display_dropdown' => 1,
                'default_site_language' => 0,
            ]
        );
    }
}
