<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Tạo vai trò
        $super_admin = Role::create(['name' => 'super_admin']);
        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);

        // Gán vai trò
        Admin::find(1)->assignRole('super_admin');
        Admin::find(2)->assignRole('admin');


        // Tạo quyền
        // Đơn Nhập hàng
        $category_manager = Permission::create(['name' => 'category_manager']);
        $project_manager = Permission::create(['name' => 'project_manager']);
        $contract_manager = Permission::create(['name' => 'contract_manager']);
        $transaction_manager = Permission::create(['name' => 'transaction_manager']);
        $statistic_manager = Permission::create(['name' => 'statistic_manager']);
        $news_manager = Permission::create(['name' => 'news_manager']);
        $staff_manager = Permission::create(['name' => 'staff_manager']);
        $role_manager = Permission::create(['name' => 'role_manager']);
        $permission_manager = Permission::create(['name' => 'permission_manager']);

        // Set quyền cho vai trò super_admin
        $super_admin->givePermissionTo($category_manager);
        $super_admin->givePermissionTo($project_manager);
        $super_admin->givePermissionTo($contract_manager);
        $super_admin->givePermissionTo($transaction_manager);
        $super_admin->givePermissionTo($statistic_manager);
        $super_admin->givePermissionTo($news_manager);
        $super_admin->givePermissionTo($staff_manager);
        $super_admin->givePermissionTo($role_manager);
        $super_admin->givePermissionTo($permission_manager);

        // Set quyền cho vai trò admin
        $admin->givePermissionTo($category_manager);
        $admin->givePermissionTo($project_manager);
        $admin->givePermissionTo($contract_manager);
        $admin->givePermissionTo($transaction_manager);
        $admin->givePermissionTo($statistic_manager);
        $admin->givePermissionTo($news_manager);
        $admin->givePermissionTo($staff_manager);
        $admin->givePermissionTo($role_manager);
        $admin->givePermissionTo($permission_manager);

        // Set quyền cho vai trò staff
        $staff->givePermissionTo($category_manager);
        $staff->givePermissionTo($project_manager);
        $staff->givePermissionTo($contract_manager);
        $staff->givePermissionTo($transaction_manager);
    }
}
