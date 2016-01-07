<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Front extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dbm');
	}
	function index()
	{
		$data['dari']		= $this->get_dari();
		$data['sampai']		= $this->get_sampai();
		$data['get_dari']   = $this->input->get('get_dari');
		$data['get_sampai'] = $this->input->get('get_sampai');
		$data['berat']		= $this->input->get('berat');
		$data['resi'] = $this->input->get('resi');

		if($data['resi'] !='')
		{
				   $this->db->join('pengiriman','pengiriman_list.no_resi=pengiriman.no_resi');	
				   //$this->db->where('status !=','DITERIMA');
			$get = $this->dbm->get_data_where('pengiriman_list',array('pengiriman.no_resi'=>$data['resi']));
			$data['list'] = $get->result();
			$data['info'] = $get->row();
		}
		if($data['get_dari'] !='' && $data['get_sampai'] !='')
		{
				   $this->db->join('layanan','tarif.id_layanan=layanan.id_layanan');	
			$get = $this->dbm->get_data_where('tarif',array('dari'=>$data['get_dari'],'sampai'=>$data['get_sampai']));
			$data['rw']    = $get->row();
			$data['tarif'] = $get->result();
		}
		$this->load->view('front',$data);
	}
	function get_dari()
	{
			   $this->db->select('dari');
			   $this->db->group_by('dari');
		$get = $this->dbm->get_all_data('tarif')->result();
		
		foreach($get as $kk)
		{
			$hsl[] = $kk->dari;
		}
		return (json_encode($hsl));
	}
	function get_sampai()
	{
			   $this->db->select('sampai');
			   $this->db->group_by('sampai');
		$get = $this->dbm->get_all_data('tarif')->result();
		
		foreach($get as $kk)
		{
			$hsl[] = $kk->sampai;
		}
		return (json_encode($hsl));
	}
}