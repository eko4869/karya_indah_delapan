<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Profil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','akses','session','pagination'));
		$this->akses->auth();
	}
	function index()
	{
		$data['_title']   = "Profil User";
		$data['judul']    = "Profil User";
		
		$data['profil']   = $this->dbm->get_data_where('user',array('id_user'=>$this->session->userdata('id_user')))->row();
		$data['layanan']  = $this->dbm->get_all_data('layanan')->result();
		$data['cabang']   = $this->dbm->get_all_data('cabang')->result();
		$this->template->display('pengaturan/profil/index',$data);
	}
	function simpan_cabang()
	{
		if($_POST['id_cabang'] !='')
		{
			$this->form_validation->set_rules('kode_cabang','Kode Cabang','trim|required');
			$this->form_validation->set_rules('nama_cabang','Nama Cabang','trim|required');	
		}
		else
		{
			$this->form_validation->set_rules('kode_cabang','Kode Cabang','trim|required|is_unique[cabang.kd_cabang]');
			$this->form_validation->set_rules('nama_cabang','Nama Cabang','trim|required');
		}
		

		if($this->form_validation->run())
		{
			$kd_cabang   = $this->input->post('kode_cabang');
			$nama_cabang = $this->input->post('nama_cabang');
			$id_cabang   = $this->input->post('id_cabang');
			if($id_cabang =='')
			{

				$in = $this->dbm->insert('cabang',array(
												  'kd_cabang'  =>$kd_cabang,
												  'nm_cabang'=>$nama_cabang
												  ));
				$msg='Data Tersimpan';
			}
			else
			{

				$in = $this->dbm->update('cabang',array('id_cabang'=>$id_cabang),
												  array(
												  'kd_cabang'	=>$kd_cabang,
												  'nm_cabang'=>$nama_cabang));
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
	function hapus_cabang($id)
	{
		$this->dbm->delete('cabang',array('id_cabang'=>$id));
		die();
	}
	function simpan_layanan()
	{
		if($_POST['id_layanan'] !='')
		{
			$this->form_validation->set_rules('kode_layanan','Kode Layanan','trim|required');
			$this->form_validation->set_rules('nama_layanan','Nama Layanan','trim|required');	
		}
		else
		{
			$this->form_validation->set_rules('kode_layanan','Kode Layanan','trim|required|is_unique[layanan.kd_layanan]');
			$this->form_validation->set_rules('nama_layanan','Nama Layanan','trim|required');
		}
		

		if($this->form_validation->run())
		{
			$kd_layanan   = $this->input->post('kode_layanan');
			$nama_layanan = $this->input->post('nama_layanan');
			$keterangan   = $this->input->post('keterangan');
			$id_layanan   = $this->input->post('id_layanan');
			if($id_layanan =='')
			{
				$in = $this->dbm->insert('layanan',array(
												  'kd_layanan'  =>$kd_layanan,
												  'nama_layanan'=>$nama_layanan,
												  'keterangan'  =>$keterangan));
				$msg='Data Tersimpan';
			}
			else
			{

				$in = $this->dbm->update('layanan',array('id_layanan'=>$id_layanan),
												  array(
												  'kd_layanan'	=>$kd_layanan,
												  'nama_layanan'=>$nama_layanan,
												  'keterangan'	=>$keterangan));
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
	function hapus_layanan($id)
	{
		$this->dbm->delete('layanan',array('id_layanan'=>$id));
		die();
	}
	function update()
	{
		if(!empty($_POST['password']))
		{

			$this->form_validation->set_rules('username','Username','trim|required|min_lenght[5]');
			$this->form_validation->set_rules('password','Password','trim|min_length[5]');
			$this->form_validation->set_rules('k_password','Konfirm Password','required|min_length[5]|matches[password]');
			if($this->form_validation->run())
			{

				$cek = $this->dbm->get_data_where('user',array('username'=>$_POST['username'],'id_user !='=>$_POST['id_user']))->row('username');
				if(!empty($cek))
				{
					echo "Username sudah dipakai";
				}	
				else
				{
					
					$up = $this->dbm->update('user',array('id_user' =>$_POST['id_user']),array(
														  'username'=>$_POST['username'],
														  'password'=>md5($_POST['password'])	
						));

					if($up)
					{
						echo "Profil user telah diupdate";
					}
				}
			}
			else
			{
				echo strip_tags(validation_errors());
			}
		}
		else
		{
			$this->form_validation->set_rules('username','Username','trim|required|min_lenght[5]');
			if($this->form_validation->run())
			{
				$cek = $this->dbm->get_data_where('user',array('username'=>$_POST['username'],'id_user !='=>$_POST['id_user']))->row('username');
				if(!empty($cek))
				{
					echo "Username sudah dipakai";
				}	
				else
				{
					$up = $this->dbm->update('user',array('id_user' =>$_POST['id_user']),array(
														  'username'=>$_POST['username'],
						));

					if($up)
					{
						echo "Profil user telah diupdate tanpa penggantian password";
					}
				}
			}
			else
			{
				echo strip_tags(validation_errors());
			}		
		}
		
	}
}