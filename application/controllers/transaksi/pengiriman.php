<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Pengiriman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','session','akses','pagination'));
		$this->load->model('dbm');
		$this->akses->auth();

		$this->view = 'transaksi/pengiriman/';
	}
	function index()
	{
		$data['_title'] 	= 'List Pengiriman';
		$data['judul']  	= 'List Pengiriman';
		$data['tgl_dari']	= $this->input->get('tgl_dari');
		$data['tgl_sampai']	= $this->input->get('tgl_sampai');
		$data['cabang']	    = $this->input->get('cabang');

							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }	
		$data['dd_cabang']  = $this->dbm->dropdown('cabang','','kd_cabang','nm_cabang');
							  $this->db->order_by('pengiriman.tgl_kirim',"DESC");
							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  } 
							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }
							  if($data['tgl_dari'] !='' && $data['tgl_sampai'] !='')
							  {
							  	$this->db->where('tgl_kirim >=',tgl_sql($data['tgl_dari']));
							  	$this->db->where('tgl_kirim <=',tgl_sql($data['tgl_sampai']));
							  }
							  if($data['cabang'] !='')
							  {
							  	$this->db->where('kd_cabang',$data['cabang']);
							  }
		$data['list']		= $this->db->get('pengiriman',10,0)->result();
		$data['paging']		= $this->generatePagination();
		
		$this->template->display($this->view.'index',$data);
	}
	function page()
	{
		$data['_title'] 	= 'List Pengiriman';
		$data['judul']  	= 'List Pengiriman';
		$data['tgl_dari']	= $this->input->get('tgl_dari');
		$data['tgl_sampai']	= $this->input->get('tgl_sampai');
		$data['cabang']	    = $this->input->get('cabang');
		$page               = $this->uri->segment(4);   

							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }	
		$data['dd_cabang']  = $this->dbm->dropdown('cabang','','kd_cabang','nm_cabang');
							  $this->db->order_by('pengiriman.tgl_kirim',"DESC");
							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }
							  if($data['tgl_dari'] !='' && $data['tgl_sampai'] !='')
							  {
							  	$this->db->where('tgl_kirim >=',tgl_sql($data['tgl_dari']));
							  	$this->db->where('tgl_kirim <=',tgl_sql($data['tgl_sampai']));
							  }
							  if($data['cabang'] !='')
							  {
							  	$this->db->where('kd_cabang',$data['cabang']);
							  }
		$data['list']		= $this->db->get('pengiriman',10,$page)->result();
		$data['paging']		= $this->generatePagination();
		
		$this->template->display($this->view.'index',$data);
	}
	function generatePagination()
  	{
  		$this->load->model('model_paging');
	    $config['base_url']     = base_url() ."transaksi/pengiriman/page";
	    $config['total_rows']   = $this->model_paging->get_total_rows('pengiriman');
	    $config['uri_segment']  = 4;
	    $config['per_page']     = 10;
	    $config['num_links']    = 2;
	     
	    $this->pagination->initialize($config);
	      
	    return $this->pagination->create_links();
      
  	}
	function tambah()
	{
		$data['judul']  	= 'Pengiriman Baru';
		$data['dd_layanan'] = $this->dbm->dropdown('layanan','- pilih layanan','kd_layanan','nama_layanan');
		$data['dari']		= $this->get_dari();
		$data['sampai']		= $this->get_sampai();
		$data['no_resi']	= $this->no_resi();

							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }	
		$data['dd_cabang']  = $this->dbm->dropdown('cabang','','kd_cabang','nm_cabang');
									 
									 if($this->session->userdata('cabang') != NULL)
									 {
									  	$this->db->where('kd_cabang !=',$this->session->userdata('cabang'));
									 }				
		$data['dd_cabang_tujuan']  = $this->dbm->dropdown('cabang','','kd_cabang','nm_cabang');
		

		$data['list']       = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$data['no_resi']))->result();
		
		$this->template->display($this->view.'form',$data);	
	}
	function edit($no_resi)
	{
		$data['judul']  	= 'Edit Pengiriman';
		$data['dta']        = $this->dbm->get_data_where('pengiriman',array('no_resi'=>$no_resi))->row();
		$data['dd_layanan'] = $this->dbm->dropdown('layanan','- pilih layanan','kd_layanan','nama_layanan');
		$data['dari']		= $this->get_dari();
		$data['sampai']		= $this->get_sampai();
		$data['no_resi']	= $no_resi;

							  if($this->session->userdata('cabang') != NULL)
							  {
							  	$this->db->where('kd_cabang',$this->session->userdata('cabang'));
							  }	
		$data['dd_cabang']  = $this->dbm->dropdown('cabang','','kd_cabang','nm_cabang');
									 
									 if($this->session->userdata('cabang') != NULL)
									 {
									  	$this->db->where('kd_cabang !=',$this->session->userdata('cabang'));
									 }				
		$data['dd_cabang_tujuan']  = $this->dbm->dropdown('cabang','','kd_cabang','nm_cabang');
		

		$data['list']       = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$data['no_resi']))->result();
		
		$this->template->display($this->view.'form',$data);	
	}
	function list_pengiriman()
	{
		$data['no_resi']	= $this->no_resi();
		$data['list']       = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$data['no_resi']))->result();

		$this->load->view($this->view.'list',$data);
	}
	function detail_pengiriman($no_resi=null)
	{
		$data['info'] = $this->dbm->get_data_where('pengiriman',array('no_resi'=>$no_resi))->row();
		$data['list'] = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$no_resi))->result(); 

		$this->template->display($this->view.'detail_pengiriman',$data);
	}
	function cetak_nota_pengiriman($no_resi)
	{
		$this->load->library('pdf');

		$data['info'] = $this->dbm->get_data_where('pengiriman',array('no_resi'=>$no_resi))->row();
		$data['list'] = $this->dbm->get_data_where('pengiriman_list',array('no_resi'=>$no_resi))->result(); 

		$content 	  = $this->load->view($this->view. 'cetak_nota_pengiriman', $data,true);

		$this->pdf->create($content, 'nota_pengirim');
	} 
	function simpan_pengiriman()
	{
		$this->form_validation->set_rules('kode_pengirim','Kode Pengirim','required');
		$this->form_validation->set_rules('nama_pengirim','Nama Pengirim','required');
		$this->form_validation->set_rules('alamat_pengirim','Alamat Pengirim','required');
		$this->form_validation->set_rules('telp_pengirim','Telp Pengirim','required');
		$this->form_validation->set_rules('kode_penerima','Kode Penerima','required');
		$this->form_validation->set_rules('nama_penerima','Nama Penerima','required');
		$this->form_validation->set_rules('alamat_penerima','Alamat Penerima','required');
		$this->form_validation->set_rules('telp_penerima','Telp Penerima','required');
		$this->form_validation->set_rules('dari','Asal / Dari','required');
		$this->form_validation->set_rules('sampai','Tujuan','required');
		$this->form_validation->set_rules('layanan','Layanan','required');
		$this->form_validation->set_rules('tgl_kirim','Tgl. Kirim','required');
		$this->form_validation->set_rules('tarif_kg','Tarif / Kg','required');

		if($this->form_validation->run())
		{
			$mode            = $this->input->post('mode');
			$no_resi_hidden  = $this->input->post('no_resi_hidden');
			$no_resi         = ($mode == 'edit' ? $no_resi_hidden : $this->no_resi());
			$cabang 		 = $this->input->post('cabang');
			$cabang_tujuan 	 = $this->input->post('cabang_tujuan');
			$kode_pengirim   = $this->input->post('kode_pengirim');
			$nama_pengirim   = $this->input->post('nama_pengirim');
			$alamat_pengirim = $this->input->post('alamat_pengirim');
			$telp_pengirim   = $this->input->post('telp_pengirim');
			$kode_penerima   = $this->input->post('kode_penerima');
			$nama_penerima   = $this->input->post('nama_penerima');
			$alamat_penerima = $this->input->post('alamat_penerima');
			$telp_penerima   = $this->input->post('telp_penerima');
			$dari            = $this->input->post('dari');
			$sampai          = $this->input->post('sampai');
			$layanan         = $this->input->post('layanan');
			$tarif_kg        = $this->input->post('tarif_kg');
			$tgl_kirim       = $this->input->post('tgl_kirim');
			$keterangan      = $this->input->post('keterangan');

			$ind = array('no_resi'=>$no_resi);      
			
	    	$arr = array(
	    		         'no_resi'        =>$no_resi, 
	    				 'kd_cabang'	  =>$cabang,
	    				 'kd_pengirim'    =>$kode_pengirim,
	    				 'nama_pengirim'  =>$nama_pengirim,
	    				 'alamat_pengirim'=>$alamat_pengirim,
	    				 'telp_pengirim'  =>$telp_pengirim,
	    				 'kd_penerima'    =>$kode_penerima,
	    				 'nama_penerima'  =>$nama_penerima,
	    				 'alamat_penerima'=>$alamat_penerima,
	    				 'telp_penerima'  =>$telp_penerima,
	    				 'tgl_kirim'      =>tgl_sql($tgl_kirim),
	    				 'jam_kirim'	  =>date('H:i:s'),
	    				 'status'         =>'proses pengiriman',
	    				 'keterangan'     =>$keterangan,
	    				 'layanan'		  =>$layanan,
	    				 'harga_kg'		  =>$tarif_kg,
	    				 'kd_cabang_tujuan'=>$cabang_tujuan,
	    				 'dari'			  =>$dari,
	    				 'sampai'         =>$sampai	
	    				 );

	    	if($mode == 'edit')
	    	{
	    		$in  = $this->dbm->update('pengiriman',$ind,$arr); 
	    		$msg = 'Data Terupdate';
	    	}
	    	elseif($mode == 'tambah')
	    	{
	    		
	    		$in  = $this->dbm->insert('pengiriman',$arr); 
	    		$msg = 'Data Tersimpan';
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
	function tambah_item()
	{

		$data['judul']  	= 'Pengiriman Baru';
		$data['dd_layanan'] = $this->dbm->dropdown('layanan','- pilih layanan','id_layanan','nama_layanan');
		$data['dari']		= $this->get_dari();
		$data['sampai']		= $this->get_sampai();
		$data['no_resi']	= $this->input->get('no_resi');
		$data['hrg']		= $this->input->get('tarif_kg');
		
		$this->template->display($this->view.'tambah_item',$data);
	}
	function hapus_item($id_list)
	{

		$this->dbm->delete('pengiriman_list',array('id_list'=>$id_list));
		die();
	}
	function hapus($no_resi)
	{
		
		$this->dbm->delete('pengiriman',array('no_resi'=>$no_resi));
		$this->dbm->delete('pengiriman_list',array('no_resi'=>$no_resi));
		die();
	}
	function simpan_item()
	{
	    $this->form_validation->set_rules('no_resi_item','No Resi','required');
	    $this->form_validation->set_rules('isi_barang','Isi Barang','required');
	    $this->form_validation->set_rules('berat','Berat','required');
	    $this->form_validation->set_rules('harga_kg','Harga / Kg','required');
	    $this->form_validation->set_rules('subtotal','Subtotal','required');

	    if($this->form_validation->run())
	    {
	    	$no_resi    = $this->input->post('no_resi_item');
	    	$isi_barang = $this->input->post('isi_barang');
	    	$berat      = $this->input->post('berat');
	    	$harga_kg   = $this->input->post('harga_kg');
	    	$subtotal   = $this->input->post('subtotal');

	    	$arr        = array('no_resi'	=>$no_resi,
					    		'isi_barang'=>$isi_barang,
					    		'berat'		=>$berat,
					    		'harga_kg'	=>$harga_kg,
					    		'subtotal'	=>$subtotal);

	    	$in         = $this->dbm->insert('pengiriman_list',$arr);

	    	if($in)
	    	{
	    		echo 'ok';
	    	}
	    }
	    else
	    {
	    	echo strip_tags(validation_errors());
	    }

	}
	function no_resi()
	{
			$this->db->order_by('no_resi','DESC');
			$cek_no   = $this->dbm->get_all_data('pengiriman');
            $no_urut  = "";
            
            if($cek_no->num_rows() == "0")
               {
                    $no_urut = "000001";
               }
            else
               {
                    $exist_no_urut = (int) $cek_no->row()->no_resi+1;
                    if($exist_no_urut < 10) {
                          $no_urut = "00000".$exist_no_urut;
                      } elseif($exist_no_urut < 100) {
                          $no_urut = "0000".$exist_no_urut;
                      } elseif($exist_no_urut < 1000) {
                          $no_urut = "000".$exist_no_urut;
                      } elseif($exist_no_urut < 10000) {
                          $no_urut = "00".$exist_no_urut;
                      } elseif($exist_no_urut < 100000) {
                          $no_urut = "0".$exist_no_urut;
                      } elseif($exist_no_urut > 100000) {
                          $no_urut = $exist_no_urut;
                      }
               }
           
           return $no_urut;
	}
	function get_layanan($dari = null,$sampai = null,$layanan=null)
	{
			   $this->db->join('layanan','tarif.id_layanan=layanan.id_layanan');	
		$get = $this->dbm->get_data_where('tarif',array('dari'=>$dari,'sampai'=>$sampai,'kd_layanan'=>$layanan))->row();

		if(!empty($get))
		{
			echo $get->tarif_kg;	
		}
		else
		{
			echo "0";
		}
		
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
	function get_pengirim($kode=null)
	{
		$get = $this->dbm->get_data_where('pelanggan',array('kd_pelanggan'=>$kode))->row();

		if(!empty($get))
		{
			echo $get->nama.'|'.$get->alamat.'|'.$get->no_telp;
		}
	}
}