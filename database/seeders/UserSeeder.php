<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@sma48jkt.sch.id',
                'password' => bcrypt('adminsma48jkt'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
