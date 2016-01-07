<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Penerimaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','session','akses','pagination'));
		$this->load->model('dbm');
		$this->akses->auth();

		$this->view = 'transaksi/penerimaan/';
	}
	function index()
	{
		$data['judul']     = 'Penerimaan';
		$data['cari_resi'] = $this->input->get('cari_resi'); 

		if($data['cari_resi'] !='')
		{
			if($this->session->userdata('cabang') !=null)
			{
				$this->db->where('kd_cabang_tujuan',$this->session->userdata('cabang'));
			}
			$data['info'] = $this->dbm->get_data_where('pengiriman',array('no_resi'=>$data['cari_resi']))->row();
			$data['list'] = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$data['cari_resi']))->result(); 
		}
		
		$this->template->display($this->view.'index',$data);
	}
	function ubah_status($no_resi,$status,$tgl_terima)
	{
		$up = $this->dbm->update('pengiriman',array('no_resi'   =>$no_resi),
											  array('status'    =>$status,
											  	    'tgl_terima'=>tgl_sql($tgl_terima),
											  	    'jam_terima'=>date('H:i:s')
											  	    ));
		
		if($up){
		  echo 'ok';
		}
	}
	function cetak_nota_penerimaan($no_resi)
	{
		$this->load->library('pdf');

		$data['info'] = $this->dbm->get_data_where('pengiriman',array('no_resi'=>$no_resi))->row();
		$data['list'] = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$no_resi))->result(); 

		$content 	  = $this->load->view($this->view. 'cetak_nota_penerimaan', $data,true);

		$this->pdf->create($content, 'nota_penerimaan');
	} 
}