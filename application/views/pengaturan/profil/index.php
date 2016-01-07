
<div style='width:30%; float:left; border-radius:2px; background:#0435b0; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4><?php echo $judul ?></h4>
<form method='post' id='profil_form'>
<table style='margin-top:10px;'>
	<tr>
		<td width='150'>Username</td>
		<td width='5'>:</td>
		<td><input type='hidden' name='id_user' value='<?php echo $profil->id_user ?>'>
			<?php echo form_input(array('name'=>'username','class'=>'input-large','value'=>$profil->username)); ?></td>
	</tr>
	<tr>
		<td width='150'>Password</td>
		<td width='5'>:</td>
		<td><?php echo form_password(array('name'=>'password','class'=>'input-large')); ?></td>
	</tr>
	<tr>
		<td width='150'>Konfirm Password</td>
		<td width='5'>:</td>
		<td><?php echo form_password(array('name'=>'k_password','class'=>'input-large')); ?></td>
	</tr>
	<tr>
		<td style='text-align:right;' colspan='3'><button type='button' onclick='update_profil()' class='btn btn-small btn-inverse'><i class='icon-ok icon-white'></i>&nbsp;update</button></td>
	</tr>
</table>
</form>
</div>
<div style='width:30%; float:left; border-radius:2px; background:#0435b0; margin-right:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Layanan</h4>
<form method='post' id='layanan_form'>
<table style='margin-top:10px;'>
	<tr>
		<td width='150'>Kode Layanan</td>
		<td width='5'>:</td>
		<td><input type='hidden' name='id_layanan' id='id_layanan'>
			<?php echo form_input(array('name'=>'kode_layanan','id'=>'kode_layanan','class'=>'input-small')); ?></td>
	</tr>
	<tr>
		<td width='150'>Nama Layanan</td>
		<td width='5'>:</td>
		<td><?php echo form_input(array('name'=>'nama_layanan','id'=>'nama_layanan','class'=>'input-large')); ?></td>
	</tr>
	<tr>
		<td style='vertical-align:top;' width='150'>Keterangan</td>
		<td style='vertical-align:top;' width='5'>:</td>
		<td><?php echo form_textarea(array('name'=>'keterangan','id'=>'keterangan','class'=>'input-large','style'=>'height:70px;')); ?></td>
	</tr>
	<tr>
		<td style='text-align:right;' colspan='3'><button type='button' onclick='simpan_layanan()' class='btn btn-small btn-inverse'><i class='icon-ok-circle icon-white'></i>&nbsp;simpan</button></td>
	</tr>
</table>
</form>
</div>
<div  style='width:30%; float:left; border-radius:2px; background:#0435b0;  color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Daftar Layanan</h4>
	<table class='table' style='width:100%;margin-top:10px;'>
              <thead >
                <tr style='background:#c21712;'>
                  <th>Kode</th>
                  <th>Nama Layanan</th>
                  <th>Keterangan</th>
                  <th style='text-align:center'>Aksi</th>
                </tr>
              </thead>
              <tbody style='color:#000; background:#eee;'>
              <?php if(!empty($layanan)): ?>
           	  <?php $no=1; foreach($layanan as $lay): ?>	
           	  	<tr id='tr_<?php echo $no?>'>
                  <td id='kd_layanan_<?php echo $lay->id_layanan?>'><?php echo $lay->kd_layanan ?></td>
                  <td id='nama_layanan_<?php echo $lay->id_layanan?>'><?php echo $lay->nama_layanan ?></td>
                  <td id='keterangan_<?php echo $lay->id_layanan?>'><?php echo $lay->keterangan ?></td>
                  <td style='text-align:center'><a href='javascript:void();' onclick='edit(<?php echo $lay->id_layanan ?>)'><i class='icon-edit'></i></a>&nbsp;
                  	  <a href="javascript:void();" onclick="hapus_conf('<?php echo base_url()."pengaturan/profil/hapus_layanan/"?>',<?php echo $lay->id_layanan ?>,'<?php echo $no ?>')"><i class="icon-remove-circle"></i></a>	
                  </td>
                 </tr>
              <?php $no++; endforeach ?>
          	  <?php else: ?>
          	  	<tr>
                  <td colspan='5' style='text-align:center;'>- DATA LAYANAN MASIH KOSONG -</td>
                </tr>
          	  <?php endif ?>
              </tbody>
            </table>
 </div>
