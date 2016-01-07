<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CV. Karya Indah 8 Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href='<?php echo base_url().'assets/image/logo.png';?>'/>
    
    <!-- Le styles -->
    <link href='<?php echo base_url()."assets/css/bootstrap.css" ?>' rel="stylesheet">
    
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href='<?php echo base_url()."assets/css/bootstrap-responsive.css" ?>' rel="stylesheet">

  </head>

  <body style='background:#eee;'>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner" >
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href='<?php echo base_url()."front" ?>'>CV. Karya Indah 8 Express</a>
          <div class="nav-collapse collapse">
            
            <!-- <form method='post' action='<?php echo base_url()."login_front/user_login" ?>' class="navbar-form pull-right">
              <input class="span2" type="text" name="username" placeholder="Username">
              <input class="span2" type="password" name="password" placeholder="Password">
              <button type="submit" class="btn btn-small btn-danger" style='background:#c21712;'><i class='icon-user icon-white'></i>&nbsp;Sign in</button>
            </form> -->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit" style='background:#0435b0; color:#eee;'>
       
     
            <div style='float:left;'><img src='<?php echo base_url().'assets/image/cs.png';?>' width='100' height='100'></div>
            <div style='float:left;'> <h2>Tracking online pengiriman barang</h2>
            Cek status pengiriman barang anda hanya dengan memasukkan no.resi.</div>
            <div style='clear:both;'></div>
           
      </div>

      <!-- Example row of columns -->
      <div class="row" >
        <div class="span4" style='text-align:center; background:#0435b0; color:#eee; border-radius:5px;'>
          <h3><center>Tracking</center></h3>
          <center><img src='<?php echo base_url().'assets/image/keker.png';?>' width='128' height='128'></center><br>
          Silahkan masukkan nomor resi anda:
          <p>
            <?php echo form_textarea(array('name'=>'resi','id'=>'resi','style'=>'height:40px;','value'=>$resi)) ?><br>
            <button type='button' onclick="no_resi()" style='background:#c21712;' class='btn btn-small btn-danger'><i class='icon-ok-sign icon-white'></i>&nbsp;Submit</button>
          </p>
          
        </div>
        
        <div class="span8" style=' background:#0435b0; color:#eee; border-radius:5px;'>
          <h3><center>Status Pengiriman</center></h3>
         <center>
         <?php if(!empty($resi)): ?>
            <table class='table' style='width:95%;'>
              <thead >
                <tr style='background:#c21712;'>
                  <th colspan='2'>Isi Barang</th>
                  <th>Berat</th>
                  <th>Harga / Kg</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody style='color:#000;'>
              <?php if(!empty($list)): ?>
              <?php foreach($list as $key): ?>
                <tr style='background:#eee;'>
                  <td colspan='2'><?php echo $key->isi_barang ?></td>
                  <td><?php echo $key->berat ?>&nbsp;Kg</td>
                  <td><?php echo uang_indo($key->harga_kg) ?></td>
                  <td><?php echo uang_indo($key->subtotal) ?></td>
                </tr>
              <?php @$ttl_brt += $key->berat;
                    @$ttl_hrg += $key->subtotal;
               ?>
              <?php endforeach; ?>
                <tr style='background:#eee;'>
                  <td colspan='2' align='right;'>TOTAL BERAT</td>
                  <td><?php echo $ttl_brt; ?>&nbsp;Kg</td>
                  <td align='right'>TOTAL BIAYA</td>
                  <td><?php echo uang_indo($ttl_hrg) ?></td>
                </tr>
                <tr style='background:#c21712;color:#eee;'>
                    <td>NO. RESI</td>
                    <td>TGL. KIRIM</td>
                    <td colspan='2'>KETERANGAN</td>
                    <td>STATUS</td>
                </tr>
                 <tr style='background:#eee;'>
                    <td><?php echo $info->no_resi ?></td>
                    <td><?php echo dd_mm_yyyy($info->tgl_kirim) ?></td>
                    <td colspan='2'><?php echo $info->keterangan ?></td>
                    <td><?php echo strtoupper($info->status) ?></td>
                </tr>
                <tr style='background:#c21712;color:#eee;'>
                    <td>JAM KIRIM</td>
                    <td>CABANG PENGIRIM</td>
                    <td>TGL. TERIMA</td>
                    <td>JAM TERIMA</td>
                    <td>CABANG PENERIMA</td>
                </tr>
                 <tr style='background:#eee;'>
                    <td><?php echo $info->jam_kirim ?></td>
                    <td><?php echo id_to_name('cabang','kd_cabang',$info->kd_cabang,'nm_cabang')?></td>
                    <td><?php echo ($info->tgl_terima == '0000-00-00'? 'BELUM DITERIMA' :dd_mm_yyyy($info->tgl_terima)) ?></td>
                    <td><?php echo ($info->jam_terima == '00:00:00' ? 'BELUM DITERIMA' : $info->jam_terima)?></td>
                    <td><?php echo ($info->jam_terima == '00:00:00' ? 'BELUM DITERIMA' : id_to_name('cabang','kd_cabang',$info->kd_cabang_tujuan,'nm_cabang'))?></td>
                  
                </tr>
                <tr style='background:#c21712;color:#eee;'>
                    <td>NAMA PENGIRIM</td>
                    <td colspan='3'>ALAMAT PENGIRIM</td>
                    <td>TELP. PENGIRIM</td>
                </tr>
                 <tr style='background:#eee;'>
                    <td><?php echo $info->nama_pengirim ?></td>
                    <td colspan='3'><?php echo $info->alamat_pengirim ?></td>
                    <td><?php echo $info->telp_pengirim ?></td>
                </tr>
                <tr style='background:#c21712;color:#eee;'>
                    <td>NAMA PENERIMA</td>
                    <td colspan='3'>ALAMAT PENERIMA</td>
                    <td>TELP. PENERIMA</td>
                </tr>
                 <tr style='background:#eee;'>
                    <td><?php echo $info->nama_penerima ?></td>
                    <td colspan='3'><?php echo $info->alamat_penerima ?></td>
                    <td><?php echo $info->telp_penerima ?></td>
                </tr>
                <tr style='background:#c21712;color:#eee;'>
                    <td>LAYANAN</td>
                    <td>HARGA / KG</td>
                    <td>DARI / ASAL</td>
                    <td>SAMPAI / TUJUAN</td>
                    <td></td>
                </tr>
                 <tr style='background:#eee;'>
                    <td><?php echo $info->layanan ?></td>
                    <td><?php echo uang_indo($info->harga_kg) ?></td>
                    <td><?php echo $info->dari ?></td>
                    <td><?php echo $info->sampai ?></td>
                    <td></td>
                </tr>

              <?php else: ?>
                <tr>
                  <td colspan='5' style='text-align:center; background:#eee;'>- MASUKKAN NO. RESI TAK DITEMUKAN -</td>
                </tr>
              <?php endif ?>
              </tbody>
            </table>
        </center>
        <?php else: ?>
           <tr>
              <td colspan='5' style='text-align:center;'><i> MASUKKAN NO. RESI ANDA DAHULU</i></td>
           </tr>
        <?php endif ?>
       </div>
      </div>
      <div class="row" style='margin-top:10px;'>
        <div class="span4" style='text-align:center; background:#0435b0; color:#eee; border-radius:5px;'>
          <h3><center>Cek Tarif Pengiriman</center></h3>
          Dari:
          <p>
            <input type="text" name="dari" value="<?php echo $get_dari ?>" id="dari" data-provide="typeahead" data-items="4" data-source=<?php echo $dari ?>  />
            <br>
          </p>
         
          Tujuan:
          <p>
            <input type="text" name="dari" value="<?php echo $get_sampai ?>" id="sampai" data-provide="typeahead" data-items="4" data-source=<?php echo $sampai ?>  />
            <br>
          </p>
          Berat (Kg):
          <p>
            <?php echo form_input(array('name'=>'berat','id'=>'berat','value'=>$berat)) ?><br>
            <button type='button' onclick="cari_tarif()" style='background:#c21712;' class='btn btn-small btn-danger'><i class='icon-search icon-white'></i>&nbsp;Lihat Tarif</button>
          </p>
          
        </div>
        <div class="span8" style='text-align:center; background:#0435b0; color:#eee; border-radius:5px;'>
          <h3><center>Tarif Pengiriman</center></h3>
        <?php if(!empty($get_dari) && !empty($get_sampai)&& !empty($berat)): ?>
          <?php echo strtoupper($get_dari).' - '.strtoupper($get_sampai) ?>
         <center>
            <table class='table' style='width:95%;margin-top:10px;'>
              <thead >
                <tr style='background:#c21712;'>
                  <th>Kode Layanan</th>
                  <th>Nama Layanan</th>
                  <th>Keterangan</th>
                  <th>Berat (Kg)</th>
                  <th>Tarif/kg</th>
                  <th>Total Tarif</th>
                </tr>
              </thead>
              <tbody style='color:#000;'>
              <?php if(!empty($tarif)): ?>
              <?php foreach($tarif as $tar): ?>
                <tr style='background:#eee;'>
                  <td><?php echo $tar->kd_layanan ?></td>
                  <td><?php echo $tar->nama_layanan ?></td>
                  <td><?php echo $tar->keterangan ?></td>
                  <td align='center'><?php echo $berat ?></td>
                  <td><?php echo uang_indo($tar->tarif_kg) ?></td>
                  <td align='right'><?php echo uang_indo($berat * $tar->tarif_kg)?></td>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
                <tr style='background:#eee;'>
                  <td colspan='6' style='text-align:center;'>- DATA TARIF TAK DITEMUKAN-</td>
                </tr>
              <?php endif ?>
              </tbody>
            </table>
        </center>
        <?php else: ?>
          <tr>
              <td colspan='5' style='text-align:center;'><i> MASUKKAN INFO TARIF YANG ANDA INGINKAN</i></td>
           </tr>
        <?php endif ?>
       </div>
      </div>
      <hr>
      <footer>
        <p>Copyright&copy; 2015 - CV. Karya Indah 8 Express</p>
      </footer>

    </div> <!-- /container -->
    <script type="text/javascript">
    function no_resi()
    {
      location.href='<?php echo base_url()."front/index?resi=" ?>'+$('#resi').val();
    }
    function cari_tarif()
    {
      location.href='<?php echo base_url()."front/index?get_dari=" ?>'+$('#dari').val()+'&get_sampai='+$('#sampai').val()+'&berat='+$('#berat').val();
    }
    </script>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src='<?php echo base_url().'assets/js/jquery.js';?>'></script>
    <script type="text/javascript" src='<?php echo base_url().'assets/js/bootstrap-typeahead.js';?>'></script>
    <script type="text/javascript" src='<?php echo base_url().'assets/js/all.js';?>'></script>
  </body>
</html>
