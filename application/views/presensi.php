<?php $this->load->view('template/header_front'); ?>
    <div class="span9" style='min-height:550px;'>
        <h4><?php echo $judul ?></h4>
          <hr>
          	 <?php $ci = & get_instance(); ?>
<h4>REKAP PRESENSI <?php echo strtoupper($info->nama) ?> BULAN <?php echo strtoupper(bulan_indo(date('m'))) ?> TAHUN <?php echo date('Y') ?></h4>
<table class='table table-bordered table-striped' width='100%' style='margin-top:10px;'>
	<thead bgcolor='#bbb'>
		<tr>
			<?php for ($i=1; $i < 32; $i++):?>
			<th width='20'style='text-align:center;'><?php echo $i ?></th>
			<?php endfor ?>
		</tr>	
	</thead>
	<tbody>
	<?php $no =1;foreach($list as $key): ?>
		<tr>
			<?php for ($i=1; $i < 32; $i++):?>
			<?php $cek = $ci->get_status($key->id_siswa,$i) ?>
			<td style='text-align:center;'><?php echo $cek; ?></td>
			<?php endfor ?>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<?php $this->load->view('template/footer_front'); ?>