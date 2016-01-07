<style type="text/css">
  .hh a{
    text-decoration:none;
  }
  .hh a:hover{
    text-decoration:none;
  }
</style>
  <div class="row" >
        <?php if($this->session->userdata('cabang') == NULL): ?>
        <div class="span3 hh">
        <a href='javascript:void(0);' onclick="ajax_link('<?php echo base_url()."master/pelanggan" ?>')">
          <p><center><img src='<?php echo base_url().'assets/image/rak.png';?>' width='128' height='128'></center><br></p>
          <h3><center>Data Pelanggan</center></h3>
        </a>
       </div>
       <div class="span3 hh">
         <a href='javascript:void(0);' onclick="ajax_link('<?php echo base_url()."pengaturan/profil" ?>')">
          <p><center><img src='<?php echo base_url().'assets/image/setting.png';?>' width='128' height='128'></center><br></p>
          <h3><center>Pengaturan</center></h3>
          </a>
        </div>
      <?php endif ?>
        <div class="span3 hh">
        <a href='javascript:void(0);' onclick="ajax_link('<?php echo base_url()."transaksi/pengiriman/tambah" ?>')">
          <p><center><img src='<?php echo base_url().'assets/image/porklip.png';?>' width='128' height='128'></center><br></p>
          <h3><center>Pengiriman</center></h3>
        </a>
        </div>
         <div class="span3 hh">
         <a href='javascript:void(0);' onclick="ajax_link('<?php echo base_url()."transaksi/penerimaan" ?>')">
          <p><center><img src='<?php echo base_url().'assets/image/cs.png';?>' width='100' height='100'></center><br></p>
          <h3><center>Penerimaan</center></h3>
        </a>
        </div>
        
      </div>
 <div class="row" >
        <div class="span3 hh">
         <a href='javascript:void(0);' onclick="logout()">
          <p><center><img src='<?php echo base_url().'assets/image/lawang.png';?>' width='128' height='128'></center><br></p>
          <h3><center>Logout</center></h3>
          </a>
        </div>
      </div>
      <script type='text/javascript'>
      function logout()
      {
        
        if(confirm('Anda yakin ingin keluar dari sistem?'))
        {
          location.href='<?php echo base_url()."login/logout" ?>';  
        } 
      }
    </script>



