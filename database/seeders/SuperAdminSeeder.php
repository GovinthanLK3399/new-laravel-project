<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\Artisan;
use File;
use Config;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client= Client::where('is_superadmin',1)->first();
        if(empty($client)){
            $client = Client::create([
                'company_name' => 'securenext',
                'username'     => 'admin',
                'email'        => 'superadmin@gmail.com',
                'mobile'       => '9999999999',
                'is_superadmin'=> 1,
                'is_approved'  => 1,
                'is_subscribed'=> 1
    
            ]);
           
        }
        $user= User::where('email','superadmin@gmail.com')->first();
        $password =  'superadmin123';
        $hashPassword= Hash::make($password);
        if(empty($user)){
            $user = User::create([
            'name'      => 'adminuser', 
            'display_name'=>'adminuser',
            'phone'     => '9876543210',
            'email'     => 'superadmin@gmail.com',
            'password'  => $hashPassword,
            'client_id' => $client->id,
            'primary_admin'=>1
        ]);
            $this->command->info('Superadmin created successfully.');
            $role = Role::create(['name' => 'Superadmin']);

            // dd ($role);
            Artisan::call('permission:create-permission-routes');
            $permissions = Permission::pluck('id','id')->all();
    
            $data = [];
            foreach($permissions as $permission){
                $data[]=[
                    'permission_id'=> $permission,
                    'role_id'=> $role->id,
                    'client_id'=> $client->id
                ];
            }
            $role_has_permissions=RoleHasPermission::insert($data);
            //$role->syncPermissions($permissions);
        
            $user->assignRole([$role->id]);
        }
        else{
            $user->client_id=$client->id;
            $user->update();
            $this->command->info('Client updated successfully.');
        }
        //php artisan permission:create-permission-routes
        //php artisan db:seed --class=CreateSuperadminUserSeeder
        //php artisan s3bucket:upload-files
    }
}
