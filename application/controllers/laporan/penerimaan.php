<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Penerimaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','session','akses','pagination','pdf'));
		$this->load->model('dbm');
		$this->akses->auth();

		$this->view = 'laporan/penerimaan/';
	}
	function index()
	{
		$data['_title'] 	= 'Laporan Penerimaan';
		$data['judul']  	= 'Laporan Penerimaan';
		$data['tgl_dari']	= $this->input->get('tgl_dari');
		$data['tgl_sampai']	= $this->input->get('tgl_sampai');
		$data['cabang']	    = $this->input->get('cabang');
		$data['print']      = $this->input->get('print');

							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }	
		$data['dd_cabang']  = $this->dbm->dropdown('cabang','- pilih cabang','kd_cabang','nm_cabang');
							  $this->db->order_by('pengiriman.tgl_terima',"DESC");
							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang_tujuan',$this->session->userdata('cabang'));
							  } 
							  
							  if($data['tgl_dari'] !='' && $data['tgl_sampai'] !='')
							  {
							  	$this->db->where('tgl_terima >=',tgl_sql($data['tgl_dari']));
							  	$this->db->where('tgl_terima <=',tgl_sql($data['tgl_sampai']));
							  }
							  elseif($data['tgl_dari'] =='' && $data['tgl_sampai'] =='')
							  {
							  	$this->db->where('tgl_terima >=',date('Y-m-d'));
							  	$this->db->where('tgl_terima <=',date('Y-m-d'));
							  }
							  if($data['cabang'] !='')
							  {
							  	$this->db->where('kd_cabang_tujuan',$data['cabang']);
							  }
							  $this->db->where('status','DITERIMA');
		$data['list']		= $this->dbm->get_all_data('pengiriman')->result();

		if($data['print'] !='ok')
		{
			$this->template->display($this->view.'index',$data);
		}
		elseif($data['print'] == 'ok')
		{
			$content = $this->load->view($this->view.'cetak',$data,true);

			$this->pdf->create($content, 'laporan_penerimaan');
		}
		
	}
}