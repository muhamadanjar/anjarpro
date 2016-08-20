<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LayerOLSeeder extends Seeder {

    public function run(){
       
        DB::table('users')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $users = array(
            array(
                'namalayer'     => 'Publik',
                'urllayer' => '/geoserver/wms',
                'tipelayer'    => 'tilewms',
                'source_layer' => 'rth:publik',
                'source_tiled' => 1,
                'layervisible' => 1,
                'layeropacity' => 1.0,
                'x_min' => 106.760223388672,
                'y_min' => -6.65067720413208,
                'x_max' => 106.827644348145,
                'y_max' => -6.53223466873169,
                'urutan' => 0
            ),
            array(
                'namalayer'     => 'Privat',
                'urllayer' => '/geoserver/wms',
                'tipelayer'    => 'tilewms',
                'source_layer' => 'rth:privat',
                'source_tiled' => 1,
                'layervisible' => 1,
                'layeropacity' => 1.0,
                'x_min' => 106.750149138611,
                'y_min' => -6.63629592116995,
                'x_max' => 106.825174425653,
                'y_max' => -6.55260805030102,
                'urutan' => 0
            )
        );

        foreach ($users as $key) {
            \App\LayerOL::create($key);
        }
        

    }

}