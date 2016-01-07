<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','session','akses','pagination'));
		$this->load->model('dbm');
		$this->akses->auth();
	}
	function index()
	{
		$data['info'] = $this->info_siswa();

		$get_presen   = $this->dbm->get_data_where('presensi',array('id_siswa'=>$data['info']->id_siswa,'tgl_presensi'=>date('Y-m-d')))->row('status');			
		if($get_presen == 'M')
		{
			$data['info_presen'] = 'MASUK';	
		}
		elseif($get_presen == 'S')
		{
			$data['info_presen'] = 'tidak masuk karena sedang SAKIT';		
		}
		elseif($get_presen == 'I')
		{
			$data['info_presen'] = 'tidak masuk karena sedang IJIN';		
		}
		elseif($get_presen == 'A')
		{
			$data['info_presen'] = 'tidak masuk tanpa keterangan atau ALPHA';		
		}
		else
		{
			$data['info_presen'] = 'tidak masuk karena hari libur';
		}
								   $this->db->join('pelanggaran','pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran');	
		$data['total_pela']      = $this->dbm->sum_data_where('poin','pelanggaran_siswa',array('id_siswa'=>$data['info']->id_siswa))->row('poin');
		

		$this->load->view('dashboard',$data);
	}

	function presensi_siswa()
	{
		$data['judul'] = 'Presensi Siswa';
		$data['info']  = $this->info_siswa();
		$data['ta_aktif']   = $this->dbm->get_data_where('tahun_akademik',array('aktif'=>'y'))->row();
		$data['sem_aktif']  = $this->dbm->get_data_where('semester',array('aktif'=>'y'))->row();
			
								  $this->db->select('siswa.id_siswa,siswa.nis,siswa.nama,presensi.status,presensi.tgl_presensi');	
				 				  $this->db->join('kelas','presensi.id_kelas=kelas.id_kelas');
								  $this->db->join('kelas_list','kelas.id_kelas=kelas_list.id_kelas');
								  $this->db->join('siswa','kelas_list.id_siswa=siswa.id_siswa');
								  $this->db->where('kelas_list.id_ta',$data['ta_aktif']->id_ta);
								  $this->db->order_by('nama','ASC');
								  $this->db->group_by('siswa.id_siswa');
								  $this->db->where('siswa.id_siswa',$data['info']->id_siswa);
								  $this->db->where("MONTH(presensi.tgl_presensi)",date('m'));
			$data['list'] 		= $this->dbm->get_all_data('presensi')->result();
			
		$this->load->view('presensi',$data);
	}
	function get_status($id_siswa,$tanggal=null)
	{
		       $this->db->where('id_siswa',$id_siswa);
		       $this->db->where("MONTH(presensi.tgl_presensi)",date('m'));
		       $this->db->where("DAY(presensi.tgl_presensi)",$tanggal);
		       $this->db->where("YEAR(presensi.tgl_presensi)",date('Y'));
		$get = $this->dbm->get_all_data('presensi')->row('status');

		if(!empty($get))
		{
			return $get;
		}
	}
	function nilai_siswa()
	{
		$data['judul'] = 'Nilai Siswa';
		$data['info']  = $this->info_siswa();

		$data['ta_aktif']   = $this->dbm->get_data_where('tahun_akademik',array('aktif'=>'y'))->row();
		$data['sem_aktif']  = $this->dbm->get_data_where('semester',array('aktif'=>'y'))->row();
		
						 $this->db->select('penilaian.na,mapel.nama_mapel,mapel.kkm1,mapel.kkm2,mapel.kkm3,kelas.jenjang');
						 $this->db->join('jadwal','penilaian.id_jadwal=jadwal.id_jadwal');
						 $this->db->join('kelas','jadwal.id_kelas=kelas.id_kelas');
						 $this->db->join('mapel','jadwal.id_mapel=mapel.id_mapel');		
						 $this->db->where('id_semester',$data['sem_aktif']->id_semester);
						 $this->db->where('id_ta',$data['ta_aktif']->id_ta);	
						 $this->db->where('penilaian.id_siswa',$data['info']->id_siswa);			
		$data['mapel'] = $this->dbm->get_all_data('penilaian')->result();

		$this->load->view('nilai',$data);
	}
	function pelanggaran_siswa()
	{
		$data['judul'] = 'Pelanggaran Siswa';
		$data['info']  = $this->info_siswa();


						$this->db->select('pelanggaran_siswa.tgl_pelanggaran,pelanggaran_siswa.id_pelanggaran_siswa,pelanggaran.klas,pelanggaran.jenis,pelanggaran.poin,pelanggaran.tindakan');
						$this->db->join('siswa','pelanggaran_siswa.id_siswa=siswa.id_siswa');
						$this->db->join('pelanggaran','pelanggaran_siswa.id_pelanggaran=pelanggaran.id_pelanggaran');
						$this->db->order_by('tgl_pelanggaran','DESC');
		$data['list'] = $this->dbm->get_data_where('pelanggaran_siswa',array('pelanggaran_siswa.id_siswa'=>$data['info']->id_siswa))->result();
		
		$this->load->view('pelanggaran',$data);
	}
	function ubah_password()
	{
		$data['judul'] = 'Ubah Password';
		$data['info']  = $this->info_siswa();
		$this->load->view('ubah_password',$data);
	}
	function info_siswa()
	{
						if($this->session->userdata('id_level') == '12')
						{
							$this->db->join('siswa','user.id_user=siswa.id_user');
						}
						$this->db->where('user.id_user',$this->session->userdata('id_user'));
		$get = $this->dbm->get_all_data('user')->row();
		
		return $get;
	}
	
}