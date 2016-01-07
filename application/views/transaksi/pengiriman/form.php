<h4><?php echo $judul ?></h4>

<div style='float:left'>
	<button class='btn btn-small btn-primary' onclick="ajax_link('<?php echo base_url()."transaksi/pengiriman" ?>')"><i class='icon-chevron-left icon-white'></i>&nbsp;Kembali</button>
</div>
<div style='float:right;margin-right:5%;'>
	<b>No. Resi : </b><input type='text' name='no_resi' id="no_resi" readonly='readonly' value='<?php echo $no_resi ?>' class='input-medium' >
</div>
<div style='clear:both;'></div>
<form id='main_form' method='post'>
<div style='width:46%; float:left; border-radius:2px; background:#0435b0; margin-top:10px; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<b>Kantor Cabang : </b><?php echo form_dropdown('cabang',$dd_cabang,'','class="input-medium" id="cabang"'); ?>
<h4>Data Pengirim</h4>
	<table style='margin-top:10px; margin-right:30px;'>
		<tr>
			<td width='150'>Kode Pengirim</td>
			<td width='5'>:</td>
			<td><input type='hidden' name='mode' id='mode' value='<?php echo (!empty($dta) ? 'edit' : 'tambah') ?>'>
				<input type='hidden' name='no_resi_hidden' id="no_resi_hidden" value='<?php echo $no_resi ?>'  >
				<?php echo form_input(array('name'=>'kode_pengirim','value'=>(!empty($dta) ? $dta->kd_pengirim : ''),'onkeypress'=>'get_pengirim(event.which)','class'=>'input-medium','id'=>'kode_pengirim')) ?></td>
		</tr>
		<tr>
			<td width='150'>Nama Pengirim</td>
			<td width='5'>:</td>
			<td><?php echo form_input(array('name'=>'nama_pengirim','value'=>(!empty($dta) ? $dta->nama_pengirim : ''),'class'=>'input-xlarge','id'=>'nama_pengirim')) ?></td>
		</tr>
		<tr>
			<td style='vertical-align:top;' width='150'>Alamat Pengirim</td>
			<td style='vertical-align:top;' width='5'>:</td>
			<td><?php echo form_textarea(array('name'=>'alamat_pengirim','style'=>'height:60px;','value'=>(!empty($dta) ? $dta->alamat_pengirim : ''),'class'=>'input-xlarge','id'=>'alamat_pengirim')) ?></td>
		</tr>
		<tr>
			<td width='150'>No. Telp. Pengirim</td>
			<td width='5'>:</td>
			<td><?php echo form_input(array('name'=>'telp_pengirim','class'=>'input-large','id'=>'telp_pengirim','value'=>(!empty($dta) ? $dta->telp_pengirim : ''))) ?></td>
		</tr>
	</table>	
</div>
<div style='width:46%; float:left; border-radius:2px; background:#0435b0; margin-top:10px; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Data Penerima</h4>
	<table style='margin-top:10px; margin-right:30px;'>
		<tr>
			<td width='150'>Kode Penerima</td>
			<td width='5'>:</td>
			<td><?php echo form_input(array('name'=>'kode_penerima','class'=>'input-medium','id'=>'kode_penerima','value'=>(!empty($dta) ? $dta->kd_penerima : ''),'onkeypress'=>'get_penerima(event.which)')) ?></td>
		</tr>
		<tr>
			<td width='150'>Nama Penerima</td>
			<td width='5'>:</td>
			<td><?php echo form_input(array('name'=>'nama_penerima','class'=>'input-xlarge','id'=>'nama_penerima','value'=>(!empty($dta) ? $dta->nama_penerima : ''))) ?></td>
		</tr>
		<tr>
			<td style='vertical-align:top;' width='150'>Alamat Penerima</td>
			<td style='vertical-align:top;' width='5'>:</td>
			<td><?php echo form_textarea(array('name'=>'alamat_penerima','style'=>'height:95px;','class'=>'input-xlarge','id'=>'alamat_penerima','value'=>(!empty($dta) ? $dta->alamat_penerima : ''))) ?></td>
		</tr>
		<tr>
			<td width='150'>No. Telp. Penerima</td>
			<td width='5'>:</td>
			<td><?php echo form_input(array('name'=>'telp_penerima','value'=>(!empty($dta) ? $dta->telp_penerima : ''),'class'=>'input-large','id'=>'telp_penerima')) ?></td>
		</tr>
	</table>	

