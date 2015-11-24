<?php
class first {
    function __construct(){
        include( __DIR__.'/../helper/view_helper.php');
    }

    function index(){

        echo '<h1>Selamat Datang di Simple MVC</h1>';
        echo '<p>Click link dibawah ini untuk melihat hasil dari pemanggilan view dari controller</p>';
        echo '<p><a href="'.get_config('base_url').'index.php?c=first&m=tampilkan_view">Contoh View</a></p>';
    }

    function tampilkan_view(){
        $table = array(
            array('nim' => '001', 'nama' => 'Budi', 'jurusan' => 'Teknik Informatika'),
            array('nim' => '002', 'nama' => 'Andi', 'jurusan' => 'Manajemen Informatika'),
            array('nim' => '003', 'nama' => 'Wati', 'jurusan' => 'Ilmu Komputer')
        );

        $passing_ke_view = array();
        $passing_ke_view['nama_kampus'] = 'STIKOM Banyuwangi';

        $passing_ke_view['mahasiswa'] = $table;

        view('aplikasi/view/first_view.php', $passing_ke_view);
    }
} //end class