<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_melting_keluar extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_barang_melting_keluar');
        $this->load->model('M_barang_melting_masuk');
        $this->load->model('M_users');

    }
    private function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
    }
	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_barang_melting_keluar->get()->result_array();
        $data['bm'] = $this->M_barang_melting_masuk->get()->result_array();
        for($i=0; $i<count($data['bm']);$i++){
            $d['no_batch'] = $data['bm'][$i]['no_batch'];
            $jml_barang_melting_keluar = $this->M_barang_melting_keluar->jml_barang_melting_keluar($d)->row_array();
            $stok=$data['bm'][$i]['qty']-$jml_barang_melting_keluar['tot_barang_melting_keluar'];
            $data['bm'][$i]['stok_melting']=$stok_melting;
        }

		$this->template->load('template', 'content/barang_keluar/barang_keluar_data',$data);
        // print_r($data['bm']);
	}
    public function data_barang_melting_keluar(){
        $no_surat_jalan = $this->input->post('no_surat_jalan',TRUE);

        $result = $this->M_barang_melting_keluar->data_barang_keluar($no_surat_jalan)->result_array();
        /*for($i=0; $i<count($result);$i++){
            $data['id_penerima'] = $result[$i]['id_penerima'];
            $donasi = $this->m_penerima->data_donasi($data)->result_array();
            $a=0;
            for($o=0; $o<count($donasi);$o++){
                $a+=$donasi[$o]['donasi'];
            }
            $result[$i]['hasil_donasi']=$a;
        }*/
        echo json_encode($result);
    }
    public function cek_surat_jalan(){
        $no_surat_jalan = $this->input->post('no_surat_jalan',TRUE);

        $row = $this->M_barang_melting_keluar->cek_surat_jalan($no_surat_jalan)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
    public function cek_po(){
        $no_po = $this->input->post('no_po',TRUE);

        $row = $this->M_barang_melting_keluar->cek_po($no_po)->row_array();
        if ($row['count_po']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
	public function add()
	{
		// 
  //       
  //       $data['id_barang'] = $this->input->post('id_barang',TRUE);
  //       $data['id_suplier'] = $this->input->post('id_suplier',TRUE);
  //       $data['status'] = $this->input->post('status',TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan',TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl',TRUE));
        
        $data['note'] = $this->input->post('note',TRUE);
        $data['id_user'] = $this->input->post('id_user',TRUE); 
        $data['no_po'] = $this->input->post('no_po',TRUE);

        $data['no_batch'] = $this->input->post('no_batch',TRUE);
        $data['qty'] = $this->input->post('qty',TRUE);
        $data['exp'] = $this->input->post('exp',TRUE);
        // print_r($data['no_batch']);

        // echo $data['tgl'];
        
        $respon = $this->M_barang_keluar->add_surat_jalan($data);
        

        if($respon){
            for ($i=0; $i < count($data['qty']); $i++) { 
                // echo $data['qty'][$i]."<br>";
                $d['no_surat_jalan'] = $data['no_surat_jalan'];
                $d['no_batch'] = $data['no_batch'][$i];
                $d['qty'] = $data['qty'][$i];
                $d['exp'] = $this->convertDate($data['exp'][$i]);
                $respon = $this->M_barang_keluar->add_barang_keluar($d);
            }
        	header('location:'.base_url('barang_keluar').'?alert=success&msg=Selamat anda berhasil menambah barang Keluar');
        }else{
        	header('location:'.base_url('barang_keluar').'?alert=success&msg=Maaf anda gagal menambah barang Kelur');
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
        	header('location:'.base_url('barang_melting_masuk').'?alert=success&msg=Maaf anda gagal meng-update barang masuk');
        }
	}
	public function delete($no_surat_jalan)
	{
		$data['no_surat_jalan'] = str_replace('--', '/',$no_surat_jalan);
        $respon = $this->M_barang_melting_keluar->delete($data);

        if($respon){
        	header('location:'.base_url('barang_melting_keluar').'?alert=success&msg=Selamat anda berhasil menghapus barang Kelur');
        }else{
        	header('location:'.base_url('barang_melting_keluar').'?alert=success&msg=Maaf anda gagal menghapus barang Kelur');
        }
        // echo $no_surat_jalan;
	}
    public function pdf_surat_jalan($no_sj=null)
    {
        $no_surat_jalan = str_replace("--","/",$no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['row'] = $this->M_barang_melting_keluar->ambil_surat_jalan($no_surat_jalan)->row_array();
        $data['detail'] = $this->M_barang_melting_keluar->data_barang_keluar($no_surat_jalan)->result_array();

        $d = $this->load->view('laporan/barang_keluar/page_surat_jalan', $data, TRUE);
        $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

}