</div>
<div style='width:94.1%; float:left; border-radius:2px; background:#0435b0; margin-top:10px; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Data Pengiriman</h4>
<table>
	<tr>
		<td style='vertical-align:top;'>
			<table style='margin-top:10px; margin-right:30px;'>
				<tr>
					<td width='150'>Dari / Asal</td>
					<td width='5'>:</td>
					<td><input type="text" name="dari" value="<?php echo (!empty($dta) ? $dta->dari : '') ?>" class="input-xlarge" id="dari" data-provide="typeahead" data-items="4" data-source=<?php echo $dari ?>  /></td>
				</tr>
				<tr>
					<td width='150'>Tujuan</td>
					<td width='5'>:</td>
					<td><input type="text" name="sampai" value="<?php echo (!empty($dta) ? $dta->sampai : '') ?>" class="input-xlarge" id="sampai" data-provide="typeahead" data-items="4" data-source=<?php echo $sampai ?>  /></td>
				</tr>
				<tr>
					<td style='vertical-align:top;' width='150'>Layanan</td>
					<td style='vertical-align:top;' width='5'>:</td>
					<td><?php echo form_dropdown('layanan',$dd_layanan,(!empty($dta) ? $dta->layanan : ''),'id="layanan" class="input-medium" onchange="get_layanan()"') ?></td>
				</tr>
				
			</table>
		</td>
		<td style='vertical-align:top;'>
		<table style='margin-top:10px; margin-right:30px;'>
			<tr>
				<td width='150'>Tarif / kg</td>
				<td width='5'>:</td>
				<td><?php echo form_input(array('name'=>'tarif_kg','value'=>(!empty($dta) ? $dta->harga_kg : ''),'class'=>'input-large','id'=>'tarif_kg')) ?></td>
			</tr>
			<tr>
				<td width='150'>Tanggal Kirim</td>
				<td width='5'>:</td>
				<td><?php echo form_input(array('name'=>'tgl_kirim','value'=>(!empty($dta) ? $dta->tgl_kirim : ''),'class'=>'input-small datepicker','id'=>'tgl_kirim','value'=>date('d-m-Y'))) ?></td>
			</tr>
			<tr>
				<td style='vertical-align:top;' width='150'>Keterangan</td>
				<td style='vertical-align:top;' width='5'>:</td>
				<td><?php echo form_textarea(array('name'=>'keterangan','value'=>(!empty($dta) ? $dta->keterangan : ''),'class'=>'input-xlarge','id'=>'keterangan','style'=>'height:60px;')) ?></td>
			</tr>
		</td>
	    </table>
	    <td style='vertical-align:top;'>
		<table style='margin-top:10px; margin-right:30px;'>
			<tr>
				<td width='150'>Kantor Cabang Tujuan</td>
				<td width='5'>:</td>
				<td><?php echo form_dropdown('cabang_tujuan',$dd_cabang_tujuan,(!empty($dta) ? $dta->kd_cabang_tujuan : ''),'class="input-medium" id="cabang_tujuan"'); ?></td>
			</tr>
		</td>
	    </table>
	</tr>
</table>
</div>
</form>
<div style='float:left; margin-top:10px;'>
	<button class='btn btn-small btn-primary' id="plus" onclick="tambah_item()"><i class='icon-plus icon-white'></i>&nbsp;Tambah item pengiriman</button>
</div>
<div style='float:right;margin-right:5%; margin-top:10px;'>
	<button class='btn btn-small btn-danger' type='button' id="simpan_pengiriman" onclick="simpan_pengiriman()"><i class='icon-ok-circle icon-white'></i>&nbsp;Simpan pengiriman</button>
