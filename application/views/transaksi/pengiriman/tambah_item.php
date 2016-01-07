<h4><?php echo $judul ?></h4>
<form method='POST' id='item_form'>
<table>
	<tr>
		<td width='150'>Isi Barang</td>
		<td width='5'>:</td>
		<td>
			<input type='hidden' id='no_resi_item' value='<?php echo $no_resi ?>' name='no_resi_item'>
			<?php echo form_input(array('name'=>'isi_barang','id'=>'isi_barang','class'=>'input-xlarge')) ?></td>
	</tr>
	<tr>
		<td width='150'>Berat</td>
		<td width='5'>:</td>
		<td><?php echo form_input(array('name'=>'berat','id'=>'berat','onkeyup'=>'hit()','class'=>'input-mini')) ?>&nbsp;Kg&nbsp;*) pemisah desimal pakai titik(.)</td>
	</tr>
	<tr>
		<td width='150'>Harga / kg</td>
		<td width='5'>:</td>
		<td><?php echo form_input(array('name'=>'harga_kg','value'=>$hrg,'onkeyup'=>'hit()','id'=>'harga_kg','class'=>'input-large')) ?>&nbsp;Rupiah</td>
	</tr>
	<tr>
		<td width='150'>Subtotal</td>
		<td width='5'>:</td>
		<td><?php echo form_input(array('name'=>'subtotal','id'=>'subtotal','class'=>'input-large')) ?>&nbsp;Rupiah</td>
	</tr>
	<tr>
		<td colspan="3" style='text-align:right;'><button type='button' class='btn btn-primary btn-small' onclick="simpan_item();"><i class='icon-ok-circle icon-white'></i>&nbsp;Simpan</button></td>
	</tr>
</table>
</form>
<script type="text/javascript">
	function hit()
	{
		var berat = eval($('#berat').val());
		var harga = eval($('#harga_kg').val());

		var subtotal = berat * harga;
		$('#subtotal').val(subtotal).blur();
	}
	function simpan_item()
	{
		$.ajax({
			type:'POST',
			url :'<?php echo base_url()."transaksi/pengiriman/simpan_item" ?>',
			data:$('#item_form').serialize(),
			success:function(i)
			{
				if(i == 'ok')
				{
					ajax_sort('<?php echo base_url()."transaksi/pengiriman/list_pengiriman" ?>','items');
					$('#isi_barang').val('');
					$('#berat').val('');
					$('#subtotal').val('');
					$('#isi_barang').focus();
				}
				else
				{
					alert(i);
				}
				
			}
		});
	}
</script>