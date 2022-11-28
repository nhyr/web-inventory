<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_melting extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_barang_melting');

    }

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_barang_melting->get()->result_array();
		$this->template->load('template', 'content/barang/barang_melting_data',$data);
        // print_r($data);

	}

	public function add()
	{
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
        $data['satuan'] = $this->input->post('satuan',TRUE);
        $respon = $this->M_barang_melting->add($data);

        if($respon){
        	header('location:'.base_url('barang_melting').'?alert=success&msg=Selamat anda berhasil menambah barang_melting');
        }else{
        	header('location:'.base_url('barang_melting').'?alert=success&msg=Maaf anda gagal menambah barang_melting');
        }
	}
	public function update()
	{
		$data['id_barang'] = $this->input->post('id_barang',TRUE);
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
        $data['satuan'] = $this->input->post('satuan',TRUE);
        $respon = $this->M_barang_melting->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('barang_melting').'?alert=success&msg=Selamat anda berhasil meng-update customer');
        }else{
        	header('location:'.base_url('barang_melting').'?alert=success&msg=Maaf anda gagal meng-update customer');
        }
	}
	public function delete($id_barang)
	{
		$data['id_barang'] = $id_barang;
        $respon = $this->M_barang_melting->delete($data);

        if($respon){
        	header('location:'.base_url('barang_melting').'?alert=success&msg=Selamat anda berhasil menghapus barang_melting');
        }else{
        	header('location:'.base_url('barang_melting').'?alert=success&msg=Maaf anda gagal menghapus barang_melting');
        }
	}

}