</div>
<div style='clear:both;'></div>
<div id='items' style='width:94%; float:left; border-radius:2px; background:#0435b0; margin-top:10px; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Item Pengiriman</h4>
<table class='table' style='width:100%;margin-top:10px;'>
    <thead >
       <tr style='background:#c21712;'>
         <th>Isi Barang</th>
         <th>Berat (kg)</th>
         <th>Harga / kg</th>
         <th>Subtotal</th>
         <th style='text-align:center'>Aksi</th>
       </tr>
    </thead>
    <tbody style='color:#000; background:#eee;'>
       <?php if(!empty($list)): ?>
       <?php $no=1; foreach($list as $lay): ?>	
         <tr id='tr_<?php echo $no?>'>
            <td ><?php echo $lay->isi_barang ?></td>
            <td ><?php echo $lay->berat ?></td>
            <td ><?php echo uang_indo($lay->harga_kg) ?></td>
            <td ><?php echo uang_indo($lay->subtotal) ?></td>
            <td style='text-align:center'><a href="javascript:void();" onclick="hapus_conf('<?php echo base_url()."transaksi/pengiriman/hapus_item/"?>',<?php echo $lay->id_list ?>,'<?php echo $no ?>')"><i class="icon-remove-circle"></i></a>	
            </td>
        </tr>
        <?php @$jml_brt += $lay->berat; 
        	  @$total   += $lay->subtotal;  
        ?>
        <?php  $no++; endforeach ?>
        <tr>
        	<td>TOTAL BERAT</td>
        	<td><?php echo $jml_brt ?></td>
        	<td>TOTAL BIAYA</td>
        	<td><?php echo uang_indo($total) ?></td>
        	<td></td>
        </tr>
        <?php else: ?>
        <tr>
            <td colspan='5' style='text-align:center;'>- DATA LIST BARANG MASIH KOSONG -</td>
        </tr>
        <?php endif ?>
    </tbody>
  </table>
</div>
<div style='clear:both;'>
<script type="text/javascript">
	function simpan_pengiriman()
	{
		if(confirm('Anda yakin telah selesai?'))
		{
				$.ajax({
				type:'POST',
				url :'<?php echo base_url()."transaksi/pengiriman/simpan_pengiriman/" ?>',
				data:$('#main_form').serialize(),
				success:function(i)
				{
					if(i == 'Data Tersimpan' || 'Data Terupdate')
					{
						if(confirm(i+' Cetak nota pengiriman?'))
						{
							location.href='<?php echo base_url()."transaksi/pengiriman/cetak_nota_pengiriman/" ?>'+$('#no_resi').val();
						}
						else
						{
							ajax_link('<?php echo base_url()."transaksi/pengiriman/" ?>');
						}
					}
				}
			});	
		}
	}
    function tambah_item()
    {
    	ajax_modal('<?php echo base_url()."transaksi/pengiriman/tambah_item?tarif_kg=" ?>'+$('#tarif_kg').val()+'&no_resi='+$('#no_resi').val());
    }
	function get_layanan()
	{
		$.ajax({
			type:'POST',
			url :'<?php echo base_url()."transaksi/pengiriman/get_layanan/" ?>'+$('#dari').val()+'/'+$('#sampai').val()+'/'+$('#layanan').val(),
			data:null,
			success:function(i)
			{
				$('#tarif_kg').val(i);
				$('#plus').focus();
			}
		});
	}
	function get_pengirim(e)
	{
		var kode = $('#kode_pengirim').val();

		if(e == '13')
		{
			$.ajax({
			type:'POST',
			url :'<?php echo base_url()."transaksi/pengiriman/get_pengirim/" ?>'+kode,
			data:null,
			success:function(i)
			{
				var pch = i.split('|');

				$('#nama_pengirim').val(pch[0]);
				$('#alamat_pengirim').val(pch[1]);
				$('#telp_pengirim').val(pch[2]);
				$('#kode_penerima').focus();

			}
			});
		}
	}
	function get_penerima(e)
	{
		var kode = $('#kode_penerima').val();

		if(e == '13')
		{
			$.ajax({
			type:'POST',
			url :'<?php echo base_url()."transaksi/pengiriman/get_pengirim/" ?>'+kode,
			data:null,
			success:function(i)
			{
				var pch = i.split('|');

				$('#nama_penerima').val(pch[0]);
				$('#alamat_penerima').val(pch[1]);
				$('#telp_penerima').val(pch[2]);
				$('#dari').focus();

			}
			});
		}
	}
</script>

