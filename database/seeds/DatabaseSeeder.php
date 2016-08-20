<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

use App\privileges;
use App\musergrp;
use App\mmodule;
use App\musrgdetil;
use App\Terms;
use App\Taxonomy;

class DatabaseSeeder extends Seeder {
<<<<<<< HEAD
<<<<<<< HEAD
	
    public function run(){
        Model::unguard();
        $seeders = array ('UserSeeder','PrivSeeder','ModuleSeeder','RoleSeeder','RoleUserSeeder','CategoryTag','Wilayah');

=======
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
	/*public function run(){
		Model::unguard();

		$this->call('UserTableSeeder');
        $this->call('PrivTableSeeder');
        $this->call('MuserGrpTableSeeder');
        $this->call('ModuleTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('CategoryTag');
        $this->call('Wilayah');

        
	}*/


   
    public function run()
    {
        Model::unguard();
        $seeders = array ('UserSeeder','PrivSeeder','ModuleSeeder','RoleSeeder','RoleUserSeeder','CategoryTag','Wilayah');

<<<<<<< HEAD
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
        foreach ($seeders as $seeder){ 
           $this->call($seeder);
        }
    }
    

}





/*class MuserGrpTableSeeder extends Seeder {

    public function run()
    {
       
        DB::table('m_user_group')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $p = array(
            array(
                'groupid'     => 1,
                'groupname'     => 'Administrator',
            ),
            array(
                'groupid'     => 2,
                'groupname'     => 'Pemeriksa',
            ),
            array(
                'groupid'     => 3,
                'groupname'     => 'Pegawai',
            )
           
        );

        foreach($p as $pri){
            musergrp::create($pri);
        }
       

    }

}*/










