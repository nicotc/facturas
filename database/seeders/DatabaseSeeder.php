<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Services\Entities\Service;
use Spatie\Permission\Models\Permission;
use Modules\Inventory\Entities\Inventory;
use Modules\Contact\Entities\ContactAddress;
use Modules\Contact\Entities\ContactsClient;
use Modules\Contact\Entities\Contact;

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
            'email' => 'nicotestagrossa@gmail.com',
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
            ['name' => 'Alba??iler??a', 'description' => 'Alba??iler??a ( colocaci??n de porcelanto + levantamiento de paredes + nichos + embonados + etc)'],
        );
        $sevice = Service::create(
            ['name' => 'Masticado', 'description' => 'Masticado ( paredes y techos )'],
        );
        $sevice = Service::create(
            ['name' => 'Pintura', 'description' => 'Pintura ( paredes y techos )'],
        );
        $sevice = Service::create(
            ['name' => 'Carpinter??a', 'description' => 'Carpinter??a ( CLOSESTS + cocina + vestier + muebles de ba??os + etc )'],
        );
        $sevice = Service::create(
            ['name' => 'Cristaler??a', 'description' => 'Cristaler??a ( puertas de Ba??os + espejos + fachadas + laminados + templados )'],
        );
        $sevice = Service::create(
            ['name' => 'Jard??n??vertical', 'description' => 'Jard??n??vertical'],
        );
        $sevice = Service::create(
            ['name' => 'Demolici??n', 'description' => 'Demolici??n'],
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



        //crear clientes

        $clientes = Contact::create(
            [
                'name' => 'Juan',
                'last_name' => 'Perez',
                'gender' => 'Masculino',
                'email' => 'jperez@gmail.com',
                'phone_home' => '12345678',
                'phone_mobile' => '12345678',
                'address' => 'Calle 1',
                'notes' => 'Ninguna',
                'type' => 'client'
            ]);


            ContactsClient::create(
            [
                'contact_id' => $clientes->id,
                'type' => 'J',
                'rif' => '12345678-9',
                'name' => 'Juan',
                'phone' => '12345678',
                'email' => 'jperez@gmail.com',
                'address' => 'Calle 2',
            ]
            );

        ContactAddress::create(
            [
                'contact_id' => $clientes->id,
                'address' => 'Calle 2',
                'default' => true,
            ]
            );

        ContactAddress::create(
            [
                'contact_id' => $clientes->id,
                'address' => 'Calle asd',
                'default' => true,
            ]
        );













    }
}