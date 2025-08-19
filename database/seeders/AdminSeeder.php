<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        // Crear o buscar el rol admin
        $role = Role::firstOrCreate(
            ['name' => 'admin'], // campo único
            ['description' => 'Administrador del sistema']
        );

        // Crear o buscar el usuario admin
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'], 
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456788'), 
            ]
        );

        // Asociar rol al usuario (si no está ya asignado)
        if (! $user->roles->contains($role->id)) {
            $user->roles()->attach($role->id);
        }
    }
}
