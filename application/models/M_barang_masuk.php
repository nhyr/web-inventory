<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT a.*,b.nama_suplier,c.kode_barang,c.nama_barang,c.satuan,d.nama,d.level FROM tb_barang_masuk a
            LEFT JOIN tb_suplier b ON a.id_suplier = b.id_suplier
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_user d ON a.id_user = d.id_user
            
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_barang_masuk`(`no_batch`, `tgl`, `id_barang`, `id_suplier`, `status`,`id_user`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_batch]','$data[tgl]','$data[id_barang]','$data[id_suplier]','$data[status]','$data[id_user]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',`tgl`='$data[tgl]',`id_barang`='$data[id_barang]',`id_suplier`='$data[id_suplier]',`status`='$data[status]',`id_user`='$data[id_user]',`qty`='$data[qty]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        // $sql = "
           // UPDATE `tb_barang_masuk` 
            // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
            // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_barang_masuk`
         WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }


    public function jml_barang_masuk($data){
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM `tb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0";
        return $this->db->query($sql);
    }


}
