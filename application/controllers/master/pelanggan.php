<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Pelanggan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','session','akses','pagination'));
		$this->load->model('dbm');
		$this->akses->auth();

		$this->view = 'master/pelanggan/';
	}
	function index()
	{
		$data['_title'] 	= 'Data Pelanggan';
		$data['judul']  	= 'Data Pelanggan';
		$data['edit']   	= $this->input->get('edit');
		$data['paging'] 	= $this->generatePagination();
		$data['cari_pelanggan']  = $this->input->get('cari_pelanggan');
							  if($data['cari_pelanggan'] !='')
							  {
							  	$this->db->like('kd_pelanggan',$data['cari_pelanggan']);
							  	$this->db->or_like('nama',$data['cari_pelanggan']);
							  }			
		$data['list'] 		= $this->db->get('pelanggan',10,0)->result();

		if($data['edit'] !='')
		{
			$data['edt'] = $this->dbm->get_data_where('pelanggan',array('id_pelanggan'=>$data['edit']))->row();
		}
		
		$this->template->display($this->view.'index',$data);
	}
	function page()
	{
		$data['_title'] 	= 'Data Pelanggan';
		$data['judul']  	= 'Data Pelanggan';
		$data['edit']   	= $this->input->get('edit');
		$data['paging'] 	= $this->generatePagination();
		$data['cari_pelanggan']  = $this->input->get('cari_pelanggan');
		$page = $this->uri->segment(4);

							  if($data['cari_pelanggan'] !='')
							  {
							  	$this->db->like('kd_pelanggan',$data['cari_pelanggan']);
							  	$this->db->or_like('nama',$data['cari_pelanggan']);
							  }		
		$data['list'] 	    = $this->db->get('pelanggan',10,$page)->result();

		if($data['edit'] !='')
		{
			$data['edt'] = $this->dbm->get_data_where('pelanggan',array('id_pelanggan'=>$data['edit']))->row();
		}
		
		$this->template->display($this->view.'index',$data);
	}
	function generatePagination()
	{
		$this->load->model('model_paging');

	    $config['base_url']     = base_url() ."master/pelanggan/page";
	    $config['total_rows']   = $this->model_paging->get_total_rows('pelanggan');
	    $config['uri_segment']  = 4;
	    $config['per_page']     = 10;
	    $config['num_links']    = 2;
	     
	    $this->pagination->initialize($config);
	      
	    return $this->pagination->create_links();
	      
	}
	function simpan()
	{
		if($this->input->post('pelanggan_id') == '')
		{
			$this->form_validation->set_rules('kode_pelanggan','Kode pelanggan','required|is_unique[pelanggan.kd_pelanggan]');
			$this->form_validation->set_rules('nama','Nama Pelanggan','required');
			$this->form_validation->set_rules('alamat','Alamat','required');	
		}
		else
		{
			$this->form_validation->set_rules('kode_pelanggan','Kode pelanggan','required');
			$this->form_validation->set_rules('nama','Nama Pelanggan','required');
			$this->form_validation->set_rules('alamat','Alamat','required');		
		}
		
		
		if($this->form_validation->run())
		{ 
			$arr = array('kd_pelanggan' =>$this->input->post('kode_pelanggan'),
						 'nama'		 	=>$this->input->post('nama'),
						 'alamat'	 	=>$this->input->post('alamat'),
						 'no_telp'		=>$this->input->post('no_telp'));

			$id  = array('id_pelanggan'  =>$this->input->post('pelanggan_id'));

			if($this->input->post('pelanggan_id')=='')
			{
				$this->dbm->insert('pelanggan',$arr);

				echo 'Data Tersimpan';
			} 
			else
			{
				$this->dbm->update('pelanggan',$id,$arr);

				echo 'Data Terupdate';
			}
		}
		else
		{
			echo strip_tags(validation_errors());
		}
	}
	function hapus($id)
	{
		$this->dbm->delete('pelanggan',array('id_pelanggan'=>$id));
		die();
	}
}
