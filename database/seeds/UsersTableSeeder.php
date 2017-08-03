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
        //
       $user = new User();
       $user->name = "Hasan";
       $user->email = "hasan@gmail.com";
       $user->password = bcrypt("hasan");
       $user->status="active";
       $user->type = "admin";
       $user->save();
    }
}
