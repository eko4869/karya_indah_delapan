<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Penerimaan</title>
</head>
<body>
<div style='padding:10x; font-size:11px;'>
<h4>Laporan Penerimaan Periode <?php echo $tgl_dari .' - '.$tgl_sampai ?></h4>
	<table border='1' style='width:100%; border-collapse:collapse; margin-top:10px;font-size:11px;'>
    <thead >
       <tr style='background:#c21712; color:#eee;'>
         <th>No Resi</th>
         <th>Tgl Kirim</th>
         <th>Nama Pengirim</th>
         <th>Alamat Pengirim</th>
         <th>Nama Penerima</th>
         <th>Alamat Penerima</th>
         <th>Cabang Pengirim</th>
         <th>Status</th>
        
       </tr>
    </thead>
	<tbody style='color:#000; background:#eee;'>
	<?php if(!empty($list)): ?>
	<?php $no=1; foreach($list as $key): ?>
	   <tr id='tr_<?php echo $no?>'>
	   	  <td><?php echo $key->no_resi ?></td>	
	   	  <td><?php echo dd_mm_yyyy($key->tgl_kirim)?></td>	
	   	  <td><?php echo $key->nama_pengirim ?></td>	
	   	  <td><?php echo $key->alamat_pengirim ?></td>	
	   	  <td><?php echo $key->nama_penerima ?></td>	
	   	  <td><?php echo $key->alamat_penerima ?></td>	
	   	  <td><?php echo $key->kd_cabang ?></td>	
	   	  <td><?php echo strtoupper(str_replace('-', ' ', $key->status)) ?></td>
	   	  
	   	</tr>
	 <?php $no++; endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan='8' style='text-align:center;'>- DATA PENERIMAAN MASIH KOSONG-</td>
		</tr>	
	<?php endif ?>
	</tbody>
</table>
</div>
</body>
</html>