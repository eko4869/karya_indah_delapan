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
            <td colspan='5' style='text-align:center;'>- DATA LAYANAN MASIH KOSONG -</td>
        </tr>
        <?php endif ?>
    </tbody>
  </table>
