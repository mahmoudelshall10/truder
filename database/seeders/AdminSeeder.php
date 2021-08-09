<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
        ])->first();

        if(!$user)
        {
            $user = User::create([
                'name'     => 'admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'role_id'  => 1,
            ]);
        }

        $user->assignRole('admin');

    }
}
