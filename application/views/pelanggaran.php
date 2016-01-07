<?php $this->load->view('template/header_front'); ?>
    <div class="span9" style='min-height:550px;'>
        <h4><?php echo $judul ?></h4>
          <hr>
          		<table class='table table-bordered table-striped'>
          			<thead bgcolor='#bbb'>
          				<tr>
          					<th style='text-align:center;' width='30'>No</th>
          					<th style='text-align:center;' width='150'>Tanggal Pelanggaran</th>
          					<th style='text-align:center;' width='100'>Klasifikasi</th>
          					<th style='text-align:center;' width='450'>Jenis Pelanggaran</th>
          					<th style='text-align:center;' width='70'>Poin</th>
          					<th style='text-align:center;'>Tindakan</th>
          				</tr>
          			</thead>
          			<tbody>
          			<?php $no=1; foreach($list as $key): ?>
          				<tr>
          					<td style='text-align:center;'><?php echo $no++ ?>.</td>
          					<td style='text-align:center;'><?php echo tgl_indo($key->tgl_pelanggaran) ?></td>
          					<td style='text-align:center;'><?php echo $key->klas ?></td>
          					<td><?php echo $key->jenis ?></td>
          					<td style='text-align:center;'><?php echo $key->poin ?></td>
          					<td><?php echo $key->tindakan ?></td>
          				</tr>
          				<?php @$tp += $key->poin;  ?>
          			<?php endforeach; ?>
          				<tr>
          					<td colspan='4' style='text-align:right;'><b>Total Poin</b></td>
          					<td style='text-align:center;'><b><?php echo  @$tp?></b></td>
          					<td></td>
          				</tr>
          			</tbody>
          		</table>
          		<h5>Sanksi Pelanggaran Tata Tertib</h5>

		    <p>Setiap ada pelanggaran terhadap tata tertib siswa akan diadakan pembinaan secara bertahap sesuai dengan jumlah point pelanggaran yang dilakukan dengan kriteria sebagai berikut :
			
			Melakukan pelanggaran dengan jumlah point :</p>
			<ol>
				    <li>5 – 20	:	diberi teguran dan pembinaan  oleh guru mata pelajaran/ wali kelas.</li>
					<li>21 – 40	:	mendapat pembinaan dari wali kelas dan membuat surat pernyataan yang diketahui wali kelas dan guru BK.</li>
					<li>41 – 60	:	pemanggilan orang tua/wali oleh wali kelas selanjutnya dipertemukan dengan guru BK.</li>
					<li>61 – 80	:	diserahkan kepada orang tua selama 1 hari dan dapat masuk kembali setelah mendapat izin dari madrasah.</li>
					<li>81 – 100	:	diskores/tidak boleh masuk sekolah selama 3 hari dan dapat masuk kembali setelah mendapat izin dari madrasah.</li>
					<li>101–120	:	diskores/tidak boleh masuk sekolah selama 5 hari dan dapat masuk kembali setelah mendapat izin dari madrasah dengan diantar oleh orang tua/wali dan diserahkan kepada madrasah.</li>.
					<li>121 – 150	:	dipersilakan mengajukan permohonan pindah sekolah atau mengundurkan diri dari madrasah.</li>
			</ol>
			<h5>Penjelasan</h5>
		Pasal 1.	:	Jumlah point pelanggaran yang terakumulasi berlaku pada setiap satu semester.<br>
		Pasal 2.	:	Hal-hal yang belum tercantum dalam tata tertib diatas, akan diatur kemudian.
        </div>
    </div>
<?php $this->load->view('template/footer_front'); ?>