<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleSeeder extends Seeder {

    public function run()
    {
       
        DB::table('roles')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $p = array(
            array(
                'id'     => 0,
                'name'     => 'guest',
                'simbol' =>''    
            ),
            array(
                'id'     => 1,
                'name'     => 'admin',
                'simbol' =>'images/level/super.png'   
            ),
            array(
                'id'     => 2,
                'name'     => 'user',
                'simbol' =>'images/level/user.png'    
            )
            
           
        );

        foreach($p as $pri){
            \App\Role::create($pri);
        }
       

    }

}