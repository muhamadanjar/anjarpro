<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class PrivSeeder extends Seeder {

    public function run()
    {
       
        DB::table('m_privileges')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $p = array(
            array(
                'privname'     => 'Not Access',
                'r' => 0,
                'e' => 0,
                'a' => 0,
                'd' => 0,
            ),
            array(
                'privname'     => 'Only Add',
                'r' => 0,
                'e' => 0,
                'a' => 1,
                'd' => 0,
            ),
            array(
                'privname'     => 'Only Read',
                'r' => 1,
                'e' => 0,
                'a' => 0,
                'd' => 0,
            ),
            array(
                'privname'     => 'Delete',
                'r' => 1,
                'e' => 0,
                'a' => 0,
                'd' => 1,
            ),
            array(
                'privname'     => 'Read and Add',
                'r' => 1,
                'e' => 0,
                'a' => 1,
                'd' => 0,
            ),
            array(
                'privname'     => 'Add and Delete',
                'r' => 1,
                'e' => 0,
                'a' => 1,
                'd' => 1,
            ),
            array(
                'privname'     => 'Edit',
                'r' => 1,
                'e' => 1,
                'a' => 0,
                'd' => 0,
            ),
            array(
                'privname'     => 'Edit and Delete',
                'r' => 1,
                'e' => 1,
                'a' => 0,
                'd' => 1,
            ), 
            array(
                'privname'     => 'Edit and Add',
                'r' => 1,
                'e' => 1,
                'a' => 1,
                'd' => 0,
            ), 
            array(
                'privname'     => 'Full Access',
                'r' => 1,
                'e' => 1,
                'a' => 1,
                'd' => 1,
            ) 
        );

        foreach($p as $pri){
            \App\privileges::create($pri);
        }
       
    }

}