<div style='width:35%; float:left; border-radius:2px; background:#0435b0; margin-right:10px; margin-top:10px; color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Kantor Cabang</h4>
<form method='post' id='cabang_form'>
<table style='margin-top:10px;'>
	<tr>
		<td width='150'>Kode Cabang</td>
		<td width='5'>:</td>
		<td><input type='hidden' name='id_cabang' id='id_cabang'>
			<?php echo form_input(array('name'=>'kode_cabang','id'=>'kode_cabang','class'=>'input-small')); ?></td>
	</tr>
	<tr>
		<td width='150'>Nama Cabang</td>
		<td width='5'>:</td>
		<td><?php echo form_input(array('name'=>'nama_cabang','id'=>'nama_cabang','class'=>'input-large')); ?></td>
	</tr>
	<tr>
		<td style='text-align:right;' colspan='3'><button type='button' onclick='simpan_cabang()' class='btn btn-small btn-inverse'><i class='icon-ok-circle icon-white'></i>&nbsp;simpan</button></td>
	</tr>
</table>
</form>
</div>
<div  style='width:25%; float:left; border-radius:2px; background:#0435b0;  margin-top:10px;color:#eee; padding:10px; box-shadow:0px 5px 10px #ccc;'>
<h4>Daftar Cabang</h4>
	<table class='table' style='width:100%;margin-top:10px;'>
              <thead >
                <tr style='background:#c21712;'>
                  <th>Kode</th>
                  <th>Nama Cabang</th>
                 
                  <th style='text-align:center'>Aksi</th>
                </tr>
              </thead>
              <tbody style='color:#000; background:#eee;'>
              <?php if(!empty($cabang)): ?>
           	  <?php $ni=1; foreach($cabang as $lay): ?>	
           	  	<tr id='tu_<?php echo $ni?>'>
                  <td id='kd_cabang_<?php echo $lay->id_cabang?>'><?php echo $lay->kd_cabang ?></td>
                  <td id='nama_cabang_<?php echo $lay->id_cabang?>'><?php echo $lay->nm_cabang ?></td>
                  <td style='text-align:center'><a href='javascript:void();' onclick='edit_cbg(<?php echo $lay->id_cabang ?>)'><i class='icon-edit'></i></a>&nbsp;
                  	  <a href="javascript:void();" onclick="hapus_conf2('<?php echo base_url()."pengaturan/profil/hapus_cabang/"?>',<?php echo $lay->id_cabang ?>,'<?php echo $ni ?>')"><i class="icon-remove-circle"></i></a>	
                  </td>
                 </tr>
              <?php $ni++; endforeach ?>
          	  <?php else: ?>
          	  	<tr>
                  <td colspan='5' style='text-align:center;'>- DATA CABANG MASIH KOSONG -</td>
                </tr>
          	  <?php endif ?>
              </tbody>
            </table>
 </div>

<script type='text/javascript'>
function update_profil()
{
	if(confirm('Anda yakin ingin mengubah setting?'))
	{
		$.ajax({
			type:'POST',
			url : '<?php echo base_url()."pengaturan/profil/update" ?>',
			data:$('#profil_form').serialize(),
			success:function(i)
			{
				alert(i);
				ajax_link('<?php echo current_url(); ?>');
			}
		});
	}
}
function simpan_layanan()
{
		$.ajax({
			type:'POST',
			url : '<?php echo base_url()."pengaturan/profil/simpan_layanan" ?>',
			data:$('#layanan_form').serialize(),
			success:function(i)
			{
				alert(i);
				ajax_link('<?php echo current_url(); ?>');
			}
		});
	
}
function simpan_cabang()
{
		$.ajax({
			type:'POST',
			url : '<?php echo base_url()."pengaturan/profil/simpan_cabang" ?>',
			data:$('#cabang_form').serialize(),
			success:function(i)
			{
				alert(i);
				ajax_link('<?php echo current_url(); ?>');
			}
		});
	
}
function edit(id)
{

	var kd_layanan 	 = $('#kd_layanan_'+id).text();
	var nama_layanan = $('#nama_layanan_'+id).text();
	var keterangan   = $('#keterangan_'+id).text();

	$('#id_layanan').val(id);
	$('#kode_layanan').val(kd_layanan);
	$('#nama_layanan').val(nama_layanan);
	$('#keterangan').val(keterangan);
}
function edit_cbg(id)
{

	var kd_cabang 	= $('#kd_cabang_'+id).text();
	var nama_cabang = $('#nama_cabang_'+id).text();
	
	$('#id_cabang').val(id);
	$('#kode_cabang').val(kd_cabang);
	$('#nama_cabang').val(nama_cabang);
}
</script>
