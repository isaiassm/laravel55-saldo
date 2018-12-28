<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create ([
            'name' => 'isaias santos',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        
        User::create ([
            'name' => 'Outro Usuario',
            'email' => 'contato@admin.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
