<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Tarif extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','akses','session','pagination'));
		$this->akses->auth();
		$this->view = 'pengaturan/tarif/';
	}
	function index()
	{
		$data['_title'] 	= 'Tarif Pengiriman';
		$data['judul']  	= 'Tarif Pengiriman';
		$data['paging'] 	= $this->generatePagination();
		$data['kode_tarif'] = $this->input->get('kode_tarif');
		$data['layanan']	= $this->input->get('layanan');
		$data['dari']		= $this->input->get('dari');
		$data['sampai']		= $this->input->get('sampai');

							  $this->db->select('layanan.kd_layanan,layanan.id_layanan,tarif.kd_tarif,tarif.id_tarif,tarif.dari,tarif.sampai,tarif.tarif_kg');
							  $this->db->join('layanan','tarif.id_layanan=layanan.id_layanan');	
							  if($data['kode_tarif'] !='')
							  {
							  	$this->db->where('kd_tarif',$data['kode_tarif']);
							  }
							  if($data['layanan'] !='')
							  {
							  	$this->db->where('layanan.id_layanan',$data['layanan']);
							  }
							  if($data['dari'] !='')
							  {
							  	$this->db->where('dari',$data['dari']);
							  }
							  if($data['sampai'] !='')
							  {
							  	$this->db->where('sampai',$data['sampai']);
							  }
		$data['list'] 		= $this->db->get('tarif',10,0)->result();

							  	
		$data['dd_layanan'] = $this->dbm->dropdown('layanan','- pilih layanan','id_layanan','nama_layanan');
		
		
		$this->template->display($this->view.'index',$data);
	}
	function page()
	{
		$data['_title'] 	= 'Tarif Pengiriman';
		$data['judul']  	= 'Tarif Pengiriman';
		$data['paging'] 	= $this->generatePagination();
		$data['kode_tarif'] = $this->input->get('kode_tarif');
		$data['layanan']	= $this->input->get('layanan');
		$data['dari']		= $this->input->get('dari');
		$data['sampai']		= $this->input->get('sampai');
		$page = $this->uri->segment(4);
		$data['dd_layanan'] = $this->dbm->dropdown('layanan','- pilih layanan','id_layanan','nama_layanan');
		
							  $this->db->select('layanan.kd_layanan,layanan.id_layanan,tarif.kd_tarif,tarif.id_tarif,tarif.dari,tarif.sampai,tarif.tarif_kg');
							  $this->db->join('layanan','tarif.id_layanan=layanan.id_layanan');	
							  if($data['kode_tarif'] !='')
							  {
							  	$this->db->where('kd_tarif',$data['kode_tarif']);
							  }
							  if($data['layanan'] !='')
							  {
							  	$this->db->where('layanan.id_layanan',$data['layanan']);
							  }
							  if($data['dari'] !='')
							  {
							  	$this->db->where('dari',$data['dari']);
							  }
							  if($data['sampai'] !='')
							  {
							  	$this->db->where('sampai',$data['sampai']);
							  }					  	
		$data['list'] 	    = $this->db->get('tarif',10,$page)->result();

		
		$this->template->display($this->view.'index',$data);
	}
	function generatePagination()
	{
		$this->load->model('model_paging');

	    $config['base_url']     = base_url() ."pengaturan/tarif/page";
	    $config['total_rows']   = $this->model_paging->get_total_rows('tarif');
	    $config['uri_segment']  = 4;
	    $config['per_page']     = 10;
	    $config['num_links']    = 2;
	     
	    $this->pagination->initialize($config);
	      
	    return $this->pagination->create_links();
	      
	}
	function simpan()
	{

		if($_POST['id_tarif'] !='')
		{
			$this->form_validation->set_rules('kode_tarif','Kode Tarif','trim|required');
			$this->form_validation->set_rules('layanan','Nama Layanan','trim|required');
			$this->form_validation->set_rules('dari','dari','trim|required');
			$this->form_validation->set_rules('sampai','sampai','trim|required');	
			$this->form_validation->set_rules('tarif_kg','Tarif /kg','required');	
		}
		else
		{
			$this->form_validation->set_rules('kode_tarif','Kode Tarif','trim|required|is_unique[tarif.kd_tarif]');
			$this->form_validation->set_rules('layanan','Nama Layanan','trim|required');
			$this->form_validation->set_rules('dari','dari','trim|required');
			$this->form_validation->set_rules('sampai','sampai','trim|required');	
			$this->form_validation->set_rules('tarif_kg','Tarif /kg','required');
		}
		
		if($this->form_validation->run())
		{

			$kd_tarif     = $this->input->post('kode_tarif');
			$layanan 	  = $this->input->post('layanan');
			$dari   	  = $this->input->post('dari');
			$sampai   	  = $this->input->post('sampai');
			$id_tarif     = $this->input->post('id_tarif');
			$tarif_kg     = $this->input->post('tarif_kg');



			if($id_tarif =='')
			{

				$in = $this->dbm->insert('tarif',array(
												  'kd_tarif'  =>$kd_tarif,
												  'id_layanan'=>$layanan,
												  'dari'  	  =>$dari,
												  'sampai'    =>$sampai,
												  'tarif_kg'  =>$tarif_kg
												  ));
				$msg='Data Tersimpan';
			}
			else
			{

				$in = $this->dbm->update('tarif',array('id_tarif'=>$id_tarif),
												  array(
												  'kd_tarif'  =>$kd_tarif,
												  'id_layanan'=>$layanan,
												  'dari'  	  =>$dari,
												  'sampai'    =>$sampai,
												  'tarif_kg'  =>$tarif_kg
												  ));
				$msg='Data Terupdate';

			}
			if($in)
			{
				echo $msg;
			}
		}
		else
		{
			echo strip_tags(validation_errors());
		}
	}
	function hapus($id)
	{
		$this->dbm->delete('tarif',array('id_tarif'=>$id));
		die();
	}
}