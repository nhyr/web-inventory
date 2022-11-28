<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function tot_barang_masuk($hariini){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_barang_masuk) tot_barang_masuk FROM tb_barang_masuk WHERE tgl='$hariini' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_transfer_file($hariini){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_transfer_file) tot_transfer_file FROM tb_transfer_file WHERE tgl='$hariini' AND is_deleted = 0";

        return $this->db->query($sql);
    }
    public function tot_barang_keluar($hariini){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(a.id_barang_keluar) tot_barang_keluar FROM tb_barang_keluar a
                LEFT JOIN tb_transfer_file b ON b.no_transfer_file = a.no_transfer_file
                WHERE b.tgl='$hariini' AND a.is_deleted = 0 AND b.is_deleted = 0";

        return $this->db->query($sql);
    }
    public function tot_barang(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_barang) tot_barang FROM tb_barang WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_supplier(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_suplier) tot_supplier FROM tb_suplier WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_customer(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_customer) tot_customer FROM tb_customer WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function users(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_user WHERE is_deleted = 0";
        return $this->db->query($sql);
    }



}
