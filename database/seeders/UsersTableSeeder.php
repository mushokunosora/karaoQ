<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::firstOrCreate([
            'email' => 'jspaul2003@gmail.com',
            'name' => 'js paul',
            'password' => \Hash::make('napoleon1'),
        ]);
    }
}
