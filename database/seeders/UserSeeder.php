<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Mattia';
        $user->last_name = 'Focarelli';
        $user->email = 'mattiafocarelli@mail.com';
        $user->password = Hash::make('password1');
        $user->save();

        $user = new User;
        $user->name = 'Luigi';
        $user->last_name = 'Micco';
        $user->email = 'luigimicco@mail.com';
        $user->password = Hash::make('password2');
        $user->save();
    }
}
