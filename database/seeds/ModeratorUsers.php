<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class ModeratorUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUsers = ['admin', 'komol', 'manager'];

        foreach ($adminUsers as $user) {
            \App\Models\User::create([
                'name' => ucfirst($user),
                'email' => $user . '@gmail.com',
                'password' => Hash::make('Test.123'),
                'type' => 1,
            ]);
        }
    }
}
