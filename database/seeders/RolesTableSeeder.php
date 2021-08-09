<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role1  = Role::create(['name' => 'admin', 'guard_name'=>'web']);
        $role2  = Role::create(['name' => 'user' , 'guard_name'=>'api']);
    }
}