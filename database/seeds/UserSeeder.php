<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => "Gerente",
                'email' => 'gerente@gmail.com',
                'password' => Hash::make('gerente'),
                'manager' => true
            ],
            [   
                'name' => "vendedor",
                'email' => 'vendedor@gmail.com',
                'password' => Hash::make('vendedor'),
                'manager' => false
            ]
        ]);
    }
}
