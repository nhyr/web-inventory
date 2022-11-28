<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_supplier');

    }

	public function index()
	{
		// $data['row'] = $this->supplier_m->get();
		$result = 
		$data['result'] = $this->M_supplier->get()->result_array();
		$this->template->load('template', 'content/supplier/supplier_data',$data);

	}

	public function add()
	{
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
        $data['negara'] = $this->input->post('negara',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
		$data['sertif_halal'] = $this->input->post('sertif_halal',TRUE);
        $respon = $this->M_supplier->add($data);

        if($respon){
        	header('location:'.base_url('supplier').'?alert=success&msg=Selamat anda berhasil menambah supplier');
        }else{
        	header('location:'.base_url('supplier').'?alert=success&msg=Maaf anda gagal menambah supplier');
        }
	}
	public function update()
	{
		$data['id_suplier'] = $this->input->post('id_suplier',TRUE);
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
		$data['negara'] = $this->input->post('negara',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
		$data['sertif_halal'] = $this->input->post('sertif_halal',TRUE);
        $respon = $this->M_supplier->update($data);
        // echo $respon;
        if($respon){
        	header('location:'.base_url('supplier').'?alert=success&msg=Selamat anda berhasil meng-update supplier');
        }else{
        	header('location:'.base_url('supplier').'?alert=success&msg=Maaf anda gagal meng-update supplier');
        }
	}
	public function delete($id_suplier)
	{
		$data['id_suplier'] = $id_suplier;
        $respon = $this->M_supplier->delete($data);

        if($respon){
        	header('location:'.base_url('supplier').'?alert=success&msg=Selamat anda berhasil menghapus supplier');
        }else{
        	header('location:'.base_url('supplier').'?alert=success&msg=Maaf anda gagal menghapus supplier');
        }
	}

}
