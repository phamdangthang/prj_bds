<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hihi = [
            [ 'username' => 'admin', 'name' => 'Supper Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin@123'), 'phone' => '0123456789', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
        ];
        DB::table('admins')->insert($hihi);
        
        // Role::create(['name' => 'super_admin']);
        // Admin::find(1)->assignRole('super_admin');
    }
}
