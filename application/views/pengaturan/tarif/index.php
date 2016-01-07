<div style='width:98%; float:left; border-radius:2px; background:#0435b0; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4><?php echo $judul ?></h4>
<form method='post' id='tarif_form'>
<table>
	<tr>
		<td style='vertical-align:top;'>
			<table style='margin-top:10px; margin-right:30px;'>
				<tr>
					<td width='150'>Kode Tarif</td>
					<td width='5'>:</td>
					<td><input type='hidden' name='id_tarif' id='id_tarif'>
						<?php echo form_input(array('name'=>'kode_tarif','id'=>'kode_tarif','value'=>$kode_tarif,'class'=>'input-small')); ?></td>
				</tr>
				<tr>
					<td width='150'>Layanan</td>
					<td width='5'>:</td>
					<td><?php echo form_dropdown('layanan',$dd_layanan,$layanan,'id="layanan" class="input-medium"') ?></td>
				</tr>
			</table>
		</td>
		<td style='vertical-align:top;'>
			<table style='margin-top:10px; margin-right:30px;'>
				<tr>
					<td width='150'>Dari</td>
					<td width='5'>:</td>
					<td><?php echo form_input(array('name'=>'dari','value'=>$dari,'id'=>'dari','class'=>'input-xlarge')); ?></td>
				</tr>
				<tr>
					<td width='150'>Sampai</td>
					<td width='5'>:</td>
					<td><?php echo form_input(array('name'=>'sampai','value'=>$sampai,'id'=>'sampai','class'=>'input-xlarge')); ?></td>
				</tr>
			</table>
		</td>
		<td style='vertical-align:top;'>
			<table style='margin-top:10px; margin-right:30px;'>
				<tr>
					<td width='150'>Tarif / kg</td>
					<td width='5'>:</td>
					<td><?php echo form_input(array('name'=>'tarif_kg','id'=>'tarif_kg','class'=>'input-medium')); ?></td>
				</tr>
				<tr>
					<td style='text-align:right;' colspan='3'>
					<button type='button' onclick='cari_tarif()' class='btn btn-small btn-inverse'><i class='icon-search icon-white'></i>&nbsp;cari</button>&nbsp;
					<button type='button' onclick='simpan_tarif()' class='btn btn-small btn-inverse'><i class='icon-ok-circle icon-white'></i>&nbsp;simpan</button></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
</div>
<div style='width:98%; float:left; border-radius:2px; background:#0435b0; margin-top:20px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<?php echo $paging ?>
<table  width='100%' class='table table-striped'>
	<thead>
		<tr style='background:#c21712;'>
			<th style='text-align:center; width:20px;'>No</th>
			<th style='text-align:center;' width='100'>Kode Tarif</th>
			<th style='text-align:center;' width='100'>Layanan</th>
			<th style='text-align:left;' width='250'>Dari</th>
			<th style='text-align:left;' width='250'>Sampai</th>
			<th style='text-align:right;' width='200'>Tarif / kg</th>
			
			<th style='text-align:center;' width='70'>Aksi</th>
		</tr>
	</thead>
	<tbody style='color:#000; background:#eee;'>
	<?php if(!empty($list)) :?>
	<?php $no=1+$this->uri->segment(4); foreach($list as $key): ?>
		<tr id='tr_<?php echo $no?>' bgcolor='#eee'>
			<td style='text-align:center;'><?php echo $no ?>.</td>
			<td style='text-align:center;' id='kd_tarif_<?php echo $key->id_tarif?>'><?php echo $key->kd_tarif?></td>
			<td style='text-align:center;'><?php echo $key->kd_layanan ?></td>
			<td style='text-align:left;' id='dari_<?php echo $key->id_tarif?>'><?php echo $key->dari ?></td>
			<td style='text-align:left;' id='sampai_<?php echo $key->id_tarif?>'><?php echo $key->sampai ?></td>
			<td style='text-align:right;'>
			<input type='hidden'  id='tarif_kg_<?php echo $key->id_tarif?>' value='<?php echo $key->tarif_kg ?>'>
			<?php echo uang_indo($key->tarif_kg) ?></td>
			<td style='text-align:center;'>
				<a href="javascript:void();" onclick= "edit_tarif(<?php echo $key->id_tarif ?>)"><i class="icon-pencil"></i></a>&nbsp;
				<a href="javascript:void();" onclick= "hapus_conf('<?php echo base_url()."pengaturan/tarif/hapus/"?>',<?php echo $key->id_tarif?>,<?php echo $no ?>)" ><i class="icon-trash"></i></a>
			</td>
		</tr>
	<?php $no++; endforeach ?>
		<?php else: ?>
		<tr>
			<td colspan='11' style='text-align:center;'><b>DATA MASIH KOSONG / TIDAK DITEMUKAN</b></td>
		</tr>
		<?php endif ?>
	</tbody>
</table>
</div>
<script type="text/javascript">
function simpan_tarif()
{
		$.ajax({
			type:'POST',
			url : '<?php echo base_url()."pengaturan/tarif/simpan" ?>',
			data:$('#tarif_form').serialize(),
			success:function(i)
			{
				alert(i);
				ajax_link('<?php echo current_url(); ?>');
			}
		});
	
}
function cari_tarif()
{
	ajax_sort('<?php echo base_url()."pengaturan/tarif/index?kode_tarif=" ?>'+$('#kode_tarif').val()+'&layanan='+$('#layanan').val()+'&dari='+$('#dari').val()+'&sampai='+$('#sampai').val());
}
function edit_tarif(id)
{

	var kd_tarif 	 = $('#kd_tarif_'+id).text();
	var kd_layanan   = $('#kd_layanan_'+id).text();
	var dari         = $('#dari_'+id).text();
	var sampai       = $('#sampai_'+id).text();
	var tarif_kg     = $('#tarif_kg_'+id).val();

	$('#id_tarif').val(id);
	$('#kode_tarif').val(kd_tarif);
	$('#dari').val(dari);
	$('#sampai').val(sampai);
	$('#tarif_kg').val(tarif_kg);
}
</script>