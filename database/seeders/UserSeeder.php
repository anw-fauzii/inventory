<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Anwar Fauzi',
            'email' => 'anwar.fauzy18@gmail.com',
            'password' => bcrypt('a4eX-0*Asc2'),
        ]);

        $admin->assignRole('admin');
    }
}
