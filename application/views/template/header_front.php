<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard Orang Tua / Wali Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href='<?php echo base_url().'assets/image/lp-maarif.jpg';?>'/>
    <link href='<?php echo base_url()."assets/css/bootstrap.css" ?>' rel="stylesheet">
   
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href='<?php echo base_url()."assets/css/bootstrap-responsive.css" ?>' rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="brand" href="#"><img src='<?php echo base_url().'assets/image/lp-maarif.jpg';?>' width='25' height='25'>&nbsp;Sistem Informasi Akademik MTS Bejen</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Login sebagai <a href="#" class="navbar-link"><?php echo $info->ortu ?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav" style='background:#009241;color:#eee;'>
            <ul class="nav nav-list">
              <li class="nav-header"><h4>Menu</h4></li>
              <li><a href='<?php echo base_url()."dashboard" ?>'>Beranda</a></li>
              <li><a href='<?php echo base_url()."dashboard/presensi_siswa" ?>'>Presensi Siswa</a></li>
              <li><a href='<?php echo base_url()."dashboard/nilai_siswa" ?>'>Nilai Siswa</a></li>
              <li><a href='<?php echo base_url()."dashboard/pelanggaran_siswa" ?>'>Pelanggaran Siswa</a></li>
              <li><a href="javascript:void();" onclick='logout()'>Logout</a></li>
            </ul>
          </div>
          <div class="well sidebar-nav" style='background:#009241;color:#eee;'>
            <ul class="nav nav-list">
              <li class="nav-header"><h4>Profil Siswa</h4></li>
              <li>NIS  -- <?php echo $info->nis ?></li>
              <li>Nama -- <?php echo $info->nama ?></li>
              <li>TTL -- <?php echo $info->tempat_lhr ?>,&nbsp;<?php echo tgl_indo($info->tgl_lhr); ?></li>
              <li>Alamat -- <?php echo $info->alamat ?></li>
              <li>Telp -- <?php echo $info->no_telp ?></li>
              <li>Orang Tua/Wali -- <?php echo $info->ortu ?></li>
            </ul>
          </div>
        </div>
        <script type='text/javascript'>
        function logout()
        {
          if(confirm('Anda yakin akan keluar dari sistem?'))
          {
            location.href='<?php echo base_url()."login_front/logout" ?>';  
          }
          
        }
        </script>