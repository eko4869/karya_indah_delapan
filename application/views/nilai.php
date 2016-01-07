<?php $this->load->view('template/header_front'); ?>

    <div class="span9" style='min-height:550px;'>
        <h4><?php echo $judul ?></h4>
          <hr>
         <h5>Rekap Nilai Siswa Tahun Pelajaran <?php echo $ta_aktif->ta ?> Semester <?php echo $sem_aktif->semester ?></h5>
         <table width='100%'style='border-collapse:collapse; margin-top:10px;'  class='table table-bordered' border='1'>
			<thead bgcolor='#bbb'>
				<tr>
					<th style='vertical-align:middle;text-align:center' rowspan='2' width='30'>No</th>
					<th style='vertical-align:middle;text-align:center' rowspan='2'>Mata Pelajaran</th>
					<th style='vertical-align:middle;text-align:center' rowspan='2' width='50'>KKM</th>
					<th style='vertical-align:middle;text-align:center' colspan='2'>Nilai</th>
					<th style='vertical-align:middle;text-align:center' rowspan='2' width='100'>Ketercapaian Kompetensi</th>
				</tr>
				<tr>
					<th style='vertical-align:middle;text-align:center' width='50'>Angka</th>
					<th style='vertical-align:middle;text-align:center' width='170'>Huruf</th>
				</tr>
			</thead>
			<tbody bgcolor='#eee'>
			<?php $no =1; foreach ($mapel as $m): ?>
			<?php if($m->jenjang == '1')
				  {
				  	$kkm = $m->kkm1;
				  }
				  elseif($m->jenjang == '2')
				  {
				  	$kkm = $m->kkm2;
				  }
				  elseif($m->jenjang =='3')
				  {
				  	$kkm = $m->kkm3;
				  }

				  if($m->na >= $kkm)
				  {
				  	$kk = 'Tuntas';
				  }
				  else
				  {
				  	$kk ='Belum Tuntas';
				  }
			?>
				<tr>
					<td style='vertical-align:middle;text-align:center' ><?php echo $no++; ?>.</td>
					<td><?php echo $m->nama_mapel ?></td>
					<td style='vertical-align:middle;text-align:center'><?php echo $kkm ?></td>
					<td style='vertical-align:middle;text-align:center'><?php echo $m->na ?></td>
					<td style='vertical-align:middle;text-align:center'></td>
					<td style='vertical-align:middle;text-align:center'><?php echo $kk ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
        </div>
    </div>
<?php $this->load->view('template/footer_front'); ?>