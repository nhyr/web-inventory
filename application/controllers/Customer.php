<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_customer');

    }

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$result = 
		$data['result'] = $this->M_customer->get()->result_array();
		$this->template->load('template', 'content/customer/customer_data',$data);

	}

	public function add()
	{
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
        $data['phone'] = $this->input->post('phone',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
        $respon = $this->M_customer->add($data);

        if($respon){
        	header('location:'.base_url('customer').'?alert=success&msg=Selamat anda berhasil menambah customer');
        }else{
        	header('location:'.base_url('customer').'?alert=success&msg=Maaf anda gagal menambah customer');
        }
	}
	public function update()
	{
		$data['id_customer'] = $this->input->post('id_customer',TRUE);
		$data['kode'] = $this->input->post('kode',TRUE);
        $data['nama'] = $this->input->post('nama',TRUE);
        $data['phone'] = $this->input->post('phone',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
        $respon = $this->M_customer->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('customer').'?alert=success&msg=Selamat anda berhasil meng-update customer');
        }else{
        	header('location:'.base_url('customer').'?alert=success&msg=Maaf anda gagal meng-update customer');
        }
	}
	public function delete($id_customer)
	{
		$data['id_customer'] = $id_customer;
        $respon = $this->M_customer->delete($data);

        if($respon){
        	header('location:'.base_url('customer').'?alert=success&msg=Selamat anda berhasil menghapus customer');
        }else{
        	header('location:'.base_url('customer').'?alert=success&msg=Maaf anda gagal menghapus customer');
        }
	}

}
