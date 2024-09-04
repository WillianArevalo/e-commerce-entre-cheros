<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Entre Cheros',
            ],
            [
                'key' => 'site_in_maintenance',
                'value' => '0',
            ]
        ];
        Settings::insert($settings);
    }
}