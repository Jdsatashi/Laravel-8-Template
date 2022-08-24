<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'user']);
        $permissions = Permission::pluck('id','id')->where('id', '<=', '24');
        $role->syncPermissions($permissions);

//        $role2 = Role::create(['name' => 'test']);
//        $per = Permission::where([
//            ['name', '=', 'home' ],
//            ['name', '=', 'login' ],
//            ['name', '=', 'logout' ],
//            ['name', '=', 'register' ],
//        ]);
//        $role2->syncPermissions($per);
    }
}
