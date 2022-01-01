<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

//spatie

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla alumnos
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',
        ];
        // se añade los datos anteriores a la tabla
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
