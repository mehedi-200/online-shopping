<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage_category', 'display_name' => 'Manage Category']);
        Permission::create(['name' => 'manage_subcategory', 'display_name' => 'Manage Subcategory']);
        Permission::create(['name' => 'manage_product', 'display_name' => 'Manage Product']);
        Permission::create(['name' => 'pending_order', 'display_name' => 'Pending Order']);
        Permission::create(['name' => 'processing_order', 'display_name' => 'Processing Order']);
        Permission::create(['name' => 'completed_order', 'display_name' => 'Completed Order']);
        Permission::create(['name' => 'manage_settings', 'display_name' => 'Manage Settings']);
        Permission::create(['name'=> 'cancelled_order','display_name'=>'Cancelled Order']);
        Permission::create(['name' => 'manage_users', 'display_name' => 'Manage Users']);
        Permission::create(['name' => 'manage_roles', 'display_name' => 'Manage Roles']);
        Permission::create(['name' => 'manage_activity', 'display_name' => 'Manage Activity']);
        Permission::create(['name' => 'manage_slide', 'display_name' => 'Manage Slide']);
        Permission::create(['name' => 'manage_advertisement', 'display_name' => 'Manage Advertisement']);
    }
}
