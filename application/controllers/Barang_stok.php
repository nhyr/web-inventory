<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_stok extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_barang');
        $this->load->model('M_barang_masuk');
        $this->load->model('M_barang_keluar');

    }

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_barang->get()->result_array();
        for($i=0; $i<count($data['result']);$i++){
            $d['id_barang'] = $data['result'][$i]['id_barang'];

            $jml_barang_masuk = $this->M_barang_masuk->jml_barang_masuk($d)->row_array();
            $jml_barang_keluar = $this->M_barang_keluar->jml_barang_keluar2($d)->row_array();
            // $a=0;
            // for($o=0; $o<count($donasi);$o++){
            //     $a+=$donasi[$o]['donasi'];
            // }

            $data['result'][$i]['masuk']=$jml_barang_masuk['tot_barang_masuk'];
            $data['result'][$i]['keluar']=$jml_barang_keluar['tot_barang_keluar'];
            $data['result'][$i]['stok']=$jml_barang_masuk['tot_barang_masuk']-$jml_barang_keluar['tot_barang_keluar'];

            // $stok=$data['result'][$i]['qty']-$jml_barang_keluar['tot_barang_keluar'];
            // $data['result'][$i]['tot_barang_keluar']=$jml_barang_keluar['tot_barang_keluar'];
            // $data['result'][$i]['stok']=$stok;
        }









		$this->template->load('template', 'content/barang/barang_stok',$data);
        // print_r($data);

	}

	public function update()
	{
		$data['id_barang'] = $this->input->post('id_barang',TRUE);
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
        $data['mesh'] = $this->input->post('mesh',TRUE);
        $data['bloom'] = $this->input->post('bloom',TRUE);
        $data['satuan'] = $this->input->post('satuan',TRUE);
        $respon = $this->M_barang->update($data);
        if($respon){
        	header('location:'.base_url('barang').'?alert=success&msg=Selamat anda berhasil meng-update customer');
        }else{
        	header('location:'.base_url('barang').'?alert=success&msg=Maaf anda gagal meng-update customer');
        }
	}

}
