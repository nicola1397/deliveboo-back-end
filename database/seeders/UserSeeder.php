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

        // $user = new User;
        // $user->name = 'Luigi';
        // $user->last_name = 'Micco';
        // $user->email = 'luigimicco@mail.com';
        // $user->password = Hash::make('password2');
        // $user->save();

        $user = new User;
        $user->name = 'Graziano';
        $user->last_name = 'Paladino';
        $user->email = 'grazianomail@mail.com';
        $user->password = Hash::make('password3');
        $user->save();

        $user = new User;
        $user->name = 'Nicola';
        $user->last_name = 'Gallo';
        $user->email = 'nicolagmail@mail.com';
        $user->password = Hash::make('password4');
        $user->save();

        $user = new User;
        $user->name = 'Nicola';
        $user->last_name = 'Teora';
        $user->email = 'nicolatmail@mail.com';
        $user->password = Hash::make('password5');
        $user->save();

        $user = new User;
        $user->name = 'Demetrio';
        $user->last_name = 'Padre';
        $user->email = 'demetriomail@mail.com';
        $user->password = Hash::make('password7');
        $user->save();

        $user = new User;
        $user->name = 'Alberto';
        $user->last_name = 'Cavani';
        $user->email = 'albertomail@mail.com';
        $user->password = Hash::make('password6');
        $user->save();


        // $user = new User;
        // $user->name = 'Adriano';
        // $user->last_name = 'Grimaldi';
        // $user->email = 'adrianomail@mail.com';
        // $user->password = Hash::make('password8');
        // $user->save();

        // $user = new User;
        // $user->name = 'Tiziano';
        // $user->last_name = 'Nicolai';
        // $user->email = 'tizianomail@mail.com';
        // $user->password = Hash::make('password9');
        // $user->save();
    }
}
