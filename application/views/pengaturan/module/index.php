<h4><?php echo $judul ?></h4>

<table>
<tr>
	<td><a href="javascript:void();" onclick="ajax_link('<?php echo base_url()."pengaturan/module/tambah";?>')" class='btn btn-primary btn-small btn-small'>
		<i class="icon-plus icon-white"></i>Tambah</a>
	</td>
</tr>
</table>
	
<br>
<br>
	<?php if($this->session->flashdata('sukses') !=''): ?>
    <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('sukses') ?>
    </div>
	<?php endif ?>
<table class="table table-striped table-bordered" style="font-size:14px;width:80%;">
<thead bgcolor="#bbb">
<tr>
	<th style='text-align:center' width="5">No</th>
	<th width="150">Nama Module</th>
	<th width="70">Icon Module</th>
	<th width="100">URL Module</th>
	<th width="50">Parent</th>
	<th width="3">Order</th>
	<th style='text-align:center' width="10">Aksi</th>
</tr>
</thead>
	<?php $no=1; foreach($data_list as $list):?>
<tbody>
<tr id='tr_<?php echo $no?>'>
	<td style='text-align:center'><?php echo $no;?>.</td>
	<td><?php echo $list->nama_module;?></td>
	<td><?php echo $list->icon_module;?></td>
	<td><span class="label label-primary"><?php echo $list->url_module;?></span></td>
	<td><?php echo ($list->parent==NULL ? 'top' : $list->parent );?> </td>
	<td><?php echo $list->order;?></td>
	<td style='text-align:center'>
		<a href="javascript:void();" onclick="ajax_link('<?php echo base_url()."pengaturan/module/edit/".$list->id_module;?>')"><i class="icon-pencil"></i></a>&nbsp;
		<a href="javascript:void();" onclick="hapus_conf('<?php echo base_url()."pengaturan/module/hapus/"?>',<?php echo $list->id_module ?>,'<?php echo $no ?>')"><i class="icon-trash"></i></a>
	</td>
</tr>
</tbody>
	<?php $no++; endforeach;?>
</table>
<script type='text/javascript'>
$(function(){
	$(".alert").fadeOut(3000);
});
</script>
