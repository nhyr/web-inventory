<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_suplier WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_suplier`( `kode_suplier`, `nama_suplier`, `negara`, `alamat`, `sertif_halal`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode]','$data[nama]','$data[negara]','$data[alamat]','$data[sertif_halal]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_suplier` 
            SET `kode_suplier`='$data[kode]',`nama_suplier`='$data[nama]',`negara`='$data[negara]',`alamat`='$data[alamat]',`sertif_halal`='$data[sertif_halal]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_suplier`='$data[id_suplier]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        //$sql = "
           // UPDATE `tb_suplier` 
           // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
           // WHERE `id_suplier`='$data[id_suplier]'
        //";
        $sql = "
        DELETE FROM `tb_supplier`
         WHERE `id_supplier`='$data[id_supplier]'
        ";
        return $this->db->query($sql);
    }


}
