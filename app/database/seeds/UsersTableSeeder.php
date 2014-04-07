<?php

class UsersTableSeeder extends Seeder{
    public function run() {
        $user = new User();
        $user->firstName = 'John';
        $user->lastname = 'Doe';
        $user->email = 'john@doe.com';
        $user->password = Hash::make('password');
        $user->telephone = '5557771234';
        $user->admin = 1;
        $user->save();
   }
}
