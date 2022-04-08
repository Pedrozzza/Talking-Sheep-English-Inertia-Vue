<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit web']);
        Permission::create(['name' => 'control lessons']);
        Permission::create(['name' => 'beginners lessons']);
        Permission::create(['name' => 'intermediate lessons']);
        Permission::create(['name' => 'advanced lessons']);

        // create roles and assign permissions
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo('edit web','control lessons', 'beginners lessons', 'intermediate lessons', 'advanced lessons');

        $moderatorRole = Role::create(['name' => 'moderator']);
        $moderatorRole->givePermissionTo('control lessons', 'beginners lessons', 'intermediate lessons', 'advanced lessons');

        $beginnerRole = Role::create(['name' => 'beginner']);
        $beginnerRole->givePermissionTo('beginners lessons');

        $intermediateRole = Role::create(['name' => 'intermediate']);
        $intermediateRole->givePermissionTo('beginners lessons', 'intermediate lessons');

        $advancedRole = Role::create(['name' => 'advanced']);
        $advancedRole->givePermissionTo('beginners lessons', 'intermediate lessons', 'advanced lessons');

        //create Admin user
        $admin = User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PW')),
        ]);

        $admin->assignRole($adminRole);
    }
}
