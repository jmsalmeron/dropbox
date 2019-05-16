<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'files.create', 'description' => 'Subir archivos']);
        Permission::create(['name' => 'files.store', 'description' => 'Guardar archivos']);
        Permission::create(['name' => 'files.images', 'description' => 'Imagenes subidas']);
        Permission::create(['name' => 'files.videos', 'description' => 'Videos subidos']);
        Permission::create(['name' => 'files.audios', 'description' => 'Audios subidos']);
        Permission::create(['name' => 'files.documents', 'description' => 'Documentos subidos']);

        Permission::create(['name' => 'roles.index', 'description' => 'Ver todos los roles']);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear roles']);
        Permission::create(['name' => 'roles.store', 'description' => 'Guardar roles']);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles']);
        Permission::create(['name' => 'roles.update', 'description' => 'Actualizar roles']);
        Permission::create(['name' => 'roles.show', 'description' => 'Mostrar roles']);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles']);

        Permission::create(['name' => 'plans.index', 'description' => 'Ver todos los planes']);
        Permission::create(['name' => 'plans.create', 'description' => 'Crear planes']);
        Permission::create(['name' => 'plans.edit', 'description' => 'Editar planes']);
        Permission::create(['name' => 'plans.show', 'description' => 'Mostrar planes']);
        Permission::create(['name' => 'plans.destroy', 'description' => 'Eliminar planes']);

        $admin = Role::create(['name' => 'ADMIN']);
        $subscriber = Role::create(['name' => 'SUBS']);

        $admin->givePermissionTo(Permission::all());
        $subscriber->givePermissionTo([
            'files.create',
            'files.store',
            'files.images',
            'files.videos',
            'files.audios',
            'files.documents'
        ]);

        $user = User::find(1);
        $user->assignRole('ADMIN');
    }
}
