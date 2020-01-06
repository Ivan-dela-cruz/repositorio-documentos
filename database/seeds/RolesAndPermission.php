<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\User;
class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');

        /// crea los permisos para el crud del usuario
        ///
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        /// crea los permisos para el crud del equipo

        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'read category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);

        /// crea los permisos para el crud de la orden

        Permission::create(['name' => 'create document']);
        Permission::create(['name' => 'read document']);
        Permission::create(['name' => 'update document']);
        Permission::create(['name' => 'delete document']);
        Permission::create(['name' => 'download document']);




        /// cramos los roles para que son admin, tecnico1, tecnico 2, clinete
        $role = Role::create(['name' => 'admin']);

        //asignacion de los permisos al rol admin
        $role->givePermissionTo(Permission::all());


        ///<<<<----------- ROL USER PERMISOS ----->>>>
        $role = Role::create(['name' => 'user']);
        //asignacion de los permisos al rol USER
        $role->givePermissionTo('create document');
        $role->givePermissionTo('read document');
        $role->givePermissionTo('delete document');
        $role->givePermissionTo('update document');
        $role->givePermissionTo('download document');


        ///crearmos el usario por defecto
        $user_password = Hash::make('root1234');
        $user = User::create(['id' => 1,
            'name' => 'admin',
            'last_name' => 'admin',
            'description' => '0985247455',
            'gender' => 'otro',
            'born' => '2019/12/12',
            'email' => 'admin@gmail.com',
            'password' => $user_password]);

        $user->assignRole('admin');
    }
}
