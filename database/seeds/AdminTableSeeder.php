<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [ 'code' => 'admin', 'username' => 'admin', 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin@123'), 'phone' => '012345678', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
        ];

        $super_admin = [
            [ 'code' => 'super_admin', 'username' => 'super_admin', 'name' => 'Super Admin', 'email' => 'super_admin@gmail.com', 'password' => bcrypt('admin@123'), 'phone' => '012345678', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
        ];
        DB::table('admins')->insert($super_admin);
        DB::table('admins')->insert($admin);
    }
}
