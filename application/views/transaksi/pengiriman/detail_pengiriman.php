<div style='float:left;'>
<h4>NO. RESI : <?php echo $info->no_resi ?></h4>

<table class='table table-striped'>
	<tr>
		<td colspan='3'>DATA PENGIRIM</td>
	</tr>
	<tr>
		<td width='150'>Kode Pengirim</td>
		<td width='5'>:</td>
		<td><?php echo $info->kd_pengirim ?></td>
	</tr>
	<tr>
		<td width='150'>Nama Pengirim</td>
		<td width='5'>:</td>
		<td><?php echo $info->nama_pengirim ?></td>
	</tr>
	<tr>
		<td width='150'>Alamat Pengirim</td>
		<td width='5'>:</td>
		<td><?php echo $info->alamat_pengirim ?></td>
	</tr>
	<tr>
		<td width='150'>Telp Pengirim</td>
		<td width='5'>:</td>
		<td><?php echo $info->telp_pengirim ?></td>
	</tr>
</table>
</div>
<div style='float:right;'>
<h4>STATUS : <?php echo strtoupper(str_replace('-', ' ', $info->status)) ?>&nbsp;<button type='button' 
class='btn btn-small btn-danger' onclick="cetak_nota_kirim('<?php echo $info->no_resi ?>')"><i class='icon-print icon-white'></i></button>
</h4>
<table class='table table-striped'>
	<tr>
		<td colspan='3'>DATA PENERIMA</td>
	</tr>
	<tr>
		<td width='150'>Kode Penerima</td>
		<td width='5'>:</td>
		<td><?php echo $info->kd_penerima ?></td>
	</tr>
	<tr>
		<td width='150'>Nama Penerima</td>
		<td width='5'>:</td>
		<td><?php echo $info->nama_penerima ?></td>
	</tr>
	<tr>
		<td width='150'>Alamat Penerima</td>
		<td width='5'>:</td>
		<td><?php echo $info->alamat_penerima ?></td>
	</tr>
	<tr>
		<td width='150'>Telp Penerima</td>
		<td width='5'>:</td>
		<td><?php echo $info->telp_penerima ?></td>
	</tr>
</table>
</div>
<div style='clear:both'></div>
<table class='table table-striped'>
	<tr>
		<td colspan='3'>DATA PENGIRIMAN</td>
	</tr>
	<tr>
		<td width='150'>Tgl Kirim</td>
		<td width='5'>:</td>
		<td><?php echo dd_mm_yyyy($info->tgl_kirim) ?></td>
	</tr>
	<tr>
		<td width='150'>Jam Kirim</td>
		<td width='5'>:</td>
		<td><?php echo $info->jam_kirim ?></td>
	</tr>
	<tr>
		<td width='150'>Cabang Pengirim</td>
		<td width='5'>:</td>
		<td><?php echo id_to_name('cabang','kd_cabang',$info->kd_cabang,'nm_cabang') ?></td>
	</tr>
	<tr>
		<td width='150'>Dari / Asal</td>
		<td width='5'>:</td>
		<td><?php echo $info->dari ?></td>
	</tr>
	<tr>
		<td width='150'>Sampai / Tujuan</td>
		<td width='5'>:</td>
		<td><?php echo $info->sampai ?></td>
	</tr>
	<tr>
		<td width='150'>Layanan</td>
		<td width='5'>:</td>
		<td><?php echo $info->layanan ?></td>
	</tr>
	<tr>
		<td width='150'>Harga /kg</td>
		<td width='5'>:</td>
		<td><?php echo uang_indo($info->harga_kg) ?></td>
	</tr>
	<tr>
		<td width='150'>Keterangan</td>
		<td width='5'>:</td>
		<td><?php echo $info->keterangan ?></td>
	</tr>
	<tr>
		<td width='150'>Tgl. Terima</td>
		<td width='5'>:</td>
		<td><?php echo ($info->tgl_terima == '0000-00-00'? 'BELUM DITERIMA' :dd_mm_yyyy($info->tgl_terima)) ?></td>
	</tr>
	<tr>
		<td width='150'>Jam Terima</td>
		<td width='5'>:</td>
		<td><?php echo ($info->jam_terima == '00:00:00' ? 'BELUM DITERIMA' : $info->jam_terima)?></td>
	</tr>
	<tr>
		<td width='150'>Cabang Penerima</td>
		<td width='5'>:</td>
		<td><?php echo ($info->jam_terima == '00:00:00' ? 'BELUM DITERIMA' : id_to_name('cabang','kd_cabang',$info->kd_cabang_tujuan,'nm_cabang'))?></td>
	</tr>
</table>
<h4>Item Pengiriman</h4>
<table class='table' style='width:100%;margin-top:10px;'>
    <thead >
       <tr style='background:#c21712; color:#eee;'>
         <th>Isi Barang</th>
         <th>Berat (kg)</th>
         <th>Harga / kg</th>
         <th>Subtotal</th>
         
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
            
        </tr>
        <?php @$jml_brt += $lay->berat; 
        	  @$total   += $lay->subtotal;  
        ?>
        <?php  $no++; endforeach ?>
        <tr>
        	<td>TOTAL BERAT</td>
        	<td><?php echo $jml_brt ?>&nbsp;Kg</td>
        	<td>TOTAL BIAYA</td>
        	<td><?php echo uang_indo($total) ?></td>
        	
        </tr>
        <?php else: ?>
        <tr>
            <td colspan='5' style='text-align:center;'>- DATA LIST BARANG MASIH KOSONG -</td>
        </tr>
        <?php endif ?>
    </tbody>
  </table>
  <script type="text/javascript">
  function cetak_nota_kirim(no_resi)
  {
  	window.open('<?php echo base_url()."transaksi/pengiriman/cetak_nota_pengiriman/" ?>'+no_resi);
  }
  </script>