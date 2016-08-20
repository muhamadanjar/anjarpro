<?php namespace App\Lib;
use DB;
use Session;
class Pagging {
	function cariPosisi($batas){
        if(empty($_GET['halkategori'])){
            $posisi=0;
            $_GET['halkategori']=1;
        }
        else{
            $posisi = ($_GET['halkategori']-1) * $batas;
        }
        return $posisi;
    }

    function jumlahHalaman($jmldata, $batas){
        $jmlhalaman = ceil($jmldata/$batas);
        return $jmlhalaman;
    }

    function navHalaman($halaman_aktif, $jmlhalaman){
        $link_halaman = "";

        // Link ke halaman pertama (first) dan sebelumnya (prev)
        if($halaman_aktif > 1){
            $prev = $halaman_aktif-1;
            $link_halaman .= "<a href=halkategori-$_GET[id]-1.html class='nextprev'>Awal</a>
                            <a href=halkategori-$_GET[id]-$prev.html class='nextprev'>Kembali</a>";
        }
        else{ 
        $link_halaman .= "<span class='nextprev'>Awal</span>
        <span class='nextprev'>Kembali</span>";
        }

        // Link halaman 1,2,3, ...
        $angka = ($halaman_aktif > 3 ? " ... " : " "); 
        for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
          if ($i < 1)
            continue;
              $angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a>";
          }
             $angka .= " <span class='current'><b>$halaman_aktif</b></span>";
              
            for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
            if($i > $jmlhalaman)
              break;
              $angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a>";
            }
              $angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><a href=halkategori-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>" : " ");

        $link_halaman .= "$angka";

        // Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
        if($halaman_aktif < $jmlhalaman){
            $next = $halaman_aktif+1;
            $link_halaman .= " <a href=halkategori-$_GET[id]-$next.html class='nextprev' >Lanjut</a>
                             <a href=halkategori-$_GET[id]-$jmlhalaman.html class='nextprev'>Akhir</a>";
        }
        else{
            $link_halaman .= "<span class='nextprev'>Lanjut</span>
            <span class='nextprev'>Akhir</span>";
        }
        return $link_halaman;
    }
}