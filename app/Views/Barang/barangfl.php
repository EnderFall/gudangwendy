<style>
input[name="search"] {
  width: 130px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[name="search"]:focus {
  width: 100%;
}
</style>
<div class="container">
<input type="text" class="form-control" name="search" placeholder="Pencarian">
<button class="btn btn-primary"><i class="fas fa-search"></i><button>
</div>


<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
<i class="fas fa-plus-square"></i>
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('home/simpan_barang')?>" method="POST">
      
  <tr>
    <td>Nama Barang</td>
    <td><input type="text" class="form-control" placeholder="Nama Barang" id="nama_brg" name="nama_brg" required></td>
  </tr>
  <tr>
    <td>Kode Barang</td>
    <td><input type="text" class="form-control" placeholder="Kode Barang" id="kode_brg" name="kode_brg" required></td>
  </tr>
  <tr>
    <td>Stok Barang</td>
    <td><input type="number" class="form-control" placeholder="Stok Barang" id="stok_brg" name="stok_brg" required></td>
  </tr>
  

  
</table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>


<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th width="5%">Stok</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($anjas as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
         <td><?= $value->kode_brg ?></td>
         <td><?= $value->nama_brg ?></td>
         <td><?= $value->stok ?></td>
         <td>
          <a href="<?= base_url('home/edit_barang/' .$value->id_brg) ?>"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
          
          <a href="<?= base_url('home/hapus_barang/' .$value->id_brg) ?>"><button class="btn btn-danger"><i class="fas fa-minus-square"></i></button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>