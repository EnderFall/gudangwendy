<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
  <ul class="navbar-nav">
    <a class="navbar-brand">
      <img src="<?= base_url('image/useravatar.jpeg'); ?>" alt="Avatar Logo" style="width:30px;" class="rounded-pill" back> 
    </a>
  <li class="nav-item">
    <a class="nav-link active" href="<?= base_url('home/dashboard'); ?>"><i class="fas fa-laptop-house"></i> Home</a>
  </li>
  <?php
      
      if(session()->get('level')==1){
      ?>
      <li class="nav-item">
        <a class="nav-link active" href="<?= base_url('home/tabeldatauser'); ?>">
          <i class="fas fa-user"></i> User</a></li>
      <?php
      }
      if(session()->get('level')==1){
      ?>
      <li class="nav-item">
        <a class="nav-link active" href="<?= base_url('home/tabeldatakaryawan'); ?>">
        <i class="fas fa-users"></i> Karyawan</a></li>
      <?php
      }
      ?>
  <?php
  if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4 || session()->get('level')==5){


  ?>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-database"></i> Data Master</a>
    <ul class="dropdown-menu">
      <?php
      if(session()->get('level')==1 || session()->get('level')==3 ){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/barangfn'); ?>"> <i class="fas fa-box"></i>Barang</a></li>
      

      <?php
      }
      if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/barangmasuk'); ?>"><i class="fas fa-box-open"></i> Barang Masuk</a></li>
      <?php
      }
      if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==5){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/barangkeluar'); ?>"><i class="fas fa-truck-loading"></i> Barang Keluar</a></li>
    <?php } ?>
    </ul>
  </li>
  <?php } ?>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-sticky-note"></i> Laporan</a>
    <ul class="dropdown-menu">
    <?php
      if(session()->get('level')==1 || session()->get('level')==3 ){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/laporanbarang'); ?>"> <i class="fas fa-box"></i>Barang</a></li>
      

      <?php
      }
      if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/laporanbarangmasuk'); ?>"><i class="fas fa-box-open"></i> Barang Masuk</a></li>
      <?php
      }
      if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==5){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/laporanbarangklr'); ?>"><i class="fas fa-truck-loading"></i> Barang Keluar</a></li>
    <?php } ?>
    </ul>
  </li>

      
  
  <li class="nav-item">
  <a class="nav-link active" href="<?= base_url('home/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
</li>

  </ul>
</div>
</nav>