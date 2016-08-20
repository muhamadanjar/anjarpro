<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class Wilayah extends Seeder {

    public function run(){
       
        DB::table('m_wilayah')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $p = array(
            array(
               
                'wilayahnama' => 'Jawa Barat',
                'wilayahkode' => '32',
                'wilayahparentid' => 0,
                'tingkatid' => 0  
            ),
            array(
               
                'wilayahnama' => 'Kabupaten Bogor',
                'wilayahkode' => '32.01',
                'wilayahparentid' => '32',
                'tingkatid' => 0  
            )
           
        );      
        foreach($p as $key){
            DB::table('m_wilayah')->insert($key);   
        }       
    }

}