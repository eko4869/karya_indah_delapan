<h4><?php echo $judul ?></h4>

<div style='float:left'>
	<button class='btn btn-small btn-primary' onclick="ajax_link('<?php echo base_url()."transaksi/pengiriman/tambah" ?>')"><i class='icon-plus icon-white'></i>&nbsp;Pengiriman Baru</button>
</div>
<div style='float:right;'>
	<b>Tgl Dari : </b><?php echo form_input(array('name'=>'tgl_dari','id'=>'tgl_dari','value'=>$tgl_dari,'class'=>'input-small datepicker')) ?><b>&nbsp;Tgl Sampai : </b><?php echo form_input(array('name'=>'tgl_sampai','value'=>$tgl_sampai,'id'=>'tgl_sampai','class'=>'input-small datepicker')) ?>&nbsp;<b> Kantor Cabang : </b> <?php echo form_dropdown('cabang',$dd_cabang,$cabang,'id="id_cabang" class="input-medium"') ?>
	  <button class='btn btn-danger btn-small' onclick='sort_pengiriman()' style='margin-bottom:5px;'><i class='icon-search icon-white'></i></button>	
</div>
<div style='clear:both;'></div>

<table class='table' style='width:100%;margin-top:10px;'>
    <thead >
       <tr style='background:#c21712; color:#eee;'>
         <th>No Resi</th>
         <th>Tgl Kirim</th>
         <th>Nama Pengirim</th>
         <th>Alamat Pengirim</th>
         <th>Nama Penerima</th>
         <th>Alamat Penerima</th>
         <th>Status</th>
         <th style='text-align:center'>Aksi</th>
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
	   	  <td><?php echo strtoupper(str_replace('-', ' ', $key->status)) ?></td>
	   	  <td style='text-align:center;'>
	   	  		<a href='javascript:void();' title='detail' onclick="detail('<?php echo $key->no_resi ?>')"><i class='icon-list-alt'></i></a>&nbsp;
	   	  		<a href="javascript:void();" title='edit' onclick="ajax_link('<?php echo base_url()."transaksi/pengiriman/edit/".$key->no_resi ?>')"><i class="icon-edit"></i></a>	
	   	  		<a href="javascript:void();" title='hapus' onclick="hapus_conf('<?php echo base_url()."transaksi/pengiriman/hapus/"?>','<?php echo $key->no_resi ?>','<?php echo $no ?>')"><i class="icon-remove-circle"></i></a>	
            
	   	  </td>	
	   	</tr>
	 <?php $no++; endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan='8' style='text-align:center;'>- DATA PENGIRIMAN MASIH KOSONG-</td>
		</tr>	
	<?php endif ?>
	</tbody>
</table>
<?php echo $paging ?>
<script type="text/javascript">
	function sort_pengiriman()
	{
		ajax_sort('<?php echo base_url()."transaksi/pengiriman/index?cabang=" ?>'+$('#id_cabang').val()+'&tgl_dari='+$('#tgl_dari').val()+'&tgl_sampai='+$('#tgl_sampai').val());
	}
	function detail(no_resi)
	{
		ajax_modal('<?php echo base_url()."transaksi/pengiriman/detail_pengiriman/" ?>'+no_resi,'width:1000px; margin-left:-450px;');
	}
</script>