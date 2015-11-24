<?php
class mymodel {
    private $db;
    function __construct(){
        include( __DIR__.'/../database/mysql.php');
        $this->db = new mysql;
        $this->db->connect();
    }
    function __destruct(){
        $this->db->disconnect();
    }
    function select($nim = ''){
        $sql = "SELECT * FROM tabel_mahasiswa";
        if($nim != '') $sql = "SELECT * FROM tabel_mahasiswa WHERE nim='$nim'";
        return $this->db->results($sql, 'array');
    }
    function insert($data){
        return $this->db->query(
            "INSERT INTO tabel_mahasiswa(nim, nama, jurusan) VALUES ('".
            $data['nim']."','".
            $data['nama']."','".
            $data['jurusan']."')"
        );
    }
    function update($data){
        return $this->db->query(
            "UPDATE tabel_mahasiswa SET nama = '".$data['nama']."', jurusan = '".$data['jurusan']."' ".
            " WHERE nim = '".$data['nim']."'"
        );
    }
    function delete($nim){
        return $this->db->query("DELETE FROM tabel_mahasiswa WHERE nim = '$nim'");
    }
}