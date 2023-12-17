<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Cliente']);

        Permission::create(['name'=>'home'])->syncRoles([$role1]);

        Permission::create(['name'=>'plans'])->syncRoles([$role1]);
        Permission::create(['name'=>'dashboard'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'dashboardPRO'])->syncRoles([$role1]);
        Permission::create(['name'=>'card'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'cardBusiness'])->syncRoles([$role1]);
}
}