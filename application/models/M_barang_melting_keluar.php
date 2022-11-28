<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_melting_keluar extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        $sql = "
            SELECT a.*,b.nama FROM tb_surat_jalan a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }
    public function data_barang_keluar($no_surat_jalan){
        $sql = "
            SELECT a.*,c.nama_barang,c.satuan,d.nama_suplier FROM tb_barang_keluar a
            LEFT JOIN tb_barang_masuk b ON a.no_batch = b.no_batch
            LEFT JOIN tb_barang_melting c ON b.id_barang = c.id_barang
            LEFT JOIN tb_suplier d ON b.id_suplier = d.id_suplier
            LEFT JOIN tb_surat_jalan e ON a.no_surat_jalan = e.no_surat_jalan
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0 AND e.is_deleted =0 ORDER BY a.no_batch ASC";
        return $this->db->query($sql);
    }
    public function cek_surat_jalan($no_surat_jalan){
        $sql = "
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_surat_jalan a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_po($no_po){
        $sql = "
            SELECT COUNT(a.no_surat_jalan) count_po FROM tb_surat_jalan a
            WHERE a.no_po = '$no_po' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function add_surat_jalan($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_surat_jalan`(`no_surat_jalan`, `tgl`,`no_po`,`note`,`id_user`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_surat_jalan]','$data[tgl]','$data[no_po]','$data[id_user]','$data[note]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function add_barang_keluar($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_barang_keluar`(`no_batch`, `no_surat_jalan`, `qty`,`id_user`,`exp`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[no_batch]','$data[no_surat_jalan]','$data[qty]','$data[id_user]','$data[exp]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',`tgl`='$data[tgl]',`id_barang`='$data[id_barang]',`id_suplier`='$data[id_suplier]',`status`='$data[status]',`qty`='$data[qty]',`nama`='$data[id_user]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        // $sql1 = "
        //     UPDATE `tb_surat_jalan` 
        //     SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //     WHERE `no_surat_jalan`='$data[no_surat_jalan]'
        // ";
        // $sql = "
        //     UPDATE `tb_barang_keluar` 
        //     SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //     WHERE `no_surat_jalan`='$data[no_surat_jalan]'
        // ";
        $sql1 = "
            DELETE FROM `tb_surat_jalan` 
            WHERE `no_surat_jalan`='$data[no_surat_jalan]'
        ";
        $sql = "
           DELETE FROM `tb_barang_keluar`
            WHERE `no_surat_jalan`='$data[no_surat_jalan]'
        ";
        $this->db->query($sql);
        return $this->db->query($sql1);
    }

    public function jml_barang_melting_keluar($data){
        $sql = "
            SELECT sum(qty) tot_barang_keluar FROM `tb_barang_keluar` WHERE no_batch='$data[no_batch]' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_barang_melting_keluar2($data){
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_barang_keluar` a 
            LEFT JOIN tb_barang_masuk b ON a.no_batch = b.no_batch 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0"; 
        return $this->db->query($sql);
    }
    public function ambil_surat_jalan($no_surat_jalan = null){
        $sql = "
            SELECT a.*,b.nama,b.alamat FROM tb_surat_jalan a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 AND a.no_surat_jalan = '$no_surat_jalan' ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }

}
