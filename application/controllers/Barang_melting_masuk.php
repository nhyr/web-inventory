<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_melting_masuk extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_barang_melting_masuk');
        $this->load->model('M_barang_melting_keluar');
        $this->load->model('M_barang_melting');
        $this->load->model('M_supplier');
        $this->load->model('M_users');

    }
    private function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
    }
	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_barang_melting_masuk->get()->result_array();
        for($i=0; $i<count($data['result']);$i++){
            $d['no_batch'] = $data['result'][$i]['no_batch'];
            $jml_barang_melting_keluar = $this->M_barang_melting_keluar->jml_barang_melting_keluar($d)->row_array();
            // $a=0;
            // for($o=0; $o<count($donasi);$o++){
            //     $a+=$donasi[$o]['donasi'];
            // }
            $stok=$data['result'][$i]['qty']-$jml_barang_melting_keluar['tot_barang_melting_keluar'];
            $data['result'][$i]['tot_barang_melting_keluar']=$jml_barang_melting_keluar['tot_barang_melting_keluar'];
            $data['result'][$i]['stok_melting']=$stok_melting;
        }




        $data['res_barang_melting'] = $this->M_barang_melting->get()->result_array();
        $data['res_suplier'] = $this->M_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
		$this->template->load('template', 'content/barang_masuk/barang_masuk_data',$data);
        // print_r($data);

	}

	public function add()
	{
		$data['no_batch'] = $this->input->post('no_batch',TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl',TRUE));
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['id_suplier'] = $this->input->post('id_suplier',TRUE);
        $data['status'] = $this->input->post('status',TRUE);
        $data['id_user'] = $this->input->post('id_user',TRUE);
        $data['qty'] = $this->input->post('qty',TRUE);

        $respon = $this->M_barang_melting_masuk->add($data);

        if($respon){
        	header('location:'.base_url('baran_melting_masuk').'?alert=success&msg=Selamat anda berhasil menambah barang masuk');
        }else{
        	header('location:'.base_url('barang_melting_masuk').'?alert=danger&msg=Maaf anda gagal menambah barang masuk');
        }
	}
	public function update()
	{
		$data['id_barang_masuk'] = $this->input->post('id_barang_masuk',TRUE);
        $data['no_batch'] = $this->input->post('no_batch',TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl',TRUE));
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['id_suplier'] = $this->input->post('id_suplier',TRUE);
        $data['status'] = $this->input->post('status',TRUE);
        $data['id_user'] = $this->input->post('id_user',TRUE);
        $data['qty'] = $this->input->post('qty',TRUE);
        $respon = $this->M_barang_masuk->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('barang_melting_masuk').'?alert=success&msg=Selamat anda berhasil meng-update barang masuk');
        }else{
        	header('location:'.base_url('barang_melting_masuk').'?alert=danger&msg=Maaf anda gagal meng-update barang masuk');
        }
	}
	public function delete($id_barang_masuk)
	{
		$data['id_barang_masuk'] = $id_barang_melting_masuk;
        $respon = $this->M_barang_melting_masuk->delete($data);

        if($respon){
        	header('location:'.base_url('barang_melting_masuk').'?alert=success&msg=Selamat anda berhasil menghapus barang masuk');
        }else{
        	header('location:'.base_url('barang_melting_masuk').'?alert=danger&msg=Maaf anda gagal menghapus barang masuk');
        }
	}

}
