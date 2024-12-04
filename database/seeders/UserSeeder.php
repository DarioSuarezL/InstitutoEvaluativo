<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::find(1);
        $roleReclutador = Role::find(2);
        $rolePostulante = Role::find(3);

        User::create([
            'name' => 'Dario Suarez',
            'email' => 'dsuarezlazarte@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Miguel Angel Ballivian',
            'email' => 'ballivian.miguel@ficct.uagrm.edu.bo',
            'password' => bcrypt('password')
        ]);

    }
}
