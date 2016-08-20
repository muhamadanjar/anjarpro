<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder {

    public function run(){
       
        DB::table('users')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $users = array(
            array(
                'name'     => 'Muhamad Anjar',
                'username' => 'admin',
                'email'    => 'arvanria@gmail.com',
                'password' => Hash::make('xcWI3128'),
                'groupid' => 1,
                'isactive' => 1,
            ),
            array(
                'name'     => 'Muhamad Anjar',
                'username' => 'operator',
                'email'    => 'operator@gmail.com',
                'password' => Hash::make('xcWI3128'),
                'groupid' => 2,
                'isactive' => 1,
            ),
        );

        foreach ($users as $key) {
            \App\User::create($key);
        }
        

    }

}