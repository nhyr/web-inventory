<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_barang WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_barang`(`kode_barang`, `nama_barang`, `satuan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode]','$data[nama]','Kg',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang` 
            SET `kode_barang`='$data[kode]',`nama_barang`='$data[nama]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang`='$data[id_barang]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        //$sql = "
          //  UPDATE `tb_barang` 
           // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
            //WHERE `id_barang`='$data[id_barang]'
        //";
        $sql = "
        DELETE FROM `tb_barang`
         WHERE `id_barang`='$data[id_barang]'
        ";
        return $this->db->query($sql);
    }


}
