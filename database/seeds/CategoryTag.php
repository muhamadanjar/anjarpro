<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTag extends Seeder {

    public function run(){
       
        DB::table('terms')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $p = array(
            array(
               
                'name' => 'Berita',
                'slug' => 'berita',
                'term_group' => 0,  
<<<<<<< HEAD
<<<<<<< HEAD
            ),
            array(
               
                'name' => 'Ekonomi',
                'slug' => 'ekonomi',
                'term_group' => 0,  
            ),
            array(
               
                'name' => 'Olahraga',
                'slug' => 'olahraga',
                'term_group' => 0,  
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
            )
           
        );

        $t = array(
            array(
               
                'termid' => '1',
                'taxonomy' => 'post_category',
                'parent' => 0,
                'count' => 0  
<<<<<<< HEAD
<<<<<<< HEAD
            ),
            array(
               
                'termid' => '2',
                'taxonomy' => 'post_category',
                'parent' => 0,
                'count' => 0  
            ),
            array(
               
                'termid' => '3',
                'taxonomy' => 'post_category',
                'parent' => 0,
                'count' => 0  
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
            )
           
        );

        
        foreach($p as $key => $pri){
            \App\Terms::create($pri);
            
        }

        foreach($t as $key => $pri){
            \App\Taxonomy::create($pri);
        }
       

    }

}