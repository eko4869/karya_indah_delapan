<h4><?php echo $judul ?></h4>

<div style='width:98%; border-radius:2px; background:#0435b0; color:#fff; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<form method="POST" id='form_pelanggan'>
	<table>
		<tr>
			<td style='vertical-align:top;'>
				<table>
					<tr>
						<td width='150'><b>Kode Pelanggan</b></td>
						<td width='5'><b>:</b></td>
						<td>
							<input type='hidden' name='pelanggan_id' id='pelanggan_id' value="<?php echo (!empty($edt->id_pelanggan) ? $edt->id_pelanggan : '') ?>" >
							<?php echo form_input(array('name'=>'kode_pelanggan','id'=>'kd_pelanggan','value'=>(!empty($edt->kd_pelanggan) ? $edt->kd_pelanggan : ''),'class'=>'input-medium')) ?>
						</td>
					</tr>
					<tr>
						<td width='150'><b>Nama</b></td>
						<td width='5'><b>:</b></td>
						<td>
							<?php echo form_input(array('name'=>'nama','id'=>'nama','value'=>(!empty($edt->nama) ? $edt->nama : ''),'class'=>'input-xxlarge')) ?>
						</td>
					</tr>
					
				</table>
			</td>
			<td style='vertical-align:top;'>
				<table>
					<tr>
						<td style='vertical-align:top;' width='150'><b>Alamat</b></td>
						<td style='vertical-align:top;' width='5'><b>:</b></td>
						<td style='vertical-align:top;'>
							<?php echo form_textarea(array('name'=>'alamat','id'=>'alamat','value'=>(!empty($edt->alamat) ? $edt->alamat : ''),'class'=>'input-xxlarge','style'=>'height:100px;')) ?>
						</td>
					</tr>
					<tr>
						<td width='150'><b>Nomor Telepon</b></td>
						<td width='5'><b>:</b></td>
						<td>
							<?php echo form_input(array('name'=>'no_telp','id'=>'no_telp','value'=>(!empty($edt->no_telp) ? $edt->no_telp : ''),'class'=>'input-large')) ?>
						</td>
					</tr>
					<tr>
						<td align='right' colspan='3'><button onclick='simpan()' type='button' class='btn btn-inverse btn-mini'><i class='icon-ok icon-white'></i>&nbsp;Simpan</button></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
</form>
</div>
<div style='clear:both;'></div>
<div style='width:98%; margin-top:10px; border-radius:2px; background:#0435b0; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<?php echo $paging ?>

<div style='float:right;'>
	<?php echo form_input(array('name'=>'cari_pelanggan','id'=>'cari_pelanggan','onkeypress'=>'cari_pelanggan_console(event.which)','value'=>$cari_pelanggan,'class'=>'input-xlarge','placeholder'=>'ketik kode pelanggan/nama pelanggan')) ?>
	<button type='button' onclick="cari_pelanggan()" class='btn btn-inverse btn-small'  style='margin-bottom:5px;'><i class='icon-search icon-white'></i></button>
</div>
<div style='clear:both;'></div>
<table  width='100%' class='table table-striped'>
	<thead>
		<tr style='background:#c21712;'>
			<th style='text-align:center; width:20px;'>No</th>
			<th style='text-align:left;' width='100'>Kode Pelanggan</th>
			<th style='text-align:left;' width='200'>Nama</th>
			<th style='text-align:left;' width='200'>Alamat</th>
			<th style='text-align:left;' width='100'>No. Telepon</th>
			<th style='text-align:center;' width='70'>Aksi</th>
		</tr>
	</thead>
	<tbody style='color:#000; background:#eee;'>
	<?php if(!empty($list)) :?>
	<?php $no=1+$this->uri->segment(4); foreach($list as $key): ?>
		<tr id='tr_<?php echo $no?>' bgcolor='#eee'>
			<td style='text-align:center;'><?php echo $no ?>.</td>
			<td style='text-align:center;'><?php echo $key->kd_pelanggan?></td>
			<td style='text-align:left;'><?php echo $key->nama ?></td>
			<td style='text-align:left;'><?php echo $key->alamat ?></td>
			<td style='text-align:left;'><?php echo $key->no_telp ?></td>
			<td style='text-align:center;'>
				<a href="javascript:void();" onclick= "ajax_sort('<?php echo base_url()."master/pelanggan/index?edit=".$key->id_pelanggan;?>')"><i class="icon-pencil"></i></a>&nbsp;
				<a href="javascript:void();" onclick= "hapus_conf('<?php echo base_url()."master/pelanggan/hapus/"?>',<?php echo $key->id_pelanggan?>,<?php echo $no ?>)" ><i class="icon-trash"></i></a>
			</td>
		</tr>
	<?php $no++; endforeach ?>
		<?php else: ?>
		<tr>
			<td colspan='11' style='text-align:center;'><b>DATA MASIH KOSONG</b></td>
		</tr>
		<?php endif ?>
	</tbody>
</table>
<script type='text/javascript'>
	function simpan()
	{
		if(confirm('Anda yakin?'))
		{
			var dtx    = $('#form_pelanggan').serialize();
			var urel   = '<?php echo base_url()."master/pelanggan/simpan" ?>';
			
			$.ajax({
				type:'POST',
				data:dtx,
				url :urel,
				success:function(i){
					if(i=='Data Tersimpan' || i== 'Data Terupdate')
					{
						alert(i);
						ajax_sort('<?php echo current_url(); ?>');
					}
					else
					{
						alert(i);
					}
				}
			});	
		}
	} 
	function cari_pelanggan()
	{
		ajax_sort('<?php echo base_url()."master/pelanggan/index?cari_pelanggan=" ?>'+$('#cari_pelanggan').val());
	}
	function cari_pelanggan_console(e)
	{

		if(e == '13')
		{
			ajax_sort('<?php echo base_url()."master/pelanggan/index?cari_pelanggan=" ?>'+$('#cari_pelanggan').val());	
		}
	}
</script>
