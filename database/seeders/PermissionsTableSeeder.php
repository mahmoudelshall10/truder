<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $list = ['dashboards.index','profile','generalInfo','changeImage','changePassword','settings.index'];

    // public $visitor = ['all-articles.index'];

    public function run()
    {
        $role = Role::find(1);

        foreach (config('permission.modules') as $module) {

            foreach (config('permission.permissions') as $permission) {

                $permission = Permission::create([
                    'name' => 'admin.'. $module . '.' . $permission,
                    'guard_name' => 'web'
                ]);

                $role->permissions()->save($permission);
            }
        }
        
        foreach($this->list as $i)
        {
            $permission = Permission::create([
                'name' => 'admin.'. $i,
                'guard_name' => 'web'
                ]);

            $role->permissions()->save($permission);
        }

        // $role2 = Role::find(2);

        // foreach($this->visitor as $i)
        // {
        //     $permission2 = Permission::create([
        //         'name' => $i,
        //         'guard_name' => 'api'
        //         ]);

        //     $role2->permissions()->save($permission2);
        // }

        



    }
}
