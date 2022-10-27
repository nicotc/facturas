<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Services\Entities\Service;
use Spatie\Permission\Models\Permission;
use Modules\Inventory\Entities\Inventory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $root = User::create([
            'name' => 'Root',
            'email' => 'root@gmail.com',
            'password' => bcrypt('root'),
        ]);

        $role = Role::create(['name' => 'root', 'guard_name' => 'web']);

        $root->assignRole($role);

        $permissions = Permission::create(
            ['name' => 'users_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'users_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'users_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'users_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'users_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'roles_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'roles_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'roles_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'roles_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'roles_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);



        $permissions = Permission::create(
            ['name' => 'client_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'client_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'client_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'client_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'client_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);



        $permissions = Permission::create(
            ['name' => 'provider_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'provider_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'provider_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'provider_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'provider_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);





        $permissions = Permission::create(
            ['name' => 'budget_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'budget_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'budget_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'budget_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'budget_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);


        $permissions = Permission::create(
            ['name' => 'inventory_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'inventory_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'inventory_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'inventory_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'inventory_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);



        $permissions = Permission::create(
            ['name' => 'services_create', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'services_edit', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'services_delete', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'services_list', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);

        $permissions = Permission::create(
            ['name' => 'services_show', 'guard_name' => 'web'],
        );
        $role->givePermissionTo($permissions);





        $sevice = Service::create(
            ['name' => 'Plomeria', 'description' => 'Plomeria ( anexos ) muchos puntos'],
        );
        $sevice = Service::create(
            ['name' => 'Electricidad', 'description' => 'Electricidad'],
        );
        $sevice = Service::create(
            ['name' => 'Techos de yeso o Draywall', 'description' => 'Techos de yeso o Draywall'],
        );
        $sevice = Service::create(
            ['name' => 'Albañilería', 'description' => 'Albañilería ( colocación de porcelanto + levantamiento de paredes + nichos + embonados + etc)'],
        );
        $sevice = Service::create(
            ['name' => 'Masticado', 'description' => 'Masticado ( paredes y techos )'],
        );
        $sevice = Service::create(
            ['name' => 'Pintura', 'description' => 'Pintura ( paredes y techos )'],
        );
        $sevice = Service::create(
            ['name' => 'Carpintería', 'description' => 'Carpintería ( CLOSESTS + cocina + vestier + muebles de baños + etc )'],
        );
        $sevice = Service::create(
            ['name' => 'Cristalería', 'description' => 'Cristalería ( puertas de Baños + espejos + fachadas + laminados + templados )'],
        );
        $sevice = Service::create(
            ['name' => 'Jardín vertical', 'description' => 'Jardín vertical'],
        );
        $sevice = Service::create(
            ['name' => 'Demolición', 'description' => 'Demolición'],
        );

        $product = Inventory::create(
            [
                'name' => 'Cemento',
                'description' => 'Cemento',
                'image' => "",
                'stock' => 0,
                'stock_alert'   => 0,
                'price' => 0,
                'cost' => 50,
                'type' => 'onDemand',
        ],
        );


        $product = Inventory::create(
            [
                'name' => 'Silicona',
                'description' => 'silicona',
                'image' => "",
                'stock' => 10,
                'stock_alert'   => 2,
                'price' => 10,
                'cost' => 50,
                'type' => 'Inventory',
            ],
        );





    }
}