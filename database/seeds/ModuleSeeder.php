<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ModuleSeeder extends Seeder {

    public function run()
    {
       
        DB::table('m_module')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $p = array(
            array(
                'moduleid' => 1,
                'moduleparentid'     => 0,
                'modulename' => 'Dasboard',
                'moduleslug' => 'dashboard',
                'modulefile' => 'dashboard',
                'urutan' => 0,
                'status' => 1,
<<<<<<< HEAD
<<<<<<< HEAD
                'type' => 'admin',
                'icon' => 'icon-dashboard',
=======
                'type' => 'public',
                'icon' => 'icon-screen2',
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'type' => 'public',
                'icon' => 'icon-screen2',
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                
            ),
            array(
                'moduleid' => 2,
                'moduleparentid'     => 0,
                'modulename' => 'Master',
                'moduleslug' => 'master',
                'modulefile' => 'master',
<<<<<<< HEAD
<<<<<<< HEAD
                'urutan' => 1,
=======
                'urutan' => 0,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'urutan' => 0,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'status' => 1,
                'type' => 'admin',
                'icon' => 'icon-paragraph-justify2',
                
            ),
            array(
                'moduleid' => 3,
                'moduleparentid'     => 2,
                'modulename' => 'Post',
                'moduleslug' => 'post-list',
                'modulefile' => 'master.PostList',
                'urutan' => 0,
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
                'moduleid' => 4,
                'moduleparentid'     => 2,
                'modulename' => 'Category',
                'moduleslug' => 'category-list',
                'modulefile' => 'master.TermCategoryList',
<<<<<<< HEAD
<<<<<<< HEAD
                'urutan' => 1,
=======
                'urutan' => 0,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'urutan' => 0,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
                'moduleid' => 5,
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleparentid'     => 2,
                'modulename' => 'Tags',
                'moduleslug' => 'tags-list',
                'modulefile' => 'master.TermTagList',
                'urutan' => 2,
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
                'moduleid' => 6,
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleparentid'     => 0,
                'modulename' => 'Media',
                'moduleslug' => 'media-list',
                'modulefile' => 'master.MediaList',
                'urutan' => 2,
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 7,
=======
                'moduleid' => 6,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 6,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleparentid'     => 0,
                'modulename' => 'Forms',
                'moduleslug' => '#',
                'modulefile' => '#',
                'urutan' => 3,
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 8,
=======
                'moduleid' => 7,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 7,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleparentid'     => 0,
                'modulename' => 'Laporan',
                'moduleslug' => 'laporan-list',
                'modulefile' => 'master.LaporanList',
                'urutan' => 2,
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 9,
                'moduleparentid'     => 8,
=======
                'moduleid' => 8,
                'moduleparentid'     => 7,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 8,
                'moduleparentid'     => 7,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'modulename' => 'Laporan',
                'moduleslug' => 'laporan-list',
                'modulefile' => 'master.LaporanList',
                'urutan' => 7,
                'status' => 1,
                'type' => 'admin',
                
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 10,
=======
                'moduleid' => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleparentid'     => 0,
                'modulename' => 'Pengaturan',
                'moduleslug' => '#',
                'modulefile' => 'master',
                'urutan' => 9,
                'status' => 1,
                'type' => 'admin',
                'icon' => 'icon-cog'
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 11,
                'moduleparentid'     => 10,
=======
                'moduleid' => 10,
                'moduleparentid'     => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 10,
                'moduleparentid'     => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'modulename' => 'Pengaturan Group',
                'moduleslug' => 'level',
                'modulefile' => 'master.LevelList',
                'urutan' => 0,
                'status' => 1,
                'type' => 'admin',
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 12,
                'moduleparentid'     => 10,
                'modulename' => 'Pengaturan User',
                'moduleslug' => 'user',
                'modulefile' => 'master.UserList',
                'urutan' => 1,
=======
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleid' => 11,
                'moduleparentid'     => 9,
                'modulename' => 'Pengaturan User',
                'moduleslug' => 'user',
                'modulefile' => 'master.UserList',
                'urutan' => 0,
<<<<<<< HEAD
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'status' => 1,
                'type' => 'admin',
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 13,
                'moduleparentid'     => 10,
                'modulename' => 'Pengaturan Modul',
                'moduleslug' => 'modul-list',
                'modulefile' => 'master.ModulList',
                'urutan' => 2,
=======
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleid' => 12,
                'moduleparentid'     => 9,
                'modulename' => 'Pengaturan Modul',
                'moduleslug' => 'modul-list',
                'modulefile' => 'master.ModulList',
                'urutan' => 0,
<<<<<<< HEAD
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'status' => 1,
                'type' => 'admin',
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 14,
                'moduleparentid'     => 0,
=======
                'moduleid' => 13,
                'moduleparentid'     => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 13,
                'moduleparentid'     => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'modulename' => 'GIS',
                'moduleslug' => '#',
                'modulefile' => 'map.*',
                'urutan' => 4,
                'status' => 1,
                'type' => 'admin',
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 15,
                'moduleparentid'     => 14,
=======
                'moduleid' => 14,
                'moduleparentid'     => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 14,
                'moduleparentid'     => 9,
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'modulename' => 'Map CMV',
                'moduleslug' => 'map-cmv',
                'modulefile' => 'map.map_cmv',
                'urutan' => 4,
                'status' => 1,
                'type' => 'admin',
            ),
            array(
<<<<<<< HEAD
<<<<<<< HEAD
                'moduleid' => 16,
                'moduleparentid'     => 14,
                'modulename' => 'Map Google',
=======
                'moduleid' => 15,
                'moduleparentid'     => 9,
                'modulename' => 'Map CMV',
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
                'moduleid' => 15,
                'moduleparentid'     => 9,
                'modulename' => 'Map CMV',
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
                'moduleslug' => 'map-google',
                'modulefile' => 'map.map_google',
                'urutan' => 4,
                'status' => 1,
                'type' => 'admin',
<<<<<<< HEAD
<<<<<<< HEAD
            ),
            array(
                'moduleid' => 17,
                'moduleparentid'     => 14,
                'modulename' => 'Map Openlayer',
                'moduleslug' => 'map-full',
                'modulefile' => 'map.map_openlayer',
                'urutan' => 4,
                'status' => 1,
                'type' => 'admin',
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
            )
   
        );
        $detil = array(
            array(
                'groupid'=>1,
                'moduleid'=>1,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>2,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>3,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>4,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>5,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>6,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>7,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>8,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>9,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>10,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>11,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>12,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>13,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>14,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>15,
                'privid'=>10
<<<<<<< HEAD
<<<<<<< HEAD
            ),
            array(
                'groupid'=>1,
                'moduleid'=>16,
                'privid'=>10
            ),
            array(
                'groupid'=>1,
                'moduleid'=>17,
                'privid'=>10
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
            )
        );

        foreach($p as $pri){
            \App\mmodule::create($pri);
        }

        foreach ($detil as $key) {
            \App\musrgdetil::create($key);
        }
       

    }

}