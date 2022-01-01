<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se dedine un super administrador, este se usa para el caso de que al entrar no se cuente con usuario admin
        $usuario = User::create([
            'name' => 'Gerardo Fac',
            'email' => 'jerryfac98@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        //le asigamos el rol
        //$rol = Role::create(['name' => 'Administrador']);

        //le damos todos los permisos
        //$permisos = Permission::pluck('id','id')->  all();
        //sincronizamos todos los permisos
        //$rol= syncPermissions($permisos);
        //asignamos el rol
        //$usuario->assignRole([$rol->id]);

        $usuario->assignRole('Administrador');



    }
}
