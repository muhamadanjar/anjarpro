<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleUserSeeder extends Seeder{

    public function run($value=''){
        DB::table('role_user')->delete();

        $roleuser = array(
            array('role_id' => 1, 'user_id' => 1),
            array('role_id' => 2, 'user_id' => 2),
        );
        foreach ($roleuser as $key) {
            DB::table('role_user')->insert($key);
        }
    }
        
}