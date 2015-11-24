<?php
class second {
    private $model;
    function __construct(){
        include( __DIR__.'/../helper/view_helper.php');
        include( __DIR__.'/../model/mymodel.php');
        $this->model = new mymodel;
    }
    function index(){
        $data = array();
        $data['nama_kampus'] = 'STIKOM Banyuwangi';
        $data['mahasiswa'] = $this->model->select();
        view('aplikasi/view/second_view.php', $data);
    }
    function view_entry(){
        $nim = isset($_GET['nim']) ? $_GET['nim'] : '';
        $status = 'insert';
        $nama = '';
        $jurusan = '';
        if($nim != '') {
            $table = $this->model->select($nim);
            if(count($table)>0){
                $nama = $table[0]['nama'];
                $jurusan = $table[0]['jurusan'];
                $status = 'update';
            }
        }
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'status' => $status);
        view('aplikasi/view/third_view.php', $data);
    }

    function simpan(){
        if(!$_POST) exit;
        $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan
        );
        $result = 0;
        if($status == 'update')
            $result = $this->model->update($data);
        else
            $result = $this->model->insert($data);
        if($result > 0) {
            echo '<p>Sukses melakukan operasi data untuk nama '.$nama.'</p>';
            echo '<p><a href="'.get_config('base_url').'index.php?c=second&m=index">Kembali ke index</a></p>';
        }
    }

    function hapus(){
        $nim = isset($_GET['nim']) ? $_GET['nim'] : '';
        if(empty($nim)) exit;
        $result = $this->model->delete($nim);
        if($result > 0) {
            echo '<p>Sukses menghapus data '.$nim.'</p>';
            echo '<p><a href="'.get_config('base_url').'index.php?c=second&m=index">Kembali ke index</a></p>';
        }
    }
} //end class