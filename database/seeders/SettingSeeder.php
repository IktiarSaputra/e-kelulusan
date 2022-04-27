<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
                'name_school' => 'SMAN 48 Jakarta',
                'year' => '2022',
                'year_start' => '2021',
                'year_end' => '2022',
                'date_announcement' => '2022-04-01 09:00:00',
            ]
        ];

        foreach ($setting as $key => $value) {
            Setting::create($value);
        }
    }
}
