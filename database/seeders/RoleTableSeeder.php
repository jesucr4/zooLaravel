<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'administrador';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'user';
        $role->save();
    }
}
