<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
    // $role_name = [
        
    //     ['name' => 'Blog'],
    //     ['name' => 'Editor'],
    // ];
    // foreach($role_name as $v){
    //     return $v ;
    // }
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
        $user_data = [
            [
                'name' => 'editor', 
                'email' => 'editor@gmail.com',
                'password' => bcrypt('123456'),  
            ],
            [
                'name' => 'Blog', 
                'email' => 'blog@gmail.com',
                'password' => bcrypt('123456')
            ],
        ];
         foreach($user_data as $key => $vlaue ){
            User::create($vlaue);
         };
    }
}
