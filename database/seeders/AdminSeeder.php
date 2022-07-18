<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        $user = User::create([
            'name' => 'Mostafa elnemr', 
            'email' => 'admin@mail',
            'password' => bcrypt('123456789')
         ]);

         $role = Role::create(['name' => 'Admin']);
         $permissions = Permission::pluck('id','id')->all(); 
         $role->syncPermissions($permissions);
         $user->assignRole([$role->id]);
    }
}
