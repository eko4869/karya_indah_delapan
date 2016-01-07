<?php $this->load->view('template/header_front'); ?>
        <div class="span9">
          <div class="hero-unit" style='background:#009241;color:#eee;'>
            <h2>Selamat Datang, <?php echo $info->ortu ?></h2>
            <p></p>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Presensi Siswa</h2>
              <p>Hari ini putra/putri anda ,<b> <?php echo $info->nama ?> </b> <?php echo $info_presen ?></p>
              <p><a class="btn btn-success" href='<?php echo base_url()."dashboard/presensi_siswa"?>'>Lihat detail &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Nilai Siswa</h2>
              <p>Lihat rekap nilai putra/putri anda </p>
              <p><a class="btn btn-success" href='<?php echo base_url()."dashboard/nilai_siswa"?>'>Lihat detail &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Pelanggaran Siswa</h2>
              <p>Total poin pelanggaran putra/putri anda, <b> <?php echo $info->nama ?> </b>adalah <b> <?php echo $total_pela; ?></b>  </p>
              <p><a class="btn btn-success" href='<?php echo base_url()."dashboard/pelanggaran_siswa"?>'>Lihat detail &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
<?php $this->load->view('template/footer_front'); ?>
      