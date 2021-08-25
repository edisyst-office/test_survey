<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    protected $names = ['edoardo' , 'valentina' , 'marco'];

    public function run()
    {
        //Aggiungo un utente statico con delle credenziali fisse
        foreach ($this->names as $name)
        {
            User::create([
                'name'  => $name,
                'email' => $name.'@example.com',
                'password' => Hash::make($name),
            ]);
        }
    }
}
